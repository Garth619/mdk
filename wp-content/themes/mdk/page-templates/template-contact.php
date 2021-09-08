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

          <span class='contact-info-subtitle'>Location</span><!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <span class='contact-info-content'>4105 N. 20th Street, Suite 260<br> Phoenix Az 85016</span>
            <!-- contact-info-subtitle -->

            <a class='contact-info-content directions'
              href='https://www.google.com/maps/place/Tudor+Plaza+Office+Condominium,+4105+N+20th+St+STE+260,+Phoenix,+AZ+85016/@33.4957353,-112.0408288,17z/data=!3m1!4b1!4m5!3m4!1s0x872b0d79aab07657:0xc5ed7a49ced85afc!8m2!3d33.4957353!4d-112.0386401'
              target="_blank" rel="noopener">DIRECTIONs</a>
            <!-- directions -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

        <div class='contact-info-row contact-info-row-two'>

          <span class='contact-info-subtitle'>Office Hours</span><!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <span class='contact-info-content'>Monday - Friday<br> 8AM - 6PM</span>
            <!-- contact-info-subtitle -->

            <span class='available'>aVAILABLE 24/7</span>
            <!-- contact-info-subtitle -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

        <div class='contact-info-row contact-info-row-three'>

          <span class='contact-info-subtitle'>Call Today</span><!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <span class='contact-info-content'><a href='tel:6232255635'> <span>(623) 225-5635</span>
              </a>Se Habla Español</span>
            <!-- contact-info-subtitle -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

        <div class='contact-info-row contact-info-row-four'>

          <span class='contact-info-subtitle'>Social</span><!-- contact-info-subtitle -->

          <div class='contact-info-row-inner'>

            <a class='social-icon' href='https://www.facebook.com/mdkattorneys' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-fb.svg'); ?>

            </a><!-- social-icon -->

            <a class='social-icon' href='https://www.instagram.com/mdklawgroup' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-insta.svg'); ?>

            </a><!-- social-icon -->

          </div><!-- contact-info-row-inner -->

        </div><!-- contact-info-row -->

      </div><!-- contact-info-inner -->

    </div><!-- contact-wrapper -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>