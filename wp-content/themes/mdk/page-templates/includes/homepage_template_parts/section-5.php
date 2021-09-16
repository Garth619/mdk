<section id='section-five'>

  <div id='sec-five-content'>

    <span id='sec-five-title'><?php the_field('section_five_title');?></span><!-- sec-five-title -->

    <span id='sec-five-descrip'><?php the_field('section_five_description');?></span>
    <!-- sec-five-descrip -->

    <a id='sec-five-button' class='button-two'
      href='<?php the_field('section_five_button_link');?>'><?php the_field('section_five_button_verbiage');?></a>
    <!-- sec-five-button -->

  </div><!-- sec-five-content -->

  <div id='sec-five-inner'>

    <div id='sec-five-slider-wrapper'>

      <div id='sec-five-slider'>

        <?php if (have_rows('section_five_testimonials')): ?>
        <?php while (have_rows('section_five_testimonials')): the_row();?>

        <div class='sec-five-slide'>

          <img class='sec-five-slide-quote lazyload' data-src='<?php bloginfo('template_directory');?>/images/quote.svg'
            alt='' />

          <div class='sec-five-slide-inner'>

            <span class='sec-five-slide-title'><?php the_sub_field('intro');?></span>
            <!-- sec-five-slide-title -->

            <span class='sec-five-slide-descrip'><?php the_sub_field('description');?></span>
            <!-- sec-five-slide-descrip -->

            <span class='sec-five-slide-name'><?php the_sub_field('name');?></span>
            <!-- sec-five-slide-name -->

            <?php $icon = get_sub_field('icon');?>
            <?php if ($icon) {?>

            <div class='sec-five-slide-icon-wrapper'>

              <img class='sec-five-slide-icon lazyload' data-src="<?php echo $icon['url']; ?>"
                alt="<?php echo $icon['alt']; ?>" />

              <span class='sec-five-icon-title'>Review</span><!-- sec-five-icon-title -->

            </div><!-- sec-five-slide-icon-wrapper -->
            <?php }?>

          </div><!-- sec-five-slide-inner -->

        </div><!-- sec-five-slide -->

        <?php endwhile;?>

        <?php endif;?>

      </div><!-- sec-five-slider -->

    </div><!-- sec-five-slider-wrapper -->

    <div class='sec-five-image-wrapper'>

      <div id='sec-five-arrow-left' class='sec-five-arrow'>

        <img class='sec-five-svg-arrow lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg'
          alt='' />

      </div><!-- sec-five-arrow-left -->

      <div id='sec-five-arrow-right' class='sec-five-arrow'>

        <img class='sec-five-svg-arrow lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg'
          alt='' />

      </div><!-- sec-five-arrow-right -->

      <div id='sec-five-image'>

        <picture>

          <?php $section_five_image_monitor = get_field('section_five_image_monitor');?>
          <?php if ($section_five_image_monitor) {?>

          <source media='(min-width: 1800px)' data-srcset='<?php echo $section_five_image_monitor['url']; ?>'>

          <?php }?>

          <?php $section_five_image_large_laptop = get_field('section_five_image_large_laptop');?>
          <?php if ($section_five_image_large_laptop) {?>

          <source media='(min-width: 1380px)' data-srcset='<?php echo $section_five_image_large_laptop['url']; ?>'>

          <?php }?>

          <?php $section_five_image_small_laptop = get_field('section_five_image_small_laptop');?>

          <img class='lazyload' data-src="<?php echo $section_five_image_small_laptop['url']; ?>"
            alt="<?php echo $section_five_image_small_laptop['alt']; ?>" />

        </picture>

      </div><!-- sec-five-image -->

    </div><!-- sec-five-image-wrapper -->

  </div><!-- sec-five-inner -->

</section><!-- section-five -->