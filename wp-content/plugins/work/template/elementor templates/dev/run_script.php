<?php
// To run this code.
// 1. copy template file to the same directory.
// 2. set variables at the top of this file. (username, password, url, file_path)
// 3. open the command line and go to this path.
// 4. execute a command: php run.php.

/* set variables: login username, password, host url and the template file.*/
$username='element';      // login username
$password='element_kit123!@#';    //login password
$url='http://127.0.0.1/';     // host url
$file_path = 'elementor-7-2022-07-04.json';      //    template file, It should be in the same folder with this file. It maybe zip or json file.

echo '00000000000000000000000000';
/* log in to the site that you want to upload templates. */
// from 
$cookie_file = "/cookie.txt";
$postdata = 'log='. $username .'&pwd='. $password .'&wp-submit=Log%20In&redirect_to='. $url .'wp-admin/&testcookie=1&rememberme=forever&Cookie=wordpress_test_cookie=WP%20Cookie%20check; wp_lang=en_US'; // login form informations
$ch = curl_init();

/* set curl options */
curl_setopt ($ch, CURLOPT_URL, $url . 'wp-login.php'); // login url
curl_setopt ($ch, CURLOPT_HEADER, "1");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$headers = array(
    "Cookie: wordpress_test_cookie=WP%20Cookie%20check; wp_lang=en_US",
 );
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36');
curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie_file );
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_REFERER, $url . 'wp-admin/');
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // this is for https but not yet done.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // this is for https but not yet done.
curl_setopt($ch, CURLOPT_HEADER,0);
$result = curl_exec ($ch); // execute for login
// to here

/* post template datas to the site */
// from

/* get wp token for ajax call */
$pattern = "/action=logout&#038;_wpnonce=\K[^']+/i";
preg_match($pattern, $result, $wp_nonce, PREG_OFFSET_CAPTURE);
echo $wp_nonce[0][0];
$pattern = '/var elementorCommonConfig.*"nonce":"\K[^"]+/';
preg_match($pattern, $result, $el_nonce, PREG_OFFSET_CAPTURE);
var_dump($el_nonce[0][0]);

curl_setopt_array($ch, array(
    CURLOPT_URL => $url . 'wp-admin/admin-ajax.php', // posting url
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('action' => 'elementor_library_direct_actions','library_action' => 'direct_import_template','file'=> new CURLFILE('./' . $file_path),'_nonce' => $el_nonce[0][0]), // posting form datas
    CURLOPT_HTTPHEADER => array(
      'X-WP-NONCE: ' . $wp_nonce[0][0]
    ),
  ));

$response = curl_exec($ch); // execute for posting templates
$err = curl_error($ch);

curl_close($ch);

if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}

// to here

?>