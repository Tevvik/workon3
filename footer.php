<?php
$facebook_link = get_theme_mod("facebook_link");
$instagram_link = get_theme_mod("instagram_link");
$linkedin_link = get_theme_mod("linkedin_link");
?>
<div class="container-fluid bg-dark text-light">
    <div class="row">
        <div class="col-lg-4">
            <span class="d-block">Kobieta:</span>
            <a href="#" class="d-block">Płaszcze i kurtki</a>
            <a href="#" class="d-block">Buty</a>
            <a href="#" class="d-block">Akcesoria</a>
            <a href="#" class="d-block">Bluzy i swetry</a>
            <a href="#" class="d-block">Bluzki i T-shirty</a>
            <span class="d-block">Mężczyzna:</span>
            <a href="#" class="d-block">Płaszcze i kurtki</a>
            <a href="#" class="d-block">Buty</a>
            <a href="#" class="d-block">Akcesoria</a>
            <a href="#" class="d-block">Bluzy i swetry</a>
            <a href="#" class="d-block">Bluzki i T-shirty</a>
        </div>
        <div class="col-lg-4">
            <a href="#"class="d-block">Polityka prywatności</a>
            <a href="#"class="d-block">Regulamin</a>
        </div>
        <div class="col-lg-4">
        <div class="footer--social">
                    <?php if ($facebook_link) : ?>
                        <a href="<?= $facebook_link ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>

                    <?php if ($instagram_link) : ?>
                        <a href="<?= $instagram_link ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>

                    <?php if ($linkedin_link) : ?>
                        <a href="<?= $linkedin_link ?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                </div>
        </div>
        <hr>
        <a href="#" class="text-muted">Workon</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>




