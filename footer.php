<?php
    $facebook = get_theme_mod('facebook');
    $instagram = get_theme_mod('instagram');
    $linkedin = get_theme_mod('linkedin');
?>

 <!-- Start newsletter -->
 <section id="newsletter" class="newsletter">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4">
                    <p class="newsletter--description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Asperiores necessitatibus ullam expedita officiis beatae dolorum commodi quaerat sequi possimus
                        temporibus fugit exercitationem reiciendis nobis porro.</p>
                </div>
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="newsletter--heading">Zapisz się do naszego newsletter-a</h2>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Podaj adres e-mail">
                        <button class="btn btn-primary input-group-text"><i
                                class="fas fa-arrow-right mx-3"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End newsletter -->

<!-- Start footer -->
<footer class="footer">
        <div class="container" data-aos="fade-up" data-aos-offset="0">
            <div class="row">
                <div class="col-md-3"><!--menu stopki linkowanie -->
                  <?php wp_nav_menu(['theme_location' => 'footer_nav_1', 'menu_class' => 'footer--menu']); ?>
                </div>
                <div class="col-md-5">
                <?php wp_nav_menu(['theme_location' => 'footer_nav_2', 'menu_class' => 'footer--menu']); ?>
                </div>
                <div class="col-md-4">
                    <div class="footer--social">
                        <?php if ($facebook) : ?>
                        <a href="<?php echo $facebook;?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <?php endif;?>
                        <?php if ($instagram) : ?>
                        <a href="<?php echo $instagram;?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <?php endif;?>
                        <?php if ($linkedin) : ?>
                        <a href="<?php echo $linkedin;?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr class="footer--line">
                </div>
            </div>

            <div class="row footer--bottom">
                <div class="col-sm-6">
                    &copy; <?php echo get_bloginfo('title') . ' ' . date('Y');?>
                </div>
                <div class="col-sm-6">
                    wykonanie: work-on 6
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->

<?php wp_footer(); ?>
</body>



</html>




