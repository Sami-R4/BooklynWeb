<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Author Dashboard - Feedback</title>
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"></head>
<!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/myLogo.png" type="image/x-icon">
<!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary-clr: #3B82F6;
    --secondary-clr: #1E293B;
    --accent-gold: #FCD34D;
    --bg-clr: #F8FAFC;
    --card-bg: #FFFFFF;
    --negative-bg: #ffe5e5;
    --text-dark: #1E293B;
}

.dashboard-body {
    padding: 40px;
    background-color: var(--bg-clr);
    min-height: 100vh;
}

/* Page Header */
.page-header h1 {
    color: var(--primary-clr);
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}
.page-header p {
    color: var(--secondary-clr);
    font-size: 1.2rem;
    margin-bottom: 2rem;
}

/* Summary Cards */
.summary-cards {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}
.summary-cards .card {
    flex: 1;
    min-width: 180px;
    padding: 20px;
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    text-align: center;
}
.summary-cards .card h3 {
    color: var(--secondary-clr);
    margin-bottom: 10px;
}
.summary-cards .card p {
    font-size: 1.5rem;
    color: var(--primary-clr);
    font-weight: 600;
}

/* Feedback List */
.feedback-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Feedback Card */
.feedback-card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.feedback-card.negative {
    background-color: var(--negative-bg);
}
.feedback-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}
.feedback-header .reader-name {
    font-weight: 600;
    color: var(--secondary-clr);
}
.feedback-header .book-title {
    font-style: italic;
    color: var(--primary-clr);
}
.feedback-header .rating i {
    color: #FFD700;
    margin-right: 2px;
}
.feedback-comment p {
    color: var(--text-dark);
}
.feedback-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.feedback-footer .date {
    color: #666;
    font-size: 0.9rem;
}
.feedback-footer .mark-reviewed {
    padding: 6px 12px;
    border: none;
    background-color: var(--primary-clr);
    color: #fff;
    border-radius: 6px;
    cursor: pointer;
}
.feedback-footer .mark-reviewed:hover {
    background-color: #2563eb;
}

/* Responsive */
@media(max-width: 768px){
    .summary-cards {
        flex-direction: column;
    }
    .feedback-header {
        flex-direction: column;
        align-items: flex-start;
    }
}

</style>
<body>
<?php include ("user-navbar.php") ?>

<section class="dashboard-body">
    <div class="page-header">
        <h1>Feedback</h1>
        <p>See what readers are saying about your books.</p>
    </div>

    <!-- Summary Cards -->
    <div class="summary-cards">
        <div class="card">
            <h3>Average Rating</h3>
            <p><i class="fa-solid fa-star"></i> 4.5 / 5</p>
        </div>
        <div class="card">
            <h3>Total Feedback</h3>
            <p>128</p>
        </div>
        <div class="card">
            <h3>Positive Feedback</h3>
            <p>95%</p>
        </div>
    </div>

    <!-- Feedback List -->
    <div class="feedback-list">
        <!-- Example Feedback Card -->
        <div class="feedback-card">
            <div class="feedback-header">
                <span class="reader-name">Jane Doe</span>
                <span class="book-title">"The Enchanted Forest"</span>
                <span class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></span>
            </div>
            <div class="feedback-comment">
                <p>Really enjoyed this book! The characters felt alive and the story kept me hooked until the end.</p>
            </div>
            <div class="feedback-footer">
                <span class="date">2025-08-27</span>
                <button class="mark-reviewed">Mark as Reviewed</button>
            </div>
        </div>

        <!-- Another Example -->
        <div class="feedback-card negative">
            <div class="feedback-header">
                <span class="reader-name">John Smith</span>
                <span class="book-title">"Mystery of the Lost Island"</span>
                <span class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span>
            </div>
            <div class="feedback-comment">
                <p>The plot was a bit confusing and I struggled to stay engaged. Could use clearer pacing.</p>
            </div>
            <div class="feedback-footer">
                <span class="date">2025-08-26</span>
                <button class="mark-reviewed">Mark as Reviewed</button>
            </div>
        </div>
    </div>
</section>
</body>
</html>
