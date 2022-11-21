<?php

# 1. Register new endpoint (URL) for My Account page
# Note: Re-save Permalinks or it will give 404 error

function os_add_vip_pages_endpoint() {
	add_rewrite_endpoint( 'vip-tools', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'os_add_vip_pages_endpoint' );


# 2. Add new query var

function os_vip_pages_query_vars( $vars ) {
	$vars[] = 'vip-tools';
	return $vars;
}

add_filter( 'query_vars', 'os_vip_pages_query_vars', 0 );


# 3. Insert the new endpoint into the My Account menu

function os_add_vip_pages_link_my_account( $items ) {
	$items['vip-tools'] = 'VIP Tools';
	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'os_add_vip_pages_link_my_account',20 );


# 4. Add content to the new tab

function os_vip_tools_page_content() {
	// echo your html here
}

add_action( 'woocommerce_account_vip-tools_endpoint', 'os_vip_tools_page_content' );


# 5. Move Page In Menu To After Dashboard Item

add_action('wp_footer', function (){
	?>
	<script>
        (function ($) {
            $('.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--vip-tools').insertAfter( $('.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--dashboard'))
        })(jQuery);
	</script>
	<?php
});
