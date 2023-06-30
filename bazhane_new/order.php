<?php

/*
*Template name: Order
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/order.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/account-nav.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

</head>

<body class="">
    
    <?php
    $user_id = get_current_user_id(); // Получение ID текущего пользователя
// $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id); // Создание объекта YITH_WC_Points_Rewards_Customer
// $bonusesUse = 100; // Количество бонусов для списания


// Подключение файла плагина
// require_once '../../plugins/yith-woocommerce-points-and-rewards-premium/includes/legacy/abstract-yith-wc-points-rewards-legacy.php';

// // Создание экземпляра класса YITH_WC_Points_Rewards


    ?>
    
    <div id="block-0000"></div>

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
                    $pagename = 'оформлення замовлення';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'placing an order';
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
            <div class="cont">
                <div class="place">
                    <h2>Де і як ви хочете отримати замовлення?</h2>
                    <div class="vars">
                        <input type="radio" id="butik" name="deliverytype" checked>
                        <input type="radio" id="delivery" name="deliverytype">

                        <input type="radio" id="novaposhta" name="deliverypost" checked>
                        <input type="radio" id="ukrposhta" name="deliverypost">

                        <input type="radio" id="adress" name="deliveryvar" checked>
                        <input type="radio" id="postoffice" name="deliveryvar">

                        <label class="label butik" for="butik">
                            <p class="head">Забрати з бутіку</p>
                            <p class="desc">Сьогодні, безкоштовно</p>
                            <span></span>
                        </label>
                        <label class="label delivery" for="delivery">
                            <p class="head">Оформити доставку</p>
                            <p class="desc">23 березня та пізніше, від 0 ₴</p>
                            <span></span>
                        </label>
                        <div class="var v1 butik">
                            <div class="box">
                                <h3>Київ, вул. Мечникова, б. 7</h3>
                                <p class="time">ПН-ВС 12:00 - 19:00</p>
                                <a href="#">Показати на мапі</a>
                            </div>
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/location.png) center center no-repeat; background-size: cover;"></div>
                        </div>
                        <div class="var v2 delivery">
                            <label class="label novaposhta" id="novaposhta-label" for="novaposhta">
                                <p class="head">По Україні</p>
                                <img src="<?php bloginfo('template_directory') ?>/img/novaposhta.png">
                                <span></span>
                            </label>
                            <label class="label ukrposhta" id="ukrposhta-label" for="ukrposhta">
                                <p class="head">В інші країни</p>
                                <div class="img-box">
                                    <img src="<?php bloginfo('template_directory') ?>/img/novaposhta.png">
                                    <img src="<?php bloginfo('template_directory') ?>/img/ukrposhta.png">
                                </div>
                                <span></span>
                            </label>
                        </div>
                        <div class="deliveryvars" id="deliveryvars">
                            <input type="radio" id="adress" name="deliveryvar">
                            <input type="radio" id="postoffice" name="deliveryvar">
                            <label class="label adress" for="adress">
                                <p class="head">Адресна доставка</p>
                                <span></span>
                            </label>
                            <label class="label postoffice" for="postoffice">
                                <p class="head">Доставка до віддлення</p>
                                <span></span>
                            </label>
                            <div class="var v1 adress">
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="adress-city" placeholder="NAME">
                                    <label>Місто</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="adress-street" placeholder="NAME">
                                    <label>Вулиця</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="adress-house" placeholder="NAME">
                                    <label>Будинок/корпус</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="adress-apartment" placeholder="NAME">
                                    <label>Квартира</label>
                                </div>
                            </div>
                            <div class="var v1 postoffice">
 <?php

  

// Создаем экземпляр класса LegacyCheckoutService
$legacyCheckoutService = new \kirillbdev\WCUkrShipping\Services\Checkout\LegacyCheckoutService();
 


// Выводим поля плагина wc_ukr_shipping
 $legacyCheckoutService->renderCheckoutFields('shipping'); // Замените 'billing' на 'shipping', если вам нужны поля для адреса  
 

 ?>
 
	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>


		
		
  <div class="input i1 input-wrapper">
                                     
                                </div>
                                
     
 
                            <!--    <div class="input i1 input-wrapper">
                                    <input type="text" id="postoffice-city" placeholder="NAME">
                                    <label>Місто</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="postoffice-postoffice" placeholder="NAME">
                                    <label>Номер віддлення</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="deliveryvars out">
                            <div class="var">
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-index" placeholder="NAME">
                                    <label>Индекс</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-country" placeholder="NAME">
                                    <label>Країна</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-city" placeholder="NAME">
                                    <label>Місто</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-street" placeholder="NAME">
                                    <label>Вулиця</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-house" placeholder="NAME">
                                    <label>Будинок/корпус</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-apartment" placeholder="NAME">
                                    <label>Квартира</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <h2>Як ви хочете сплатити замовлення?</h2>
                <div class="vars payment">
                    <input type="radio" id="ondelivery" name="paymentvar" checked>
                    <input type="radio" id="site" name="paymentvar">
                    <label class="label ondelivery" for="ondelivery">
                        <p class="head">При отриманні</p>
                        <p class="desc">Готівкою або банківською карткою</p>
                        <span></span>
                    </label>
                    <label class="label site" for="site">
                        <p class="head">Оплата на сайті</p>
                        <img src="<?php bloginfo('template_directory') ?>/img/WayForPay.svg">
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="cont">
                <div class="recipient">
                    <h2>Вкажіть дані одержувача</h2>
                    <div class="block">
                        <div class="input i1 input-wrapper">
                            <input type="text" id="user-name" placeholder="NAME">
                            <label>Імʼя</label>
                        </div>
                        <div class="input i1 input-wrapper">
                            <input type="text" id="user-email" placeholder="NAME">
                            <label>E-mail</label>
                        </div>
                        <div class="input i1 input-wrapper">
                            <input type="text" id="user-lastname" placeholder="NAME">
                            <label>Прізвище</label>
                        </div>
                        <div class="input i1 input-wrapper">
                            <input type="text" id="user-phone" placeholder="NAME">
                            <label>Телефон</label>
                        </div>
                        <div class="input i1 input-wrapper">
                            <input type="text" id="user-thirdname" placeholder="NAME">
                            <label>По батькові</label>
                        </div>
                    </div>
                    <?php
                        // Получаем текущую корзину
                        $cart = WC()->cart;
                        
                        // Пересчитываем сумму и другие значения корзины
                        WC()->cart->calculate_totals();
                        
                        // Выводим обновленную сумму товаров в корзине
                        $total = $woocommerce->cart->total; // Получаем общую сумму корзины
                        
                        if (isset($_COOKIE['bazahne_use_bonuses'])) {
                            $cookieValue = $_COOKIE['bazahne_use_bonuses'];
                            $bonusesUse = (int)$cookieValue;
                        } else {
                            $bonusesUse = 0;
                        }
                        
                        $numeric_total = (int)floatval(preg_replace('/[^0-9\.]/', '', $total)); // Удаляем все символы, кроме цифр и точки
                        $numeric_total = $numeric_total - $bonusesUse;
                        
                        $number_space = number_format($numeric_total, 0, '', ' ');
                    ?>
                    <div class="final">
                        <div class="final-cont">
                            <div class="summ">
                                <p class="head">Загальна вартість:</p>
                                <p class="summ"><?php echo $number_space ?> ₴</p>
                            </div>
                            <div class="btn" onclick="getDeliveryData()">Оформити
                                <br> замовлення</div>
                            <p class="desc">Завершуючи оформлення замовлення, я&nbsp;даю згоду на&nbsp;обробку та&nbsp;передачу моїх персональних даних</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function getUserData(){
            deliveryUser = '';
            errors = [];
            name = document.getElementById('user-name').value;
            if (name.length==0){
                document.getElementById('user-name').classList.add('error');
                errors.push('name');
            }
            lastname = document.getElementById('user-lastname').value;
            if (lastname.length==0){
                document.getElementById('user-lastname').classList.add('error');
                errors.push('lastname');
            }
            thirdname = document.getElementById('user-thirdname').value;
            if (thirdname.length==0){
                document.getElementById('user-thirdname').classList.add('error');
                errors.push('thirdname');
            }
            email = document.getElementById('user-email').value;
            if (validateEmailForm(email)) {
            } else {
                errors.push('email');
                document.getElementById('user-email').classList.add('error');
            }
            phone = document.getElementById('user-phone').value;
            if (phone.length==0){
                document.getElementById('user-phone').classList.add('error');
                errors.push('phone');
            }
            
            if (errors.length == 0){
                deliveryUser += name + '; ' + lastname + '; ' + thirdname + '; ' + email + '; ' + phone;
                return deliveryUser;
            }
        }
        
        function getPayment(){
            if (document.getElementById('ondelivery').checked){
                getPayment = 'Наложенный платеж';
            } else {
                getPayment = 'На сайте';
            }
            return getPayment;
        }
        
        function getDeliveryData(){
            deliveryAdress = '';
            if (document.getElementById('butik').checked){
                deliveryAdress = 'Самовывоз';
                console.log(deliveryAdress);
                deliveryUser = getUserData();
                // deliveryPayment = getPayment();
                if (document.getElementById('ondelivery').checked){
                    deliveryPayment= 'Наложенный платеж';
                } else {
                    deliveryPayment = 'На сайте';
                }
                
                finalStep(deliveryUser, deliveryPayment, deliveryAdress);
            } else {
                if (document.getElementById('ukrposhta').checked){
                    deliveryAdress = 'За гранийцу - ';
                    errors = [];
                    index = document.getElementById('ukrposhta-index').value;
                    if (index.length==0){
                        document.getElementById('ukrposhta-index').classList.add('error');
                        errors.push('index');
                    }
                    country = document.getElementById('ukrposhta-country').value;
                    if (country.length==0){
                        document.getElementById('ukrposhta-country').classList.add('error');
                        errors.push('country');
                    }
                    city = document.getElementById('ukrposhta-city').value;
                    if (city.length==0){
                        document.getElementById('ukrposhta-city').classList.add('error');
                        errors.push('city');
                    }
                    street = document.getElementById('ukrposhta-street').value;
                    if (street.length==0){
                        document.getElementById('ukrposhta-street').classList.add('error');
                        errors.push('street');
                    }
                    house = document.getElementById('ukrposhta-house').value;
                    if (house.length==0){
                        document.getElementById('ukrposhta-house').classList.add('error');
                        errors.push('house');
                    }
                    apartment = document.getElementById('ukrposhta-apartment').value;
                    if (apartment.length==0){
                        document.getElementById('ukrposhta-apartment').classList.add('error');
                        errors.push('apartment');
                        deliveryUser = getUserData();
                        // deliveryPayment = getPayment();
                        if (document.getElementById('ondelivery').checked){
                            deliveryPayment = 'Наложенный платеж';
                        } else {
                            deliveryPayment = 'На сайте';
                        }
                        
                        finalStep(deliveryUser, deliveryPayment, deliveryAdress);
                    }
                    
                    if (errors.length == 0){
                        deliveryAdress += index + '; ' + country + '; ' + city + '; ' + street + '; ' + house + '; ' + apartment;
                        console.log(deliveryAdress);
                    }
                } else {
                    if (document.getElementById('adress').checked){
                        deliveryAdress = 'По Украине Адрессная - ';
                        errors = [];
                        city = document.getElementById('adress-city').value;
                        if (city.length==0){
                            document.getElementById('adress-city').classList.add('error');
                            errors.push('city');
                        }
                        street = document.getElementById('adress-street').value;
                        if (street.length==0){
                            document.getElementById('adress-street').classList.add('error');
                            errors.push('street');
                        }
                        house = document.getElementById('adress-house').value;
                        if (house.length==0){
                            document.getElementById('adress-house').classList.add('error');
                            errors.push('house');
                        }
                        apartment = document.getElementById('adress-apartment').value;
                        if (apartment.length==0){
                            document.getElementById('adress-apartment').classList.add('error');
                            errors.push('apartment');
                        }
                        
                        if (errors.length == 0){
                            deliveryAdress += city + '; ' + street + '; ' + house + '; ' + apartment;
                            console.log(deliveryAdress);
                            deliveryUser = getUserData();
                            // deliveryPayment = getPayment();
                            if (document.getElementById('ondelivery').checked){
                                deliveryPayment = 'Наложенный платеж';
                            } else {
                                deliveryPayment = 'На сайте';
                            }
                            
                            finalStep(deliveryUser, deliveryPayment, deliveryAdress);
                        }
                    } else{
                        deliveryAdress = 'По Украине Отделение - ';
                        errors = [];
                        city = document.getElementById('postoffice-city').value;
                        if (city.length==0){
                            document.getElementById('postoffice-city').classList.add('error');
                            errors.push('city');
                        }
                        postoffice = document.getElementById('postoffice-postoffice').value;
                        if (street.length==0){
                            document.getElementById('postoffice-postoffice').classList.add('error');
                            errors.push('street');
                        }
                        
                        if (errors.length == 0){
                            deliveryAdress += city + '; ' + postoffice;
                            console.log(deliveryAdress);
                            deliveryUser = getUserData();
                            // deliveryPayment = getPayment();
                            if (document.getElementById('ondelivery').checked){
                                deliveryPayment = 'Наложенный платеж';
                            } else {
                                deliveryPayment = 'На сайте';
                            }
                            
                            finalStep(deliveryUser, deliveryPayment, deliveryAdress);
                        }
                    }
                }
            }
        }
        
        function finalStep(deliveryUser, deliveryPayment, deliveryAdress){
            let arr = deliveryUser.split('; ');
            Name = arr[0];
            Mail = arr[3];
            
            console.log('Name - ' + Name);
            console.log('Mail - ' + Mail);
            console.log('deliveryAdress - ' + deliveryAdress);
            console.log('deliveryPayment - ' + deliveryPayment);
            console.log('deliveryUser - ' + deliveryUser);

            $.ajax({
                url: '<?php bloginfo('template_directory') ?>/sysytem_create_order.php',
                type: 'POST',
                data: {
                    Name: Name,
                    Mail: Mail,
                    deliveryAdress: deliveryAdress,
                    deliveryPayment: deliveryPayment,
                    deliveryUser: deliveryUser
                },
                success: function(response) {
                    // Успешный запрос
                    if (document.getElementById('site').checked){
                        if (document.getElementById('butik').checked){
                            dop = '?mess=mess2';
                        } else {
                            dop = '?mess=mess4';
                        }
                    } else if (document.getElementById('butik').checked){
                        dop = '?mess=mess1';
                    } else {
                        dop = '?mess=mess3';
                    }
                    
                    link = "<?php echo get_home_url() ?>/thank/" + dop;
                    window.location=link;
                },
                error: function(xhr, status, error) {
                    // Ошибка запроса
                    console.log('Ошибка запроса. Статус: ' + status);
                }
            });
        }
        
        function validateEmailForm(email) {
            if (email == ''){
                return false;
            } else {
                var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                return re.test(String(email).toLowerCase());
            }
        }
        // document.getElementById('ukrposhta-index').classList.add('error');
        // document.getElementById('ukrposhta-country').classList.add('error');
        // document.getElementById('ukrposhta-city').classList.add('error');
        // document.getElementById('ukrposhta-street').classList.add('error');
        // document.getElementById('ukrposhta-house').classList.add('error');
        // document.getElementById('ukrposhta-apartment').classList.add('error');
        
    </script>

<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-1">
        <div class="container">
            <div class="cont">
                <div class="place">
                    <h2>Where and how do you want to receive the order?</h2>
                    <div class="vars">
                        <input type="radio" id="butik" name="deliverytype" checked>
                        <input type="radio" id="delivery" name="deliverytype">

                        <input type="radio" id="novaposhta" name="deliverypost" checked>
                        <input type="radio" id="ukrposhta" name="deliverypost">

                        <input type="radio" id="adress" name="deliveryvar" checked>
                        <input type="radio" id="postoffice" name="deliveryvar">

                        <label class="label butik" for="butik">
                            <p class="head">Pick up from the boutique</p>
                             <p class="desc">Today, free</p>
                            <span></span>
                        </label>
                        <label class="label delivery" for="delivery">
                            <p class="head">Order delivery</p>
                             <p class="desc">March 23 and later, from 0₴</p>
                            <span></span>
                        </label>
                        <div class="var v1 butik">
                            <div class="box">
                                <h3>Kyiv, str. Mechnikova, b. 7</h3>
                                 <p class="time">Mon-Sun 12:00 - 19:00</p>
                                 <a href="#">Show on map</a>
                            </div>
                            <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/location.png) center center no-repeat; background-size: cover;"></div>
                        </div>
                        <div class="var v2 delivery">
                            <label class="label novaposhta" id="novaposhta-label" for="novaposhta">
                                <p class="head">Around Ukraine</p>
                                <img src="<?php bloginfo('template_directory') ?>/img/novaposhta.png">
                                <span></span>
                            </label>
                            <label class="label ukrposhta" id="ukrposhta-label" for="ukrposhta">
                                <p class="head">To other countries</p>
                                <div class="img-box">
                                    <img src="<?php bloginfo('template_directory') ?>/img/novaposhta.png">
                                    <img src="<?php bloginfo('template_directory') ?>/img/ukrposhta.png">
                                </div>
                                <span></span>
                            </label>
                        </div>
                        <div class="deliveryvars" id="deliveryvars">
                            <input type="radio" id="adress" name="deliveryvar">
                            <input type="radio" id="postoffice" name="deliveryvar">
                            <label class="label adress" for="adress">
                                <p class="head">Address delivery</p>
                                <span></span>
                            </label>
                            <label class="label postoffice" for="postoffice">
                                <p class="head">Delivery to branch</p>
                                <span></span>
                            </label>
                            <div class="var v1 adress">
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="adress-city" placeholder="NAME">
                                    <label>City</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="adress-street" placeholder="NAME">
                                     <label>Street</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="adress-house" placeholder="NAME">
                                     <label>House/building</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="adress-apartment" placeholder="NAME">
                                     <label>Apartment</label>
                                </div>
                            </div>
                            <div class="var v1 postoffice">
 <?php
 /*$fields = WC()->checkout()->get_checkout_fields('shipping');

foreach ($fields as $key => $field) {
    echo '<div class="input i1 input-wrapper">';
    echo '<input type="' . $field['type'] . '" id="' . $key . '" placeholder="' . $field['label'] . '">';
    echo '<label>' . $field['label'] . '</label>';
    echo '</div>';
}

 
 function addNovaPoshtaShippingFields($fields) {
    // Замените стандартные поля доставки на поля от новой почты
    $fields['nova_poshta_city'] = array(
        'label'        => __('City', NOVA_POSHTA_TTN_DOMAIN),
        'type'         => 'select',
        'required'     => $required,
        'options'      => getDefaultCity(),
        'class'        => array(),
        'value'        => '',
        'custom_attributes' => array(),
        'priority'     => 27,
        'clear'        => true,
        'placeholder'  => __('Choose city', NOVA_POSHTA_TTN_DOMAIN)
    );

    $fields['nova_poshta_warehouse'] = array(
        'label'        => __('Nova Poshta Warehouse (#)', NOVA_POSHTA_TTN_DOMAIN),
        'type'         => 'select',
        'required'     => $required,
        'options'      => getDefaultWarehouse(),
        'class'        => array(),
        'value'        => '',
        'custom_attributes' => array(),
        'priority'     => 28,
        'clear'        => true,
        'placeholder'  => __('Choose warehouse', NOVA_POSHTA_TTN_DOMAIN)
    );

    return $fields;
}
add_filter('woocommerce_shipping_fields', 'addNovaPoshtaShippingFields', 99999, 1);
 */
 
 do_action( 'woocommerce_review_order_before_shipping' );
wc_cart_totals_shipping_html();
do_action( 'woocommerce_review_order_after_shipping' );
    do_action( 'woocommerce_review_order_before_cart_contents' );

 ?>
 
    <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
            <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
                    <tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                        <th><?php echo esc_html( $tax->label ); ?></th>
                        <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="tax-total">
                    <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                    <td><?php wc_cart_totals_taxes_total_html(); ?></td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>

<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

        <?php endif; ?>


        
        
  <div class="input i1 input-wrapper">
                                     
                                </div>
                                
     
 
                            <!--    <div class="input i1 input-wrapper">
                                    <input type="text" id="postoffice-city" placeholder="NAME">
                                    <label>Місто</label>
                                </div>
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="postoffice-postoffice" placeholder="NAME">
                                    <label>Номер віддлення</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="deliveryvars out">
                            <div class="var">
                                <div class="input i1 input-wrapper">
                                    <input type="text" id="ukrposhta-index" placeholder="NAME">
                                    <label>Index</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="ukrposhta-country" placeholder="NAME">
                                     <label>Country</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="ukrposhta-city" placeholder="NAME">
                                     <label>City</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="ukrposhta-street" placeholder="NAME">
                                     <label>Street</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="ukrposhta-house" placeholder="NAME">
                                     <label>House/building</label>
                                 </div>
                                 <div class="input i1 input-wrapper">
                                     <input type="text" id="ukrposhta-apartment" placeholder="NAME">
                                     <label>Apartment</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <h2>How do you want to pay for the order?</h2>
                <div class="vars payment">
                    <input type="radio" id="ondelivery" name="paymentvar" checked>
                    <input type="radio" id="site" name="paymentvar">
                    <label class="label ondelivery" for="ondelivery">
                        <p class="head">When received</p>
                         <p class="desc">Cash or bank card</p>
                        <span></span>
                    </label>
                    <label class="label site" for="site">
                        <p class="head">Payment on the site</p>
                        <img src="<?php bloginfo('template_directory') ?>/img/WayForPay.svg">
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="cont">
                <div class="recipient">
                    <h2>Indicate recipient details</h2>
                    <div class="block">
                        <div class="input i1 input-wrapper">
                            <input type="text" id="user-name" placeholder="NAME">
                            <label>Name</label>
                         </div>
                         <div class="input i1 input-wrapper">
                             <input type="text" id="user-email" placeholder="NAME">
                             <label>E-mail</label>
                         </div>
                         <div class="input i1 input-wrapper">
                             <input type="text" id="user-lastname" placeholder="NAME">
                             <label>Surname</label>
                         </div>
                         <div class="input i1 input-wrapper">
                             <input type="text" id="user-phone" placeholder="NAME">
                             <label>Phone</label>
                         </div>
                         <div class="input i1 input-wrapper">
                             <input type="text" id="user-thirdname" placeholder="NAME">
                             <label>Patronymic</label>
                        </div>
                    </div>
                    <?php
                        // Получаем текущую корзину
                        $cart = WC()->cart;
                        
                        // Пересчитываем сумму и другие значения корзины
                        WC()->cart->calculate_totals();
                        
                        // Выводим обновленную сумму товаров в корзине
                        $total = $woocommerce->cart->total; // Получаем общую сумму корзины
                        
                        if (isset($_COOKIE['bazahne_use_bonuses'])) {
                            $cookieValue = $_COOKIE['bazahne_use_bonuses'];
                            $bonusesUse = (int)$cookieValue;
                        } else {
                            $bonusesUse = 0;
                        }
                        
                        $numeric_total = (int)floatval(preg_replace('/[^0-9\.]/', '', $total)); // Удаляем все символы, кроме цифр и точки
                        $numeric_total = $numeric_total - $bonusesUse;
                        
                        $number_space = number_format($numeric_total, 0, '', ' ');
                    ?>
                    <div class="final">
                         <div class="final-cont">
                             <div class="summ">
                                 <p class="head">Total cost:</p>
                                 <p class="summ"><?php echo $number_space ?>₴</p>
                             </div>
                             <div class="btn" onclick="getDeliveryData()">Checkout
                                 <br> order</div>
                             <p class="desc">By completing the order process, I&nbsp;give consent to the&nbsp;processing and&nbsp;transfer of my personal data</p>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function getUserData(){
            deliveryUser = '';
            errors = [];
            name = document.getElementById('user-name').value;
            if (name.length==0){
                document.getElementById('user-name').classList.add('error');
                errors.push('name');
            }
            lastname = document.getElementById('user-lastname').value;
            if (lastname.length==0){
                document.getElementById('user-lastname').classList.add('error');
                errors.push('lastname');
            }
            thirdname = document.getElementById('user-thirdname').value;
            if (thirdname.length==0){
                document.getElementById('user-thirdname').classList.add('error');
                errors.push('thirdname');
            }
            email = document.getElementById('user-email').value;
            if (validateEmailForm(email)) {
            } else {
                errors.push('email');
                document.getElementById('user-email').classList.add('error');
            }
            phone = document.getElementById('user-phone').value;
            if (phone.length==0){
                document.getElementById('user-phone').classList.add('error');
                errors.push('phone');
            }
            
            if (errors.length == 0){
                deliveryUser += name + '; ' + lastname + '; ' + thirdname + '; ' + email + '; ' + phone;
                return deliveryUser;
            }
        }
        
        function getPayment(){
            if (document.getElementById('ondelivery').checked){
                getPayment = 'Наложенный платеж';
            } else {
                getPayment = 'На сайте';
            }
            return getPayment;
        }
        
        function getDeliveryData(){
            deliveryAdress = '';
            if (document.getElementById('butik').checked){
                deliveryAdress = 'Самовывоз';
                console.log(deliveryAdress);
                deliveryUser = getUserData();
                // deliveryPayment = getPayment();
                if (document.getElementById('ondelivery').checked){
                    deliveryPayment= 'Наложенный платеж';
                } else {
                    deliveryPayment = 'На сайте';
                }
                
                finalStep(deliveryUser, deliveryPayment, deliveryAdress);
            } else {
                if (document.getElementById('ukrposhta').checked){
                    deliveryAdress = 'За гранийцу - ';
                    errors = [];
                    index = document.getElementById('ukrposhta-index').value;
                    if (index.length==0){
                        document.getElementById('ukrposhta-index').classList.add('error');
                        errors.push('index');
                    }
                    country = document.getElementById('ukrposhta-country').value;
                    if (country.length==0){
                        document.getElementById('ukrposhta-country').classList.add('error');
                        errors.push('country');
                    }
                    city = document.getElementById('ukrposhta-city').value;
                    if (city.length==0){
                        document.getElementById('ukrposhta-city').classList.add('error');
                        errors.push('city');
                    }
                    street = document.getElementById('ukrposhta-street').value;
                    if (street.length==0){
                        document.getElementById('ukrposhta-street').classList.add('error');
                        errors.push('street');
                    }
                    house = document.getElementById('ukrposhta-house').value;
                    if (house.length==0){
                        document.getElementById('ukrposhta-house').classList.add('error');
                        errors.push('house');
                    }
                    apartment = document.getElementById('ukrposhta-apartment').value;
                    if (apartment.length==0){
                        document.getElementById('ukrposhta-apartment').classList.add('error');
                        errors.push('apartment');
                        deliveryUser = getUserData();
                        // deliveryPayment = getPayment();
                        if (document.getElementById('ondelivery').checked){
                            deliveryPayment = 'Наложенный платеж';
                        } else {
                            deliveryPayment = 'На сайте';
                        }
                        
                        finalStep(deliveryUser, deliveryPayment, deliveryAdress);
                    }
                    
                    if (errors.length == 0){
                        deliveryAdress += index + '; ' + country + '; ' + city + '; ' + street + '; ' + house + '; ' + apartment;
                        console.log(deliveryAdress);
                    }
                } else {
                    if (document.getElementById('adress').checked){
                        deliveryAdress = 'По Украине Адрессная - ';
                        errors = [];
                        city = document.getElementById('adress-city').value;
                        if (city.length==0){
                            document.getElementById('adress-city').classList.add('error');
                            errors.push('city');
                        }
                        street = document.getElementById('adress-street').value;
                        if (street.length==0){
                            document.getElementById('adress-street').classList.add('error');
                            errors.push('street');
                        }
                        house = document.getElementById('adress-house').value;
                        if (house.length==0){
                            document.getElementById('adress-house').classList.add('error');
                            errors.push('house');
                        }
                        apartment = document.getElementById('adress-apartment').value;
                        if (apartment.length==0){
                            document.getElementById('adress-apartment').classList.add('error');
                            errors.push('apartment');
                        }
                        
                        if (errors.length == 0){
                            deliveryAdress += city + '; ' + street + '; ' + house + '; ' + apartment;
                            console.log(deliveryAdress);
                            deliveryUser = getUserData();
                            // deliveryPayment = getPayment();
                            if (document.getElementById('ondelivery').checked){
                                deliveryPayment = 'Наложенный платеж';
                            } else {
                                deliveryPayment = 'На сайте';
                            }
                            
                            finalStep(deliveryUser, deliveryPayment, deliveryAdress);
                        }
                    } else{
                        deliveryAdress = 'По Украине Отделение - ';
                        errors = [];
                        city = document.getElementById('postoffice-city').value;
                        if (city.length==0){
                            document.getElementById('postoffice-city').classList.add('error');
                            errors.push('city');
                        }
                        postoffice = document.getElementById('postoffice-postoffice').value;
                        if (street.length==0){
                            document.getElementById('postoffice-postoffice').classList.add('error');
                            errors.push('street');
                        }
                        
                        if (errors.length == 0){
                            deliveryAdress += city + '; ' + postoffice;
                            console.log(deliveryAdress);
                            deliveryUser = getUserData();
                            // deliveryPayment = getPayment();
                            if (document.getElementById('ondelivery').checked){
                                deliveryPayment = 'Наложенный платеж';
                            } else {
                                deliveryPayment = 'На сайте';
                            }
                            
                            finalStep(deliveryUser, deliveryPayment, deliveryAdress);
                        }
                    }
                }
            }
        }
        
        function finalStep(deliveryUser, deliveryPayment, deliveryAdress){
            let arr = deliveryUser.split('; ');
            Name = arr[0];
            Mail = arr[3];
            
            console.log('Name - ' + Name);
            console.log('Mail - ' + Mail);
            console.log('deliveryAdress - ' + deliveryAdress);
            console.log('deliveryPayment - ' + deliveryPayment);
            console.log('deliveryUser - ' + deliveryUser);

            $('#block-0000').load('<?php bloginfo('template_directory') ?>/sysytem_create_order.php', {
                Name: Name,
                Mail: Mail,
                deliveryAdress: deliveryAdress,
                deliveryPayment: deliveryPayment,
                deliveryUser: deliveryUser
            });
            if (document.getElementById('site').checked){
                if (document.getElementById('butik').checked){
                    dop = '?mess=mess2';
                } else {
                    dop = '?mess=mess4';
                }
            } else if (document.getElementById('butik').checked){
                dop = '?mess=mess1';
            } else {
                dop = '?mess=mess3';
            }
            
            link = "<?php echo get_home_url() ?>/thank/" + dop;
            window.location=link;
        }
        
        function validateEmailForm(email) {
            if (email == ''){
                return false;
            } else {
                var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                return re.test(String(email).toLowerCase());
            }
        }
        // document.getElementById('ukrposhta-index').classList.add('error');
        // document.getElementById('ukrposhta-country').classList.add('error');
        // document.getElementById('ukrposhta-city').classList.add('error');
        // document.getElementById('ukrposhta-street').classList.add('error');
        // document.getElementById('ukrposhta-house').classList.add('error');
        // document.getElementById('ukrposhta-apartment').classList.add('error');
        
    </script>

<?php
}
?> 

    <?php include 'custom-footer.php' ?>

</body>

</html>
