<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Vtrois
 * @version 2.3
 */

$sidebar = kratos_option( 'side_bar' );
$sidebar = ( empty( $sidebar ) ) ? 'right_side' : $sidebar;
get_header();
get_header( 'banner' ); ?>
    <div id="kratos-blog-post" style="background:<?php echo kratos_option( 'background_index_color' ); ?>">
        <div class="container">
            <div class="row">
				<?php if ( $sidebar == 'left_side' ) { ?>
                    <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                        <div id="sidebar">
							<?php dynamic_sidebar( 'sidebar_tool' ); ?>
                        </div>
                    </aside>
				<?php } ?>
                <section id="main" class='<?php echo ( $sidebar == 'single' ) ? 'col-md-12' : 'col-md-8'; ?>'>
					<?php if ( have_posts() ) :
					the_post();
					update_post_caches( $posts ); ?>
                    <article>
                        <div class="kratos-hentry kratos-post-inner clearfix">
                            <header class="kratos-entry-header">
                                <h1 class="kratos-entry-title text-center"><?php the_title(); ?></h1>
                                <div class="kratos-post-meta text-center">
								<span>
								<i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                                    <i class="fa fa-commenting-o"></i> <?php comments_number( '0', '1', '%' ); ?>条评论
				                <i class="fa fa-eye"></i> <?php echo kratos_get_post_views(); ?>次阅读
				                <i class="fa fa-thumbs-o-up"></i> <?php if ( get_post_meta( $post->ID, 'love', true ) ) {
										echo get_post_meta( $post->ID, 'love', true );
									} else {
										echo '0';
									} ?>人点赞
								</span>
                                </div>
                            </header>
                            </header>
                            <div class="kratos-post-content">
								<?php if ( kratos_option( 'ad_show_1' ) ): ?>
                                    <a href="<?php echo kratos_option( 'ad_link_1' ); ?>" target="_blank"
                                       rel="nofollow"><img
                                                src="<?php echo kratos_option( 'ad_img_1' ) ?>"></a>
								<?php endif ?>
								<?php the_content(); ?>
								<?php if ( kratos_option( 'ad_show_2' ) ): ?>
                                    <a href="<?php echo kratos_option( 'ad_link_2' ); ?>" target="_blank" rel="nofollow"><img
                                                src="<?php echo kratos_option( 'ad_img_2' ) ?>"></a>
								<?php endif ?>
                            </div>
                            <footer class="kratos-entry-footer clearfix">
                                <div class="entrymeta">
									<?php $custom_fields = get_post_custom_keys( $post_id );
									if ( ! in_array( 'copyright', $custom_fields ) ) : ?>
                                    <h3>原创声明</h3>
                                    <span class="spostinfo">
该日志由 <a href="https://www.flyzy2005.cn"
        title="flyzy小站 https://www.flyzy2005.cn">flyzy2005</a> 于<?php the_time( 'Y年m月d日' ) ?>
                                        发表在<?php the_category( ', ' ) ?>分类下，
										<?php if ( ( 'open' == $post->comment_status ) && ( 'open' == $post->ping_status ) ) { ?>
                                            你可以<a href="#respond">发表评论</a>，并在保留<a href="<?php the_permalink() ?>"
                                                                                  rel="bookmark">原文地址</a>及作者的情况下转载到你的网站或博客。
										<?php } elseif ( ( 'open' == $post->comment_status ) && ! ( 'open' == $post->ping_status ) ) { ?>
                                            通告目前不可用，你可以至底部留下评论。
										<?php } ?><br/>
转载请注明: <a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?>
                                            | <?php bloginfo( 'name' ); ?></a><br/>
<span class="content_tag"><?php the_tags( '关键字: ', ', ', '' ); ?></span>
</span>
                                    <div class="clear"></div>
                                </div>
								<?php else: ?>

								<?php $custom = get_post_custom( $post_id );
								$custom_value = $custom['copyright']; ?>
                                <h3>转载声明</h3>
                                <span class="spostinfo">
该日志转载于<a target="_blank" rel="nofollow" href="<?php echo $custom_value[0] ?>"><?php echo $custom_value[0] ?></a>由<a
                                            href="https://www.flyzy2005.cn" title="flyzy小站 https://www.flyzy2005.cn">flyzy2005</a>整理编辑<br/>
转载请保留本说明: <a href="<?php the_permalink() ?>" rel="bookmark"
             title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?> | <?php bloginfo( 'name' ); ?></a><br/>
<span class="content_tag"><?php the_tags( '关键字: ', ', ', '' ); ?></span>
</span>
                                <div class="clear"></div>
                        </div>
						<?php endif; ?>
                        <div class="weixin-footer">
                            <div class="weixin-content">
                                <img src="https://www.flyzy2005.cn/wp-content/uploads/2017/12/flyzy.jpg" alt="weinxin"/>
                                <div class="weixin-h"><strong>我的微信公众号</strong></div>
                                <div class="weixin-h-w">关注"flyzy小站"微信公众号，关注新技术，学习新知识~</div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="post-like-donate text-center clearfix" id="post-like-donate">
							<?php if ( kratos_option( 'post_like_donate' ) ) : ?>
                                <a href="javascript:;" class="Donate"><i class="fa fa-bitcoin"></i> 打赏</a>
							<?php endif; ?>
                            <a href="javascript:;" id="btn" data-action="love" data-id="<?php the_ID(); ?>"
                               class="Love <?php if ( isset( $_COOKIE[ 'love_' . $post->ID ] ) ) {
								   echo 'done';
							   } ?>"><i class="fa fa-thumbs-o-up"></i> 点赞</a>
							<?php if ( kratos_option( 'post_share' ) ) : ?>
                                <a href="javascript:;" class="Share"><i class="fa fa-share-alt"></i> 分享</a>
								<?php require_once( get_template_directory() . '/inc/share.php' ); ?>
							<?php endif; ?>
                        </div>
                        <div class="footer-tag clearfix">
                            <div class="pull-left">
                                <i class="fa fa-tags"></i>
								<?php if ( get_the_tags() ) {
									the_tags( '', ' ', '' );
								} else {
									echo '<a>No Tag</a>';
								} ?>
                            </div>
                        </div>
                        </footer>
            </div>
			<?php if ( kratos_option( 'post_cc' ) == 1 ) : ?>
                <div class="kratos-hentry kratos-copyright text-center clearfix">
                    <img alt="知识共享许可协议" src="<?php echo get_template_directory_uri(); ?>/images/licenses.png">
                    <h5>本作品采用 <a rel="license nofollow" target="_blank"
                                 href="http://creativecommons.org/licenses/by-sa/4.0/">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可
                    </h5>
                </div>
			<?php endif; ?>
            <nav class="navigation post-navigation clearfix" role="navigation">
				<?php
				$prev_post = get_previous_post( true );
				if ( ! empty( $prev_post ) ):?>
                    <div class="nav-previous clearfix">
                        <a title="<?php echo $prev_post->post_title; ?>"
                           href="<?php echo get_permalink( $prev_post->ID ); ?>">&lt; 上一篇</a>
                    </div>
				<?php endif; ?>
				<?php
				$next_post = get_next_post( true );
				if ( ! empty( $next_post ) ):?>
                    <div class="nav-next">
                        <a title="<?php echo $next_post->post_title; ?>"
                           href="<?php echo get_permalink( $next_post->ID ); ?>">下一篇 &gt;</a>
                    </div>
				<?php endif; ?>
            </nav>
            <div class="comment-respond">

                <h3>相关文章</h3>
                <ul class="related_posts">
					<?php
					$post_num   = 8;
					$exclude_id = $post->ID;
					$posttags   = get_the_tags();
					$i          = 0;
					if ( $posttags ) {
						$tags = '';
						foreach ( $posttags as $tag ) {
							$tags .= $tag->term_id . ',';
						}
						$args = array(
							'post_status'      => 'publish',
							'tag__in'          => explode( ',', $tags ),
							'post__not_in'     => explode( ',', $exclude_id ),
							'caller_get_posts' => 1,
							'orderby'          => 'comment_date',
							'posts_per_page'   => $post_num,
						);
						query_posts( $args );
						while ( have_posts() ) {
							the_post(); ?>
                            <li><a rel="bookmark" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                                   target="_blank" style="color: #00ccff;"><?php the_title(); ?></a></li>
							<?php
							$exclude_id .= ',' . $post->ID;
							$i ++;
						}
						wp_reset_query();
					}
					if ( $i < $post_num ) {
						$cats = '';
						foreach ( get_the_category() as $cat ) {
							$cats .= $cat->cat_ID . ',';
						}
						$args = array(
							'category__in'     => explode( ',', $cats ),
							'post__not_in'     => explode( ',', $exclude_id ),
							'caller_get_posts' => 1,
							'orderby'          => 'comment_date',
							'posts_per_page'   => $post_num - $i
						);
						query_posts( $args );
						while ( have_posts() ) {
							the_post(); ?>
                            <li><a rel="bookmark" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                                   target="_blank" style="color: #00ccff;"><?php the_title(); ?></a></li>
							<?php $i ++;
						}
						wp_reset_query();
					}
					if ( $i == 0 ) {
						echo '<li>没有相关文章!</li>';
					}
					?>
                </ul>
            </div>
			<?php comments_template(); ?>
            </article>
			<?php endif; ?>
            </section>
			<?php if ( $sidebar == 'right_side' ) { ?>
                <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                    <div id="sidebar">
						<?php dynamic_sidebar( 'sidebar_tool' ); ?>
                    </div>
                </aside>
			<?php } ?>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $.post(
                "http://localhost:8080/wp-admin/admin-ajax.php",
                {action: 'single_view', id:<?php the_ID(); ?>},
                null
            );
        });
    </script>
<?php get_footer(); ?>