<?php

/* Template Name: Attorney Bio */

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

        <div class='bio-att-img-wrapper'>

          <?php if ($attorney_bio_image) {?>

          <img class='bio-att-img' src="<?php echo $attorney_bio_image['url']; ?>"
            alt="<?php echo $attorney_bio_image['alt']; ?>" />

          <?php } else {?>

          <img class='bio-att-img' src="<?php bloginfo('template_directory');?>/images/att-placeholder.jpg"
            alt="placeholder" />

          <?php }?>

        </div><!-- bio-att-img-wrapper -->

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

              <p class='client-name'><?php the_sub_field('name');?></p>

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

      <div class='bio-att-img-wrapper'>

        <?php if ($attorney_bio_image) {?>

        <img class='bio-att-img' src="<?php echo $attorney_bio_image['url']; ?>"
          alt="<?php echo $attorney_bio_image['alt']; ?>" />

        <?php } else {?>

        <img class='bio-att-img' src="<?php bloginfo('template_directory');?>/images/att-placeholder.jpg"
          alt="placeholder" />

        <?php }?>

      </div><!-- bio-att-img-wrapper -->

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

  <?php get_template_part('page-templates/includes/awards-slider/template', 'awards_slider');?>

</div><!-- internal-main -->

<?php get_footer();?>