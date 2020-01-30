<?php 
 /* 
 Plugin Name: Dapliw personalizacion de WooCommerce 
 Plugin URI: https://dapliw.org.ve
 Description: Plugin con las funciones personalizadas de Woocommerce
 Version: 1.0.0 
 Author: Ángel Omar Sanz
 Author URI: https://dapliw.org.ve 
 License: GPL 2+ 
 License URI: https://dapliw.org.ve 
 */ 

 //* Personalización de la página de checkout de WooCommerce

add_action( 'woocommerce_before_add_to_cart_form', 'dapliw_verifica_puntos' );

function dapliw_verifica_puntos() 
{    
    $balance = get_user_meta(2, 'moolamojo_balance', true);
    
    if ($balance < 1) 
    {
        wp-die('<div class="woocommerce-info">Estimado usuario, usted no tiene puntos disponibles para publicar un nuevo anuncio</div>');
    }
}

add_action( 'woocommerce_after_checkout_form', 'dapliw_resta_puntos' );

function dapliw_resta_puntos() 
{    
    $balance = get_user_meta(2, 'moolamojo_balance', true);

    $balance -= 1;

    update_user_meta($user_ID, 'moolamojo_balance', $balance);
}
