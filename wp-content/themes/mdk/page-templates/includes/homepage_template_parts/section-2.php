<section id='section-two'>

  <div id='sec-two-container' class='content'>

    <h1><?php the_field('section_two_header');?></h1>

    <div id='sec-two-inner'>

      <div id='sec-two-top'>

        <?php the_field('section_two_content');?>

      </div><!-- sec-two-top -->

      <div id='sec-two-middle'>

        <div id='sec-two-image-wrapper'>

          <div id='sec-two-image-inner'>

            <picture>

              <?php $section_two_image_desktop = get_field('section_two_image_desktop');?>
              <?php if ($section_two_image_desktop) {?>

              <source media='(min-width: 1380px)' data-srcset='<?php echo $section_two_image_desktop['url']; ?>'>

              <?php }?>

              <?php $section_two_image_mobile = get_field('section_two_image_mobile');?>

              <img id='sec-two-image' class='lazyload' data-src="<?php echo $section_two_image_mobile['url']; ?>"
                alt="<?php echo $section_two_image_mobile['alt']; ?>" />

            </picture>

          </div><!-- sec-two-image-inner -->

        </div><!-- sec-two-image-wrapper -->

        <div id='sec-two-middle-block'>

          <?php the_field('section_two_side_content');?>

        </div><!-- sec-two-middle-block -->

      </div><!-- sec-two-middle -->

      <div id='sec-two-bottom'>

        <?php the_field('section_two_bottom');?>

      </div><!-- sec-two-bottom -->

    </div><!-- sec-two-inner -->

  </div><!-- sec-two-container -->

</section><!-- section-two -->