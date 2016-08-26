/**
 * Created by codenroll on 03/08/16.
 */

jQuery(document).ready(function($){
    $(".cnr-recents").owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:true,
        //autoplay settings
        //autoplay: true,
       // autoplayTimeout:3000,
        //autoplayHoverPause:false,
        responsive:{
            0:{
                items:1
            },
        }
    })
});