jQuery( document ).ready( function () {
	jQuery( 'body' ).on( 'change', '.btn_hover_style', function () {
		const o = jQuery( this ).data( 'option' );
		'_' == o
			? ( jQuery( '.icon_hover_color' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'none' } ),
			  jQuery( '.icon_color_hoverbg' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'none' } ),
			  jQuery( '.icon_color_hoverborder' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'none' } ),
			  jQuery( '.btn_iconhover_color' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'none' } ),
			  jQuery( '.btn_icon_color_hoverbg' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'none' } ),
			  jQuery( '.btn_icon_color_hoverborder' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'none' } ) )
			: ( jQuery( '.icon_hover_color' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'block' } ),
			  jQuery( '.icon_color_hoverbg' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'block' } ),
			  jQuery( '.icon_color_hoverborder' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'block' } ),
			  jQuery( '.btn_iconhover_color' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'block' } ),
			  jQuery( '.btn_icon_color_hoverbg' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'block' } ),
			  jQuery( '.btn_icon_color_hoverborder' )
					.closest( 'div.wpb_el_type_colorpicker' )
					.css( { display: 'block' } ) );
	} );
} );
