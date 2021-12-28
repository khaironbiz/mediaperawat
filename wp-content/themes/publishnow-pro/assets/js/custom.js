( function( $ ) {

	/**
	 * Responsive video
	 */
	function responsiveVideo() {
		$( '.entry, .widget, .entry-format' ).fitVids();
	}

	/**
	 * Sticky social share
	 */
	function stickySocialShare() {
		$( '.post-share' ).theiaStickySidebar( {
			additionalMarginTop: 30
		} );
	}

	/**
	 * Back to top
	 */
	function backToTop() {
		if ( $( '.back-to-top' ).length ) {
			var scrollTrigger = 100,
				backToTop = function() {
					var scrollTop = $( window ).scrollTop();
					if ( scrollTop > scrollTrigger ) {
						$( '.back-to-top' ).addClass( 'show' );
					} else {
						$( '.back-to-top' ).removeClass( 'show' );
					}
				};

			backToTop();
			$( window ).on( 'scroll', function() {
				backToTop();
			} );

			$( '.back-to-top' ).on( 'click', function( e ) {
				e.preventDefault();
				$( 'html, body' ).animate( {
					scrollTop: 0
				}, 700 );
			} );

		}
	}

	/**
	 * Mobile top menu
	 */
	function mobileTopNav() {
		$( '#primary-menu' ).slicknav( {
			label: '',
			prependTo: '.main-navigation .container',
			allowParentLinks: true
		} );
	}

	/**
	 * Mobile main menu
	 */
	function mobileMainNav() {
		$( '#secondary-menu' ).slicknav( {
			label: '',
			prependTo: '.secondary-navigation .container',
			allowParentLinks: true
		} );
	}

	/**
	 * Sticky sidebar
	 */
	function stickySidebar() {
		if ( publishnow.sticky ) {
			$( '.widget-area' ).theiaStickySidebar( {
				additionalMarginTop: 20
			} );
		}
	}

	// Document ready
	$( function() {
		responsiveVideo();
		stickySocialShare();
		backToTop();
		mobileTopNav();
		mobileMainNav();
		stickySidebar();
	} );

}( jQuery ) );
