<?php

/*
*Template name: Reset pass
Template Post Type: page
*/

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/login.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="">

    <div id="block-0000"></div>

    <?php include 'custom-header.php'; ?>

    <div class="breadcrumbs" id="filters">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="../" itemprop="item" title="Скидання паролю">
                        <span itemprop="name">Скидання паролю</span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="block-01">
    </div>

    <div class="block-1 login" id="block-1">
        <div class="container">
            <div class="login">
                <h2 style="display: block;">Скидання паролю</h2>
                <input id="email-auth" placeholder="E-mail" type="text">
                <div class="question">
                    <p>На вашу пошту прийде повідомлення з&nbsp;новим паролем</p>
                </div>
                <div class="btns-line">
                    <div class="btn-box">
                        <div class="btn" onclick="resetPass()">Скинути пароль</div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            function validateEmail(email) {
                if (email == ''){
                    return false;
                } else {
                    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                    return re.test(String(email).toLowerCase());
                }
            }

            function resetPass(){
                var email = document.getElementById('email-auth').value;
                
                var errors = [];

                if (!validateEmail(email)){
                    errors.push('wrong email');
                    document.getElementById('email-auth').classList.add('error');
                }

                console.log(errors);
                if (errors.length == 0){
                    $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_lostpass.php', {
                        Email: email
                    });

                }
            }
            
            document.getElementById('email-auth').addEventListener('input', function() {
                this.classList.remove('error');
            });


        </script>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>
