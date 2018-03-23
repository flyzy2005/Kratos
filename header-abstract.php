<?php
/**
 * The template for displaying the header
 *
 * @package Vtrois
 * @version 2.0
 */

switch ( kratos_option( 'background_mode' ) ) {
	case 'image':
		if ( kratos_option( 'background_image' ) ) {
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				echo '<div class="kratos-start kratos-hero-2"><div class="kratos-overlay"></div><div class="kratos-cover kratos-cover_2 text-center" style="background-image: url(' . kratos_option( 'background_image' ) . ');"><div class="desc desc2 animate-box"><h2>' . kratos_option( 'background_image_text1' ) . '</h2><span>' . kratos_option( 'background_image_text2' ) . '</span></div></div></div>';
				echo '<div class="container"><div id="site-gonggao"><div class="site-gonggao-div"><i class="fa fa-volume-up"></i>&nbsp;</div><div id="site-gonggao-div2" class="sitediv"><ul class="list" id="siteul">';
				$loop = new WP_Query( array(
					'post_type'      => 'bulletin',
					'posts_per_page' => 3
				) );
				while ( $loop->have_posts() ) : $loop->the_post();
					echo '<li>';
					mb_strimwidth( the_content(), 0, 70, '…' );
					echo '</li>';
				endwhile;
				wp_reset_query();
				echo '</ul></div></div></div>';
				echo yoast_breadcrumb( '<div class="container"><strong><p style="float: left;margin: 1em 0 0; padding-left: 0.5em">您的位置：</p></strong><p id="breadcrumbs" style="background-color: #fff;margin: 1em 0 0;border-bottom: 1px solid #eaeaea;padding-left: 0.5em">', '</p></div>' );
			} else {
				echo '<div class="kratos-start kratos-hero-2"><div class="kratos-overlay"></div><div class="kratos-cover kratos-cover_2 text-center" style="background-image: url(' . kratos_option( 'background_image' ) . ');"><div class="desc desc2 animate-box"><h2>' . kratos_option( 'background_image_text1' ) . '</h2><span>' . kratos_option( 'background_image_text2' ) . '</span></div></div></div>';
			}
		}
		break;
	case 'color':
		if ( kratos_option( 'background_color' ) ) {
			echo '<div class="kratos-start kratos-hero-2 kratos-post-header"><div class="kratos-overlay kratos-post" style="background:' . kratos_option( 'background_color' ) . '"></div></div>';
		}
		break;
	default:
		echo '<div class="kratos-start kratos-hero-2 kratos-post-header"><div class="kratos-overlay kratos-post" style="background:#222831"></div></div>';
		break;
}
?>