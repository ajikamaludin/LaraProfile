(function ($) {

 'use strict';

 $.fn.firstVisitLoader = function (settings) {

  var $body = $('body');
  var $dialog = $(this);
  var $blackout;
  var setCookie = function (name, value) {
   var date = new Date(),
    expires = 'expires=';
   date.setTime(date.getTime() + 86400000);
   expires += date.toGMTString();
   document.cookie = name + '=' + value + '; ' + expires + '; path=/';
  }
  var getCookie = function (name) {
   var allCookies = document.cookie.split(';'),
    cookieCounter = 0,
    currentCookie = '';
   for (cookieCounter = 0; cookieCounter < allCookies.length; cookieCounter++) {
    currentCookie = allCookies[cookieCounter];
    while (currentCookie.charAt(0) === ' ') {
     currentCookie = currentCookie.substring(1, currentCookie.length);
    }
    if (currentCookie.indexOf(name + '=') === 0) {
     return currentCookie.substring(name.length + 1, currentCookie.length);
    }
   }
   return false;
  }
  var showMessage = function () {
   $blackout.show();
   $dialog.show();
  }
  var hideMessage = function () {
   $blackout.hide();
   $dialog.hide();
   setCookie('intro' + settings.cookieName, 'true');
  }

  $body.append('<div class="intro"></div>');
  $blackout = $('.intro');

  if (getCookie('intro' + settings.cookieName)) {
   hideMessage();
  } else {
   showMessage();
  }

  $(settings.showAgainSelector).on('click', showMessage);
  $body.on('click', '.intro, .intro-img', hideMessage);

 };

})(jQuery);