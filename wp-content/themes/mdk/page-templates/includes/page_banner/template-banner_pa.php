<div id='banner-wrapper'>

  <div id='banner-content'>

    <?php if (get_field('banner_h1') == "Yes"): ?>

    <h1 class='banner-title'><?php the_title();?></h1><!-- banner-title -->

    <?php else: ?>

    <?php if (get_field('banner_title')): ?>

    <span class='banner-title'><?php the_field('banner_title');?></span><!-- banner-title -->

    <?php else: ?>

    <span class='banner-title'><?php the_field('global_internal_banner_title', 'option');?></span>
    <!-- banner-title -->

    <?php endif;?>

    <?php endif;?>

    <a class='banner-button button-one'
      href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a><!-- button-one -->

  </div><!-- banner-content -->

  <picture>

    <source media='(min-width: 1800px)' srcset='<?php bloginfo('template_directory');?>/images/int-hero-1920.jpg'>

    <source media='(min-width: 1380px)' srcset='<?php bloginfo('template_directory');?>/images/int-hero-1400.jpg'>

    <source media='(min-width: 1170px)' srcset='<?php bloginfo('template_directory');?>/images/int-hero-1200.jpg'>

    <source media='(min-width: 768px)' srcset='<?php bloginfo('template_directory');?>/images/int-hero-768.jpg'>

    <img id='banner-image' src='<?php bloginfo('template_directory');?>/images/int-hero-360.jpg' alt='' />

  </picture>

</div><!-- banner-wrapper -->