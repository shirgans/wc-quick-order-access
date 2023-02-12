<?php
/**
 * Plugin Name: WC Quick Order Access
 * Plugin URI: https://github.com/shirgans/quick-order-access
 * Description: A simple widget that allows you to quickly access and edit orders, subscriptions, posts, pages and more... all from the top admin bar
 * Version: 1.0
 * Author: Shir Gans
 * Author URI: https://github.com/shirgans
 * License: GPL3
 */

add_action( 'admin_bar_menu', 'add_quick_order_access_to_admin_bar', 100 );

function add_quick_order_access_to_admin_bar( $wp_admin_bar ) {
    $args = array(
        'id'     => 'quick_order_access',
        'title'  => '<div style="display: flex; align-items: center; flex-wrap: nowrap; padding-top: 3px;">
                    <input type="number" placeholder="Order / Sub. ID" id="post_id" style="width: 150px; padding: 0 5px;border-radius: 4px; height: 24px; min-height: 0;line-height: 1em;">
                 <button type="button" id="go-button" style="padding: 0 10px; border: none; border-radius: 4px; margin: 0 10px; height: 24px; display: flex; justify-content: center; align-items: center;">Go</button></div>',
        'parent' => 'top-secondary',
        'meta'   => array( 'class' => 'quick_order_access' )
    );
    $wp_admin_bar->add_node( $args );
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('#go-button').on('click', function(){
                var postId = jQuery('#post_id').val();
                if (postId != '') {
                    window.location.href = '/wp-admin/post.php?post=' + postId + '&action=edit';
                }
            })
        })
    </script>
    <?php
}
