$(document).ready(function() {
    /* detect scroll */
    var bglightEnabled = false;

    $(window).scroll(function(event) {
        var scroll = $(window).scrollTop();
        // Do something
        if (scroll == 0) {
            bglightEnabled = false;
            $(".navbar").toggleClass("bg-dark-transparent");
            $(".navbar").toggleClass("bg-light-transparent");
            $(".nav-item a").toggleClass("text-light");
        } else if (bglightEnabled == false) {
            $(".navbar").toggleClass("bg-dark-transparent");
            $(".navbar").toggleClass("bg-light-transparent");
            $(".nav-item a").toggleClass("text-light");

            bglightEnabled = true;
        }
    });

    $(".navbar-toggler").on("click", function() {

        if (bglightEnabled == false) {
            bglightEnabled = true;
            $(".navbar").toggleClass("bg-dark-transparent");
            $(".navbar").toggleClass("bg-light-transparent");
            $(".nav-item a").toggleClass("text-light");

        }

    });



});