<?php
function add_cpt() {
    $argsOffersCategories = [
        'labels' => [
            'name' => 'Kategorie ofert'
        ],
        'public'=>true,
        'hierarchical' => true
    ];
    register_taxonomy('offers', ['offers'], $argsOffersCategories);

    $argsOffersFileterSizes = [
        'labels' => [
            'name' => 'Rozmiary'
        ],
        'desc'=>'filters',
        'public'=>true,
        'hierarchical' => false
    ];
    register_taxonomy('filter_sizes', ['offers'], $argsOffersFileterSizes);

    $offerArgs=[
        'labels' => [
            'name' => 'Oferty'
        ],
        'public' => true,
        'menu_icon' => 'dashicons-list-view',
        'supports' => ['title']  
    ];
    register_post_type('offers', $offerArgs);
}
add_action('init', 'add_cpt');