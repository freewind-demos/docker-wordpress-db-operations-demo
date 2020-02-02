<?php

require( dirname( __FILE__ ) . '/wp-load.php' );

global $wpdb;
$userLoginName = $wpdb->get_var("SELECT user_login FROM wp_users WHERE id=1");
echo $userLoginName;

$siteurl = get_option('siteurl');
echo $siteurl;

$options = $wpdb->get_results("SELECT * FROM wp_options limit 10");
foreach($options as $option) {
    print_r($option);
}

?>