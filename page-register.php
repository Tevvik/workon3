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
              <div class="input-box4">
              <input type="text" name="user_phone" placeholder="Wpisz nr tel" id="tel"/>
              <i class="fas fa-phone-alt fa-lg"></i>
              </div>
              <div class="input-box5">
              <input type="password" name="pass1" placeholder="Hasło" id="pass1"/>
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              </div>
              <div class="input-box6">
              <input type="password" name="pass2" placeholder="Powtórz hasło" id="pass2"/>
                <i class="fa fa-key fa-lg"></i>
              </div>
            </div>
            <div class="buttonll">
                  <?php do_action('register_form')?>
                <input type="submit" value="Zarejestruj się" id="register" />
                <input type="hidden" name="redirect_to" value="<?=home_url()?>">
            </div>
            <div class="buttonlogin">
              <span>Masz już konto?</span>
              <a href="<?=get_template_directory_uri()?>/zaloguj">Zaloguj się</a>
            </div>
          </form>
          <?php else : ?>
                    Jesteś zalogowany
          <?php endif; ?>
        </div>
      </div>
    </main>


<?php get_footer(); ?>