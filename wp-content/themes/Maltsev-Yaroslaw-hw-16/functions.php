<?php
	add_theme_support( 'post-thumbnails' );
	add_filter('show_admin_bar', '__return_false');

	define('LESSON_THEME_ROOT',	get_template_directory_uri());
	define('LESSON_CSS_DIR', LESSON_THEME_ROOT . '/app/css');
	define('LESSON_JS_DIR', LESSON_THEME_ROOT . '/app/js');
	define('LESSON_IMG_DIR', LESSON_THEME_ROOT . '/app/img');

	add_action( 'wp_enqueue_scripts', function() {
		// wp_enqueue_style('reset', LESSON_CSS_DIR . '/reset.css');
		// wp_enqueue_style( 'theme', get_stylesheet_uri() );
		wp_enqueue_style('main', LESSON_CSS_DIR . '/main.css', array(), filemtime( get_theme_file_path('app/css/main.css')) );
		wp_enqueue_style( 'theme', get_stylesheet_uri());

		/*wp_deregister_script('jquery');
		wp_enqueue_script('jquery', LESSON_JS_DIR . '/jquery.js');
		wp_enqueue_script('main', LESSON_JS_DIR . '/common.js');*/
		wp_enqueue_script( 'commom', get_template_directory_uri() . '/app/js/common.js', array(), filemtime( get_theme_file_path('app/js/common.js')), true );
	});


//-----------------------------MENU------------------------------------------------------------------------------------------------------------------------
	add_action('after_setup_theme', function() {
		add_theme_support('menus');
		// register_nav_menu( 'header-menu', 'High place' ); - Just one
		register_nav_menus([ // One and more
			'header-menu' => 'High place'
		]);
	});

//Change main parameters menus
	add_filter('wp_nav_menu_args', 'filter_wp_menu_args');
	function filter_wp_menu_args($args) {
		if ($args['theme_location'] === 'header-menu') {
			$args['container'] = false;
			$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
			$args['menu_class'] = 'menu-list';
			$args['depth'] = 0;

			return $args;
		}
	};


// Change id and classes in <li>
	add_filter('nav_menu_item_id', 'filter_menu_item_css_id', 10, 4);
	function filter_menu_item_css_id($menu_id, $item, $args, $depth) {
		return $args->theme_location === 'header-menu' ? '' : $menu_id;
	};

	add_filter('nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4);
	function filter_nav_menu_css_classes($classes, $item, $args, $depth) {
		if ($args->theme_location === 'header-menu') {
			if ($depth == 1) {
				$classes = [
					'submenu-list__item',
					'menu-list__item-lvl-' . ($depth + 1)
				];
			}
			else if ($depth > 1) {
				$classes = [
					'submenu--right__item',
					'menu-list__item-lvl-' . ($depth + 1)
				];
			}
			else {
				$classes = [
					'menu-list__item',
					'menu-list__item-lvl-' . ($depth + 1)
				];
			};
			if ($item->current) {
				$classes[] = 'menu-list__item--active';
			};

			return $classes;
		}
	};
// Change class <ul> in <li>
	add_filter('nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 4);
	function filter_nav_menu_submenu_css_class($classes, $args, $depth) {
		if ($args->theme_location === 'header-menu') {
			// $classes = [
			// 	'submenu',
			// 	'submenu-list'
			// ];
			if ($depth == 0) {
				$classes = [
					'submenu',
					'submenu-list',
					'depth - ' . $depth
				];				
			}
			else if ($depth > 0){
				$classes = [
					'submenu--right',
					'depth - ' . $depth
				];					
			}
			else {
				$classes = [
					'submenu',
					'submenu-list',
					'depth - ' . $depth
				];
			};

			return $classes;
		}
	};
// Change links attr
	add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
	function filter_nav_menu_link_attributes($atts, $item, $args, $depth) {
		if ($args->theme_location === 'header-menu') {
			$atts['class'] = 'menu-link';

			if ($item->current) {
				$atts['class'] .= ' menu-link--active';
			}

			return $atts;
		}
	};

	//----------------------Post Type----------------------

	add_action( 'init', 'register_post_types' );
	function register_post_types(){
		add_theme_support('post-thumbnails');
		register_post_type('slider', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Slider', // основное название для типа записи
				'singular_name'      => 'Slider', // название для одной записи этого типа
				'add_new'            => 'Добавить информацию', // для добавления новой записи
				'add_new_item'       => 'Добавление информации', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование информации', // для редактирования типа записи
				'new_item'           => 'Новое информация', // текст новой записи
				'view_item'          => 'Смотреть информацию', // для просмотра записи этого типа.
				'search_items'       => 'Искать информацию', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'menu_name'          => 'Slider', // название меню
			),
			'description'         => '',
			'public'              => true,
			'show_ui'             => null, // зависит от public
			'menu_position'       => null,
			'menu_icon'           => null, 
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		) );
		function getSlider() {
			$args = array(
				'orderby' => 'date',
				'order' => 'ASC',
				'post_type' => 'slider',
			);

			$sliderArr = [];

			foreach(get_posts($args) as $post){
				$slider = get_fields($post->ID);
				$slider['name'] = $post->post_title;
				$slider['img'] = get_the_post_thumbnail_url( $post->ID, 'full' );
				$sliderArr[] = $slider;
			};
			return $sliderArr;
		};

		register_post_type('add_post', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'post', // основное название для типа записи
			'singular_name'      => 'post', // название для одной записи этого типа
			'add_new'            => 'Добавить post', // для добавления новой записи
			'add_new_item'       => 'Добавление post`a', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование post`a', // для редактирования типа записи
			'new_item'           => 'Новое post', // текст новой записи
			'view_item'          => 'Смотреть post', // для просмотра записи этого типа.
			'search_items'       => 'Искать post', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Add Post', // название меню
		),
		'description'         => '',
		'public'              => true,
		'show_ui'             => null, // зависит от public
		'menu_position'       => null,
		'menu_icon'           => null, 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	) );			

		register_post_type('add_news', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'news', // основное название для типа записи
			'singular_name'      => 'news', // название для одной записи этого типа
			'add_new'            => 'Добавить news', // для добавления новой записи
			'add_new_item'       => 'Добавление news`a', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование news`a', // для редактирования типа записи
			'new_item'           => 'Новое news', // текст новой записи
			'view_item'          => 'Смотреть news', // для просмотра записи этого типа.
			'search_items'       => 'Искать news', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Add News', // название меню
		),
		'description'         => '',
		'public'              => true,
		'show_ui'             => null, // зависит от public
		'menu_position'       => null,
		'menu_icon'           => null, 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	) );
		register_post_type('add_twite', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'twite', // основное название для типа записи
			'singular_name'      => 'twite', // название для одной записи этого типа
			'add_new'            => 'Добавить twite', // для добавления новой записи
			'add_new_item'       => 'Добавление twite`a', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование twite`a', // для редактирования типа записи
			'new_item'           => 'Новое twite', // текст новой записи
			'view_item'          => 'Смотреть twite', // для просмотра записи этого типа.
			'search_items'       => 'Искать twite', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Add Twite', // название меню
		),
		'description'         => '',
		'public'              => true,
		'show_ui'             => null, // зависит от public
		'menu_position'       => null,
		'menu_icon'           => null, 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	) );			
	};
	function getTwite() {
		$args = array(
			'orderby'     => 'date',
			'order'       => 'ASC',
			'post_type'   => 'add_twite'
		);

		return get_posts($args);
	};
	function getNews() {
		$args = array(
			'orderby'     => 'date',
			'order'       => 'ASC',
			'post_type'   => 'add_news'
		);

		return get_posts($args);
	};
	function getPostsInfo() {
		$args = array(
			'orderby'     => 'date',
			'order'       => 'ASC',
			'post_type'   => 'add_post'
		);

		return get_posts($args);
	};


	/**
	 * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
	 *
	 * @param string/array $args Параметры.
	 *
	 * @return string HTML
	 *
	 * @ver 2.6.3
	 */
	function kama_excerpt( $args = '' ){
		global $post;

		if( is_string($args) )
			parse_str( $args, $args );

		$rg = (object) array_merge( array(
			'maxchar'   => 350,   // Макс. количество символов.
			'text'      => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
								  // Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется все до <!--more--> вместе с HTML.
			'autop'     => true,  // Заменить переносы строк на <p> и <br> или нет?
			'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
			'more_text' => 'Читать дальше...', // Текст ссылки `Читать дальше`.
		), $args );

		$rg = apply_filters( 'kama_excerpt_args', $rg );

		if( ! $rg->text )
			$rg->text = $post->post_excerpt ?: $post->post_content;

		$text = $rg->text;
		$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text ); // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
		$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text ); // убираем шоткоды: [singlepic id=3]. Учитывает markdown
		$text = trim( $text );

		// <!--more-->
		if( strpos( $text, '<!--more-->') ){
			/*preg_match('/(.*)<!--more-->/s', $text, $mm );

			$text = trim( $mm[1] );

			$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';*/
		}
		// text, excerpt, content
		else {
			$text = trim( strip_tags($text, $rg->save_tags) );

			// Обрезаем
			if( mb_strlen($text) > $rg->maxchar ){
				$text = mb_substr( $text, 0, $rg->maxchar );
				$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1', $text ); // убираем последнее слово, оно 99% неполное
			}
		}

		// Сохраняем переносы строк. Упрощенный аналог wpautop()
		if( $rg->autop ){
			$text = preg_replace(
				array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
				array('',     '</p><p>',  '', '</p>'),
				$text
			);
		}

		$text = apply_filters( 'kama_excerpt', $text, $rg );

		if( isset($text_append) )
			$text .= $text_append;

		return ( $rg->autop && $text ) ? "$text" : $text;
	}
	/* Сhangelog:
	 * 2.6.3 - Рефакторинг
	 * 2.6.2 - Добавил регулярку для удаления блочных шорткодов вида: [foo]some data[/foo]
	 * 2.6   - Удалил параметр 'save_format' и заменил его на два параметра 'autop' и 'save_tags'.
	 *       - Немного изменил логику кода.
	 */
 ?>