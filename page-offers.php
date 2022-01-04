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
$price_min=10;
$price_max=50;
$acf_criteria=[
    'relation'=>'AND',
    [
    'key'=>'price',
    'value'=>$price_max,
    'compare'=>'<='
    ],
    [
    'key'=>'price',
    'value'=>$price_min,
    'compare'=>'>='
    ]
];
    $query = new WP_Query( ['post_type'=>'offers', 'post_status'=>'publish', 'meta_query'=>$acf_criteria] );
  
 if ( $query->have_posts() ) {
     echo '<ul>';
     while ( $query->have_posts() ) {
         $query->the_post();
         echo '<li>' . get_the_title() . '</li>';
     }
     echo '</ul>';
 } else {
     echo '<h1>Niet</h1>';
 }
wp_reset_postdata();
get_footer(); ?>