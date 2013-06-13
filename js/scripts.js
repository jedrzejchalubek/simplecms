/*
 * Glide.js
 * Simple & efficient jQuery slider
 * Autor: @JedrzejChalubek
 * url: http://jedrzejchalubek.com
 * Licensed under the MIT license
 */
;(function ($, window, document, undefined) {
	var name = 'glide',
		defaults = {
			// {Int or Bool} False for turning off autoplay
			autoplay: 3000,
			// {Int} Animation time 
			// That opion will be use when css3 is not suported
			animationTime: 500,

			// {Bool} Show/hide arrows
			arrows: true,
			// {String} Arrows wrapper class
			arrowsClass: 'slider-arrows',
			// {String} Single arrows classes
			arrowClass: {
				// Main class for both arrows
				main: 'slider-arrow',
				// Right arrow
				right: 'slider-arrow--right',
				// Left arrow
				left: 'slider-arrow--left'
			},

			// {Bool} Show/hide bullets navigation
			nav: true,
			// {Bool} Center bullet navigation
			navCenter: true,
			// {String} Navigation class
			navClass: 'slider-nav',
			// {String} Navigation item class
			navItemClass: 'slider-nav__item',
			// {String} Current navigation item class
			navCurrentItemClass: 'slider-nav__item--current'
		};

	/**
	 * Slider Constructor
	 * @param {Object} parent
	 * @param {Object} options
	 */
	function Glide(parent, options) {
		var _ = this;
		_.options = $.extend( {}, defaults, options);

		// Sidebar
		_.parent = parent;
		// Slides Wrapper
		_.wrapper = _.parent.children();
		// Slides
		_.slides = _.wrapper.children();
		// Current slide id
		_.currentSlide = 0;
		// Animation type
		_.animationType = 'css';

		// Initialize
		_.init();
		// Build DOM
		_.build();
		// Start autoplay
		_.play();

		/**
		 * Controller
		 * Keyboard left and right arrow keys
		 */
		$(document).on('keyup', function(k) {
			// Pause autoplay counting
			_.pause();
			// Next
			if (k.keyCode === 39) _.slide(1);
			// Prev
			if (k.keyCode === 37) _.slide(-1);
			// Start autoplay counting
			_.play();
		});

		/**
		 * Controller
		 * Mouse over slider
		 * When mouse is over slider, pause autoplay
		 * On out, start autoplay again
		 */
		_.parent.on('mouseover mouseout touchend', function (e) {
			// Pasue autoplay
			_.pause();
			// When mouse left slider or touch end, start autoplay anew
			if ( (e.type === 'mouseout') || (e.type === 'touchend') ) _.play();
		});

		/**
		 * Controller
		 * When resize browser window
		 * Pause autoplay in fear of escalation
		 * Reinit plugin for for new slider dimensions
		 * Correct crop to current slide
		 * Start autoplay from beginning
		 */
		$(window).on('resize', function() {
			// Pasue autoplay
			_.pause();
			// Reinit plugin (set new slider dimensions)
			_.init();
			// Crop to current slide
			_.slide(0);
			// Start autoplay anew
			_.play();
		});

		/**
		 * Returning Public API
		 */
		return {
			play: function() {
				_.play();
			},
			pause: function() {
				_.pause();
			},
			next: function(callback) {
				_.slide(1, false, callback);
			},
			prev: function(callback) {
				_.slide(-1, false, callback);
			},
			jump: function(distance, callback) {
				_.slide(distance-1, true, callback);
			}
		};
	}

	/**
	 * Slides change & animate logic
	 * @param  {int} distance
	 * @param  {bool} jump
	 * @param  {function} callback
	 */
	Glide.prototype.slide = function(distance, jump, callback) {
		// Cache elements 
		var _ = this,
			currentSlide = (jump) ? 0 : _.currentSlide,
			slidesLength = -(_.slides.length-1),
			navCurrentClass = _.options.navCurrentItemClass,
			slidesSpread = _.slides.spread;

		/**
		 * Check if current slide is first and distanceection is previous, then go to last slide
		 * or current slide is last and distanceection is next, then go to the first slide
		 * else change current slide normally
		 */
		if ( currentSlide === 0 && distance === -1 ) {
			currentSlide = slidesLength;
		} else if ( currentSlide === slidesLength && distance === 1 ) {
			currentSlide = 0;
		} else {
			currentSlide = currentSlide + (-distance);
		}

		/**
		 * Crop to current slide.
		 * Croping by increasing/decreasing slider wrapper margin.
		 * Mul slide width by current slide number.
		 */
		_.wrapper.stop()[_.animationType]({ 'margin-left': slidesSpread * currentSlide }, _.options.animationTime);

		// Set to navigation item current class
		if (_.options.nav) {
			_.nav.children()
				.eq(-currentSlide)
					.addClass(navCurrentClass)
						.siblings()
							.removeClass(navCurrentClass);
		}

		// Update current slide globaly
		_.currentSlide = currentSlide;

		// Callback
		if ( (callback !== 'undefined') && (typeof callback === 'function') ) callback();
	};

	/**
	 * Autoplay logic
	 * Setup counting
	 */
	Glide.prototype.play = function() {
		var _ = this;

		if (_.options.autoplay) {
			_.auto = setInterval(function() {
				_.slide(1, false);
			}, _.options.autoplay);
		}
	};

	/**
	 * Autoplay pause
	 * Clear counting
	 */
	Glide.prototype.pause = function() {
		if (this.options.autoplay) {
			this.auto = clearInterval(this.auto);
		}
	};

	/**
	 * Building navigation DOM.
	 */
	Glide.prototype.build = function() {
		var _ = this;
		/**
		 * Arrows navigation
		 * Append arrows wrapper
		 * Into wrapper append left and right arrow
		 */
		if (_.options.arrows && _.slides.length !== 1) {
			// Cache
			var arrowClass = _.options.arrowClass;

			_.arrows = $('<div />', {
				'class': _.options.arrowsClass
			}).appendTo(_.parent);

			// Cache
			var arrows = _.arrows;

			// Right arrow
			arrows.right = $('<a />', {
				'href': '#',
				'class': arrowClass.main + ' ' + arrowClass.right,
				// Direction and distance -> One forward
				'data-distance': '1',
				'html': '→'
			}).appendTo(arrows);

			// Left arrow
			arrows.left = $('<a />', {
				'href': '#',
				'class': arrowClass.main + ' ' + arrowClass.left,
				// Direction and distance -> One backward
				'data-distance': '-1',
				'html': '←'
			}).appendTo(arrows);

			/**
			 * Controller.
			 * On click in arrows or navigation, get distanceection and distance.
			 * Then slide specified distance. 
			 */
			arrows.children().on('click', function(e) {
				// prevent normal behaviour
				e.preventDefault();

				// Slide distance specified in data attribute
				_.slide( $(this).data('distance'), false );
			});
		}

		/**
		 * Bullet navigation
		 * Append navigation wrapper
		 * Into wrapper, append navigation item for each slide
		 */
		if (_.options.nav && _.slides.length !== 1) {
			_.nav = $('<div />', {
				'class': _.options.navClass
			}).appendTo(_.parent);

			// Cache
			var nav = _.nav;

			// Generate navigation items
			nav.items = $({});
			for (var i = 0; i < _.slides.length; i++) {
				var item = $('<a />', {
					'href': '#',
					'class': _.options.navItemClass,
					// Direction and distance -> Item index forward
					'data-distance': i
				}).appendTo(nav);

				nav[i+1] = item;
			}

			// Cache
			var navChildren = nav.children();

			// If centered option is true
			if (_.options.navCenter) {
				// Center bullet navigation
				nav.css({
					'left': '50%',
					'width': navChildren.outerWidth(true) * navChildren.length,
					'margin-left': -nav.outerWidth(true)/2
				}).children().eq(0).addClass(_.options.navCurrentItemClass);
			}

			/**
			 * Controller.
			 * On click in arrows or navigation, get distanceection and distance.
			 * Then slide specified distance. 
			 */
			navChildren.on('click', function(e) {
				// prevent normal behaviour
				e.preventDefault();
				// Slide distance specified in data attribute
				_.slide( $(this).data('distance'), true );
			});
		}
	};

	/**
	 * Initialize
	 * Get & set dimensions
	 * Set animation type
	 */
	Glide.prototype.init = function() {
		// Get sidebar width
		var sliderWidth = this.parent.width();
		// Get slide width
		this.slides.spread = sliderWidth;

		// Set wrapper width
		this.wrapper.width(sliderWidth * this.slides.length);
		// Set slide width
		this.slides.width(this.slides.spread);

		// If CSS3 Transition isn't Supported set animation to $.animate()
		if ( !isCssSupported("transition") ) this.animationType = 'animate';
	};

	/**
	 * Function to check css3 support
	 * @param  {String}  declaration name
	 * @return {Boolean}
	 */
	function isCssSupported(declaration) {
		var supported = false,
			prefixes = 'Khtml Ms O Moz Webkit'.split(' '),
			clone = document.createElement('div'),
			declarationCapital = null;

		declaration = declaration.toLowerCase();

		if (clone.style[declaration]) supported = true;
		if (supported === false) {
			declarationCapital = declaration.charAt(0).toUpperCase() + declaration.substr(1);
			for( var i = 0; i < prefixes.length; i++ ) {
				if( clone.style[prefixes[i] + declarationCapital ] !== undefined ) {
					supported = true;
					break;
				}
			}
		}

		return supported;
	}

	$.fn[name] = function (options) {
		return this.each(function () {
			if ( !$.data(this, 'api_' + name) ) {
				$.data(this, 'api_' + name,
					new Glide($(this), options)
				);
			}
		});
	};

})(jQuery, window, document);


/*
 * ScrollTo.js
 */
(function(c){c.fn.scrollTo=function(b){var a={offset:0,speed:"slow",override:null,easing:null};if(b){if(b.override)b.override=-1!=override("#")?b.override:"#"+b.override;c.extend(a,b)}return this.each(function(b,e){c(e).click(function(b){b.preventDefault();var d=a.override?a.override:c(e).attr("href");history.pushState?(history.pushState(null,null,d),console.log(a.easing),c("html,body").stop().animate({scrollTop:c(d).offset().top+a.offset},a.speed,a.easing)):c("html,body").stop().animate({scrollTop:c(d).offset().top+
a.offset},a.speed,a.easing,function(){window.location.hash=d})})})}})(jQuery);


/**
 * Set sections height
 */
function setGreetSectionHeight (section) {
  $('.greet, .slider, .slides').css('height', $(window).height());
}

setGreetSectionHeight();

$(window).on('resize', function(event) {
  event.preventDefault();
  setGreetSectionHeight();
});