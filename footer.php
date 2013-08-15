<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Radiated Pixel
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="colophon" role="contentinfo">
    <div class="row">
      <div class="large-12 columns">
        <p><strong>© Radiated Pixel</strong> – <?php echo get_bloginfo ( 'description' );  ?></p>
        <p>Source code published on this site is licensed under <a href="http://opensource.org/licenses/mit-license.php">The MIT License</a>.</p>
        <?php do_action( 'rp_credits' ); ?>
        <p><?php printf( __( 'This theme was made by %1$s and is available on %2$s.', 'rp' ), '<a href="http://www.manuelwieser.com/" rel="designer">Manuel Wieser</a>', '<a href="https://github.com/Lorti/radiated-pixel-theme">GitHub</a>' ); ?></p>
      </div>
      <div class="colophon__designer">
        <div class="colophon__bubble">
          Having trouble with our new site?<br>
          You want to give us feedback?<br>
          <span id="obf">Send a message to Manuel Wieser!</span>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/designer.png" alt="Manuel Wieser">
      </div>
    </div>

	</footer>

</div><!-- #page -->



<script>
	document.write('<script src=' + ('__proto__' in {} ? '<?php echo get_template_directory_uri(); ?>/js/vendor/zepto' : '<?php echo get_template_directory_uri(); ?>/js/vendor/jquery') + '.js><\/script>');
</script>

<?php wp_footer(); ?>

<script>
  jQuery(document).ready(function($) {
    $(document).foundation();
    $('#obf').html("<n uers=\"znvygb:bssvpr@znahryjvrfre.pbz?fhowrpg=Srrqonpx sbe Enqvngrq Cvkry\" gnetrg=\"_oynax\">Fraq n zrffntr gb Znahry Jvrfre!</n>".replace(/[a-zA-Z]/g, function (c) {
      return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
    }));
  });
</script>



</body>
</html>