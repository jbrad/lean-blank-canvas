<?php
/**
 * The template for displaying link post formats.
 * 
 * @package Standard
 * @since 3.0
 */
?>
<?php /* Main Loop */ ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post format-link clearfix' ); ?>>

	<div class="post-header clearfix">
			<div id="content-<?php the_ID(); ?>"  class="entry-content clearfix">	
			
				<?php

					// Read the attribute of the anchor from the post format
					$title = standard_get_link_post_format_attribute( 'title' );
					$href = standard_get_link_post_format_attribute( 'href' );
					$target = strlen( standard_get_link_post_format_attribute( 'target' ) ) > 0 ? standard_get_link_post_format_attribute( 'target' ) : '_blank';
					
					// And attempt to read the link from the post meta
					$href = ( '' == get_post_meta( get_the_ID(), 'standard_link_url_field', true ) ) ? $href : get_post_meta( get_the_ID(), 'standard_link_url_field', true );
					$post_title = strip_tags( stripslashes( get_the_title() ) );
					$content = strip_tags( get_the_content() );
					
				?>

				<?php if( is_single() && '' !== get_the_title() ) { ?>
					<h1 class="post-title entry-title">
						<a href="<?php echo $href; ?>" title="<?php echo strlen( trim( $title ) ) > 0 ? $title : $post_title; ?>" target="<?php echo $target; ?>" rel="bookmark">
							<?php if( strlen( trim( $post_title ) ) > 0 ) { ?>
								<?php echo $post_title; ?>
							<?php } elseif( strlen( trim( $title ) ) > 0 ) { ?>
								<?php echo $title; ?>
							<?php } elseif( '' != $meta_href ) { ?>
								<?php the_content(); ?>
							<?php } else { ?>
								<?php echo $content; ?>
							<?php } // end if ?>
						</a>
					</h1>
				<?php } else { ?>
					<h2 class="post-title entry-title">
						<a href="<?php echo $href; ?>" title="<?php echo strlen( trim( $title ) ) > 0 ? $title : $post_title; ?>" target="<?php echo $target; ?>" rel="bookmark">
							<?php if( strlen( trim( $post_title ) ) > 0 ) { ?>
								<?php echo $post_title; ?>
							<?php } elseif( strlen( trim( $title ) ) > 0 ) { ?>
								<?php echo $post_title; ?>
							<?php } elseif( '' != $meta_href ) { ?>
								<?php the_content(); ?>
							<?php } else { ?>
								<?php echo $content; ?>
							<?php } // end if ?>
						</a>
					</h2>
				<?php } // end if ?>
				
			</div><!-- /.entry-content -->
	</div> <!-- /.post-header -->
		
	<?php if( '' != get_post_meta( get_the_ID(), 'standard_link_url_field', true ) ) { ?>
		<div class="entry-content clearfix link-description">
			<?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
		</div><!-- /entry-content -->
	<?php } // end if ?>
			
	<div class="post-meta clearfix">
	
		<div class="meta-comment-link pull-left">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Continue Reading</a>
			
			<?php if( comments_open() ) { ?>
				<span class="the-comment-link">&bull;&nbsp;<?php comments_popup_link( __( 'Comments { 0 }', 'standard' ), __( 'Comments { 1 }', 'standard' ), __( 'Comments { % }', 'standard' ), '', '' ); ?></span>
			<?php } // end if ?>
		</div><!-- /meta-comment-link -->

		<div class="meta-date-cat-tags pull-right">
		
			by <span class="the-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo the_author_meta( 'display_name' ); ?></a> on </span>
			<?php if( strlen( trim( get_the_title() ) ) == 0 ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'standard' ), the_title_attribute( 'echo=0' ) ); ?>"><span class="the-time updated"><?php the_time( get_option( 'date_format' ) ); ?></span></a>
			<?php } else { ?>
				<span class="the-time updated"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php } // end if/else ?>
			<?php $category_list = get_the_category_list( __( ', ', 'standard' ) ); ?>
			<?php if( $category_list ) { ?>
				<?php printf( '<span class="the-category">' . __( 'in %1$s', 'standard' ) . '</span>', $category_list ); ?>
			<?php } // end if ?>
			<?php $tag_list = get_the_tag_list( '', __( ', ', 'standard' ) ); ?>
				<?php if( $tag_list ) { ?>
					<?php printf( '<span class="the-tags">' . __( '%1$s', 'standard' ) . '</span>', $tag_list ); ?>
				<?php } // end if ?>
			<a class="post-link" href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'permalink ', 'standard' ); ?>"><span class="fa fa-link"></span></a>
			
		</div><!-- /meta-date-cat-tags -->

	</div><!-- /.post-meta -->


</div> <!-- /#post- -->