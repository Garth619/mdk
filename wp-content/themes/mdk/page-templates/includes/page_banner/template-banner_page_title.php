<div id='banner-wrapper'>

  <div id='banner-content'>

    <h1 class='banner-title banner-title-large'><?php the_title();?></h1><!-- banner-title -->

    <?php if (is_page_template('page-templates/template-results.php')) {?>

    <?php if (get_field('banner_description')) {?>

    <span id="caseresults-description" class="content">

      <?php the_field('banner_description');?>

    </span>

    <?php }?>

    <?php }?>

    <a class='banner-button button-one'
      href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a><!-- button-one -->

  </div><!-- banner-content -->

  <?php get_template_part('page-templates/includes/page_banner/template', 'banner_background');?>

</div><!-- banner-wrapper -->