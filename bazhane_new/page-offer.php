<?php

/*
*Template name: Public offer
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
                    $pagename = 'Публічна оферта';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Public offer';
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
            <h1>Публічна оферта</h1>
            
            <h2>ЗАГАЛЬНІ ПОЛОЖЕННЯ</h2>
            <p>1.1.Договір оферти, є офіційною пропозицією ФОП Cтилик О.А. (магазин BÁZHАNE), далі за текстом - «Продавець», укласти Договір купівлі-продажу товарів дистанційним способом, а саме через Інтернет-магазин, далі по тексту - «Договір», і розміщує Публічну оферту (пропозицію) на офіційному інтернет-сайті Продавця «www.bazhane.com (далі - «Інтернет-сайт»).<br>
            1.2.Моментом повного і безумовного прийняття Покупцем пропозиції від Продавця (акцептом) укласти електронний договір купівлі-продажу товарів, вважається факт оплати Покупцем замовлення, на умовах цього Договору, у строки та за цінами, вказаними на Інтернет-сайті Продавця.</p>

            <h2>ПОНЯТТЯ І ВИЗНАЧЕННЯ</h2>
            <p>2.1.Згідно цієї оферти, якщо контекст не вимагає іншого, наведені нижче терміни мають таке значення:
            <br>«Товар» — моделі, аксесуари, комплектуючі та супровідні предмети;
            <br>«Інтернет-магазин» — відповідно до Закону України «Про електронну комерцію», засіб для презентації або реалізації товару, роботи або послуги шляхом здійснення електронної угоди.
            <br>«Продавець» — компанія, яка реалізує товари, представлені на Інтернет-сайті. Фізична особа-підприємець Стилик Олег Анатолійович, запис у Єдиному державному реєстрі юридичних осіб, фізичних осіб-підприємців та громадських формувань № 2010350000000247289  від 06.01.2023
            <br>«Покупець» — фізична особа, що уклала з Продавцем Договір на умовах, викладених нижче.
            <br>«Замовлення» — вибір окремих позицій з переліку товарів, визначених Покупцем при розміщенні замовлення і здійсненні оплати.</p>
            
            
            <h2>ПРЕДМЕТ ДОГОВОРУ</h2>
            <p>3.1.Продавець зобов'язується передати у власність Покупця Товар, а Покупець зобов'язується оплатити і прийняти Товар на умовах даного Договору.
            <br>Цей Договір регулює купівлю-продаж товарів в Інтернет-магазині, в тому числі:
            <br>- добровільний вибір Покупцем товарів в Інтернет-магазині;
            <br>- самостійне оформлення Покупцем замовлення в Інтернет-магазині; 
            <br>- оплата Покупцем замовлення, оформленого в Інтернет-магазині;
            <br>- обробка та доставка замовлення Покупцеві у власність на умовах цього Договору.</p>
            
            <h2>ПОРЯДОК ОФОРМЛЕННЯ ЗАМОВЛЕННЯ</h2>
            <p>4.1.Покупець має право оформити замовлення на будь-який товар, представлений на сайті Інтернет-магазину і який є в наявності.
            <br>4.2.Кожна позиція може бути представлена в замовленні в будь-якій кількості
            <br>4.3.При відсутності товару на складі, Менеджер компанії зобов'язаний поставити Покупця до відома (телефоном або через робочі месенджери).
            <br>4.4.При відсутності товару Покупець має право замінити його товаром аналогічної моделі, відмовитися від даного товару, анулювати замовлення.</p>
            
            <h2>ПОРЯДОК ОПЛАТИ ЗАМОВЛЕННЯ НАКЛАДЕНИМ ПЛАТЕЖЕМ</h2>
            <p>5.1.Оплата здійснюється за фактом отримання товару у відділеннях транспортних компаній за готівковий розрахунок в національній валюті.
            <br>5.2.При ненадходженні грошових коштів, Інтернет-магазин залишає за собою право анулювати замовлення.</p>
            
            <h2>УМОВИ ДОСТАВКИ ЗАМОВЛЕННЯ</h2>
            <p>6.1.Доставка товарів, придбаних в Інтернет-магазині, здійснюється до відділень Нової Пошти, Укрпошти, де і відбувається видача замовлень.
            <br>6.2.Разом із замовленням Покупцеві видаються документи згідно із законодавством України.</p>
            
            <h2>ПРАВА ТА ОБОВ'ЯЗКИ СТОРІН:</h2>
            <p>7.1.Продавець має право:
            <br>- в односторонньому порядку припинити надання послуг за цим договором у разі порушення Покупцем умов цього Договору.
            <br>7.2.Покупець зобов'язаний:
            <br>- своєчасно оплатити та отримати замовлення на умовах цього Договору.
            <br>7.3.Покупець має право:
            <br>- оформити замовлення в Інтернет-магазині;
            <br>- оформити електронний договір;
            <br>- вимагати від Продавця виконання умов цього Договору.</p>
            
            <h2>ВІДПОВІДАЛЬНІСТЬ СТОРІН</h2>
            <p>8.1.Сторони несуть відповідальність за невиконання або неналежне виконання умов цього Договору в порядку, передбаченому цим Договором та чинним законодавством України
            <br>8.2.Продавець не несе відповідальності:
            <br>- за змінений виробником зовнішній вигляд Товару;
            <br>- за незначну невідповідність колірної гами товару, що може відрізнятися від оригіналу товару виключно через різну колірну передачу моніторів персональних комп'ютерів окремих моделей і мобільних пристроїв;
            <br>- за зміст і правдивість інформації, наданої Покупцем при оформленні замовлення;
            <br>- за затримку і перебої в наданні Послуг (обробки замовлення і доставки товару), які відбуваються з причин, що знаходяться поза сферою контролю Продавця;
            <br>8.3.В разі настання обставин непереборної сили, сторони звільняються від виконання умов цього Договору. Під обставинами непереборної сили для цілей цього Договору розуміються події, що мають надзвичайний, непередбачуваний характер, які виключають або об'єктивно заважають виконанню цього Договору. Настання яких Сторони не могли передбачити і запобігти.
            <br>8.4.Сторони прикладуть максимум зусиль для вирішення будь-яких розбіжностей виключно шляхом переговорів</p>
            
            <h2>ВІДПОВІДАЛЬНІСТЬ СТОРІН</h2>
            <p>9.1.Інтернет-магазин залишає за собою право в односторонньому порядку вносити зміни до цього Договору, за умови попередньої публікації його на сайті https://www.bazhane.com.
            <br>9.2.Інтернет-магазин створений для організації дистанційного способу продажу товарів через Інтернет.
            <br>9.3.Покупець несе відповідальність за достовірність інформації, зазначеної при оформленні замовлення. При здійсненні акцепту (оформленні замовлення і подальшої оплати товару) Покупець надає Продавцю свою беззастережну згоду на збір, обробку, зберігання, використання своїх персональних даних, згідно ЗУ «Про захист персональних даних».
            <br>9.4.Оплата Покупцем оформленого в Інтернет-магазині замовлення, означає повну згоду Покупця з умовами договору купівлі-продажу (публічної оферти).
            <br>9.5.Фактичною датою електронної угоди між сторонами є дата прийняття умов, відповідно до статті 11 Закону України «Про електронну комерцію».
            <br>9.6.Перегляд товарів і процес оформлення замовлення для Покупця є безкоштовним.
            <br>9.7.Інформація, що надається Покупцем, є конфіденційною. Інтернет-магазин використовує інформацію про Покупця виключно в цілях обробки замовлення, відправлення повідомлень Покупцеві, доставки товару, здійснення взаєморозрахунків та інших дій, пов'язаних з виконанням замовлення.</p>
            
            <h2>ПОРЯДОК ПОВЕРНЕННЯ ТОВАРУ НАЛЕЖНОЇ ЯКОСТІ</h2>
            <p>10.1.Повернення товару в Інтернет-магазин проводиться згідно з чинним законодавством України.
            <br>10.2.Повернення товару належної якості в Інтернет-магазин проводиться за рахунок Покупця.
            <br>10.3.У разі повернення Покупцем товару належної якості, Інтернет-магазин повертає йому сплачену за товар грошову суму, за фактом повернення товару за вирахуванням компенсації витрат Інтернет-магазину пов'язаних з доставкою товару Покупцеві.</p>
            
            <h2>ТЕРМІН ДІЇ ДОГОВОРУ</h2>
            <p>11.1.Електронний договір вважається укладеним з моменту одержання особою, яка направила пропозицію укласти такий договір, відповіді про прийняття цієї пропозиції в порядку, визначеному частиною шостою статті 11 Закону України «Про електронну комерцію».
            <br>11.2.До закінчення терміну дії, цей Договір може бути розірваний за взаємною згодою сторін до початку процесу фактичної доставки товару, шляхом повернення грошових коштів.
            <br>11.3.Сторони мають право розірвати цей Договір в односторонньому порядку, в разі невиконання однією із сторін умов цього Договору, та у випадках передбачених чинним законодавством України.
            <br>Звертаємо вашу увагу, що магазин «BAZHÁNE» на офіційному інтернет-сайті https://www.bazhane.com, має право, відповідно до законодавства України, надавати право користування інтернет платформою ФОП і юридичним особам для реалізації товару.</p>

            
            
            
        </div>
    </div>

<?php
} elseif ( $current_language === 'en' ) { 
?>

<div class="block-1">
         <div class="container">
             <h1>Public offer</h1>
            
             <h2>GENERAL PROVISIONS</h2>
             <p>1.1. The contract of offer is an official offer of FOP Ctylyk O.A. (BÁZHANE store), hereinafter referred to as the "Seller", conclude the Contract for the sale of goods remotely, namely through the Internet store, hereinafter referred to as the "Contract", and places the Public Offer (offer) on the official website of the Seller "www.bazhane.com (hereinafter - the "Website").<br>
             1.2. The moment of complete and unconditional acceptance by the Buyer of the offer from the Seller (acceptance) to conclude an electronic contract for the purchase and sale of goods is considered the fact of payment by the Buyer of the order, under the terms of this Agreement, within the terms and at the prices indicated on the Seller's Internet site.</p>

             <h2>CONCEPTS AND DEFINITIONS</h2>
             <p>2.1. For the purposes of this offer, unless the context otherwise requires, the following terms shall have the following meanings:
             <br>"Product" — models, accessories, components and accompanying items;
             <br>"Internet store" — in accordance with the Law of Ukraine "On Electronic Commerce", means for the presentation or sale of goods, work or services through the execution of an electronic agreement.
             <br>"Seller" is a company that sells goods presented on the Internet site. Individual entrepreneur Oleg Stylyk, entry in the Unified State Register of Legal Entities, Individual Entrepreneurs and Public Organizations No. 2010350000000247289 dated 06.01.2023
             <br>"Buyer" is a natural person who entered into an Agreement with the Seller on the terms set forth below.
             <br>"Order" is the selection of individual items from the list of goods specified by the Buyer when placing the order and making payment.</p>
            
            
             <h2>OBJECT OF THE AGREEMENT</h2>
             <p>3.1. The Seller undertakes to hand over the Goods to the Buyer, and the Buyer undertakes to pay for and accept the Goods under the terms of this Agreement.
             <br>This Agreement regulates the purchase and sale of goods in the online store, including:
             <br>- voluntary choice by the Buyer of goods in the online store;
             <br>- self-registration of the order by the Buyer in the online store;
             <br>- payment by the Buyer of the order placed in the online store;
             <br>- processing and delivery of the order to the Buyer under the terms of this Agreement.</p>
            
             <h2>ORDER PROCEDURE</h2>
             <p>4.1. The buyer has the right to place an order for any product presented on the website of the online store and which is available.
             <br>4.2. Each item can be presented in the order in any quantity
             <br>4.3. If the goods are not in stock, the Company Manager is obliged to inform the Buyer (by phone or through working messengers).
             <br>4.4. If the product is not available, the Buyer has the right to replace it with a product of a similar model, refuse this product, cancel the order.</p>
            
             <h2>CARD ON ORDER PAYMENT PROCEDURE</h2>
             <p>5.1. Payment is made upon receipt of the goods in the branches of transport companies for cash settlement in the national currency.
             <br>5.2. If the funds are not received, the online store reserves the right to cancel the order.</p>
            
             <h2>TERMS OF ORDER DELIVERY</h2>
             <p>6.1. Delivery of goods purchased in the online store is carried out to branches of Nova Poshta, Ukrposhta, where orders are issued.
             <br>6.2. Along with the order, documents are issued to the Buyer in accordance with the legislation of Ukraine.</p>
            
            <h2>RIGHTS AND OBLIGATIONS OF THE PARTIES:</h2>
             <p>7.1. The seller has the right to:
             <br>- to unilaterally terminate the provision of services under this contract in the event of a breach by the Buyer of the terms of this contract.
             <br>7.2. The buyer is obliged to:
             <br>- to pay and receive the order in a timely manner under the terms of this Agreement.
             <br>7.3. The buyer has the right:
             <br>- place an order in the online store;
             <br>- issue an electronic contract;
             <br>- to require the Seller to fulfill the terms of this Agreement.</p>
            
             <h2>LIABILITY OF THE PARTIES</h2>
             <p>8.1. The parties are responsible for non-fulfillment or improper fulfillment of the terms of this Agreement in accordance with the procedure provided for by this Agreement and the current legislation of Ukraine
             <br>8.2. The seller is not responsible for:
             <br>- according to the appearance of the Product changed by the manufacturer;
             <br>- for a slight discrepancy in the color range of the product, which may differ from the original product solely due to different color rendering of personal computer monitors of individual models and mobile devices;
             <br>- for the content and truthfulness of the information provided by the Buyer when placing the order;
             <br>- for delays and interruptions in the provision of Services (order processing and delivery of goods) that occur for reasons beyond the Seller's control;
             <br>8.3. In the event of force majeure, the parties are released from fulfilling the terms of this Agreement. Circumstances of force majeure for the purposes of this Agreement mean events of an extraordinary, unforeseeable nature that exclude or objectively interfere with the performance of this Agreement. The occurrence of which the Parties could not foresee and prevent.
             <br>8.4. The parties will use their best efforts to resolve any disagreements exclusively through negotiations</p>
            
             <h2>LIABILITY OF THE PARTIES</h2>
             <p>9.1. The online store reserves the right to unilaterally make changes to this Agreement, subject to its prior publication on the website https://www.bazhane.com.
             <br>9.2. The online store was created to organize a remote method of selling goods via the Internet.
             <br>9.3. The buyer is responsible for the accuracy of the information specified when placing the order. When making an acceptance (placing an order and subsequent payment for the goods), the Buyer gives the Seller his unconditional consent to the collection, processing, storage, and use of his personal data, in accordance with the Law "On the Protection of Personal Data".
             <br>9.4. Payment by the Buyer of the order made in the online store means the Buyer's full agreement with the terms of the sales contract (public offer).
             <br>9.5. The actual date of the electronic agreement between the parties is the date of acceptance of the terms, in accordance with Article 11 of the Law of Ukraine "On Electronic Commerce".
             <br>9.6. Viewing goods and the process of placing an order is free of charge for the Buyer.
             <br>9.7. The information provided by the Buyer is confidential. The online store uses information about the Buyer exclusively for the purpose of processing the order, sending messages to the Buyer, delivering the goods, making mutual payments and other actions related to the execution of the order.</p>
            
             <h2>PROCEDURE FOR RETURNING GOODS OF PROPER QUALITY</h2>
             <p>10.1. The return of goods to the online store is carried out in accordance with the current legislation of Ukraine.
             <br>10.2. The return of goods of appropriate quality to the online store is carried out at the expense of the Buyer.
             <br>10.3. In the event that the Buyer returns the goods of proper quality, the Online Store will return to him the amount paid for the goods, upon the fact of returning the goods, after deducting compensation for the costs of the Online Store related to the delivery of the goods to the Buyer.</p>
            
             <h2>TERM OF THE CONTRACT</h2>
             <p>11.1. An electronic contract is considered to have been concluded from the moment the person who sent the proposal to conclude such a contract receives a response to the acceptance of this proposal in accordance with the procedure specified in part six of Article 11 of the Law of Ukraine "On Electronic Commerce".
             <br>11.2. Before the expiration of this Agreement, this Agreement may be terminated by mutual consent of the parties before the actual delivery of the goods begins, by means of a refund.
             <br>11.3. The parties have the right to terminate this Agreement unilaterally, in case of non-fulfillment of the terms of this Agreement by one of the parties, and in the cases stipulated by the current legislation of Ukraine.
             <br>We draw your attention to the fact that the "BAZHÁNE" store on the official website https://www.bazhane.com has the right, in accordance with the legislation of Ukraine, to grant the right to use the Internet platform to sole traders and legal entities for the sale of goods.</ p>

            
            
            
         </div>
     </div>

<?php
}
?> 
    
    <?php include 'custom-footer.php' ?>
    
</body>

</html>