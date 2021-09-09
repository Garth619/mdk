<?php

/* Template Name: Att Bio */

get_header();?>

<div id="internal-main">

  <div id='banner-wrapper' class='bio-banner'>

    <div id='banner-bio-content'>

      <div id='banner-bio-spacer'></div><!-- banner-bio-spacer -->

      <div id='banner-bio-title-wrapper'>

        <h1 id='att-title'><?php the_title();?></h1><!-- banner-title -->

        <span id='att-position'>Partner</span><!-- att-position -->

      </div><!-- banner-bio-title-wrapper -->

    </div><!-- banner-bio-content -->

  </div><!-- banner-wrapper -->

  <div id='page-container' class='two-col bio-container'>

    <div id='bio-page-content'>

      <div id='page-content-inner' class='content'>

        <div class='bio-att-img-wrapper'>

          <img class='bio-att-img' src='<?php bloginfo('template_directory');?>/images/att-sargon.jpg' alt='' />

        </div><!-- bio-att-img-wrapper -->

        <?php the_content();?>

        <div id='client-testimonials'>

          <span class='att-title'>CLIENT TESTIMONIALs</span><!-- att-title -->

          <div id='single-client-testimonials'>

            <blockquote>

              <p>“I cannot say enough about Sargon. He is not only an amazing attorney, but also a genuine and kind
                person.
                The level of support, communication and genuine concern for me was unparalleled. Highly recommend
                Sargon.
                He’s an exceptional lawyer and fights for his clients.</p>

              <p class='bio-client-name'>- JDA V.</p>

            </blockquote>

          </div><!-- client-testimonials -->

        </div><!-- single-client-testimonials -->

      </div><!-- page-content-inner -->

    </div><!-- bio-page-content -->

    <div id='bio-sidebar-wrapper' class='content'>

      <div class='bio-att-img-wrapper'>

        <img class='bio-att-img' src='<?php bloginfo('template_directory');?>/images/att-sargon.jpg' alt='' />

      </div><!-- bio-att-img-wrapper -->

      <span class='att-title'>EDUCATION</span><!-- att-title -->

      <ul>
        <li><strong>Phoenix School of Law </strong><br>
          Juris Doctor, 2013 </li>
        <li><strong>Arizona State University</strong><br>
          B.A., Political Science, 2011 </li>
        <li><strong>Arizona State University</strong><br>
          B.A., Communication, 2011</li>
      </ul>

      <span class='att-title'>ACTIVITIES & AFFILIATIONS</span><!-- att-title -->

      <ul>
        <li><strong>Assyrian American Cultural Organization of Arizona (AACO),</strong><br> Board Member
        <li><strong>Assyrian American National Federation (AANF),</strong><br> Constitutional Bylaws Chairman</li>
      </ul>

      <span class='att-title'>LANGUAGES</span><!-- att-title -->

      <ul>
        <li>Fluent in Assyrian</li>
      </ul>

      <span class='att-title'>BAR ADMISSIONS</span><!-- att-title -->

      <ul>
        <li>Arizona</li>
      </ul>

    </div><!-- bio-sidebar-wrapper -->

  </div><!-- page-container -->

  <div id='bio-awards-wrapper'>

    <span id='bio-awards-title'>AWARDS, MEDIA<br> AND ACCOLADEs</span><!-- bio-awards-title -->

    <div id='bio-awards-inner'>

      <div id='bio-arrow-left' class='bio-arrow'>

        <img class='bio-svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='' />

      </div><!-- bio-arrow-left -->

      <div id='bio-slider'>

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-2.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-1.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-3.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-4.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-5.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-6.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-7.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-8.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-9.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-10.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-11.png' alt='' />

        </div><!-- bio-slide -->

        <div class='bio-slide'>

          <img src='<?php bloginfo('template_directory');?>/images/award-12.png' alt='' />

        </div><!-- bio-slide -->

      </div><!-- bio-slider -->

      <div id='bio-arrow-right' class='bio-arrow'>

        <img class='bio-svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='' />

      </div><!-- bio-arrow-right -->

    </div><!-- bio-awards-inner -->

  </div><!-- bio-awards-wrapper -->

</div><!-- internal-main -->

<?php get_footer();?>