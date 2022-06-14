<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moina Blog
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content-container textcenter <?php if ( ! has_post_thumbnail ()): ?>content-container<?php endif; ?>">
	    <?php if ( has_post_thumbnail ()): ?>
	    	<div class="post-img-side">
		        <figure class="post-img">
		        	<?php moina_post_thumbnail(); ?>
		        </figure>
		    </div>
		<?php endif; ?>
	    <div class="post-content-side <?php if ( ! has_post_thumbnail ()): ?>content-side<?php endif; ?>">
	        <header class="title text-center">
	            <?php
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
	        </header>
	        <div class="post-content">
	            <div class="post-excerpt">
	            	<?php the_excerpt(); ?>
	            </div>
	        </div>
	        <div class="post-meta footer-meta">
	            <div class="meta-date <?php if ( ! has_post_thumbnail ()): ?>date-content<?php endif; ?>"><?php moina_posted_on(); ?></div>
	            <div class="post-more <?php if ( ! has_post_thumbnail ()): ?>more-content<?php endif; ?>">
	            	<?php
		            echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read','moina-blog').'</span></a>'; 
		            ?>
	            </div>
	        </div>
	    </div>
	</div>
</article>
<?php else: ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php moina_post_thumbnail(); ?>
		<div class="post-content">
			<header class="entry-header">
				<?php
				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta button">
						<?php moina_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; 

				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );

				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php

				if(is_single( )){
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'moina-blog' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				}
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moina-blog' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
			<?php if ( is_singular() ) : ?>
				<footer class="entry-footer">
					<?php moina_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>