jQuery(function($){
    $(document).ready(function(){
        $('.Items').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 4,           
            centerMode: true,
            draggable: true,
            prevArrow: '<i class="fas fa-chevron-circle-left prev"></i>',
            nextArrow: '<i class="fas fa-chevron-circle-right next"></i>'
        });
    });
});
