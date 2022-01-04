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
<section class="about-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <?php if (!is_user_logged_in()) : ?>
                    <form action="<?php echo get_permalink(get_the_ID()) ?>" method="post">
                        <input type="text" name="user_login" placeholder="Login" id="user_login" class="form-control mb-3" />
                        <input type="text" name="user_email" placeholder="E-Mail" id="user_email" class="form-control mb-3" />
                        <input type="password" name="pass1" placeholder="Hasło" id="pass1" class="form-control mb-3" />
                        <input type="password" name="pass2" placeholder="Powtórz hasło" id="pass2" class="form-control mb-3" />
                        <?php do_action('register_form'); ?>
                        <input type="submit" value="Zarejestruj się" class="btn btn-primary w-100" id="register" />
                    </form>
                <?php else : ?>
                    Jesteś zalogowany
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>
<!-- End content -->

<?php get_footer(); ?>