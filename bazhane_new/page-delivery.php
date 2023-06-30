<?php

/*
*Template name:  Delivery
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/delivery.css" rel="stylesheet" type="text/css" media="all" />

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
                    $pagename = 'Оплата і доставка';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Payment and delivery';
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
   
    <div class="block-0">
        <div class="container">
            <h2>Доставка та оплата по Україні</h2>
        </div>
    </div>

    <div class="block-1">
        <div class="container">
            <h4>Доставка</h4>
            <div class="block">
                <div class="line variable">
                    <div class="box">
                        <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/novaposhta.png) left center no-repeat; background-size: contain;"></div>
                        <div class="variable"></div>
                    </div>
                    <div class="box">
                        <p>Адресна доставка</p>
                        <p>Доставка у відділення</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-clock.svg">
                        <p class="head">Cтроки доставки</p>
                        <p class="desc">1-3 робочі дні</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                        <p class="head">Оплата доставки</p>
                        <p class="desc">*за рахунок отримувача</p>
                    </div>
                </div>
                <div class="line">
                    <div class="box">
                        <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/logo.svg) left center no-repeat; background-size: contain;"></div>
                        <div class="variable one"></div>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-shop.svg">
                        <p class="desc">Самовивіз з нашого
                            <br> магазину:</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-map.svg">
                        <p class="head">Адреса</p>
                        <p class="desc">Київ, вул. Мечникова, 7
                            <br>З 12:00 до 19:00 кожного дня</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                        <p class="head">Оплата:</p>
                        <p class="desc">готівковий та безготівковий
                            <br>розрахунок</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-1">
        <div class="container">
            <h4>Оплата</h4>
            <div class="block payment">
                <div class="line">
                    <div class="box">
                        <div class="cont">
                            <p class="head">На сайті</p>
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/WayForPay.svg) left center no-repeat; background-size: contain;"></div>
                        </div>
                        <div class="variable one"></div>
                    </div>
                    <div class="box">
                        <p class="head">Накладений платіж</p>
                        <p class="desc">*мінімальна передоплата - 300 грн.
                            <br>+2%+20 грн. за переказ коштів</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-0">
        <div class="container">
            <h2>Доставка та оплата в інші країни</h2>
        </div>
    </div>

    <div class="block-1 outside">
        <div class="container">
            <h4>Доставка</h4>
            <div class="block">
                <div class="line">
                    <div class="box">
                        <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/novaposhta.png) left center no-repeat; background-size: contain;"></div>
                        <div class="variable one"></div>
                    </div>
                    <div class="box">
                        <p class="desc">Адресна доставка</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-clock.svg">
                        <p class="head">Cтроки доставки</p>
                        <p class="desc">10-14 днів</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                        <p class="head">Оплата доставки</p>
                        <p class="desc">*за рахунок отримувача</p>
                    </div>
                </div>
                <div class="line">
                    <div class="box">
                        <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/ukrposhta.png) left center no-repeat; background-size: contain;"></div>
                        <div class="variable one"></div>
                    </div>
                    <div class="box">
                        <p class="desc">Адресна доставка</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-clock.svg">
                        <p class="head">Cтроки доставки</p>
                        <p class="desc">21-28 днів</p>
                    </div>
                    <div class="box">
                        <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                        <p class="head">Оплата:</p>
                        <p class="desc">*за рахунок отримувача</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-1 outside">
        <div class="container">
            <h4>Оплата</h4>
            <div class="block payment">
                <div class="line">
                    <div class="box">
                        <div class="cont">
                            <p class="head">На сайті</p>
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/WayForPay.svg) left center no-repeat; background-size: contain;"></div>
                        </div>
                        <div class="variable one"></div>
                    </div>
                    <div class="box">
                        <p class="head">Накладений платіж</p>
                        <p class="desc">*мінімальна передоплата - 300 грн.
                            <br>+2%+20 грн. за переказ коштів</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
} elseif ( $current_language === 'en' ) { 
?>

    <div class="block-0">
         <div class="container">
             <h2>Delivery and payment in Ukraine</h2>
         </div>
     </div>

     <div class="block-1">
         <div class="container">
             <h4>Delivery</h4>
             <div class="block">
                 <div class="line variable">
                     <div class="box">
                         <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/novaposhta.png) left center no-repeat; background-size: contain;"></div>
                         <div class="variable"></div>
                     </div>
                     <div class="box">
                         <p>Address delivery</p>
                         <p>Delivery to the branch</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-clock.svg">
                         <p class="head">Delivery times</p>
                         <p class="desc">1-3 business days</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                         <p class="head">Shipping payment</p>
                         <p class="desc">*at the expense of the recipient</p>
                     </div>
                 </div>
                 <div class="line">
                     <div class="box">
                         <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/logo.svg) left center no-repeat; background-size: contain;"></div>
                         <div class="variable one"></div>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-shop.svg">
                         <p class="desc">Pick up from our place
                             <br> of the store:</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-map.svg">
                         <p class="head">Address</p>
                         <p class="desc">Kyiv, str. Mechnikova, 7
                             <br>From 12:00 p.m. to 7:00 p.m. every day</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                         <p class="head">Payment:</p>
                         <p class="desc">cash and non-cash
                             <br>calculation</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="block-1">
         <div class="container">
             <h4>Payment</h4>
             <div class="block payment">
                 <div class="line">
                     <div class="box">
                         <div class="cont">
                             <p class="head">On the site</p>
                             <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/WayForPay.svg) left center no-repeat; background-size: contain;"></div>
                         </div>
                         <div class="variable one"></div>
                     </div>
                     <div class="box">
                         <p class="head">Deposited payment</p>
                         <p class="desc">*minimum advance payment - UAH 300.
                             <br>+2%+20 UAH. for the transfer of funds</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="block-0">
         <div class="container">
             <h2>Delivery and payment to other countries</h2>
         </div>
     </div>

     <div class="block-1 outside">
         <div class="container">
             <h4>Delivery</h4>
             <div class="block">
                 <div class="line">
                     <div class="box">
                         <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/novaposhta.png) left center no-repeat; background-size: contain;"></div>
                         <div class="variable one"></div>
                     </div>
                     <div class="box">
                         <p class="desc">Delivery address</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-clock.svg">
                         <p class="head">Delivery times</p>
                         <p class="desc">10-14 days</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                         <p class="head">Shipping payment</p>
                         <p class="desc">*at the expense of the recipient</p>
                     </div>
                 </div>
                 <div class="line">
                     <div class="box">
                         <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/ukrposhta.png) left center no-repeat; background-size: contain;"></div>
                         <div class="variable one"></div>
                     </div>
                     <div class="box">
                         <p class="desc">Delivery address</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-clock.svg">
                         <p class="head">Delivery times</p>
                         <p class="desc">21-28 days</p>
                     </div>
                     <div class="box">
                         <img src="<?php bloginfo('template_directory') ?>/img/delivery-credit-card.svg">
                         <p class="head">Payment:</p>
                         <p class="desc">*at the expense of the recipient</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="block-1 outside">
         <div class="container">
             <h4>Payment</h4>
             <div class="block payment">
                 <div class="line">
                     <div class="box">
                         <div class="cont">
                             <p class="head">On the site</p>
                             <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/WayForPay.svg) left center no-repeat; background-size: contain;"></div>
                         </div>
                         <div class="variable one"></div>
                     </div>
                     <div class="box">
                         <p class="head">Deposited payment</p>
                         <p class="desc">*minimum advance payment - UAH 300.
                             <br>+2%+20 UAH. for the transfer of funds</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

<?php
}
?>   
  
    <?php include 'custom-footer.php' ?>
    
</body>

</html>