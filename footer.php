<footer class="footer">
  <div class="container bg">
    <div class="footer__nav">
      <a href="<?=home_url();?>" class="footer__nav__logo"><img src="<?= the_field('options--logo', "option") ?>" alt="#"></a>
      <div class="footer__nav__menu">
        <?php
          wp_nav_menu( array(
              'theme_location' => 'main-menu'
          ) );
        ?>
      </div>
    </div>
    <div class="footer__content">
      <div class="footer__content__column">
        <span class="footer__content__column__title"><?= the_field('options--contact_titre', "option") ?></span>
        <div class="footer__content__column__content">
          <?= the_field('options--contact_information', "option") ?>
        </div>
        <div class="footer__content__column__copyright">
          <?= the_field('options--copyright', "option") ?>
        </div>
      </div>
      <div class="footer__content__column">
        <span class="footer__content__column__title"><?= the_field('options--horaire_title', "option") ?></span>
        <div class="footer__content__column__content">
          <?php
            if( have_rows('options--horaire_semaine', 'option') ):
                while ( have_rows('options--horaire_semaine', 'option') ) : the_row();
                    $footer__day = get_sub_field('options--horaire_jour', 'option');
                    ?>
                      <p class="footer__content__column__content__txt"><?= $footer__day ?></p>
                    <?php
                endwhile;
            else :
            endif;
          ?>
        </div>
      </div>
      <div class="footer__content__column">
        <span class="footer__content__column__title"><?= the_field('options--reseaux_titre', "option") ?></span>
        <div class="footer__content__column__content">
          <?php
            if( have_rows('options--reseaux_repeat', 'option') ):
                while ( have_rows('options--reseaux_repeat', 'option') ) : the_row();
                    $footer__sociale__name = get_sub_field('options--reseaux_repeat--nom', 'option');
                    $footer__sociale__link = get_sub_field('options--reseaux_repeat--lien', 'option');
                    ?>
                      <a href="<?= $footer__sociale__link ?>" class="footer__content__column__content__link"><?= $footer__sociale__name ?></a>
                    <?php
                endwhile;
            else :
            endif;
          ?>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  if(window.innerWidth > 900) {
    // Tu.tScroll({
    //   't-element': '.fadeRight',
    //   't-delay': 0.5,
    //   't-duration': 0.8
    // })
    // Tu.tScroll({
    //   't-element': '.fadeUp',
    //   't-delay': 0.5,
    //   't-duration': 0.8
    // })
    // Tu.tScroll({
    //   't-element': '.fadeLeft',
    //   't-delay': 0.5,
    //   't-duration': 0.8
    // })
    // Tu.tScroll({
    //   't-element': '.fadeDown',
    //   't-delay': 0.5,
    //   't-duration': 0.8
    // })
    // Tu.tScroll({
    //   't-element': '.fadeIn',
    //   't-delay': 0.5,
    //   't-duration': 0.8
    // })
  }
  </script>
</footer>
<!-- Execution de la fonction wp_footer() obligatoire ! -->
<?php wp_footer();  ?>
</body>
</html>
