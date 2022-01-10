<?php
        $logo = get_theme_mod('logo');
        $user_ico = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>';
        $user_text = 'Zaloguj / Zarejestruj się';
        $add_offer = 'Dodaj ogłoszenie';
        $search_ico = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>';
$filters=[];
foreach(get_taxonomies(['desc'=>'filters'], 'objects') as $filter){
        $positions=[];
        $positions=get_terms(['taxonomy'=>$filter->name,'hide_empty' => false,'fields'=>'names']);
        $filters[] = [
                'name'=>$filter->labels->name,
        'positions' => $positions
        ];
};
?>
<!DOCTYPE html>
<html lang="<?=get_bloginfo("language");?>">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <link rel="stylesheet" href="<?=get_template_directory_uri()."\dist\main.css"?>">
                <title><?php bloginfo('name'); wp_title('|');?></title>
                
                <?php wp_head();?>
        </head>
        <body>
                <header>
                        <nav class="navigation">
                                <a class="logo" href="<?=get_home_url()?>"><?=$logo?>LOGO</a>
                                <div class="navigation-items">
                                        <a href="<?=get_template_directory_uri()?>/login/">U</a></a>
                                        <a>A</a>
                                        <form action="<?= get_template_directory_uri()?>/oferty">
                                                <input type="text" name="search" placeholder="Czego praginiesz?">
                                                <input type=submit id="send">
                                                <label for="send">S</label>
                                                <a onclick="visibilityToggle(event, 'options')">></a>
                                        </form>
                                </div>
                        </nav>
                        <form class="options" id="options" action="<?= get_template_directory_uri()?>/oferty">
                                <div class="options-searchbar" method="GET">
                                        <input type=submit id="send">
                                        <label for="send">
                                                <?=$search_ico?>
                                        </label>
                                        <input type="text" name="search" placeholder="Czego praginiesz?">
                                        <input type="reset" name="reset">
                                        <label for="reset">Wyczyść</label>
                                        <a class="button-to-collapse-searchbar">X</a>
                                </div>
                                <div class="options-header">
                                        <a onclick="visibilityToggle(event, 'category-select')">Kategorie</a>
                                        <a onclick="visibilityToggle(event, 'filters')">Filtry X</a>
                                        <a onclick="visibilityToggle(event, 'sort')">X Sortuj</a>
                                </div>
                                <div id="category-select">
                                        <div class="category-select--main">
                                                <?php foreach (get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'names','parent'=>'0']) as $taxonomy) :?>
                                                        <a><?=$taxonomy?></a>
                                                <?php endforeach;?>
                                        </div>
                                        <div class="category-select--sub">
                                                <input type="radio" name="category" id="Wszystkie">
                                                <label for="Wszystkie">
                                                        Wszystkie
                                                </label>
                                                <?php foreach (get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'names','parent'=>'55']) as $taxonomy) :?>
                                                        <input type="radio" name="category" id="<?=$taxonomy?>" value="<?=$taxonomy?>">
                                                        <label for="<?=$taxonomy?>"><?=$taxonomy?></label>
                                                <?php endforeach;?>
                                        </div>
                                </div>
                                <div id="filters">
                                        <div id="filters-header">
                                                <a id="price" onclick="visibilityToggle(event, 'filters-select--price')">Cena</a>
                                                <?php foreach ($filters as $filter): $filter=$filter['name']?>
                                                        <a id="<?=$filter?>" onclick="visibilityToggle(event, 'filters-select--<?=$filter?>')"><?=$filter?></a>
                                                <?php endforeach;?>    
                                        </div>
                                        <div id="filters-select">
                                                <div id="filters-select--price">
                                                        <div class="pair">
                                                                <input type="number" name="min" vaule="1" placeholder="Od">
                                                                <span> - </span>
                                                                <input type="number" name="max" value="100" placeholder="do">
                                                        </div>
                                                </div>
                                                <?php foreach ($filters as $filter): $filter?>
                                                        <div id="filters-select--<?=$filter['name']?>">
                                                                <a id="<?=$filter['name']?>"><?=$filter['name']?></a>
                                                                <?php foreach ($filter['positions'] as $position):?>
                                                                        <input type="checkbox" name="<?=$filter["name"]?>[]" id="<?=$position?>" value="<?=$position?>">
                                                                        <label for="<?=$position?>"><?=$position?></label>
                                                                <?php endforeach;?>
                                                        </div>
                                                <?php endforeach;?>                                                  
                                        </div>
                                </div>
                                <div class="options-submit">
                                        <label for="options-submit--button">
                                                Przeglądaj
                                                <input type="submit" id="options-submit--button">
                                        </label>
                                </div>
                        </form>
                </header>
                <script>
                        function visibilityToggle(e, id){
                                console.log(id);
                                document.getElementById(id).style.display == 'none' ? document.getElementById(id).style.display = 'flex' : document.getElementById(id).style.display = 'none';
                        }
                </script>