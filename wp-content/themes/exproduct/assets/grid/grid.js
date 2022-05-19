
(function($) {
 
    var $event = $.event,
            $special,
            dummy = {_: 0},
    frame = 0,
            wasResized, animRunning;
 
    $special = $event.special.throttledresize = {
        setup: function() {
            $(this).on("resize", $special.handler);
        },
        teardown: function() {
            $(this).off("resize", $special.handler);
        },
        handler: function(event, execAsap) {
// Save the context
            var context = this,
                    args = arguments;
 
            wasResized = true;
 
            if (!animRunning) {
                setInterval(function() {
                    frame++;
 
                    if (frame > $special.threshold && wasResized || execAsap) {
// set correct event type
                        event.type = "throttledresize";
                        $event.dispatch.apply(context, args);
                        wasResized = false;
                        frame = 0;
                    }
                    if (frame > 9) {
                        $(dummy).stop();
                        animRunning = false;
                        frame = 0;
                    }
                }, 30);
                animRunning = true;
            }
        },
        threshold: 0
    };
 
})(jQuery);
 
/* ======================= imagesLoaded Plugin ===============================
 https://github.com/desandro/imagesloaded
 
 $('#my-container').imagesLoaded(myFunction)
 execute a callback when all images have loaded.
 needed because .load() doesn't work on cached images
 
 callback function gets image collection as argument
 this is the container
 
 original: MIT license. Paul Irish. 2010.
 contributors: Oren Solomianik, David DeSandro, Yiannis Chatzikonstantinou
 
 blank image data-uri bypasses webkit log warning (thx doug jones)
 */
$ = jQuery;
var BLANK = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';
 
$.fn.imagesLoaded = function(callback) {
    var $this = this,
            deferred = $.isFunction($.Deferred) ? $.Deferred() : 0,
            hasNotify = $.isFunction(deferred.notify),
            $images = $this.find('img').add($this.filter('img')),
            loaded = [],
            proper = [],
            broken = [];
 
// Register deferred callbacks
    if ($.isPlainObject(callback)) {
        $.each(callback, function(key, value) {
            if (key === 'callback') {
                callback = value;
            } else if (deferred) {
                deferred[key](value);
            }
        });
    }
 
    function doneLoading() {
        var $proper = $(proper),
                $broken = $(broken);
 
        if (deferred) {
            if (broken.length) {
                deferred.reject($images, $proper, $broken);
            } else {
                deferred.resolve($images);
            }
        }
 
        if ($.isFunction(callback)) {
            callback.call($this, $images, $proper, $broken);
        }
    }
 
    function imgLoaded(img, isBroken) {
// don't proceed if BLANK image, or image is already loaded
        if (img.src === BLANK || $.inArray(img, loaded) !== -1) {
            return;
        }
 
// store element in loaded images array
        loaded.push(img);
 
// keep track of broken and properly loaded images
        if (isBroken) {
            broken.push(img);
        } else {
            proper.push(img);
        }
 
// cache image and its state for future calls
        $.data(img, 'imagesLoaded', {isBroken: isBroken, src: img.src});
 
// trigger deferred progress method if present
        if (hasNotify) {
            deferred.notifyWith($(img), [isBroken, $images, $(proper), $(broken)]);
        }
 
// call doneLoading and clean listeners if all images are loaded
        if ($images.length === loaded.length) {
            setTimeout(doneLoading);
            $images.off('.imagesLoaded');
        }
    }
 
// if no images, trigger immediately
    if (!$images.length) {
        doneLoading();
    } else {
        $images.on('load.imagesLoaded error.imagesLoaded', function(event) {
// trigger imgLoaded
            imgLoaded(event.target, event.type === 'error');
        }).each(function(i, el) {
            var src = el.src;
 
// find out if this image has been already checked for status
// if it was, and src has not changed, call imgLoaded on it
            var cached = $.data(el, 'imagesLoaded');
            if (cached && cached.src === src) {
                imgLoaded(el, cached.isBroken);
                return;
            }
 
// if complete is true and browser supports natural sizes, try
// to check for image status manually
            if (el.complete && el.naturalWidth !== undefined) {
                imgLoaded(el, el.naturalWidth === 0 || el.naturalHeight === 0);
                return;
            }
 
// cached images don't fire load sometimes, so we reset src, but only when
// dealing with IE, or image is complete (loaded) and failed manual check
// webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
            if (el.readyState || el.complete) {
                el.src = BLANK;
                el.src = src;
            }
        });
    }
 
    return deferred ? deferred.promise($this) : $this;
};
 
var Grid = (function() {
 
// list of items
    var $grid = jQuery('.og-grid'),
// the items
            $items = $grid.children('li'),
// current expanded item's index
            current = -1,
// position (top) of the expanded item
// used to know if the preview will expand in a different row
            previewPos = -1,
// extra amount of pixels to scroll the window
            scrollExtra = 0,
// extra margin when expanded (between preview overlay and the next items)
            marginExpanded = 10,
            $window = $(window), winsize,
            $body = $('html, body'),
// transitionend events
            transEndEventNames = {
        'WebkitTransition': 'webkitTransitionEnd',
        'MozTransition': 'transitionend',
        'OTransition': 'oTransitionEnd',
        'msTransition': 'MSTransitionEnd',
        'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ],
// support for csstransitions
            support = Modernizr.csstransitions,
// default settings
            settings = {
        minHeight: 460,
        speed: 350,
        easing: 'ease'
    };
 
    function init(config) {
 
        $grid = jQuery('.og-grid');
        settings.minHeight = $grid.attr("data-minheight") ? parseInt($grid.attr("data-minheight"), 10) : settings.minHeight;
        // the items
        $items = $grid.children('li');
 
        settings = jQuery.extend(true, {}, settings, config);
 
// preload all images
        $grid.imagesLoaded(function() {
 
// save itemA?s size and offset
            saveItemInfo(true);
// get windowA?s size
            getWinSize();
// initialize some events
            initEvents();
 
        });
 
    }
 
// saves the itemA?s offset top and height (if saveheight is true)
    function saveItemInfo(saveheight) {
        $items.each(function() {
            var $item = jQuery(this);
            $item.data('offsetTop', $item.offset().top);
            if (saveheight) {
                $item.data('height', $item.height());
            }
        });
    }
 
    function initEvents() {
 
// when clicking an item, show the preview with the itemA?s info and large image.
// close the item if already expanded.
// also close if clicking on the itemA?s cross
        $items.on('click', 'span.og-close', function() {
            hidePreview();
            return false;
        }).children('a').on('click', function(e) {
 
            var $item = jQuery(this).parent();
// check if item already opened
 
            current === $items.index($item) ? hidePreview() : showPreview($item);
            return false;
 
        });
 
// on window resize get the windowA?s size again
// reset some values..
        $window.on('debouncedresize', function() {
 
            scrollExtra = 0;
            previewPos = -1;
// save itemA?s offset
            saveItemInfo();
            getWinSize();
            var preview = $.data(this, 'preview');
            if (typeof preview != 'undefined') {
                hidePreview();
            }
 
        });
 
    }
 
    function getWinSize() {
        winsize = {width: $window.width(), height: $window.height()};
    }
 
    function showPreview($item) {
 
        var preview = jQuery.data(this, 'preview'),
// itemA?s offset top
                position = $item.data('offsetTop');
 
        scrollExtra = 0;
 
// if a preview exists and previewPos is different (different row) from itemA?s top then close it
        if (typeof preview != 'undefined') {
 
// not in the same row
            if (previewPos !== position) {
// if position > previewPos then we need to take te current previewA?s height in consideration when scrolling the window
                if (position > previewPos) {
                    scrollExtra = preview.height;
                }
                hidePreview();
            }
// same row
            else {
                preview.update($item);
                return false;
            }
 
        }
 
// update previewPos
        previewPos = position;
// initialize new preview for the clicked item
        preview = jQuery.data(this, 'preview', new Preview($item));
// expand preview overlay
        preview.open();
 
    }
	
	// add more items to the grid.
	// the new items need to appended to the grid.
	// after that call Grid.addItems(theItems);
	function addItems( $newitems ) {

		$items = $items.add( $newitems );

		$newitems.each( function() {
			var $item = jQuery( this );
			$item.data( {
				offsetTop : $item.offset().top,
				height : $item.height()
			} );
		} );

	//	initItemsEvents( $newitems );

	}
	
	// add more items to the grid.
	// the new items need to appended to the grid.
	// after that call Grid.addItems(theItems);
	function clearItems( ) {

		$items.empty();

	}
 
    function hidePreview() {
        current = -1;
        var preview = jQuery.data(this, 'preview');
        preview.close();
        jQuery.removeData(this, 'preview');
    }
 
// the preview obj / overlay
    function Preview($item) {
        this.$item = $item;
        this.expandedIdx = $items.index($item);
        this.create();
        this.update();
    }
 
    Preview.prototype = {
        create : function() {
			// create Preview structure:
			this.$title = jQuery( '<h3></h3>' );
		this.$price = jQuery( '' );
			this.$description = jQuery( '<p></p>' );
			this.$href = jQuery( '<a href="#">Learn more</a>' );
			this.$or = jQuery( '' );
			this.$addtocart = jQuery( '' );
			this.$addtohref = this.$addtocart
			this.$details = jQuery( '<div class="og-details"></div>' ).append( this.$title, this.$price, this.$description, this.$href, this.$or, this.$addtocart );
			this.$loading = jQuery( '<div class="og-loading"></div>' );
			this.$fullimage = jQuery( '<div class="og-fullimg"></div>' ).append( this.$loading );
			this.$closePreview = jQuery( '<span class="og-close"></span>' );
			this.$previewInner = jQuery( '<div class="og-expander-inner"></div>' ).append( this.$closePreview, this.$fullimage, this.$details );
			this.$previewEl = jQuery( '<div class="og-expander"></div>' ).append( this.$previewInner );
			// append preview element to the item
			this.$item.append( this.getEl() );
			// set the transitions for the preview and the item
			if( support ) {
				this.setTransition();
			}
		},
        update: function($item) {
            if ($item) {
                this.$item = $item;
            }
 
// if already expanded remove class "og-expanded" from current item and add it to new item
            if (current !== -1) {
                var $currentItem = $items.eq(current);
                $currentItem.removeClass('og-expanded');
				jQuery('.og-expanded').each(function(){
					jQuery(this).removeClass('og-expanded');
				});
                this.$item.addClass('og-expanded');
// position the preview correctly
                this.positionPreview();
            }
 
// update current value
            current = $items.index(this.$item);
 
// update previewA?s content
            var $itemEl = this.$item.children( 'a' ),
				eldata = {
					href : $itemEl.attr( 'href' ),
					largesrc : $itemEl.data( 'largesrc' ),
					price : $itemEl.data( 'price' ),
					addtohref: $itemEl.data( 'addtohref' ),
					title : $itemEl.data( 'title' ),
					description : $itemEl.data( 'description' )
				};

			this.$title.html( eldata.title );
			this.$price.html( eldata.price );
			this.$description.html( eldata.description );
			this.$href.attr( 'href', eldata.href );
			this.$href.html($itemEl.attr( 'lm-button-text' ));
			this.$addtohref.attr( 'href', eldata.addtohref );
			this.$addtohref.html($itemEl.attr( 'ac-button-text' ));
			var self = this;
 
// remove the current image in the preview
            if (typeof self.$largeImg != 'undefined') {
                self.$largeImg.remove();
            }
 
// preload large image and add it to the preview
// for smaller screens we donA?t display the large image (the media query will hide the fullimage wrapper)
            if (self.$fullimage.is(':visible')) {
                this.$loading.show();
                jQuery('<img/>').load(function() {
                    var $img = jQuery(this);
                    if ($img.attr('src') === self.$item.children('a').data('largesrc')) {
                        self.$loading.hide();
                        self.$fullimage.find('img').remove();
                        self.$largeImg = $img.fadeIn(350);
                        if (jQuery.browser.msie) {
                            self.$largeImg.width("auto").height("auto");
                        }
                        self.$fullimage.append(self.$largeImg);
                    }
                }).attr('src', eldata.largesrc);
            }
 
        },
        open: function() {
 
            setTimeout(jQuery.proxy(function() {
// set the height for the preview and the item
                this.setHeights();
// scroll to position the preview in the right place
                this.positionPreview();
            }, this), 25);
 
        },
        close: function() {
            var self = this,
                    onEndFn = function() {
                if (support) {
                    jQuery(this).off(transEndEventName);
                }
                self.$item.removeClass('og-expanded');
				jQuery('.og-expanded').each(function(){
					jQuery(this).removeClass('og-expanded');
				});
                self.$previewEl.remove();
            };
 
            setTimeout(jQuery.proxy(function() {
 
                if (typeof this.$largeImg !== 'undefined') {
                    this.$largeImg.fadeOut('fast');
                }
                this.$previewEl.css('height', 0);
// the current expanded item (might be different from this.$item)
                var $expandedItem = $items.eq(this.expandedIdx);
                console.log($expandedItem);
                $expandedItem.css('height', $expandedItem.data('height')).on(transEndEventName, onEndFn);
 
                if (!support) {
                    onEndFn.call();
                }
 
            }, this), 25);
 
            return false;
 
        },
        calcHeight: function() {
 
            var heightPreview = winsize.height - this.$item.data('height') - marginExpanded,
                    itemHeight = winsize.height;
 
            if (heightPreview < settings.minHeight) {
                heightPreview = settings.minHeight;
                itemHeight = settings.minHeight + this.$item.data('height') + marginExpanded;
            }
 
            this.height = heightPreview;
            this.itemHeight = itemHeight;
 
        },
        setHeights: function() {
 
            var self = this,
                    onEndFn = function() {
                if (support) {
                    self.$item.off(transEndEventName);
                }
                self.$item.addClass('og-expanded');
            };
 
            this.calcHeight();
            this.$previewEl.css('height', this.height);
            //this.itemHeight = "auto";
            this.$item.css('height', this.itemHeight).on(transEndEventName, onEndFn);
 
            if (!support) {
                onEndFn.call();
            }
 
        },
        positionPreview: function() {
 
// scroll page
// case 1 : preview height + item height fits in windowA?s height
// case 2 : preview height + item height does not fit in windowA?s height and preview height is smaller than windowA?s height
// case 3 : preview height + item height does not fit in windowA?s height and preview height is bigger than windowA?s height
            var position = this.$item.data('offsetTop'),
                    previewOffsetT = this.$previewEl.offset().top - scrollExtra,
                    scrollVal = this.height + this.$item.data('height') + marginExpanded <= winsize.height ? position : this.height < winsize.height ? previewOffsetT - (winsize.height - this.height) : previewOffsetT;
 
            $body.animate({scrollTop: scrollVal}, settings.speed);
 
        },
        setTransition: function() {
            this.$previewEl.css('transition', 'height ' + settings.speed + 'ms ' + settings.easing);
            this.$item.css('transition', 'height ' + settings.speed + 'ms ' + settings.easing);
        },
        getEl: function() {
            return this.$previewEl;
        }
    }
 
    return {init: init, addItems: addItems, clearItems: clearItems};
 
})(jQuery);