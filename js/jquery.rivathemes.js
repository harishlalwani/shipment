/*
*	Riva Slider
*/

(function( $ ){
	$.fn.rivaSlider = function( options ) {
		/*
		*	Vars
		*/
		var $this = this,
			selector = options['selector'],
			padding_left = options['padding_left'],
			$elems = $this.find('.' + selector),
			$controls = $this.find('.rivaslider-navigation'),
			visible = options['visible'],
			$wrapper, $inner, scrol, qty, offsetLeft, fixH = 0, steps, bodyWidth, current = 0, isReadry = 0;
		/*
		*	Methods
		*/
		var methods = {
			/*
			*	Constructor
			*/
			init : function() {
				/*
				*	Wrap all selected elements into wrapper
				*/
				if (!isReadry)  {
					$elems.wrapAll('<div class="rivaslider-wrapper"></div>');
					$wrapper = $this.find('.rivaslider-wrapper');
					$wrapper.wrapInner('<div class="rivaslider-wrapper-inner"></div>');
					$inner = $this.find('.rivaslider-wrapper-inner');
				}
				qty = $elems.length;
				bodyWidth = $('body').width()
				offsetLeft = parseInt($elems.eq(0).css('padding-left'));
				if (bodyWidth > 768) {
					steps = qty - visible -1;
					scrol = $this.parents('[class*="col"]').width() / visible + offsetLeft / visible;
//					$wrapper.width(scrol * visible - offsetLeft);
					$elems.width(scrol - offsetLeft);
				} else {
					steps = qty - 2;
					scrol = $this.parents('[class*="col"]').width() + offsetLeft;
//					$wrapper.width(scrol - offsetLeft);
					$elems.width(scrol - offsetLeft);
				}
				if (!isReadry)  {
					if ($this.hasClass('envor-section-projects')) {
						fixH = scrol * 0.6;
					}
				}
				$inner.css('margin-left', '-' + offsetLeft + 'px');
				$wrapper.height(function() {
					var h = 0;
					$elems.each(function() {
						if ($(this).height() > h)
							h = $(this).height();
					});
					return h + fixH;
				});
				isReadry = 1;
			},
			/*
			*	scroler
			*/
			scroler : function(direction) {
				if (direction > 0) {
					if (current <= steps) {
						$this.find('.sl-navi a.back').removeClass('end');
						$inner.filter(':not(:animated)').animate({
							'left' : '-=' + scrol
						}, 400, function() { current = current + 1; });
					} else {
						$this.find('.sl-navi a.forward').removeClass('end');
						$inner.filter(':not(:animated)').animate({
							'left' : '0px'
						}, 400, function() { current = 0; });
					}
				} else {
					var f;
					if (bodyWidth > 768) {
						f = visible;
					} else {
						f = 1;
					}
					if (current > 0) {
						$this.find('.sl-navi a.forward').removeClass('end');
						$inner.filter(':not(:animated)').animate({
							'left' : '+=' + scrol
						}, 400, function() { current = current - 1; });
					} else {
						$this.find('.sl-navi a.forward').removeClass('end');
						$inner.filter(':not(:animated)').animate({
							'left' : '-=' + (scrol * (qty - f))
						}, 400, function() { current = qty - f; });
					}
				}
			}
		}
		return this.each(
			function()
			{
		/*
		*	On init call
		*/
		methods.init();
		$('a.back', $controls).click(function(e) {
			e.preventDefault();
			methods.scroler(-1);
		});
		$('a.forward', $controls).click(function(e) {
			e.preventDefault();
			methods.scroler(+1);
		});
		/*
		*	On window resize
		*/
		$(window).resize(function() {
			fixH = 0;
			methods.init();
			$inner.css('left','0px');
//			alert('reszize');
		});
			}
		);
	}
})( jQuery );

/*
*	Riva Carousel
*/

(function( $ ){
	$.fn.rivaCarousel = function( options ) {
		/*
		*	Vars
		*/
		var $this = this,
			selector = options['selector'],
			useoffest = options['useoffest'],
			$elems = $this.find('.' + selector),
			$controls = $this.find('.rivaslider-controls'),
			same_height = options['same_height'],
			visible = options['visible'],
			mobile_visible = options['mobile_visible'],
			$wrapper, $inner, scrol, qty, steps, offsetLeft, bodyWidth, current = 0, isReadry = 0, v, fixW;
		/*
		*	Methods
		*/
		var methods = {
			/*
			*	Constructor
			*/
			init : function() {
				/*
				*	Wrap all selected elements into wrapper
				*/
				fixW = parseInt($elems.css('padding-left')) + parseInt($elems.css('padding-right'));
				offsetLeft = parseInt($elems.eq(0).css('padding-left'));
				qty = $elems.length;
				bodyWidth = $('body').width()
				if (bodyWidth > 768) {
					steps = Math.ceil(qty / visible);
					v = visible;
					scrol = $this.parents('[class*="col"]').width() / visible + offsetLeft / visible;
				} else {
					if ('undefined' == mobile_visible)
						mobile_visible = visible;
					steps = Math.ceil(qty / mobile_visible);
					v = mobile_visible;
					scrol = $this.parents('[class*="col"]').width() / mobile_visible;
				}
				if (!isReadry)  {
					$elems.wrapAll('<div class="rivaslider-wrapper"></div>');
					$wrapper = $this.find('.rivaslider-wrapper');
					$wrapper.wrapInner('<div class="rivaslider-wrapper-inner"></div>');
					$inner = $this.find('.rivaslider-wrapper-inner');
				}
				$wrapper.width($this.parents('[class*="col"]').width());
				$inner.css('margin-left', '-' + offsetLeft + 'px');
				$controls.find('span').remove().detach();
				for (var i = 0; i < steps; i++) {
					$controls.append('<span></span>');
				}
				$controls.find('span').first().addClass('active');
				$elems.css('width', (parseInt($wrapper.width()) / v) - fixW + offsetLeft);


				if (bodyWidth > 768) {
					$elems.width(scrol - offsetLeft);
				} else {
					scrol = $this.parents('[class*="col"]').width() + offsetLeft;
					$elems.width(scrol - offsetLeft);
				}


				if (v == 1) {
					$wrapper.height($elems.eq(current).height());
				} else {
					$wrapper.height(function() {
						var h = 0;
						$elems.each(function() {
							if ($(this).height() > h)
								h = $(this).height();
						});
						return h;
					});
				}
				if (same_height) {
					$elems.height($wrapper.height());
				}
				isReadry = 1;
			},
			/*
			*	scroler
			*/
			scroler : function(step) {
				if (step != current) {
					if (bodyWidth > 768) {
						v = visible;
					} else {
						if ('undefined' == mobile_visible)
							mobile_visible = visible
						v = mobile_visible;
					}
					$inner.filter(':not(:animated)').animate({'left' : '-' + (scrol * v * step) + 'px'}, 400, function() {
						current = step;
						$controls.find('span').removeClass('active');
						$controls.find('span').eq(current).addClass('active');
						if (v == 1)
							$wrapper.animate({'height':$elems.eq(current).height()});
					});
				}
			}
		}
		return this.each(function() {
			/*
			*	On init call
			*/
			methods.init();
			$controls.find('span').click(function(e) {
				e.preventDefault();
				methods.scroler($(this).index());
			});
			/*
			*	On window resize
			*/
			$(window).resize(function() {
				methods.init();
				$controls.find('span').click(function(e) {
					e.preventDefault();
					methods.scroler($(this).index());
				});
				$inner.css('left','0px');
			});
		});
	}
})( jQuery );

/*
*	Riva Countdown
*/

(function( $ ){
	$.fn.rivaCountdown = function( options ) {
		/*
		*	Vars
		*/
		var $this = this,
			year = options['year'],
			month = options['month'],
			date = options['date'],
			hour = options['hour'],
			minute = options['minute'],
			second = options['second'],
			endDate, today, mils,
			$daysValue = $this.find('#riva-countdown-days .value p'),
			$hoursValue = $this.find('#riva-countdown-hours .value p'),
			$minsValue = $this.find('#riva-countdown-minutes .value p'),
			$secsValue = $this.find('#riva-countdown-seconds .value p'),
			dividers = new Array(86400, 3600, 60, 1), rest, t,
			values = new Array($daysValue, $hoursValue, $minsValue, $secsValue),
		timer_is_on = 0;
		endDate = new Date(year, month - 1, date, hour, minute, second);
		if (!timer_is_on) {
			timer_is_on = 1;
			changeTime();
		}
		function changeTime() {
			today = new Date();
			rest = (endDate - today) / 1000;
			for (var i = 0; i < dividers.length; i++) {
				values[i].html(Math.floor(rest / dividers[i]));
				rest = rest % dividers[i];
			}
			t = setTimeout(changeTime,1000);
		}
	}
})( jQuery );

(function( $ ){
	$.fn.envorInView = function(){
	    var win = $(window);
	    obj = $(this);
	    var scrollPosition = win.scrollTop();
	    var visibleArea = win.scrollTop() + win.height();
	    var objEndPos = (obj.offset().top + obj.outerHeight());
	    return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false)
	};
})( jQuery );

(function( $ ){
	$.fn.envorAnimateObj = function(){
		var $obj = this,
			animation = new Array(),
			type = 0;
		animation.push('bounce');
		animation.push('flash');
		animation.push('pulse');
		animation.push('rubberBand');
		animation.push('shake');
		animation.push('swing');
		animation.push('tada');
		animation.push('wobble');
		animation.push('bounceIn');
		animation.push('bounceInLeft');
		animation.push('bounceInRight');
		animation.push('bounceInUp');
		animation.push('fadeIn');
		animation.push('fadeInDown');
		animation.push('fadeInDownBig');
		animation.push('fadeInLeft');
		animation.push('fadeInLeftBig');
		animation.push('fadeInRight');
		animation.push('fadeInRightBig');
		animation.push('fadeInUp');
		animation.push('fadeInUpBig');
		animation.push('flip');
		animation.push('flipInX');
		animation.push('flipInY');
		animation.push('lightSpeedIn');
		animation.push('rotateIn');
		animation.push('rotateInDownLeft');
		animation.push('rotateInDownRight');
		animation.push('rotateInUpLeft');
		animation.push('rotateInUpRight');
		animation.push('slideInDown');
		animation.push('slideInLeft');
		animation.push('slideInRight');
		animation.push('hinge');
		animation.push('rollIn');
		type = 	(Math.random()*animation.length)+1|0;
		return this.each(function() {
			$obj.fadeTo(0, 0);
			$(window).scroll(function(){
				if ($obj.envorInView()) {
					$obj.fadeTo(0,1).addClass('animated ' + animation[type]);
				}
			});
		});
	};
})( jQuery );

/*
*	Riva Sorting
*/

(function( $ ){
	$.fn.rivaSorting = function( options ) {
		var $this = this,
			showAll = options['showAll'],
			$filters = $this.find('.envor-sorting-filters'),
			$elems = $this.find('.envor-sorting-item');
		if (showAll) {
			$('<span data-value="*">All</span>').prependTo($filters);
			$elems.show();
		} else {
			$elems.hide().each(function() {
				if ($(this).hasClass($filters.find('[data-value]').first().attr('data-value')))
					$(this).show();
			});
		}
		$filters.find('span').click(function() {
			var val = $(this).attr('data-value');
			$filters.find('span').removeClass('active');
			$(this).addClass('active');
			$elems.hide().each(function() {
				if (val == '*') {
					$elems.fadeIn();
					return;
				}
				if ($(this).hasClass(val)) {
					$(this).fadeIn();
					return;
				}
			});
		}).first().addClass('active');
	}
})( jQuery );

/*
*	Riva Toggle Tabs
*/

(function( $ ){
	$.fn.rivaToggleTabs = function( options ) {
		var $this = this,
			$links = $this.find('li'),
			$elems = $('.riva-toggle-tab');
		$elems.hide().first().show();
		$links.first().addClass('active');
		$links.click(function(e) {
			e.preventDefault();
			$links.removeClass('active');
			$(this).addClass('active');
			$elems.hide().eq($(this).index()).fadeIn();
		});
		$elems.each(function() {
			$(this).find('.riva-next-tab').click(function(e) {
				e.preventDefault();
				var index = $(this).parents('.riva-toggle-tab').index();
				$elems.hide().eq(index + 1).show();
				$links.removeClass('active');
				$links.eq(index + 1).addClass('active');
			});
			$(this).find('.riva-prev-tab').click(function(e) {
				e.preventDefault();
				var index = $(this).parents('.riva-toggle-tab').index();
				$elems.hide().eq(index - 1).show();
				$links.removeClass('active');
				$links.eq(index - 1).addClass('active');
			});
		})
	}
})( jQuery );
