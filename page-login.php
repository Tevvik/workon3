<?php
/*
Template name: Logowanie
*/
get_header();
?>


<main class="main">
      <div class="logowanie">
        <div class="title">Logowanie</div>
        <div class="content2">
          <form action="#">
            <div class="user-details2">
              <div class="input-box">
                <div class="input-box1">
                <input type="text" placeholder="wpisz login" required>
                <i class="fa fa-user fa-lg"></i>
              </div>
                <div class="input-box2">
                <input type="password" placeholder=" wpisz hasło" required>
                <i class="fa fa-key fa-lg"></i>
              </div>
            </div>
                <div class="buttonl">
              <input type="submit" value="Zaloguj sie">
            </div>
          </form>
        </div>
      </div>


    </main>


<?php get_footer(); ?>