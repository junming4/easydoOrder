$(function() {

	// 登录
	$(".hotoplogina").on("click", function() {
		if($(".hcltopuserloginpop")[0]) {
			$(".hcltopuserloginpop").animate({
				top: 0
			});
		} else if($(".hcltopLoginpop")[0]) {
			$(".hcltopLoginpop").animate({
				top: 0
			});
		}
		return false;
	});

	$(".hcltopLoginpop .contrLoginTitle span").on("click", function() {
		$(".hcltopLoginpop").animate({
			top: '-' + $(".hcltopLoginpop").outerHeight(true)
		});
	});

	$(".hcltopLoginpop .contrLoginTitle strong a").on("click", function() {
		$(".hcltopLoginpop").animate({
			top: '-' + $(".hcltopLoginpop").outerHeight(true)
		}, function() {
			$(".hcltopRegisterpop").animate({
				top: 0
			});
		});
		return false;
	});

	$(".hcltopRegisterpop .contrLoginTitle span").on("click", function() {
		$(".hcltopRegisterpop").animate({
			top: '-' + $(".hcltopRegisterpop").outerHeight(true)
		});
	});

	$(".hcltopRegisterpop .contrLoginTitle strong a").on("click", function() {
		$(".hcltopRegisterpop").animate({
			top: '-' + $(".hcltopRegisterpop").outerHeight(true)
		}, function() {
			$(".hcltopLoginpop").animate({
				top: 0
			});
		});
		return false;
	});

	$(".hcltopuserloginpop .contrLoginTitle span").on("click", function() {
		$(".hcltopuserloginpop").animate({
			top: '-' + $(".hcltopuserloginpop").outerHeight(true)
		});
	});

	// 购物车
	$(".hcluser-cartpop-show").show();
	var no = true;
	$(".hclcarttp").on("click", function() {
		if($(".hcluserCartpop").is(".hcluser-cartpop-show")) {
			return true;
		}
		if(no) {
			$(".hcluserCartpop").stop().fadeIn();
		} else {
			$(".hcluserCartpop").stop().fadeOut();
		}
		no = !no;
	});

	$(".hcCartpopClose a").on("click", function() {
		$(".hcluserCartpop").stop().fadeOut();
		no = !no;
	});

	$(".hcluserCartpop .hcarpliTitle a:first").addClass("hcartlititActive");
	$(".hcartplisttabBox:first").show();
	$(".hcluserCartpop .hcarpliTitle a").each(function(index) {
		$(this).on("click", function() {
			$(".hcluserCartpop .hcarpliTitle a").removeClass("hcartlititActive").eq(index).addClass("hcartlititActive");
			$(".hcartplisttabBox").hide().eq(index).show();
			return false;
		});
	});

	$(".hcartblistdd i").on("click", function() {
		$(this).parent().parent().remove(".hcartblistddbox");
		return false;
	});

	$(".remove-cart-list a").on("click", function() {
		$($(this).parent().parent().parent()).find(".hcartblistddbox").remove();
		return false;
	});

	$(".conmonconformBox .conforddTitleclose span").on("click", function() {
		var index = $(this).index($(".conmonconformBox .conforddTitleclose span"));
		$(".conmonconformBox").eq(index).remove();
		return false;
	});

	$(".remove-cart-list-last a").on("click", function() {
		$($(this).parent().parent()).find(".conmonconformBox").remove();
		return false;
	});

	// 首页 三级联动
	$(document).on("click", function(ev) {
		if($(ev.target).is(".selefilterboxregion") || $(ev.target).is(".selefilterbox")) {
			return false;
		} else if($(ev.target).parents('.selefilterboxregion').html() != undefined) {
			return false;
		} else {
			$(".selefilterbox").removeClass("selefbbgorange");
			$(".selefilterboxregion").hide();
			$(".selefilterbox").attr("data-flag", 0);
		}
	});

	$(".selefilterbox").each(function(index) {
		$(this).on("click", function() {
			$(".selefilterboxregion").hide();
			$(".selefilterbox").removeClass("selefbbgorange");
			if($(this).attr("data-flag") == undefined) {
				$(".selefilterbox").attr("data-flag", 0);
			} else {
				$(".selefilterbox").not($(this)).attr("data-flag", 0);
			}
			if($(this).attr("data-flag") == 0) {
				$(this).attr("data-flag", 1);
				$(".selefilterboxregion").eq(index).show();
				$(this).addClass("selefbbgorange");
			} else if($(this).attr("data-flag") == 1) {
				$(this).attr("data-flag", 0);
				$(".selefilterboxregion").hide();
			}
			return false;
		});
	});

	$(".selelistbbox").each(function(i) {
		var This = $(this);
		$("ul li", this).each(function(j) {
			$(this).on("click", function() {
				$(".selelistbbox ul li a").removeClass("seleliboxddCur");
				$("ul li a", This).removeClass("seleliboxddCur").eq(j).addClass("seleliboxddCur");
				$(".selelistDropdown").hide().eq(i).show();
				$(".seledropdownnav", $(".selelistDropdown").eq(i)).hide().eq(j).show();
				if(!$(".seledropdownnav", $(".selelistDropdown").eq(i))[0]) {
					var ps = $(this).parent().parent().parent().parent().parent();
					ps.find("input").val($("a", this).attr("data-id"));
					ps.find(".selefilterboxregion").hide();
					$(".selefilterbox", ps).removeClass("selefbbgorange");
					$(".selefilterbox strong", ps).text($("a", this).text());
				}
			});
		});
	});

	$(".seledropdownnav ul li").each(function() {
		$(this).on("click", function() {
			var ps = $(this).parent().parent().parent().parent().parent().parent();
			ps.find("input").val($("a", this).attr("data-id"));
			ps.find(".selefilterboxregion").hide();
			$(".selefilterbox", ps).removeClass("selefbbgorange");
			$(".selefilterbox strong", ps).text($("a", this).text());
		});
	});

	// productsList.html
	$(".plstlistbox").each(function(index) {
		$(this).on("mouseover", function() {
			$(".plstboxpicopacity", this).stop(false, false).fadeIn();
		}).on("mouseout", function() {
			$(".plstboxpicopacity", this).stop(false, false).fadeOut();
		});
	});

	$(".plstorecobor").on("click", function() {
		if($(".plstoreDropdownnav").is(":hidden")) {
			$(".plstoreDropdownnav").show();
		} else {
			$(".plstoreDropdownnav").hide();
		}
	});

	// productsList2.html dialog
	$(".fp-dialog").fanDialog(".pl2storerom-close");

	// productsList3.html 
	$("#product-users-logout").on("click", function() {
		$(".plstoreOrdermsg").slideUp();
	});

	// productsList5.html
	$(".pl5stmsgClose").on("click", function() {
		$(".plstoreOrdermsg").slideUp();
	});

	// ucenter-order.html
	$(".evaluate-btn").on("click", function() {
		$(".order-evaluate-dialog").fanDialog(".order-evaluate-dialog-close");
		return false;
	});

	// editData.html
	$(document).on("click", function(ev) {
		if($(ev.target).is(".contmoncfSelecttit") || $(ev.target).is(".contmoncfSelectNav")) {
			return false;
		} else if($(ev.target).parents('.contmoncfSelecttit').html() != undefined) {
			return false;
		} else {
			$(".contmoncfSelectNav").hide();
		}
	});

	$(".contmoncfSelecttit").each(function(index) {
		$(this).on("click", function() {
			$(".contmoncfSelectNav").not($(".contmoncfSelectNav").eq(index)).hide();
			if($(".contmoncfSelectNav").eq(index).is(":hidden")) {
				$(".contmoncfSelectNav").eq(index).show();
			} else {
				$(".contmoncfSelectNav").eq(index).hide();
			}
		});
	});

	$(".contmoncfSelectNav a").each(function() {
		$(this).on("click", function() {
			var ps = $(this).parent().parent().parent().parent();
			ps.find("input").val($(this).attr("data-value"));
			ps.find(".contmoncfSelecttit a").text($(this).text());
			$(".contmoncfSelectNav").hide();
			return false;
		});
	});

	// myBalance.html
	$(".mbalactlistBox").each(function(index) {
		$(this).on("click", function() {
			if($(this).find(".mbaboxdetailCont").is(":hidden")) {
				$(this).find(".mbaboxdetailCont").slideDown("fast");

				$(".mbaboxTitle span").eq(index).addClass("mbtUpdown");
			} else {
				$(this).find(".mbaboxdetailCont").slideUp("fast");
				$(".mbaboxTitle span").eq(index).removeClass("mbtUpdown");
			}
		});
	});

	// groupOrdering.html
	$(".expbformbox").hide();
	//$(".expenresboxlist li a.epblbrrlast").parent().find(".expbformbox").show();
	$(".expenresboxlist li a").each(function(i) {
		$(this).on("click", function() {
			$(".expbformbox").hide();
			$(".expenresboxlist li").removeClass("expbliotherCur").eq(i).addClass("expbliotherCur");
			$(".expenresboxlist li a").removeClass("epblbrrlast");
			$(this).addClass("epblbrrlast");
			$(this).parent().find(".expbformbox").show();
			return false;
		});
	});

	if($(".check-status").is(".checkboxCur")) {
		$(".check-status").parent().find("input").val("1");
	}
	$(".check-status").on("click", function() {
		if($(".check-status").is(".checkboxCur")) {
			$(".check-status").removeClass("checkboxCur");
			$(".check-status").parent().find("input").val("0");
		} else {
			$(".check-status").addClass("checkboxCur");
			$(".check-status").parent().find("input").val("1");
		}
	});

	// groupOrdering2.html
	$(".gd-dinner-time-editor").on("click", function() {
		$(".modifyTime").fanDialog(".modify-time-close");
		return false;
	});

	// groupOrdering3.html
	$(".grd3Teamordering").fanDialog(".grd3TeamorderingClose");

	$(".grd3TeamorderingEditor").on("click", function() {
		$(".modifyTime").fanDialog(".modify-time-close", true);
		return false;
	});

	$(".copy-link").each(function(index) {
		$(this).zclip({
			path: 'js/zclip/ZeroClipboard.swf',
			copy: function() {
				return $('.copy-values').eq(index).attr("value");
			},
			afterCopy: function() {
				$(".copy-link").eq(index).text("己复制");
			}
		});
	});

	// control.html

	//商品数量
	$(".grflibcenter span").on("click", function() {
		var pt = $(this).parent().find("input");
		var num = parseInt(pt.val());
		if(num <= 1) {
			return false;
		}
		pt.val(num - 1);
		return false;
	});

	$(".grflibcenter i").on("click", function() {
		var pt = $(this).parent().find("input");
		var num = parseInt(pt.val());
		pt.val(num + 1);
		return false;
	});

	$(".grflibcenter input").on("blur", function() {
		var num = parseInt($(this).val());
		if(num <= 0) {
			$(this).val(1);
		}
	});

	// 下拉框
	$(document).on("click", function(ev) {
		if($(ev.target).is(".cnfodweakTit") || $(ev.target).is(".cnfodweakSelectNav")) {
			return false;
		} else if($(ev.target).parents('.cnfodweakTit').html() != undefined) {
			return false;
		} else {
			$(".cnfodweakSelectNav").hide();
		}
	});

	$(".cnfodweakTit").each(function(index) {
		$(this).on("click", function() {
			$(".cnfodweakSelectNav").not($(".cnfodweakSelectNav").eq(index)).hide();
			if($(".cnfodweakSelectNav").eq(index).is(":hidden")) {
				$(".cnfodweakSelectNav").eq(index).show();
			} else {
				$(".cnfodweakSelectNav").eq(index).hide();
			}
		});
	});

	$(".cnfodweakSelectNav a").each(function() {
		$(this).on("click", function() {
			var ps = $(this).parent().parent().parent().parent();
			ps.find("input").val($(this).attr("data-value"));
			ps.find(".cnfodweakTit a").text($(this).text());
			$(".cnfodweakSelectNav").hide();
			return false;
		});
	});

	$(".plstoreleflogo").on("mouseover", function() {
		$(".plstoflogpopdrop").show();
	}).on("mouseout", function() {
		$(".plstoflogpopdrop").hide();
	});

	$(window).scroll(function() {
		if($(window).scrollTop() > 50) {
			$(".backTop").stop(false, false).fadeIn();
		} else {
			$(".backTop").stop(false, false).fadeOut();
		}
	});

	$(".backTop").on("click", function() {
		var timer = setInterval(function() {
			$(window).scrollTop($(window).scrollTop() - 50);
			if($(window).scrollTop() == 0) {
				clearInterval(timer);
			}
		}, 1);
		return false;
	});

	// 团队订餐 删除
	$(".group-order-remove").on("click", function() {
		$(".grouporderWrap").remove();
		$(".mybalanceContainer").html('<div class="ucenter-empty">数据己删除</div>');
	});

	// 团队订餐 删除 弹出层
	$(".group-order-delete").on("click", function() {
		$(".grd3tordeeringContentInner").remove();
		$(".grd3tordeeringContent").html('<div style="text-align: center;margin-top: 40px;font-size:14px;">数据己删除</div>');
	});

	// 评价星星效果
	if($(".order-dialog-star-box")[0]) {
		$(".order-dialog-star-box").each(function(i) {
			var _self = $(this);
			$(this).raty({
				path: 'js/raty/images/',
				click: function(score, evt) {
					_self.parent().find("input").val(score);
				}
			});
		});
	}

	// 订单历史的删除和清空
	$("#remove-orders-data").on("click", function() {
		$(".ucenter-orders-delete").hide();
		$(".order-list").remove();
		$(".ucenter-content").html('<div class="ucenter-empty">暂时还没有订单历史</div>');
	});

	$(".order-list .order-list-delete a").on("click", function() {
		var index = $(this).index($(".order-list .order-list-delete a"));
		$(".order-list").eq(index).remove();
		if($(".order-list").size() <= 0) {
			$(".ucenter-orders-delete").hide();
			$(".ucenter-content").html('<div class="ucenter-empty">暂时还没有订单历史</div>');
		}
		return false;
	});

	// 我的收藏JS删除和清空效果
	$("#remove-favorite-data").on("click", function() {
		$(".favorite-delete").hide();
		$(".favorite-list").remove();
		$(".ucenter-content").html('<div class="ucenter-empty">暂时还没有订单历史</div>');
	});

	$(".favorite-list .favorite-close").on("click", function() {
		var index = $(this).index($(".favorite-list .favorite-close"));
		$(".favorite-list").eq(index).remove();
		if($(".favorite-list").size() <= 0) {
			$(".favorite-delete").hide();
			$(".ucenter-content").html('<div class="ucenter-empty">暂时还没有订单历史</div>');
		}
		return false;
	});

});

;
(function($) {

	$.fn.fanDialog = function(btn, shade, fn) {
		var shade = shade || false;
		var fn = fn || function() {};
		if(!$(this)[0]) return false;
		return $(this).each(function() {
			var _self = $(this);

			var count = $(".fanping-dialog").size();
			var sClass = "fanping-dialog-" + count;
			$(this).wrap('<div class="fanping-dialog ' + sClass + '" style="display:inline-block"></div>');
			$("." + sClass).css({
				position: 'fixed',
				top: ($(window).height() - $(_self).outerHeight(true)) / 2,
				left: ($(window).width() - $(_self).outerWidth(true)) / 2,
				zIndex: 999999
			});

			$(this).stop(false, false).fadeIn();
			if(!shade) {
				var obj = $("<div/>", {
					"class": "fanping-dialog-background"
				}).css({
					"width": "100%",
					"height": $(document).outerHeight(true),
					"position": "absolute",
					"z-index": "999998",
					"background": "#000",
					"opacity": "0.5",
					"display": "none"
				});

				$("body").prepend(obj);
				$(".fanping-dialog-background").stop(false, false).fadeIn();
			}

			$(btn).on("click", function() {
				if(!shade) {
					$(".fanping-dialog-background").fadeOut(function() {
						$(this).remove();
					});
				}
				$(_self).hide();
				$(_self).unwrap();
			});
			fn();
		});
	};

})(jQuery);

$(function() {
	$(".slifsearText span.slifstAddicon").click(function() {
		$(".slifoSearch .listbox").stop().fadeToggle();
	});

	$(".slifoSearch .listbox ul li a").click(function() {
		$(".slifsearText span.slifstAddicon").text($(this).text());
		$(".slifoSearch .listbox ").stop().fadeOut();
	});
	$(".slifoSearch").mouseleave(function() {
		$(".slifoSearch .listbox ").stop().fadeOut();
	});
});