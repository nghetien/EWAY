$(document).ready(()=>{
    var swiper = new Swiper('.home-stay__swiper-container', {
        slidesPerView: 4,
        spaceBetween: 40,
        breakpoints: {
          456: {
            slidesPerView: 1,
            spaceBetween: 10
          },
          576: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 30
          },
          1200: {
            slidesPerView: 4,
            spaceBetween: 40
          },
        },
        pagination: {
            el: '.home-stay__swiper-pagination',
            clickable: true,
        },
      })
});