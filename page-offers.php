<?php
/*
Template name: Oferty
*/
get_header();

$category='coats';
$price_min=0;
$price_max=100;
$searched= (isset($_GET['search'])) ? $_GET['search'] : '';
$acf_criteria=[
    'relation'=>'AND',
    [
    'key'=>'price',
    'value'=>$price_max,
    'compare'=>'<=',
    'type'=>'NUMERIC'
    ],
    [
    'key'=>'price',
    'value'=>$price_min,
    'compare'=>'>=',
    'type'=>'NUMERIC'
    ],
    'by_price'=>['key'=>'price'],
];
$query = new WP_Query([
    's'=>$searched,
    'post_type'=>'offers',
    'post_status'=>'publish',
    'meta_query'=>$acf_criteria,
    'tax_query'=> [
        [
            'taxonomy'=>'offer_categories',
            'field'=>'slug',
            'terms'=>$category
        ]
        ],
    'orderby'=>[
        'by_price'=>'DESC',
        'title'=>'DESC',
        'date'=>'DESC'
    ],
    'posts_per_page' => 20,
    'paged' => get_query_var('paged'),
]);
?>
<?php if( $query->have_posts() ) : ?>
    <div class="offer-container">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <div class="offer-pic" style="background-image: url(<?=get_field('picture')?>)"></div>
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                <span class="size">rozm. <?=get_field('size')?></span>
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;?>
                </div>
<div class="pagination">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'format'       => '?paged=%#%',
            'end_size'     => 2,
            'mid_size'     => 4,
            'prev_next'    => true,
        ) );
    ?>
</div>
<?php else : ?>
   <h1>Brak ogłoszeń do wyświetlenia</h1>
<?php endif;?>
<?php
wp_reset_postdata();
get_footer();
?>