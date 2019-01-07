<?php
  add_action( 'wp_ajax_ajax_realisation', 'ajax_realisation' );
  add_action( 'wp_ajax_nopriv_ajax_realisation', 'ajax_realisation' );

  function ajax_realisation() {
    global $wpdb, $_POST;
    $args = array(
      'post_type' => 'réalisation',
      'post_status' => 'publish',
      'offset'     => 15,
      'orderby' => 'date',
      'order'   => 'ASC',
    );

    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
      $gridElNumber = 5;
      $index = 0;
      $newStep = 0;
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $imageRealisation = get_field( "realisations_image" );
            if($newStep === 5) {
              ?>
                </div>
              <?php
            }
            if($index % $gridElNumber === 0)  {
              $newStep = 0;
              ?>
              <div class="realisationContainer__wrapper__grid">
              <?php
            }
            $newStep += 1;
            ?>
              <div class="realisationContainer__wrapper__item" style="background-image: url(<?= $imageRealisation ?>);'"></div>
            <?php
              $index += 1;

        }
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        // no posts found
    }
      die();
  }
?>