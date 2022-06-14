<?php
/**
 * Footer action
 * @package Moina
 */

function moina_footer_style_1(){ ?>
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'moina' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'moina' ), 'WordPress' );
						?>
					</a>
					<p>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'moina' ), 'moina', 'ashathemes' );
						?>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php }
add_action('moina_footer_style','moina_footer_style_1');