
<?php

get_header(); // header.php ?>

<section>
    <div class="container">
        <div class="row">
            <div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
                 <?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл?>
                 <?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
                <?php endwhile; // конец цикла
                else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>
                <?php pagination(); // пагинация, функция нах-ся в function.php ?>
            </div>
            <?php get_sidebar(); //sidebar.php ?>
        </div>
    </div>
</section>


<?php get_footer(); // footer.php ?>







