<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Booklyn | Home</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img/myLogo.png" type="image/x-icon">

  <!-- External CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  
  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

</head>
<body>
  <?php 
  include("../includes/navbar.php");
  include("../includes/header.php");
  include("../includes/loader.php");
   ?>

  <!-- Header -->
  <section class="header" data-aos="fade-down" data-aos-duration="1000">
    <h1>Welcome to Booklyn</h1>
    <h5>Discover, Discuss, and Collect Books You Love.</h5>
    <div class="search-bar">
      <input type="text" placeholder="Search for books..." />
      <button class="search-btn"><i class="fa fa-search"></i></button>
    </div>
  </section>

  <!-- Trending Discussions -->
  <section class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="section-title">Trending Discussions</h2>
    <div class="discussions-slider" aria-label="Trending discussions slider">
      <div class="discussions-track" id="discussionsTrack">
        <!-- Cards inserted dynamically by JS -->
      </div>

      <div class="slide-div">
        <!-- Navigation buttons -->
        <button class="slider-btn left-slide" id="prevBtn" aria-label="Previous discussion">
          <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
        </button>
        <button class="slider-btn right-slide" id="nextBtn" aria-label="Next discussion">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- New Releases -->
  <section data-aos="zoom-in" data-aos-duration="1000">
    <h2 class="section-title" style="margin-left: 3.7em;">New Releases</h2>
    <div class="newReleases container">
      <!-- Cards looped through with JS -->
    </div>
    <span class="see-more">
      <a href="books.php"><button class="btn-search rounded-pill">See More Books</button></a>
    </span>
  </section>

  <!-- Why Booklyn -->
  <section class="why mt-4 py-3" data-aos="fade-right" data-aos-duration="1000">
    <h2 class="section-title container mt-5" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">Why Booklyn</h2>
    <div class="card-container container">
      <!-- Card 1 -->
      <div class="card" data-aos="zoom-in" data-aos-delay="150">
        <div class="card-header">
          <span class="icon"><i class="fa-solid fa-users"></i></span>
          <h3 class="header-title">Community<br> Engagement</h3>
        </div>
        <div class="card-body">
          <p>Connect with book lovers, share ideas, and join lively discussions. Join vibrant communities of book lovers.</p>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="card" data-aos="zoom-in" data-aos-delay="300">
        <div class="card-header">
          <span class="icon"><i class="fa-solid fa-lightbulb"></i></span>
          <h3 class="header-title">Personalized Recommendations</h3>
        </div>
        <div class="card-body">
          <p>Get book suggestions tailored to your taste and reading habits. Find your next favorite read effortlessly.</p>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="card" data-aos="zoom-in" data-aos-delay="450">
        <div class="card-header">
          <span class="icon"><i class="fa-solid fa-trophy"></i></span>
          <h3 class="header-title">Gamifications & Achievements</h3>
        </div>
        <div class="card-body">
          <p>Earn rewards and badges as you read, review, and participate in the community. Make reading fun and interactive.</p>
        </div>
      </div>
    </div>
    <span class="d-flex justify-content-center mt-3" data-aos="fade-up" data-aos-delay="600">
      <button class="btn-search rounded-pill">Join the Community <i class="fa-solid fa-right-to-bracket"></i></button>
    </span>
  </section>

<!-- Featured Authors Section -->
  <section class="container slider-section">
    <div class="slider-header">
      <h3>Featured Authors</h3>
    </div>

<div class="author-slider-wrapper">
    <div class="author-slider">
      <?php
        include ("../app/dbconfig.php");

        $sql = "SELECT `author_id`, `author_name`, `pen_name`, `email`, `pic_path`, `bio` FROM `authors`";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                echo '
                <div class="author-card">
                  <img src="../app/' . htmlspecialchars($row['pic_path']) . '" alt="' . htmlspecialchars($row['pen_name']) . '">
                  <div class="author-name">' . htmlspecialchars($row['pen_name']) . '</div>
                  <div class="author-info">
                    <span class="follower-count">
                      <i class="fas fa-users"></i>
                      <p>20</p>
                    </span>
                    <span class="book-count">
                      <i class="fas fa-book-open"></i>
                      <p>11</p>
                    </span>
                    <span class="rating">
                      <i class="fas fa-star"></i>
                      <p>3.4</p>
                    </span>
                  </div>
                  <div class="btn-wrapper">
                    <button class="btn-follow">Follow</button>
                  </div>
                </div>
                ';
            }
        } else {
            echo "<p>No authors found.</p>";
        }
      ?>
    </div>
  </div>
      
      <!-- <div class="slider-controls">
        <button class="slider-btn prev-btn">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-btn next-btn">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div> -->
    </div>
  </section>

  <?php include ("../includes/footer.php") ?>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/bootstrapPopper.js"></script>
  <script src="../assets/js/jquery.js"></script>

  <script>
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true
    });

    // Discussions Data
    const discussionsData = [
      { title: "Best fantasy novels of 2025", snippet: "What are the most captivating fantasy novels released this year? Share your favorites and why!", comments: 24, likes: 39, lastActivity: "3 hours ago" },
      { title: "Hidden gems in classic literature", snippet: "Let's talk about underrated classics that everyone should read but often overlook.", comments: 24, likes: 39, lastActivity: "3 hours ago" },
      { title: "How to get into reading more regularly?", snippet: "Struggling to build a reading habit? Share your tips and motivational tricks here.", comments: 24, likes: 39, lastActivity: "3 days ago" },
      { title: "Books that changed your life", snippet: "Which books had the biggest impact on your worldview or personal growth?", comments: 12, likes: 56, lastActivity: "1 day ago" },
      { title: "Upcoming book releases to watch", snippet: "Discuss the most anticipated books set to release this year.", comments: 8, likes: 20, lastActivity: "5 hours ago" },
      { title: "Favorite book-to-movie adaptations", snippet: "Share your thoughts on the best and worst adaptations from books to films.", comments: 30, likes: 45, lastActivity: "4 days ago" },
    ];

    const track = document.getElementById("discussionsTrack");

    function createDiscussionCard(discussion, index) {
      const card = document.createElement("div");
      card.className = "discussion-card";
      card.tabIndex = 0;
      card.setAttribute("role", "button");
      card.setAttribute("aria-label", `Open discussion about '${discussion.title}'`);
      card.setAttribute('data-aos', 'fade-up');
      card.setAttribute('data-aos-delay', index * 150);

      card.innerHTML = `
        <a href="#" class="discussion-title">${discussion.title}</a>
        <p class="discussion-snippet">${discussion.snippet}</p>
        <div class="discussion-footer">
          <div class="comments">
            <i class="fa-solid fa-message"></i> ${discussion.comments}
          </div>
          <div class="likes">
            <i class="fa-solid fa-thumbs-up"></i> ${discussion.likes}
          </div>
          <div class="last-activity" title="Last activity ${discussion.lastActivity}">${discussion.lastActivity}</div>
        </div>
      `;
      return card;
    }

    discussionsData.forEach((discussion, index) => {
      track.appendChild(createDiscussionCard(discussion, index));
    });

    // Slider Buttons
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    function getScrollAmount() {
      const card = track.querySelector(".discussion-card");
      if (!card) return 320;
      const gap = parseInt(window.getComputedStyle(track).gap) || 0;
      return card.offsetWidth + gap;
    }

    prevBtn.addEventListener("click", () => { track.scrollBy({ left: -getScrollAmount(), behavior: "smooth" }); resetAutoSlideTimer(); });
    nextBtn.addEventListener("click", () => { track.scrollBy({ left: getScrollAmount(), behavior: "smooth" }); resetAutoSlideTimer(); });

    const autoSlideInterval = 3000;
    let slideTimer = setInterval(autoSlide, autoSlideInterval);

    function isAtEnd() { return track.scrollLeft + track.clientWidth >= track.scrollWidth - 5; }
    function autoSlide() { if (isAtEnd()) track.scrollTo({ left: 0, behavior: "smooth" }); else track.scrollBy({ left: getScrollAmount(), behavior: "smooth" }); }
    function resetAutoSlideTimer() { clearInterval(slideTimer); slideTimer = setInterval(autoSlide, autoSlideInterval); }
    track.addEventListener("mouseenter", () => clearInterval(slideTimer));
    track.addEventListener("mouseleave", () => slideTimer = setInterval(autoSlide, autoSlideInterval));

    // New Releases Data
    const newReleasesData = [
      { id: 1, title: 'The Alchemist', author: 'Paulo Coelho', img : 'alchemist.jpeg', price: 'XAF 5000', rating: 1.5, publishedYear: '2020', pages: '300', descTitle: 'A dark, action-packed fantasy about a girl discovering herself.', descBody: 'When Adeles village is attacked by werewolves, she discovers she can transform into a wolf.', tags: ['Horror'] },
      { id: 2, title: 'Immortals', author: 'Paulo Coelho', img : 'immortals.jpg', price: 'XAF 5000', rating: 4.8, publishedYear: '2020', pages: '300', descTitle: 'A thrilling fantasy story.', descBody: 'A journey of self-discovery and adventure awaits.', tags: ['Horror'] },
      { id: 3, title: 'The Glitch', author: 'Paulo Coelho', img : 'glitch.jpg', price: 'XAF 8000', rating: 4.5, publishedYear: '2020', pages: '300', descTitle: 'A dark, action-packed fantasy about a girl discovering herself.', descBody: 'Control new abilities before losing herself.', tags: ['Horror','Fiction'] }
    ];

    const newReleasesContainer = document.querySelector('.newReleases');

    newReleasesData.forEach((book, index) => {
      let tagsHTML = '';
      book.tags.forEach(tag => { tagsHTML += `<span class="tag category-badge" data-aos="fade-down" data-aos-delay="${index * 100}">${tag}</span>`; });

      const fullStars = Math.floor(book.rating);
      const halfStar = (book.rating - fullStars) >= 0.5;
      let starsHTML = '';
      for (let i = 0; i < fullStars; i++) starsHTML += '<i class="fa fa-star"></i>';
      if (halfStar) starsHTML += '<i class="fa fa-star-half-alt"></i>';

      const cardHTML = `
        <div class="card" data-aos="flip-left" data-aos-delay="${index*150}">
          <img src="../assets/img/${book.img}" alt="${book.title}" />
          <div class="card-body">
            <h5 class="card-title">${book.title}</h5>
            <p class="card-text text-muted">By ${book.author}</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fw-bold h6">${book.price}</span>
              <div class="text-warning">${starsHTML} <small class="text-muted">${book.rating}</small></div>
            </div>
          </div>
          ${tagsHTML}
          <div class="card-footer d-flex justify-content-between bg-light">
            <span class="d-flex gap-2 btn-flex">
              <button class="btn-sm add-btn">Add to Cart</button>
              <button class="btn-sm view-btn" data-bs-toggle="modal" data-bs-target="#bookModal${book.id}">Details</button>
            </span>
            <button class="btn btn-outline-secondary btn-sm btn-fav"><i class="fa-regular fa-heart"></i></button>
          </div>
        </div>
      `;
      newReleasesContainer.innerHTML += cardHTML;
    });

    // ==================================
    // Slider
    // ==================================
    $(document).ready(function() {
  const slider = $('.author-slider');
  const cards = $('.author-card');
  const cardCount = cards.length;
  const cardWidth = cards.outerWidth(true);
  const visibleCards = 5;
  let currentPosition = 0;
  let autoSlideInterval;

  function updateSliderPosition() {
    slider.css('transform', `translateX(-${currentPosition * cardWidth}px)`);
  }

  function slideNext() {
    // If the remaining cards are less than visibleCards, reset to start
    if (currentPosition + visibleCards >= cardCount) {
      slider.css('transition', 'none');
      currentPosition = 0;
      updateSliderPosition();
      slider.offset(); // force reflow
      slider.css('transition', 'transform 0.7s ease');
    } else {
      currentPosition++;
      updateSliderPosition();
    }
  }

  function slidePrev() {
    if (currentPosition <= 0) {
      slider.css('transition', 'none');
      currentPosition = cardCount - visibleCards; // jump to last possible position
      updateSliderPosition();
      slider.offset();
      slider.css('transition', 'transform 0.7s ease');
    } else {
      currentPosition--;
      updateSliderPosition();
    }
  }

  // Auto slide
  function startAutoSlide() {
    autoSlideInterval = setInterval(slideNext, 3000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlideInterval);
  }

  // Event handlers
  $('.next-btn').on('click', function() {
    stopAutoSlide();
    slideNext();
    startAutoSlide();
  });

  $('.prev-btn').on('click', function() {
    stopAutoSlide();
    slidePrev();
    startAutoSlide();
  });

  // Pause auto slide on hover
  $('.author-slider-wrapper').hover(
    function() { stopAutoSlide(); },
    function() { startAutoSlide(); }
  );

  startAutoSlide();
});

  </script>

</body>
</html>
