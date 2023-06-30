<?php

/*
*Template name: Account - Subscribes
Template Post Type: page
*/

include 'account-check-login.php';

$pageMenuClass = 'subscribers';
$includeAccountNav = true;

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/accaont-subsribes.css" rel="stylesheet" type="text/css" media="all" />
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
                <h2>Мої підписки</h2>


                    <div class="line-box">
                        
                        <div class="line">
                            <div class="box">
                                <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/145%201.png) center center no-repeat; background-size: cover;"></div>
                                <div class="info">
                                    <p class="name-prod">Diana</p>
                                    <p class="desc">Пальто зі спущеним рукавом прямого крою Італія Лате 1,15м</p>
                                    <p class="art">Арт. 78456</p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="properties">
                                    <div class="box">
                                        <p class="name">Колір</p>
                                        <div class="dropdown dropdown1 color">
                                            <div class="select">
                                                <span style="background-color: green"></span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="gender">
                                            <ul class="dropdown-menu">
                                                <li id="color1"><span style="background-color: green;"></span></li>
                                                <li id="color2"><span style="background-color: white;"></span></li>
                                                <li id="color3"><span style="background-color: purple;"></span></li>
                                                <li id="color4"><span style="background-color: red;"></span></li>
                                            </ul>
                                        </div>
                                        <script>
                                            /*Dropdown Menu*/
                                            $('.dropdown1').click(function() {
                                                $(this).attr('tabindex', 1).focus();
                                                $(this).toggleClass('active');
                                                $(this).find('.dropdown-menu').slideToggle(300);
                                            });
                                            $('.dropdown1').focusout(function() {
                                                $(this).removeClass('active');
                                                $(this).find('.dropdown-menu').slideUp(300);
                                            });
                                            $('.dropdown1 .dropdown-menu li').click(function() {
                                                var backgroundColor = $(this).find('span').css('background-color');
                                                $(this).parents('.dropdown').children('.select').find('span').css('background-color', backgroundColor);
                                            });


                                            /*End Dropdown Menu*/


                                            $('.dropdown1 .dropdown-menu li').click(function() {
                                                var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                                    msg = '<span class="msg">Hidden input value: ';
                                                $('.msg').html(msg + input + '</span>');
                                            });

                                        </script>
                                    </div>

                                    <div class="box">
                                        <p class="name">Розмір</p>
                                        <div class="dropdown dropdown2">
                                            <div class="select">
                                                <span>42</span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="gender">
                                            <ul class="dropdown-menu">
                                                <li id="size42">42</li>
                                                <li id="size43">43</li>
                                                <li id="size44">44</li>
                                            </ul>
                                        </div>
                                        <script>
                                            /*Dropdown Menu*/
                                            $('.dropdown2').click(function() {
                                                $(this).attr('tabindex', 1).focus();
                                                $(this).toggleClass('active');
                                                $(this).find('.dropdown-menu').slideToggle(300);
                                            });
                                            $('.dropdown2').focusout(function() {
                                                $(this).removeClass('active');
                                                $(this).find('.dropdown-menu').slideUp(300);
                                            });
                                            $('.dropdown2 .dropdown-menu li').click(function() {
                                                $(this).parents('.dropdown').find('span').text($(this).text());
                                                $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
                                            });
                                            /*End Dropdown Menu*/


                                            $('.dropdown2 .dropdown-menu li').click(function() {
                                                var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                                    msg = '<span class="msg">Hidden input value: ';
                                                $('.msg').html(msg + input + '</span>');
                                            });

                                        </script>
                                    </div>

                                    <div class="box">
                                        <p class="name">Довжина</p>
                                        <div class="dropdown dropdown3">
                                            <div class="select">
                                                <span>1,15 м</span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="gender">
                                            <ul class="dropdown-menu">
                                                <li id="length115">1,15 м</li>
                                                <li id="length125">1,25 м</li>
                                                <li id="length135">1,35 м</li>
                                            </ul>
                                        </div>
                                        <script>
                                            /*Dropdown Menu*/
                                            $('.dropdown3').click(function() {
                                                $(this).attr('tabindex', 1).focus();
                                                $(this).toggleClass('active');
                                                $(this).find('.dropdown-menu').slideToggle(300);
                                            });
                                            $('.dropdown3').focusout(function() {
                                                $(this).removeClass('active');
                                                $(this).find('.dropdown-menu').slideUp(300);
                                            });
                                            $('.dropdown3 .dropdown-menu li').click(function() {
                                                $(this).parents('.dropdown').find('span').text($(this).text());
                                                $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
                                            });
                                            /*End Dropdown Menu*/


                                            $('.dropdown3 .dropdown-menu li').click(function() {
                                                var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                                    msg = '<span class="msg">Hidden input value: ';
                                                $('.msg').html(msg + input + '</span>');
                                            });

                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="box status-box">
                                <div class="c">
                                    <p class="head">Статус</p>
                                    <p class="status-prod">В очікуванні</p>
                                    <div class="del"></div>
                                </div>
                            </div>
                            <div class="del small"></div>
                        </div>
                        
                        <div class="line">
                            <div class="box">
                                <div class="img" style="background: url(<?php bloginfo('template_directory') ?>/img/cont/145%201.png) center center no-repeat; background-size: cover;"></div>
                                <div class="info">
                                    <p class="name-prod">Diana</p>
                                    <p class="desc">Пальто зі спущеним рукавом прямого крою Італія Лате 1,15м</p>
                                    <p class="art">Арт. 78456</p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="properties">
                                    <div class="box">
                                        <p class="name">Колір</p>
                                        <div class="dropdown dropdown1 color">
                                            <div class="select">
                                                <span style="background-color: green"></span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="gender">
                                            <ul class="dropdown-menu">
                                                <li id="color1"><span style="background-color: green;"></span></li>
                                                <li id="color2"><span style="background-color: white;"></span></li>
                                                <li id="color3"><span style="background-color: purple;"></span></li>
                                                <li id="color4"><span style="background-color: red;"></span></li>
                                            </ul>
                                        </div>
                                        <script>
                                            /*Dropdown Menu*/
                                            $('.dropdown1').click(function() {
                                                $(this).attr('tabindex', 1).focus();
                                                $(this).toggleClass('active');
                                                $(this).find('.dropdown-menu').slideToggle(300);
                                            });
                                            $('.dropdown1').focusout(function() {
                                                $(this).removeClass('active');
                                                $(this).find('.dropdown-menu').slideUp(300);
                                            });
                                            $('.dropdown1 .dropdown-menu li').click(function() {
                                                var backgroundColor = $(this).find('span').css('background-color');
                                                $(this).parents('.dropdown').children('.select').find('span').css('background-color', backgroundColor);
                                            });


                                            /*End Dropdown Menu*/


                                            $('.dropdown1 .dropdown-menu li').click(function() {
                                                var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                                    msg = '<span class="msg">Hidden input value: ';
                                                $('.msg').html(msg + input + '</span>');
                                            });

                                        </script>
                                    </div>

                                    <div class="box">
                                        <p class="name">Розмір</p>
                                        <div class="dropdown dropdown2">
                                            <div class="select">
                                                <span>42</span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="gender">
                                            <ul class="dropdown-menu">
                                                <li id="size42">42</li>
                                                <li id="size43">43</li>
                                                <li id="size44">44</li>
                                            </ul>
                                        </div>
                                        <script>
                                            /*Dropdown Menu*/
                                            $('.dropdown2').click(function() {
                                                $(this).attr('tabindex', 1).focus();
                                                $(this).toggleClass('active');
                                                $(this).find('.dropdown-menu').slideToggle(300);
                                            });
                                            $('.dropdown2').focusout(function() {
                                                $(this).removeClass('active');
                                                $(this).find('.dropdown-menu').slideUp(300);
                                            });
                                            $('.dropdown2 .dropdown-menu li').click(function() {
                                                $(this).parents('.dropdown').find('span').text($(this).text());
                                                $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
                                            });
                                            /*End Dropdown Menu*/


                                            $('.dropdown2 .dropdown-menu li').click(function() {
                                                var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                                    msg = '<span class="msg">Hidden input value: ';
                                                $('.msg').html(msg + input + '</span>');
                                            });

                                        </script>
                                    </div>

                                    <div class="box">
                                        <p class="name">Довжина</p>
                                        <div class="dropdown dropdown3">
                                            <div class="select">
                                                <span>1,15 м</span>
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <input type="hidden" name="gender">
                                            <ul class="dropdown-menu">
                                                <li id="length115">1,15 м</li>
                                                <li id="length125">1,25 м</li>
                                                <li id="length135">1,35 м</li>
                                            </ul>
                                        </div>
                                        <script>
                                            /*Dropdown Menu*/
                                            $('.dropdown3').click(function() {
                                                $(this).attr('tabindex', 1).focus();
                                                $(this).toggleClass('active');
                                                $(this).find('.dropdown-menu').slideToggle(300);
                                            });
                                            $('.dropdown3').focusout(function() {
                                                $(this).removeClass('active');
                                                $(this).find('.dropdown-menu').slideUp(300);
                                            });
                                            $('.dropdown3 .dropdown-menu li').click(function() {
                                                $(this).parents('.dropdown').find('span').text($(this).text());
                                                $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
                                            });
                                            /*End Dropdown Menu*/


                                            $('.dropdown3 .dropdown-menu li').click(function() {
                                                var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                                                    msg = '<span class="msg">Hidden input value: ';
                                                $('.msg').html(msg + input + '</span>');
                                            });

                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="box status-box">
                                <div class="c">
                                    <p class="head">Статус</p>
                                    <p class="status-prod">В очікуванні</p>
                                    <div class="del"></div>
                                </div>
                            </div>
                            <div class="del small"></div>
                        </div>
                        
                    </div>
                
                
            </div>
        </div>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>