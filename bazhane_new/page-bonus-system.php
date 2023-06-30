<?php

/*
*Template name: Bonus System
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/bonus-system.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="">

    <?php include 'custom-header.php'; ?>
    
    <div class="breadcrumbs">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <?php
                if ( $current_language === 'uk' ) { 
                    $pagename = 'Програма лояльності';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Loyalty program';
                }
                ?>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="../" itemprop="item" title="<?php echo $pagename; ?>">
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
            <p class="head">Для наших постійних клієнтів ми створили накопичувальну програму лояльності.<br> Приєднатись до програми можна вже після першої покупки у нашому магазині <br><span>Програма діє тільки для зареєстрованих на сайті користувачів.</span></p>
            <p class="subhead">Як це працює?</p>
            <div class="block">
                <div class="box">
                    <div class="color"></div>
                    <h4>1. New client</h4>
                    <p>перша покупка - бонус 3% <br>*нараховується незалежно від суми, можна використати на наступну покупку</p>
                </div>
                <div class="box">
                    <div class="color"></div>
                    <h4>2. Loyal client</h4>
                    <p>при покупці від 20 000 грн. - бонус 5%<br>* можна використати на наступну покупку</p>
                </div>
                <div class="box">
                    <div class="color"></div>
                    <h4>3. Special client</h4>
                    <p>при покупці від 35 000 грн. - бонус 7%<br>* можна використати на наступну покупку</p>
                </div>
                <div class="box">
                    <div class="color"></div>
                    <h4>4. Friend</h4>
                    <p>при покупці від 55 000 грн. - бонус 10%<br>* можна використати на наступну покупку</p>
                    <div class="dop">подарунок-сюрприз від нас при переході на цей рівень</div>
                </div>
                <div class="box">
                    <div class="color"></div>
                    <h4>5. Best Friend</h4>
                    <p>при покупці від 75 000 грн. - бонус 12%<br>* можна використати на наступну покупку</p>
                    <div class="dop">подарунок-сюрприз від нас при переході на цей рівень</div>
                </div>
                <div class="box">
                    <div class="color"></div>
                    <h4>6. Best Friend Forever</h4>
                    <p>при покупці від 100 000 грн. - бонус 15%<br>* можна використати на наступну покупку</p>
                    <div class="dop">подарунок-сюрприз від нас при переході на цей рівень</div>
                </div>
            </div>
            <p class="after">* Бонусами можна оплатити не більше, ніж половину від вартості товару. Бонуси не плюсуються з іншими акційними знижками.<br><br>В кінці календарного року бонуси згорають, тому рекомендуємо використати їх до цього терміну.</p>
        </div>
    </div>
<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-1">
         <div class="container">
             <p class="head">We have created an accumulative loyalty program for our regular customers.<br> You can join the program after the first purchase in our store <br><span>The program is valid only for users registered on the site.</span ></p>
             <p class="subhead">How does it work?</p>
             <div class="block">
                 <div class="box">
                     <div class="color"></div>
                     <h4>1. New client</h4>
                     <p>first purchase - 3% bonus <br>*regardless of the amount, can be used for the next purchase</p>
                 </div>
                 <div class="box">
                     <div class="color"></div>
                     <h4>2. Loyal client</h4>
                     <p>when purchasing from UAH 20,000. - 5%<br>* bonus can be used for the next purchase</p>
                 </div>
                 <div class="box">
                     <div class="color"></div>
                     <h4>3. Special client</h4>
                     <p>when purchasing from UAH 35,000. - 7%<br>* bonus can be used for the next purchase</p>
                 </div>
                 <div class="box">
                     <div class="color"></div>
                     <h4>4. Friend</h4>
                     <p>when purchasing from UAH 55,000. - 10% bonus <br>* can be used for your next purchase</p>
                     <div class="dop">a surprise gift from us when you move to this level</div>
                 </div>
                 <div class="box">
                     <div class="color"></div>
                     <h4>5. Best Friend</h4>
                     <p>when purchasing from UAH 75,000. - 12% bonus <br>* can be used for your next purchase</p>
                     <div class="dop">a surprise gift from us when you move to this level</div>
                 </div>
                 <div class="box">
                     <div class="color"></div>
                     <h4>6. Best Friend Forever</h4>
                     <p>when purchasing from UAH 100,000. - 15% bonus <br>* can be used for your next purchase</p>
                     <div class="dop">a surprise gift from us when you move to this level</div>
                 </div>
             </div>
             <p class="after">* Bonuses can be used to pay no more than half of the cost of the product. Bonuses cannot be combined with other promotional discounts.<br><br>At the end of the calendar year, bonuses burn out, so we recommend using them before this deadline.</p>
         </div>
    </div>
<?php
}
?>

    
    <?php include 'custom-footer.php' ?>
    
</body>

</html>