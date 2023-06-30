<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;
?>
  <div class="breadcrumbs" id="filters">
        <div class="container">
            <ul id="BreadcrumbList" class="BreadcrumbList" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                
         
			
<?php 	foreach ( $breadcrumb as $key => $crumb ) { ?>

		<?php 

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			?>
			 <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="<?php echo esc_url( $crumb[1] );?>" title="<?php echo esc_html( $crumb[0] );?>" itemprop="item">
                        <span itemprop="name"><?php echo esc_html( $crumb[0] );?></span>
                        <meta itemprop="position" content="<?php echo $key;?>">
                    </a>
                </li>
			
		<?php } else { ?>
			<li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a itemprop="item" title="<?php echo esc_html( $crumb[0] ); ?>">
                        <span itemprop="name"><?php echo esc_html( $crumb[0] ); ?></span>
                        <meta itemprop="position" content="<?php echo $key;?>">
                    </a>
                </li>
		
		<?php } ?>

<?php 	}

} ?>

</ul>
        </div>
  </div>