    <footer>
        <div>
            <div class="social">
                <?php if (get_theme_mod('facebook')) : ?>
                    <a href="<?= get_theme_mod('facebook') ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-square"></i></a>
                <?php endif; ?>
                <?php if (get_theme_mod('instagram')) : ?>
                    <a href="<?= get_theme_mod('instagram') ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if (get_theme_mod('linkedin')) : ?>
                    <a href="<?= get_theme_mod('linkedin') ?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <?php endif; ?>
            </div>
            <div class="policies">
                <a href="#">Polityka prywatności</a>
                <a href="#">Regulamin</a>
            </div>
            <div class="contact">
                <?php if (get_theme_mod('telephone')) : ?>
                    <a class="phone-ico"href="tel:<?= get_theme_mod('telephone') ?>" target="_blank" title="phone">
                        Zadzwoń do nas:
                        <?= get_theme_mod('telephone') ?>
                    </a>
                <?php endif; ?>
                <?php if (get_theme_mod('email')) : ?>
                    <a class="email-ico" href="mailto:<?= get_theme_mod('email') ?>" target="_blank" title="email">
                        Napisz do nas:
                        <?= get_theme_mod('email') ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="end">
            <span href="#">Workon 2022</span>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>




