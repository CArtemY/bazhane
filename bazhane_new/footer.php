<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bazhane_New
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bazhane-new' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'bazhane-new' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'bazhane-new' ), 'bazhane-new', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
	window.addEventListener('DOMContentLoaded', function() {
  
 
var container = document.querySelector('.woo-variation-gallery-thumbnail-slider');
  if (container) {
    
   
var elements = container.querySelectorAll('your-selector-for-elements');
    
   
if (elements.length > 1) {
      
     
var secondElement = elements[1];
      secondElement.
     
click();
    }
  }
});

    }
  }
</script>
</body>
</html>
