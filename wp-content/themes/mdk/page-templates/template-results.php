<?php

/* Template Name: Case Results */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_page_title');

}?>

  <div id='page-container'>

    <div id='case-results-wrapper'>

      <?php if (have_rows('case_results')): ?>
      <?php while (have_rows('case_results')): the_row();?>

      <div class='case-results-single-slide'>

        <div class='case-results-single-inner'>

          <div class='case-results-single-cr'>

            <div class='case-results-single-cr-content'>

              <span class='case-results-single-amount'><?php the_sub_field('amount');?></span>
              <!-- case-results-single-amount -->

              <span class='case-results-single-type'><?php the_sub_field('type');?></span>
              <!-- case-results-single-type -->

              <img class='svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='' />

            </div><!-- case-results-single-cr-content -->

          </div><!-- case-results-single-cr -->

          <div class='case-results-single-hover'>

            <span class='case-results-hover-type'><?php the_sub_field('hover_title');?></span>
            <!-- case-results-hover-type -->

            <span class='case-results-hover-descrip'> <?php the_sub_field('description');?></span>
            <!-- case-results-hover-descrip -->

          </div><!-- case-results-single-hover -->

        </div><!-- case-results-single-inner -->

      </div><!-- case-results-single-slide -->

      <?php endwhile;?>

      <?php endif;?>

    </div><!-- case-results-wrapper -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>