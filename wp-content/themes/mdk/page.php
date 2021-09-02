<?php get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_pa');

}?>

  <div id='page-container'>

    <?php if (!get_field('disable_sidebar')) {

    get_sidebar();

}?>

    <div id='page-content'>

      <h1 class='page-title'><?php the_title();?></h1><!-- page-title -->

      <a class='page-button button-one' href='#consultation'>Request Free Consultation</a><!-- button-one -->

      <div id='page-content-inner' class='content'>

        <h2>H2 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>

        <p>Morbi viverra lacus ut erat hendrerit feugiat. Cras cursus tempus volutpat. Maecenas sit amet sem sit amet
          ligula pulvinar varius. <a href=''>Inline link style</a> Duis sit amet libero eget tellus venenatis
          scelerisque. Sed nec nunc id ligula vestibulum lobortis. Nunc feugiat mattis lectus vitae porta. Maecenas
          vulputate eros id maximus vulputate. Ut vitae augue semper, sodales est id, auctor leo. Praesent sit amet
          tincidunt lacus. Etiam lobortis diam et viverra consequat. Duis vulputate sem in augue vestibulum maximus. In
          hac habitasse platea dictumst.</p>

        <h1><?php the_title();?></h1><!-- page-title -->

        <p>Etiam metus lectus, convallis id diam ac, sodales sodales nulla. Nulla ac nisl eros. Lorem ipsum dolor sit
          amet, consectetur adipiscing elit. Donec mi tortor, auctor eget nulla et, pulvinar aliquam ligula. Maecenas
          sed
          posuere sapien. Nunc eu quam et metus facilisis feugiat sed in elit. Pellentesque scelerisque dui at dui
          tristique tristique. Maecenas eleifend eu magna vitae ultrices. Cras sagittis augue eros, non tempus est
          dapibus
          eget. Etiam convallis bibendum libero, id rutrum mauris commodo sit amet. Duis varius egestas quam ut
          eleifend.
          Aliquam laoreet nec lectus ut lacinia.</p>

      </div><!-- page-content-inner -->

    </div><!-- page-content -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>