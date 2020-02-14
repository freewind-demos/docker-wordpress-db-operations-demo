<?php

require(dirname(__FILE__) . '/wp-load.php');

global $wpdb;
$userLoginName = $wpdb->get_var("SELECT user_login FROM wp_users WHERE id=1");
echo $userLoginName;

$siteurl = get_option('siteurl');
echo $siteurl;

$options = $wpdb->get_results("SELECT * FROM wp_options limit 1");
foreach ($options as $option) {
    print_r($option);
}

// 3rd argument means the type of data:
// array('%d', '%f', '%s')
//        int,  float, string
// if not provided, use string by default
$wpdb->insert('wp_options', array(
    'option_name' => 'my-option1',
    'option_value' => 'my-value1',
    'autoload' => 'yes'
));

$wpdb->update('wp_options', array(
    'option_value' => 'my-new-value1',
), array(
    'option_name' => 'my-option1',
));

// raw insert
$wpdb->query("INSERT INTO `wp_options` (`option_name`, `option_value`, `autoload`) VALUES ('my-option2', 'my-value2', 'yes')");

// prepare
$prepared_sql = $wpdb->prepare("INSERT INTO `wp_options` (`option_name`, `option_value`, `autoload`) VALUES (%s, %s, %s)", array('my-option3', 'my-value3', 'yes'));
$wpdb->query($prepared_sql);

$options = $wpdb->get_results("SELECT * FROM wp_options where option_name like 'my-option%'");
foreach ($options as $option) {
    print_r($option);
}


?>