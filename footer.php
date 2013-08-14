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

	<footer id="colophon" role="contentinfo">
    <div class="row">
  		<div class="large-12 columns">
  			<?php do_action( 'rp_credits' ); ?>
  			<?php printf( __( 'This theme for %1$s was made by %2$s.', 'rp' ), '<em>Radiated Pixel</em>', '<a href="http://www.manuelwieser.com/" rel="designer">office@manuelwieser.com</a>' ); ?>
  		</div>
    </div>
	</footer>

</div><!-- #page -->



<script>
	document.write('<script src=' + ('__proto__' in {} ? '<?php echo get_template_directory_uri(); ?>/js/vendor/zepto' : '<?php echo get_template_directory_uri(); ?>/js/vendor/jquery') + '.js><\/script>');
</script>

<?php wp_footer(); ?>

<script>
  jQuery(document).foundation();
</script>



</body>
</html>