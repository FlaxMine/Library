jQuery(function($){
    $(document).ready(function(){
        $('.Items').slick({
            infinite: true,
            slidesToShow: 8,
            slidesToScroll: 2,          
            draggable: true,
            prevArrow: '<i class="fas fa-chevron-circle-left prev"></i>',
            nextArrow: '<i class="fas fa-chevron-circle-right next"></i>'
        });
    });
});
