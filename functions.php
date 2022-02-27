<?php 
	/**
	 *
	 * functions.php
	 *
	 */


/*----------  1.0 DEFINE CONSTANT  ----------*/
	define( 'THEMEROOT', get_stylesheet_directory_uri());
	define( 'IMAGES', THEMEROOT . '/assets/images');
	define( 'STYLES', THEMEROOT . '/assets/css');
	define( 'SCRIPTS', THEMEROOT . '/assets/js');

/*----------  2.0 LOAD THE CUSTOM SCRIPTS FOR THE THEMES  ----------*/
	if ( ! function_exists( 'studentlaptop_script' )) {
		function studentlaptop_script()
		{
			// LOAD THE STYLESHEET
			wp_enqueue_style( 'fontawesome', STYLES . '/font-awesome.min.css', null, null, null );
			wp_enqueue_style( 'bootstrap', STYLES . '/bootstrap.css', null, null, null );
			wp_enqueue_style( 'flexslider', STYLES . '/flexslider.css', null, null, null );
			wp_enqueue_style( 'main', STYLES . '/main.css', null, null, null );
			wp_enqueue_style( 'custom', STYLES . '/custom.css', null, null, null );

			// REGISTER SCRIPTS
			wp_register_script( 'bootstrap-js', SCRIPTS . '/bootstrap.js', [ 'jquery' ], null, true );
			wp_register_script( 'plugins-js', SCRIPTS . '/plugins.js', [ 'jquery' ], null, true );
			wp_register_script( 'flexslider-js', SCRIPTS . '/jquery.flexslider.js', [ 'jquery' ], null, true );
			
			// LOAD THE CUSTOM SCRIPTS
			wp_enqueue_script( 'bootstrap-js' );
			wp_enqueue_script( 'plugins-js' );
			wp_enqueue_script( 'flexslider-js' );

		}
		add_action( 'wp_enqueue_scripts', 'studentlaptop_script' );
	}

/*----------  3.0 SET UP THEME DEFAULT AND REGISTER VARIOUS SUPPORTED FEATURES.  ----------*/
	if ( ! function_exists( 'studentlaptop_setup')) 
	{
		function studentlaptop_setup()
		{
			// MAKE THE THEME AVAILABLE FOR TRANSLATION
			$lang_dir = THEMEROOT . '/assets/language';
			load_theme_textdomain( 'studentlaptop', $lang_dir );

			// ADD SUPPORT FOR AUTOMATIC FEED LINKS
			add_theme_support( 'automatic_feed_links' );

			// ADD SUPPORT FOR POST THUMBNAIL
			add_theme_support( 'post-thumbnails' );

			// ADD SUPPORT FOR POST FORMAT
			add_theme_support( 'post-formats', [
				'video', 'gallery', 'audio', 'quote', 'image', 'link'
			]);

			// REGISTER NAVIGATION MENU
			register_nav_menus( [
				'top-menu' => __( 'Top Menu', 'studentlaptop' ) ,
				'footer-menu' => __( 'Footer Menu')
			] );
		}

		add_action( 'after_setup_theme', 'studentlaptop_setup' );
	}

/*----------  4.0 DISPLAY POST META INFORMATION.  ----------*/
	if ( ! function_exists( 'studentlaptop_post_meta' ))
	{
		function studentlaptop_post_meta(){
			
			echo "<div class='large-post-meta'>";
				if ( get_post_type() === 'post') 
				{
					// IF THE POST IS STICKY, MARK IT
					if ( is_sticky() ) {
						echo '<span><i class="fa fa-sticky-note-o"></i> ' . __( 'Sticky', 'studentlaptop') . '</span>';
						echo '<small class="hidden-xs">&#124;</small>';
					}
					// GET THE DATE
					echo '<span><i class="fa fa-clock-o"></i> ' . get_the_date() .  '</span>';
					echo '<small class="hidden-xs">&#124;</small>';
					
					// GET THE POST AUTHOR
					printf(
						'<span><i class="fa fa-user"></i> <a href="%1$s">%2$s</a></span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))),
						get_the_author()
					);
					echo '<small class="hidden-xs">&#124;</small>';
				
					// GET THE TAGS
					$tag_list = get_the_tag_list( '', ', ' );
					if ($tag_list) {
						echo '<span><i class="fa fa-tags"></i> ' . $tag_list . '</span>';
						echo '<small class="hidden-xs">&#124;</small>';
					}

					// COMMENTS LINK
					if ( comments_open() ) 
					{
						echo '<span class="hidden-xs"><i class="fa fa-comments-o"></i> '; 
							comments_popup_link( 
								__( 'Leave a comment', 'studentlaptop' ), 
								__( 'One Comment', 'studentlaptop'), 
								__( 'View all % comment', 'studentlaptop') 
							);
						echo '</span>';	
						echo '<small class="hidden-xs">&#124;</small>';
					}
					
					// EDIT LINK
					if ( is_user_logged_in() ) 
					{
						echo '<span><i class="fa fa-pencil"></i> ';
							edit_post_link( __( 'Edit', 'studentlaptop'), '<span>', '</span>' ); 
						echo '</span>';
					}
				}
			echo "</div>";	
		}
	}

/*----------  5.0 NUMBERED PAGINATION.  ----------*/
	if ( ! function_exists( 'studentlaptop_numbered_pagination' )) {
		function studentlaptop_numbered_pagination()
		{
			$args = [
				'prev_next' => false,
				'type' => 'array'
			];
			echo '<div class="pagination-wrapper">';
			$paginates = paginate_links( $args );
			if ( is_array( $paginates )) {
				echo '<nav><ul class="pagination">';
				foreach ($paginates as $paginate) {
					if ( strpos($paginate, 'current' )) 
						echo '<li><a href="#">' . $paginate . '</a></li>';
					else
						echo '<li>' . $paginate . '</li>';
				}
				echo '</ul></nav>';
			}
			echo '</div>';
		}
	}

/*----------  6.0 DISPLAY NAVIGATION TO THE NEXT/PREVIOUS SET OF POSTS.  ----------*/
	if ( ! function_exists( 'studentlaptop_paging_nav' )) {
		function studentlaptop_paging_nav(){
			echo '<ul>';
				if ( get_previous_posts_link() ) {
					echo '<li class="next">';
						previous_posts_link( __( 'Newer Posts &rarr;', 'studentlaptop' ) );
					echo '</li>';
				}
				if ( get_next_posts_link() ) {
					echo '<li class="previous">';
						next_posts_link( __( '&larr; Older Posts', 'studentlaptop' ) );
					echo '</li>';
				}
			echo '</ul>';
		}
	}
/*----------  7.0 REGISTER WIDGET AREAS .  ----------*/

	if ( ! function_exists( 'studentlaptop_widget_init' )) {
		function studentlaptop_widget_init()
		{
			$args = [
				'name'          => __( 'Footer One', 'studentlaptop' ),
				'id'            => 'footer-one',
				'description'   => __( 'Appears in footer col one'),
			    'class'         => '',
				'before_widget' => '<ul class="check">',
				'after_widget'  => '</ul>',
				'before_title'  => '<div class="widget-title"><h4>',
				'after_title'   => '</h4><hr></div>' 
			];

			register_sidebar( $args );

			$args = [
				'name'          => __( 'Footer Two', 'studentlaptop' ),
				'id'            => 'footer-two',
				'description'   => __( 'Appears in footer col two'),
			    'class'         => '',
				'before_widget' => '<ul class="check">',
				'after_widget'  => '</ul>',
				'before_title'  => '<div class="widget-title"><h4>',
				'after_title'   => '</h4><hr></div>' 
			];
			
			register_sidebar( $args );

		}
		add_action( 'widgets_init', 'studentlaptop_widget_init' );
	}

/*----------  WORDPRESS ADMIN PANEL CUSTOMIZATION  ----------*/

	function edit_wp_menu()
	{
		// remove menu
		// https://developer.wordpress.org/reference/functions/remove_menu_page/ 
		remove_menu_page( 'edit-comments.php' );

		// add menu
		// https://developer.wordpress.org/reference/functions/add_menu_page/
		add_menu_page( 
			'New Comments', 
			'Laptop Comments', 
			'manage_options', 
			'edit-comments.php', 
			'', 
			'', 
			6 
		);

		// Chagne the menu order
		// https://codex.wordpress.org/Function_Reference/remove_menu_page
		function change_menu_order( $menu_order )
		{
			return [
				'index.php',
				'themes.php',
				'edit.php',
				'edit.php?post_type=page',
				'upload'
			];
		}
		add_filter( 'menu_order', 'change_menu_order' );
		add_filter( 'custom_menu_order', '__return_true' );
		
		// rename posts to laptop | your any brand name

		global $menu;
		global $submenu;
		// print_r($submenu);
		$menu[5][0] = 'Laptops';
		$submenu['edit.php'][5][0] = 'All Laptops';
		$submenu['edit.php'][10][0] = 'Add new Laptop';
		$submenu['edit.php'][15][0] = 'Brands';
		$submenu['edit.php'][16][0] = 'Laptop Tags';
	}
	// Rename posts to laptop | your any brand name into post section.
	function change_post_labels()
	{
		global $wp_post_types;		
		// print_r($wp_post_types);
		$labels = $wp_post_types['post']->labels;
		$labels->name = 'Laptops';
        $labels->singular_name = 'Laptop';
        $labels->add_new = 'Add New Laptop';
        $labels->add_new_item = 'Add New Laptop';
        $labels->edit_item = 'Edit Laptop';
        $labels->new_item = 'New Laptop';
        $labels->view_item = 'View Laptop';
        $labels->view_items = 'View Laptops';
        $labels->search_items = 'Search Laptops';
        $labels->not_found = 'No Laptops found.';
        $labels->not_found_in_trash = 'No Laptops found in Trash.';
        $labels->all_items = 'All Laptops';
        $labels->archives = 'Laptop Archives';
        $labels->attributes = 'Laptop Attributes';
        $labels->insert_into_item = 'Insert into Laptop';
        $labels->uploaded_to_this_item = 'Uploaded to this Laptop';
        $labels->filter_items_list = 'Filter Laptops list';
        $labels->items_list_navigation = 'Laptops list navigation';
        $labels->items_list = 'Laptops list';
        $labels->menu_name = 'Laptops';
        $labels->name_admin_bar = 'Laptop';
	}
	add_action( 'init', 'change_post_labels' );
	add_action( 'admin_menu', 'edit_wp_menu' );

/*----------  THE DASHBOARD  ----------*/
	function customize_dashboard()
	{
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		wp_add_dashboard_widget( 
			'date_dashboard_widget', 
			'Today', 
			'date_dashboard_widget_function' 
		);

		function date_dashboard_widget_function()
		{
			echo "Hi, today is " . date( 'l\, F jS Y');
		}

	}	
	add_action( 'wp_dashboard_setup', 'customize_dashboard' );

/*----------   THE COLUMNS.  ----------*/
	function customize_post_listing_cols( $columns )
	{
		unset($columns['tags']);
		unset($columns['comments']);
		return $columns;
	}
	function customize_page_listing_cols( $columns )
	{
		unset($columns['tags']);
		unset($columns['comments']);
		return $columns;
	}
	add_action( 'manage_posts_columns', 'customize_post_listing_cols' );
	add_action( 'manage_pages_columns', 'customize_page_listing_cols' );

/*----------   THE SMALLER CHANGES.  ----------*/
	function change_admin_footer()
	{
		echo "Copyrights 2019 &copy; All rights reserved - By Students of Al-Fateem Academy";
	}
	add_action( 'admin_footer_text', 'change_admin_footer' );

	function remove_footer_version()
	{
		remove_filter( 'update_footer', 'core_update_footer' );
	}

	add_action( 'admin_menu', 'remove_footer_version' );

	function add_color_schemes()
	{
		$dir = THEMEROOT;
		wp_admin_css_color( 
			'studentlaptop', 
			__( 'Student Laptop Color', 'studentlaptop' ), 
			$dir . '/assets/css/colors.min.css', 
			['#336699', '#996633', '#335577', '#115599'] 
		);
	}

	add_action( 'admin_init', 'add_color_schemes' );

	function change_login_logo(){ ?>
			<style>
				#login h1 a{
					background-image: url(<?php echo IMAGES ?>/logo.png);
					height:65px;
					width:320px;
					background-size: 320px 65px;
					background-repeat: no-repeat;
					padding-bottom: 30px;
				}
			</style>
	<?php
		}
		add_action( 'login_enqueue_scripts', 'change_login_logo' );

	function change_login_logo_url()
	{
		return home_url();
	}
	
	add_filter( 'login_headerurl', 'change_login_logo_url' );

	function change_login_stylesheet()
	{
		// https://codex.wordpress.org/Customizing_the_Login_Form
		wp_enqueue_style( 'custom-login', STYLES . '/custom-login.css' );
		wp_enqueue_script( 'custom-login', SCRIPTS . '/custom-login.js' );
	}
	add_action( 'login_enqueue_scripts', 'change_login_stylesheet' );

	function disable_reset_password()
	{
		return false;
	}
	add_filter( 'allow_password_reset', 'disable_reset_password' );

	function remove_shake()
	{
		remove_action( 'login_head', 'wp_shake_js', 12 );
	}
	add_action( 'login_head', 'remove_shake' );

	function remove_admin_bar_links()
	{
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

	function add_admin_bar_links()
	{
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( [
			'id' => 'alfateemacademy',
			'title' => 'Al-Fateem Academy',
			'href' => 'alfateemacademy.com',
			'meta' => ['target' => '_blank']
		]);
	}
		add_action( 'admin_bar_menu', 'add_admin_bar_links' );

	function admin_bar_css()
	{ ?>
		<style>
			#wpadminbar{ background-color: red; }
		</style>

	<?php }

	add_action( 'admin_head', 'admin_bar_css' );
 ?>