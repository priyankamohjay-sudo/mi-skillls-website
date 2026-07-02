/**
 * Policy Pages — Dynamic Content Loader
 * Fetches privacy, terms, cancellation/refunds, and shipping policies
 * from the database using the API endpoint: /api/content/{type}
 */

(function () {
  'use strict';

  const API_BASE = window.MI_API_BASE_URL || 'https://dev.miskills.in';

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  /**
   * Helper to format raw text content into beautiful HTML.
   * Parses newlines, sections/headers, lists, bold text, email addresses, and websites.
   * Uses tokenization to prevent nested tag replacement conflicts.
   */
  function formatPolicyContent(text) {
    if (!text) return '';

    const lines = text.split('\n');
    let html = '';
    let inList = false;

    for (let i = 0; i < lines.length; i++) {
      let line = lines[i].trim();
      if (!line) {
        if (inList) {
          html += '</ul>';
          inList = false;
        }
        continue;
      }

      // Skip redundant titles at the very start of the text
      if (i < 3 && (
        line.toLowerCase() === 'privacy policy' || 
        line.toLowerCase() === 'terms & conditions' || 
        line.toLowerCase() === 'terms and conditions' || 
        line.toLowerCase() === 'cancellation & refund policy' || 
        line.toLowerCase() === 'cancellation and refund policy' ||
        line.toLowerCase() === 'shipping policy'
      )) {
        continue;
      }

      // Escape HTML first
      let parsedLine = escapeHtml(line);
      
      // Convert **bold** to <strong>bold</strong>
      parsedLine = parsedLine.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
      
      // Tokenize links and emails to prevent nested replacement bugs
      const replacements = [];
      let tokenIndex = 0;

      // 1. Tokenize Email Addresses
      parsedLine = parsedLine.replace(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/g, (email) => {
        const token = `__REPL_TOKEN_${tokenIndex++}__`;
        replacements.push({
          token: token,
          html: `<a href="mailto:${email}" style="color:#a78bfa;">${email}</a>`
        });
        return token;
      });

      // 2. Tokenize Website URLs (e.g. miskills.in)
      parsedLine = parsedLine.replace(/(?:\bhttps?:\/\/)?(miskills\.in|[a-zA-Z0-9-]+\.[a-zA-Z]{2,}(?:\/[a-zA-Z0-9-_./?%&=]*)?)\b/gi, (match) => {
        if (match.startsWith('__REPL_') || match.includes('@')) {
          return match;
        }
        const token = `__REPL_TOKEN_${tokenIndex++}__`;
        const url = match.startsWith('http') ? match : `https://${match}`;
        replacements.push({
          token: token,
          html: `<a href="${url}" target="_blank" style="color:#a78bfa;">${match}</a>`
        });
        return token;
      });

      // Helper to restore tokens
      const restoreTokens = (str) => {
        let result = str;
        replacements.forEach(rep => {
          result = result.replace(rep.token, rep.html);
        });
        return result;
      };

      // Last updated line
      if (line.toLowerCase().startsWith('last updated:') || line.toLowerCase().startsWith('last updated :')) {
        if (inList) { html += '</ul>'; inList = false; }
        const dateText = parsedLine.replace(/last updated\s*:\s*/i, '');
        html += restoreTokens(`<p class="post-text"><strong>Last Updated:</strong> ${dateText}</p>`);
        continue;
      }

      // Bullet items (starts with "- " or "* ")
      if (line.startsWith('- ') || line.startsWith('* ')) {
        if (!inList) {
          html += '<ul class="post-list">';
          inList = true;
        }
        const itemText = parsedLine.replace(/^[-*]\s+/, '');
        html += restoreTokens(`<li class="post-list-item"><i class="bi bi-check2-circle icon"></i><span class="post-list-text">${itemText}</span></li>`);
        continue;
      }

      // Close open list if we hit a non-bullet line
      if (inList) {
        html += '</ul>';
        inList = false;
      }

      // Section headers (starts with digits followed by dot, e.g., "1. Introduction" or ends with ":")
      if (/^\d+\./.test(line) || (line.endsWith(':') && line.length < 100)) {
        html += restoreTokens(`<h2 class="post-heading">${parsedLine}</h2>`);
        continue;
      }

      // General paragraph
      html += restoreTokens(`<p class="post-text">${parsedLine}</p>`);
    }

    if (inList) {
      html += '</ul>';
    }

    return html;
  }

  async function loadPolicy() {
    const policyType = window.POLICY_TYPE;
    const contentArea = document.getElementById('policy-content-area');
    if (!policyType || !contentArea) return;

    try {
      const response = await fetch(`${API_BASE}/api/content/${encodeURIComponent(policyType)}`);
      if (!response.ok) throw new Error(`Failed to fetch policy: ${response.status}`);
      const data = await response.json();

      let rawText = '';
      if (data) {
        if (typeof data.content === 'string') {
          rawText = data.content;
        } else if (data.content && typeof data.content.content === 'string') {
          rawText = data.content.content;
        } else if (data.data && typeof data.data.content === 'string') {
          rawText = data.data.content;
        } else if (data.data && data.data.content && typeof data.data.content.content === 'string') {
          rawText = data.data.content.content;
        }
      }

      if (!rawText) {
        throw new Error('No content found in API response');
      }

      contentArea.innerHTML = formatPolicyContent(rawText);
    } catch (error) {
      console.error('[PolicyLoader] Error loading policy content:', error);
      contentArea.innerHTML = `
        <div class="alert alert-warning text-center" role="alert" style="background: rgba(255, 193, 7, 0.1); border-color: rgba(255, 193, 7, 0.2); color: #ffc107;">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          Failed to load content. Please check your connection and reload the page.
        </div>
      `;
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadPolicy);
  } else {
    loadPolicy();
  }
})();
