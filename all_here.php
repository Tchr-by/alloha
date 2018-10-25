<?php 
/*
Template Name: all_here
*/
?>

<?php get_header(); ?>


           <?php
            $first_wp_query = new WP_Query( 'post_per_page=-1&category__not_in=5');
            if ( $first_wp_query->have_posts()) : while ( $first_wp_query->have_posts() ) : $first_wp_query->the_post();?>

            <p> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> <?php echo the_ID() . " / " . the_category_ID() ;  //для проверки ID поста и ID рубрики  ?>  </p>
            <?php endwhile; echo ("Конец первого цикла WP_Query "); // просто вывод фразы которая следует после окончания цикла вывода?>

            <?php endif; ?>
                   
            <?php wp_reset_postdata(); ?>



            <?php $second_wp_query = new WP_Query(array( 'category__and' => array( 5, 7 ) ) ); //убил 2 часа на то чтобы понять что нельзя передать массив как query запрос не вводя новых переменных(одной строкой как в первом цикле)
            if ( $second_wp_query->have_posts()) : while ( $second_wp_query->have_posts() ) : $second_wp_query->the_post();?>

            <p> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>  <?php echo the_ID() . " / " . the_category_ID() ; //для проверки ID поста и ID рубрики ?> </p>
            <?php endwhile; echo ("Конец второго цикла WP_Query "); ?>

            <?php endif; ?>
                   
            <?php wp_reset_postdata(); ?>



            <?php
            $first_gp = get_posts( array(
            'tag'         =>3,7,14,
            'numberposts' => -1,
            'post_type'   => 'post',
            'suppress_filters' => true,
            ) );

            foreach( $first_gp as $post ){
            setup_postdata( $post ); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php

            };
            echo ("Конец первого цикла get_posts ");
            wp_reset_postdata(); ?>


            <?php
            $second_gp = get_posts( array(
                'exclude'     =>3,8,9,
                'numberposts' => -1,
                'post_type'   => 'page',
                'suppress_filters' => true,
            ) );

            foreach( $second_gp as $post ){
                setup_postdata( $post ); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php

            };
            echo ("Конец второго цикла get_posts ");
            wp_reset_postdata(); ?>

            <?php
            $third_gp = get_posts( array(
            'category'    =>13,
            'numberposts' => -1,
            'post_type'   => 'projects',
            'suppress_filters' => true,
            ) );

            foreach( $third_gp as $post ){
                setup_postdata( $post ); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php

            };
            echo ("Конец третьего цикла get_posts ");
            wp_reset_postdata(); ?>



            <?php
            $fourth_gp = get_posts( array(
                'numberposts' => -1,
                'post_type'   => array('projects','page','post'),
                'post_status' => 'draft',
                'suppress_filters' => true,
            ) );

            foreach( $fourth_gp as $post ){
                setup_postdata( $post ); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php

            };
            echo ("Конец четвертого цикла get_posts ");
            wp_reset_postdata(); ?>



<?php get_footer();