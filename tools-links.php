<?php
/*
Template Name: 常用工具
*/
get_header();
get_header( 'banner' ); ?>
<div class="container" style="min-height: calc(100% - 360px);">
    <div class="row">
        <div class="ravenclaw-post-page col-lg-12">
            <article class="ravenclaw-content-article ravenclaw-links">
                <div class="main">
                    <div class="row" style="display: flex; flex-wrap: wrap">
						<?php
						$bookmarks = get_bookmarks( array( 'category_name' => 'Tool_Link' ) );
						foreach ( $bookmarks as $bookmark ) {?>
                            <div class="col-lg-4 col-md-6 my-2">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="<?php echo $bookmark->link_url ?>"
                                           target="<?php echo $bookmark->link_target ?>" class="card-title" title="<?php echo $bookmark->link_name ?>"><?php echo $bookmark->link_name ?></a>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $bookmark->link_notes ?></p></div>
                                    <div class="card-footer clearfix">
                                        <small class="text-muted float-left">
                                            <i class="fa fa-link"></i>常用工具
                                        </small>
                                        <a href="<?php echo $bookmark->link_url ?>"
                                           target="<?php echo $bookmark->link_target ?>"title="<?php echo $bookmark->link_name ?>">
                                        <img class="float-right"
                                             src="<?php echo get_stylesheet_directory_uri() . "/images/default-links.png" ?>' ">
                                        </a>
                                    </div>
                                </div>
                            </div>
						<?php }
						?>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<?php get_footer(); ?>
