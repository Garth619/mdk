<?php

/* Template Name: Att Bio */

get_header();?>

<div id="internal-main">

  <div id='banner-wrapper' class='bio-banner'>

    <div id='banner-bio-content'>

      <div id='banner-bio-spacer'></div><!-- banner-bio-spacer -->

      <div id='banner-bio-title-wrapper'>

        <h1 id='att-title'><?php the_title();?></h1><!-- banner-title -->

        <?php if (get_field('attorney_positions')) {?>

        <span id='att-position'><?php the_field('attorney_positions');?></span><!-- att-position -->

        <?php }?>

      </div><!-- banner-bio-title-wrapper -->

    </div><!-- banner-bio-content -->

  </div><!-- banner-wrapper -->

  <div id='page-container' class='two-col bio-container'>

    <div id='bio-page-content'>

      <div id='page-content-inner' class='content'>

        <?php $attorney_bio_image = get_field('attorney_bio_image');?>

        <?php if ($attorney_bio_image) {?>

        <div class='bio-att-img-wrapper'>

          <img class='bio-att-img' src="<?php echo $attorney_bio_image['url']; ?>"
            alt="<?php echo $attorney_bio_image['alt']; ?>" />

        </div><!-- bio-att-img-wrapper -->

        <?php }?>

        <?php the_content();?>

        <?php if (have_rows('client_testimonials')): ?>

        <div id='client-testimonials'>

          <?php while (have_rows('client_testimonials')): the_row();?>

          <span class='att-title'><?php the_sub_field('title');?></span><!-- att-title -->

          <?php if (have_rows('single_testimonial')): ?>

          <div id='single-client-testimonials'>

            <?php while (have_rows('single_testimonial')): the_row();?>

            <blockquote>

              <?php the_sub_field('description');?>

              <p class='bio-client-name'><?php the_sub_field('name');?></p>

            </blockquote>

            <?php endwhile;?>

          </div><!-- single-client-testimonials -->
          <?php endif;?>

          <?php endwhile;?>

        </div><!-- client-testimonials -->

        <?php endif;?>

      </div><!-- page-content-inner -->

    </div><!-- bio-page-content -->

    <div id='bio-sidebar-wrapper' class='content'>
      <?php if ($attorney_bio_image) {?>

      <div class='bio-att-img-wrapper'>

        <img class='bio-att-img' src="<?php echo $attorney_bio_image['url']; ?>"
          alt="<?php echo $attorney_bio_image['alt']; ?>" />

      </div><!-- bio-att-img-wrapper -->

      <?php }?>

      <?php if (have_rows('sidebar_box')): ?>

      <?php while (have_rows('sidebar_box')): the_row();?>

      <span class='att-title'><?php the_sub_field('title');?></span><!-- att-title -->

      <?php if (have_rows('sidebar_list')): ?>

      <ul>

        <?php while (have_rows('sidebar_list')): the_row();?>

        <li><?php the_sub_field('list_item');?></li>

        <?php endwhile;?>

      </ul>
      <?php endif;?>

      <?php endwhile;?>

      <?php endif;?>

    </div><!-- bio-sidebar-wrapper -->

  </div><!-- page-container -->

  <?php if (have_rows('bio_awards_slider')): ?>

  <div id='bio-awards-wrapper'>

    <span id='bio-awards-title'><?php the_field('bio_awards_title');?></span><!-- bio-awards-title -->

    <div id='bio-awards-inner'>

      <div id='bio-arrow-left' class='bio-arrow'>

        <img class='bio-svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='' />

      </div><!-- bio-arrow-left -->

      <div id='bio-slider'>

        <?php while (have_rows('bio_awards_slider')): the_row();?>

        <div class='bio-slide'>

          <?php $image = get_sub_field('image');?>

          <?php if ($image) {?>

          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

          <?php }?>

        </div><!-- bio-slide -->

        <?php endwhile;?>

      </div><!-- bio-slider -->

      <div id='bio-arrow-right' class='bio-arrow'>

        <img class='bio-svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='' />

      </div><!-- bio-arrow-right -->

    </div><!-- bio-awards-inner -->

  </div><!-- bio-awards-wrapper -->

  <?php endif;?>

</div><!-- internal-main -->

<?php get_footer();?>