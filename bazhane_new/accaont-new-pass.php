<?php

/*
*Template name: Account - NewPass
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
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="../" itemprop="item" title="Особистий кабінет">
                        <span itemprop="name">Особистий кабінет</span>
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
                        <h3 class="main">Зміна пароля</h3>
                        <input type="password" id="oldPass" placeholder="Старий пароль">
                        <input type="password" id="newPass" placeholder="Новий пароль">
                        <input type="password" id="newPass2" placeholder="Підтвердження пароля">
                    </div>
                    
                </div>
                <div class="info-block result">
                    <div class="box">
                        <div class="btn" onclick="update()">Змінити пароль</div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            
            function update(){
                oldPass= document.getElementById('oldPass').value;
                newPass= document.getElementById('newPass').value;
                newPass2= document.getElementById('newPass2').value;
                
                if (newPass != newPass2){
                    document.getElementById('newPass').classList.add('error');
                    document.getElementById('newPass2').classList.add('error');
                } else {
                    $.ajax({
                        url: 'https://www.bazhane.com/wp-content/themes/bazhane_new/system_updatePass.php',
                        type: 'POST',
                        data: {
                            oldpass: oldPass,
                            newpass: newPass
                        },
                        success: function(response) {
                            // Успешный запрос
                            console.log(response);
                            if (response == 'eror'){
                                document.getElementById('oldPass').classList.add('error');
                            } else {
                                location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            // Ошибка запроса
                            console.log('Ошибка запроса. Статус: ' + status);
                        }
                    });
                }
            }
            
        </script>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>