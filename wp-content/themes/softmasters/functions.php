<?php

function add_styles() {
    wp_enqueue_style('font-style', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&amp;subset=cyrillic');
    wp_enqueue_style('css_style', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'add_styles' );

function add_scripts() {
    wp_enqueue_script('js', get_stylesheet_directory_uri() .'/js/script.min.js');
}
add_action('wp_enqueue_scripts', 'add_scripts');


add_theme_support( 'post-thumbnails' ); // включаем миниатюры для всех типов постов

/*
 * Включаем поддержку меню
 */
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

/*
 * Включаем поддержку кастомных полей
 */
function true_custom_fields() {
    add_post_type_support( 'post', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}
add_action('init', 'true_custom_fields');

/*
 * Страничка настроек в Админке
 */
$main_options = array(
    // yes, slug is the part of the option name, so, to get the value, use
    // get_option( '{SLUG}_{ID}' );
    // get_option( 'styles_headercolor' );
    'slug'	=>	'main',

    // h2 title on your settings page
    'title' => 'Общие ',

    // this displayed in admin menu, try to make it short
    'menuname' => 'Общие настройки',

    'capability'=>	'manage_options',

    // WordPress option pages consist of sections, so,
    // at first we create an array of sections and add fields in each section
    'sections' => array(

        // first section
        array(

            // section ID isn't used anywhere, but it is required
            'id' => 'contacts',

            // section name is displayed as h2 heading
            'name' => 'Контакты',

            // and only now the array of fields
            'fields' => array(
                array(
                    'id'			=> 'tel',
                    'label'			=> 'Телефон',
                    'type'			=> 'text', // table of types is above
                    'placeholder' 	=> 'Номер телефона'
                ),
                array(
                    'id'			=> 'mail',
                    'label'			=> 'Email',
                    'type'			=> 'text', // table of types is above
                    'placeholder' 	=> 'example@email.ru'
                ),
                array(
                    'id'			=> 'fiz',
                    'label'			=> 'Физический адрес',
                    'type'			=> 'text', // table of types is above
                    'placeholder' 	=> ''
                ),
                array(
                    'id'			=> 'yr',
                    'label'			=> 'Юридический адрес',
                    'type'			=> 'text', // table of types is above
                    'placeholder' 	=> ''
                ),
                array(
                    'id'			=> 'post',
                    'label'			=> 'Почтовый адрес',
                    'type'			=> 'text', // table of types is above
                    'placeholder' 	=> ''
                )
            )
        ),

    )
);
if( class_exists( 'trueOptionspage' ) )
    new trueOptionspage( $main_options );


/*
 * Добавляем тип поста для партнеров
 */
add_action( 'init', 'partners' ); // Использовать функцию только внутри хука init

function partners() {
    $labels = array(
        'name' => 'Партнеры',
        'singular_name' => 'Партнера',
        'add_new' => 'Добавить партнера',
        'add_new_item' => 'Добавить нового партнера',
        'edit_item' => 'Редактировать партнера',
        'new_item' => 'Новый партнер',
        'all_items' => 'Все партнеры',
        'view_item' => 'Просмотр партенров на сайте',
        'search_items' => 'Искать пертнеров',
        'not_found' => 'партнеров не найдено',
        'not_found_in_trash' => 'В корзине нет партнеров.',
        'menu_name' => 'Партнеры'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 5,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type( 'partners', $args);
}

/*
 * Добавляем тип поста для истории компании
 */
add_action( 'init', 'history' ); // Использовать функцию только внутри хука init

function history() {
    $labels = array(
        'name' => 'История Компании',
        'singular_name' => 'Историю',
        'add_new' => 'Добавить историю',
        'add_new_item' => 'Добавить новую историю',
        'edit_item' => 'Редактировать историю',
        'new_item' => 'Новая история',
        'all_items' => 'Все истории',
        'view_item' => 'Просмотр иторий на сайте',
        'search_items' => 'Искать истории',
        'not_found' => 'истории не найдены',
        'not_found_in_trash' => 'В корзине нет историй.',
        'menu_name' => 'История'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-clock',
        'menu_position' => 5,
        'has_archive' => true,
        'taxonomies' => array(
            'years',
        ),
        'supports' => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type( 'history', $args);
}
/*
 * Добавляем таксономию годов для истории компании
 */
function add_new_taxonomies() {
    register_taxonomy('years',
        array('history'),
        array(
            'hierarchical' => false,
            'labels' => array(
                'name' => 'Год',
                'singular_name' => 'Год',
                'search_items' =>  'Найти год',
                'popular_items' => 'Популярные года',
                'all_items' => 'Все года',
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => 'Редактировать год',
                'update_item' => 'Обновить год',
                'add_new_item' => 'Добавить новый год',
                'new_item_name' => 'Ныовый год',
                'add_or_remove_items' => 'Добавить или удалить год',
                'menu_name' => 'Года для истории'
            ),
            'public' => true,
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'show_tagcloud' => true,
            'update_count_callback' => '_update_post_term_count',
            'capabilities'          => array(
                'manage_terms',
                'edit_terms',
                'delete_terms',
                'assign_terms',
            ),
            'meta_box_cb'           => 'post_tags_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
            'show_admin_column'     => true,
        )
    );
}
add_action( 'init', 'add_new_taxonomies', 0 );