<?php

get_header(); ?>


            <h2>ЭТО шаблон  ПРОЕКТОВ!!!</h2>

            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><?php the_title(); ?></h2>
                    <h3><?php the_content(); ?></h3>
                    <h6><?php the_author_posts_link()?> </h6>
                </article>

            <?php endwhile; ?>


<?php get_footer();