<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Force a page reload on facet interaction
add_action( 'wp_footer', function() {
?>
<script>
  document.addEventListener('facetwp-refresh', function() {
      if (FWP.loaded) {
          // jQuery('html, body').animate({ scrollTop: 0 }, 0);
          FWP.setHash();
          window.location.reload();
      }
  });
</script>
<?php
}, 100 );

function fwp_add_facet_labels() {
    ?>
      <script>
        (function($) {
          $(document).on('facetwp-loaded', function() {
            $('.facetwp-facet').each(function() {
              var facet = $(this);
              var facet_name = facet.attr('data-name');
              var facet_type = facet.attr('data-type');
              var facet_label = FWP.settings.labels[facet_name];
              if (facet_type !== 'pager' && facet_type !== 'sort' && facet_type !== 'reset') {
                if (facet.closest('.facet-wrap').length < 1 && facet.closest('.facetwp-flyout').length < 1) {
                  facet.wrap('<div class="facet-wrap"></div>');
                  facet.before('<p class="facet-label">' + facet_label + '</p>');
                }
              }
            });
          });
        })(jQuery);
      </script>
    <?php
  }
  
  add_action( 'wp_head', 'fwp_add_facet_labels', 100 );


add_action( 'wp_head', 'fwp_scroll_to_top_on_refresh');
function fwp_scroll_to_top_on_refresh() { ?>

  <script>
      (function($) {
          $(document).on('facetwp-refresh', function() {
              if ( FWP.soft_refresh == true ) {
                  FWP.enable_scroll = true;
              } else {
                  // FWP.enable_scroll = false;
                  FWP.enable_scroll = true;                  
              }
          });
          $(document).on('facetwp-loaded', function() {
              if ( FWP.enable_scroll == true ) {
                  $('html, body').animate({ scrollTop: 0 }, 500);
              }
          });
      })(jQuery);
  </script>

<?php }