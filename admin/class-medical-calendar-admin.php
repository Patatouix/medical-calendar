<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Medical_Calendar
 * @subpackage Medical_Calendar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Medical_Calendar
 * @subpackage Medical_Calendar/admin
 * @author     Your Name <email@example.com>
 */
class Medical_Calendar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $medical_calendar    The ID of this plugin.
	 */
    private $plugin_name;

    /**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options    The plugin options.
	 */
	private $options;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $medical_calendar       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->set_options();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Medical_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Medical_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/medical-calendar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Medical_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Medical_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/medical-calendar-admin.js', array( 'jquery' ), $this->version, false );

    }

    /**
	 * Creates a new custom post type : rendez-vous
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_post_type()
	 */
	public static function new_cpt_rdv() {

		$cap_type 	= 'post';
		$plural 	= 'Rdvs';
		$single 	= 'Rdv';
		$cpt_name 	= 'rdv';

		$opts['can_export']							    = TRUE;
		$opts['capability_type']						= $cap_type;
		$opts['description']							= 'A medical appointment';
		$opts['exclude_from_search']					= FALSE;
		$opts['has_archive']							= FALSE;
		$opts['hierarchical']							= FALSE;
		$opts['map_meta_cap']							= TRUE;
		$opts['menu_icon']								= 'dashicons-clock';
		$opts['menu_position']							= 25;
		$opts['public']									= TRUE;
		$opts['publicly_querable']						= TRUE;
		$opts['query_var']								= TRUE;
		$opts['register_meta_box_cb']					= '';
		$opts['rewrite']								= FALSE;
		$opts['show_in_admin_bar']						= TRUE;
		$opts['show_in_menu']							= TRUE;
		$opts['show_in_nav_menu']						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['supports']								= array( 'title', 'editor', 'thumbnail' );
		$opts['taxonomies']								= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']			= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']			= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']		= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']				= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']				= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']		= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts']			= "publish_{$cap_type}s";
		$opts['capabilities']['read_post']				= "read_{$cap_type}";
		$opts['capabilities']['read_private_posts']		= "read_private_{$cap_type}s";

		$opts['labels']['add_new']						= esc_html__( "Ajouter un nouveau {$single}", 'medical-calendar' );
		$opts['labels']['add_new_item']					= esc_html__( "Ajouter ou supprimer un {$single}", 'medical-calendar' );
		$opts['labels']['all_items']					= esc_html__( $plural, 'medical-calendar' );
		$opts['labels']['edit_item']					= esc_html__( "Modifier le {$single}" , 'medical-calendar' );
		$opts['labels']['menu_name']					= esc_html__( $plural, 'medical-calendar' );
		$opts['labels']['name']							= esc_html__( $plural, 'medical-calendar' );
		$opts['labels']['name_admin_bar']				= esc_html__( $single, 'medical-calendar' );
		$opts['labels']['new_item']						= esc_html__( "Nouveau {$single}", 'medical-calendar' );
		$opts['labels']['not_found']					= esc_html__( "Pas de {$plural} trouvés", 'medical-calendar' );
		$opts['labels']['not_found_in_trash']			= esc_html__( "Pas de {$plural} trouvés dans la corbeille", 'medical-calendar' );
		$opts['labels']['parent_item_colon']			= esc_html__( "Parent {$plural} :", 'medical-calendar' );
		$opts['labels']['search_items']					= esc_html__( "Chercher des {$plural}", 'medical-calendar' );
		$opts['labels']['singular_name']				= esc_html__( $single, 'medical-calendar' );
		$opts['labels']['view_item']					= esc_html__( "Voir le {$single}", 'medical-calendar' );

		$opts['rewrite']['ep_mask']						= EP_PERMALINK;
		$opts['rewrite']['feeds']						= FALSE;
		$opts['rewrite']['pages']						= TRUE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $plural ), 'medical-calendar' );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'medical-calendar-cpt-options', $opts );

		register_post_type( strtolower( $cpt_name ), $opts );

    } // new_cpt_rdv()

    /**
	 * Creates a new taxonomy : Motif de consultation, for rdv custom post type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	register_taxonomy()
	 */
	public static function new_taxonomy_motif() {

		$plural 	= 'Motifs';
		$single 	= 'Motif';
		$tax_name 	= 'rdv_motif';

		$opts['hierarchical']							= FALSE;
		//$opts['meta_box_cb'] 							= '';
		$opts['public']									= TRUE;
		$opts['query_var']								= $tax_name;
		$opts['show_admin_column'] 						= FALSE;
		$opts['show_in_nav_menus']						= TRUE;
		$opts['show_tag_cloud'] 						= TRUE;
		$opts['show_ui']								= TRUE;
		$opts['sort'] 									= '';
		//$opts['update_count_callback'] 				= '';

		$opts['capabilities']['assign_terms'] 			= 'edit_posts';
		$opts['capabilities']['delete_terms'] 			= 'manage_categories';
		$opts['capabilities']['edit_terms'] 			= 'manage_categories';
		$opts['capabilities']['manage_terms'] 			= 'manage_categories';

		$opts['labels']['add_new_item'] 				= esc_html__( "Ajouter un nouveau {$single}", 'medical-calendar' );
		$opts['labels']['add_or_remove_items'] 			= esc_html__( "Ajouter ou supprimer un {$plural}", 'medical-calendar' );
		$opts['labels']['all_items'] 					= esc_html__( $plural, 'medical-calendar' );
		$opts['labels']['choose_from_most_used'] 		= esc_html__( "Choisir parmi les plus utilisés {$plural}", 'medical-calendar' );
		$opts['labels']['edit_item'] 					= esc_html__( "Modifier un {$single}" , 'medical-calendar');
		$opts['labels']['menu_name'] 					= esc_html__( $plural, 'medical-calendar' );
		$opts['labels']['name'] 						= esc_html__( $plural, 'medical-calendar' );
		$opts['labels']['new_item_name'] 				= esc_html__( "Nouveau nom de {$single}", 'medical-calendar' );
		$opts['labels']['not_found'] 					= esc_html__( "Pas de {$plural} trouvés", 'medical-calendar' );
		$opts['labels']['parent_item'] 					= esc_html__( "Parent {$single}", 'medical-calendar' );
		$opts['labels']['parent_item_colon'] 			= esc_html__( "Parent {$single}:", 'medical-calendar' );
		$opts['labels']['popular_items'] 				= esc_html__( "Popular {$plural}", 'medical-calendar' );
		$opts['labels']['search_items'] 				= esc_html__( "Chercher des {$plural}", 'medical-calendar' );
		$opts['labels']['separate_items_with_commas'] 	= esc_html__( "Séparez les {$plural} avec des virgules", 'medical-calendar' );
		$opts['labels']['singular_name'] 				= esc_html__( $single, 'medical-calendar' );
		$opts['labels']['update_item'] 					= esc_html__( "Mettre à jour un {$single}", 'medical-calendar' );
		$opts['labels']['view_item'] 					= esc_html__( "Voir le {$single}", 'medical-calendar' );

		$opts['rewrite']['ep_mask']						= EP_NONE;
		$opts['rewrite']['hierarchical']				= FALSE;
		$opts['rewrite']['slug']						= esc_html__( strtolower( $tax_name ), 'medical-calendar' );
		$opts['rewrite']['with_front']					= FALSE;

		$opts = apply_filters( 'medical-calendar-taxonomy-options', $opts );

		register_taxonomy( $tax_name, 'rdv', $opts );

	} // new_taxonomy_type()

    /**
	 * Adds 2 links to the menu : settings page & help page
	 *
	 * @link 		https://codex.wordpress.org/Administration_Menus
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function add_submenu() {

		// Top-level page
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		// Submenu Page
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);

		add_submenu_page(
			'edit.php?post_type=rdv',
			apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( 'Paramètres de Medical Calendar', 'medical-calendar' ) ),
			apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( 'Paramètres', 'medical-calendar' ) ),
			'manage_options',
			$this->plugin_name . '-settings',
			array( $this, 'page_options' )
		);

		add_submenu_page(
			'edit.php?post_type=rdv',
			apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( 'Aide de Medical Calendar', 'medical-calendar' ) ),
			apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( 'Aide', 'medical-calendar' ) ),
			'manage_options',
			$this->plugin_name . '-help',
			array( $this, 'page_help' )
		);

    } // add_menu()

    /**
	 * Creates the help page
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_help() {

		include( plugin_dir_path( __FILE__ ) . 'partials/medical-calendar-admin-page-help.php' );

	} // page_help()

	/**
	 * Creates the options page
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function page_options() {

		include( plugin_dir_path( __FILE__ ) . 'partials/medical-calendar-admin-page-settings.php' );

    } // page_options()

    /**
	 * Registers settings fields with WordPress
	 */
	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			'message-no-rdvs',
			apply_filters( $this->plugin_name . 'label-message-no-rdvs', esc_html__( 'Message quand pas de Rdvs', 'medical-calendar' ) ),
			array( $this, 'field_text' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'Ce message apparait quand il n\'y a aucun rendez-vous.',
				'id' 			=> 'message-no-rdvs',
				'value' 		=> 'Merci pour votre intérêt ! Il n\'y a pas de rendez-vous disponible en ce moment.',
			)
		);

		/*add_settings_field(
			'how-to-apply',
			apply_filters( $this->plugin_name . 'label-how-to-apply', esc_html__( 'How to Apply', 'now-hiring' ) ),
			array( $this, 'field_editor' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'Instructions for applying (contact email, phone, fax, address, etc).',
				'id' 			=> 'howtoapply'
			)
		);*/

    } // register_fields()

    /**
	 * Creates a text field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_text( $args ) {

		$defaults['class'] 			= 'text widefat';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['placeholder'] 	= '';
		$defaults['type'] 			= 'text';
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-text.php' );

	} // field_text()

	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			$this->plugin_name . '-messages',
			apply_filters( $this->plugin_name . 'section-title-messages', esc_html__( 'Messages', 'medical-calendar' ) ),
			array( $this, 'section_messages' ),
			$this->plugin_name
		);

    } // register_sections()

    /**
	 * Creates a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function section_messages( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/medical-calendar-admin-section-messages.php' );

	} // section_messages()

	/**
	 * Registers plugin settings
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			$this->plugin_name . '-options',
			$this->plugin_name . '-options',
			array( $this, 'validate_options' )
		);

    } // register_settings()

    /**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->plugin_name . '-options' );

	} // set_options()

    /**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		//wp_die( print_r( $input ) );

		$valid 		= array();
		$options 	= $this->get_options_list();

		foreach ( $options as $option ) {

			$name = $option[0];
			$type = $option[1];

			/*if ( 'repeater' === $type && is_array( $option[2] ) ) {

				$clean = array();

				foreach ( $option[2] as $field ) {

					foreach ( $input[$field[0]] as $data ) {

						if ( empty( $data ) ) { continue; }

						$clean[$field[0]][] = $this->sanitizer( $field[1], $data );

					} // foreach

				} // foreach

				$count = now_hiring_get_max( $clean );

				for ( $i = 0; $i < $count; $i++ ) {

					foreach ( $clean as $field_name => $field ) {

						$valid[$option[0]][$i][$field_name] = $field[$i];

					} // foreach $clean

				} // for

			} else {*/

			    $valid[$option[0]] = $this->sanitizer( $type, $input[$name] );

			//}

			/*if ( ! isset( $input[$option[0]] ) ) { continue; }

			$sanitizer = new Now_Hiring_Sanitize();

			$sanitizer->set_data( $input[$option[0]] );
			$sanitizer->set_type( $option[1] );

			$valid[$option[0]] = $sanitizer->clean();

			if ( $valid[$option[0]] != $input[$option[0]] ) {

				add_settings_error( $option[0], $option[0] . '_error', esc_html__( $option[0] . ' error.', 'now-hiring' ), 'error' );

			}

			unset( $sanitizer );*/

		}

		return $valid;

    } // validate_options()

    private function sanitizer( $type, $data ) {

		if ( empty( $type ) ) { return; }
		if ( empty( $data ) ) { return; }

		$return 	= '';
		$sanitizer 	= new Medical_Calendar_Sanitize();

		$sanitizer->set_data( $data );
		$sanitizer->set_type( $type );

		$return = $sanitizer->clean();

		unset( $sanitizer );

		return $return;

	} // sanitizer()

    /**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

		$options = array();

		$options[] = array( 'message-no-rdvs', 'text', 'Merci pour votre intérêt ! Il n\'y a pas de rendez-vous disponible en ce moment.' );
		//$options[] = array( 'howtoapply', 'editor', '' );
		//$options[] = array( 'repeat-test', 'repeater', array( array( 'test1', 'text' ), array( 'test2', 'text' ), array( 'test3', 'text' ) ) );

		return $options;

	} // get_options_list()

}
