<section id='section-one'>

  <div id='sec-one-inner'>

    <div id='sec-one-left'>

      <div id='sec-one-left-content'>

        <span id='sec-one-subtitle'><?php the_field('section_one_subtitle');?></span><!-- sec-one-subtitle -->

        <div id='sec-one-image'>

          <picture>

            <?php $section_one_hero_image_desktop_webp = get_field('section_one_hero_image_desktop_webp');?>
            <?php if ($section_one_hero_image_desktop_webp) {?>

            <source media='(min-width: 768px)' srcset='<?php echo $section_one_hero_image_desktop_webp['url']; ?>'
              type='image/webp'>

            <?php }?>

            <?php $section_one_hero_image_desktop = get_field('section_one_hero_image_desktop');?>
            <?php if ($section_one_hero_image_desktop) {?>

            <source media='(min-width: 768px)' srcset='<?php echo $section_one_hero_image_desktop['url']; ?>'>

            <?php }?>

            <?php $section_one_hero_image_mobile_webp = get_field('section_one_hero_image_mobile_webp');?>
            <?php if ($section_one_hero_image_mobile_webp) {?>

            <source srcset='<?php echo $section_one_hero_image_mobile_webp['url']; ?>' type='image/webp'>

            <?php }?>

            <?php $section_one_hero_image_mobile = get_field('section_one_hero_image_mobile');?>

            <img src="<?php echo $section_one_hero_image_mobile['url']; ?>"
              alt="<?php echo $section_one_hero_image_mobile['alt']; ?>" />

          </picture>

        </div><!-- sec-one-image -->

        <span id='sec-one-title'><?php the_field('section_one_title');?></span><!-- sec-one-title -->

        <a id='sec-one-button' class='button-one'
          href='#consultation'><?php the_field('section_one_button_verbiage');?></a><!-- button -->

      </div><!-- sec-one-left-content -->

      <picture>

        <?php $section_one_background_image_desktop_webp = get_field('section_one_background_image_desktop_webp');?>
        <?php if ($section_one_background_image_desktop_webp) {?>

        <source media='(min-width: 1170px)' srcset='<?php echo $section_one_background_image_desktop_webp['url']; ?>'
          type='image/webp'>

        <?php }?>

        <?php $section_one_background_image_desktop = get_field('section_one_background_image_desktop');?>
        <?php if ($section_one_background_image_desktop) {?>

        <source media='(min-width: 1170px)' srcset='<?php echo $section_one_background_image_desktop['url']; ?>'>

        <?php }?>

        <?php $section_one_background_image_mobile_webp = get_field('section_one_background_image_mobile_webp');?>
        <?php if ($section_one_background_image_mobile_webp) {?>

        <source srcset='<?php echo $section_one_background_image_mobile_webp['url']; ?>' type='image/webp'>

        <?php }?>

        <?php $section_one_background_image_mobile = get_field('section_one_background_image_mobile');?>

        <img id='hero-image' src='<?php echo $section_one_background_image_mobile['url']; ?>'
          alt='<?php echo $section_one_background_image_mobile_webp['alt']; ?>' />

      </picture>

    </div><!-- sec-one-left -->

    <div id='sec-one-right'>

      <div id='sec-one-right-inner'>

        <div class='sec-one-arrow sec-one-arrow-left'></div><!-- sec-one-arrow -->

        <div id='sec-one-slider'>

          <?php if (have_rows('section_one_selling_points')): ?>
          <?php while (have_rows('section_one_selling_points')): the_row();?>

          <div class='sec-one-single-slide'>

            <div class='sec-one-single-icon'>

              <?php if (get_sub_field('icon') == 'One') {?>

              <img src='<?php bloginfo('template_directory');?>/images/sp-icon-1.svg' alt='' />

              <?php }?>

              <?php if (get_sub_field('icon') == 'Two') {?>

              <img src='<?php bloginfo('template_directory');?>/images/sp-icon-2.svg' alt='' />

              <?php }?>

              <?php if (get_sub_field('icon') == 'Three') {?>

              <img src='<?php bloginfo('template_directory');?>/images/sp-icon-3.svg' alt='' />

              <?php }?>

            </div><!-- sec-one-single-icon -->

            <span class='sec-one-single-title'><?php the_sub_field('title');?></span><!-- sec-one-single-title -->

            <span class='sec-one-single-descrip'><?php the_sub_field('description');?></span>
            <!-- sec-one-single-descrip -->

          </div><!-- sec-one-single-slide -->

          <?php endwhile;?>

          <?php endif;?>

        </div><!-- sec-one-slider -->

        <div class='sec-one-arrow sec-one-arrow-right'></div><!-- sec-one-arrow -->

      </div><!-- sec-one-right-inner -->

    </div><!-- sec-one-right -->

    <span id='sec-one-triangle' class='triangle'></span><!-- triangle -->

  </div><!-- sec-one-inner -->

</section><!-- section-one -->