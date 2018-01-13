<?php
/**
 * The template for displaying the footer
 *
 * @package Vtrois
 * @version 2.4
 */
;?>
				<footer>
					<div id="footer">
						<div class="cd-tool visible-lg text-center">
							<?php if (kratos_option('cd_gb') && kratos_option('cd_weixin')) {?>
						   		<a rel="nofollow" class="cd-gb-a" href="<?php echo kratos_option('guestbook_links'); ?>"><span class="fa fa-book"></span></a>
						   	<?php } elseif (kratos_option('cd_gb') && !kratos_option('cd_weixin')) {?>
						   		<a rel="nofollow" class="cd-gb-b" href="<?php echo kratos_option('guestbook_links'); ?>"><span class="fa fa-book"></span></a>
						   	<?php }?>
						   	<?php if (kratos_option('cd_weixin')): ?>
						   		<a id="weixin-img" class="cd-weixin"><span class="fa fa-weixin"></span><div id="weixin-pic"><img src="<?php echo kratos_option('weixin_image'); ?>"></div></a>
						   	<?php endif;?>
						    <a class="cd-top cd-is-visible cd-fade-out"><span class="fa fa-chevron-up"></span></a>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 footer-list text-center">
									<p class="kratos-social-icons">
									<?php echo (!kratos_option('social_weibo')) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option('social_weibo') . '"><i class="fa fa-weibo"></i></a>'; ?>
									<?php echo (!kratos_option('social_tweibo')) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option('social_tweibo') . '"><i class="fa fa-tencent-weibo"></i></a>'; ?>
									<?php echo (!kratos_option('social_twitter')) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option('social_twitter') . '"><i class="fa fa-twitter"></i></a>'; ?>
									<?php echo (!kratos_option('social_facebook')) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option('social_facebook') . '"><i class="fa fa-facebook-official"></i></a>'; ?>
									<?php echo (!kratos_option('social_linkedin')) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option('social_linkedin') . '"><i class="fa fa-linkedin-square"></i></a>'; ?>
									<?php echo (!kratos_option('social_github')) ? '' : '<a target="_blank" rel="nofollow" href="' . kratos_option('social_github') . '"><i class="fa fa-github"></i></a>'; ?>
									</p>
									<p>Copyright <?php echo date('Y'); ?> <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name');?></a>. Based on <a href="https://github.com/Vtrois/Kratos">Kratos.</a></br><span id="timeDate">载入天数...</span><span id="times">载入时分秒...</span><script>var now=new Date();function createtime(){var grt=new Date("12/13/2017 14:00:00");now.setTime(now.getTime()+250);days=(now-grt)/1000/60/60/24;dnum=Math.floor(days);hours=(now-grt)/1000/60/60-(24*dnum);hnum=Math.floor(hours);if(String(hnum).length==1){hnum="0"+hnum}minutes=(now-grt)/1000/60-(24*60*dnum)-(60*hnum);mnum=Math.floor(minutes);if(String(mnum).length==1){mnum="0"+mnum}seconds=(now-grt)/1000-(24*60*60*dnum)-(60*60*hnum)-(60*mnum);snum=Math.round(seconds);if(String(snum).length==1){snum="0"+snum}document.getElementById("timeDate").innerHTML="本站已安全运行："+dnum+"天";document.getElementById("times").innerHTML=hnum+"小时"+mnum+"分"+snum+"秒"}setInterval("createtime()",250);</script>
									<?php if (kratos_option('icp_num')) {?><br><a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo kratos_option('icp_num');} ?></a><?php if (kratos_option('gov_num')) {?><br><a href="<?php echo kratos_option('gov_link'); ?>" rel="external nofollow" target="_blank"><i class="govimg"></i><?php echo kratos_option('gov_num'); ?></a><?php }?></p><p><?php echo (!kratos_option('site_tongji')) ? '' : kratos_option('site_tongji'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<?php wp_footer();?>
		<?php if (kratos_option('site_sa')): ?>
		<script type="text/javascript">
			if ($("#main").height() > $("#sidebar").height()) {
				var footerHeight = 0;
				if ($('#page-footer').length > 0) {
					footerHeight = $('#page-footer').outerHeight(true);
				}
				$('#sidebar').affix({
					offset: {
						top: $('#sidebar').offset().top - 30,
						bottom: $('#footer').outerHeight(true) + footerHeight + 6
					}
				});
			}
		</script>
		<?php endif;?>
	</body>
</html>