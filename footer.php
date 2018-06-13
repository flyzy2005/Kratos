<?php
/**
 * The template for displaying the footer
 *
 * @package Vtrois
 * @version 2.4
 */
?>
<footer>
    <div id="footer">
        <div class="bottom-fixed">
            <div class="gotop-box"><a href="#" class="gotop-btn"><i class="fa fa-chevron-up"></i></a></div>
			<?php if ( is_singular() && ( 'open' == $post->comment_status ) ) { ?>
                <div class="comment-box"><a href="#respond" title="评论"><i class="fa fa-comment"></i></a></div>
				<?php
			} ?>
        </div>
        <div class="search-box"><i class="fa fa-search"></i>
            <form class="search-form" role="search" method="get" id="searchform"
                  action="<?php echo get_option( 'home' ) ?>/" style="width: 0;"><input type="text" name="s" id="search"
                                                                                        placeholder="搜点什么呢？"
                                                                                        style="display: none;"></form>
        </div>
		<?php if ( kratos_option( 'wechat_prom' ) == 1 ) : ?>
            <div class="weixin-box"><a class="weixin-btn"><i class="fa fa-wechat"></i>
                    <div id="weixin-pic"><img src="<?php echo kratos_option( 'wechat_image' ); ?>">
                    </div>
                </a></div>
		<?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-offset-3 footer-list text-center">
                    <p class="kratos-social-icons">
						<?php echo ( ! kratos_option( 'social_weibo' ) ) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option( 'social_weibo' ) . '"><i class="fa fa-weibo"></i></a>'; ?>
						<?php echo ( ! kratos_option( 'social_tweibo' ) ) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option( 'social_tweibo' ) . '"><i class="fa fa-tencent-weibo"></i></a>'; ?>
						<?php echo ( ! kratos_option( 'social_twitter' ) ) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option( 'social_twitter' ) . '"><i class="fa fa-twitter"></i></a>'; ?>
						<?php echo ( ! kratos_option( 'social_facebook' ) ) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option( 'social_facebook' ) . '"><i class="fa fa-facebook-official"></i></a>'; ?>
						<?php echo ( ! kratos_option( 'social_linkedin' ) ) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option( 'social_linkedin' ) . '"><i class="fa fa-linkedin-square"></i></a>'; ?>
						<?php echo ( ! kratos_option( 'social_github' ) ) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option( 'social_github' ) . '"><i class="fa fa-github"></i></a>'; ?>
						<?php echo( '<a target="_blank" rel="nofollow" title="欢迎订阅" href="' . site_url() . '/feed"><i class="fa fa-rss"></i></a>' ); ?>
                    </p>
                    <p>Copyright © <?php echo date( 'Y' ); ?> <a
                                href="<?php echo get_option( 'home' ); ?>"><?php bloginfo( 'name' ); ?></a>.
						<?php if ( kratos_option( 'icp_num' ) ){ ?><br><a
                                href="http://www.miitbeian.gov.cn/" rel="external nofollow"
                                target="_blank"><?php echo kratos_option( 'icp_num' );
							} ?></a><?php if ( kratos_option( 'gov_num' ) ) { ?><br><a
                                href="<?php echo kratos_option( 'gov_link' ); ?>" rel="external nofollow"
                                target="_blank"><i class="govimg"></i><?php echo kratos_option( 'gov_num' ); ?>
                            </a><?php } ?>
                        <br>Powered by <a href="https://cn.wordpress.org/"
                                          rel="nofollow" target="_blank">Wordpress</a>.
                        Theme <a href="https://github.com/flyzy2005/Kratos"
                                 rel="nofollow" target="_blank">Kratos.</a>
                    </p>
                    <p><?php echo ( ! kratos_option( 'site_tongji' ) ) ? '' : kratos_option( 'site_tongji' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
<?php if ( kratos_option( 'site_push_baidu' ) == 1 ) : ?>
	<?php include_once( "baidu_js_push.php" ) ?>
<?php endif; ?>
</html>