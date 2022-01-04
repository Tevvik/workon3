<?php
    $logo = get_theme_mod('logo');
    $user_ico = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>';
    $user_text = 'Zaloguj / Zarejestruj się';
    $add_offer = 'Dodaj ogłoszenie';
    $search_ico = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </svg>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); wp_title('|');?></title>

    <?php wp_head();?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?=$logo?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <form class="d-flex">
            <input id="search" class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Szukaj">
            <button class="btn btn-dark" type="submit"><?=$search_ico?></button>
          </form>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><a class="btn btn-dark" role="button"><?=$user_ico?></a></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><a class="btn btn-dark" role="button"><?=$add_offer?></a></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
