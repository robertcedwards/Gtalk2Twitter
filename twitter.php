#!/usr/local/bin/php -q
<?php
// Set username and password for your twitter account
$username = 'user';
$password = 'password';

//Setup to curl jabberland to get your status

$ch = curl_init();

// set URL with your key from jabberland.com
curl_setopt($ch, CURLOPT_URL, "http://jabberland.com/status/enteryourkeyhere");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL, and return output
$output = curl_exec($ch);

// close curl resource, and free up system resources
curl_close($ch);

//Setup to post to twitter
$url = 'http://twitter.com/statuses/update.xml';
// Alternative JSON version
// $url = 'http://twitter.com/statuses/update.json';
// Set up and execute the curl process

$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "$url");
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_POST, 1);
curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "status=$output");
curl_setopt($curl_handle, CURLOPT_USERPWD, "$username:$password");
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
// check for success or failure
if (empty($buffer)) {
    echo 'message';
} else {
    echo 'success';
}
?>