<?php

/* Template Name: About */

get_header();?>

<div id="internal-main">

  <div id='about-banner'>

    <div id='about-banner-content'>

      <div id='about-banner-top'>

        <span class='about-title'>About our experienced personal injury law firm</span><!-- about-title -->

        <a class='about-button button-one'
          href='#consultation'><?php the_field('global_internal_banner_button_verbiage', 'option');?></a>
        <!-- button-one -->

      </div><!-- about-banner-top -->

      <div id='about-banner-bottom'>

        <div id='about-banner-img'>

          <img src='<?php bloginfo('template_directory');?>/images/about-image-1.jpg' alt='' />

        </div><!-- about-banner-img -->

      </div><!-- about-banner-bottom -->

    </div><!-- about-banner-content -->

  </div><!-- about-banner -->

  <div id='page-container' class='content'>

    <div id='page-content-top'>

      <h2>Available 24/7, even on weekends. We know that accidents can happen any day at any time and this is why we are
        always available to support you.</h2>

      <p>Morbi viverra lacus ut erat hendrerit feugiat. Cras cursus tempus volutpat. Maecenas sit amet sem sit amet
        ligula pulvinar varius. Inline link style Hover link style Duis sit amet libero eget tellus venenatis
        scelerisque. Sed nec nunc id ligula vestibulum lobortis. Nunc feugiat mattis lectus vitae porta. Maecenas
        vulputate eros id maximus vulputate. Ut vitae augue semper, sodales est id, auctor leo. Praesent sit amet
        tincidunt lacus. Etiam lobortis diam et viverra consequat. Duis vulputate sem in augue vestibulum maximus. In
        hac habitasse platea dictumst.</p>

      <p>
        Etiam metus lectus, convallis id diam ac, sodales sodales nulla. Nulla ac nisl eros. Lorem ipsum dolor sit amet,
        consectetur adipiscing elit. Donec mi tortor, auctor eget nulla et, pulvinar aliquam ligula. Maecenas sed
        posuere sapien. Nunc eu quam et metus facilisis feugiat sed in elit. Pellentesque scelerisque dui at dui
        tristique tristique. </p>

    </div><!-- page-content-top -->

    <div id='page-content-middle'>

      <blockquote>

        <p>“The entire team at MDK was easy to work with and highly skilled. It was a great experience!”</p>

        <p class='client-name'>— DaRIEN B.</p>

      </blockquote>

      <div id='page-content-middle-img'>

        <img src='<?php bloginfo('template_directory');?>/images/about-image-2.jpg' alt='' />

      </div><!-- page-content-middle-img -->

    </div><!-- page-content-middle -->

    <div id='page-content-bottom'>

      <h2>If you or a loved one has been injured on another’s property, MDK Law Group can help represent your interests
        and pursue compensation for the applicable injuries, pain and suffering, future care, and medical bills. </h2>

      <p>Morbi viverra lacus ut erat hendrerit feugiat. Cras cursus tempus volutpat. Maecenas sit amet sem sit amet
        ligula pulvinar varius. Inline link style Hover link style Duis sit amet libero eget tellus venenatis
        scelerisque. Sed nec nunc id ligula vestibulum lobortis. Nunc feugiat mattis lectus vitae porta. Maecenas
        vulputate eros id maximus vulputate. Ut vitae augue semper, sodales est id, auctor leo. Praesent sit amet
        tincidunt lacus. Etiam lobortis diam et viverra consequat. Duis vulputate sem in augue vestibulum maximus. </p>

    </div><!-- page-content-bottom -->

  </div><!-- page-container -->

  <?php get_template_part('page-templates/includes/awards-slider/template', 'awards_slider');?>

</div><!-- internal-main -->

<?php get_footer();?>