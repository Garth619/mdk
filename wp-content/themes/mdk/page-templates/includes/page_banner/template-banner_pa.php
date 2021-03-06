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

  <?php get_template_part('page-templates/includes/page_banner/template', 'banner_background');?>

</div><!-- banner-wrapper -->