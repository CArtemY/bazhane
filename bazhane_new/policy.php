<?php

/*
*Template name: Policy
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/privacy.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="">

    <?php include 'custom-header.php'; ?>
    
    <div class="breadcrumbs">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item" bis_skin_checked="1">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <?php
                if ( $current_language === 'uk' ) { 
                    $pagename = 'ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'PRIVACY POLICY';
                }
                ?>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" title="<?php echo $pagename; ?>">
                        <span itemprop="name"><?php echo $pagename; ?></span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
        </div>
    </div>

<?php
if ( $current_language === 'uk' ) { 
?>  
    <div class="block-1">
        <div class="container">
            <h1>ПОЛІТИКА КОНФІДЕНЦІЙНОСТІ</h1>
            <p>1. Кожен раз, коли ви використовуєте цей сайт, ви погоджуєтеся з політикою конфіденційності. Будь ласка, ознайомтеся з політикою конфіденційності інтернет - магазину BÁZHАNE.
            <br><br>
            2. Персональні дані, надані вами будуть оброблені та збережені компанією BÁZАNE з наступними цілями: <br>
            I. Персоналізовані відповіді на ваші запити.<br>
            II. Надання вам інформації про товари, розпродажі і оновлення на сайті.<br>
            III. У разі, якщо ви надасте нам інформацію від імені третіх осіб, ви будете нести відповідальність за отримання їх згоди на використання цієї інформації з метою,  що описані нижче.<br>
            <br><br>
            3. Особиста інформація яку надає клієнт для оформлення замовлення в магазині, контактній формі, яка доступна на сайті, а також інформація, отримана в рамках обслуговування клієнтів в робочих месенджерах, буде оброблена BÁZHАNE і використана виключно з метою вирішення питань пов'язаних з клієнтським сервісом, товаром та замовленням. 
            <br><br>
            4. BÁZHАNE несе відповідальність за надану інформацію, зобов'язується дотримуватися конфіденційності ваших особистих даних і гарантує вам можливість здійснювати доступ, виправлення, анулювання даної інформації по електронній пошті info@bazhane.com При необхідності, ми попросимо вас надати нам копію вашого посвідчення особи, паспорт або інший дійсний документ, що засвідчує особистість</p>
        </div>
    </div>
<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-1">
         <div class="container">
             <h1>PRIVACY POLICY</h1>
             <p>1. Each time you use this site, you agree to the privacy policy. Please read the privacy policy of the BÁZHANE online store.
             <br><br>
             2. Personal data provided by you will be processed and stored by BÁZANE for the following purposes:<br>
             I. Personalized responses to your inquiries.<br>
             II. Providing you with information about products, sales and updates on the site.<br>
             III. If you provide us with information on behalf of third parties, you will be responsible for obtaining their consent to use that information for the purposes described below.<br>
             <br><br>
             3. Personal information provided by the customer for placing an order in the store, the contact form available on the website, as well as information received as part of customer service in working messengers, will be processed by BÁZHANE and used exclusively for the purpose of solving issues related to customer service , product and order.
             <br><br>
             4. BÁZHANE is responsible for the information provided, undertakes to maintain the confidentiality of your personal data and guarantees you the ability to access, correct, cancel this information by e-mail info@bazhane.com If necessary, we will ask you to provide us with a copy of your identity card, passport or other valid identity document</p>
         </div>
     </div>
<?php
}
?> 
    <?php include 'custom-footer.php' ?>
    
</body>

</html>