<div id='banner-wrapper'>

  <div id='banner-content'>

    <h1 class='banner-title banner-title-large contact-title'><?php the_title();?></h1><!-- banner-title -->

    <span id='contact-description' class="content"><?php the_field('contact_banner_description');?></span>
    <!-- contact-description -->

  </div><!-- banner-content -->

  <?php get_template_part('page-templates/includes/page_banner/template', 'banner_background');?>

</div><!-- banner-wrapper -->