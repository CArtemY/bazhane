<?php

/*
*Template name: Account - Bonuses
Template Post Type: page
*/
$user_id = get_current_user_id(); 

include 'account-check-login.php';

$pageMenuClass = 'bonuses';
$includeAccountNav = true;

?>

<?php

$year = date('Y'); // Get the current year

$args = array(
    'post_type'      => 'shop_order',
    'post_status'    => 'wc-completed',
    'posts_per_page' => -1,
    'meta_query'     => array(
        array(
            'key'     => '_customer_user',
            'value'   => $user_id,
            'compare' => '='
        ),
        array(
            'key'     => '_completed_date',
            'value'   => array($year . '-01-01', $year . '-12-31'),
            'compare' => 'BETWEEN',
            'type'    => 'DATE'
        )
    )
);

$query = new WP_Query($args);

$total_spent = 0;
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $order = wc_get_order(get_the_ID());
        $total_spent += $order->get_total();
    }
}

wp_reset_postdata();

$a = intval($total_spent);

// echo $a;

// echo $a.'<br>'; 

// Заданные значения
$value1 = 0;
$value2 = 35000;
$value3 = 60000;
$value4 = 120000;
$value5 = 180000;
$value6 = 240000;
$values16 = [0, 35000, 60000, 120000, 180000, 240000];

// echo $a.'<br>';

// $a = 25; // Число a

// Проверка между какими значениями находится число a
if ($a >= $value1 && $a < $value2) {
    // echo "Число a находится между $value1 и $value2";
    $user_level = 1;
} elseif ($a >= $value2 && $a < $value3) {
    // echo "Число a находится между $value2 и $value3";
    $user_level = 2;
} elseif ($a >= $value3 && $a < $value4) {
    // echo "Число a находится между $value3 и $value4";
    $user_level = 3;
} elseif ($a >= $value4 && $a < $value5) {
    // echo "Число a находится между $value4 и $value5";
    $user_level = 4;
} elseif ($a >= $value5 && $a < $value6) {
    // echo "Число a находится между $value5 и $value6";
    $user_level = 5;
} elseif ($a >= $value6) {
    // echo "Число a находится между $value5 и $value6";
    $user_level = 6;
} else {
    // echo "Число a не находится между заданными значениями";
}

$user_levels = ['', 'New client', 'Loyal client', 'Special client', 'Friend', 'Best Friend', '<span>BFF (</span>Best Friend Forever<span>)</span>'];

?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/account-my-bonuses.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/block-bonuses.css" rel="stylesheet" type="text/css" media="all" />
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
                    $pagename = 'Мої бонуси';
                } elseif ( $current_language === 'en' ) { 
                    $pagename = 'My bonuses';
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

    <div class="block-1">
        <div class="container">
            <div class="nav">
                <?php include 'account-nav.php' ?>
            </div>
            <div class="info">
                <?php
                $current_user = wp_get_current_user();
                $first_name = $current_user->first_name;
                $last_name = $current_user->last_name;
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<h2>Вітаємо, '.$first_name. ' '.$last_name.'</h2>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<h2>Welcome, '.$first_name. ' '.$last_name.'</h2>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="subhead">Мій рівень: <span class="l'.$user_level.'">'.$user_levels[$user_level].'</span></p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="subhead">My level: <span class="l'.$user_level.'">'.$user_levels[$user_level].'</span></p>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="block-2 block-bonuses">
        <div class="container">
            <div class="line1">
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="subhead">Мій рівень: <span class="l'.$user_level.'">'.$user_levels[$user_level].'</span></p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="subhead">My level: <span class="l'.$user_level.'">'.$user_levels[$user_level].'</span></p>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<h2>Мої бонуси</h2>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<h2>My bonuses</h2>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="link"><a href="'.get_home_url().'/bonus-system/">Програма лояльності</a></p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="link"><a href="'.get_home_url().'/bonus-system/">Loyalty program</a></p>';
                }
                ?>
            </div>
            <div class="line2">
                <div class="box <?php if ($user_level == 6){echo 'active';}?>">
                    <p onclick="openMess(this)">BFF (Best Friend Forever)</p>
                    <p class="number">6</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box 
                    <?php
                    if ($user_level == 1){echo 'now';}
                    if ($user_level > 1){echo 'active';}
                    ?>">
                    <span></span>
                    <p onclick="openMess(this)">New Client</p>
                    <p class="number">1</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box 
                    <?php
                    if ($user_level == 5){echo 'now';}
                    if ($user_level > 5){echo 'active';}
                    ?>">
                    <p onclick="openMess(this)">Best Friend</p>
                    <p class="number">5</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box  
                    <?php
                    if ($user_level == 2){echo 'now';}
                    if ($user_level > 2){echo 'active';}
                    ?>">
                    <span></span>
                    <p onclick="openMess(this)">Loyal Client</p>
                    <p class="number">2</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box  
                    <?php
                    if ($user_level == 4){echo 'now';}
                    if ($user_level > 4){echo 'active';}
                    ?>">
                    <p onclick="openMess(this)">Friend</p>
                    <p class="number">4</p>
                    <span></span>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="box  
                <?php
                if ($user_level == 3){echo 'now';}
                if ($user_level > 3){echo 'active';}
                ?>">
                    <span></span>
                    <p onclick="openMess(this)">Special client</p>
                    <p class="number">3</p>
                    <div class="mess" onclick="cliseMess(this)">
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                        }
                        ?>
                    </div>
                </div>
                <script>
                    function cliseMess(el) {
                        el.classList.remove('active');
                    }

                    function openMess(el) {
                        console.log('openMess');
                        var els = el.closest(".line2").querySelectorAll('.mess');
                        console.log(els);
                        els.forEach((element) => {
                            element.classList.remove('active');
                        })
                        el.closest(".box").querySelectorAll('.mess')[0].classList.add('active');
                    }

                </script>

                <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
                <!--                http://jsbin.com/yuponumozi/1/edit?html,css,js,output   -->
                <div class="circule">
                    <div id="progress" class="progress" style="--progress: 23%;"></div>
                    <div class="my-bonuses">
                        <p class="summ">
                            <?php
                            $ywpar_customer = new YITH_WC_Points_Rewards_Customer($user_id);
                            echo esc_html( $ywpar_customer->get_total_points() );
                            ?>
                        </p>
                        <?php
                        if ( $current_language === 'uk' ) { 
                            echo '<p class="desc">Поточних бонусів</p><p class="val">1 бонус = 1 ₴</p>';
                        } elseif ( $current_language === 'en' ) { 
                            echo '<p class="desc">Current bonuses</p><p class="val">1 bonus = 1 ₴</p>';
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    if ($user_level <6){
                        $prev = $values16[$user_level - 1]; //60000
                        $next = $values16[$user_level]; //120000
                        $past = 17*($user_level - 1);
                        
                        // $next - $prev -- 100%
                        // $a - $prev -- X
                        
                        $val1 = round(((($a - $prev) * 100)/($next - $prev))*0.17 + $past) ;
                        
                        // $val1 = round($a * 100 / $values16[5]);
                        $val2 = 100 - $val1;
                    } else {
                        $val1 = 100;
                        $val2 = 0;
                    }
                ?>
                <script>
                    var dataset = [{
                        value: <?php echo $val1 ?>,//закрашенная часть
                        color: 'transparent'
                    }, {
                        value: <?php echo $val2 ?>,
                        color: '#D9D9D9'
                    }];

                    var maxValue = 25;
                    var container = $('#progress');

                    var addSector = function(data, startAngle, collapse) {
                        var sectorDeg = 3.6 * data.value;
                        var skewDeg = 90 + sectorDeg;
                        var rotateDeg = startAngle;
                        if (collapse) {
                            skewDeg++;
                        }

                        var sector = $('<div>', {
                            'class': 'sector'
                        }).css({
                            'background': data.color,
                            'transform': 'rotate(' + rotateDeg + 'deg) skewY(' + skewDeg + 'deg)'
                        });
                        container.append(sector);

                        return startAngle + sectorDeg;
                    };

                    dataset.reduce(function(prev, curr) {
                        return (function addPart(data, angle) {
                            if (data.value <= maxValue) {
                                return addSector(data, angle, false);
                            }

                            return addPart({
                                value: data.value - maxValue,
                                color: data.color
                            }, addSector({
                                value: maxValue,
                                color: data.color,
                            }, angle, true));
                        })(curr, prev);
                    }, 0);

                </script>
            </div>
            <div class="line3">
                <div class="list">
                    <div class="box">
                        <p onclick="openMessMobile(this)">1. New Client</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">2. Loyal Clientnt</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box now">
                        <p onclick="openMessMobile(this)">3. Special client</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">4. Friend</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">5. Best Friend</p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box">
                        <p onclick="openMessMobile(this)">6. <span>BFF (</span>Best Friend Forever<span>)</span></p>
                        <div class="mess" onclick="closeMessMobile(this)">
                            <?php
                            if ( $current_language === 'uk' ) { 
                                echo '<p>при покупці від 100 000 грн. - бонус 15%<br><br><span>*нараховується незалежно від суми, можна використати на наступну покупку</span></p>';
                            } elseif ( $current_language === 'en' ) { 
                                echo '<p>when purchasing from UAH 100,000. - 15% bonus<br><br><span>*is calculated regardless of the amount, can be used for the next purchase</span></p>';
                            }
                            ?>
                        </div>
                    </div>
                    <script>
                        function closeMessMobile(el) {
                            el.classList.remove('active');
                        }

                        function openMessMobile(el) {
                            console.log('openMess');
                            var els = el.closest(".line3").querySelectorAll('.mess');
                            console.log(els);
                            els.forEach((element) => {
                                element.classList.remove('active');
                            })
                            el.closest(".box").querySelectorAll('.mess')[0].classList.add('active');
                        }

                    </script>
                </div>
            </div>
            <div class="line4">
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="desc">До наступного рівня '.$user_levels[$user_level + 1].' - залишилось придбати товарів</p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="desc">To next level '.$user_levels[$user_level + 1].' - it remains to purchase products</p>';
                }
                ?>
                <?php
                $left = $next - $a;
                $formattedNumber = number_format($left, 0, '', ' ');
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="summ">на '.$formattedNumber.' грн</p>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="summ">on '.$formattedNumber.' hrn</p>';
                }
                ?>
                <?php
                if ( $current_language === 'uk' ) { 
                    echo '<p class="term">Строк використання:<br>до 23:59 годин 31.12.2023 включно</p><div class="btn">Перейти <br>до покупок</div>';
                } elseif ( $current_language === 'en' ) { 
                    echo '<p class="term">Term of use:<br>until 23:59 on 31.12.2023 inclusive</p><div class="btn">Go to<br> purchases</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php include 'custom-footer.php' ?>

</body>

</html>
