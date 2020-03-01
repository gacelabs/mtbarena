$(document).ready(function() {

	// bootstrap tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// bootstrap popover
	$('[data-toggle="popover"]').popover();

	$('html').on('click', function(e) {
		if ($('.popover.fade.left.in').is(':visible')) {
			var popOverElem = $(this).find('.popover-content')
				popOverElemFooter = '<div class="popver-footer">Click to close</div>'
			
			if (!$('.popver-footer').is(':visible')) {
				$(popOverElemFooter).insertAfter(popOverElem);
			}

			if ($(e.target).parents('.popover.in').is(':visible')) {
				$('.popver-footer').remove();
				$('[data-toggle="popover"]').popover('hide');
			}
		} else {
			setTimeout(function() {
				$('.popver-footer').remove();
			},100);
		}
	});

	$(function() {
		$('[trigger-modal]').click(function() {
			var modalId = $(this).attr('trigger-modal');

			$(modalId).modal('show');

			$('.navbar-collapse').removeClass('in').attr('aria-expanded', 'false');
		});
	});

	// date today
	$(function() {
		var today = new Date(),
			months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			shortMonths = ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
			getMonth = months[today.getMonth()],
			getShortMonth = shortMonths[today.getMonth()],
			getDate = today.getDate(),
			getYear = today.getFullYear(),
			dateToday = getMonth + " " + getDate + ", " + getYear;

		$('.yearToday').text(getYear);
		$('.monthToday').text(getMonth);
		$('.shortMonthToday').text(getShortMonth);
		$('.dayToday').text(getDate);
		$('.dateToday').text(dateToday);
	});

	// search button trigger
	$(function() {
		$('#searchButton').click(function() {
			setTimeout(function() {
				$('#searchInput').focus();
			},300);
		});
	});

	// text show read more
	$(function() {
		var maxLength = 110;

		$(".show-read-more").each(function() {
			var myStr = $(this).text();
			if($.trim(myStr).length > maxLength){
				var newStr = myStr.substring(0, maxLength);
				var removedStr = myStr.substring(maxLength, $.trim(myStr).length);

				$(this).empty().html(newStr);
				$(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
				$(this).append('<span class="more-text">' + removedStr + '</span>');
			}
		});
		$(".read-more").click(function() {
			$(this).siblings(".more-text").contents().unwrap();
			$(this).remove();
		});
	});

	// text limiter
	$(function() {
		var txt = $('.text-limiter').text();

		if(txt.length > 90) {
			$('.text-limiter').text(txt.substring(0,87) + '...');
		}
	});


	

});

$(window).on('load resize change', function() {

	var winWidth = $(window).width(),
		scrollPosition = 300,
		adjTop = -20,
		parentWidth = $('[col-position="center"]').width()-2;
		
	if (winWidth <= 767) {
		parentWidth = $('[col-position="center"]').width();

		$(function() {
			var prevScrollpos = window.pageYOffset;

			window.onscroll = function() {
				var prevScrollposX = window.pageYOffset;

				if (prevScrollposX > 60) {
					var currentScrollPos = window.pageYOffset;

					if (prevScrollpos > currentScrollPos) {
						document.getElementById("navbar").style.top = "0";
						$('.bikeStickyName, .pos-fixed').removeAttr('style');
					} else {
						document.getElementById("navbar").style.top = "-50px";
						$('.bikeStickyName').css('top', 0);
						$('.pos-fixed').css('top', 15);
					}
					prevScrollpos = currentScrollPos;
				}
			};
		})
	}


	// bootstrap affix class width fixes

	function affixWidth() {

		var parentWidth = $('.affix').parent('[class^=col-]').width();

		$.each($('.affix'), function() {
			$(this).css('width', parentWidth).removeClass('hide');
		});
	}

	// bootstrap affix class width fixes
	affixWidth();

	if ($(this).scrollTop() > 300) {
		$('#bikeModelBox').css({
			'width': parentWidth
		});
	}

	// trigger event on scroll position
	$(window).on('scroll', function () {

		// bootstrap affix class width fixes
		affixWidth();

		if (winWidth <= 767) {
			scrollPosition = 250;
			adjTop = 50;
		}
	});

});

$(function() {
	window.onscroll = function() {
		stickyFunction();
		shrinksModelImage();
	};

	var stickMeElemArr = [],
		stickMeOffsetArr = [];

	if ($('.stick-me').is(':visible')) {
		$.each($('.stick-me'), function() {
			var stickMeElem = $(this);

			stickMeElemArr.push(this);
			stickMeOffsetArr.push(stickMeElem.offset().top-65);
		});
	}

	function stickyFunction() {
		for (var i=0; i<stickMeOffsetArr.length; i++) {
			if (window.pageYOffset > stickMeOffsetArr[i]) {
				$(stickMeElemArr[i]).addClass("sticky-enabled pos-fixed").width($(stickMeElemArr[i]).parent('[class^=col-]').width()-1);
			} else {
				$(stickMeElemArr[i]).removeClass("sticky-enabled pos-fixed").width();
			}
		}
	}

	// shrinks model image on scroll
	var	scrollPosition = 100;

	function shrinksModelImage() {

		if (window.pageYOffset > scrollPosition) {
			$('.mtb-item-image.shrinkMe').addClass('mtbImageShrinker');
			$('.bikeStickyName').css('box-shadow', '0px 2px 4px 0px rgba(0,0,0,0.1)');
			$('.changeBikeInput').val('').blur();
			$('.inputDropdown').remove();
		} else if (window.pageYOffset < 30) {
			$('.changeBikeInput').val('').blur();
			$('.inputDropdown').remove();
			$('.bikeStickyName').css('box-shadow', '');
		}


		if (window.pageYOffset == 0) {
			$(document).click($('.mtbImageShrinker'), function() {
				$('.mtb-item-image.shrinkMe').removeClass('mtbImageShrinker');
			});
		}
	};
});

function popupCenter(url, oThis, title, id, w, h) {
	if (w == undefined) w = 450;
	if (h == undefined) h = 450;
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var win = window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	// console.log(oThis, win);
	return win;
}

var recentAjax = false;
function countHeart(oThis, sMethod, oData) {
	console.log($(oThis), oData);
	var prevCount = 0;
	var oSettings = {
		url: 'ajax/count_heart/'+sMethod,
		type: 'post',
		dataType: 'json',
		data: oData,
		beforeSend: function() {
			prevCount = parseInt($(oThis).find('.hcount').text());
		},
		success: function(res) {
			if (res && res.count) {
				console.log(res);
				$(oThis).find('.hcount').text(prevCount+res.count);
				$(oThis).addClass('liked');
			}
		}
	};
	if (recentAjax != false) recentAjax.abort();
	recentAjax = $.ajax(oSettings);
}