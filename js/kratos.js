(function() {

	'use strict';

	var shareMenu = function() {
		$(".Share").click(function() {
			$(".share-wrap").fadeToggle("slow");
		});

		$('.qrcode').each(function(index, el) {
			var url = $(this).data('url');
			if ($.fn.qrcode) {
				$(this).qrcode({
					text: url,
					width: 150,
					height: 150,
				});
			}
		});
	}

	var topStart = function() {
		$('#top-Start').click(function() {
			$('html,body').animate({
				scrollTop: $('#kratos-blog').offset().top
			}, 1000);
		});
	};

	var isiPad = function() {
		return (navigator.platform.indexOf("iPad") != -1);
	};

	var isiPhone = function() {
		return (
			(navigator.platform.indexOf("iPhone") != -1) ||
			(navigator.platform.indexOf("iPod") != -1)
		);
	};

	var mainMenu = function() {
		$('#kratos-primary-menu').superfish({
			delay: 0,
			animation: {
				opacity: 'show'
			},
			speed: 'fast',
			cssArrows: true,
			disableHI: true
		});
	};

	var parallax = function() {
		$(window).stellar();
	};

	var offcanvas = function() {
		var $clone = $('#kratos-menu-wrap').clone();
		$clone.attr({
			'id': 'offcanvas-menu'
		});
		$clone.find('> ul').attr({
			'class': '',
			'id': ''
		});
		$('#kratos-page').prepend($clone);
		$('.js-kratos-nav-toggle').on('click', function() {
			if ($('body').hasClass('kratos-offcanvas')) {
				$('body').removeClass('kratos-offcanvas');
			} else {
				$('body').addClass('kratos-offcanvas');
			}
		});
		$('#offcanvas-menu').css('height', $(window).height());
		$(window).resize(function() {
			var w = $(window);
			$('#offcanvas-menu').css('height', w.height());
			if (w.width() > 769) {
				if ($('body').hasClass('kratos-offcanvas')) {
					$('body').removeClass('kratos-offcanvas');
				}
			}
		});

        $('#offcanvas-menu ul li a.sf-with-ul').parent().prepend('<i class="fa fa-sort-desc" aria-hidden="true"></i>');
		$('i.fa.fa-sort-desc').click(function () {
			if(($(this).parent("li").attr("class")==null)){
                $(this).siblings('ul').slideDown();
                $(this).parent("li").addClass("open");
			}else if($(this).parent("li").attr("class").indexOf("open")>=0){
                $(this).siblings('ul').slideUp();
                $(this).parent("li").removeClass("open");
			}else{
                $(this).siblings('ul').slideDown();
                $(this).parent("li").addClass("open");
			}
        });
	}

	var sidebaraffix = function() {
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
	}
    var stickConfig = function() {
        $('.baidu_ad').stick_in_parent({offset_top:60});
    };

	var mobileMenuOutsideClick = function() {
		$(document).click(function(e) {
			var container = $("#offcanvas-menu, .js-kratos-nav-toggle");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				if ($('body').hasClass('kratos-offcanvas')) {
					$('body').removeClass('kratos-offcanvas');
				}
			}
		});
	};

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint(function(direction) {
			if (direction === 'down' && !$(this.element).hasClass('animated')) {
				i++;
				$(this.element).addClass('item-animate');
				setTimeout(function() {
					$('body .animate-box.item-animate').each(function(k) {
						var el = $(this);
						setTimeout(function() {
							el.addClass('fadeInUp animated');
							el.removeClass('item-animate');
						}, k * 200, 'easeInOutExpo');
					});
				}, 100);
			}
		}, {
			offset: '85%'
		});
	};

	var showThumb = function(){
		(function ($) {
			$.extend({
				tipsBox: function (options) {
					options = $.extend({
						obj: null,
						str: "+1",
						startSize: "10px",
						endSize: "25px",
						interval: 800,
						color: "red",
						callback: function () { }
					}, options);
					$("body").append("<span class='num'>" + options.str + "</span>");
					var box = $(".num");
					var left = options.obj.offset().left + options.obj.width() / 2;
					var top = options.obj.offset().top - options.obj.height();
					box.css({
						"position": "absolute",
						"left": left - 12 + "px",
						"top": top + 9 + "px",
						"z-index": 9999,
						"font-size": options.startSize,
						"line-height": options.endSize,
						"color": options.color
					});
					box.animate({
						"font-size": options.endSize,
						"opacity": "0",
						"top": top - parseInt(options.endSize) + "px"
					}, options.interval, function () {
						box.remove();
						options.callback();
					});
				}
			});
		})(jQuery);

	}

	var showlove = function() {
			$.fn.postLike = function() {
				if ($(this).hasClass('done')) {
					layer.msg('您已经支持过了', function() {});
					return false;
				} else {
					$(this).addClass('done');
					layer.msg('感谢您的支持');
					var id = $(this).data("id"),
						action = $(this).data('action'),
						rateHolder = $(this).children('.count');
					var ajax_data = {
						action: "love",
						um_id: id,
						um_action: action
					};
					$.post("/wp-admin/admin-ajax.php", ajax_data, function(data) {
						$(rateHolder).html(data);
					});
					return false;
				}
			};
			$(document).on("click", ".Love", function() {
				$(this).postLike();
			});
		}

	var gotop = function() {
        $('.gotop-btn').on('click', function(event){
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $('html').offset().top
            }, 500, 'easeInOutExpo');
            return false;
        });

        $(window).scroll(function(){
            var $win = $(window);
            if ($win.scrollTop() > 50) {
                $('.gotop-box').addClass('active');
                $('.header-container').css("background", '#000');
            } else {
                $('.gotop-box').removeClass('active');
                $('.header-container').css("background", '');
            }
        });
	}

	var weixinpic = function() {
		$(".weixin-box").mouseout(function(){
	        $("#weixin-pic")[0].style.display = 'none';
	    })
		$(".weixin-box").mouseover(function(){
	        $("#weixin-pic")[0].style.display = 'block';
	    })
	}

	var showPhotos = function() {
		layer.photos({
		  photos: '.kratos-post-content'
		  ,anim: 0
		});
	}

	var copyright = function() {
		console.log("项目托管：https://github.com/Vtrois/Kratos");
	}

	var search = function () {
        $('.search-box').on("click", function(e) {
            $("#searchform").animate({width:"200px"},200),
                $("#searchform input").css('display','block');
            $(document).one("click", function() {
                $("#searchform").animate({width:"0"},100),
                    $("#searchform input").hide();
            });
            e.stopPropagation();
        });
        $('#searchform').on("click", function(e) {e.stopPropagation();})
    }

	var donate = function() {
		var v3 = {
        "alipay_lable": "https://www.flyzy2005.cn/wp-content/uploads/2017/12/alipay-1.png",
        "wechat_lable": "https://www.flyzy2005.cn/wp-content/uploads/2017/12/wechat.png",
        "alipay": "https://www.flyzy2005.cn/wp-content/uploads/2017/12/alipay.png",
        "wechat": "https://www.flyzy2005.cn/wp-content/uploads/2017/12/wechatpay.png",
        "donate": "\u6253\u8d4f\u4f5c\u8005",
        "scan": "\u626b\u4e00\u626b\u652f\u4ed8"
      };
		$(".Donate").click(function(){
			layer.open({
				type: 1,
				area: ['300px', '370px'],
				title: v3.donate,
				resize:false,
				scrollbar: false,
				content: '<div class="donate-box"><div class="meta-pay text-center"><strong>'+v3.scan+'</strong></div><div class="qr-pay text-center"><img class="pay-img" id="alipay_qr" src="'+v3.alipay+'"><img class="pay-img d-none" id="wechat_qr" src="'+v3.wechat+'"></div><div class="choose-pay text-center mt-2"><input id="alipay" type="radio" name="pay-method" checked><label for="alipay" class="pay-button"><img src="'+v3.alipay_lable+'"></label><input id="wechatpay" type="radio" name="pay-method"><label for="wechatpay" class="pay-button"><img src="'+v3.wechat_lable+'"></label></div></div>'
			});
			$(".choose-pay input[type='radio']").click(function(){
				var id= $(this).attr("id");
				if (id=='alipay') { $(".qr-pay #alipay_qr").removeClass('d-none');$(".qr-pay #wechat_qr").addClass('d-none') };
				if (id=='wechatpay') { $(".qr-pay #alipay_qr").addClass('d-none');$(".qr-pay #wechat_qr").removeClass('d-none') };
			});
		});
	}

    function autoScroll(obj) {
        $(obj).find(".list").animate({
            marginTop : "-30px"
        },500,function(){
            $(this).css({marginTop : "0px"}).find("li:first").appendTo(this);
        })
    }

	$(function() {
        setInterval(function () { autoScroll(".sitediv") },4000);
        topStart();
		mainMenu();
		shareMenu();
		parallax();
		offcanvas();
		showThumb();
		showlove();
		gotop();
		weixinpic();
		mobileMenuOutsideClick();
		contentWayPoint();
		//showPhotos();
		donate();
        search();
        stickConfig();
        //sidebaraffix();
		//copyright();
	});
}());
