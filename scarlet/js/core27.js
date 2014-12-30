jQuery(document).ready(function($){
	$('#findmebest li.search a').toggle(
		function() {
			$('.search-form').fadeIn(100);
		},
		function() {
			$('.search-form').fadeOut(200);
		}
	);
	$('.music a').toggle(
		function() {
			$('#mplayer').fadeIn(100);
		},
		function() {
			$('#mplayer').fadeOut(200);
		}
	);
	// Creating empty arrays and adding values
    var myArray = [];
    // Adds "hello" on index 0
    myArray.push( "url(http://pic.nekohand.moe/1/di/79Z2/79Z2.jpg)" );
    // Adds "world" on index 1
    myArray.push( "url(http://pic.nekohand.moe/1/di/1VQP/1VQP.jpg)" );
    // Adds "!" on index 2
    myArray.push( "url(http://pic.nekohand.moe/1/di/KNYK/KNYK.jpg)" );
        // Adds "hello" on index 3
    myArray.push( "url(http://pic.nekohand.moe/1/di/RRPA/RRPA.jpg)" );
    // Adds "world" on index 4
    myArray.push( "url(http://pic.nekohand.moe/1/di/7JP3/7JP3.jpg)" );
    // Adds "!" on index 5
    myArray.push( "url(http://pic.nekohand.moe/1/di/H9O5/H9O5.png)" );
        // Adds "hello" on index 6
    myArray.push( "url(http://pic.nekohand.moe/1/di/IEJV/IEJV.jpg)" );
    // Adds "world" on index 7
    myArray.push( "url(http://pic.nekohand.moe/1/di/5UFX/5UFX.jpg)" );
    // Adds "!" on index 8
    myArray.push( "url(http://ww1.sinaimg.cn/large/43a59178jw1enrf1jclbrj20ku0ku75x.jpg)" );
    // Adds "world" on index 9
    myArray.push( "url(http://ww1.sinaimg.cn/large/43a59178jw1enrf1jclbrj20ku0ku75x.jpg)" );
    // Adds "!" on index 10
    myArray.push( "url(http://ww1.sinaimg.cn/large/43a59178jw1enrf1jclbrj20ku0ku75x.jpg)" );
   
	
	
	$('#findmebest li.diystyle a').toggle(
		function() {
		    var idtext = Math.floor((Math.random() * 10) + 1);
			$('body').css("background-repeat", "no-repeat");
			$('body').css("background-image", myArray[idtext]);
			$('body').css("background-attachment", "fixed");
			$('body').css("background-size", "cover");
			$('#freshcontent').css("opacity", "0.85");
			$('.page_navi').css("opacity", "0.85");
			$('#freshcontent').css("background-color", "transparent");
			$('.page_navi').css("background-color", "#ffffff");
			$('.sac').css("background-color", "#ffffff");
		},
		function() {
		    var idtext = Math.floor((Math.random() * 10) + 1);
			$('body').css("background-repeat", "no-repeat");
			$('body').css("background-image", myArray[idtext]);
			$('body').css("background-attachment", "fixed");
			$('body').css("background-size", "cover");
			$('#freshcontent').css("opacity", "0.85");
			$('.page_navi').css("opacity", "0.85");
		}
	);
	
	$(window).load(function() {     
	    var idtext = 9;
        $('body').css("background-repeat", "no-repeat");
		$('body').css("background-image", myArray[idtext]);
		$('body').css("background-attachment", "fixed");
		$('body').css("background-size", "cover");
	});
});



jQuery(function() {
	scarlet.init();
});

var scarlet = {
    init: function(){
        this.scrollTop();
    //    this.lazyload();
        this.goTop();
        this.setImgHeight();
        this.ajaxNavi();
        this.ajaxPage();
        this.ajaxSpan();
        this.ajaxTitle();
        this.ajaxArchive();
        this.ajaxCommentsReply();
		this.ajaxCommentsPage();
    },
    // 延时加载图片功能
	//lazyload: function() {
//		jQuery(".lazy").lazyload({ effect : "fadeIn" ,threshold : 200,skip_invisible : true});
//	},
	scrollTop: function() {
		//获取要定位元素距离浏览器顶部的距离 
		var navH = jQuery("#freshcontent").offset().top; 

		//滚动条事件 
		jQuery(window).scroll(function() { 
			//获取滚动条的滑动距离 
			var scroH = jQuery(this).scrollTop(); 

			//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定 

		}); 
	},
	goTop: function() {
		jQuery(window).scroll(function() {
			jQuery(this).scrollTop() > 40 ? jQuery("#gotop").css({
				bottom: "80px"
			}) : jQuery("#gotop").css({
				bottom: "-80px"
			});
		});

		jQuery("#gotop").click(function() {
			return jQuery("body,html").animate({
				scrollTop: 0
			}, 800), !1});
	},
	
	
	addAnimation: function() {
    var animations = jQuery("[data-toggle='animation']");

    animations.each(function() {
      jQuery(this).addClass("animation", 2000);
    });
    },
    // 等比例设置文章图片高度
	setImgHeight: function() {
		var relatedImg = jQuery("#postcontent img"),
		  	thumbImg = jQuery("#postcontent img"),
				articleImg = jQuery("#postcontent img");

		eachHeight(relatedImg);
		eachHeight(thumbImg);
		eachHeight(articleImg);

		function  eachHeight(data) {
			data.each(function() {
				var $this 		 = jQuery(this),
						attrWidth  = $this.attr('width'),
						attrHeight = $this.attr('height'),
						width 		 = $this.width(),
						scale      = width / attrWidth,
						height     = scale * attrHeight;

				$this.css('height', height);

			});
		}
	},
	
	// ajax 导航
	ajaxNavi: function() {
		var $ = jQuery.noConflict();
		$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
 
		$(".navbar-nav a").live("click", function(e) {
        e.preventDefault();
		var qurl = $(this).attr("href");
        var titlestring = $(this).html().replace(/<.*?>/g,"");
		rt  = $.ajax({ 
  				type: "POST",
                url: qurl,
          beforeSend: function() {
          	$("#freshcontent").addClass("load").prepend("<div id='loading-article'><i class='fa fa-spinner fa-spin' style='color:gold'></i></div>");
        		$('#loading-article').slideDown();
        	$("body,html").animate({scrollTop:0}, 1500);
          },
          dataType: "html",
          success: function(data){
		    var state = {
                        url:qurl,
                        title:document.title,
                        html: data
            };
			history.pushState(state, titlestring, qurl); 
			document.title= titlestring + '| 猫爪';
            result = $(data).find(".sac"); 
            page = $(data).find(".page_navi");
			//sidebarcontent = $(data).find("#axsidebar");
			//$('#sidebarxm').empty();
            $('#freshcontent').empty();
            $('#freshcontent').append(result.fadeIn(300),page.fadeIn(300)).removeClass("load");
			//$('#sidebarxm').empty();
			//$("#sidebarxm").append(sidebarcontent.fadeIn(300)).removeClass("load");
            //scarlet.lazyload();
            scarlet.setImgHeight();
          }
        });
		window.addEventListener('popstate', function(evt){
			var state = evt.state;
			}, false); 
        return false;
    });
	},
	
	// ajax 分页
	ajaxPage: function() {
		var $ = jQuery.noConflict();
		$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
 
		$(".page_navi a").live("click", function(e) {
        e.preventDefault();
		var qurl = $(this).attr("href");
        var titlestring = $(this).html();
		rt  = $.ajax({ 
  				type: "POST",
                url: qurl + "#freshcontent",
          beforeSend: function() {
          	$("#freshcontent").addClass("load").prepend("<div id='loading-article'><i class='fa fa-spinner fa-spin' style='color:red'></i></div>");
        		$('#loading-article').slideDown();
        		$("body,html").animate({scrollTop:0}, 1500);
          },
          dataType: "html",
          success: function(data){
		    var state = {
                        url:qurl,
                        title:document.title,
                        html: data
            };
			history.pushState(state, titlestring, qurl); 
			//document.title= titlestring;
            result = $(data).find(".sac"); 
            page = $(data).find(".page_navi");
			//sidebarcontent = $(data).find("#axsidebar");
			//$('#sidebarxm').empty();
            $('#freshcontent').empty();
            $('#freshcontent').append(result.fadeIn(300),page.fadeIn(300)).removeClass("load");
			//$('#sidebarxm').empty();
			//$("#sidebarxm").append(sidebarcontent.fadeIn(300)).removeClass("load");
            //scarlet.lazyload();
            scarlet.setImgHeight();
          }
        });
		window.addEventListener('popstate', function(evt){
			var state = evt.state;
			}, false); 
        return false;
    });
	},
	
	// ajax Span
	ajaxSpan: function() {
		var $ = jQuery.noConflict();
		$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
 
		$("span a").live("click", function(e) {
        e.preventDefault();
		var qurl = $(this).attr("href");
        var titlestring = $(this).html();
		rt  = $.ajax({ 
  				type: "POST",
                url: qurl,
          beforeSend: function() {
          	$("#freshcontent").addClass("load").prepend("<div id='loading-article'><i class='fa fa-spinner fa-spin' style='color:red'></i></div>");
        		$('#loading-article').slideDown();
        		$("body,html").animate({scrollTop:0}, 1500);
          },
          dataType: "html",
          success: function(data){
		    var state = {
                        url:qurl,
                        title:document.title,
                        html: data
            };
			history.pushState(state, titlestring, qurl); 
			document.title= titlestring + '| 绯羽魔法店';
            result = $(data).find(".sac"); 
            page = $(data).find(".page_navi");
			//sidebarcontent = $(data).find("#axsidebar");
			//$('#sidebarxm').empty();
            $('#freshcontent').empty();
            $('#freshcontent').append(result.fadeIn(300),page.fadeIn(300)).removeClass("load");
			//$('#sidebarxm').empty();
			//$("#sidebarxm").append(sidebarcontent.fadeIn(300)).removeClass("load");
            //scarlet.lazyload();
            scarlet.setImgHeight();
          }
        });
		window.addEventListener('popstate', function(evt){
			var state = evt.state;
			}, false); 
        return false;
    });
	},
	
	ajaxTitle: function() {
		var $ = jQuery.noConflict();
		$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
 
		$(".titleblock a").live("click", function(e) {
        e.preventDefault();
		var qurl = $(this).attr("href");
        var titlestring = $(this).attr("title");
		rt  = $.ajax({ 
  				type: "POST",
                url: qurl,
          beforeSend: function() {
          	$("#freshcontent").addClass("load").prepend("<div id='loading-article'><i class='fa fa-spinner fa-spin' style='color:red'></i></div>");
        		$('#loading-article').slideDown();
        		$("body,html").animate({scrollTop:0}, 1500);
          },
          dataType: "html",
          success: function(data){
		    var state = {
                        url:qurl,
                        title:document.title,
                        html: data
            };
			history.pushState(state, titlestring, qurl); 
			document.title= titlestring + '| 猫爪';
            result = $(data).find(".sac"); 
            page = $(data).find(".page_navi");
			//sidebarcontent = $(data).find("#axsidebar");
			//$('#sidebarxm').empty();
            $('#freshcontent').empty();
            $('#freshcontent').append(result.fadeIn(300),page.fadeIn(300)).removeClass("load");
			//$('#sidebarxm').empty();
			//$("#sidebarxm").append(sidebarcontent.fadeIn(300)).removeClass("load");
            //scarlet.lazyload();
            scarlet.setImgHeight();
          }
        });
		window.addEventListener('popstate', function(evt){
			var state = evt.state;
			}, false); 
        return false;
    });
	},
	
	// archive 导航
	ajaxArchive: function() {
		var $ = jQuery.noConflict();
		$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
 
		$(".pagefinal a").live("click", function(e) {
        e.preventDefault();
		var qurl = $(this).attr("href");
        var titlestring = $(this).html().replace(/<.*?>/g,"");
		rt  = $.ajax({ 
  				type: "POST",
                url: qurl,
          beforeSend: function() {
          	$("#freshcontent").addClass("load").prepend("<div id='loading-article'><i class='fa fa-spinner fa-spin' style='color:red'></i></div>");
        		$('#loading-article').slideDown();
        		$("body,html").animate({scrollTop:0}, 1500);
          },
          dataType: "html",
          success: function(data){
		    var state = {
                        url:qurl,
                        title:document.title,
                        html: data
            };
			history.pushState(state, titlestring, qurl); 
			document.title= titlestring+ '| 猫爪';
            result = $(data).find(".sac"); 
            page = $(data).find(".page_navi");
			//sidebarcontent = $(data).find("#axsidebar");
			//$('#sidebarxm').empty();
            $('#freshcontent').empty();
            $('#freshcontent').append(result.fadeIn(300),page.fadeIn(300)).removeClass("load");
			//$('#sidebarxm').empty();
			//$("#sidebarxm").append(sidebarcontent.fadeIn(300)).removeClass("load");
            //scarlet.lazyload();
            scarlet.setImgHeight();
          }
        });
		window.addEventListener('popstate', function(evt){
			var state = evt.state;
			}, false); 
        return false;
    });
	},
	
	// ajax评论回复
	ajaxCommentsReply :function() {
		var $ = jQuery.noConflict();

		var $commentform = $('#commentform'),
		    txt1 = '<div id="loading"><i class="fa fa-spinner fa-spin"></i> 正在提交, 请稍候...</div>',
		    txt2 = '<div id="error">#</div>',
				cancel_edit = '取消编辑',
				num = 1,
				$comments = $('#comments-title'),
				$cancel = $('#cancel-comment-reply-link'),
				cancel_text = $cancel.text(),
				$submit = $('#commentform #submit');

				$submit.attr('disabled', false),
				$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body'),
				comm_array = [];
				comm_array.push('');
				
        $('#comment').after(txt1 + txt2);
				$('#loading').hide();
				$('#error').hide();

		$(document).on("submit", "#commentform",
		  function() {
				$submit.attr('disabled', true).fadeTo('slow', 0.5);
				$('#loading').slideDown();

				$.ajax({
					url: $("#comments").attr("data-url"),
					data: $(this).serialize() + "&action=ajax_comment",
					type: $(this).attr('method'),
					error: function(request) {
						$('#loading').hide();
						$("#error").slideDown().html(request.responseText);
						setTimeout(function() {
							$submit.attr('disabled', false).fadeTo('slow', 1);
							$('#error').slideUp();
						},
						3000);
					},
					success: function(data) {
						$('#loading').hide();
						comm_array.push($('#comment').val());
						$('textarea').each(function() {
							this.value = '';
						});

						var t = addComment,
						cancel = t.I('cancel-comment-reply-link'),
						temp = t.I('wp-temp-form-div'),
						respond = t.I(t.respondId);
						post = t.I('comment_post_ID').value,
						parent = t.I('comment_parent').value;

						if ($comments.length) {
							n = parseInt($comments.text().match(/\d+/));
							$comments.text($comments.text().replace(n, n + 1));
						}

						new_htm = '" id="new-comm-' + num + '"></';
						new_htm = (parent == '0') ? ('\n<ol class="commentlist' + new_htm + 'ol>') : ('\n<ol class="children' + new_htm + 'ol>');
						div_ = (document.body.innerHTML.indexOf('div-comment-') == -1) ? '': ((document.body.innerHTML.indexOf('li-comment-') == -1) ? 'div-': '');
						
						$('#respond').before(new_htm);
						$('#new-comm-' + num).append(data);
						
						$body.animate({
							scrollTop: $('#new-comm-' + num).offset().top - 65
						}, 800);
						
						countdown();
						num++;
						cancel.style.display = 'none';
						cancel.onclick = null;
						t.I('comment_parent').value = '0';

						if (temp && respond) {
							temp.parentNode.insertBefore(respond, temp);
							temp.parentNode.removeChild(temp)
						}
					}
				});
				return false;
			}
		);
		addComment = {
			moveForm: function(commId, parentId, respondId, postId, num) {
				var t = this,
				div,
				comm = t.I(commId),
				respond = t.I(respondId),
				cancel = t.I('cancel-comment-reply-link'),
				parent = t.I('comment_parent'),
				post = t.I('comment_post_ID');

				num ? (
					t.I('comment').value = comm_array[num], 
					$new_sucs = $('#success_' + num), 
					$new_sucs.hide(), $new_comm = $('#new-comm-' + num), 
					$cancel.text(cancel_edit)
				) : $cancel.text(cancel_text);

				t.respondId = respondId;
				postId = postId || false;

				if (!t.I('wp-temp-form-div')) {
					div = document.createElement('div');
					div.id = 'wp-temp-form-div';
					div.style.display = 'none';
					respond.parentNode.insertBefore(div, respond)
				} 

				!comm ? (
					temp = t.I('wp-temp-form-div'), 
					t.I('comment_parent').value = '0', 
					temp.parentNode.insertBefore(respond, temp), 
					temp.parentNode.removeChild(temp)
				) : comm.parentNode.insertBefore(respond, comm.nextSibling);

				$body.animate( {
					scrollTop: $('#respond').offset().top - 200
				}, 400 );

				if (post && postId) post.value = postId;

				parent.value = parentId;
				cancel.style.display = '';

				cancel.onclick = function() {
					var t = addComment,
					temp = t.I('wp-temp-form-div'),
					respond = t.I(t.respondId);
					t.I('comment_parent').value = '0';

					if (temp && respond) {
						temp.parentNode.insertBefore(respond, temp);
						temp.parentNode.removeChild(temp);
					}
					this.style.display = 'none';
					this.onclick = null;
					return false;
				};

				try {
					t.I('comment').focus();
				}
				catch(e) {}
				return false;
			},

			I: function(e) {
				return document.getElementById(e);
			}
		};

		var wait = 10,
		submit_val = $submit.val();

		function countdown() {
			if (wait > 0) {
				$submit.val(wait);
				wait--;
				setTimeout(countdown, 1000);
			} else {
				$submit.val(submit_val).attr('disabled', false).fadeTo('slow', 1);
				wait = 10;
			}
		};
	},

		// ajax评论分页
	ajaxCommentsPage: function() {
		var $ = jQuery.noConflict();

		$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
		// 点击分页导航链接时触发分页
		$('#comment-nav a').live('click', function(e) {
		    e.preventDefault();
		    $.ajax({
		        type: "GET",
		        url: $(this).attr('href'),
		        beforeSend: function(){
		            $('#comment-nav').remove();
		            $('.commentlist').remove();
		            $('#loading-comments').slideDown();
		            $body.animate({scrollTop: $('#comments-title').offset().top - 65 }, 800 );
		        },
		        dataType: "html",
		        success: function(out){
		            result = $(out).find('.commentlist');
		            nextlink = $(out).find('#comment-nav');

		            $('#loading-comments').slideUp('fast');
		            $('#loading-comments').after(result.fadeIn(500));
		            $('.commentlist').after(nextlink);
		            scarlet.ajaxCommentsReply();
		        }
		    });
		    return false;
		});
	},
	
	
};

