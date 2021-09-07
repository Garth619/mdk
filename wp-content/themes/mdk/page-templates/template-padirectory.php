<?php

/* Template Name: PA Directory */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_page_title');

}?>

  <div id='page-container'>

    <a class='page-button button-one'
      href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a>
    <!-- button-one -->

    <div id='pa-wrapper'>

      <?php if (get_field('practice_area_directory')): ?>

      <ul class="pa_directory_top_menu">

        <?php while (has_sub_field('practice_area_directory')): ?>

        <li>

          <a><?php the_sub_field('title');?></a>

          <?php $obj = get_sub_field('pa_nav_menu');?>

          <?php wp_nav_menu(array('menu' => $obj->name));?>

        </li>

        <?php endwhile;?>

      </ul><!-- pa_directory_top_menu -->

      <?php endif;?>

    </div><!-- pa-wrapper -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>