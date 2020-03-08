$(document).ready(function() {

	// $('.grid').masonry({
	// 	// options
	// 	itemSelector: '.grid-item',
	// 	isAnimated: true,
	// 	gutter: 5,
	// 	fitWidth: true,
	// 	columnWidth: 0,
	// 	horizontalOrder: true
	// });

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
		var maxLength = 180;
		$(".text-limiter").each(function() {
			var myStr = $(this).text();
			if($.trim(myStr).length > maxLength){
				var newStr = myStr.substring(0, maxLength);
				var removedStr = myStr.substring(maxLength, $.trim(myStr).length);

				$(this).empty().html(newStr);
				$(this).append(' <span class="read-more">...</span>');
			}
		});
		$(".read-more").click(function() {
			$(this).siblings(".more-text").contents().unwrap();
			$(this).remove();
		});
		// var txt = $('.text-limiter').text();

		// if(txt.length > 90) {
		// 	$('.text-limiter').text(txt.substring(0,200) + '...');
		// }
	});

	if ($.inArray(className, ['singlebike']) >= 0) {
		var seq = 1;
		var i = setInterval(function() {
			// console.log(seq);
			if (seq == viewCountThreshold) {
				clearInterval(i);
				if (className == 'singlebike') {
					console.log('time: set 1 view count to this bike');
					var path = window.location.pathname.split('/mtb/')[0].replace(new RegExp('/', 'g'), '');
					var data = path.split('-');
					var oData = {post_id:data[0], class:className};
					var uiElem = $('#bike-vcnt-'+oData.post_id), sTableID = 'most-viewed-bikes', iCol = 1, sDir = 'desc';
				}
				if (typeof oData != 'undefined') {
					oSettings = {
						url: 'ajax/view_count',
						dataType: 'json',
						type: 'GET',
						data: {'data': oData},
						success: function(count){
							if (count) {
								uiElem.text(count);
								sortTable(sTableID, iCol, sDir);	
							}
						},
						error: function(data){
							console.log(data); 
						}
					};
					$.ajax(oSettings);
				}
			}
			seq++;
		}, 1000);
	}
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
			// $('.changeBikeInput').val('').blur();
			// $('.inputDropdown').remove();
		} else if (window.pageYOffset < 30) {
			// $('.changeBikeInput').val('').blur();
			// $('.inputDropdown').remove();
			$('.bikeStickyName').css('box-shadow', '');
		}

		if (window.pageYOffset == 0) {
			$('.mtb-item-image.shrinkMe').removeClass('mtbImageShrinker');
		}
		// if (window.pageYOffset == 0) {
		// 	$(document).click($('.mtbImageShrinker'), function() {
		// 	});
		// }
	};
});

function popupSharer(oThis, url, id, classname) {
	var prevCount = parseInt($(oThis).find('.shcount').text());
	$(oThis).find('.shcount').text(prevCount+1);
	FB.ui({
		display: 'popup',
		method: 'share',
		href: url
	}, function(response){
		if (response != undefined) {
			oSettings = {
				url: 'ajax/fbshare',
				dataType: 'json',
				type: 'GET',
				data: {id: id, url: url, class:classname},
				success: function(data){
					// console.log(data);
					var share_count = data.engagement.share_count > 0 ? data.engagement.share_count : 1;
					$(oThis).find('.shcount').text(share_count);
					$(oThis).addClass('shared');
				},
				error: function(data){
					console.log(data); 
				}
			};
			$.ajax(oSettings);
		} else {
			$(oThis).find('.shcount').text(prevCount);
		}
	});
}

var recentAjax = false, stopAjax = false;
function countHeart(oThis, sMethod, oData) {
	// console.log($(oThis), oData);
	if (stopAjax == false) {
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
				// console.log(res);
				if (res && res.count) {
					$(oThis).find('.hcount').text(prevCount+res.count);
					$(oThis).addClass('liked');
					stopAjax = true;
				} else if (res == false) {
					stopAjax = true;
				}
			}
		};
		if (recentAjax != false) recentAjax.abort();
		recentAjax = $.ajax(oSettings);
	}
}

function sortTable(ID, iCol, Dir) {
	var table, rows, switching, i, x, y, shouldSwitch;
	table = document.getElementById(ID);
	console.log($(table))
	if ($(table).length) {
		if (iCol == undefined) iCol = 0;
		if (Dir == undefined) Dir = 'asc';
		switching = true;
		/*Make a loop that will continue until no switching has been done:*/
		while (switching) {
			/*start by saying: no switching is done:*/
			switching = false;
			rows = table.rows;
			/*Loop through all table rows (except the first, which contains table headers):*/
			for (i = 1; i < (rows.length - 1); i++) {
				/*start by saying there should be no switching:*/
				shouldSwitch = false;
				/*Get the two elements you want to compare, one from current row and one from the next:*/
				x = rows[i].getElementsByTagName("TD")[iCol];
				y = rows[i + 1].getElementsByTagName("TD")[iCol];
				/*check if the two rows should switch place:*/
				if (Dir == 'asc') {
					if (Number(x.innerHTML) > Number(y.innerHTML)) {
						/*if so, mark as a switch and break the loop:*/
						shouldSwitch = true;
						break;
					}
				} else if (Dir == 'desc') {
					if (Number(x.innerHTML) < Number(y.innerHTML)) {
						/*if so, mark as a switch and break the loop:*/
						shouldSwitch = true;
						break;
					}
				}
			}
			if (shouldSwitch) {
				/*If a switch has been marked, make the switch and mark that a switch has been done:*/
				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
				switching = true;
			}
		}
	}
}