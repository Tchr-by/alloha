<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 17.10.2018
 * Time: 14:46
 */

add_filter( 'template_include', 'projects_page_template', 99 );
function projects_page_template( $template ) {
    if( is_page('projects')  ){
        if ( $new_template = locate_template( array( 'single-projects.php' ) ) )
            $template = $new_template ;
    }

    return $template;
}