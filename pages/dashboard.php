<?php
$title = "My Subscriptions - MI Skills";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="dashboard-wrapper mega-section">
    <div class="container">
        <div class="sec-heading centered mb-5">
            <div class="content-area">
                <span class="pre-title">Student Dashboard</span>
                <h2 class="title">My <span class="hollow-text">Subscriptions</span></h2>
                <p class="info-text">View and manage your enrolled courses and active plans.</p>
            </div>
        </div>

        <div id="dashboard-loading" class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-white-50">Fetching your subscriptions...</p>
        </div>

        <div id="no-subscriptions" class="text-center py-5" style="display: none;">
            <div class="empty-state-icon mb-4">
                <i class="bi bi-journal-x fs-1 text-white-50"></i>
            </div>
            <h4 class="text-white">No Active Subscriptions</h4>
            <p class="text-white-50">You haven't enrolled in any courses yet.</p>
            <a href="<?= BASE_URL ?>subscription" class="btn-solid mt-3">Browse Courses</a>
        </div>

        <div id="subscriptions-container" class="row g-4">
            <!-- Subscription cards will be injected here by JS -->
        </div>
    </div>
</div>

<style>
.dashboard-wrapper {
    min-height: 70vh;
    background: #080808;
}

.subscription-card {
    background: linear-gradient(#05062d, #05062d) padding-box,
                linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb) border-box;
    border: 2px solid transparent;
    border-radius: 20px;
    padding: 25px;
    height: 100%;
    transition: all 0.3s ease;
}

.subscription-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(103, 58, 183, 0.2);
}

.sub-status {
    font-size: 0.75rem;
    padding: 4px 12px;
    border-radius: 20px;
    text-transform: uppercase;
    font-weight: 700;
    display: inline-block;
    margin-bottom: 15px;
}

.status-active {
    background: rgba(40, 167, 69, 0.2);
    color: #28a745;
    border: 1px solid #28a745;
}

.sub-course-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
}

.sub-info-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.sub-label {
    color: rgba(255, 255, 255, 0.5);
}

.sub-value {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
}

.btn-access {
    background: var(--clr-main);
    color: white;
    border-radius: 30px;
    padding: 8px 20px;
    font-size: 0.85rem;
    text-decoration: none;
    display: inline-block;
    margin-top: 15px;
    transition: all 0.3s ease;
    border: none;
}

.btn-access:hover {
    opacity: 0.9;
    color: white;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', async () => {
    const token = localStorage.getItem('accessToken');
    if (!token) {
        window.location.href = '<?= BASE_URL ?>login';
        return;
    }

    try {
        const response = await fetch(`${API_BASE_URL}/api/subscriptions/my-subscriptions`, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        const data = await response.json();
        document.getElementById('dashboard-loading').style.display = 'none';

        if (data.success && data.subscriptions && data.subscriptions.length > 0) {
            const container = document.getElementById('subscriptions-container');
            data.subscriptions.forEach(sub => {
                const subCard = `
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="subscription-card">
                            <span class="sub-status status-active">Active</span>
                            <h3 class="sub-course-title">${sub.subcategoryName || 'Enrolled Course'}</h3>
                            
                            <div class="sub-info-row">
                                <span class="sub-label">Mode:</span>
                                <span class="sub-value">${sub.learningMode}</span>
                            </div>
                            <div class="sub-info-row">
                                <span class="sub-label">Valid Until:</span>
                                <span class="sub-value">${new Date(sub.expiryDate).toLocaleDateString()}</span>
                            </div>
                            <div class="sub-info-row">
                                <span class="sub-label">Type:</span>
                                <span class="sub-value">${sub.subscriptionMode}</span>
                            </div>
                            
                            <a href="#" class="btn-access">Access Course</a>
                        </div>
                    </div>
                `;
                container.innerHTML += subCard;
            });
        } else {
            document.getElementById('no-subscriptions').style.display = 'block';
        }
    } catch (error) {
        console.error('Error fetching subscriptions:', error);
        document.getElementById('dashboard-loading').innerHTML = `
            <div class="text-danger">
                <i class="bi bi-exclamation-triangle fs-1"></i>
                <p class="mt-3">Failed to load subscriptions. Please try again later.</p>
            </div>
        `;
    }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
