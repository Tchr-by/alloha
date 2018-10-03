<?php


add_action( 'init', 'qa_forte_register_post_type' );
function qa_forte_register_post_type() {
    $labels = array(
        'name' => 'Проекты',
        'singular_name' => 'Проект',
        'add_new' => 'Добавить проект',
        'add_new_item' => 'Добавить новый проект',
        'edit_item' => 'Редактировать проект',
        'new_item' => 'Новый проект',
        'all_items' => 'Все проекты',
        'search_items' => 'Поиск проектов',
        'not_found' => 'Проекты не найдены',
        'not_found_in_trash' => 'Проекты не найдены в корзине',
        'menu_name' => 'Проекты',
    );
    

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'menu_icon' => '',
        'menu_position' => 20,
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail'
        ),
    );
    register_post_type( 'projects', $args );
}

add_filter( 'post_updated_messages', 'qa_forte_post_updated_messages' );

function qa_forte_post_updated_messages( $messages ) {
    global $post, $post_ID;

    $messages['projects'] = array(
        0 => '',
        1 => sprintf('Проект обновлен. <a href="%s">Просмотр</a>', get_permalink( $post_ID ) ),
        2 => 'Поле обновлено',
        3 => 'Поле удаленоэ',
        4 => 'Проект обновлен',
        5 => isset($_GET['revision']) ? sprintf('Проект восстановлен из ревизии: %s', wp_post_revision_title( (int) $_GET['revision'] )) : false,
        6 => sprintf( 'Проект опубликованю <a href="%s">Просмотр</a>', get_permalink( $post_ID ) ),
        7 => 'Проект сохранен',
        8 => sprintf( 'Проект готов к проверке <a href="%s" target="_blank">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true' ), get_permalink( $post_ID ) ) ),
        9 => sprintf( 'Запланировано на публикацию: <strong>%1$s</strong> <a href="%2$s" target="_blank">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i'  ), strtotime( $post->post_date ) ), get_permalink( $post_ID ) ),
        10 => sprintf( 'Черновик обновлен <a href="%s" target="_blank">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true' ), get_permalink( $post_ID ) ) ),
    );

    return $messages;
}