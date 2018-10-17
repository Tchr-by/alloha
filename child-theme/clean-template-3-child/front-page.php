<?php

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <h2>ЭТО ШАБЛОН front-page.php</h2>

             <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><a href=<?php the_permalink()?>><?php the_title(); ?></a></h2>
                <h3><?php the_content();?></h3>
                <h5><?php the_author_posts_link(); ?></h5>
            </article>

            <?php endwhile; ?>

        </main>

    </div>

<?php get_footer();
