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
                                        <a href="<?=get_template_directory_uri()?>/login/"><?=$user_ico?></a></a>
                                        <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rdive="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>
                                        </a>
                                        <a href="#" class="search-button " role="button"><?=$search_ico?></a>
                                </div>
                        </nav>
                        <form class="options" action="<?= get_template_directory_uri()?>/oferty">
                                <div class="options-searchbar" method="GET" >
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
                                        <a onclick="categoriesToggle()">Kategorie</a>
                                        <a onclick="filtersToggle()">Filtry X</a>
                                        <a>X Sortuj</a>
                                </div>
                                <div id="category-select">
                                        <div class="category-select--main">
                                                <?php/* DYNAMICZNE WYŚWIETLANIE KATEGORII OFERT*/ ?>
                                                <?php foreach (get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'names','parent'=>'0']) as $taxonomy) :?>
                                                        <input type="checkbox" name="category" id="<?=$taxonomy?>">
                                                        <label for="$taxonomy"><?=$taxonomy?></label>
                                                <?php endforeach;?>
                                        </div>
                                        <div class="category-select--sub">
                                                <input type="checkbox" name="category" id="Wszystkie">
                                                <label for="Wszystkie">
                                                        Wszystkie
                                                </label>
                                                <?php/* NIE DZIAŁA!!! DYNAMICZNE WYŚWIETLANIE PODKATEGORII OFERT*/ ?>
                                                <?php foreach (get_terms(['taxonomy'=>'offers','parent' => 'k', 'hide_empty' => false,'fields'=>'names']) as $taxonomy) :?>
                                                        <label for="$taxonomy"><?=$taxonomy?><input type="checkbox" name="category" id="<?=$taxonomy?>"></label>
                                                <?php endforeach;?>
                                        </div>
                                </div>
                                <div id="filters">
                                        <?php
                                        /* DYNAMICZNE WYŚWIETLANIE FILTRÓW
                                        POZA CENA, CENA JEST SPECJALNA*/ 
                                        ?>
                                        <div id="filters-header">
                                                <a id="price">Cena</a>
                                                <?php foreach ($filters as $filter): $filter=$filter['name']?>
                                                        <a id="<?=$filter?>" onclick="bruh(event)"><?=$filter?></a>
                                                <?php endforeach;?>    
                                        </div>
                                        <div id="filters-select">
                                                <div class="filters-select--price">
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
                                                                        <input type="checkbox" name="<?=$position?>" id="<?=$position?>">
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
                        function bruh(e){
                                var display = document.getElementById('filters-select--'+e.target.id).style.display;
                                display == 'none' ? display = 'flex' : display = 'none';
                                document.getElementById('filters-select--'+e.target.id).style.display = display;
                        }
                        function categoriesToggle(e){
                                document.getElementById('category-select').style.display == 'none' ? document.getElementById('category-select').style.display = 'flex' : document.getElementById('category-select').style.display = 'none';
                        }
                        function filtersToggle(e){
                                document.getElementById('filters').style.display == 'none' ? document.getElementById('filters').style.display = 'flex' : document.getElementById('filters').style.display = 'none';
                        }
                </script>