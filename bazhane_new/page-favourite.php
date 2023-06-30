<?php

/*
*Template name: Favourites
Template Post Type: page
*/

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
		<link href="<?php bloginfo('template_directory') ?>/css/favourites.css" rel="stylesheet" type="text/css" media="all" /> </head>

	<body class="">
		<style>
		.product-list .line2 .box .img{width: 200px}
		</style>
		<?php include 'custom-header.php'; ?>
		<div class="breadcrumbs" id="filters">
			<div class="container">
				<ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
					<li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"> <a href="HOMEURL" title="Головна" itemprop="item" bis_skin_checked="1">
                        <span itemprop="name">Bazhane</span>
                        <meta itemprop="position" content="0">
                    </a> </li>
					<li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"> <a itemprop="item">
                        <span itemprop="name">Вибрані товари</span>
                        <meta itemprop="position" content="1">
                    </a> </li>
				</ul>
			</div>
		</div>
		<?php
		$user_id = get_current_user_id();

 
?>
		<div class="block-1 product-list">
			<div id="update_cont" class="container">
				<div class="line2" id="products">
					<?php
              
    // Получить текущий список желаний пользователя
    $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist();
$wishlist_id = $wishlist->get_id();
 
    // Проверить, получен ли список желаний
    if ( ! $wishlist ) {
        return 'Список желаний не найден.';
    }

    // Получить товары из списка желаний
    $wishlist_items = $wishlist->get_items();

    // Проверить, есть ли товары в списке желаний
    if ( empty( $wishlist_items ) ) {
        return 'В данном списке желаний нет товаров.';
    }

   
    ?>
						<?php foreach ($wishlist_items as $prod_i => $wishlist_item) : ?>
						<div class="big-box" data-product-id="<?php echo $wishlist_item->get_product()->get_id(); ?>">
							<div class="box">
								<div class="l1">
									<div class="name">
										<p class="type">
											 
											 <?php
											 $parent_products = wc_get_product($wishlist_item->get_product()->get_parent_id()); // Получение родительского товара
                      
							 
								   $asdf =  $parent_products->get_id();
											 $categories = get_the_terms($asdf, 'product_cat');
											 $firstCategory = reset($categories);
											  $categoryName = $firstCategory->name;

        // Вывод названия категории
        echo   $categoryName;
											 ?>
											 
											 </p>
										<h4>
											<?php echo $wishlist_item->get_product()->get_name(); ?>
										</h4>
									</div>
									<div class="like-btn" data-product-id="<?php echo $wishlist_item->get_product()->get_id(); ?>"></div>
									
										<?php
									if ($wishlist_item->get_product()->get_type() === 'variation') {
    $parent_product = wc_get_product($wishlist_item->get_product()->get_parent_id());
    
    $selected_color = $wishlist_item->get_product()->get_attribute('color');
    
    
    if ($parent_product) {
        $variations = $parent_product->get_available_variations();

        // Фильтрация уникальных значений размера
       
        $colors = array();

        foreach ($variations as $variation) {
            
            if (isset($variation['attributes']['attribute_pa_color'])) {
                $colors[] = $variation['attributes']['attribute_pa_color'];
            }
        }

      
        $unique_colors = array_unique($colors);
            
            
       // Массив соответствия форматов цветов
    $color_mapping = array(
        'чорний' => 'chornyj',
        'молочний' => 'molochnyj',
        // Другие соответствия цветов
    );
    
    // Преобразование выбранного цвета в соответствующий формат
    $selected_color = isset($color_mapping[$selected_color]) ? $color_mapping[$selected_color] : $selected_color;
    
    
        
        // Преобразование в нижний регистр
       
        $selected_color = strtolower($selected_color);
        
        

        $variationIds = '';
        
        
        foreach ($variations as $variation) {
            if (  $variation['attributes']['attribute_pa_color'] === $selected_color ) {
                $variationIds = $variation['variation_id'];
                  
                break;
            }
        }
           // Вывод цветов
           
            
        echo '<div id="colorss_'. $prod_i .'" class="colors">';
        foreach ($unique_colors as $color) {
            echo '<span data-variation-iddd ="' . get_current_variation_id_color($variations, sanitize_html_class($color)) . '" class="' . sanitize_html_class($color) . '"></span>';
        }
        echo '</div>';
        
            echo "<script>";
        echo "var color_currentVariationId_$prod_i = '" . get_current_variation_id_color($variations, sanitize_html_class($color)). "';";
        echo "var selectedVariationId = '';"; // Здесь вы можете установить значение выбранной вариации
        echo "</script>";
    }
}
?>
								<!--	<div class="colors"> 
									
								 
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									<span class="black"></span> <span class="molochnyj"></span> <span class="zhovtyj"></span> <span class="temno-synij"></span> </div> -->
								</div>
								<div class="img">
									<?php   $parent_product = wc_get_product($wishlist_item->get_product()->get_parent_id()); // Получение родительского товара
                               //get_image_url
							   // Получение прикрепленного изображения поста (товара)
                                   $id =  $wishlist_item->get_product()->get_id();
								   $asd =  $parent_product->get_id();
$attachment_id = get_post_thumbnail_id($id);
$image_urls = wp_get_attachment_image_url(get_post_thumbnail_id($id), 'full');
$image_urlsd = wp_get_attachment_image_url(get_post_thumbnail_id($asd), 'full');
 
// Получение URL оригинального изображения
$image_url = wp_get_attachment_image_src($attachment_id, 'full');
 
// Вывод URL оригинального изображения
//echo $image_url[0];
//echo get_the_post_thumbnail($id, 'full');
echo get_the_post_thumbnail($asd, 'full');
         
                ?> </div>
								<div class="l3">
									<p class="price">
										<?php 
										echo $wishlist_item->get_product()->get_price() ;
										 
										?> </p>
									<div class="more"> <a href="<?php echo get_permalink( $wishlist_item->get_product_id() ) ?>">Докладніше</a> <span></span> </div>
								</div>
							</div>
							<div class="l4">
								<?php		
	 
if ($wishlist_item->get_product()->get_type() === 'variation') {
    $parent_product = wc_get_product($wishlist_item->get_product()->get_parent_id());
    $selected_size = $wishlist_item->get_product()->get_attribute('size');
    if ($parent_product) {
        $variations = $parent_product->get_available_variations();

        // Фильтрация уникальных значений размера
        $sizes = array();

        foreach ($variations as $variation) {
            if (isset($variation['attributes']['attribute_pa_size'])) {
                $sizes[] = $variation['attributes']['attribute_pa_size'];
            }
        }

        $unique_sizes = array_unique($sizes);
        
        
        			 
$variationIds = '';

// Преобразование в нижний регистр
$selected_size = strtolower($selected_size);
 
foreach ($variations as $variation) {
   // print_r( $variation);
       
 //    if($variation['attributes']['attribute_pa_size']
    if ($variation['attributes']['attribute_pa_size'] === $selected_size) {
        $variationIds = $variation['variation_id'];
     
        break;
    }
}
 

//echo 'ID текущей вариации: ' . $variationIds;

$variation_id = $variationIds; // Идентификатор вариации
 


 

        // Вывод выпадающего списка для размера
        echo '<div class="dropdown dropdown' . $prod_i . 'size" bis_skin_checked="1">';
        echo '<div class="select" bis_skin_checked="1">';
        echo '<strong data-variation-id =' . get_current_variation_id($variations, $selected_size) . ' >' . esc_html($selected_size) . '</strong>';
        echo '<i class="fa fa-chevron-left"></i>';
        echo '</div>';
        echo '<input type="hidden" name="gender">';
        echo '<ul class="dropdown-menu">';
        foreach ($unique_sizes as $size) {
            // Найдите вариацию с соответствующим размером и получите ее идентификатор
            $variationId = '';
            foreach ($variations as $variation) {
                if (isset($variation['attributes']['attribute_pa_size']) && $variation['attributes']['attribute_pa_size'] === $size) {
                    $variationId = $variation['variation_id'];
                    break;
                }
            }
            echo '<li><strong data-variation-idd =' . $variationId . ' class="' . esc_attr($size) . '">' . esc_html($size) . '</strong></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}


    // Генерация JavaScript-кода для передачи идентификаторов вариаций
        echo "<script>";
        echo "var currentVariationId_$prod_i = '" . get_current_variation_id($variations, $selected_size). "';";
        echo "var selectedVariationId = '';"; // Здесь вы можете установить значение выбранной вариации
        echo "</script>";
$dateadded = date('Y-m-d H:i:s', strtotime('now'));
  
?>
									<script>
								/*	$('.dropdown<?php echo $prod_i ?>size').click(function() {
									    $(this).attr('tabindex', 1).focus();
									    $(this).toggleClass('active');
									    $(this).find('.dropdown-menu').slideToggle(300);
										 console.log(<?php echo $prod_i ?>);
									});
									
									$('.dropdown<?php echo $prod_i ?>size').focusout(function() {
									    $(this).removeClass('active');
									    $(this).find('.dropdown-menu').slideUp(300);
									});*/
		$('.dropdown<?php echo $prod_i ?>size').click(function() {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
    console.log(<?php echo $prod_i ?>);
});

$('.dropdown<?php echo $prod_i ?>size .dropdown-menu').mouseleave(function() {
    var dropdownMenu = $(this);
    if (dropdownMenu.is(':visible')) {
        dropdownMenu.slideUp(300, function() {
            dropdownMenu.parent().removeClass('active');
        });
    }
});

									 $('.dropdown<?php echo $prod_i ?>size .dropdown-menu li').click(function() {
									    var elementClass = $(this).find('strong').attr('class');
									    var elementValue = $(this).find('strong').html();
									    console.log(elementClass);
									
									    // Удаление класса у элемента
									    $(this).parents('.dropdown').children('.select').find('strong').removeClass();
									    $(this).parents('.dropdown').children('.select').find('strong').addClass(elementClass);
									    $(this).parents('.dropdown').children('.select').find('strong').html(elementValue);
										
										selectedVariationId = $(this).find("strong").data("variationIdd"); 
									    var variationID = <?php echo $wishlist_item->get_product_id(); ?>; //ID prod
									    var newVal = selectedVariationId;
									    var oldVal = currentVariationId_<?php echo $prod_i ?>;
									 
									
									 
									  
									  
									    // Формирование данных для отправки на сервер
    var requestData = {
        product_id: variationID,
        new_size: newVal,
        old_size: oldVal,
        quantity: '1',
        user_id: <?php echo $user_id; ?>,
        wishlist_id: <?php echo $wishlist_id; ?>,
        position: '0',
        original_price: <?php echo $wishlist_item->get_product()->get_price() ?> ,
        original_currency: 'UAH',
        dateadded: '<?php echo $dateadded; ?>',
        on_sale: '0'
    };
									    // AJAX-запрос
									    $.ajax({
									        url: 'https://www.bazhane.com/wp-content/themes/bazhane_new/white-atrr-save.php',
									        type: 'POST',
									        data: requestData,
									         success: function(response) {
        // Обработка успешного ответа от сервера
        console.log(response);
  
          
            // Обновление списка избранных товаров
      //    updateWishlist();
            
        
        // Перезагрузка страницы
        location.reload();
    },
    error: function(xhr, status, error) {
         
        // Обработка ошибок
        console.log(error);
    }
									        
									    
									});
									
									
									});
									
									
									
								$('#colorss_<?php echo $prod_i ?>').on('click', 'span', function() {
    var clickedColor = $(this).attr('class');
    var selectedVariationId = $(this).data('variation-iddd');
    var variationID = <?php echo $wishlist_item->get_product_id(); ?>; // ID продукта
    var newVal = selectedVariationId;
    var oldVal = color_currentVariationId_<?php echo $prod_i ?>;
    
    // Формирование данных для отправки на сервер
    var requestData = {
        product_id: variationID,
        new_size: newVal,
        old_size: oldVal,
        quantity: '1',
        user_id: <?php echo $user_id; ?>,
        wishlist_id: <?php echo $wishlist_id; ?>,
        position: '0',
        original_price: <?php echo $wishlist_item->get_product()->get_price() ?> ,
        original_currency: 'UAH',
        dateadded: '<?php echo $dateadded; ?>',
        on_sale: '0'
    };
    
    // AJAX-запрос
    $.ajax({
        url: 'https://www.bazhane.com/wp-content/themes/bazhane_new/white-atrr-save.php',
        type: 'POST',
        data: requestData,
        success: function(response) {
            // Обработка успешного ответа от сервера
            console.log(response);
   location.reload();
            // Обновление списка избранных товаров
            // updateWishlist();
        },
        error: function(xhr, status, error) {
            // Обработка ошибок
            console.log(error);
        }
    });
});
									
							/*		function updateWishlist() {
    $.ajax({
        url: 'https://www.bazhane.com/wp-content/themes/bazhane_new/white-atrr-update.php',
        type: 'GET',
        success: function(response) {
            // Обработка успешного ответа от сервера
            console.log(response);

         
                // Обновление списка избранных товаров
                var wishlistItems = response.wishlist;

                var wishlistContainer = $('#update_cont');
                wishlistContainer.html(''); // Очистка контейнера
                wishlistItems.forEach(function(item) {
                    wishlistContainer.append('<div>' + item.name + '</div>');
                });
            
        },
        error: function(xhr, status, error) {
            // Обработка ошибок
            console.log(error);
        }
    });
}*/
function updateWishlist() {
    $.ajax({
        url: 'https://www.bazhane.com/wp-content/themes/bazhane_new/white-atrr-update.php',
        type: 'GET',
        success: function(response) {
            // Обработка успешного ответа от сервера
            console.log(response);
            
            // Обновление списка избранных товаров
var wishlistItems = response.wishlist;

var wishlistContainer = $('#update_cont');
wishlistContainer.html(''); // Очистка контейнера

 

console.log(response.wishlist);
            
                // Обновление списка избранных товаров
                var wishlistItems = response.wishlist;

                var wishlistContainer = $('#update_cont');
                wishlistContainer.html(''); // Очистка контейнера

                if (wishlistItems) {
                    Object.values(wishlistItems).forEach(function(item) {
                        wishlistContainer.append('<div>' + item.name + '</div>');
                    });
                } else {
                    wishlistContainer.append('<div>В данном списке желаний нет товаров.</div>');
                }
           
        },
        error: function(xhr, status, error) {
            // Обработка ошибок
            console.log(error);
        }
    });
}
									</script>
									<?php echo '<div class="btn" data-product-id="' . $wishlist_item->get_product_id() . '">Додати в кошику</div>'; ?> </div>
						</div>
						<?php endforeach; ?>
						<script>
						jQuery(document).ready(function($) {
						            // Обработчик события клика на кнопку "Удалить"
						            $('.remove-from-wishlist').on('click', function() {
						                var wishlistItemId = $(this).data('wishlist-item-id');
						
						                // Отправка AJAX-запроса для удаления товара из списка желаний
						                $.ajax({
						                    url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
						                    type: 'POST',
						                    data: {
						                        action: 'wishlist_remove_item',
						                        wishlist_item_id: wishlistItemId
						                    },
						                    success: function(response) {
						                        // Обновление списка желаний без перезагрузки страницы
						                    }
						                });
						            });
						        });
						</script>
				</div>
			</div>
		</div>
		<script>
		$('.like-btn').click(function() {
		                 var productId = $(this).data('product-id');
		                
		                 var requestData = {
		        product_id: productId
		      
		    };
		
		    // AJAX-запрос
		    $.ajax({
		        url: 'https://www.bazhane.com/wp-content/themes/bazhane_new/white-atrr-remove.php',
		        type: 'POST',
		        data: requestData,
		        success: function(response) {
		            // Обработка успешного ответа от сервера
		            console.log(response);
		            // Обновление данных на странице
		              var listItem = $('.big-box[data-product-id="' + productId + '"]');
		              listItem.remove();
		        },
		        error: function(xhr, status, error) {
		            // Обработка ошибок
		            console.log(error);
		        }
		    
		});
		
		              });
		</script>
		<?php 
                
  // Функция для получения идентификатора текущей выбранной вариации
function get_current_variation_id($variations, $size) {
    foreach ($variations as $variation) {
        if (isset($variation['attributes']['attribute_pa_size']) && $variation['attributes']['attribute_pa_size'] === $size) {
            return $variation['variation_id'];
        }
    }
    return '';
}

function get_current_variation_id_color($variations, $color) {
    foreach ($variations as $variation) {
        if (isset($variation['attributes']['attribute_pa_color']) && $variation['attributes']['attribute_pa_color'] === $color) {
            return $variation['variation_id'];
        }
    }
    return '';
}
                ?>
		<?php include 'custom-footer.php' ?> </body>

	</html>