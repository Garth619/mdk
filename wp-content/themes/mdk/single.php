<?php get_header();?>

<div id="internal-main" class='pa-banner'>

  <?php get_template_part('page-templates/includes/page_banner/template', 'banner_blog');?>

  <div id='page-container' class='two-col'>

    <div id='page-content'>

      <a class='page-button button-one'
        href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a>
      <!-- button-one -->

      <div id='page-content-inner' class='content'>

        <?php get_template_part('loop', 'single');?>

      </div><!-- page-content-inner -->

    </div><!-- page-content -->

    <?php if (!get_field('disable_sidebar')) {

    get_sidebar();

}?>

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>