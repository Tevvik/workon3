<?php
/*
Template name: Oferty
*/
get_header();
$query = new WP_Query([
    's'=> isset($_GET['search']) ? $_GET['search'] : '',
    'post_type'=>'offers',
    'post_status'=>'publish',
    'meta_query'=>[
        'relation'=>'AND',
        isset($_GET['max'])&&($_GET['max']) ?
        [
        'key'=>'price',
        'value'=>$_GET['max'],
        'compare'=>'<=',
        'type'=>'NUMERIC'
        ] : null,
        [
        'key'=>'price',
        'value'=>(isset($_GET['min'])) ? $_GET['min'] : 0,
        'compare'=>'>=',
        'type'=>'NUMERIC'
        ],
        'by_price'=>['key'=>'price', 'type'=>'NUMERIC'],
    ],
    'orderby'=> !empty($_GET['sort'])?($_GET['sort']=='date_asc'? ['date'=>'ASC']: ($_GET['sort']=='title_desc'? ['title'=>'DESC']: ($_GET['sort']=='title_asc'? ['title'=>'ASC']: ($_GET['sort']=='price_asc'? ['by_price'=>'ASC']: ($_GET['sort']=='price_desc'? ['by_price'=>'DESC'] : ['date'=>'DESC']))))):null,
    'tax_query'=> 
    [   
        'relationship'=>'AND',
        isset($_GET['category']) ? 
        [
        'taxonomy'=>'offers',
        'field'=>'id',
        'terms'=>$_GET['category']
        ] : null, 
        isset($_GET['sizes']) ?
        [
            'taxonomy'	=> 'filter_sizes',
			'field'	  	=> 'id',
			'terms' 	=> $_GET['sizes'],
        ] : null,
        ],
    'posts_per_page' => 20,
    'paged' => get_query_var('paged'),
]);
?>
<style>
    @media (min-width: 1000px){
        form.options{
            display: flex;
            position: static;
            min-width: 20%;
            width: 20rem;
            height: auto;
        }
        form.options .categories.expand .categories--sub label{
            width: calc(50% - 0.5rem);
        }
        form.options .head{
            display: none;
        }
        .offer-container{
            width: calc(100% - 20rem);
            max-width: 80%;
        }
        header,footer{
            width:100%;
        }
        body{
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
        }
    }
</style>
<?php if( $query->have_posts() ) : ?>
    <div class="offer-container">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <img class="offer-pic" src="<?=get_field('thumbnail')?>">
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                <span class="size">rozm. <?=get_field('size')->name?></span>
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;?>
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
                </div>
<?php else : ?>
   <h1>Brak ogłoszeń do wyświetlenia</h1>
<?php endif;?>
<?php
wp_reset_postdata();
wp_reset_query();
get_footer();
?>