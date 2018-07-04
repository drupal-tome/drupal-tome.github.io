(function ($, Drupal) {

  Drupal.behaviors.tomeFyiBurger = {
    attach: function attach(context, settings) {
      $('.burger', context).once('tome-burger').on('click', function () {
        $(this).siblings('.burger-menu').toggleClass('expanded');
      });
    }
  };

})(jQuery, Drupal);
