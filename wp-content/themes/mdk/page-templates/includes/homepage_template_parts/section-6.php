<section id='section-six'>

  <div id='sec-six-inner'>

    <div id='sec-six-top'>

      <span id='sec-six-subtitle'><?php the_field('section_six_subtitle');?></span><!-- sec-six-subtitle -->

      <span id='sec-six-title'><?php the_field('section_six_title');?></span><!-- sec-six-title -->

    </div><!-- sec-six-top -->

    <div id='sec-six-bottom' class='content'>

      <?php the_field('section_six_content');?>

    </div><!-- sec-six-bottom -->

  </div><!-- sec-six-inner -->

  <?php get_template_part('page-templates/includes/awards-slider/template', 'awards_slider');?>

</section><!-- section-six -->