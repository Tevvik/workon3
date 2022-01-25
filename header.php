<?php
        $sizes = [];
        foreach(get_terms(['taxonomy'=>'filter_sizes','hide_empty'=>false,'fields'=>'all','order_by'=>'term_id']) as $size){
                $sizes[] = ['name'=>$size->name, 'id'=>$size->term_id];
        };
        $categories;
        foreach(get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'all','parent'=>'0']) as $taxonomy){
            $subcat;
            foreach(get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'all','parent'=>$taxonomy->term_id]) as $term){
                $subcat[] = ['sub_name'=>$term->name, 'sub_id'=>$term->term_id];
            };
            $categories[]=[
                'main'=>['main_name'=>$taxonomy->name,'main_id'=>$taxonomy->term_id],
                'subs'=>$subcat,
            ];
            $subcat=[];
        }
?>
<script>
        window.reactInit = {
        categories: <?= json_encode($categories)?>,
        author: <?=get_current_user_id()?>,
        sizes: <?=json_encode($sizes)?>
        };
</script>
<!DOCTYPE html>
<html lang="<?=get_bloginfo("language");?>">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
                <title><?php bloginfo('name');?></title>
                
                <?php wp_head();?>
        </head>
        <body>
                <header>
                        <nav class="navigation">
                                <a class="logo" href="<?=get_home_url()?>"><?php if(get_theme_mod('logo')):?><img src="<?=get_theme_mod('logo')?>" alt="LOGO"><?php else: endif;?><span class="site-name"><?=get_bloginfo()?></span></a>
                                <div>
                                        <div class="catmenu">
                                                <?php foreach ($categories as $category) :?>
                                                        <div class="menu-item">
                                                                <a><?=$category['main']['main_name']?><i class="fas fa-angle-down"></i></a>
                                                                <div class="menu-item--expand">
                                                                <?php foreach ($category['subs'] as $subcat) :?>
                                                                        <a href="<?=get_template_directory_uri()?>/oferty/?category[0]=<?=$subcat['sub_id']?>"><?=$subcat['sub_name']?><i class="fas fa-angle-right"></i></a>
                                                                <?php endforeach;?>
                                                                </div>
                                                        </div>
                                                <?php endforeach;?>
                                        </div>
                                        <a class="add btn" href="<?=get_template_directory_uri()?>/dodawanie-ofert"><i class="fas fa-plus"></i><span>Dodaj ofertę</span></a>
                                <?php if (is_user_logged_in()):?>
                                        <a class="btn" href="<?php echo wp_logout_url( get_home_url() ); ?>" title="Logout"><i class="fas fa-sign-out-alt"></i><span>Wyloguj się</span></a>
                                <?php else:?>
                                        <a class="btn" href="<?=get_template_directory_uri()?>/zaloguj"><i class="fas fa-user"></i><span>Zaloguj się</span></a>
                                <?php endif;?>
                                        <a class="options-btn btn"><i class="fas fa-bars"></i></a>
                                </div>
                        </nav>
                </header>
                <form class="options" action="<?= get_template_directory_uri()?>/oferty">
                        <div class="head">
                                <a class="close-btn btn"><i class="fas fa-times"></i></a>
                        </div>
                        <?php if (!empty($_GET['category'])||!empty($_GET['sizes'])||!empty($_GET['min'])||!empty($_GET['max'])||!empty($_GET['search'])):?>
                        <div class="active-filters">
                                <div>
                                </div>
                                <a class="clear-form">Wyczyść wszystkie filtry</a>
                        </div>
                        <?php else: endif;?>
                        <div class="search">
                                <input type="text" name="search" placeholder="Czego praginiesz?" <?=!empty($_GET['search']) ? 'value="'.$_GET['search'].'"' :null?>>
                                <label for="search-submit" class="btn"><input id='search-submit' type=submit><i class="fas fa-search"></i></label>
                        </div>
                        <div class="header">
                                <input type="radio" id="categories" name="option"checked>
                                <label for="categories">Kategorie<i class="fas fa-tag"></i></label>
                                <input type="radio" id="filters"name="option">
                                <label for="filters">Filtry<i class="fas fa-sliders-h"></i></label>
                                <input type="radio" id="sort"name="option">
                                <label for="sort">Sortuj<i class="fas fa-exchange-alt"></i></label>
                        </div>
                        <div class="categories expand">
                                <div class="categories--main">
                                        <span>Dla kogo?</span>
                                        <?php foreach ($categories as $category) :?>
                                                <input type="radio" id="<?=$category['main']['main_id']?>" name="cat">
                                                <label for="<?=$category['main']['main_id']?>"><?=$category['main']['main_name']?><i class="fas fa-angle-down"></i></i></label>
                                        <?php endforeach;?>
                                </div>
                                <div class="categories--sub">
                                                <span>Typ</span>
                                                <?php foreach ($categories as $category) :?>
                                                        <div id="exp-<?=$category['main']['main_id']?>">
                                                                <?php foreach ($category['subs'] as $subcat) :?>
                                                                        <input type="checkbox" name="category[]" id="<?=$subcat['sub_id']?>" value="<?=$subcat['sub_id']?>" <?= isset($_GET['category']) ? (in_array($subcat['sub_id'], $_GET['category']) ? 'checked' : null) : null?>>
                                                                        <label for="<?=$subcat['sub_id']?>"><?=$subcat['sub_name']?></label>
                                                                <?php endforeach;?>
                                                        </div>
                                                <?php endforeach;?>
                                </div>
                        </div>
                        <div class="filters expand">
                                <div class="filters-select--price">
                                                        <span>Cena</span>
                                                        <div class="">
                                                                <input type="number" name="min" <?=isset($_GET['min'])? 'value="'.$_GET['min'].'"' : null?>>
                                                                <label for="min">Od</label>
                                                        </div>
                                                        <div class="">
                                                                <input type="number" name="max" <?=isset($_GET['max'])? 'value="'.$_GET['max'].'"' : null?>>
                                                                <label for="min">Do</label>
                                                        </div>
                                </div>
                                        <div class="filters-select--size">
                                                <span>Rozmiary</span>
                                                <?php foreach ($sizes as $size) :?>
                                                        <input type="checkbox" name="sizes[]" id="<?=$size['id']?>" value="<?=$size['id']?>" <?= isset($_GET['sizes']) ? (in_array($size['id'], $_GET['sizes']) ? 'checked' : null) : null?>>
                                                        <label for="<?=$size['id']?>"><?=$size['name']?></label>
                                                <?php endforeach;?>
                                        </div>
                        </div>
                        <div class="sort expand">
                                <span>Sortuj po:</span>
                                <div class="sort-select">
                                        <?php foreach ([['price_asc','Cenie rosnąco'], ['price_desc','Cenie malejąco'], ['date_asc','Dacie rosnąco'], ['date_desc','Dacie malejąco'], ['title_asc','Tytule od A do Z'], ['title_desc', 'Tytule od Z do A']] as $sort_opt):?>
                                                <input type="radio" name="sort" id="<?=$sort_opt[0]?>" value="<?=$sort_opt[0]?>" <?= isset($_GET['sort']) ? ($sort_opt[0] == $_GET['sort'] ? 'checked' : null) : null?>>
                                                <label for="<?=$sort_opt[0]?>"><?=$sort_opt[1]?></label>
                                        <?php endforeach;?>
                                </div>
                        </div>
                        <div class="options-submit">
                                <label for="options-submit--button">Przeglądaj<input type="submit" id="options-submit--button"></label>
                        </div>
                </form>