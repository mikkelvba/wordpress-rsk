jQuery(document).ready(function($){
$('.slider').slick({ // dette er din ydre container
dots: true, // her bliver radio dots slået fra
autoplay: true,
autoplaySpeed: 4000,
pauseOnHover: false,
draggable: false,
infinite: true, // looper tilbage til starten når enden er nået
swipe: false, // Ingen swipe
speed: 500, //hastighed
slidesToShow: 1, // hvor mange der skal vises i bredden "per side"
slidesToScroll: 1, // hvor mange skal der slides per tryk
prevArrow: false,
nextArrow: false,
});
$('.sub-slider').slick({ // dette er din ydre container
dots: true, // her bliver radio dots slået fra
autoplay: true,
draggable: false,
pauseOnHover: false,
infinite: true, // looper tilbage til starten når enden er nået
swipe: false, // Ingen swipe
speed: 500, //hastighed
slidesToShow: 8, // hvor mange der skal vises i bredden "per side"
slidesToScroll: 8, // hvor mange skal der slides per tryk
prevArrow: false,
nextArrow: false,
});
});