<?php

if ( ! function_exists( 'conall_edge_register_required_plugins' ) ) {
	/**
	 * Registers Visual Composer, Layer Slider, Revolution Slider, Edge Core, Edge Instagram Feed, Edgef Twitter Feed  as required plugins. Hooks to tgmpa_register hook
	 */
	function conall_edge_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'conall' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/includes/plugins/js_composer.zip',
				'version'            => '6.6.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'conall' ),
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/includes/plugins/revslider.zip',
				'version'            => '6.4.11',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Edge CPT', 'conall' ),
				'slug'               => 'edgtf-core',
				'source'             => get_template_directory() . '/includes/plugins/edgtf-core.zip',
				'required'           => true,
				'version'            => '1.3',
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Edge Instagram Feed', 'conall' ),
				'slug'               => 'edgtf-instagram-feed',
				'source'             => get_template_directory() . '/includes/plugins/edgtf-instagram-feed.zip',
				'required'           => true,
				'version'            => '2.0.1',
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Edge Twitter Feed', 'conall' ),
				'slug'               => 'edgtf-twitter-feed',
				'source'             => get_template_directory() . '/includes/plugins/edgtf-twitter-feed.zip',
				'required'           => true,
				'version'            => '1.0.3',
				'force_activation'   => false,
				'force_deactivation' => false
			),
/* 			array(
				'name'         => esc_html__( 'WooCommerce', 'conall' ),
				'slug'         => 'woocommerce',
				'external_url' => 'https://wordpress.org/plugins/woocommerce/',
				'required'     => false
			), */
/* 			array(
				'name'         => esc_html__( 'Contact Form 7', 'conall' ),
				'slug'         => 'contact-form-7',
				'external_url' => 'https://wordpress.org/plugins/contact-form-7/',
				'required'     => false
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'conall' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false
			) */
		);

		$config = array(
			'domain'       => 'conall',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'conall' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'conall' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'conall' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'conall' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'conall' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'conall' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'conall' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'conall' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'conall' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'conall' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'conall' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'conall' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'conall' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'conall' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'conall' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'conall' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'conall' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'conall_edge_register_required_plugins' );
}


