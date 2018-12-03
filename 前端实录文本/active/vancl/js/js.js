$(function(){
	//顶部部分
	 $(".hide_ul").hide();
	 $("#header .header_menu .menu_ul .over_show").hover(function(){
	 	$(this).addClass('active');
	 	$(this).find('.hide_ul').show();
	 },function(){
	 	$(this).removeClass('active');
	 	$(this).find('.hide_ul').hide();
	 });


	$("#header .header_menu .menu_ul .menu_li:lt(3) li").hover(function(){
		$(this).css({'cursor':'pointer','color':'#A10000'});
	},function(){
		$(this).css('color','#333');
	});
	//顶部部分结束

	// 搜索部分选择
	$(".search_select li").click(function(){
		//alert($(this).find('a').attr);
		$(".search_select li a").addClass('no');
		$(this).find('a').removeClass('no');
	});
	// 搜索部分选择结束

	// 购物车部分
	$(".shopping").mouseover(function(){
		$(this).addClass('active');
		$(this).find('.bottom_p').html('您的购物车中没有任何商品');
	});
	$(".shopping").mouseout(function(){
		$(this).removeClass('active');
		$(this).find('.bottom_p').html('');
	});
	// 购物车部分结束

	// 凡客达人
	$("#logo_search .fanke_web .fanke_web_one").hover(function(){
		$(this).addClass('cur');
		$(this).find('.fanke_web_big').show();
	},function(){
		$(this).removeClass('cur');
		$(this).find('.fanke_web_big').hide();
	});
	// 凡客达人结束


	// 灰色导航条
	$("#nav_grey .nav li").hover(function(){
		$(this).find('a').addClass('active');
		$(this).find('.fanke_web_big').show();
	},function(){
		$(this).find('a').removeClass('active');
		$(this).find('.fanke_web_big').hide();
	});
	// 灰色导航条结束



	// 轮播图
	var timer = null;
	var iNow = 0;
	timer = setInterval(run,2000);

	function run(){

			iNow++;
			if(iNow >= $("#content .r_ad a img").length){
				iNow = 0;
			}

			$(".r_ad a img").eq(iNow).fadeIn().parent('a').siblings('a').children().hide();
			$("#content .r_ad .r_ul li").eq(iNow).addClass('active').siblings('li').removeClass('active');
	}

	$("#content .r_ad .r_ul li").hover(function(){
		clearInterval(timer);
		iNow = $(this).index();
		// alert(1);
		$(".r_ad a img").eq(iNow).fadeIn().parent('a').siblings('a').children().hide();
		$(this).addClass('active').siblings('li').removeClass('active');

	},function(){
		timer = setInterval(run,2000);
	});

	// 轮播图结束


	// 无缝滚动广告开始
	var wufeng = null;

	function wufengRun(){
		$("#content .r .r_ul").css('left',($("#content .r .r_ul").position().left)-1);
		
		// console.log($("#content .r .r_ul").position().left);
		// console.log($("#content .r .r_ul").width());
		if($("#content .r .r_ul").position().left < -(parseInt($("#content .r .r_ul").width())/2) ){
			$("#content .r .r_ul").css('left','0px');
		}
	}

	wufeng = setInterval(wufengRun,10);

	$("#content .r .r_ul").hover(function(){
		clearInterval(wufeng);
	},function(){
		wufeng = setInterval(wufengRun,10);
	});
	
	// 无缝滚动广告结束



	// 所有商品分类hover效果

	$("#content .all_class .all_context .pot").hover(function(){
		$(this).find('.list').css({'border':'1px solid #a30001','border-left':'none'});
		$(this).find(".left").css('background-position','0 -132px');
	},function(){
		// $(this).find('.list').css('border','1px solid #DDDDDD');
		$(this).find(".left").css('background-position','0 -53px');
		$(this).find('.list').css({'border':'1px solid #DDDDDD','border-left':'none'});
	});
	// 所有商品分类结束

	// TAB切换页
	$("#content .all_right .tab .tab_title li").mouseover(function(){
		$(this).addClass('active').siblings("li").removeClass('active');
		$("#content .all_right .tab .con").eq($(this).index()).show().siblings('.con').hide();
	});
	// TAB切换页结束

});