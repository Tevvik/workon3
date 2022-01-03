<?php
function add_cpt() {
    $argsOffersCategories = [
        'labels' => [
            'name' => 'Kategorie ofert'
        ],
        'hierarchical' => false
    ];
    register_taxonomy('offer_categories', ['offers'], $argsOffersCategories);
    $argsOffersSexCategories = [
        'labels' => [
            'name' => 'Kategorie ofert - dla kogo'
        ],
        'hierarchical' => false
    ];
    register_taxonomy('offer_sex_categories', ['offers'], $argsOffersSexCategories);
    $argsOffersSizeCategories = [
        'labels' => [
            'name' => 'Kategorie rozmiary'
        ],
        'hierarchical' => true
    ];
    register_taxonomy('offer_size_categories', ['offers'], $argsOffersSizeCategories);
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