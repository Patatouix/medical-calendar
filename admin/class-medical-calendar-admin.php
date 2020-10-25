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
	private $medical_calendar;

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
	public function __construct( $medical_calendar, $version ) {

		$this->medical_calendar = $medical_calendar;
		$this->version = $version;

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

		wp_enqueue_style( $this->medical_calendar, plugin_dir_url( __FILE__ ) . 'css/medical-calendar-admin.css', array(), $this->version, 'all' );

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

		wp_enqueue_script( $this->medical_calendar, plugin_dir_url( __FILE__ ) . 'js/medical-calendar-admin.js', array( 'jquery' ), $this->version, false );

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

}
