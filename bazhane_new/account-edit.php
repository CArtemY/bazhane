<?php

/*
*Template name: Account - Edit
Template Post Type: page
*/

include 'account-check-login.php';

$pageMenuClass = 'profile';
$includeAccountNav = true;

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/account-edit.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/account-nav.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

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
                    $pagename = 'Редагувати профіль';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Edit profile';
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

    <div class="block-1">
        <div class="container">
            <div class="nav">
                <?php include 'account-nav.php' ?>
            </div>
            <div class="info">
                <div class="info-block">
                    <div class="box">
                        <?php
                        //"город", "Улица", "Дом", "Подъезд", "Этаж", "Квартира"
                        $current_user = wp_get_current_user();
                        $billing_address_2 = get_user_meta($current_user->ID, 'billing_address_2', true);
                        
                        if (!empty($billing_address_2)) {
                            $address_parts = explode('--', $billing_address_2);
                        
                            $city = isset($address_parts[0]) ? $address_parts[0] : '';
                            $street = isset($address_parts[1]) ? $address_parts[1] : '';
                            $house = isset($address_parts[2]) ? $address_parts[2] : '';
                            $entrance = isset($address_parts[3]) ? $address_parts[3] : '';
                            $floor = isset($address_parts[4]) ? $address_parts[4] : '';
                            $apartment = isset($address_parts[5]) ? $address_parts[5] : '';
                        } else {
                            $city = '';
                            $street = '';
                            $house = '';
                            $entrance = '';
                            $floor = '';
                            $apartment = '';
                        }

                        
                        ?>
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<h3 class="main">Адреса доставки</h3>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<h3 class="main">Delivery address</h3>';
                        }
                        ?>
                        <?php
                        if ( $current_language === 'uk' ) { 
                            ?>
                            <input type="text" placeholder="Місто" id="city" value="<?php echo $city ?>">
                            <input type="text" placeholder="Вулиця" id="street" value="<?php echo $street ?>">
                            <div class="line-input">
                                <input type="text" placeholder="Будинок" id="house" value="<?php echo $house ?>">
                                <input type="text" placeholder="Квартира / офіс" id="apartment" value="<?php echo $apartment ?>">
                            </div>
                            <div class="line-input">
                                <input type="text" placeholder="Поверх" id="floor" value="<?php echo $floor ?>">
                                <input type="text" placeholder="Під'їзд" id="entrance" value="<?php echo $entrance ?>">
                            </div>
                            <?php
                        } elseif ( $current_language === 'en' ) { 
                            ?>
                            <input type="text" placeholder="City" id="city" value="<?php echo $city ?>">
                            <input type="text" placeholder="Street" id="street" value="<?php echo $street ?>">
                            <div class="line-input">
                                <input type="text" placeholder="House" id="house" value="<?php echo $house ?>">
                                <input type="text" placeholder="Apartment / office" id="apartment" value="<?php echo $apartment ?>">
                            </div>
                            <div class="line-input">
                                <input type="text" placeholder="Floor" id="floor" value="<?php echo $floor ?>">
                                <input type="text" placeholder="Entrance" id="entrance" value="<?php echo $entrance ?>">
                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        $current_user = wp_get_current_user();
                        $department = get_user_meta($current_user->ID, 'nova_poshta_department', true);
                        
                        if (!empty($department)) {
                            echo '<input type="text" id="novaPoshta" value="'. $department . '" placeholder="Відділення Нової пошти">';
                        } else {
                            echo '<input type="text" id="novaPoshta" placeholder="Відділення Нової пошти">';
                        }
                        ?>
                        <!--<div data-brackets-id="1828" class="var-group" bis_skin_checked="1">-->
                        <!--    <input type="checkbox" id="var1" checked>-->
                        <!--    <label for="var1">Основний</label>-->
                        <!--</div>-->
                        <!--<div class="new-adress">-->
                        <!--    <div class="line">-->
                        <!--        <h3>Адреса 2</h3>-->
                        <!--        <p class="del">Видалити</p>-->
                        <!--    </div>-->
                        <!--    <input type="text" placeholder="Місто">-->
                        <!--    <input type="text" placeholder="Вулиця">-->
                        <!--    <div class="line-input">-->
                        <!--        <input type="text" placeholder="Будинок">-->
                        <!--        <input type="text" placeholder="Квартира / офіс">-->
                        <!--    </div>-->
                        <!--    <div class="line-input">-->
                        <!--        <input type="text" placeholder="Поверх">-->
                        <!--        <input type="text" placeholder="Під'їзд">-->
                        <!--    </div>-->
                        <!--    <input type="text" placeholder="Відділення Нової пошти">-->
                        <!--    <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">-->
                        <!--        <input type="checkbox" id="var2">-->
                        <!--        <label for="var2">Основний</label>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="box data">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<h3 class="main">Особисті дані</h3>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<h3 class="main">Personal data</h3>';
                        }
                        ?>
                        <input id="email" type="text" placeholder="E-mail" value="<?php echo $current_user->billing_email ?>">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<a href="#">Змінити пароль</a>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<a href="#">Change password</a>';
                        }
                        ?>
                        <?php
                        if ( $current_language === 'uk' ) { 
                            ?>
                            <input id="name" type="text" placeholder="Ім'я" class="name-input" value="<?php echo $current_user->first_name ?>">
                            <input id="lastname" type="text" placeholder="Прізвище" value="<?php echo $current_user->last_name ?>">
                            <?php
                        } elseif ( $current_language === 'en' ) { 
                            ?>
                            <input id="name" type="text" placeholder="Name" class="name-input" value="<?php echo $current_user->first_name ?>">
                            <input id="lastname" type="text" placeholder="Surname" value="<?php echo $current_user->last_name ?>">
                            <?php
                        }
                        ?>
                        <?php
                        $current_user = wp_get_current_user();
                        $birthday = get_user_meta($current_user->ID, 'birthday', true);
                        
                        if (!empty($birthday)) {
                            $formatted_birthday = date('Y-m-d', strtotime($birthday));
                            echo '<input id="birthday" type="date" value="'. $formatted_birthday . '">';
                        } else {
                            echo '<input id="birthday" type="date">';
                        }
                        ?>
                        <?php 
                            $user_meta = get_user_meta($current_user->ID);
                            $phone = $user_meta['billing_phone'][0];
                        ?>
                        <?php
                        if ( $current_language === 'uk' ) { 
                            ?>
                            <input id="phone" type="text" placeholder="Телефон" value="<?php echo $phone ?>">
                            <?php
                        } elseif ( $current_language === 'en' ) { 
                            ?>
                            <input id="phone" type="text" placeholder="Phone" value="<?php echo $phone ?>">
                            <?php
                        }
                        ?>
                        <!--<input id="form-size" type="text" placeholder="Розмір одягу">-->
                    </div>
                </div>
                <div class="info-block result">
                    <div class="box">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            ?>
                            <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">
                                <input type="checkbox" id="agree" checked>
                                <label for="agree">Я погоджуюсь на обробку моїх персональних даних та&nbsp;ознайомлений з&nbsp;<a href="#">умовами конфіденційності</a></label>
                            </div>
                            <div class="btn" onclick="saveChanges()">Редагувати профіль</div>
                            <?php
                        } elseif ( $current_language === 'en' ) { 
                            ?>
                            <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">
                                <input type="checkbox" id="agree" checked>
                                <label for="agree">I agree to the processing of my personal data and&nbsp;I am familiar with the&nbsp;<a href="#">privacy terms</a></label>
                            </div>
                            <div class="btn" onclick="saveChanges()">Edit profile</div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function validateEmailForm(email) {
                if (email == ''){
                    return false;
                } else {
                    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                    return re.test(String(email).toLowerCase());
                }
            }
            
            function saveChanges(){
                var city = document.getElementById('city').value;
                var street = document.getElementById('street').value;
                var house = document.getElementById('house').value;
                var entrance = document.getElementById('entrance').value;
                var floor = document.getElementById('floor').value;
                var apartment = document.getElementById('apartment').value;
                var novaPoshta = document.getElementById('novaPoshta').value;
                
                var email = document.getElementById('email').value;
                var name = document.getElementById('name').value;
                var lastname = document.getElementById('lastname').value;
                var birthday = document.getElementById('birthday').value;
                var phone = document.getElementById('phone').value;
                
                var agree = document.getElementById('agree').checked;
                
                var fuuAdress = city + '--' + street + '--' + house + '--' + entrance + '--' + floor + '--' + apartment;
                
                var errors = [];
                if (name.search(/\d/) != -1 || name.length<3) {
                    errors.push('wrong name');
                    document.getElementById('name').classList.add('error');
                }
                if (lastname.search(/\d/) != -1 || lastname.length<3) {
                    errors.push('wrong lastname');
                    document.getElementById('lastname').classList.add('error');
                }
                if (!validateEmailForm(email)) {
                    errors.push('wrong email');
                    document.getElementById('email').classList.add('error');
                }
                
                
                
                
                console.log('birthday - ' + birthday);
                console.log('fuuAdress - ' + fuuAdress);
                console.log('name - ' + name);
                console.log('lastname - ' + lastname);
                console.log('email - ' + email);
                console.log('phone - ' + phone);
                
                
                
                $.ajax({
                    url: '<?php bloginfo('template_directory') ?>/system_updateAccount2.php',
                    type: 'POST',
                    data: {
                        novaPoshta: novaPoshta,
                        birthday: birthday,
                        fuuAdress: fuuAdress,
                        name: name,
                        lastname: lastname,
                        email: email,
                        phone: phone
                    },
                    success: function(response) {
                        // Успешный запрос
                        // location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Ошибка запроса
                        console.log('Ошибка запроса. Статус: ' + status);
                    }
                });
                
            }
            
        </script>
        <script>
            document.getElementById('var1').addEventListener('change', function() {
                document.getElementById('var2').checked = false;
            });
            document.getElementById('var2').addEventListener('change', function() {
                document.getElementById('var1').checked = false;
            });
            
            function validateEmail(email) {
                if (email == ''){
                    return false;
                } else {
                    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                    return re.test(String(email).toLowerCase());
                }
            }
            
            // function updateData(){
            //         console.log('start');
            //         email = document.getElementById('form-email').value;
            //         firstname = document.getElementById('form-firstname').value;
            //         lastname = document.getElementById('form-lastname').value;
                    
            //         var errors = [];
                    
            //         if (firstname.search(/\d/) != -1) {
            //             errors.push('wrong name');
            //             document.getElementById('form-firstname').classList.add('error');
            //         }
            //         if (firstname.length == 0) {
            //             errors.push('poor name');
            //             document.getElementById('form-firstname').classList.add('error');
            //         }
                    
            //         if (lastname.search(/\d/) != -1) {
            //             errors.push('wrong name');
            //             document.getElementById('form-lastname').classList.add('error');
            //         }
                    
            //         if (validateEmail(email)) {} else {
            //             errors.push('wrong email');
            //             document.getElementById('form-email-box').classList.add('error');
            //         }
            //         console.log(errors);
            //         if (errors.length == 0) {
            //             $.post('<?php bloginfo('template_directory') ?>/system_updateAccount.php', {Firstame: firstname, Lastame: lastname, Mail: email, Login: login}, function(data){
            //                 if (data == 'true'){
            //                     //Принято в обработку
            //                     document.getElementById('form-email').classList.add('success');
            //                     document.getElementById('form-firstname').classList.add('success');
            //                     document.getElementById('form-lastname').classList.add('success');
            //                 } else {
            //                     console.log(data);
            //                     arr = data.split(" ");
            //                     email = document.getElementById('form-email');
                                
            //                     if (arr.includes('email')) {
            //                       email.classList.add('error');
            //                       email.classList.remove('success');
            //                     } else {
            //                       email.classList.add('success');
            //                       email.classList.remove('error');
            //                     }
                                
            //                 }
            //             });
            //         }
            //     }

        </script>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>
