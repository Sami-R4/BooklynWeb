<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - Booklyn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-clr: #3B82F6;
            --secondary-clr: #1E293B;
            --accent-gold: #FCD34D;
            --bg-clr: #F8FAFC;
            --pure-white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-clr);
            color: var(--secondary-clr);
            line-height: 1.6;
        }


        .btn-outline {
            padding: 0.6rem 1.5rem;
            border: 2px solid var(--primary-clr);
            color: var(--primary-clr);
            background: transparent;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-outline:hover {
            background: var(--primary-clr);
            color: var(--pure-white);
        }

        .btn-primary {
            padding: 0.6rem 1.5rem;
            background: var(--accent-gold);
            color: var(--secondary-clr);
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(252, 211, 77, 0.4);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #1e293b, #2569d6);
            padding: 4rem 2rem;
            text-align: center;
            color: var(--pure-white);
            position: relative;
            overflow: hidden;
            margin-top: 5em;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--pure-white), var(--accent-gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .hero-search {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .hero-search input {
            width: 100%;
            padding: 1rem 3rem 1rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-family: 'DM Sans', sans-serif;
            background: white;
        }

        .hero-search button {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-clr);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
        }

        /* Categories Filter */
        .categories-filter {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .filter-tabs {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
        }

        .filter-tab {
            padding: 0.7rem 1.5rem;
            background: var(--pure-white);
            border: 2px solid transparent;
            border-radius: 50px;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s;
            font-weight: 500;
        }

        .filter-tab:hover {
            border-color: var(--primary-clr);
            color: var(--primary-clr);
        }

        .filter-tab.active {
            background: var(--primary-clr);
            color: var(--pure-white);
        }

        /* Featured Post */
        .featured-section {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .featured-post {
            background: var(--pure-white);
            border-radius: 20px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .featured-post:hover {
            transform: translateY(-5px);
        }

        .featured-image {
            position: relative;
            overflow: hidden;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .featured-post:hover .featured-image img {
            transform: scale(1.05);
        }

        .featured-badge {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            background: var(--accent-gold);
            color: var(--secondary-clr);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .featured-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .blog-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #64748B;
        }

        .blog-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .featured-content h2 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: var(--secondary-clr);
            line-height: 1.3;
        }

        .featured-content p {
            font-size: 1.1rem;
            color: #64748B;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-clr);
            font-weight: 600;
            text-decoration: none;
            transition: gap 0.3s;
        }

        .read-more:hover {
            gap: 1rem;
        }

        /* Blog Grid */
        .blogs-section {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-header h2 {
            font-size: 2rem;
            color: var(--secondary-clr);
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .blog-card {
            background: var(--pure-white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            cursor: pointer;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .blog-card-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .blog-card:hover .blog-card-image img {
            transform: scale(1.1);
        }

        .blog-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--pure-white);
            color: var(--primary-clr);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .blog-card-content {
            padding: 1.5rem;
        }

        .blog-card-content h3 {
            font-size: 1.4rem;
            margin-bottom: 0.8rem;
            color: var(--secondary-clr);
            line-height: 1.4;
        }

        .blog-card-content p {
            color: #64748B;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .blog-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #E2E8F0;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .author-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--primary-clr);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .author-details {
            font-size: 0.9rem;
        }

        .author-name {
            font-weight: 600;
            color: var(--secondary-clr);
        }

        .blog-date {
            color: #94A3B8;
            font-size: 0.85rem;
        }

        .blog-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: #94A3B8;
        }

        .blog-stats span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination button {
            padding: 0.7rem 1.2rem;
            border: 2px solid var(--primary-clr);
            background: var(--pure-white);
            color: var(--primary-clr);
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .pagination button:hover,
        .pagination button.active {
            background: var(--primary-clr);
            color: var(--pure-white);
        }

        /* Newsletter Section */
        .newsletter {
            background: linear-gradient(135deg, #1e293b, #2569d6);
            padding: 4rem 2rem;
            margin: 4rem auto;
            max-width: 1400px;
            border-radius: 20px;
            text-align: center;
            color: var(--pure-white);
        }

        .newsletter h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .newsletter p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            gap: 1rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-family: 'DM Sans', sans-serif;
            background: #fff;
        }

        .newsletter-form button {
            padding: 1rem 2rem;
            background: var(--accent-gold);
            color: var(--secondary-clr);
            border: none;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .newsletter-form button:hover {
            transform: scale(1.05);
        }
        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .featured-post {
                grid-template-columns: 1fr;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .newsletter-form {
                flex-direction: column;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .blog-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .blog-card:nth-child(1) { animation-delay: 0.1s; }
        .blog-card:nth-child(2) { animation-delay: 0.2s; }
        .blog-card:nth-child(3) { animation-delay: 0.3s; }
        .blog-card:nth-child(4) { animation-delay: 0.4s; }
        .blog-card:nth-child(5) { animation-delay: 0.5s; }
        .blog-card:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body>

<?php include '../includes/navbar.php'?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Trending Discussions</h1>
            <p>Explore insightful articles about books, writing, and the literary world</p>
            <div class="hero-search">
                <input type="text" placeholder="Search for articles, topics, or authors...">
                <button>Search</button>
            </div>
        </div>
    </section>

    <!-- Categories Filter -->
    <section class="categories-filter">
    <div class="filter-tabs">
            <button class="filter-tab active">All Posts</button>
            <button class="filter-tab">Book Reviews</button>
            <button class="filter-tab">Writing Tips</button>
            <button class="filter-tab">Author Interviews</button>
            <button class="filter-tab">Reading Lists</button>
            <button class="filter-tab">Industry News</button>
            <button class="filter-tab">Community Stories</button>
        </div>
    </section>

    <!-- Featured Post -->
    <section class="featured-section">
        <div class="featured-post">
            <div class="featured-image">
                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=800&h=600&fit=crop" alt="Featured Post">
                <div class="featured-badge">⭐ Featured</div>
            </div>
            <div class="featured-content">
                <div class="blog-meta">
                    <span>📚 Book Reviews</span>
                    <span>⏱️ 8 min read</span>
                </div>
                <h2>The Evolution of Digital Reading: How E-Books Are Changing Literature</h2>
                <p>Discover how digital platforms are transforming the way we read, write, and share stories. From accessibility to new publishing models, explore the revolution happening in the literary world.</p>
                <a href="#" class="read-more">Read Full Article →</a>
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="blogs-section">
        <div class="section-header">
            <h2>Latest Articles</h2>
            <button class="btn-outline">View All</button>
        </div>

        <div class="blog-grid">
            <!-- Blog Card 1 -->
            <div class="blog-card">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?w=400&h=300&fit=crop" alt="Blog Post">
                    <div class="blog-category">Writing Tips</div>
                </div>
                <div class="blog-card-content">
                    <h3>10 Essential Tips for First-Time Authors</h3>
                    <p>Starting your writing journey? Here are proven strategies to help you complete your first manuscript and avoid common pitfalls.</p>
                    <div class="blog-card-footer">
                        <div class="author-info">
                            <div class="author-avatar">SA</div>
                            <div class="author-details">
                                <div class="author-name">Sarah Anderson</div>
                                <div class="blog-date">Dec 15, 2024</div>
                            </div>
                        </div>
                        <div class="blog-stats">
                            <span>👁️ 2.5k</span>
                            <span>💬 24</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="blog-card">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=400&h=300&fit=crop" alt="Blog Post">
                    <div class="blog-category">Book Reviews</div>
                </div>
                <div class="blog-card-content">
                    <h3>Hidden Gems: 5 Underrated Books You Must Read</h3>
                    <p>Move beyond bestsellers and discover these incredible books that deserve more recognition from the reading community.</p>
                    <div class="blog-card-footer">
                        <div class="author-info">
                            <div class="author-avatar">MJ</div>
                            <div class="author-details">
                                <div class="author-name">Marcus Johnson</div>
                                <div class="blog-date">Dec 12, 2024</div>
                            </div>
                        </div>
                        <div class="blog-stats">
                            <span>👁️ 1.8k</span>
                            <span>💬 18</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="blog-card">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop" alt="Blog Post">
                    <div class="blog-category">Interviews</div>
                </div>
                <div class="blog-card-content">
                    <h3>Author Spotlight: A Conversation with Emma Clarke</h3>
                    <p>Get insights into the creative process of bestselling author Emma Clarke as she discusses her latest novel and writing routine.</p>
                    <div class="blog-card-footer">
                        <div class="author-info">
                            <div class="author-avatar">LR</div>
                            <div class="author-details">
                                <div class="author-name">Lisa Rodriguez</div>
                                <div class="blog-date">Dec 10, 2024</div>
                            </div>
                        </div>
                        <div class="blog-stats">
                            <span>👁️ 3.2k</span>
                            <span>💬 45</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Card 4 -->
            <div class="blog-card">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1519682337058-a94d519337bc?w=400&h=300&fit=crop" alt="Blog Post">
                    <div class="blog-category">Reading Lists</div>
                </div>
                <div class="blog-card-content">
                    <h3>Summer Reading Challenge: 20 Books to Transform Your Year</h3>
                    <p>Curated reading list spanning multiple genres to help you discover new favorites and expand your literary horizons.</p>
                    <div class="blog-card-footer">
                        <div class="author-info">
                            <div class="author-avatar">DK</div>
                            <div class="author-details">
                                <div class="author-name">David Kim</div>
                                <div class="blog-date">Dec 8, 2024</div>
                            </div>
                        </div>
                        <div class="blog-stats">
                            <span>👁️ 4.1k</span>
                            <span>💬 67</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Card 5 -->
            <div class="blog-card">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=400&h=300&fit=crop" alt="Blog Post">
                    <div class="blog-category">Industry News</div>
                </div>
                <div class="blog-card-content">
                    <h3>The Future of Publishing: Trends Shaping 2025</h3>
                    <p>Analysis of emerging trends in the publishing industry, from AI-assisted writing to new distribution models.</p>
                    <div class="blog-card-footer">
                        <div class="author-info">
                            <div class="author-avatar">AP</div>
                            <div class="author-details">
                                <div class="author-name">Alex Peterson</div>
                                <div class="blog-date">Dec 5, 2024</div>
                            </div>
                        </div>
                        <div class="blog-stats">
                            <span>👁️ 2.9k</span>
                            <span>💬 32</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Card 6 -->
            <div class="blog-card">
                <div class="blog-card-image">
                    <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=400&h=300&fit=crop" alt="Blog Post">
                    <div class="blog-category">Community</div>
                </div>
                <div class="blog-card-content">
                    <h3>Building a Reading Habit: Stories from Our Community</h3>
                    <p>Real stories from Booklyn readers about how they transformed their reading habits and fell in love with books again.</p>
                    <div class="blog-card-footer">
                        <div class="author-info">
                            <div class="author-avatar">NT</div>
                            <div class="author-details">
                                <div class="author-name">Nina Torres</div>
                                <div class="blog-date">Dec 3, 2024</div>
                            </div>
                        </div>
                        <div class="blog-stats">
                            <span>👁️ 1.6k</span>
                            <span>💬 28</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button>← Previous</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>Next →</button>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <h2>Never Miss an Article</h2>
        <p>Subscribe to our newsletter and get the latest blog posts delivered to your inbox</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Enter your email address">
            <button type="submit">Subscribe</button>
        </form>
    </section>

<?php include '../includes/footer.php'?>

   
    <script>
        // Filter tabs functionality
        const filterTabs = document.querySelectorAll('.filter-tab');
        filterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                filterTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                // Add filtering logic here
            });
        });

        // Pagination
        const paginationButtons = document.querySelectorAll('.pagination button');
        paginationButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (!button.textContent.includes('←') && !button.textContent.includes('→')) {
                    paginationButtons.forEach(b => b.classList.remove('active'));
                    button.classList.add('active');
                }
                // Add page change logic here
            });
        });

        // Newsletter form
        const newsletterForm = document.querySelector('.newsletter-form');
        newsletterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you for subscribing!');
            newsletterForm.reset();
        });
    </script>
</body>
</html>