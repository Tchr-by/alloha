<?php

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <h2>ЭТО ШАБЛОН home.php который теперь кроме записей выводит и ПРОЕКТЫ!</h2>

            <?php
            $my_posts = get_posts( array(
                'numberposts' => -1,
                'post_type' => array( 'post' , 'projects' ),
                'orderby' => 'title',
            ) ); // вывод всех записай и проектов с сортировкой по названию
            foreach ($my_posts as $post){
                setup_postdata($post); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p> <?php
                }

                wp_reset_postdata(); ?>

        </main>

    </div>

<?php get_footer();