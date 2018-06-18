require('slick-carousel');
require('jquery-visible');

jQuery(document).ready(() => {
  // Wrap embedded objects and force them into 16:9
  $('#container iframe, #container embed, #container video').not('.ignore-ratio').wrap('<div class="video-container" />');

  // HEADER: Responsive Nav Toggle
  $('#responsive-nav-toggle').click(e => {
    e.preventDefault();
    const $this = $(e.currentTarget);
    $this.toggleClass('is-active');
    $('#nav-responsive').toggleClass('is-active');
  });

  // HEADER: Responsive Nav Contact
  $('#responsive-contact-button').click(() => {
    $('html, body').animate({ scrollTop: 0 }, 1500);
    $('#nav-responsive, #responsive-nav-toggle').removeClass('is-active');
    $('#header-contact').slideDown();
    $('#header-contact-button').addClass('is-active');
  });

  // HEADER: Contact Toggle
  $('#header-contact-button').click(e => {
    const $this = $(e.currentTarget);
    $this.toggleClass('is-active');
    $('#header-contact').slideToggle();
  });

  // MODULES: Parallax
  $(window).on('load resize scroll', () => {
    const d_scroll = $(window).scrollTop();
    const w_height = $(window).height();
    $('.animate-parallax').each((i,e) => {
      const $this = $(e);
      const $thisBg = $this.find('.module-bg');
      const p_position = $this.offset().top;
      const e_height = $this.outerHeight();
      const ebg_height = $this.find('.module-bg').outerHeight();
      const bg_diff = ebg_height - e_height;
      const dhit_in = p_position - w_height;
      const dhit_out = p_position + e_height;
      const dhit_read = p_position - w_height - d_scroll;
      // Boolean hit Check
      if (dhit_read <= 0 && d_scroll <= dhit_out) {
        const per_scrolled = (d_scroll - dhit_in) / (dhit_out - dhit_in);
        const offset = (bg_diff * per_scrolled) ;
        $thisBg.css('transform', `translateY(-${offset}px)`);
      }
    });
  });

  // MODULES: Animate onScreen
  $(window).on('load resize scroll', () => {
    $('.animate-on-enter').each((i, el) => {
      const $this = $(el);
      if($this.visible(true)) {
        $this.addClass('is-visible');
      }
    });
    $('.animate-on-leave').each((i, el) => {
      const $this = $(el);
      if(!$this.visible(true)) {
        $this.removeClass('is-visible');
      }
    });
  });

  // MODULE: Carousel
  $('#module-carousel').slick({
    slide: 'div',
    arrows: false,
    dots: true,
    appendDots: $('#carousel-count'),
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 10000,
    speed: 2250,
    pauseOnHover: false,
  });
  $('#module-carousel').on('afterChange', () => {
    const i = $('#module-carousel > .slick-list > .slick-track > .slick-active').data('slick-index') + 1;
    $('#carousel-count-number .current').text(i);
  });
  $('.carousel-images').slick({
    slide: 'div',
    fade: true,
    autoplay: true,
    prevArrow: $('.carousel-images-prev'),
    nextArrow: $('.carousel-images-next'),
  });
});
