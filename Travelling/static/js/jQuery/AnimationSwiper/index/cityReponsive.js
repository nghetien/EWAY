$(document).ready(()=>{
    var swiperCity = new Swiper('.city-swipper__container', {
        effect: 'coverflow',
        grabCursor: true,
        initialSlide:0,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        pagination: {
          el: '.city-swipper__swiper-pagination',
        },
        on:{
          pagebeforeshow:function(){
            this.swiperTo(2,1,true);
          }
        }
    });
});