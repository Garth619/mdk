<?php

/* Template Name: Contact */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_contact');

}?>

  <div id='page-container'>

    <div id='contact-wrapper'>

      <div id='contact-info-inner'>

        <div class='contact-info-row contact-info-row-one'>

          <span class='contact-info-subtitle'><?php the_field('location_title', 'option');?></span>
          <!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <span class='contact-info-content'><?php the_field('address', 'option');?></span>
            <!-- contact-info-subtitle -->

            <a class='contact-info-content directions' href='<?php the_field('address_link', 'option');?>'
              target="_blank" rel="noopener">DIRECTIONs</a>
            <!-- directions -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

        <div class='contact-info-row contact-info-row-two'>

          <span class='contact-info-subtitle'><?php the_field('office_hours_title', 'option');?></span>
          <!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <span class='contact-info-content'><?php the_field('office_hours', 'option');?></span>
            <!-- contact-info-subtitle -->

            <span class='available'><?php the_field('available_verbiage', 'option');?></span>
            <!-- contact-info-subtitle -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

        <div class='contact-info-row contact-info-row-three'>

          <span class='contact-info-subtitle'><?php the_field('call_today_title', 'option');?></span>
          <!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <span class='contact-info-content'><a
                href='tel:+1<?php echo str_replace(['-', '(', ')', ' '], '', get_field('phone', 'option')); ?>'>
                <span><strong><?php the_field('phone', 'option');?></strong></span>
              </a><?php the_field('call_today_content', 'option');?></span>
            <!-- contact-info-subtitle -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

        <div class='contact-info-row contact-info-row-four'>

          <span class='contact-info-subtitle'><?php the_field('social_title', 'option');?></span>
          <!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <?php if (get_field('facebook_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('facebook_link', 'option');?>' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-fb.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

            <?php if (get_field('instagram_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('instagram_link', 'option');?>' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-insta.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

            <?php if (get_field('google_business_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('google_business_link', 'option');?>' target="_blank"
              rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-google.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

            <?php if (get_field('yelp_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('yelp_link', 'option');?>' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-yelp.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

      </div><!-- contact-info-inner -->

    </div><!-- contact-wrapper -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>