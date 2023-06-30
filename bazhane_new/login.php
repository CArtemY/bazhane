<?php

/*
*Template name: Login
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    
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
                <?php
                if ( $current_language === 'uk' ) { 
                    $pagename = 'Вхід та реєстрація';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'Login and registration';
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

    <div class="block-01">
    </div>

<?php
if ( $current_language === 'uk' ) { 
?>
    <div class="block-1 login" id="block-1">
        <div class="container">
            <div class="switcher">
                <div class="box active" onclick="changeReg()">Вхід</div>
                <div class="box" onclick="changeReg()">Реєстрація</div>
                <script>
                    function changeReg() {
                        const block = document.getElementById('block-1');

                        // Проверка текущего активного класса
                        if (block.classList.contains('login')) {
                            // Убираем класс "login" и добавляем класс "reg"
                            block.classList.remove('login');
                            block.classList.add('reg');
                        } else if (block.classList.contains('reg')) {
                            // Убираем класс "reg" и добавляем класс "login"
                            block.classList.remove('reg');
                            block.classList.add('login');
                        }
                    }

                </script>
            </div>
            <div class="login">
                <h2>Вхід</h2>
                <input id="email-auth" placeholder="E-mail" type="text">
                <input id="pass-auth" type="password" placeholder="Пароль">
                <a href="../reset-pass/" class="forget">Забули пароль?</a>
                <div class="btns-line">
                    <div class="btn-box">
                        <div class="btn" onclick="loginUser()">Увійти</div>
                    </div>
                    <div class="btn-box">
                        <p class="head">Увійти за допомогою:</p>
                        <div class="btns">
                            <div class="soc icloud" data-social-action = "mo_btn-apple"></div>
                            <div class="soc google" data-social-action = "mo_btn-google" onclick="moOpenIdLogin('google','true');"></div>
                            <div class="soc facebook" data-social-action = "mo_btn-facebook" onclick="moOpenIdLogin('facebook','true');"></div>
                        </div>
                        <div style="display: none">
                            <?php echo do_shortcode('[miniorange_social_login]'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reg">
                <h2>Реєстрація</h2>
                <div class="first-line">
                    <div class="input i1 input-wrapper">
                        <input type="text" id="name-reg" placeholder="NAME">
                        <label>Ім'я</label>
                    </div>
                    <div class="input i1 input-wrapper">
                        <input type="text" id="surname-reg" placeholder="NAME">
                        <label>Прізвище</label>
                    </div>
                </div>
                <div class="input i1 input-wrapper">
                    <input type="text" id="email-reg" placeholder="NAME">
                    <label>E-mail</label>
                </div>
                <input id="pass-reg-1" type="password" placeholder="Пароль">
                <input id="pass-reg-2" type="password" placeholder="Підтвердження пароля">
                <div class="question">
                    <p>Я хочу бути в курсі акцій та надходжень</p>
                    <div class="vars">
                        <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">
                            <input type="checkbox" id="checkboxNewsYes" checked>
                            <label for="checkboxNewsYes">так</label>
                        </div>
                        <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">
                            <input type="checkbox" id="checkboxNewsNo">
                            <label for="checkboxNewsNo">ні</label>
                        </div>
                        <script>
                            document.getElementById('checkboxNewsYes').addEventListener('change', function() {
                                document.getElementById('checkboxNewsNo').checked = false;
                            });
                            document.getElementById('checkboxNewsNo').addEventListener('change', function() {
                                document.getElementById('checkboxNewsYes').checked = false;
                            });

                        </script>
                    </div>
                </div>
                <div class="btns-line">
                    <div class="btn-box">
                        <div class="btn" onclick="registerUser()">Зареєструватись</div>
                        <p class="under">Натискаючи Зареєструватися я приймаю
                            <br> <a href="#">Політику конфіденційності</a></p>
                    </div>
                    <div class="btn-box">
                        <p class="head">Зареєструватися за допомогою:</p>
                        <div class="btns">
                            <div class="soc icloud"></div>
                            <div class="soc google" onclick="moOpenIdLogin('google','true');"></div>
                            <div class="soc facebook" onclick="moOpenIdLogin('facebook','true');"></div>
                        </div>
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
            
            function registerUser(){
                var email = document.getElementById('email-reg').value;
                var pass1 = document.getElementById('pass-reg-1').value;
                var pass2 = document.getElementById('pass-reg-2').value;
                var surname = document.getElementById('surname-reg').value;
                var name = document.getElementById('name-reg').value;
                var checkboxNewsYes = document.getElementById("checkboxNewsYes");
                var checkboxNewsNo = document.getElementById("checkboxNewsNo");

                var errors = [];

                if (!validateEmail(email)){
                    errors.push('wrong email');
                    document.getElementById('email-reg').classList.add('error');
                }

                if (name.length<2){
                    errors.push('wrong name');
                    document.getElementById('name-reg').classList.add('error');
                } else if (name.search(/\d/) != -1 || name.length<3) {
                    errors.push('wrong name');
                    document.getElementById('name-reg').classList.add('error');
                }

                if (surname.length<2){
                    errors.push('wrong surname');
                    document.getElementById('surname-reg').classList.add('error');
                } else if (surname.search(/\d/) != -1 || surname.length<3) {
                    errors.push('wrong surname');
                    document.getElementById('surname-reg').classList.add('error');
                }

                if(pass1 != pass2){
                    errors.push('wrong pass');
                    document.getElementById('pass-reg-1').classList.add('error');
                    document.getElementById('pass-reg-2').classList.add('error');
                } else if (pass1 <5){   
                    errors.push('wrong pass');
                    document.getElementById('pass-reg-1').classList.add('error');
                }

                if (checkboxNewsYes.checked){
                    //Подписка на новости
                }
                console.log(errors);
                if (errors.length == 0){
                    $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_registr.php', {
                        Email: email,
                        Name: name,
                        Surname: surname,
                        Pass: pass1
                    });

                }
            }

            function loginUser(){
                var email = document.getElementById('email-auth').value;
                var pass = document.getElementById('pass-auth').value;
                
                var errors = [];

                if (!validateEmail(email)){
                    errors.push('wrong email');
                    document.getElementById('email-auth').classList.add('error');
                }

                if (pass <5){   
                    errors.push('wrong pass');
                    document.getElementById('pass-auth').classList.add('error');
                }

                console.log(errors);
                if (errors.length == 0){
                    // $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_login.php', {
                    //     Email: email,
                    //     Pass: pass
                    // });
                    $.ajax({
                      url: '<?php bloginfo('template_directory') ?>/system_login.php',
                      type: 'POST',
                      data: {
                        Email: email,
                        Pass: pass
                      },
                      success: function(response) {
                          if (response == 'true'){
                              window.location.href = 'https://www.bazhane.com/account-main/';
                          } else {
                              document.getElementById('email-auth').classList.add('error');
                              document.getElementById('pass-auth').classList.add('error');
                          }
                      },
                      error: function(xhr, status, error) {
                        // Ошибка запроса
                        console.log('Ошибка запроса. Статус: ' + status);
                      }
                    });
                }
            }

            $('#email-auth').change(function() {
                $(this).removeClass('error');
            });
            $('#pass-auth').change(function() {
                $(this).removeClass('error');
            });
            $('#email-reg').change(function() {
                $(this).removeClass('error');
            });
            $('#pass-reg-1').change(function() {
                $(this).removeClass('error');
            });
            $('#pass-reg-2').change(function() {
                $(this).removeClass('error');
            });
            $('#surname-reg').change(function() {
                $(this).removeClass('error');
            });
            $('#name-reg').change(function() {
                $(this).removeClass('error');
            });

            $('.soc').on('click', function(e) {
                console.log('.'+$(this).data('social-action'));
                $('.'+$(this).data('social-action')).click();
            });

        </script>
    </div>
<?php
} elseif ( $current_language === 'en' ) { 
?>
    <div class="block-1 login" id="block-1">
        <div class="container">
            <div class="switcher">
                <div class="box active" onclick="changeReg()">Login</div>
                 <div class="box" onclick="changeReg()">Registration</div>
                <script>
                    function changeReg() {
                        const block = document.getElementById('block-1');

                        // Проверка текущего активного класса
                        if (block.classList.contains('login')) {
                            // Убираем класс "login" и добавляем класс "reg"
                            block.classList.remove('login');
                            block.classList.add('reg');
                        } else if (block.classList.contains('reg')) {
                            // Убираем класс "reg" и добавляем класс "login"
                            block.classList.remove('reg');
                            block.classList.add('login');
                        }
                    }

                </script>
            </div>
            <div class="login">
                <h2>Login</h2>
                <input id="email-auth" placeholder="E-mail" type="text">
                <input id="pass-auth" type="password" placeholder="Пароль">
                <a href="../reset-pass/" class="forget">Forgot your password?</a>
                 <div class="btns-line">
                     <div class="btn-box">
                         <div class="btn" onclick="loginUser()">Login</div>
                     </div>
                     <div class="btn-box">
                         <p class="head">Sign in with:</p>
                        <div class="btns">
                            <div class="soc icloud" data-social-action = "mo_btn-apple"></div>
                            <div class="soc google" data-social-action = "mo_btn-google" onclick="moOpenIdLogin('google','true');"></div>
                            <div class="soc facebook" data-social-action = "mo_btn-facebook" onclick="moOpenIdLogin('facebook','true');"></div>
                        </div>
                        <div style="display: none">
                            <?php echo do_shortcode('[miniorange_social_login]'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reg">
                 <h2>Registration</h2>
                 <div class="first-line">
                     <div class="input i1 input-wrapper">
                         <input type="text" id="name-reg" placeholder="NAME">
                         <label>Name</label>
                     </div>
                     <div class="input i1 input-wrapper">
                         <input type="text" id="surname-reg" placeholder="NAME">
                         <label>Surname</label>
                     </div>
                 </div>
                 <div class="input i1 input-wrapper">
                     <input type="text" id="email-reg" placeholder="NAME">
                     <label>E-mail</label>
                 </div>
                 <input id="pass-reg-1" type="password" placeholder="Password">
                 <input id="pass-reg-2" type="password" placeholder="Password confirmation">
                 <div class="question">
                     <p>I want to be informed about promotions and receipts</p>
                     <div class="vars">
                         <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">
                             <input type="checkbox" id="checkboxNewsYes" checked>
                             <label for="checkboxNewsYes">yes</label>
                         </div>
                         <div data-brackets-id="1828" class="var-group" bis_skin_checked="1">
                             <input type="checkbox" id="checkboxNewsNo">
                             <label for="checkboxNewsNo">no</label>
                         </div>
                         <script>
                             document.getElementById('checkboxNewsYes').addEventListener('change', function() {
                                 document.getElementById('checkboxNewsNo').checked = false;
                             });
                             document.getElementById('checkboxNewsNo').addEventListener('change', function() {
                                 document.getElementById('checkboxNewsYes').checked = false;
                             });

                         </script>
                     </div>
                 </div>
                 <div class="btns-line">
                     <div class="btn-box">
                         <div class="btn" onclick="registerUser()">Register</div>
                         <p class="under">By clicking Register I accept
                             <br> <a href="https://www.bazhane.com/privacy-policy/">Privacy Policy</a></p>
                     </div>
                     <div class="btn-box">
                         <p class="head">Sign up with:</p>
                         <div class="btns">
                             <div class="soc icloud"></div>
                             <div class="soc google" onclick="moOpenIdLogin('google','true');"></div>
                             <div class="soc facebook" onclick="moOpenIdLogin('facebook','true');"></div>
                         </div>
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
            
            function registerUser(){
                var email = document.getElementById('email-reg').value;
                var pass1 = document.getElementById('pass-reg-1').value;
                var pass2 = document.getElementById('pass-reg-2').value;
                var surname = document.getElementById('surname-reg').value;
                var name = document.getElementById('name-reg').value;
                var checkboxNewsYes = document.getElementById("checkboxNewsYes");
                var checkboxNewsNo = document.getElementById("checkboxNewsNo");

                var errors = [];

                if (!validateEmail(email)){
                    errors.push('wrong email');
                    document.getElementById('email-reg').classList.add('error');
                }

                if (name.length<2){
                    errors.push('wrong name');
                    document.getElementById('name-reg').classList.add('error');
                } else if (name.search(/\d/) != -1 || name.length<3) {
                    errors.push('wrong name');
                    document.getElementById('name-reg').classList.add('error');
                }

                if (surname.length<2){
                    errors.push('wrong surname');
                    document.getElementById('surname-reg').classList.add('error');
                } else if (surname.search(/\d/) != -1 || surname.length<3) {
                    errors.push('wrong surname');
                    document.getElementById('surname-reg').classList.add('error');
                }

                if(pass1 != pass2){
                    errors.push('wrong pass');
                    document.getElementById('pass-reg-1').classList.add('error');
                    document.getElementById('pass-reg-2').classList.add('error');
                } else if (pass1 <5){   
                    errors.push('wrong pass');
                    document.getElementById('pass-reg-1').classList.add('error');
                }

                if (checkboxNewsYes.checked){
                    //Подписка на новости
                }
                console.log(errors);
                if (errors.length == 0){
                    $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_registr.php', {
                        Email: email,
                        Name: name,
                        Surname: surname,
                        Pass: pass1
                    });

                }
            }

            function loginUser(){
                var email = document.getElementById('email-auth').value;
                var pass = document.getElementById('pass-auth').value;
                
                var errors = [];

                if (!validateEmail(email)){
                    errors.push('wrong email');
                    document.getElementById('email-auth').classList.add('error');
                }

                if (pass <5){   
                    errors.push('wrong pass');
                    document.getElementById('pass-auth').classList.add('error');
                }

                console.log(errors);
                if (errors.length == 0){
                    // $('#block-0000').load('<?php bloginfo('template_directory') ?>/system_login.php', {
                    //     Email: email,
                    //     Pass: pass
                    // });
                    $.ajax({
                      url: '<?php bloginfo('template_directory') ?>/system_login.php',
                      type: 'POST',
                      data: {
                        Email: email,
                        Pass: pass
                      },
                      success: function(response) {
                          if (response == 'true'){
                              window.location.href = 'https://www.bazhane.com/account-main/';
                          } else {
                              document.getElementById('email-auth').classList.add('error');
                              document.getElementById('pass-auth').classList.add('error');
                          }
                      },
                      error: function(xhr, status, error) {
                        // Ошибка запроса
                        console.log('Ошибка запроса. Статус: ' + status);
                      }
                    });
                }
            }

            $('#email-auth').change(function() {
                $(this).removeClass('error');
            });
            $('#pass-auth').change(function() {
                $(this).removeClass('error');
            });
            $('#email-reg').change(function() {
                $(this).removeClass('error');
            });
            $('#pass-reg-1').change(function() {
                $(this).removeClass('error');
            });
            $('#pass-reg-2').change(function() {
                $(this).removeClass('error');
            });
            $('#surname-reg').change(function() {
                $(this).removeClass('error');
            });
            $('#name-reg').change(function() {
                $(this).removeClass('error');
            });

            $('.soc').on('click', function(e) {
                console.log('.'+$(this).data('social-action'));
                $('.'+$(this).data('social-action')).click();
            });

        </script>
    </div>
<?php
}
?>
    <?php include 'custom-footer.php' ?>

</body>

</html>
