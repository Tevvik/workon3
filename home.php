<?php 
/*
Template name: Strona główna
*/
get_header();
$slogan='Nie nosisz? Więc sprzedaj!';
$path=get_template_directory_uri().'\\';
$ico_w_1=$path.'photo\buty-m.png';
$ico_w_2=$path.'photo\buty-k.png';
$ico_w_3=$path.'photo\akcesoria-w.png';
$ico_w_4=$path.'photo\bluzy_i_swetry-k.png';
$ico_w_5=$path.'photo\bluzka_i_tshirt-k.png';
$ico_m_1=$path.'photo\kurtka-k.png';
$ico_m_2=$path.'photo\buty-m.png';
$ico_m_3=$path.'photo\akcesoria-m.png';
$ico_m_4=$path.'photo\bluzy_i_swetry-m.png';
$ico_m_5=$path.'photo\bluzka_i_tshirt-m.png';
?>
<div class="hero container">
    <h2>
        <?=$slogan?>
    </h2>
</div>
<div class="categories container-fluid bg-light">
    <div class="row">
        <div class="women col-lg-6">
            <h3>Kobiety</h3>
            <a href="#"class="d-block"><img src="<?=$ico_w_1?>">Płaszcze i kurtki</a>
            <a href="#"class="d-block"><img src="<?=$ico_w_2?>">Buty</a>
            <a href="#"class="d-block"><img src="<?=$ico_w_3?>">Akcesoria</a>
            <a href="#"class="d-block"><img src="<?=$ico_w_4?>">Bluzy i swetry</a>
            <a href="#"class="d-block"><img src="<?=$ico_w_5?>">Bluzki i T-shirty</a>
        </div>
        <div class="men col-lg-6">
            <h3>Mężczyźni</h3>
            <a href="#" class="d-block"><img src="<?=$ico_m_1?>">Płaszcze i kurtki</a>
            <a href="#" class="d-block"><img src="<?=$ico_m_2?>">Buty</a>
            <a href="#" class="d-block"><img src="<?=$ico_m_3?>">Akcesoria</a>
            <a href="#" class="d-block"><img src="<?=$ico_m_4?>">Bluzy i swetry</a>
            <a href="#" class="d-block"><img src="<?=$ico_m_5?>">Bluzki i T-shirty</a>
        </div>
    </div>
</div>
<div class="extra container">
    <div class="row">
        <div class="card col-lg-3">
            <img src="<?=$offer_pic?>" class="card-img-top">
            <div class="card-body">
            <p class="card-text text-truncate"><?=$offer_title?></p>
            </div>
        </div>
        <div class="card col-lg-3">
            <img src="<?=$offer_pic?>" class="card-img-top">
            <div class="card-body">
            <p class="card-text text-truncate"><?=$offer_title?></p>
            </div>
        </div><div class="card col-lg-3">
            <img src="<?=$offer_pic?>" class="card-img-top">
            <div class="card-body">
            <p class="card-text text-truncate"><?=$offer_title?></p>
            </div>
        </div><div class="card col-lg-3">
            <img src="<?=$offer_pic?>" class="card-img-top">
            <div class="card-body">
            <p class="card-text text-truncate"><?=$offer_title?></p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<?php get_footer(); ?>