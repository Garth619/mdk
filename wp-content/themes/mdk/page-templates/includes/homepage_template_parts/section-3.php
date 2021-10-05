<section id='section-three'>

  <div id='sec-three-content'>

    <span id='sec-three-title'><?php the_field('section_three_title');?></span><!-- sec-three-title -->

    <span id='sec-three-descrip'><?php the_field('section_three_description');?></span><!-- sec-three-descrip -->

    <a id='sec-three-button' class='button-two'
      href='<?php the_field('section_three_button_link');?>'><?php the_field('section_three_button_verbiage');?></a>
    <!-- sec-three-button -->

  </div><!-- sec-three-content -->

  <div id='sec-three-case-results'>

    <div id='sec-three-arrow-left' class='sec-three-arrow'>

      <img class='sec-three-svg-arrow lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg'
        alt='' />

    </div><!-- sec-three-arrow-left -->

    <div id='sec-three-slider'>

      <?php if (have_rows('section_three_slider')): ?>
      <?php while (have_rows('section_three_slider')): the_row();?>

      <div class='sec-three-single-slide cr-click'>

        <div class='sec-three-single-inner'>

          <div class='sec-three-single-cr'>

            <div class='sec-three-single-cr-content'>

              <span class='sec-three-single-amount'><?php the_sub_field('amount');?></span>
              <!-- sec-three-single-amount -->

              <span class='sec-three-single-type'><?php the_sub_field('type');?></span><!-- sec-three-single-type -->

              <img class='svg-arrow lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg'
                alt='' />

            </div><!-- sec-three-single-cr-content -->

            <?php $image = get_sub_field('image');?>

            <img class='sec-three-single-img lazyload' data-src="<?php echo $image['url']; ?>"
              alt="<?php echo $image['alt']; ?>" />

          </div><!-- sec-three-single-cr -->

          <div class='sec-three-single-hover'>

            <span class='sec-three-hover-type'><?php the_sub_field('title');?></span><!-- sec-three-hover-type -->

            <span class='sec-three-hover-descrip'><?php the_sub_field('description');?></span>
            <!-- sec-three-hover-descrip -->

          </div><!-- sec-three-single-hover -->

        </div><!-- sec-three-single-inner -->

      </div><!-- sec-three-single-slide -->

      <?php endwhile;?>

      <?php endif;?>

    </div><!-- sec-three-slider -->

    <div id='sec-three-arrow-right' class='sec-three-arrow'>

      <img class='sec-three-svg-arrow lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg'
        alt='' />

    </div><!-- sec-three-arrow-right -->

  </div><!-- sec-three-case-results -->

</section><!-- section-three -->