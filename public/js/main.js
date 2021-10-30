/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
$('document').ready(function () {
  $('#btn-menu').on('click', function () {
    $('#span-menu').toggleClass('fa-bars fa-times');
    $('.main-menu').toggleClass('-translate-x-full');
  });
  $('.down-trigger').each(function () {
    $(this).on('click', function () {
      id = $(this).attr('id');
      $('.div-content').each(function () {
        if (!$(this).hasClass(id)) {
          $(this).slideUp();
        }
      });
      $('span').each(function () {
        if (!$(this).hasClass(id)) {
          $(this).removeClass('-rotate-90');
        }
      });
      $('div.' + id).toggle('', false);
      $('span.' + id).toggleClass('-rotate-90');
    });
  });
});
/******/ })()
;