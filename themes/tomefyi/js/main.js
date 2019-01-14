(function ($, Drupal) {

  Drupal.behaviors.tomeFyiBurger = {
    attach: function attach(context, settings) {
      $('.burger', context).once('tome-burger').on('click', function () {
        $(this).siblings('.burger-menu').toggleClass('expanded');
      });
    }
  };

  Drupal.behaviors.tomeFyiProxyClick = {
    attach: function attach(context, settings) {
      $('[data-proxy-click]', context).once('tome-proxy-click').on('click', function () {
        $(this).find('[data-proxy-click-target] a')[0].click();
      });
    }
  };

})(jQuery, Drupal);
