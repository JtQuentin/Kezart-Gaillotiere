/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
/*jslint white: true */
/*jslint node: true */
/*global $, jQuery, Swiper, ScrollMagic*/


//Using Vanilla JS
document.querySelector(".hamburguer").addEventListener("click", function(){
	"use strict";
	document.querySelector(".full-menu").classList.toggle("active");
	document.querySelector(".hamburguer").classList.toggle("close-hamburguer");
});
