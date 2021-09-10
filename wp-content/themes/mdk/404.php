<?php get_header();?>

<div id="internal-main">

  <div id='banner-wrapper'>

    <div id='banner-content'>

      <h1 class='banner-title banner-title-large'><?php the_field('not_found_title', 'option');?></h1>
      <!-- banner-title -->

      <a class='banner-button button-one'
        href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a>
      <!-- button-one -->

    </div><!-- banner-content -->

    <?php get_template_part('page-templates/includes/page_banner/template', 'banner_background');?>

  </div><!-- banner-wrapper -->

  <div id='page-container' class='two-col'>

    <div id='page-content'>

      <a class='page-button button-one'
        href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a>
      <!-- button-one -->

      <div id='page-content-inner' class='content'>

        <?php the_field('not_found_content', 'option');?>

      </div><!-- page-content-inner -->

    </div><!-- page-content -->

    <?php if (!get_field('disable_sidebar')) {

    get_sidebar();

}?>

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>