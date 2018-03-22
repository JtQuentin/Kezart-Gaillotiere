/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
/*jslint white: true */
/*jslint node: true */
/*global $, jQuery, Swiper, ScrollMagic*/


var clickDelay = 500,
    clickDelayTimer = null;

jQuery(document).ready(function ($) {

    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

});

var controller = new ScrollMagic.Controller();
var scene = new ScrollMagic.Scene({
        triggerElement: "#trigger1"
    })
    .setClassToggle("#start", "end")
    .addTo(controller);

var links = $(".nav-item a");
$(links).click(function () {
    $(links).removeClass('active');
});
