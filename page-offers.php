<?php
/*
Template name: Oferty
*/
get_header();
$tax_criteria = [
    [
        'taxonomy'=>'offer_categories',
        'field'=>'slug',
        'terms'=>'coats'
    ]
];
$price_min=0;
$price_max=100;
$searched='';
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
    $query = new WP_Query( ['s'=>$searched,'post_type'=>'offers', 'post_status'=>'publish', 'meta_query'=>$acf_criteria, 'orderby'=>['by_price'=>'DESC', 'title'=>'DESC', 'date'=>'DESC']] );
  
if ( $query->have_posts() ) {
    //Wyświetlaj posty jeśli są tak o:
    echo '<ul>';
    while ( $query->have_posts() ) {
        $query->the_post();
        echo '<li>'.get_the_title().'<img src="'.get_field('picture').'" style="max-width:10rem;max-height:10rem;"/>'.'</li>';
    }
    echo '</ul>';
 } else {
     //Wyświetlaj jeśli nie ma postów to:
    echo '<h1>Niet</h1>';
 }
wp_reset_postdata();
get_footer(); ?>