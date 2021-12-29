<?php 

/*
Template name: Przykładowa strona
*/


get_header(); ?>

<section class="start start__subpage">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="start--heading"><?php single_post_title(); ?></h1>
                <div class="start--breadcrumbs">
                    <a href="<?= get_home_url() ?>">Start</a>
                    <i class="fas fa-chevron-right"></i>
                    <span><?php single_post_title(); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>


<form method="get" action="<?php bloginfo('url'); ?>">

<fieldset>

<input placeholder="szukaj" type="text" name="s" value="" maxlength="50" required="required" />

<select name="category_name">

<option value="industrynews">Bez kategorii</option>

<option value="webdesign">Web Design</option>

<option value="bluzka">bluzka</option>

<option value="kurtka">kurtka</option>

</select>

<button type="submit">Search</button>

</fieldset>

</form>

<?php get_template_part('custom-search-form'); ?>

<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php dynamic_sidebar('sidebar-1') ?>
            </div>
            <div class="col-8">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : ?>

                        <?php the_post(); ?>

                        <div class="row news--item">
                            <div class="col-lg-4">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-8">
                                <h2><?= get_the_title() ?></h2>

                                <p><?= get_the_excerpt() ?></p>

                                <a href="<?= get_the_permalink(); ?>" class="btn btn-primary">Czytaj więcej <i class="fas fa-arrow-right ml-1 small"></i></a>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <div class="row">
                        <div class="col">
                            <nav>
                                <ul class="pagination pagination-lg justify-content-center">
                                    <?php

                                    echo paginate_links([
                                        'base' => str_replace(999999, '%#%', esc_url(get_pagenum_link(999999))),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, get_query_var('paged')),
                                        'total' => $wp_query->max_num_pages
                                    ])

                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>

                <?php else : ?>

                    <div>Brak wpisów do wyświetlenia</div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>







<?php get_footer(); ?>