(function($) {
	"use strict";

	var bodyW = $('body').width(),
		enableMenuAnimate = false;

	/*********************************************

		Window scroll

	*********************************************/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 40) {
			$('#to-the-top').fadeIn();
			$('#envor-header-menu').addClass('envor-header-sticked');
			$('.envor-content').css('padding-top', $('#envor-header-menu').height() + 'px');
		} else {
			$('#to-the-top').fadeOut();
			$('#envor-header-menu').removeClass('envor-header-sticked');
			$('.envor-content').css('padding-top', 0);
		}
	});
	$('#to-the-top').click(function() { $('body,html').animate({scrollTop: 0}, 500); });

	/*********************************************

		Typography Fix

	*********************************************/
	$('.envor-about-widget p.contacts').first().css({'border-top-width':'1px', 'margin-top':'30px'});
	$('.envor-padding-top-0').find('h2').first().css('margin-top', '0px').css('padding-top', '0px');
	$('.envor-content').find('.envor-section').each(function() {
		$(this).each(function() {
			$(this).find('.row').css('margin-top', '60px').first().css('margin-top', '0px');
			$(this).find('.row').each(function() {
				if (bodyW < 992) {
					$(this).find('[class*="col-"]').css('margin-top','60px').first().css('margin-top','0px');
				}
			});
		});
	});
	if (bodyW > 768) {
		$('.envor-section').each(function() {
			$(this).find('[class*="col-"]').each(function() {
				$(this).find('h2, h3, h1, h4, h5').first().css('margin-top', '0px');
			});
		});
	}
    $('blockquote').each(function() {
    	var content = $(this).text();
    	$(this).html('<i class="fa fa-quote-left"></i>' + content + '<i class="fa fa-quote-right"></i>');
    	$(this).wrapInner('<div class="blockquote-inner"></div>');
    });
	if (bodyW > 768 && bodyW < 992) {
		$('section .col-sm-6').filter(':not(.envor-estate .col-sm-6)').css('margin-top', '60px').eq(0).css('margin-top', '0px').end().eq(1).css('margin-top', '0px');
//		$('.envor-footer .col-sm-6').css('margin-top', '60px').eq(0).css('margin-top', '0px').end().eq(1).css('margin-top', '0px');
	} else {
		$('section .col-sm-6, .envor-footer .col-sm-6').css('margin-top', '0px');
	}
	$('.envor-feature-2').each(function() {
		$(this).children().last().css('margin-bottom','0px');
	});
    $('.envor-partner-1').each(function() {
    	var $this = $(this),
    		H = $this.height(),
    		h = $this.find('figure').height();
    	if (H < h)
    		$this.height(h + 120);
    }).last().css('border-bottom-width', '1px');
    $('.envor-projects-listing').each(function() {
    	var $this = $(this),
    		offset = parseInt($this.find('.envor-listing-item').css('padding-left')),
    		w = parseInt($this.parents('[class*="col-"]').width()) + offset, h = 0,
    		$elems = $this.find('.envor-listing-item');
    	$this.css({
    		'margin-left' : -offset,
    		'width' : w
    	});
    	if ($this.hasClass('envor-projects-listing-3-cols')) {
    		if (bodyW < 768) {
	    		$elems.width(100 + '%');
    		} else {
    			$elems.width($this.width()/3 - 30);
    		}
    	}
    	if ($this.hasClass('envor-projects-listing-4-cols')) {
    		if (bodyW < 768) {
	    		$elems.width(100 + '%');
    		} else {
    			$elems.width($this.width()/4 - 30);
    		}
    	}
    	if ($this.hasClass('envor-projects-listing-5-cols')) {
    		if (bodyW < 768) {
	    		$elems.width(100 + '%');
    		} else {
    			$elems.width($this.width()/5 - 30);
    		}
    	}
    });
    $('.envor-property-2, .envor-property-3').each(function() {
    	var h = parseInt($(this).find('figure').height());
    	$(this).find('.envor-property-1-inner').height(h + 2);
    });
    $('.envor-single-estate').each(function() {
    	var $this = $(this),
    		$details = $this.find('.envor-propert-details'),
    		w = parseInt($details.parents('[class*="col-"]').width());
    	if (bodyW > 768) {
	    	$details.width(w/3 + 10).first().css('margin-left', '-31px');
	    	$details.find('.inner').css({'padding-left':'30px'});
    	} else {
	    	$details.width(w).first().css('margin-left', '0px');
	    	$details.find('.inner').css({'padding-left':'0px', 'margin-bottom':'30px'});
	    	$details.last().find('.inner').css('margin-bottom', '0px');
		}
    });

	/*********************************************

		Change Product Qty

	*********************************************/
	$('.shoppin-cart-table').find('tr').each(function() {
		var $this = $(this),
			$fa = $this.find('i.fa'),
			$input = $this.find('input[name*=qty]'),
			$total = $this.find('span.total'),
			$span = $this.find('.qty-fld'),
			price = $this.find('input[name*=price]').val();
		$fa.click(function() {
			var i = parseInt($span.html());
			if ($(this).hasClass('fa-plus')) {
				$span.html(i + 1);
				$total.html('$' + (i + 1) * price);
			}
			if ($(this).hasClass('fa-minus')) {
				if (i != 1) {
					$span.html(i - 1);
					$total.html('$' + (i - 1) * price);
				}
			}
		});
	}).hover(function() {
		$(this).addClass('hover');
	}, function() {
		$(this).removeClass('hover');
	});

	/*********************************************

		Change Product Qty

	*********************************************/
	$('#prod-qty').find('i.fa').click(function() {
		var $text = $(this).parents('#prod-qty').find('.qty-fld'),
			$fld = $('#prod-qty-fld'),
			i = parseInt($text.html());
		if ($(this).hasClass('fa-plus')) {
			$text.html( i + 1);
			$fld.val(i + 1);
		}
		if ($(this).hasClass('fa-minus')) {
			if (i != 1) {
				$text.html(i - 1);
				$fld.val(i - 1);
			}
		}
	});

	/*********************************************

		Envor Tabs

	*********************************************/
	$('.envor-tabs').each(function() {
		var $this = $(this),
			$title = $this.find('header span'),
			$article = $this.find('article');
		$('<div class="arrow"></div>').appendTo($title);
		$article.first().show();
		$title.first().addClass('active').end().click(function() {
			$title.removeClass('active');
			$(this).addClass('active');
			$article.hide().eq($(this).index()).fadeIn();
		});
	});

	/*********************************************

		Envor Message

	*********************************************/
	$('.envor-msg').each(function() {
		var $this = $(this);
		$this.find('.fa').click(function() { $this.fadeOut(); });
	});

	/*********************************************

		Envor Social Button 2

	*********************************************/
	$('.envor-social-button-2').hover(function() {
		$(this).find('.esb-tooltip').stop(true, true).fadeIn();
	}, function() {
		$(this).find('.esb-tooltip').stop(true, true).fadeOut();
	});

	/*********************************************

		Envor Toggle

	*********************************************/
	$('.envor-toggle').each(function() {
		var $this = $(this),
			$article = $this.find('article'),
			$header = $article.find('header'),
			$content = $article.find('p');
		$content.hide();
		$header.removeClass('active');
		$article.last().css('margin-bottom', '0px');
		$article.each(function() {
			var $t = $(this);
			if ($t.hasClass('open')) {
				$t.find('.fa').addClass('fa-minus');
				$t.find('header').addClass('active');
				$t.find('p').show();
			}
		});
		$header.click(function() {
			$header.parent().removeClass('open');
			if ($(this).hasClass('active')) {
				$(this).find('.fa').removeClass('fa-minus');
				$(this).removeClass('active');
				$(this).parent().find('p').slideUp();
			} else {
				$header.removeClass('active');
				$content.slideUp();
				$header.find('.fa').removeClass('fa-minus');
				$(this).find('.fa').addClass('fa-minus');
				$(this).addClass('active');
				$(this).parent().find('p').slideDown();
			}
		});
	});

	/*********************************************

		Envor Feature

	*********************************************/
	$('.envor-feature').each(function() {
		$('<span class="arrow-color"></span>').appendTo($(this).find('header'));
	});
	if (bodyW < 768) {
		$('.envor-feature, .envor-feature-2').last().css('margin-bottom', '0px');
	}

	/*********************************************

		Animation

	*********************************************/
	$('.envor-header-2 .envor-header-bg .social-buttons ul li a').hover(function() {
		$(this).find('i').addClass('animated rotateIn');
	}, function() {
		$(this).find('i').removeClass('animated rotateIn');
	});
	$('.envor-section-twitter-1').hover(function() { $(this).find('i.fa-twitter').addClass('animated bounceIn'); }, function() { $(this).find('i.fa-twitter').removeClass('animated bounceIn'); });
	$('.envor-feature-store').each(function() {
		$('<span class="arrow"></span>').prependTo($(this));
	}).hover(function() {
		$(this).find('i').addClass('animated rotateIn');
	}, function() {
		$(this).find('i').removeClass('animated rotateIn');
	});
	$('.envor-feature-3, .envor-feature-3').hover(function() {
		$(this).find('.fa, .glyphicon').addClass('animated rotateIn');
	}, function() {
		$(this).find('.fa, .glyphicon').removeClass('animated rotateIn');
	});

	/*********************************************

		Envor Estate Form

	*********************************************/
	$('.envor-estate-search-type span').on('click', function() {
		$('.envor-estate-search-type span').removeClass('active');
		$(this).addClass('active').parent().find('input').val($(this).attr('data-val'));
	});
	$('.envor-estate-form-item').each(function() {
		var $this = $(this),
			$span = $this.find('span.val'),
			$list = $this.find('.envor-efi-list'),
			$checked = $list.find('input[type=checkbox]');
		if ($list.find('> p').length > 8)
			$list.css({
				'overflow':'scroll',
				'overflow-x':'hidden'
			});
		$this.find('i.fa-caret-down').click(function() {
			$list.slideToggle();
			$(this).toggleClass('fa-caret-up');
		});
		$checked.on('click', function() {
			var $c = $checked.filter(':checked');
			if ($c.length == 1) {
				$span.html($c.val());
			}
			if ($c.length == 0) {
				$span.html('Choose...');
			}
			if ($c.length > 1) {
				$span.html('Multiple');
			}
		});
	});

	/*********************************************

		Top bar social buttons

	*********************************************/
	$('.envor-top-bar').find('ul.social-btns li').each(function() {
		var $this = $(this),
			$a = $this.find('a'),
			$aFirst = $a.first();
		$a.addClass('regular').clone().removeClass('regular').addClass('hover').appendTo($this);
		$this.hover(function() {
			$(this).find('a.regular').stop(true, true).animate({'top':'-40px'}, 200);
			$(this).find('a.hover').stop(true, true).animate({'top':'0px'}, 200);
		}, function() {
			$(this).find('a.regular').stop(true, true).animate({'top':'0px'}, 200);
			$(this).find('a.hover').stop(true, true).animate({'top':'40px'}, 200);
		});
	});

	/*********************************************

		Top bar shopping cart

	*********************************************/
	$('.envor-top-bar .shopping-cart').each(function() {
		$(this).find(' > span i.fa').addClass('regular').clone().removeClass('regular').appendTo($(this).find(' > span')).addClass('hover');
		$(this).hover(function() {
			$(this).find(' > span i.regular').stop(true, true).animate({'top':'-40px'}, 200);
			$(this).find(' > span i.hover').stop(true, true).animate({'top':'0px'}, 200);
			$(this).find('.cart').stop(true, true).fadeIn();
		}, function() {
			$(this).find(' > span i.regular').stop(true, true).animate({'top':'0px'}, 200);
			$(this).find(' > span i.hover').stop(true, true).animate({'top':'40px'}, 200);
			$(this).find('.cart').stop(true, true).fadeOut();
		});
		var $ul = $(this).find('.cart .cart-entry');
//		$ul.jScrollPane();
		$('#topbarcart').mCustomScrollbar()
		$(this).find('.cart').hide();
	});

	/*********************************************

		Top bar desktop menu

	*********************************************/
	var megaMenuIndex = 0;
	$('.envor-header-1 .envor-header-bg nav > ul > li, .envor-header-1 .envor-header-bg nav > ul > li ul > li, .envor-header-2 .envor-desktop-menu-bg nav li, .envor-header-3 .envor-desktop-menu-bg nav li').filter(':not(.envor-mega li)').each(function() {
		$('<span class="hover"></span>').appendTo($(this));
	}).hover(function() {
		$(this).find('> .hover').stop(true, true).fadeIn(200);
	}, function() {
		$(this).find('> .hover').stop(true, true).fadeOut(200);
	});
	$('.envor-header-1 .envor-header-bg nav li, .envor-header-2 .envor-desktop-menu-bg nav li, .envor-header-3 .envor-desktop-menu-bg nav li').hover(function() {
		var $ul = $(this).find('> ul'),
			$mega = $(this).find('.envor-mega');
		if ($ul.length > 0) {
			if (enableMenuAnimate) {
				$ul.show().addClass('animated flipInY');
			} else {
				$ul.stop(true,true).fadeIn();
			}
		}
		if ($mega.length > 0) {
			if (enableMenuAnimate) {
				$mega.show().addClass('animated flipInY');
			} else {
				$mega.fadeIn();
			}
		}
	}, function() {
		var $ul = $(this).find('> ul'),
			$mega = $(this).find('.envor-mega');
		if (enableMenuAnimate) {
			$ul.removeClass('animated flipInY').fadeOut(200);
			$mega.removeClass('animated flipInY').fadeOut(200);
		} else {
			$ul.stop(true,true).fadeOut();
			$mega.stop(true,true).fadeOut();
		}
	});
	$('.envor-header-1 .envor-header-bg nav > ul > li, .envor-header-2 .envor-desktop-menu-bg nav > ul > li').each(function() {
		var $mega = $(this).find('.envor-mega');
		if ($mega.length != 0) {
			megaMenuIndex = $(this).index();
		}
	}).hover(function() {
		var l = $('.envor-header nav > ul > li').length;
		if ($(this).index() == (l - 1)) {
			$(this).find('> ul').addClass('left');;
		}
	});

	/*********************************************

		Mega Menu

	*********************************************/
	function envorMegaMenu() {
		if ($('.envor-header-1 .envor-mega').length != 0) {
			var $mega = $('.envor-mega'),
				$items = $mega.find('.envor-mega-section'),
				$menu = $('.envor-header-1 .envor-header-bg nav > ul > li'),
				rightOffset = 0, h = 0, w = 100 / $items.length;
			$menu.slice(megaMenuIndex + 1).each(function() {
				rightOffset = rightOffset
								+ $(this).width()
								+ parseInt($(this).css('padding-left'))
								+ parseInt($(this).css('padding-right'))
								+ parseInt($(this).css('border-left-width'))
								+ parseInt($(this).css('border-right-width'));
			});
			$mega.width($('.col-lg-12').width()).css('right', '-' + rightOffset + 'px');
			$items.each(function() { $(this).width($('.col-lg-12').width() / $items.length - 31); }).first().css('border-left-width', '0px');
			$items.each(function() {
				$(this).find('li').last().css('border-bottom-width', '0px');
				if ($(this).height() > h)
					h = $(this).height();
			}).css('height', h + parseInt($items.css('padding-top')) + parseInt($items.css('padding-bottom')) + 'px');
			$mega.height(h + parseInt($items.css('padding-top')) + parseInt($items.css('padding-bottom')) + 'px').hide();
		}
		if ($('.envor-header-2 .envor-mega').length != 0) {
			var $mega = $('.envor-mega'),
				$items = $mega.find('.envor-mega-section'),
				$menu = $('.envor-header-2 .envor-desktop-menu-bg nav > ul > li'),
				leftOffset = 0, h = 0, w = 100 / $items.length;
			$menu.slice(0, megaMenuIndex).each(function() {
				leftOffset = leftOffset
								+ $(this).width()
								+ parseInt($(this).css('padding-left'))
								+ parseInt($(this).css('padding-right'))
								+ parseInt($(this).css('border-left-width'))
								+ parseInt($(this).css('border-right-width'));
			});
			$mega.width($('.col-lg-12').width()).css('left', '-' + leftOffset + 'px');
			$items.each(function() { $(this).width($('.col-lg-12').width() / $items.length - 31); }).first().css('border-left-width', '0px');
			$items.each(function() {
				$(this).find('li').last().css('border-bottom-width', '0px');
				if ($(this).height() > h)
					h = $(this).height();
			}).css('height', h + parseInt($items.css('padding-top')) + parseInt($items.css('padding-bottom')) + 'px');
			$mega.height(h + parseInt($items.css('padding-top')) + parseInt($items.css('padding-bottom')) + 'px').hide();
		}
		if ($('.envor-header-3 .envor-mega').length != 0) {
			var $mega = $('.envor-mega'),
				$items = $mega.find('.envor-mega-section'),
				offset, offsetLeft = 0, h = 0, w = 100 / $items.length;
			offset = $mega.offset();
			offsetLeft = offset.left - ($(window).width() - $('.col-lg-12').width()) / 2 - parseInt($('.col-lg-12').css('padding-left'));
			$mega.width($('.col-lg-12').width()).css('left', '-' + offsetLeft + 'px');
			$items.each(function() { $(this).width($('.col-lg-12').width() / $items.length - 31); }).first().css('border-left-width', '0px');
			$items.each(function() {
				$(this).find('li').last().css('border-bottom-width', '0px');
				if ($(this).height() > h)
					h = $(this).height();
			}).css('height', h + parseInt($items.css('padding-top')) + parseInt($items.css('padding-bottom')) + 'px');
			$mega.height(h + parseInt($items.css('padding-top')) + parseInt($items.css('padding-bottom')) + 'px').hide();
		}
	}
	envorMegaMenu();

	/*********************************************

		Envor Links Widget

	*********************************************/
	$('<span class="border"></span>').appendTo($('.envor-links-widget li'));
	$('.envor-links-widget ul > li').last().find('.border').remove().detach();

	/*********************************************

		Envor Category Widget

	*********************************************/
    $('.envor-category-widget ul li').hover(function() {
    	$(this).find('p span').addClass('hovered');
    }, function() {
    	$(this).find('p span').removeClass('hovered');
    });

	/*********************************************

		Mobile Menu

	*********************************************/
	var $mobileMenu = $('.envor-mobile-menu nav'), isMobileMenuShown = 1;
	$mobileMenu.css('max-height', $(window).height() - 40);
	$mobileMenu.mCustomScrollbar();
	$('<span class="border"></span>').appendTo($mobileMenu.find('ul li'));
	$('<span class="border"></span>').appendTo($mobileMenu);
	$mobileMenu.find('li').each(function() {
		var $ul = $(this).find('> ul');
		if ($ul.length > 0)
			$('<i class="glyphicon glyphicon-plus-sign"></i>').appendTo($(this));
		var $i = $(this).find('> i.glyphicon-plus-sign');
		$i.click(function() {
			$(this).toggleClass('glyphicon-minus-sign');
			if ($(this).hasClass('glyphicon-minus-sign')) {
				$(this).parent('li').find('> ul').show();
			} else {
				$(this).parent('li').find('> ul').hide();
			}
			$mobileMenu.mCustomScrollbar('update');
		});
	});
	$mobileMenu.mCustomScrollbar('update');
	$('#envor-mobile-menu-btn').click(function() {
		if (isMobileMenuShown) {
			$('#envor-mobile-menu').animate({
				'right':'0px'
			});
			$(this).animate({
				'right':'200px'
			});
			isMobileMenuShown = 0;
		} else {
			$('#envor-mobile-menu').animate({
				'right':'-200px'
			});
			$(this).animate({
				'right':'0px'
			});
			isMobileMenuShown = 1;
		}
		$(this).toggleClass('clicked');
	});
	$('#envor-mobile-cart-btn').click(function() {
		if (isMobileMenuShown) {
			$('#envor-mobile-cart').animate({
				'right':'0px'
			});
			$(this).animate({
				'right':'200px'
			});
			isMobileMenuShown = 0;
		} else {
			$('#envor-mobile-cart').animate({
				'right':'-200px'
			});
			$(this).animate({
				'right':'0px'
			});
			isMobileMenuShown = 1;
		}
		$(this).toggleClass('clicked');
	});

	/*********************************************

		Header #2 Search

	*********************************************/
	var $h2Search = $('.envor-header-2 .envor-header-bg .header-search form');
	$h2Search.find('input[type=text]').on('focus', function() { $h2Search.addClass('focus'); $(this).animate({'width':'150px'}); $h2Search.find('button[type=submit]').addClass('focus'); } );
	$h2Search.find('input[type=text]').on('blur', function() { $h2Search.removeClass('focus'); $(this).animate({'width':'80px'}); $h2Search.find('button[type=submit]').removeClass('focus'); } );

	/*********************************************

		Figure fix

	*********************************************/
	function envorProject() {
		var $projects = $('.envor-project');
		$projects.each(function() {
		});
	}
	setTimeout(function() {
		envorProject();
	}, 1000);
	$('.envor-project, .envor-property-1, .envor-product-1, .envor-post-preview, .envor-post').hover(function() {
		$(this).find('figure figcaption').stop(true,true).fadeIn(200).find('i').stop(true,true).animate({'top':'50%'}, 200);
	}, function() {
		$(this).find('figure figcaption').find('i').stop(true,true).animate({'top':'0'}, 200).end().stop(true,true).fadeOut(200);
	});

	/*********************************************

		Clorbox links

	*********************************************/
	$('a.colorbox').colorbox();

	/*********************************************

		Envor Partner Logo

	*********************************************/
	var envorLogoH = 0;
	$('.envor-partner-logo').each(function() {
		$(this).find('img').fadeTo(0, 0.3);
		if ($(this).find('img').height() > envorLogoH) {
			envorLogoH = $(this).height();
		}
	}).height(envorLogoH - parseInt($('.envor-partner-logo .inner').css('padding-left')) - parseInt($('.envor-partner-logo .inner').css('padding-right'))).hover(function() {
		$(this).find('img').stop(true,true).fadeTo(400, 1);
	}, function() {
		$(this).find('img').stop(true,true).fadeTo(400, 0.3);
	});

	/*********************************************

		Envor Career 1

	*********************************************/
	$('.envor-career-1').each(function() {
		var $ec = $(this);
		$(this).find('a.show-details').click(function(e) {
			e.preventDefault();
			$(this).find('i.fa').toggleClass('fa-minus');
			$ec.find('.details').slideToggle();
		});
	}).last().css('border-bottom-width', '1px');

	/*********************************************

		Envor Pricing 1 Header .plan-price

	*********************************************/
	$('.envor-pricing-1 header .plan-price').each(function() {
		$('<span class="arrow"></span>').prependTo($(this));
	});

	/*********************************************

		Envor Pricing 2

	*********************************************/
    function envorPricing2() {
	    $('.envor-pricing-2').each(function() {
	    	var $this = $(this),
	    		$elems = $this.find('.envor-pricing-2-item'),
	    		index = 0,
	    		qty = $elems.length;
	    	$elems.each(function() {
	    		if ($('body').width() > 768) {
		    		$(this).width($this.width() / qty);
	    		} else {
		    		$(this).css('width', '100%');
	    		}
	    		if ($(this).hasClass('envor-pricing-2-item-featured'))
	    			index = $(this).index();
	    	}).last().css('border-right-width', '1px').end().eq(index + 1).css('border-left-width', '0px');
	    });
    }
    envorPricing2();

	/*********************************************

		Envor Domains

	*********************************************/
	$('.envor-domain-search form .envor-domain-search-inner div.zone i').on('click', function() {
		$(this).toggleClass('fa-caret-up');
		$(this).parent().find('> ul').slideToggle();
	});
	var divZone = $('.envor-domain-search form .envor-domain-search-inner div.zone span');
	var divZoneLi = $('.envor-domain-search form .envor-domain-search-inner div.zone ul li');
	divZoneLi.click(function() {
		divZone.html('.' + $(this).attr('data-val'));
		$(this).parent().slideUp();
		$('.envor-domain-search form .envor-domain-search-inner input[name=domain_zone]').val($(this).attr('data-val'))
		$('.envor-domain-search form .envor-domain-search-inner div.zone i').removeClass('fa-caret-up');
	});
	$('.envor-domain-price').each(function() {
		;
	}).hover(function() {
		$(this).css('position', 'relative').stop(true, true).animate({'margin-top':'-5px'}, 200);
	}, function() {
		$(this).css('position', 'relative').stop(true, true).animate({'margin-top':'0px'}, 200);
	});

	/*********************************************

		Simple Twitter Widget

	*********************************************/
    setTimeout(function() {
    	$('.envor-simple-twiiter-widget ul li').each(function() {
    		$('<i class="fa fa-twitter"></i>').appendTo($(this));
    	}).last().css({
    		'margin-bottom': '0px'
    	});
    }, 2000);

	/*********************************************

		Mobile Shopping Cart

	*********************************************/
	$('.envor-mobile-cart-list').css('max-height', $(window).height() - 40);
	$('<span class="border"></span>').appendTo($('.envor-mobile-cart-list p'));
	$('<span class="border"></span>').appendTo($('#envor-mobile-cart h3'));
	$('.envor-mobile-cart-list').mCustomScrollbar();

	/*********************************************

		Envor Animate Skill

	*********************************************/
	function envorAnimateSkill() {
		$('.envor-skill-1').each(function() {
			var $this = $(this),
				w = $this.width(),
				val = $this.find('.value').attr('data-value'),
				$c1 = $this.find('.color-1'),
				$c2 = $this.find('.color-2'),
				$wrapper = $this.find('.color-2-wrapper'),
				$inner = $this.find('.inner'),
				$p = $this.find('.value p');
			$c1.height(w);
			$c2.height(w);
			$inner.height(w - 20).width(w - 20).css('line-height', (w - 20) + 'px');
			$wrapper.animate({ 'height': (w * val/100) + 'px'}, 400);
		});
	}
	envorAnimateSkill();

	/*********************************************

		Envor Skill 2

	*********************************************/
	$('.envor-skill-2').each(function() {
		var $this = $(this),
			$color = $('<span class="color"></span>'),
			$bg = $('<span class="bg"></span>'),
			$p = $('<p></p>');
		$color.appendTo($this).width($this.attr('data-value'));
		$p.appendTo($this).html($this.attr('data-name') + ': <strong>' + $this.attr('data-value') + '</strong>').width($this.attr('data-value'));
		$bg.appendTo($color).fadeTo(0, 0.05);
	}).last().css('margin-bottom', '0px');

	/*********************************************

		Envor Message

	*********************************************/
	$('.envor-msg').each(function() {
		var $this = $(this);
		$this.find('.fa').click(function() { $this.fadeOut(); });
	});

	/*********************************************

		404 Page

	*********************************************/
	$('.envor-content-404, .envor-content-404-gradient').height($(window).height() - 40);
	$('.envor-content-404-inner').height($(window).height() - 40 - $('#socials').height() - parseInt($('#socials').css('padding-top')) - parseInt($('#socials').css('padding-bottom')));
	if ($(window).height() < 900)
		$('.envor-content-404 .envor-soc-buttons-list').css('position','relative').css('margin-top','50px');

    $('<span class="line"></span>').appendTo($('.riva-countdown .riva-countdown-item .value'));

	/*********************************************

		Envor f1 form

	*********************************************/
	$('#create-an-account-div').hide();
	$('#create-an-account').change(function() {
		if ($(this).is(':checked')) {
			$('#create-an-account-div').fadeIn();
		} else {
			$('#create-an-account-div').hide();
		}
	});
	$('#ship-to-billing-address-div').hide();
	$('#ship-to-billing-address').change(function() {
		if ($(this).is(':checked')) {
			$('#ship-to-billing-address-div').hide();
		} else {
			$('#ship-to-billing-address-div').fadeIn();
		}
	});
	$('.payment-option span').click(function() {
		$('.payment-option').removeClass('payment-option-active');
		$(this).parents('.payment-option').addClass('payment-option-active');
		$('input[name=payment-option]').val($(this).parents('.payment-option').attr('data-payment'));
	});

	/*********************************************

		Settings

	*********************************************/
	var showSettings = 0;
	$('.envor-settings i.fa-cog').click(function() {
		if (showSettings) {
			$(this).parents('.envor-settings').animate({'left':'-240px'});
			showSettings = 0;
		} else {
			$(this).parents('.envor-settings').animate({'left':'0px'});
			showSettings = 1;
		}
	});
	$('.envor-settings ul [class*="p"]').click(function() {
		$('.envor-boxed-bg').css('background-image', 'url(../img/settings/pat' + $(this).attr('data-value') + '.png)');
	});
	$('.envor-settings ul [class*="s"]').click(function() {
		$('#envor-site-color').attr('href', 'css/color' + $(this).attr('data-value') + '.css');
		$('#envor-site-boxed-color').attr('href', '../css/color' + $(this).attr('data-value') + '.css');
	});

	/*********************************************

		On Window Resize

	*********************************************/
	$( window ).resize(function() {
		envorProject();
		envorMegaMenu();
		bodyW = $('body').width();
		if (bodyW > 768 && bodyW < 992) {
			$('section .col-sm-6').css('margin-top', '60px').eq(0).css('margin-top', '0px').end().eq(1).css('margin-top', '0px');
			//$('.envor-footer .col-sm-6').css('margin-top', '60px').eq(0).css('margin-top', '0px').end().eq(1).css('margin-top', '0px');
		} else {
			$('section .col-sm-6, .envor-footer .col-sm-6').css('margin-top', '0px');
		}
		if (bodyW < 768) {
			$('.envor-feature').last().css('margin-bottom', '0px');
		}
		envorAnimateSkill();
		if ($(window).height() < 900)
			$('.envor-content-404 .envor-soc-buttons-list').css('position','relative');
	    $('.envor-projects-listing').each(function() {
	    	var $this = $(this),
	    		offset = parseInt($this.find('.envor-listing-item').css('padding-left')),
	    		w = parseInt($this.parents('[class*="col-"]').width()), h,
    			$elems = $this.find('.envor-listing-item');
	    	$this.css({
	    		'margin-left' : -offset,
	    		'width' : w + offset
	    	});
	    	if ($this.hasClass('envor-projects-listing-3-cols')) {
	    		if (bodyW < 768) {
		    		$elems.width(w);
	    		}
	    		if (bodyW > 768 && bodyW < 992) {
	    			$elems.width((w  + offset)/2 - offset);
	    		}
	    		if (bodyW > 992) {
	    			$elems.width((w  + offset)/3 - offset);
	    		}
	    	}
	    	if ($this.hasClass('envor-projects-listing-4-cols')) {
	    		if (bodyW < 768) {
		    		$elems.width(w);
	    		}
	    		if (bodyW > 768 && bodyW < 992) {
	    			$elems.width((w  + offset)/2 - offset);
	    		}
	    		if (bodyW > 992) {
	    			$elems.width((w  + offset)/4 - offset);
	    		}
	    	}
	    	if ($this.hasClass('envor-projects-listing-5-cols')) {
	    		if (bodyW < 768) {
		    		$elems.width(w);
	    		}
	    		if (bodyW > 768 && bodyW < 992) {
	    			$elems.width((w  + offset)/2 - offset);
	    		}
	    		if (bodyW > 992) {
	    			$elems.width((w  + offset)/5 - offset);
	    		}
	    	}
	    });
	    $('.envor-single-estate').each(function() {
	    	var $this = $(this),
	    		$details = $this.find('.envor-propert-details'),
	    		w = parseInt($details.parents('[class*="col-"]').width());
	    	if (bodyW > 768) {
		    	$details.width(w/3 + 10).first().css('margin-left', '-31px');
		    	$details.find('.inner').css({'padding-left':'30px'});
	    	} else {
		    	$details.width(w).first().css('margin-left', '0px');
		    	$details.find('.inner').css({'padding-left':'0px', 'margin-bottom':'30px'});
		    	$details.last().find('.inner').css('margin-bottom', '0px');
			}
	    });
	});

})(jQuery);