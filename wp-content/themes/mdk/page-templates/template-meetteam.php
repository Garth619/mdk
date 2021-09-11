<?php

/* Template Name: Meet the Team */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_page_title');

}?>

  <div id='page-container'>

    <div id='meetteam'>

      <div id='meetteam-top'>

        <div class='single-att'>

          <a href=''>

            <div class='single-att-img'>

              <img src='<?php bloginfo('template_directory');?>/images/att-michael.jpg' alt='' />

            </div><!-- single-att-img -->

            <span class='single-att-title'>Michael Morgan</span><!-- single-att-title -->

            <span class='single-att-position'>Partner</span><!-- single-att-title -->

          </a>

        </div><!-- single-att -->

        <div class='single-att'>

          <a href=''>

            <div class='single-att-img'>

              <img src='<?php bloginfo('template_directory');?>/images/att-michael.jpg' alt='' />

            </div><!-- single-att-img -->

            <span class='single-att-title'>Michael Morgan</span><!-- single-att-title -->

            <span class='single-att-position'>Partner</span><!-- single-att-title -->

          </a>

        </div><!-- single-att -->

      </div><!-- meetteam-top -->

      <div id='meetteam-bottom'>

        <div class='single-att'>

          <a href=''>

            <div class='single-att-img'>

              <img src='<?php bloginfo('template_directory');?>/images/att-michael.jpg' alt='' />

            </div><!-- single-att-img -->

            <span class='single-att-title'>Michael Morgan</span><!-- single-att-title -->

            <span class='single-att-position'>Partner</span><!-- single-att-title -->

          </a>

        </div><!-- single-att -->

        <div class='single-att'>

          <a href=''>

            <div class='single-att-img'>

              <img src='<?php bloginfo('template_directory');?>/images/att-michael.jpg' alt='' />

            </div><!-- single-att-img -->

            <span class='single-att-title'>Michael Morgan</span><!-- single-att-title -->

            <span class='single-att-position'>Partner</span><!-- single-att-title -->

          </a>

        </div><!-- single-att -->

        <div class='single-att'>

          <a href=''>

            <div class='single-att-img'>

              <img src='<?php bloginfo('template_directory');?>/images/att-michael.jpg' alt='' />

            </div><!-- single-att-img -->

            <span class='single-att-title'>Michael Morgan</span><!-- single-att-title -->

            <span class='single-att-position'>Partner</span><!-- single-att-title -->

          </a>

        </div><!-- single-att -->

      </div><!-- meetteam-bottom -->

    </div><!-- meetteam -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>