<?php

function add_cpt() {


    $argsFunctionsCategories = [
        'labels' => [
            'name' => 'Kategorie funkcji'
        ],
        'hierarchical' => true
    ];

    register_taxonomy('function_categories', ['functions'], $argsFunctionsCategories);

    $functionArgs=[
        'labels' => [
            'name' => 'Funkcje'
        ],
        'public' => true,
        'menu_icon' => 'dashicons-list-view',
        'supports' => ['title', 'editor']
        
    ];

    register_post_type('functions', $functionArgs);

$testimonialsArgs=[
    'labels' => [
        'name' => 'Opinie'
    ],
    'public' => true,
    'menu_icon' => 'dashicons-list-view',
    'supports' => ['title', 'editor']
    
];

register_post_type('testimonials', $testimonialsArgs);
}

add_action('init', 'add_cpt');