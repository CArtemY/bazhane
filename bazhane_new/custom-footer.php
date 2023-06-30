<?php
if ( $current_language === 'uk' ) { 
?>
<div class="footer">
        <div class="container">
            <div class="line1">
                <div class="b1">
                    <p><span>Підписатися</span>
                        <br>Будьте в курсі наших
                        <br> акцій та надходжень</p>
                </div>
                <div class="b2">
                    <input type="email" placeholder="Вкажіть ваш e-mail">
                </div>
                <div class="b3">
                    <div class="btn">підписатися</div>
                </div>
                <div class="b4">
                    <p>Натискаючи кнопку
                        <br> «Підписатися», я погоджуюся
                        <br> на обробку та передачу моїх
                        <br> персональних даних</p>
                </div>
            </div>
            <div class="line2">
                <div class="b1">
                    <img class="logo" src="<?php bloginfo('template_directory') ?>/img/logo.svg">
                </div>
                <div class="b2">
                    <a href="<?php echo get_home_url() ?>/shop/">Каталог</a>
                    <a href="<?php echo get_home_url() ?>/shop/">ВСI ТОВАРИ</a>
                    <a href="<?php echo get_home_url() ?>/shop/?sort=new">НОВИНкИ</a>
                    <!-- <a href="#">КОЛЕКЦії</a> -->
                </div>
                <div class="b3">
                    <a href="<?php echo get_home_url() ?>/">ГОЛОВНА</a>
                    <a href="<?php echo get_home_url() ?>/#about-us">ПРО НАС</a>
                    <a href="<?php echo get_home_url() ?>/contacts/">Контакти</a>
                    <a href="<?php echo get_home_url() ?>/bonus-system/">Програма лояльності</a>
                    <a href="<?php echo get_home_url() ?>/return/">Повернення та обмін</a>
                    <a href="<?php echo get_home_url() ?>/payment-and-delivery/">Оплата і доставка</a>
                </div>
                <div class="b4">
                    <a href="#">facebook</a>
                    <a href="#">instagram</a>
                </div>
                <div class="b5">
                    <a href="<?php echo get_home_url() ?>/privacy-policy/">Політика конфіденційності</a>
                    <a href="<?php echo get_home_url() ?>/public-offer-2/">Публічна оферта</a>
                </div>
            </div>
            <div class="line3">
                <div class="b1">
                    <a href="<?php echo get_home_url() ?>/privacy-policy/">Політика конфіденційності</a>
                    <a href="<?php echo get_home_url() ?>/public-offer-2/">Публічна оферта</a>
                </div>
            </div>
        </div>
    </div>
<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="footer">
        <div class="container">
            <div class="line1">
                <div class="b1">
                    <p><span>Subscribe</span>
                         <br>Keep up to date with ours
                         <br> shares and income</p>
                </div>
                <div class="b2">
                    <input type="email" placeholder="Вкажіть ваш e-mail">
                </div>
                <div class="b3">
                    <div class="btn">Subscribe</div>
                </div>
                <div class="b4">
                    <p>By pressing the button
                         <br> "Subscribe", I agree
                         <br> for the processing and transfer
                         <br> of mine personal data</p>
                </div>
            </div>
            <div class="line2">
                <div class="b1">
                    <img class="logo" src="<?php bloginfo('template_directory') ?>/img/logo.svg">
                </div>
                <div class="b2">
                     <a href="<?php echo get_home_url() ?>/shop/">Catalog</a>
                     <a href="<?php echo get_home_url() ?>/shop/">ALL PRODUCTS</a>
                     <a href="<?php echo get_home_url() ?>/shop/?sort=new">NEWS</a>
                     <!-- <a href="#">COLLECTIONS</a> -->
                 </div>
                 <div class="b3">
                     <a href="<?php echo get_home_url() ?>/">HOME</a>
                     <a href="<?php echo get_home_url() ?>/#about-us">ABOUT US</a>
                     <a href="<?php echo get_home_url() ?>/contacts/">Contacts</a>
                     <a href="<?php echo get_home_url() ?>/bonus-system/">Loyalty program</a>
                     <a href="<?php echo get_home_url() ?>/return/">Returns and Exchanges</a>
                     <a href="<?php echo get_home_url() ?>/payment-and-delivery/">Payment and delivery</a>
                 </div>
                 <div class="b4">
                     <a href="#">facebook</a>
                     <a href="#">instagram</a>
                 </div>
                 <div class="b5">
                     <a href="<?php echo get_home_url() ?>/privacy-policy/">Privacy Policy</a>
                     <a href="<?php echo get_home_url() ?>/public-offer-2/">Public offer</a>
                 </div>
             </div>
             <div class="line3">
                 <div class="b1">
                     <a href="<?php echo get_home_url() ?>/privacy-policy/">Privacy Policy</a>
                     <a href="<?php echo get_home_url() ?>/public-offer-2/">Public offer</a>
                 </div>
             </div>
        </div>
    </div>
<?php
}
?>