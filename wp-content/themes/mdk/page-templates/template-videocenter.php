<?php

/* Template Name: Video Center */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_page_title');

}?>

  <div id='page-container'>

    <?php if (have_rows('video_options')): ?>

    <div id='video-wrapper'>

      <?php while (have_rows('video_options')): the_row();

    get_template_part('page-templates/includes/video/template', 'video');

endwhile;?>

    </div><!-- video-wrapper -->

    <?php if (get_field('wistia_or_youtube') == 'Wistia') {?>

    <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>

    <?php }?>

    <?php endif;?>

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>