<?php

/* Template Name: About */

get_header();?>

<div id="internal-main">

  <div id='about-banner'>

    <div id='about-banner-content'>

      <div id='about-banner-top'>

        <span class='about-title'><?php the_field('about_title');?></span><!-- about-title -->

        <a class='about-button button-one'
          href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a>
        <!-- button-one -->

      </div><!-- about-banner-top -->

      <?php $about_image = get_field('about_image');?>
      <?php if ($about_image) {?>

      <div id='about-banner-bottom'>

        <div id='about-banner-img'>

          <img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['alt']; ?>" />

        </div><!-- about-banner-img -->

      </div><!-- about-banner-bottom -->

      <?php }?>

    </div><!-- about-banner-content -->

  </div><!-- about-banner -->

  <div id='page-container' class='about-container content'>

    <div id='page-content-top'>

      <?php the_field('about_top_content');?>

    </div><!-- page-content-top -->

    <div id='page-content-middle'>

      <?php if (get_field('about_middle_quote')) {?>

      <blockquote>

        <p><?php the_field('about_middle_quote');?></p>

        <?php if (get_field('about_middle_quote')) {?>

        <p class='client-name'><?php the_field('about_middle_quote_name');?></p>

        <?php }?>

      </blockquote>

      <?php }?>

      <?php $about_middle_image = get_field('about_middle_image');?>
      <?php if ($about_middle_image) {?>

      <div id='page-content-middle-img'>

        <img src="<?php echo $about_middle_image['url']; ?>" alt="<?php echo $about_middle_image['alt']; ?>" />

      </div><!-- page-content-middle-img -->

      <?php }?>

    </div><!-- page-content-middle -->

    <?php if (get_field('about_bottom_content')) {?>

    <div id='page-content-bottom'>

      <?php the_field('about_bottom_content');?>

    </div><!-- page-content-bottom -->

    <?php }?>

  </div><!-- page-container -->

  <?php get_template_part('page-templates/includes/awards-slider/template', 'awards_slider');?>

</div><!-- internal-main -->

<?php get_footer();?>