var vh = window.innerHeight;

$(function () {
  $(window).on('scroll', () => {
    let distance = $(window).scrollTop();
    if (distance > $('header').height()) {
      $('nav').addClass('sticky-bar');
    } else {
      $('nav').removeClass('sticky-bar');
    }

    if ($(document).scrollTop() > vh) {
      $('p').addClass('test');
    } else {
      $('p').removeClass('test');
    }
  });
});
