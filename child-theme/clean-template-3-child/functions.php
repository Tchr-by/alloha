<?php

add_action( 'init' , 'qa_forte_register_post_type' );



function qa_forte_register_post_type() {
    $labels = array(
            'name' => 'Проекты',
            'single_name' => 'Проект',
            'add_new' => 'Добавить проект',
            'add_new_item' => 'Добавить новый проект',
            'edit_item' => 'Редактировать проект',
            'new_item' => 'Новый проект',
            'all_items' =>'Все проекты',
            'search_items' => 'Поиск проектов',
            'not_found'=>'Не найдены проекты',
            'not_found_in_trash' => 'Не найдено в корзине',
            'menu_name'=>'Проекты',
    );


    $args = array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'has_archive' => true,
            'menu_icon'=> 'dashicons-welcome-learn-more',
            'menu_position' => 20,
            'supports' =>array(
                 'title', 'editor', 'author', 'thumbnail'
            ),

    );
    register_post_type('projects', $args );
}



add_filter( 'post_update_messages', 'qa_forte_post_update_messages' );

function qa_forte_post_update_messages( $messsages ) {
    global $post, $post_ID;

    $messsages['projects']= array(
            0 => '',
            1 => sprintf('Проект обновлен. <a href ="%s">Просмотр</a>', get_permalink( $post_ID ) ),
            2 => 'Поле обновлено',
            3 => 'Поле удалено',
            4 => 'Проект обновлен',
            5 => isset($_GET['revision']) ? sprintf( 'Проект восстановлен из ревизии : %s', wp_post_revision_title( (int) $_GET( 'revision' ) )) :false,
            6 => sprintf( 'Проект опубликован <a href ="%s">Просмотр</a>', get_permalink( $post_ID ) ),
            7 => 'Проект сохранен',
            8 => sprintf( 'Проект готов к проверке <a href ="%s" target="_blank" >Просмотр</a>', esc_url( add_query_arg( 'preview', 'true' ), get_permalink( $post_ID ) ) ),
            9 => sprintf( 'Запланированно на публикацию : <strong>%1$s</strong> <a href ="%2$s" target="_blank">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ),get_permalink( $post_ID ) ),
            10 =>sprintf( 'Черновик обновлен <a href ="%s" target="_blank" >Просмотр</a>', esc_url( add_query_arg( 'preview', 'true' ), get_permalink( $post_ID ) ) ),
        );
    return $messsages;
}





add_action( 'init', 'db_company_register_post_type' );

function db_company_register_post_type() {
    $label = array(
        'name'               => 'Компании',
        'singular_name'      => 'Компания',
        'add_new'            => 'Добавить новую компанию',
        'add_new_item'       => 'Добавить компанию',
        'edit_item'          => 'Редактировать компанию',
        'new_item'           => 'Новая компания',
        'view_item'          => 'Просмотреть компанию',
        'view_items'         => 'Просмотреть компании',
        'search_items'       => 'Поиск компании',
        'not_found'          => 'Компании не найдены',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon'  => 'Родители компании',
        'all_items'          => 'Все компании',
        'attributes'         => 'Атрибуты',
        'menu_name'          => 'Компании'
    );


    $arg = array(
        'labels'              => $label,
        'public'              => true,
        'publicly_queryable'  => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-multisite',
        'hierarchical'        => true,
        'delete_with_user'    => true,
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'comments',
            'excerpt',
            'revision',
            'page-attributes',
            'post-formats'
        )
    );
    register_post_type( 'company', $arg );
}
function db_company_post_type_help_tab() {

    $screen = get_current_screen();

    if ( 'company' != $screen->post_type )
        return;

    $args = array(
        'id'      => 'tab_1',
        'title'   => 'Overview',
        'content' => '<h3>Overview</h3><p>Помощь на первой вкладке.</p>'
    );

    $screen->add_help_tab( $args );

    $args = array(
        'id'      => 'tab_2',
        'title'   => 'Available actions',
        'content' => '<h3>Available actions &laquo;' . $screen->post_type . '&raquo;</h3><p>Second tab content</p>'
    );

    $screen->add_help_tab( $args );

    $args = array(
        'id'      => 'tab_3',
        'title'   => 'Content',
        'content' => '<h3>Если чего то не найдете</h3><p>Значит мы это еще не проходили)</p>'
    );

    $screen->add_help_tab( $args );

}

add_action( 'admin_head', 'db_company_post_type_help_tab' );

add_filter( 'post_update_messages', 'db_company_post_update_messages' );

function db_company_post_update_messages( $messsages ) {
    global $post, $post_ID;

    $messsages['company'] = array(
        0  => '',
        1  => 'Компании обновлены',
        2  => 'Компания обновлена',
        3  => 'Компания удалена',
        4  => 'Компании обновлены',
        5  => isset( $_GET['revision'] ) ? sprintf( 'Компания восстановлена из ревизии : %s', wp_post_revision_title( (int) $_GET[ 'revision' ], false )) : false,
        6  => 'Компания опубликована',
        7  => 'Компания сохранена',
        8  => 'Компания отправлена',
        9  => sprintf( 'Запланированно на публикацию : <strong>%1$s</strong>. <a href ="%2$s" target="_blank">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ),get_permalink( $post_ID ) ),
        10 => 'Черновик обновлен'
    );

    return $messsages;
}


add_action( 'init', 'db_company_field_activity_taxonomy' );

function db_company_field_activity_taxonomy() {

    $labels = array(
        'name'                       => 'Области деятельности',
        'singular_name'              => 'Область деятельности',
        'search_items'               => 'Поиск области',
        'popular_items'              => 'Популярные области',
        'all_items'                  => 'Все обалсти деятельности',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Редактировать область',
        'update_item'                => 'Изменить область',
        'add_new_item'               => 'Добавить новую область',
        'new_item_name'              => 'Добавить новое название области деятельности',
        'separate_items_with_commas' => 'Разделить темы запятой',
        'add_or_remove_items'        => 'Добавить или удалить области',
        'choose_from_most_used'      => 'Выбрать из самых популярных областей',
        'menu_name'                  => 'Области деятельности',
        'not_found'                  => 'Не найдено областей деятельности'
    );

    register_taxonomy( 'field_activity', 'company', array(
        'hierarchical'             => true,
        'labels'                   => $labels,
        'show_ui'                  => true,
        'show_tagcloud'            => false,
        'show_admin_column'        => true,
        'rewrite' => array( 'slug' => 'field_activity' ),
    ));
}

