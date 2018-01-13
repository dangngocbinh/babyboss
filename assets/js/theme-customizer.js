wp.customize( 'topbar_visibility', function( value ) {

	// When the value changes.
	value.bind( function( newval ) {

		if(newval){
			jQuery('#masthead .top-bar').removeClass('hidetopbar');
		}else{
			jQuery('#masthead .top-bar').addClass('hidetopbar');
		}
	} );
} );

wp.customize( 'topbar_sologan', function( value ) {

	// When the value changes.
	value.bind( function( newval ) {
		jQuery('#masthead .top-bar .sologan').html(newval);
	} );
} );

wp.customize( 'header_menu_style', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		jQuery('body').removeClass('.bottom-line-item');
		jQuery('body').removeClass('.change-color-item');
		jQuery('body').removeClass('.change-bg-item');
		jQuery('body').addClass(newval);
	} );
} );