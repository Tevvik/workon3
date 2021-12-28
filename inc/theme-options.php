<?php

if(!class_exists('Kirki')) {
    return;
}

//-----------Logo
Kirki::add_section('header', [
    'title' => 'Header logo',
    'priority' => 200
]);

Kirki::add_field('header_logo', [
    'type' => 'image',
    'settings' => 'logo',
    'label' => 'Logo',
    'section' => 'header'
]);

//-----------Socials
Kirki::add_section('social', [
    'title' => 'Social media',
    'priority' => 201
]);

Kirki::add_field('facebook', [
    'type' => 'text',
    'settings' => 'facebook',
    'label' => 'Facebook',
    'section' => 'social',
    'default' => '',
    'priority' => 1
    
]);

Kirki::add_field('instagram', [
    'type' => 'text',
    'settings' => 'instagram',
    'label' => 'Instagram',
    'section' => 'social',
    'default' => '',
    'priority' => 2
    
]);

Kirki::add_field('linkedin', [
    'type' => 'text',
    'settings' => 'linkedin',
    'label' => 'Linkedin',
    'section' => 'social',
    'default' => '',
    'priority' => 3
    
]);

//-------------Adres
Kirki::add_section('contact_info', [
    'title' => 'Informacje kontaktowe',
    'priority' => 300
]);

Kirki::add_field('telefon', [
    'type' => 'text',
    'settings' => 'telefon',
    'label' => 'Telefon',
    'section' => 'contact_info',
    'default' => '',
    'priority' => 1
    
]);

Kirki::add_field('email', [
    'type' => 'text',
    'settings' => 'email',
    'label' => 'Email',
    'section' => 'contact_info',
    'default' => '',
    'priority' => 2
    
]);

Kirki::add_field('adres1', [
    'type' => 'text',
    'settings' => 'adres',
    'label' => 'Adres',
    'section' => 'contact_info',
    'default' => '',
    'priority' => 3
    
]);

Kirki::add_field('adres2', [
    'type' => 'text',
    'settings' => 'adres2',
    'label' => 'Adres cd',
    'section' => 'contact_info',
    'default' => '',
    'priority' => 4
    
]);


//-------------Newsletter
Kirki::add_section('newsletter', [
    'title' => 'Newsletter',
    'priority' => 300
]);

Kirki::add_field('naglowek', [
    'type' => 'text',
    'settings' => 'naglowek',
    'label' => 'Naglowek',
    'section' => 'Newsletter',
    'default' => '',
    'priority' => 1
    
]);

Kirki::add_field('opis', [
    'type' => 'text',
    'settings' => 'opis',
    'label' => 'Opis',
    'section' => 'Newsletter',
    'default' => '',
    'priority' => 2   
    
]);