<footer id='consultation'>

  <?php // gravity_form(1, false, false, false, '', true, 12);?>

</footer>

<?php wp_footer();?>

<?php the_field('footer_scripts', 'option');?>

<?php if (get_field('live_chat', 'option')) {?>

<script type="text/javascript">
// load all other scripts
function delayScript(src, timeout, attributes) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const scriptElem = document.createElement("script");
      scriptElem.src = src;
      for (const key in attributes) {
        const attribute = key;
        const value = attributes[key];
        scriptElem.setAttribute(attribute, value ? value : "");
      }
      scriptElem.addEventListener("readystatechange", () => {
        resolve();
      });
      document.head.appendChild(scriptElem);
    }, timeout);
  });
}
delayScript("<?php the_field('live_chat', 'option');?>", 2000);
</script>

<?php }?>

</body>

</html>