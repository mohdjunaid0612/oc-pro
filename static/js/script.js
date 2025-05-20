

// Testimonial Swiper
const isMobile = window.innerWidth < 768; // You can adjust the breakpoint

const testimonialSwiper = new Swiper(".mySwiper", {
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: !isMobile ? {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  } : false, // disable arrows on mobile
});

$(function(){
    $('.btnToggleOption').click(function(){
        $(this).siblings('.mobileOption').slideToggle();
    });
})