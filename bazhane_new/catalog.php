<?php

/*
*Template name: Catalog
Template Post Type: page
*/

?>

<?php

$maxPrice = 0;
$minPrice = 0;

// Поиск самого дорогого товара
$args_max_price = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => '_price', // Мета-ключ цены
            'compare' => 'EXISTS', // Проверка наличия значения
        ),
        array(
            'key' => '_min_variation_price', // Мета-ключ минимальной цены вариаций
            'compare' => 'EXISTS', // Проверка наличия значения
        ),
    ),
    'orderby' => 'meta_value_num', // Сортировка по числовому значению
    'order' => 'DESC', // В порядке убывания
);

$query_max_price = new WP_Query($args_max_price);

if ($query_max_price->have_posts()) {
    while ($query_max_price->have_posts()) {
        $query_max_price->the_post();
        // Получение цены самого дорогого товара
        $price = get_post_meta(get_the_ID(), '_price', true);
        $maxPrice = $price;
    }
}

wp_reset_postdata();

// Поиск самого дешевого товара
$args_min_price = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => '_price', // Мета-ключ цены
            'compare' => 'EXISTS', // Проверка наличия значения
        ),
        array(
            'key' => '_min_variation_price', // Мета-ключ минимальной цены вариаций
            'compare' => 'EXISTS', // Проверка наличия значения
        ),
    ),
    'orderby' => 'meta_value_num', // Сортировка по числовому значению
    'order' => 'ASC', // В порядке возрастания
);

$query_min_price = new WP_Query($args_min_price);

if ($query_min_price->have_posts()) {
    while ($query_min_price->have_posts()) {
        $query_min_price->the_post();
        // Получение цены самого дешевого товара
        $price = get_post_meta(get_the_ID(), '_price', true);
        $minPrice = $price;
    }
}

wp_reset_postdata();


?>
<!DOCTYPE html>
<html lang="en">
<!-- V9 -->

<head>

    <?php include 'custom-head.php' ?>

    <!-- Style -->
    <link href="<?php bloginfo('template_directory') ?>/css/catalog.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/catalog-adaptive.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/product-list.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/product-list-catalog.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php bloginfo('template_directory') ?>/css/colors.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body class="">

    <?php include 'custom-header.php'; ?>

<?php
if ( $current_language === 'uk' ) { 
?>  
    <div class="filters-mobile" id="filters-mobile" style="display: ">
        <div class="bigcont">
            <!--            <div class="bigcont2">-->
            <div class="container">
                <div class="bigbox">
                    <span class="head">ФІЛЬТРИ</span>
                    <div class="b1">
                        
                        <div class="filter" id="filters-collection-mobile">
                            <p onclick="openFilterMobile(0)">Колекція</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $attribute = 'pa_collection'; // Слаг таксономии атрибута Color
                                    
                                    $terms = get_terms(array(
                                        'taxonomy' => $attribute, // Название таксономии
                                        'hide_empty' => false, // Показывать пустые значения или нет
                                    ));
                                    
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="collection_mob_' . $term->slug . '">';
                                            echo '    <label for="collection_mob_' . $term->slug . '">' . $term->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="filter" id="filters-sort-mobile">
                            <p onclick="openFilterMobile(1)">Сортування</p>
                            <div class="box">
                                <div class="cont">
                                    <div class="var-group">
                                        <input type="checkbox" id="priceUp_mobile">
                                        <label for="priceUp_mobile">Від дешевих до дорогих</label>
                                    </div>
                                    <div class="var-group">
                                        <input type="checkbox" id="priceDown_mobile">
                                        <label for="priceDown_mobile">Від дорогих до дешевих</label>
                                    </div>
                                    <div class="var-group">
                                        <input type="checkbox" id="newProds_mobile">
                                        <label for="newProds_mobile">Новинки</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-category-mobile">
                            <p onclick="openFilterMobile(2)">категорії</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $categories = get_terms(array(
                                        'taxonomy' => 'product_cat', // название таксономии
                                        'hide_empty' => false, // показывать пустые категории или нет
                                        
                                    ));
                                    
                                    if (!empty($categories) && !is_wp_error($categories)) {
                                        foreach ($categories as $category) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="category_mob_'.$category->slug.'">';
                                            echo '    <label for="category_mob_'.$category->slug.'">' . $category->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-color-mobile">
                            <p onclick="openFilterMobile(3)">колір</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                $attribute = 'pa_color'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input type="checkbox" id="color_mob_' . $term->slug . '">';
                                        echo '    <label for="color_mob_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-size-mobile">
                            <p onclick="openFilterMobile(4)">Розмір</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $attribute = 'pa_size'; // Слаг таксономии атрибута Color
                                    
                                    $terms = get_terms(array(
                                        'taxonomy' => $attribute, // Название таксономии
                                        'hide_empty' => false, // Показывать пустые значения или нет
                                    ));
                                    
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="size_mob_' . $term->slug . '">';
                                            echo '    <label for="size_mob_' . $term->slug . '">' . $term->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-material-mobile">
                            <p onclick="openFilterMobile(5)">Матеріал</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $attribute = 'pa_material'; // Слаг таксономии атрибута Color
                                    
                                    $terms = get_terms(array(
                                        'taxonomy' => $attribute, // Название таксономии
                                        'hide_empty' => false, // Показывать пустые значения или нет
                                    ));
                                    
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="material_mob_' . $term->slug . '">';
                                            echo '    <label for="material_mob_' . $term->slug . '">' . $term->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter price">
                            <p onclick="openFilterMobile(6)">ціна</p>
                            <div class="box">
                                <div class="cont">
                                    <fieldset class="filter-price">
                                        <div class="price-field">
                                            <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $minPrice; ?>" id="lowerMobile">
                                            <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $maxPrice; ?>" id="upperMobile">
                                        </div>
                                        <div class="price-wrap">
                                            <div class="price-wrap-1">
                                                <input id="oneMobile">
                                                <!--                                        <label for="one">$</label>-->
                                            </div>
                                            <div class="price-wrap_line">-</div>
                                            <div class="price-wrap-2">
                                                <input id="twoMobile">
                                                <!--                                        <label for="two">$</label>-->
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              openMobileFilters();
                            });
                            function openMobileFilters(){
                                var filters = document.getElementById('filters-mobile').querySelectorAll('.filter');
                                // filters.forEach((element) => {
                                //     element.classList.add('active');
                                //     element.querySelectorAll('.box')[0].style.height = element.querySelectorAll('.cont')[0].offsetHeight + 'px';
                                // })
                                console.log(filters[1]);
                                filters[1].classList.add('active');
                                filters[1].querySelectorAll('.box')[0].style.height = filters[1].querySelectorAll('.cont')[0].offsetHeight + 'px';
                            }
                        </script>
                    </div>
                </div>
                <div class="big-btn" onclick="updateFiltersMobile()">Показати товари</div>
                <script>
                    var filtersChanged = false;
                    function showProducts(){
                        document.getElementById('filters-mobile').classList.remove('active');
                    }
                </script>
            </div>
            <!--            </div>-->
        </div>
        <div class="bg"></div>
        <script>
            function openFilterMobile(a) {
                console.log('openFilterMobile');
                var filters = document.getElementById('filters-mobile').querySelectorAll('.filter');


                var i = -1;
                var activeEl = [];

                var j = 0;
                //Получаем список открытых фильтров
                filters.forEach((element) => {
                    if (element.classList.contains('active')) {
                        i = j;
                        k = j - 1;
                        activeEl.push(j);
                    }
                    j++;
                })

                console.log(activeEl);
                console.log('i - ' + i);
                console.log('a - ' + a);
                j = 0;
                
                //

                if (activeEl.includes(a)) {
                    console.log('2');
                    filters[a].querySelectorAll('.box')[0].removeAttribute('style');
                    filters[a].classList.remove('active');
                } else {
                    console.log('1');
                    //Открываем новый
                    filters[a].classList.add('active');
                    filters[a].querySelectorAll('.box')[0].style.height = filters[a].querySelectorAll('.cont')[0].offsetHeight + 'px';
                }
            }

            //Price filter Mobile

            var lowerSliderMobile = document.querySelector('#lowerMobile');
            var upperSliderMobile = document.querySelector('#upperMobile');

            document.querySelector('#twoMobile').value = upperSliderMobile.value;
            document.querySelector('#oneMobile').value = lowerSliderMobile.value;

            var lowerValMobile = parseInt(lowerSliderMobile.value);
            var upperValMobile = parseInt(upperSliderMobile.value);

            upperSliderMobile.oninput = function() {
                lowerValMobile = parseInt(lowerSliderMobile.value);
                upperValMobile = parseInt(upperSliderMobile.value);

                if (upperValMobile < lowerValMobile + 4) {
                    lowerSliderMobile.value = upperValMobile - 4;
                    if (lowerValMobile == lowerSlideMobiler.min) {
                        upperSliderMobile.value = 4;
                    }
                }
                document.querySelector('#twoMobile').value = this.value
            };

            lowerSliderMobile.oninput = function() {
                lowerValMobile = parseInt(lowerSliderMobile.value);
                upperValMobile = parseInt(upperSliderMobile.value);
                if (lowerValMobile > upperValMobile - 4) {
                    upperSliderMobile.value = lowerValMobile + 4;
                    if (upperValMobile == upperSliderMobile.max) {
                        lowerSliderMobile.value = parseInt(upperSliderMobile.max) - 4;
                    }
                }
                document.querySelector('#oneMobile').value = this.value
            };


            function priceFilterOnMobile() {
                upperSliderMobile.value = document.querySelector('#twoMobile').value;
                lowerSliderMobile.value = document.querySelector('#oneMobile').value;

            }

        </script>
    </div>

    <div class="breadcrumbs" id="filters">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item" bis_skin_checked="1">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item">
                        <span itemprop="name">Каталог</span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
            <div class="b1">
                <div class="b11">
                    <div class="filter" id="filters-collection">
                        <p onclick="openFilter(0)">Колекція</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_collection'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="collection_' . $term->slug . '">';
                                        echo '    <label for="collection_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b11">
                    <div class="filter" id="filters-category">
                        <p onclick="openFilter(1)">категорії</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $categories = get_terms(array(
                                    'taxonomy' => 'product_cat', // название таксономии
                                    'hide_empty' => false, // показывать пустые категории или нет
                                    
                                ));
                                
                                if (!empty($categories) && !is_wp_error($categories)) {
                                    foreach ($categories as $category) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="category_'.$category->slug.'">';
                                        echo '    <label for="category_'.$category->slug.'">' . $category->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter" id="filters-color">
                        <p onclick="openFilter(2)">колір</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_color'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="color_' . $term->slug . '">';
                                        echo '    <label for="color_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter" id="filters-size">
                        <p onclick="openFilter(3)">Розмір</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_size'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="size_' . $term->slug . '">';
                                        echo '    <label for="size_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b12">
                    <div class="filter" id="filters-material">
                        <p onclick="openFilter(4)">Матеріал</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_material'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="material_' . $term->slug . '">';
                                        echo '    <label for="material_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter price">
                        <p onclick="openFilter(5)">ціна</p>
                        <div class="box">
                            <div class="cont">
                                <fieldset class="filter-price">
                                    <div class="price-field">
                                        <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $minPrice; ?>" id="lower">
                                        <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $maxPrice; ?>" id="upper">
                                    </div>
                                    <div class="price-wrap">
                                        <div class="price-wrap-1">
                                            <input onchange="updateFilters()" id="one">
                                            <!--                                        <label for="one">$</label>-->
                                        </div>
                                        <div class="price-wrap_line">-</div>
                                        <div class="price-wrap-2">
                                            <input onchange="updateFilters()" id="two">
                                            <!--                                        <label for="two">$</label>-->
                                        </div>
                                    </div>
                                    <div class="btn" onclick="updateFilters()">Застосувати</div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="filter" id="filters-sort">
                        <p onclick="openFilter(6)">Сортування</p>
                        <div class="box">
                            <div class="cont">
                                <div class="var-group">
                                    <input type="checkbox" id="priceUp">
                                    <label for="priceUp">Від дешевих до дорогих</label>
                                </div>
                                <div class="var-group">
                                    <input type="checkbox" id="priceDown">
                                    <label for="priceDown">Від дорогих до дешевих</label>
                                </div>
                                <div class="var-group">
                                    <input type="checkbox" id="newProds">
                                    <label for="newProds">Новинки</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn" onclick="filtersMobileOpen()">Фільтри та сортування</div>
            <script>
                function filtersMobileOpen() {
                    document.getElementById('filters-mobile').classList.toggle('active');
                }

            </script>
        </div>
        <script>
            function openFilter(a) {
                console.log('openFilter');
                var filters = document.getElementById('filters').querySelectorAll('.filter');


                var i = -1;

                var j = 0;
                filters.forEach((element) => {
                    if (element.classList.contains('active')) {
                        i = j;
                    }
                    j++;
                })

                //Закрываем все открытые
                filters.forEach((element) => {
                    element.classList.remove('active');
                    element.querySelectorAll('.box')[0].removeAttribute('style');
                })
                console.log('i - ' + i);
                console.log('a - ' + a);
                if (a != i) {
                    //Открываем новый
                    filters[a].classList.add('active');
                    filters[a].querySelectorAll('.box')[0].style.height = filters[a].querySelectorAll('.cont')[0].offsetHeight + 'px';
                } else {
                    //Текущий уже закрыт
                }
            }


            //Price filter

            var lowerSlider = document.querySelector('#lower');
            var upperSlider = document.querySelector('#upper');

            document.querySelector('#two').value = upperSlider.value;
            document.querySelector('#one').value = lowerSlider.value;

            var lowerVal = parseInt(lowerSlider.value);
            var upperVal = parseInt(upperSlider.value);

            upperSlider.oninput = function() {
                lowerVal = parseInt(lowerSlider.value);
                upperVal = parseInt(upperSlider.value);

                if (upperVal < lowerVal + 4) {
                    lowerSlider.value = upperVal - 4;
                    if (lowerVal == lowerSlider.min) {
                        upperSlider.value = 4;
                    }
                }
                document.querySelector('#two').value = this.value
            };

            lowerSlider.oninput = function() {
                lowerVal = parseInt(lowerSlider.value);
                upperVal = parseInt(upperSlider.value);
                if (lowerVal > upperVal - 4) {
                    upperSlider.value = lowerVal + 4;
                    if (upperVal == upperSlider.max) {
                        lowerSlider.value = parseInt(upperSlider.max) - 4;
                    }
                }
                document.querySelector('#one').value = this.value
            };


            function priceFilterOn() {
                upperSlider.value = document.querySelector('#two').value;
                lowerSlider.value = document.querySelector('#one').value;

            }
            
            document.getElementById('newProds').addEventListener('change', function() {
                document.getElementById('priceUp').checked = false;
                document.getElementById('priceDown').checked = false;
                updateFilters();
            });
            document.getElementById('priceUp').addEventListener('change', function() {
                document.getElementById('newProds').checked = false;
                document.getElementById('priceDown').checked = false;
                updateFilters();
            });
            document.getElementById('priceDown').addEventListener('change', function() {
                document.getElementById('priceUp').checked = false;
                document.getElementById('newProds').checked = false;
                updateFilters();
            });


            document.getElementById('newProds_mobile').addEventListener('change', function() {
                document.getElementById('priceUp_mobile').checked = false;
                document.getElementById('priceDown_mobile').checked = false;
                updateFilters();
            });
            document.getElementById('priceUp_mobile').addEventListener('change', function() {
                document.getElementById('newProds_mobile').checked = false;
                document.getElementById('priceDown_mobile').checked = false;
                updateFilters();
            });
            document.getElementById('priceDown_mobile').addEventListener('change', function() {
                document.getElementById('priceUp_mobile').checked = false;
                document.getElementById('newProds_mobile').checked = false;
                updateFilters();
            });
            
            
            function updateFilters(){
                
                console.log('111111111111111111');
                //Собираем отмеченные input в каждом фильтре
                
                //Материал//
                filters = document.getElementById('filters-material');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterMaterials = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterMaterials = filterMaterials + '--' + checkbox.id;
                });
                filterMaterials = filterMaterials.substring(2);
                filterMaterials = filterMaterials.replace(/material_/g, '');
                
                //Категории//
                filters = document.getElementById('filters-category');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCategory = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCategory = filterCategory + '--' + checkbox.id;
                });
                filterCategory = filterCategory.substring(2);
                filterCategory = filterCategory.replace(/category_/g, '');
                
                //Цвет//
                filters = document.getElementById('filters-color');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterColor = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterColor = filterColor + '--' + checkbox.id;
                });
                filterColor = filterColor.substring(2);
                filterColor = filterColor.replace(/color_/g, '');
                
                //Размер//
                filters = document.getElementById('filters-size');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSize = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSize = filterSize + '--' + checkbox.id;
                });
                filterSize = filterSize.substring(2);
                filterSize = filterSize.replace(/size_/g, '');

                //Коллекция//
                filters = document.getElementById('filters-collection');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCollection = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCollection = filterCollection + '--' + checkbox.id;
                });
                filterCollection = filterCollection.substring(2);
                filterCollection = filterCollection.replace(/collection_/g, '');
                
                //Цена//
                upperSlider = document.querySelector('#two').value;
                lowerSlider = document.querySelector('#one').value;
                filterPrice = lowerSlider+'--'+upperSlider;
                
                //Сортировка//
                filters = document.getElementById('filters-sort');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSort = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSort = checkbox.id;
                });
                
                console.log('----------------------');
                console.log(filterSort);
                
                
                console.log('filterMaterials: '+filterMaterials);
                console.log('filterCategory: '+filterCategory);
                console.log('filterColor: '+filterColor);
                console.log('filterSize: '+filterSize);
                console.log('filterCollection: '+filterCollection);
                console.log('filterPrice: '+filterPrice);
                
                console.log('Full length'+filterMaterials.length+filterCategory.length+filterColor.length+filterSize.length+filterCollection.length);
                if (filterMaterials.length+filterCategory.length+filterColor.length+filterSize.length+filterCollection.length > 0 || filterSort != ''){
                    document.getElementById('pagintaion-box').classList.add('off');
                    $('#products').load('<?php bloginfo('template_directory') ?>/system_filters_catalog.php', {
                        Collection: filterCollection,
                        Materials: filterMaterials,
                        Category: filterCategory,
                        Color: filterColor,
                        Size: filterSize,
                        Price: filterPrice,
                        Sort: filterSort
                    });
                } else {
                    document.getElementById('pagintaion-box').classList.remove('off');
                    activePaginationPage = 1;
                    updatePaginationList();
                    loadPage(1);
                }
            }
            
            function updateFiltersMobile(){
                console.log('updateFiltersMobile');
                //Собираем отмеченные input в каждом фильтре
                
                //Материал//
                filters = document.getElementById('filters-material-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterMaterials = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterMaterials = filterMaterials + '--' + checkbox.id;
                });
                filterMaterials = filterMaterials.substring(2);
                filterMaterials = filterMaterials.replace(/material_mob_/g, '');
                
                //Категории//
                filters = document.getElementById('filters-category-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCategory = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCategory = filterCategory + '--' + checkbox.id;
                });
                filterCategory = filterCategory.substring(2);
                filterCategory = filterCategory.replace(/category_mob_/g, '');
                
                //Цвет//
                filters = document.getElementById('filters-color-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterColor = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterColor = filterColor + '--' + checkbox.id;
                });
                filterColor = filterColor.substring(2);
                filterColor = filterColor.replace(/color_mob_/g, '');

                //Коллекции//
                filters = document.getElementById('filters-collection-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCollection = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCollection = filterCollection + '--' + checkbox.id;
                });
                filterCollection = filterCollection.substring(2);
                filterCollection = filterCollection.replace(/collection_mob_/g, '');
                
                //Размер//
                filters = document.getElementById('filters-size-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSize = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSize = filterSize + '--' + checkbox.id;
                });
                filterSize = filterSize.substring(2);
                filterSize = filterSize.replace(/size_mob_/g, '');
                
                //Цена//
                upperSlider = document.querySelector('#two').value;
                lowerSlider = document.querySelector('#one').value;
                filterPrice = lowerSlider+'--'+upperSlider;

                //Сортировка//
                filters = document.getElementById('filters-sort-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSort = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSort = checkbox.id;
                });
                filterSort = filterSort.replace(/_mobile/g, '');
                
                
                console.log('filterMaterials: '+filterMaterials);
                console.log('filterCategory: '+filterCategory);
                console.log('filterColor: '+filterColor);
                console.log('filterCollection: '+filterCollection);
                console.log('filterSize: '+filterSize);
                console.log('filterPrice: '+filterPrice);
                
                if (filterMaterials.length+filterCategory.length+filterColor.length+filterSize.length+filterCollection.length+filterSort.length > 0){
                    document.getElementById('pagintaion-box').classList.add('off');
                    $('#products').load('<?php bloginfo('template_directory') ?>/system_filters_catalog.php', {
                        Materials: filterMaterials,
                        Category: filterCategory,
                        Collection: filterCollection,
                        Color: filterColor,
                        Size: filterSize,
                        Price: filterPrice,
                        Sort: filterSort
                    });
                } else {
                    document.getElementById('pagintaion-box').classList.remove('off');
                    activePaginationPage = 1;
                    updatePaginationList();
                    loadPage(1);
                }
                showProducts();
            }

        </script>
    </div>

    <div class="block-1 product-list">
        <div class="container">
            <div class="line2" id="products">

                <?php 
                $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 16,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ( $products->have_posts() ) {
                            $products->the_post();
                            global $product;
                            
                            $product_link = get_permalink($product->get_id());
                            $terms = get_the_terms($product->get_id(), 'product_cat');
                            if ($terms && !is_wp_error($terms)) {
                                $category_names = array();
                                foreach ($terms as $term) {
                                    $category_names[] = $term->name;
                                }
                                $category_list = implode(', ', $category_names);
                            }
                            $attribute_name = 'Color';
                            $attribute_value = $product->get_attribute($attribute_name);
                            ?>
                            
                            <a href="<?php echo $product_link?>" class="box">
                                <div class="l1">
                                    <div class="name">
                                        <p class="type"><?php echo $category_list ?></p>
                                        <h4><?php echo get_the_title() ?></h4>
                                    </div>
                                    <div class="like-btn"></div>
                                    <div class="colors">
                                        <?php
                                        $attribute_name = 'Color';
                                        $attribute_value = $product->get_attribute($attribute_name);
                                        
                                        if ($attribute_value) {
                                            $taxonomy = 'pa_' . sanitize_title($attribute_name);
                                            $terms = explode(', ', $attribute_value); // Разделяем значения атрибута по запятой
                                            foreach ($terms as $term_value) {
                                                $term = get_term_by('name', $term_value, $taxonomy);
                                                if ($term) {
                                                    echo '<span class="' . $term->slug . '"></span>';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="img">
                                    <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                                </div>
                                <div class="l3">
                                    <?php 
                                    if ( $product->is_type( 'variable' ) ) {
                                        $variations = $product->get_available_variations();
                                        if ( ! empty( $variations ) ) {
                                            $variation = $variations[0];
                                            $variation_obj = wc_get_product( $variation['variation_id'] );
                                            if ( $variation_obj ) {
                                                $price = $variation_obj->get_price();
                                            }
                                        }
                                    } else {
                                        $price = $product->get_price();
                                    }
                                    
                                    $currency_symbol = '₴'; // Замените на нужный символ валюты
                                    
                                    $formatted_price = number_format( $price, 0, '', ' ' ); // Форматируем цену с пробелами в качестве разделителя тысячных
                                    $price_output = $formatted_price . ' ' . $currency_symbol;
                                    
                                    echo '<p class="price">' . $price_output . '</p>';
                                    ?>
                                    <div class="more">
                                        <p>Докладніше</p>
                                        <span></span>
                                    </div>
                                </div>
                            </a>
                            
                            <?php 
                            
                            // ...
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }
                    ?>


            </div>
            <div class="line3" id="pagintaion-box">
                <div class="cont">
                    <?php
                    $total_products = wc_get_products(array(
                        'status' => 'publish', // Только опубликованные товары
                        'limit' => -1, // Все товары
                        'return' => 'ids', // Вернуть только идентификаторы товаров
                    ));
                    
                    $count = count($total_products);
                    ?>
                    <p onclick="catalogPagePrev()" class="bigbtn">Назад</p>
                    <ul id="pagintaion">
                        <a class="active" onclick="loadPage(1)">1</a>
                        <a onclick="loadPage(2)">2</a>
                        <a onclick="loadPage(3)">3</a>
                        <a onclick="loadPage(4)">4</a>
                        <span>...</span>
                        <a onclick="loadPage(9)">9</a>
                    </ul>
                    <script>
                        //Pagintaion
                        MaxProd = <?php echo $count; ?>;
                        $( document ).ready(function() {
                            updatePaginationList();
                            
                        });
                        
                        var activePaginationPage = 1;
                        maxPaginationPage = Math.ceil(MaxProd/16);
                        function updatePaginationList(){
                            console.log('updatePaginationList');
                            console.log(activePaginationPage);
                            if (activePaginationPage == 1){
                                //Первая страница
                                console.log('Первая страница');
                                result = '<a class="active" onclick="loadPage(1)">1</a><a onclick="loadPage(2)">2</a><a onclick="loadPage(3)">3</a><span>...</span><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                document.getElementById('pagintaion').innerHTML = result;
                            } else {
                                if (activePaginationPage == maxPaginationPage){
                                    //Последняя страница
                                    console.log('Последняя страница');
                                    preprelast = maxPaginationPage - 2;
                                    prelast = maxPaginationPage - 1;
                                    result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+preprelast+')">'+preprelast+'</a><a onclick="loadPage('+prelast+')">'+prelast+'</a><a class="active" onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                    document.getElementById('pagintaion').innerHTML = result;
                                } else{
                                    if (activePaginationPage == maxPaginationPage - 1){
                                        //Предпоследняя страница
                                        console.log('Предпоследняя страница');
                                        previous = activePaginationPage - 1;
                                        result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                        document.getElementById('pagintaion').innerHTML = result;
                                    } else {
                                        if (activePaginationPage == maxPaginationPage - 2){
                                            //Предпредпоследняя страница
                                            console.log('Предпредпоследняя страница');
                                            previous = activePaginationPage - 1;
                                            next = activePaginationPage + 1;
                                            result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+next+')">'+next+'</a><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                            document.getElementById('pagintaion').innerHTML = result;
                                        } else {
                                            //Страница из середины
                                            console.log('Страница из середины');
                                            previous = activePaginationPage - 1;
                                            next = activePaginationPage + 1;
                                            result = '<a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+next+')">'+next+'</a><span>...</span><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>'; 
                                            document.getElementById('pagintaion').innerHTML = result;
                                        }
                                    }
                                }
                            }
                        }
                        
                    </script>
                    <p onclick="catalogPageNext()" class="bigbtn">Далі</p>
                </div>
            </div>
        </div>
        <script>
            
            function loadPage(a){
                $('#products').load('<?php bloginfo('template_directory') ?>/system_loadProducts.php', {
                    Page: a
                });
                activePaginationPage = a;
                console.log(activePaginationPage);
                updatePaginationList();
            }

            function catalogPageNext(){
                if (activePaginationPage<maxPaginationPage){
                    activePaginationPage++;
                    loadPage(activePaginationPage);
                }
            }

            function catalogPagePrev(){
                console.log('catalogPagePrev');
                console.log(activePaginationPage);
                if (activePaginationPage>1){
                    activePaginationPage = activePaginationPage - 1;
                    loadPage(activePaginationPage);
                }
                console.log(activePaginationPage);
            }
            
            const queryParams = new URLSearchParams(window.location.href);
            const getParam = (param) => {
                const urlParams = new URL(window.location.toString()).searchParams
                return urlParams.get(param) || ''
            }
            
            category = getParam('category');
            if (category != ''){
                document.getElementById('category_mob_'+category).checked = true;
                document.getElementById('category_'+category).checked = true;
                updateFilters()
            }

            sort = getParam('sort');
            if (sort != ''){
                document.getElementById(sort).checked = true;
                document.getElementById(sort+'_mobile').checked = true;
                updateFilters()
            }

            collection = getParam('collection');
            if (collection != ''){
                console.log('collection find');
                document.getElementById('collection_'+collection).checked = true;
                document.getElementById('collection_mob_'+collection+'').checked = true;
                updateFilters();
            } else {
                console.log('collection not find');
            }


            
        </script>
    </div>

<?php
} elseif ( $current_language === 'en' ) { 
?>

<div class="filters-mobile" id="filters-mobile" style="display: ">
        <div class="bigcont">
            <!--            <div class="bigcont2">-->
            <div class="container">
                <div class="bigbox">
                    <span class="head">FILTERS</span>
                    <div class="b1">
                        
                        <div class="filter" id="filters-collection-mobile">
                            <p onclick="openFilterMobile(0)">Collection</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $attribute = 'pa_collection'; // Слаг таксономии атрибута Color
                                    
                                    $terms = get_terms(array(
                                        'taxonomy' => $attribute, // Название таксономии
                                        'hide_empty' => false, // Показывать пустые значения или нет
                                    ));
                                    
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="collection_mob_' . $term->slug . '">';
                                            echo '    <label for="collection_mob_' . $term->slug . '">' . $term->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="filter" id="filters-sort-mobile">
                            <p onclick="openFilterMobile(1)">Sorting</p>
                             <div class="box">
                                 <div class="cont">
                                     <div class="var-group">
                                         <input type="checkbox" id="priceUp_mobile">
                                         <label for="priceUp_mobile">From cheap to expensive</label>
                                     </div>
                                     <div class="var-group">
                                         <input type="checkbox" id="priceDown_mobile">
                                         <label for="priceDown_mobile">From expensive to cheap</label>
                                     </div>
                                     <div class="var-group">
                                         <input type="checkbox" id="newProds_mobile">
                                         <label for="newProds_mobile">News</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-category-mobile">
                            <p onclick="openFilterMobile(2)">categories</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $categories = get_terms(array(
                                        'taxonomy' => 'product_cat', // название таксономии
                                        'hide_empty' => false, // показывать пустые категории или нет
                                        
                                    ));
                                    
                                    if (!empty($categories) && !is_wp_error($categories)) {
                                        foreach ($categories as $category) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="category_mob_'.$category->slug.'">';
                                            echo '    <label for="category_mob_'.$category->slug.'">' . $category->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-color-mobile">
                            <p onclick="openFilterMobile(3)">color</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                $attribute = 'pa_color'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input type="checkbox" id="color_mob_' . $term->slug . '">';
                                        echo '    <label for="color_mob_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-size-mobile">
                            <p onclick="openFilterMobile(4)">Size</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $attribute = 'pa_size'; // Слаг таксономии атрибута Color
                                    
                                    $terms = get_terms(array(
                                        'taxonomy' => $attribute, // Название таксономии
                                        'hide_empty' => false, // Показывать пустые значения или нет
                                    ));
                                    
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="size_mob_' . $term->slug . '">';
                                            echo '    <label for="size_mob_' . $term->slug . '">' . $term->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter" id="filters-material-mobile">
                            <p onclick="openFilterMobile(5)">Material</p>
                            <div class="box">
                                <div class="cont">
                                    <?php
                                    $attribute = 'pa_material'; // Слаг таксономии атрибута Color
                                    
                                    $terms = get_terms(array(
                                        'taxonomy' => $attribute, // Название таксономии
                                        'hide_empty' => false, // Показывать пустые значения или нет
                                    ));
                                    
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            echo '<div class="var-group">';
                                            echo '    <input type="checkbox" id="material_mob_' . $term->slug . '">';
                                            echo '    <label for="material_mob_' . $term->slug . '">' . $term->name . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="filter price">
                            <p onclick="openFilterMobile(6)">price</p>
                            <div class="box">
                                <div class="cont">
                                    <fieldset class="filter-price">
                                        <div class="price-field">
                                            <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $minPrice; ?>" id="lowerMobile">
                                            <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $maxPrice; ?>" id="upperMobile">
                                        </div>
                                        <div class="price-wrap">
                                            <div class="price-wrap-1">
                                                <input id="oneMobile">
                                                <!--                                        <label for="one">$</label>-->
                                            </div>
                                            <div class="price-wrap_line">-</div>
                                            <div class="price-wrap-2">
                                                <input id="twoMobile">
                                                <!--                                        <label for="two">$</label>-->
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              openMobileFilters();
                            });
                            function openMobileFilters(){
                                var filters = document.getElementById('filters-mobile').querySelectorAll('.filter');
                                // filters.forEach((element) => {
                                //     element.classList.add('active');
                                //     element.querySelectorAll('.box')[0].style.height = element.querySelectorAll('.cont')[0].offsetHeight + 'px';
                                // })
                                console.log(filters[1]);
                                filters[1].classList.add('active');
                                filters[1].querySelectorAll('.box')[0].style.height = filters[1].querySelectorAll('.cont')[0].offsetHeight + 'px';
                            }
                        </script>
                    </div>
                </div>
                <div class="big-btn" onclick="updateFiltersMobile()">Show products</div>
                <script>
                    var filtersChanged = false;
                    function showProducts(){
                        document.getElementById('filters-mobile').classList.remove('active');
                    }
                </script>
            </div>
            <!--            </div>-->
        </div>
        <div class="bg"></div>
        <script>
            function openFilterMobile(a) {
                console.log('openFilterMobile');
                var filters = document.getElementById('filters-mobile').querySelectorAll('.filter');


                var i = -1;
                var activeEl = [];

                var j = 0;
                //Получаем список открытых фильтров
                filters.forEach((element) => {
                    if (element.classList.contains('active')) {
                        i = j;
                        k = j - 1;
                        activeEl.push(j);
                    }
                    j++;
                })

                console.log(activeEl);
                console.log('i - ' + i);
                console.log('a - ' + a);
                j = 0;
                
                //

                if (activeEl.includes(a)) {
                    console.log('2');
                    filters[a].querySelectorAll('.box')[0].removeAttribute('style');
                    filters[a].classList.remove('active');
                } else {
                    console.log('1');
                    //Открываем новый
                    filters[a].classList.add('active');
                    filters[a].querySelectorAll('.box')[0].style.height = filters[a].querySelectorAll('.cont')[0].offsetHeight + 'px';
                }
            }

            //Price filter Mobile

            var lowerSliderMobile = document.querySelector('#lowerMobile');
            var upperSliderMobile = document.querySelector('#upperMobile');

            document.querySelector('#twoMobile').value = upperSliderMobile.value;
            document.querySelector('#oneMobile').value = lowerSliderMobile.value;

            var lowerValMobile = parseInt(lowerSliderMobile.value);
            var upperValMobile = parseInt(upperSliderMobile.value);

            upperSliderMobile.oninput = function() {
                lowerValMobile = parseInt(lowerSliderMobile.value);
                upperValMobile = parseInt(upperSliderMobile.value);

                if (upperValMobile < lowerValMobile + 4) {
                    lowerSliderMobile.value = upperValMobile - 4;
                    if (lowerValMobile == lowerSlideMobiler.min) {
                        upperSliderMobile.value = 4;
                    }
                }
                document.querySelector('#twoMobile').value = this.value
            };

            lowerSliderMobile.oninput = function() {
                lowerValMobile = parseInt(lowerSliderMobile.value);
                upperValMobile = parseInt(upperSliderMobile.value);
                if (lowerValMobile > upperValMobile - 4) {
                    upperSliderMobile.value = lowerValMobile + 4;
                    if (upperValMobile == upperSliderMobile.max) {
                        lowerSliderMobile.value = parseInt(upperSliderMobile.max) - 4;
                    }
                }
                document.querySelector('#oneMobile').value = this.value
            };


            function priceFilterOnMobile() {
                upperSliderMobile.value = document.querySelector('#twoMobile').value;
                lowerSliderMobile.value = document.querySelector('#oneMobile').value;

            }

        </script>
    </div>

    <div class="breadcrumbs" id="filters">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="HOMEURL" title="Головна" itemprop="item" bis_skin_checked="1">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item">
                        <span itemprop="name">Catalogue</span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
            </ul>
            <div class="b1">
                <div class="b11">
                    <div class="filter" id="filters-collection">
                        <p onclick="openFilter(0)">Collection</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_collection'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="collection_' . $term->slug . '">';
                                        echo '    <label for="collection_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b11">
                    <div class="filter" id="filters-category">
                        <p onclick="openFilter(1)">categories</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $categories = get_terms(array(
                                    'taxonomy' => 'product_cat', // название таксономии
                                    'hide_empty' => false, // показывать пустые категории или нет
                                    
                                ));
                                
                                if (!empty($categories) && !is_wp_error($categories)) {
                                    foreach ($categories as $category) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="category_'.$category->slug.'">';
                                        echo '    <label for="category_'.$category->slug.'">' . $category->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter" id="filters-color">
                        <p onclick="openFilter(2)">color</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_color'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="color_' . $term->slug . '">';
                                        echo '    <label for="color_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter" id="filters-size">
                        <p onclick="openFilter(3)">Розмір</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_size'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="size_' . $term->slug . '">';
                                        echo '    <label for="size_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b12">
                    <div class="filter" id="filters-material">
                        <p onclick="openFilter(4)">Material</p>
                        <div class="box">
                            <div class="cont">
                                <?php
                                $attribute = 'pa_material'; // Слаг таксономии атрибута Color
                                
                                $terms = get_terms(array(
                                    'taxonomy' => $attribute, // Название таксономии
                                    'hide_empty' => false, // Показывать пустые значения или нет
                                ));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="var-group">';
                                        echo '    <input onchange="updateFilters()" type="checkbox" id="material_' . $term->slug . '">';
                                        echo '    <label for="material_' . $term->slug . '">' . $term->name . '</label>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="filter price">
                        <p onclick="openFilter(5)">price</p>
                        <div class="box">
                            <div class="cont">
                                <fieldset class="filter-price">
                                    <div class="price-field">
                                        <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $minPrice; ?>" id="lower">
                                        <input type="range" min="<?php echo $minPrice; ?>" max="<?php echo $maxPrice; ?>" value="<?php echo $maxPrice; ?>" id="upper">
                                    </div>
                                    <div class="price-wrap">
                                        <div class="price-wrap-1">
                                            <input onchange="updateFilters()" id="one">
                                            <!--                                        <label for="one">$</label>-->
                                        </div>
                                        <div class="price-wrap_line">-</div>
                                        <div class="price-wrap-2">
                                            <input onchange="updateFilters()" id="two">
                                            <!--                                        <label for="two">$</label>-->
                                        </div>
                                    </div>
                                    <div class="btn" onclick="updateFilters()">Застосувати</div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="filter" id="filters-sort">
                        <p onclick="openFilter(6)">Sorting</p>
                         <div class="box">
                             <div class="cont">
                                 <div class="var-group">
                                     <input type="checkbox" id="priceUp">
                                     <label for="priceUp">From cheap to expensive</label>
                                 </div>
                                 <div class="var-group">
                                     <input type="checkbox" id="priceDown">
                                     <label for="priceDown">From expensive to cheap</label>
                                 </div>
                                 <div class="var-group">
                                     <input type="checkbox" id="newProds">
                                     <label for="newProds">New products</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn" onclick="filtersMobileOpen()">Фільтри та сортування</div>
            <script>
                function filtersMobileOpen() {
                    document.getElementById('filters-mobile').classList.toggle('active');
                }

            </script>
        </div>
        <script>
            function openFilter(a) {
                console.log('openFilter');
                var filters = document.getElementById('filters').querySelectorAll('.filter');


                var i = -1;

                var j = 0;
                filters.forEach((element) => {
                    if (element.classList.contains('active')) {
                        i = j;
                    }
                    j++;
                })

                //Закрываем все открытые
                filters.forEach((element) => {
                    element.classList.remove('active');
                    element.querySelectorAll('.box')[0].removeAttribute('style');
                })
                console.log('i - ' + i);
                console.log('a - ' + a);
                if (a != i) {
                    //Открываем новый
                    filters[a].classList.add('active');
                    filters[a].querySelectorAll('.box')[0].style.height = filters[a].querySelectorAll('.cont')[0].offsetHeight + 'px';
                } else {
                    //Текущий уже закрыт
                }
            }


            //Price filter

            var lowerSlider = document.querySelector('#lower');
            var upperSlider = document.querySelector('#upper');

            document.querySelector('#two').value = upperSlider.value;
            document.querySelector('#one').value = lowerSlider.value;

            var lowerVal = parseInt(lowerSlider.value);
            var upperVal = parseInt(upperSlider.value);

            upperSlider.oninput = function() {
                lowerVal = parseInt(lowerSlider.value);
                upperVal = parseInt(upperSlider.value);

                if (upperVal < lowerVal + 4) {
                    lowerSlider.value = upperVal - 4;
                    if (lowerVal == lowerSlider.min) {
                        upperSlider.value = 4;
                    }
                }
                document.querySelector('#two').value = this.value
            };

            lowerSlider.oninput = function() {
                lowerVal = parseInt(lowerSlider.value);
                upperVal = parseInt(upperSlider.value);
                if (lowerVal > upperVal - 4) {
                    upperSlider.value = lowerVal + 4;
                    if (upperVal == upperSlider.max) {
                        lowerSlider.value = parseInt(upperSlider.max) - 4;
                    }
                }
                document.querySelector('#one').value = this.value
            };


            function priceFilterOn() {
                upperSlider.value = document.querySelector('#two').value;
                lowerSlider.value = document.querySelector('#one').value;

            }
            
            document.getElementById('newProds').addEventListener('change', function() {
                document.getElementById('priceUp').checked = false;
                document.getElementById('priceDown').checked = false;
                updateFilters();
            });
            document.getElementById('priceUp').addEventListener('change', function() {
                document.getElementById('newProds').checked = false;
                document.getElementById('priceDown').checked = false;
                updateFilters();
            });
            document.getElementById('priceDown').addEventListener('change', function() {
                document.getElementById('priceUp').checked = false;
                document.getElementById('newProds').checked = false;
                updateFilters();
            });


            document.getElementById('newProds_mobile').addEventListener('change', function() {
                document.getElementById('priceUp_mobile').checked = false;
                document.getElementById('priceDown_mobile').checked = false;
                updateFilters();
            });
            document.getElementById('priceUp_mobile').addEventListener('change', function() {
                document.getElementById('newProds_mobile').checked = false;
                document.getElementById('priceDown_mobile').checked = false;
                updateFilters();
            });
            document.getElementById('priceDown_mobile').addEventListener('change', function() {
                document.getElementById('priceUp_mobile').checked = false;
                document.getElementById('newProds_mobile').checked = false;
                updateFilters();
            });
            
            
            function updateFilters(){
                
                console.log('111111111111111111');
                //Собираем отмеченные input в каждом фильтре
                
                //Материал//
                filters = document.getElementById('filters-material');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterMaterials = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterMaterials = filterMaterials + '--' + checkbox.id;
                });
                filterMaterials = filterMaterials.substring(2);
                filterMaterials = filterMaterials.replace(/material_/g, '');
                
                //Категории//
                filters = document.getElementById('filters-category');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCategory = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCategory = filterCategory + '--' + checkbox.id;
                });
                filterCategory = filterCategory.substring(2);
                filterCategory = filterCategory.replace(/category_/g, '');
                
                //Цвет//
                filters = document.getElementById('filters-color');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterColor = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterColor = filterColor + '--' + checkbox.id;
                });
                filterColor = filterColor.substring(2);
                filterColor = filterColor.replace(/color_/g, '');
                
                //Размер//
                filters = document.getElementById('filters-size');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSize = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSize = filterSize + '--' + checkbox.id;
                });
                filterSize = filterSize.substring(2);
                filterSize = filterSize.replace(/size_/g, '');

                //Коллекция//
                filters = document.getElementById('filters-collection');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCollection = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCollection = filterCollection + '--' + checkbox.id;
                });
                filterCollection = filterCollection.substring(2);
                filterCollection = filterCollection.replace(/collection_/g, '');
                
                //Цена//
                upperSlider = document.querySelector('#two').value;
                lowerSlider = document.querySelector('#one').value;
                filterPrice = lowerSlider+'--'+upperSlider;
                
                //Сортировка//
                filters = document.getElementById('filters-sort');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSort = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSort = checkbox.id;
                });
                
                console.log('----------------------');
                console.log(filterSort);
                
                
                console.log('filterMaterials: '+filterMaterials);
                console.log('filterCategory: '+filterCategory);
                console.log('filterColor: '+filterColor);
                console.log('filterSize: '+filterSize);
                console.log('filterCollection: '+filterCollection);
                console.log('filterPrice: '+filterPrice);
                
                console.log('Full length'+filterMaterials.length+filterCategory.length+filterColor.length+filterSize.length+filterCollection.length);
                if (filterMaterials.length+filterCategory.length+filterColor.length+filterSize.length+filterCollection.length > 0 || filterSort != ''){
                    document.getElementById('pagintaion-box').classList.add('off');
                    $('#products').load('<?php bloginfo('template_directory') ?>/system_filters_catalog.php', {
                        Collection: filterCollection,
                        Materials: filterMaterials,
                        Category: filterCategory,
                        Color: filterColor,
                        Size: filterSize,
                        Price: filterPrice,
                        Sort: filterSort
                    });
                } else {
                    document.getElementById('pagintaion-box').classList.remove('off');
                    activePaginationPage = 1;
                    updatePaginationList();
                    loadPage(1);
                }
            }
            
            function updateFiltersMobile(){
                console.log('updateFiltersMobile');
                //Собираем отмеченные input в каждом фильтре
                
                //Материал//
                filters = document.getElementById('filters-material-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterMaterials = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterMaterials = filterMaterials + '--' + checkbox.id;
                });
                filterMaterials = filterMaterials.substring(2);
                filterMaterials = filterMaterials.replace(/material_mob_/g, '');
                
                //Категории//
                filters = document.getElementById('filters-category-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCategory = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCategory = filterCategory + '--' + checkbox.id;
                });
                filterCategory = filterCategory.substring(2);
                filterCategory = filterCategory.replace(/category_mob_/g, '');
                
                //Цвет//
                filters = document.getElementById('filters-color-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterColor = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterColor = filterColor + '--' + checkbox.id;
                });
                filterColor = filterColor.substring(2);
                filterColor = filterColor.replace(/color_mob_/g, '');

                //Коллекции//
                filters = document.getElementById('filters-collection-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterCollection = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterCollection = filterCollection + '--' + checkbox.id;
                });
                filterCollection = filterCollection.substring(2);
                filterCollection = filterCollection.replace(/collection_mob_/g, '');
                
                //Размер//
                filters = document.getElementById('filters-size-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSize = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSize = filterSize + '--' + checkbox.id;
                });
                filterSize = filterSize.substring(2);
                filterSize = filterSize.replace(/size_mob_/g, '');
                
                //Цена//
                upperSlider = document.querySelector('#two').value;
                lowerSlider = document.querySelector('#one').value;
                filterPrice = lowerSlider+'--'+upperSlider;

                //Сортировка//
                filters = document.getElementById('filters-sort-mobile');
                checkedCheckboxes = filters.querySelectorAll('input[type="checkbox"]:checked');
                var filterSort = '';
                checkedCheckboxes.forEach((checkbox) => {
                    filterSort = checkbox.id;
                });
                filterSort = filterSort.replace(/_mobile/g, '');
                
                
                console.log('filterMaterials: '+filterMaterials);
                console.log('filterCategory: '+filterCategory);
                console.log('filterColor: '+filterColor);
                console.log('filterCollection: '+filterCollection);
                console.log('filterSize: '+filterSize);
                console.log('filterPrice: '+filterPrice);
                
                if (filterMaterials.length+filterCategory.length+filterColor.length+filterSize.length+filterCollection.length+filterSort.length > 0){
                    document.getElementById('pagintaion-box').classList.add('off');
                    $('#products').load('<?php bloginfo('template_directory') ?>/system_filters_catalog.php', {
                        Materials: filterMaterials,
                        Category: filterCategory,
                        Collection: filterCollection,
                        Color: filterColor,
                        Size: filterSize,
                        Price: filterPrice,
                        Sort: filterSort
                    });
                } else {
                    document.getElementById('pagintaion-box').classList.remove('off');
                    activePaginationPage = 1;
                    updatePaginationList();
                    loadPage(1);
                }
                showProducts();
            }

        </script>
    </div>

    <div class="block-1 product-list">
        <div class="container">
            <div class="line2" id="products">

                <?php 
                $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 16,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ( $products->have_posts() ) {
                            $products->the_post();
                            global $product;
                            
                            $product_link = get_permalink($product->get_id());
                            $terms = get_the_terms($product->get_id(), 'product_cat');
                            if ($terms && !is_wp_error($terms)) {
                                $category_names = array();
                                foreach ($terms as $term) {
                                    $category_names[] = $term->name;
                                }
                                $category_list = implode(', ', $category_names);
                            }
                            $attribute_name = 'Color';
                            $attribute_value = $product->get_attribute($attribute_name);
                            ?>
                            
                            <div class="box">
                                <div class="l1">
                                    <div class="name">
                                        <p class="type"><?php echo $category_list ?></p>
                                        <h4><?php echo get_the_title() ?></h4>
                                    </div>
                                    <div class="like-btn"></div>
                                    <div class="colors">
                                        <?php
                                        $attribute_name = 'Color';
                                        $attribute_value = $product->get_attribute($attribute_name);
                                        
                                        if ($attribute_value) {
                                            $taxonomy = 'pa_' . sanitize_title($attribute_name);
                                            $terms = explode(', ', $attribute_value); // Разделяем значения атрибута по запятой
                                            foreach ($terms as $term_value) {
                                                $term = get_term_by('name', $term_value, $taxonomy);
                                                if ($term) {
                                                    echo '<span class="' . $term->slug . '"></span>';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="img">
                                    <img src="<?php bloginfo('template_directory') ?>/img/poduct-catalog.png">
                                </div>
                                <div class="l3">
                                    <?php 
                                    if ( $product->is_type( 'variable' ) ) {
                                        $variations = $product->get_available_variations();
                                        if ( ! empty( $variations ) ) {
                                            $variation = $variations[0];
                                            $variation_obj = wc_get_product( $variation['variation_id'] );
                                            if ( $variation_obj ) {
                                                $price = $variation_obj->get_price();
                                            }
                                        }
                                    } else {
                                        $price = $product->get_price();
                                    }
                                    
                                    $currency_symbol = '₴'; // Замените на нужный символ валюты
                                    
                                    $formatted_price = number_format( $price, 0, '', ' ' ); // Форматируем цену с пробелами в качестве разделителя тысячных
                                    $price_output = $formatted_price . ' ' . $currency_symbol;
                                    
                                    echo '<p class="price">' . $price_output . '</p>';
                                    ?>
                                    <div class="more">
                                        <a href="<?php echo $product_link?>">Read more</a>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                            
                            // ...
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Товары не найдены.';
                    }
                    ?>


            </div>
            <div class="line3" id="pagintaion-box">
                <div class="cont">
                    <?php
                    $total_products = wc_get_products(array(
                        'status' => 'publish', // Только опубликованные товары
                        'limit' => -1, // Все товары
                        'return' => 'ids', // Вернуть только идентификаторы товаров
                    ));
                    
                    $count = count($total_products);
                    ?>
                    <a href="#" class="bigbtn">Back</a>
                    <ul id="pagintaion">
                        <a class="active" onclick="loadPage(1)">1</a>
                        <a onclick="loadPage(2)">2</a>
                        <a onclick="loadPage(3)">3</a>
                        <a onclick="loadPage(4)">4</a>
                        <span>...</span>
                        <a onclick="loadPage(9)">9</a>
                    </ul>
                    <script>
                        //Pagintaion
                        MaxProd = <?php echo $count; ?>;
                        $( document ).ready(function() {
                            updatePaginationList();
                            
                        });
                        
                        var activePaginationPage = 1;
                        maxPaginationPage = Math.ceil(MaxProd/16);
                        function updatePaginationList(){
                            console.log('updatePaginationList');
                            console.log(activePaginationPage);
                            if (activePaginationPage == 1){
                                //Первая страница
                                console.log('Первая страница');
                                result = '<a class="active" onclick="loadPage(1)">1</a><a onclick="loadPage(2)">2</a><a onclick="loadPage(3)">3</a><span>...</span><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                document.getElementById('pagintaion').innerHTML = result;
                            } else {
                                if (activePaginationPage == maxPaginationPage){
                                    //Последняя страница
                                    console.log('Последняя страница');
                                    preprelast = maxPaginationPage - 2;
                                    prelast = maxPaginationPage - 1;
                                    result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+preprelast+')">'+preprelast+'</a><a onclick="loadPage('+prelast+')">'+prelast+'</a><a class="active" onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                    document.getElementById('pagintaion').innerHTML = result;
                                } else{
                                    if (activePaginationPage == maxPaginationPage - 1){
                                        //Предпоследняя страница
                                        console.log('Предпоследняя страница');
                                        previous = activePaginationPage - 1;
                                        result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                        document.getElementById('pagintaion').innerHTML = result;
                                    } else {
                                        if (activePaginationPage == maxPaginationPage - 2){
                                            //Предпредпоследняя страница
                                            console.log('Предпредпоследняя страница');
                                            previous = activePaginationPage - 1;
                                            next = activePaginationPage + 1;
                                            result = '<a onclick="loadPage(1)">1</a><span>...</span><a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+next+')">'+next+'</a><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>';
                                            document.getElementById('pagintaion').innerHTML = result;
                                        } else {
                                            //Страница из середины
                                            console.log('Страница из середины');
                                            previous = activePaginationPage - 1;
                                            next = activePaginationPage + 1;
                                            result = '<a onclick="loadPage('+previous+')">'+previous+'</a><a class="active" onclick="loadPage('+activePaginationPage+')">'+activePaginationPage+'</a><a onclick="loadPage('+next+')">'+next+'</a><span>...</span><a onclick="loadPage('+maxPaginationPage+')">'+maxPaginationPage+'</a>'; 
                                            document.getElementById('pagintaion').innerHTML = result;
                                        }
                                    }
                                }
                            }
                        }
                        
                    </script>
                    <a href="#" class="bigbtn">Forward</a>
                </div>
            </div>
        </div>
        <script>
            
            function loadPage(a){
                $('#products').load('<?php bloginfo('template_directory') ?>/system_loadProducts.php', {
                    Page: a
                });
                activePaginationPage = a;
                console.log(activePaginationPage);
                updatePaginationList();
            }
            
            const queryParams = new URLSearchParams(window.location.href);
            const getParam = (param) => {
                const urlParams = new URL(window.location.toString()).searchParams
                return urlParams.get(param) || ''
            }
            
            category = getParam('category');
            if (category != ''){
                document.getElementById('category_mob_'+category).checked = true;
                document.getElementById('category_'+category).checked = true;
                updateFilters()
            }

            sort = getParam('sort');
            if (sort != ''){
                document.getElementById(sort).checked = true;
                document.getElementById(sort+'_mobile').checked = true;
                updateFilters()
            }

            collection = getParam('collection');
            if (collection != ''){
                console.log('collection find');
                document.getElementById('collection_'+collection).checked = true;
                document.getElementById('collection_mob_'+collection+'').checked = true;
                updateFilters();
            } else {
                console.log('collection not find');
            }
            
        </script>
    </div>

<?php
}
?> 

    <?php include 'custom-footer.php' ?>

</body>

</html>
