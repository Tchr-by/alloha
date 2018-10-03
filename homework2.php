<?php

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
?>