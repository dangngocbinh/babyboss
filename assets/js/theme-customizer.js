wp.customize( 'topbar_visibility', function( value ) {

	// When the value changes.
	value.bind( function( newval ) {

		if(newval){
			jQuery('#masthead .top-bar').show();
		}else{
			jQuery('#masthead .top-bar').hide();
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
		debugger;
		jQuery('body').removeClass('.bottom-line-item');
		jQuery('body').removeClass('.change-color-item');
		jQuery('body').removeClass('.change-bg-item');
		jQuery('body').addClass(newval);
	} );
} );