<?php
/*
Template name: Rejestracja
*/

$login = isset($_POST['user_login']) ? $_POST['user_login'] : '';
$email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
$pass1 = isset($_POST['pass1']) ? $_POST['pass1'] : '';
$pass2 = isset($_POST['pass2']) ? $_POST['pass2'] : '';

if ($login && $email && $pass1 && $pass1 === $pass2) {
    $user_id = wp_create_user($login, $pass1, $email);

    if ($user_id) wp_redirect(get_the_permalink(704));
}
get_header();
?>
<<<<<<< HEAD
<main class="main">
      <div class="rejestracja">
        <div class="title">Rejestracja</div>
        <div class="contentR">
        <?php if (!is_user_logged_in()) : ?>
          <form action="<?php echo get_permalink(get_the_ID())?>" method="post">
            <div class="user-detailsR">
              <div class="input-box">
                <div class="input-box3">
                <input type="text" name="user_login" placeholder="Login" id="user_login"/>
                <i class="fa fa-user fa-lg"></i>
              </div>
                <div class="input-box4">
                <input type="text" name="user_email" placeholder="E-Mail" id="user_email" />
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
              </div>
              <div class="input-box5">
              <input type="password" name="pass1" placeholder="Hasło" id="pass1"/>
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              </div>
              <div class="input-box6">
              <input type="password" name="pass2" placeholder="Powtórz hasło" id="pass2"/>
                <i class="fa fa-key fa-lg"></i>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link href="registration.css" rel="stylesheet">
</head>
<body>
    
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Rejestracja</p>
                <?php if (!is_user_logged_in()) : ?>
                  <form action="<?php echo get_permalink(get_the_ID())?>" method="post">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                      <input type="text" name="user_login" placeholder="Login" id="user_login" class="form-control mb-3" />
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                      <input type="text" name="user_email" placeholder="E-Mail" id="user_email" class="form-control mb-3" />
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                      <input type="password" name="pass1" placeholder="Hasło" id="pass1" class="form-control mb-3" />
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                      <input type="password" name="pass2" placeholder="Powtórz hasło" id="pass2" class="form-control mb-3" />
                        
                      </div>
                    </div>
                      </div>
                    </div>
  
                    <?php do_action('register_form'); ?>
                    
                    <input type="submit" value="Zarejestruj się" class="btn btn-primary w-100" id="register" />
  
                                             
                    </form>
                <?php else : ?>
                    Jesteś zalogowany
                <?php endif; ?>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="https://images.pexels.com/photos/996329/pexels-photo-996329.jpeg?cs=srgb&dl=pexels-kai-pilger-996329.jpg&fm=jpg" class="img-fluid" alt="Sample image">
  
                </div>
>>>>>>> 7c42d249adb6333dff6c0815fbc1131299dac274
              </div>
            </div>
                <div class="buttonll">
                <input type="submit" value="Zarejestruj się" id="register" />
            </div>
          </form>
          <?php else : ?>
                    Jesteś zalogowany
                <?php endif; ?>
        </div>
      </div>


    </main>


<?php get_footer(); ?>