<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<style>
.page-loader {
  position: fixed;
  inset: 0;
  background-color: #fff;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.loader-text {
  margin-top: 1rem;
  color: var(--primary-clr);
  font-weight: 600;
  font-size: 1.1rem;
}

/* Loader wrapper */
.slant-book-loader {
  position: relative;
  width: 80px;
  height: 100px;
  perspective: 1000px;
}

/* Book shape */
.slant-book-loader .book {
  width: 100%;
  height: 100%;
  background-color: var(--pure-white);
  border: 2px solid var(--primary-clr);
  border-radius: 6px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  position: absolute;
  top: 0;
  left: 0;
  transform-origin: left center;
  transform-style: preserve-3d;
  animation: slantFlip 1.5s infinite ease-in-out;
}

/* Animation delay for multiple flipping books */
.slant-book-loader .book.delay-1 {
  animation-delay: 0.2s;
}
.slant-book-loader .book.delay-2 {
  animation-delay: 0.4s;
}

/* Flip animation with slant and 3D twist */
@keyframes slantFlip {
  0% {
    transform: rotateY(0deg) rotateX(10deg) rotateZ(-10deg);
    opacity: 1;
  }
  50% {
    transform: rotateY(180deg) rotateX(10deg) rotateZ(-10deg);
    opacity: 0.7;
  }
  100% {
    transform: rotateY(360deg) rotateX(10deg) rotateZ(-10deg);
    opacity: 1;
  }
}



</style>
<body>
    
 <div class="page-loader animate__animated">
  <div class="slant-book-loader">
    <div class="book"></div>
    <div class="book delay-1"></div>
    <div class="book delay-2"></div>
  </div>
  <h4 class="loader-text">Flipping through the pages...</h4>
</div>



<script>
// Page loader
window.addEventListener('load', function() {
    setTimeout(function() {
    const loader = document.querySelector('.page-loader');
    loader.classList.add('animate__fadeOut');
    setTimeout(() => {
      loader.style.display = 'none';
    }, 500); // Match with fadeOut duration
  }, 500);
});
       
</script>
</body>
</html>