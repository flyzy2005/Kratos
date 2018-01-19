<?php
/*
Template Name: 友链
*/
get_header();
get_header( 'banner' ); ?>
<div class="container">
    <div class="row">
        <div class="ravenclaw-post-page col-lg-12">
            <article class="ravenclaw-content-article ravenclaw-links">
                <div class="main">
                    <div class="row" style="display: flex; flex-wrap: wrap">
						<?php
						$bookmarks = get_bookmarks();
						foreach ( $bookmarks as $bookmark ) {?>
                        <div class="col-lg-4 col-md-6 my-2">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo $bookmark->link_url?>" target="<?php echo $bookmark->link_target?>">
                                        <h4 class="card-title"><?php echo$bookmark->link_name ?></h4>
                                        <a href="<?php echo $bookmark->link_url?>" target="<?php echo $bookmark->link_target?>">
                                            <span class="card-link"><?php echo $bookmark->link_url?></span></a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo$bookmark->link_notes?></p></div>
                                <div class="card-footer clearfix">
                                    <small class="text-muted float-left">
                                        <i class="fa fa-link"></i>友情链接</small>
                                    <img class="float-right" src="<?php echo $bookmark->link_url."/favicon.ico"?>" onerror="javascript:this.onerror=null;this.src='<?php echo get_stylesheet_directory_uri()."/images/default-links.png"?>' "></div>
                            </div>
                        </div>
						<?php }
						?>
                        <div class="col-12 exchange text-center my-3 my-md-4 border-top" style="padding-left: 15px;padding-right: 15px">
                            <p class="text-secondary pt-3">如果您网站或博客的内容与云计算、编程开发、互联网技术相关，欢迎申请友情链接</p>
                            <a href="<?php echo home_url()."/guestbook"?>">
                                <button id="guest-apply" type="button" class="btn btn-primary">申请友链</button>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<?php get_footer(); ?>
