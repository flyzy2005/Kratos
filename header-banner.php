<?php
/**
 * The template for displaying the header
 *
 * @package Vtrois
 * @version 2.3
 */

if ( kratos_option( 'background_image' ) ) {
	echo '<div class="kratos-start kratos-hero-2"><div class="kratos-overlay"></div><div class="kratos-cover kratos-cover_2 text-center" style="background-image: url(' . kratos_option( 'background_image' ) . ');"><div class="desc desc2 animate-box"><h2>' . kratos_option( 'background_image_text1' ) . '</h2><span>' . kratos_option( 'background_image_text2' ) . '</span></div></div></div>';
	echo '<div class="container container_no_padding"><div id="site-gonggao"><div class="site-gonggao-div"><i class="fa fa-volume-up"></i>&nbsp;</div><div id="site-gonggao-div2" class="sitediv"><ul class="list" id="siteul">';
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
	if ( is_singular() ) {
		if ( kratos_option( 'post_top_ad' ) == 1 ) :
			echo kratos_option( 'post_top_ad_code' );
		endif;
	}
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		echo yoast_breadcrumb( '<div class="container"><div style="border-top: 1px solid #e7e7e7;"><strong><p id="breadcrumbs-p">您的位置：</p></strong><p id="breadcrumbs">', '</p></div></div>' );
	}
}