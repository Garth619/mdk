<?php get_header();?>

<div id="internal-main" class='pa-banner'>

  <?php get_template_part('page-templates/includes/page_banner/template', 'banner_blog');?>

  <div id='page-container' class='two-col'>

    <div id='page-content' class='content'>

      <a id='banner-button' class='button pa-banner-button' href='#consultation'>

        <button><?php the_field('global_internal_banner_button_verbiage', 'option');?><span
            class='button-tri'><span></button>

      </a><!-- button -->

      <?php get_template_part('loop', 'single');?>

    </div><!-- page-content -->

    <?php if (!get_field('disable_sidebar')) {

    get_sidebar();

}?>

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>