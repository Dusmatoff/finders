var _functions = {};

jQuery(function($) {

	"use strict";


    //loader

    setTimeout( function(){
		$("#loader-wrapper").fadeOut(0);
	},100);

    //images load  

	$('[data-bg]').each(function(i, el){
		$(el).css({'background-image': 'url('+$(el).data('bg')+')'});
	});
	$('img[data-src]').each(function(i, el){
		$(el).attr({'src': $(el).data('src')});
	});

	// swiper sliders

	_functions.getSwOptions = function(swiper){
		var options = swiper.data('options');
        options = (!options || typeof options !=='object') ? {} : options;
        var $p = swiper.closest('.swiper-entry');
		if(!options.pagination) options.pagination = {
            el: $p.find('.swiper-pagination')[0],
            clickable: true
        };
		if(!options.navigation) options.navigation = {
            nextEl: $p.find('.swiper-button-next')[0],
            prevEl: $p.find('.swiper-button-prev')[0]
        };
		options.preloadImages = false;
		options.lazy = {loadPrevNext: true};
		options.observer = true;
		options.observeParents = true;
		options.watchOverflow = true;
		options.speed = 500;
		options.roundLengths = true;
        // if(isTouchScreen) options.direction = "horizontal";
		return options;
	};
	_functions.initSwiper = function(el){
		var swiper = new Swiper(el[0], _functions.getSwOptions(el));
		
		/* Pause video and youtube on slide change */
		swiper.on('slideChangeTransitionStart', function() {
			$('.swiper-slide').find('video').each(function() {
        		this.pause();
    		});
			$('#ytPlayer')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');    
			console.log('slide changed'); 
		});
		
    };
    
    $('.swiper-entry .swiper-container').each(function () {
        _functions.initSwiper($(this));
    });
    $('.swiper-thumbs').each(function () {
        var top = $(this).find('.swiper-container.swiper-thumbs-top')[0].swiper,
            bottom = $(this).find('.swiper-container.swiper-thumbs-bottom')[0].swiper;
        top.thumbs.swiper = bottom;
        top.thumbs.init();
        top.thumbs.update();
    });
    $('.swiper-thumbs1').each(function () {
        var top = $(this).find('.swiper-container.swiper-thumbs-top1')[0].swiper,
            bottom = $(this).find('.swiper-container.swiper-thumbs-bottom1')[0].swiper;
        top.thumbs.swiper = bottom;
        top.thumbs.init();
        top.thumbs.update();
    });
    $('.swiper-control').each(function () {
        var top = $(this).find('.swiper-container')[0].swiper,
            bottom = $(this).find('.swiper-container')[1].swiper;
        top.controller.control = bottom;
        bottom.controller.control = top;
    });
	
	
    
    //main menu

    $(document).on('click', '.btn-show', function(){
        let r = $(this).data('rel');

            $(this).addClass('active');
            $('.' + r).addClass('active');
            $('html').addClass('overflow-hidden');
    });
    
    $(document).on('click', '.btn-hide-mn', function(){

        let r = $(this).data('rel');

            $(this).removeClass('active');
            $('.' + r).removeClass('active');
            $('html').removeClass('overflow-hidden');
    });

    $(document).on('click', '.wr-hidden', function (e){
        let el = $(".no-hidden");
        if (!el.is(e.target) && el.has(e.target).length === 0) {
            $('.wr-hidden').removeClass('active');
            $('html').removeClass('overflow-hidden');
        }
    });

    //popup
    var popupTop = 0;
    function removeScroll() {
        popupTop = $(window).scrollTop();
        $('html').css({
            "position": "fixed",
            "top": -$(window).scrollTop(),
            "width": "100%"
        });
    }
    function addScroll() {
        $('html').css({
            "position": "static"
        });
        window.scroll(0, popupTop);
    }
	_functions.openPopup = function(popup){
        $('.popup-content').removeClass('active');
        $(popup + ', .popup-wrapper').addClass('active');
        removeScroll();
	};

	_functions.closePopup = function(){
		$('.popup-wrapper, .popup-content').removeClass('active');
		addScroll();
	};

	$(document).on('click', '.open-popup', function(e){
		e.preventDefault();
        _functions.openPopup('.popup-content[data-rel="' + $(this).data('rel') +'"]');
	});

	$(document).on('click', '.popup-wrapper .btn-close, .popup-wrapper .layer-close', function(e){
		e.preventDefault();
		_functions.closePopup();
    });


});