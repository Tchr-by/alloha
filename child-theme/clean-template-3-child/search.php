<?php


get_header(); ?>
    <section>
        <div class="container">
            <div class="row">
                 <h2><?php printf('Поиск по строке: %s', get_search_query()); ?></h2>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop'); ?>
                    <?php endwhile;
                    else: echo '<p>Записи Отсутствуют</p>'; endif; ?>
                    <?php pagination(); ?>

                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>