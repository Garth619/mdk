<?php

/* Template Name: Testimonials */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_page_title');

}?>

  <div id='page-container'>

    <?php if (have_rows('video_options')): ?>

    <div id='testimonial-video-wrapper'>

      <div id='testimonial-video-arrow-left' class='testimonial-video-arrow'>

        <img class='testimonial-video-arrow-svg' src='<?php bloginfo('template_directory');?>/images/arrow.svg'
          alt='' />

      </div><!-- testimonial-video-arrow-left -->

      <div id='testimonial-video-slider'>

        <?php while (have_rows('video_options')): the_row();?>

        <?php get_template_part('page-templates/includes/video/template', 'video');?>

        <?php endwhile;?>

      </div><!-- testimonial-video-slider -->

      <div id='testimonial-video-arrow-right' class='testimonial-video-arrow'>

        <img class='testimonial-video-arrow-svg' src='<?php bloginfo('template_directory');?>/images/arrow.svg'
          alt='' />

      </div><!-- testimonial-video-arrow-right -->

    </div><!-- testimonial-video-wrapper -->

    <?php if (get_field('wistia_or_youtube') == 'Wistia') {?>

    <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>

    <?php }?>

    <?php endif;?>

    <div id='testimonial-wrapper'>

      <?php if (have_rows('testimonials')): ?>
      <?php while (have_rows('testimonials')): the_row();?>

      <div class='single-testi content'>

        <?php echo file_get_contents(get_template_directory() . '/images/stars.svg'); ?>

        <div class='single-testi-intro'>

          <?php the_sub_field('intro');?>

        </div><!-- single-testi-intro -->

        <div class='single-testi-descrip content'>

          <?php the_sub_field('description');?>

          <span class='single-testi-name'><?php the_sub_field('name');?></span><!-- single-testi-name -->

          <?php $image = get_sub_field('image');?>

          <?php if ($image) {?>

          <div class='single-testi-social-icon'>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <span>Review</span>

          </div><!-- single-testi-social-icon -->

          <?php }?>

        </div><!-- single-testi-descrip -->

      </div><!-- single-testi -->

      <?php endwhile;?>

      <?php endif;?>

    </div><!-- testimonial-wrapper -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>