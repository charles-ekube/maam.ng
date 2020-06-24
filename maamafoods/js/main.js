$(document).ready(function(){
    $('.sidenav').sidenav();


    $('.carousel').carousel({
        shift: 30,
        dist: 160,
    });

    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });

    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
        constrainWidth:false,
        alingment: 'right',
        autoTrigger:false
    });


});
