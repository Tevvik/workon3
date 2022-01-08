<?php
        $logo = get_theme_mod('logo');
        $user_ico = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>';
        $user_text = 'Zaloguj / Zarejestruj się';
        $add_offer = 'Dodaj ogłoszenie';
        $search_ico = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>';
        $filter_ico='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
        </svg>';
        $exit_ico='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
      </svg>';
      $price_min=0;
      $price_max=100;
      $sizes='XS, S';
      $was_used='używane';
      ?>
<!DOCTYPE html>
<html lang="<?=get_bloginfo("language");?>">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <link rel="stylesheet" href="<?=get_template_directory()."\dist\main.css"?>">
                <title><?php bloginfo('name'); wp_title('|');?></title>
                
                <?php wp_head();?>
        </head>
        <body>
                <header class="mobile">
                        <nav class="navigation">
                                <a class="logo" href="#"><?=$logo?>LOGO</a>
                                <div class="navigation-items">
                                        <a href="#" class="" role="button"><?=$user_ico?></a></a>
                                        <a href="#" class="" role="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rdive="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>
                                        </a>
                                        <a href="#" class="search-button " role="button"><?=$search_ico?></a>
                                </div>
                        </nav>
                        <div class="search">
                                <form class="" method="GET" action="../oferty">
                                        <label class="" for="send"><?=$search_ico?></label>
                                        <input type=submit id="send">
                                        <input class="" type="text" name="search" placeholder="Czego praginiesz?">
                                        <a class="" for="search">Wyczyść</a>
                                        <a class="" for="search"><?=$exit_ico?></a>
                                </form>
                        </div>
                        <div class="categoryandfilter">
                                <a href="#" class="category">Kategorie</a>
                                <a href="#" class="filter">Filtry <?=$filter_ico?></a>
                        </div>
                        <form class="category-select">
                                <?php/* DYNAMICZNE WYŚWIETLANIE KATEGORII OFERT*/ ?>
                                        <?php foreach (get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'names','parent'=>'0']) as $taxonomy) :?>
                                                <input type="checkbox" name="category" id="<?=$taxonomy?>">
                                                <label for="$taxonomy"><?=$taxonomy?></label>
                                        <?php endforeach;?>
                                <div class="women">
                                        <a href="" class="header">Kobieta</a>
                                        <input type="checkbox" name="category" id="Wszystkie">
                                        <label for="Wszystkie">Wszystkie</label>
                                        <?php/* NIE DZIAŁA!!! DYNAMICZNE WYŚWIETLANIE PODKATEGORII OFERT*/ ?>
                                        <?php foreach (get_terms(['taxonomy'=>'offers','child_of' => 'k', 'hide_empty' => false,'fields'=>'names']) as $taxonomy) :?>
                                                <input type="checkbox" name="category" id="<?=$taxonomy?>">
                                                <label for="$taxonomy"><?=$taxonomy?></label>
                                        <?php endforeach;?>
                                </div>
                                <div class="category-select--confirm">
                                        <a class="">Przeglądaj</a>
                                </div>
                        </form>
                        <div class="filters">
                                <div class="filters-select">
                                        <a id="price">Cena</a>
                                        <?php foreach (get_taxonomies(['desc'=>'filters'], 'objects') as $term) :?>
                                                <?php $term = $term->labels->name?>
                                                <a id="<?=$term?>"><?=$term?></a>
                                        <?php endforeach;?>
                                </div>
                                <div class="filters-select--price">
                                        <div class="pair">
                                                <input type="number" name="min" vaule="<?=$price_min?>" placeholder="Od">
                                                <span> - </span>
                                                <input type="number" name="max" value="<?=$price_max?>" placeholder="do">
                                        </div>
                                </div>
                                <div class="filters-select--used">
                                        <input type="checkbox" name="used" id="used" vaule="used">
                                        <label for="used">Używane</label>
                                        <input type="checkbox" name="used" id="new" value="new">
                                        <label for="new">Nowe</label>
                                </div>
                                <div class="filters-select--style">
                                        <?php foreach (get_terms(['taxonomy'=>'filter_style','hide_empty' => false,'fields'=>'names']) as $term) :?>
                                                <input type="checkbox" name="style" id="<?=$term?>" value="<?=$term?>">
                                                <label for="<?=$term?>"><?=$term?></label>
                                        <?php endforeach;?>
                                </div>
                                <div class="filters-select--size">
                                        <?php foreach (get_terms(['taxonomy'=>'filter_sizes','hide_empty' => false,'fields'=>'names']) as $term) :?>
                                                <input type="checkbox" name="style" id="<?=$term?>" value="<?=$term?>">
                                                <label for="<?=$term?>"><?=$term?></label>
                                        <?php endforeach;?>
                                </div>
                                <div class="filters-select--confirm">
                                        <a href="">
                                                Zastosuj wybrane filtry
                                        </a>
                                </div>        
                                <div class="filters-active">
                                        <div class="filters-active--header">
                                                <span class="">Aktywne filtry:</span>
                                                <a class="filters-active--erase">Wyczyść filtry</a>
                                        </div>
                                        <hr>
                                        <div class="filters-active--items">
                                                <a class="">Cena: <?=$price_min?> - <?=$price_max?></a>
                                                <a class="">Rozmiar: <?=$sizes?></a>
                                                <a class="">Stan: <?=$was_used?></a>
                                        </div>
                                </div>
                        </div>
                </header>
                <header class="wide">
                        <nav class="navigation">
                                <a class="logo" href="#"><?=$logo?>LOGO</a>
                                <div class="navigation-items">
                                        <div class="search">
                                                <form class="" method="GET" action="../oferty">
                                                        <input type=submit id="send">
                                                        <input class="" type="text" name="search" placeholder="Czego praginiesz?">
                                                        <label class="" for="send"><?=$search_ico?></label>
                                                </form>
                                        </div>
                                        <a href="#" class="" role="button"><?=$user_ico?></a></a>
                                        <a href="#" class="" role="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rdive="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>
                                        </a>
                                </div>
                        </nav>
                </header>
                
