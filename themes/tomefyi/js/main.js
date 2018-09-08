(function ($, Drupal) {

  // Source: https://stackoverflow.com/questions/487073/check-if-element-is-visible-after-scrolling
  function isScrolledIntoView (elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
  }

  $(window).on('scroll', function () {
    $('#coworkers').each(function () {
      $(this).toggleClass('in-view', isScrolledIntoView($(this)));
    });
  });

  Drupal.behaviors.tomeFyiBurger = {
    attach: function attach(context, settings) {
      $('.burger', context).once('tome-burger').on('click', function () {
        $(this).siblings('.burger-menu').toggleClass('expanded');
      });
    }
  };

})(jQuery, Drupal);
