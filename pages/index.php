<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Booklyn | Home</title>

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

  <section class="header">
    <h1 data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">Welcome to Booklyn</h1>
    <h5 data-aos="fade-in" data-aos-delay="200" data-aos-duration="1000">Discover, Discuss, and Collect Books You Love.</h5>
    <div class="search-bar" data-aos="flip-right" data-aos-delay="400" data-aos-duration="1000">
      <input type="text" placeholder="Search for books..." />
      <button class="search-btn"><i class="fa fa-search"></i></button>
    </div>
  </section>

  <!-- Trending Topics Section -->
<section class="container my-5">
  <h2 class="section-title" data-aos="fade-down-left" data-aos-delay="100" data-aos-duration="1000">
    Trending Discussions
  </h2>

  <div class="discussions-slider" aria-label="Trending discussions slider">
    <div class="discussions-track" id="discussionsTrack">
      <!-- Cards inserted dynamically by JS -->
    </div>

    <!-- Navigation buttons -->
    <button class="slider-btn left-slide" id="prevBtn" aria-label="Previous discussion">
      <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
    </button>
    <button class="slider-btn right-slide" id="nextBtn" aria-label="Next discussion">
      <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
    </button>
  </div>
</section>

<!-- New Releases -->
 
<section>
  <h2 class="section-title container" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
    New Releases
  </h2>

  <div class="newReleases container">
    <!-- Cards looped through with JS -->
  </div>
  <span class="see-more">
  <a href="books.php"><button class="btn-search rounded-pill">See More Books</button></a>
</span>
</section>


<!-- Why Booklyn -->
<section class="why mt-4 py-3">
  <h2 class="section-title container mt-5" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
    Why Booklyn
  </h2>
  <div class="card-container container">
    <!-- Card 1 -->
    <div class="card">
      <div class="card-header">
        <span class="icon"><i class="fa-solid fa-users"></i></span>
        <h3 class="header-title">Community<br> Engagement</h3>
      </div>
      <div class="card-body">
        <p>Connect with book lovers, share ideas, and join lively discussions. Join vibrant comunities of book lovers.</p>
      </div>
    </div>
    <!-- Card 2 -->
     <div class="card">
      <div class="card-header">
        <span class="icon"><i class="fa-solid fa-lightbulb"></i></span>
        <h3 class="header-title">Personalized Recommendations</h3>
      </div>
      <div class="card-body">
        <p>Get book suggestions tailored to your taste and reading habits. Find your next favorite read effortlessly</p>
      </div>
    </div>
    <!-- Card 3 -->
     <div class="card">
      <div class="card-header">
        <span class="icon"><i class="fa-solid fa-trophy"></i></span>
        <h3 class="header-title">Gamifications & Achievements</h3>
      </div>
      <div class="card-body">
        <p>Earn rewards and badges as you read, review, and participate in the community. Make reading fun and interactive</p>
      </div>
    </div>
  </div>
  <span class="d-flex justify-content-center">
  <button class="btn-search rounded-pill">Join the Community <i class="fa-solid fa-right-to-bracket"></i></button>
</span>
</section>
  

  <?php include("../includes/footer.php"); ?>


  <!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/bootstrapPopper.js"></script>
<script>
  // AOS.init({
  //   once: true
  // });

  // Data for 6 discussions
const discussionsData = [
  {
    title: "Best fantasy novels of 2025",
    snippet: "What are the most captivating fantasy novels released this year? Share your favorites and why!",
    comments: 24,
    likes: 39,
    lastActivity: "3 hours ago",
  },
  {
    title: "Hidden gems in classic literature",
    snippet: "Let's talk about underrated classics that everyone should read but often overlook.",
    comments: 24,
    likes: 39,
    lastActivity: "3 hours ago",
  },
  {
    title: "How to get into reading more regularly?",
    snippet: "Struggling to build a reading habit? Share your tips and motivational tricks here.",
    comments: 24,
    likes: 39,
    lastActivity: "3 days ago",
  },
  {
    title: "Books that changed your life",
    snippet: "Which books had the biggest impact on your worldview or personal growth?",
    comments: 12,
    likes: 56,
    lastActivity: "1 day ago",
  },
  {
    title: "Upcoming book releases to watch",
    snippet: "Discuss the most anticipated books set to release this year.",
    comments: 8,
    likes: 20,
    lastActivity: "5 hours ago",
  },
  {
    title: "Favorite book-to-movie adaptations",
    snippet: "Share your thoughts on the best and worst adaptations from books to films.",
    comments: 30,
    likes: 45,
    lastActivity: "4 days ago",
  },
];

// Select the container that holds the cards
const track = document.getElementById("discussionsTrack");

// Helper function to create a card element for each discussion
function createDiscussionCard(discussion) {
  const card = document.createElement("div");
  card.className = "discussion-card";
  card.tabIndex = 0;
  card.setAttribute("role", "button");
  card.setAttribute("aria-label", `Open discussion about '${discussion.title}'`);

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

// Add all cards to the track container
discussionsData.forEach(discussion => {
  const card = createDiscussionCard(discussion);
  track.appendChild(card);
});

// Slider button references
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

// Calculate how much to scroll (card width + gap)
function getScrollAmount() {
  const card = track.querySelector(".discussion-card");
  if (!card) return 320; // fallback width
  const gap = parseInt(window.getComputedStyle(track).gap) || 0;
  return card.offsetWidth + gap;
}

// Scroll left by one card width with smooth animation
prevBtn.addEventListener("click", () => {
  track.scrollBy({ left: -getScrollAmount(), behavior: "smooth" });
  resetAutoSlideTimer();
});

// Scroll right by one card width with smooth animation
nextBtn.addEventListener("click", () => {
  track.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
  resetAutoSlideTimer();
});

// Auto-slide interval in milliseconds
const autoSlideInterval = 3000;

// Function to check if we are near the end of the scroll
function isAtEnd() {
  return track.scrollLeft + track.clientWidth >= track.scrollWidth - 5;
}

// Function to auto-slide right with wrap-around
function autoSlide() {
  if (isAtEnd()) {
    track.scrollTo({ left: 0, behavior: "smooth" });
  } else {
    track.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
  }
}

// Timer variable
let slideTimer = setInterval(autoSlide, autoSlideInterval);

// Reset the auto-slide timer (called on button clicks)
function resetAutoSlideTimer() {
  clearInterval(slideTimer);
  slideTimer = setInterval(autoSlide, autoSlideInterval);
}

// Pause auto-slide on mouse enter
track.addEventListener("mouseenter", () => clearInterval(slideTimer));

// Resume auto-slide on mouse leave
track.addEventListener("mouseleave", () => {
  slideTimer = setInterval(autoSlide, autoSlideInterval);
});


// Data for New Realeases
const newReleasesData = [
  {
  id: 1,
  title: 'The Alchemist', 
  author: 'Paulo Coelho', 
  img : 'alchemist.jpeg', 
  price: 'XAF 5000', 
  rating: 1.5,
  publishedYear: '2020', 
  pages: '300',
  descTitle: 'Red Wolf is a dark, action-packed fantasy about a girl who will do anythingprotect the ones she loves—even if it means becoming a monster herself.',
  descBody: 'When Adeles village is attacked by werewolves, she discovers she has the poto transform into a wolf. Now she must learn to control her new abilities before she loherself to the beast within. This book will help you identify your strengths, align yactions with your values, and create a life of fulfillment and purpose.',
  tags: ['Horror']
  },
  {
  id: 2,
  title: 'Immortals', 
  author: 'Paulo Coelho', 
  img : 'immortals.jpg', 
  price: 'XAF 5000', 
  rating: 4.8,
  publishedYear: '2020', 
  pages: '300',
  descTitle: 'Red Wolf is a dark, action-packed fantasy about a girl who will do anythingprotect the ones she loves—even if it means becoming a monster herself.',
  descBody: 'When Adeles village is attacked by werewolves, she discovers she has the poto transform into a wolf. Now she must learn to control her new abilities before she loherself to the beast within. This book will help you identify your strengths, align yactions with your values, and create a life of fulfillment and purpose.',
  tags: ['Horror']
  },
  {
  id: 3,
  title: 'The Glitch', 
  author: 'Paulo Coelho', 
  img : 'glitch.jpg', 
  price: 'XAF 8000', 
  rating: 4.5,
  publishedYear: '2020', 
  pages: '300',
  descTitle: 'Red Wolf is a dark, action-packed fantasy about a girl who will do anythingprotect the ones she loves—even if it means becoming a monster herself.',
  descBody: 'When Adeles village is attacked by werewolves, she discovers she has the poto transform into a wolf. Now she must learn to control her new abilities before she loherself to the beast within. This book will help you identify your strengths, align yactions with your values, and create a life of fulfillment and purpose.',
  tags: ['Horror','Fiction']
  }
];

const newReleasesContainer = document.querySelector('.newReleases');

newReleasesData.forEach(book => {
  // Tags Loop
  let tagsHTML = "";
  book.tags.forEach(tag => {
    tagsHTML += `<span class="tag category-badge">${tag}</span>`;
  });

  // Stars Loop
  const fullStars = Math.floor(book.rating);
  const halfStar = (book.rating - fullStars) >= 0.5;
  let starsHTML = '';
  for (let i = 0; i < fullStars; i++) {
    starsHTML += '<i class="fa fa-star"></i>';
  }
  if (halfStar) {
    starsHTML += '<i class="fa fa-star-half-alt"></i>';
  }

  // Card HTML
  let cardHTML = `
    <div class="card" data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000">
      <img src="../assets/img/${book.img}" alt="${book.title}"/>
      <div class="card-body">
      
        <!-- Title and Author -->
        <h5 class="card-title">${book.title}</h5>
        <p class="card-text text-muted">By ${book.author}</p>
        <!-- Pricing and Rating -->
        <div class="d-flex justify-content-between align-items-center">
          <span class="fw-bold h6">${book.price}</span>
          <div class="text-warning">
            ${starsHTML}
            <small class="text-muted">${book.rating}</small>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between bg-light">
      <span class="d-flex gap-2 btn-flex">
              <button class="btn-sm add-btn">Add to Cart</button>
              <button class="btn-sm view-btn" data-bs-toggle="modal" data-bs-target="#bookModal${book.id}">Details</button>
            </span>
              <button class="btn btn-outline-secondary btn-sm btn-fav"><i class="fa-regular fa-heart"></i></button>
      </div>
    </div>
  
  <div class="modal fade" id="bookModal${book.id}" tabindex="-1" aria-labelledby="bookModalLabel${book.id}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookModal">${book.title}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <img src="../assets/img/${book.img}" class="img-fluid" alt="${book.title}">
          </div>
          <div class="col-md-8">
            <p><strong>Author:</strong>${book.author}</p>
            <p><strong>Price:</strong>${book.price}</p>
            <p><strong>Published:</strong>${book.publishedYear}</p>
            <p><strong>Pages:</strong>${book.pages}</p>
            <hr>
            <p><strong>Description:</strong></p>
            <p>${book.descTitle}</p>
            <p>${book.descBody}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Add to Cart</button>
        <button type="button" class="btn btn-primary">Buy & Download</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  `

  // Append to container
  newReleasesContainer.innerHTML += cardHTML;
});



</script>

</body>
</html>
