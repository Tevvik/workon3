<?php
/*
Template name: Logowanie
*/
get_header();
?>

<?php if(!is_user_logged_in()):?>
	<form name="loginform" id="loginform"  class="loginform" action="<?=home_url()?>/wp-login.php" method="post">
		<h1 class="title1">Logowanie</h1>
		<?php if(!empty($_GET['err'])&&$_GET['err']=='failed'):?>
			<p>Logowanie nie powiodło się. Sprawdź poprawność danych.</p>
		<?php endif;?>
			<div class="login-username">
			    <i class="fa fa-user fa-lg"></i>
				<input type="text"  placeholder="wpisz login" name="log" id="user_login" class="input" value="" size="20">
               
			</div>
			<div class="login-password">
			    <i class="fa fa-key fa-lg"></i>
				<input type="password" placeholder=" wpisz hasło" name="pwd" id="user_pass" class="input" value="" size="20">
                
			</div>
			
			<div class="login-remember">
				<label>
					<input name="rememberme" type="checkbox" id="rememberme" value="forever">
					 Zapamiętaj mnie</label>
				</div>
			<div class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Zaloguj się">
			</div>
			<div class="login-rejestr">
				<a>Nie masz jeszcze u nas konta?
					<a href="<?=get_template_directory_uri()?>/zarejestruj" class="reg-button">Załóż je teraz!</a>
				</a>
			</div>
</form>
<?php else:?>
	<h1>Jesteś zalogowany</h1>
<?php endif;?>

<?php get_footer(); ?>