<?php

/*
*Template name: Return
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
                    $pagename = 'Умови повернення та обміну';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Return and exchange conditions';
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
            <div>
                <h1>Умови повернення та обміну</h1>
                <p>Ви можете здійснити обмін та повернення товару належної якості протягом 14 календарних днів із моменту отримання замовлення.
                <br><br>
                Обмін і повернення товару проводиться, якщо зазначений товар не був у вжитку, збережено його товарний вигляд, споживчі властивості, пломби, фабричні ярлики та оригінальна упаковка, а також, за наявності документа, що підтверджує факт покупки.
                </p>
            </div>

            <div>
                <h1>Процедура повернення та обміну</h1>
                <p>Ви можете самостійно привезти товар до нас в магазин за адресою м. Київ, вул. Мечникова, 7 з 12:00 до 19:00.
                <br><br>
                По Україні обмін можливий за допомогою послуг компанії-перевізника «Нова пошта» згідно з тарифами компанії.
                <br><br>
                За межами України обмін відбувається за допомогою державних чи приватних перевізників за рахунок клієнта.
                <br><br>
                Обміняти чи повернути товар ви можете протягом 14 днів з моменту отримання товару.
                </p>
            </div>
        </div>
    </div>

<?php
} elseif ( $current_language === 'en' ) { 
?>

    <div class="block-1">
         <div class="container">
             <div>
                 <h1>Return and exchange conditions</h1>
                 <p>You can exchange and return goods of the appropriate quality within 14 calendar days from the moment of receiving the order.
                 <br><br>
                 Exchange and return of the product is carried out if the specified product has not been used, its product appearance, consumer properties, seals, factory labels and original packaging have been preserved, as well as if there is a document confirming the fact of purchase.
                 </p>
             </div>

             <div>
                 <h1>Return and exchange procedure</h1>
                 <p>You can bring the goods to our store on your own at the address of Kyiv, st. Mechnikova, 7 from 12:00 to 19:00.
                 <br><br>
                 In Ukraine, the exchange is possible using the services of the carrier company "Nova poshta" according to the company's tariffs.
                 <br><br>
                 Outside of Ukraine, the exchange takes place with the help of state or private carriers at the expense of the client.
                 <br><br>
                 You can exchange or return the product within 14 days of receiving the product.
                 </p>
             </div>
         </div>
     </div>

<?php
}
?> 
    
    <style>
        .block-1 h1{
            text-transform: none;
        }
        .block-1 .container{
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 1fr 200px 1fr;
            grid-template-columns: 1fr 1fr;
            grid-gap: 200px;
        }
        @media(max-width: 1000px){
          .block-1 .container{
                -ms-grid-columns: 1fr;
                grid-template-columns: 1fr;
                grid-gap: 80px;
            }  
        }
    </style>
    
    <?php include 'custom-footer.php' ?>
    
</body>

</html>