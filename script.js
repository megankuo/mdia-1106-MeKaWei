$(document).ready(function () {
  $('.card').click(function () {
    $(this).toggleClass('flipped');
  });

  //nav bar
  //   var vh = window.innerHeight;
  //   $(window).on('scroll', () => {
  //     let distance = $(window).scrollTop();
  //     if (distance > $('header').height()) {
  //       $('nav').addClass('sticky-bar');
  //     } else {
  //       $('nav').removeClass('sticky-bar');
  //     }
  //   });
});

//homepage slideshow

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName('carousel');
  var dots = document.getElementsByClassName('dot');
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(' active', '');
  }
  slides[slideIndex - 1].style.display = 'block';
  dots[slideIndex - 1].className += ' active';
}
