<?php get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_pa');

}?>

  <div id='page-container'>

    <div id='page-content'>

      <?php if (!get_field('banner_h1') == "Yes"): ?>

      <h1 class='page-title'><?php the_title();?></h1><!-- page-title -->

      <?php endif;?>

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

        <blockquote>
          <p>Quote Style: We accept cases on a contingency fee, which means we do not charge you a dime until we
            recover.</p>
        </blockquote>

        <h3>H3 list style </h3>

        <ul>
          <li>Suspendisse potenti. In elementum ante a quam consectetur finibus onec luctus, purus vitae fringilla
            laoreet, neque massa feugiat diam, non facilisis massa justo sed quam.</li>
          <li>Proin risus dui, tristique ac sagittis eget, euismod at justo. </li>
          <li>Donec dignissim, risus a fringilla dapibus, dolor dui mattis est, et semper mauris sem at lacus donec
            pretium nunc vel dolor congue, ac ultricies mi scelerisque. </li>
          <li>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque posuere
            vitae purus non vestibulum. Ut odio neque, rutrum non ullamcorper ac, mattis sed ante.</li>
        </ul>

        <h4>H4 Call today for a free consultation</h4>

        <p>Morbi viverra lacus ut erat hendrerit feugiat. Cras cursus tempus volutpat. Maecenas sit amet sem sit amet
          ligula pulvinar varius. Nunc vehicula tempus erat vel hendrerit. Phasellus pulvinar euismod cursus. Duis sit
          amet libero eget tellus venenatis scelerisque. Sed nec nunc id ligula vestibulum lobortis. Nunc feugiat mattis
          lectus vitae porta. Maecenas vulputate eros id maximus vulputate. Ut vitae augue semper, sodales est id,
          auctor leo. Praesent sit amet tincidunt lacus. Etiam lobortis diam et viverra consequat. Duis vulputate sem in
          augue vestibulum maximus. In hac habitasse platea dictumst.</p>

      </div><!-- page-content-inner -->

    </div><!-- page-content -->

    <?php if (!get_field('disable_sidebar')) {

    get_sidebar();

}?>

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>