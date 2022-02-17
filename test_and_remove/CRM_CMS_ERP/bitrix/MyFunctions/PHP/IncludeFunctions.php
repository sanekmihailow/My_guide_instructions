<?php
//require_once('/var/www/bitrix_portal/composer_all/vendor/autoload.php');

function random_password($length){
    //A list of characters that can be used in our
    //random password.
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!-.[]?*()';
    //Create a blank string.
    $password = '';
    //Get the index of the last character in our $characters string.
    $characterListLength = mb_strlen($characters, '8bit') - 1;
    //Loop from 1 to the $length that was specified.
    foreach(range(1, $length) as $i){
        $password .= $characters[random_int(0, $characterListLength)];
    }
    $ar_dot_characters = ['.','/','|'];
    $random = rand(0,3);
    $password .= $ar_dot_characters[$random];
    return $password;

}

//#C - REST MOODLE FUNCTIONS

/*
Внутрь функции эти переменные не лезут
$token = 'token5633133';
$json = 'moodlewsrestformat=json';
*/


function rest_get_user_moodle($key, $value) {
    $http = 'https://example.com/webservice/rest/server.php?';
    $token = 'token5633133';
    $json = 'moodlewsrestformat=json';
    $function = 'core_user_get_users';
    $criteria_key = "$key";
    $criteria_value = "$value";

    $url_request = $http . 'wstoken=' . $token . '&' . $json . '&wsfunction=' . "$function";
    $url_request = $url_request .= '&criteria%5B0%5D%5Bkey%5D=' . $criteria_key . '&criteria%5B0%5D%5Bvalue%5D=' . $criteria_value;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url_request,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    $result = json_decode($response, true);
    curl_close($curl);
    return $result;
}

function rest_create_user_moodle($username, $password, $firstname, $lastname, $email, $dealid) {
    $http = 'https://example.com/webservice/rest/server.php?';
    $token = 'token5633133';
    $json = 'moodlewsrestformat=json';
    $function = 'core_user_create_users';
    $custom_field_type = 'deal_id_bitrix';

    $url_request = $http . 'wstoken=' . $token . '&' . $json . '&wsfunction=' . "$function";
    $url_request = $url_request .= '&users%5B0%5D%5Busername%5D=' . $username . '&users%5B0%5D%5Bfirstname%5D=' . $firstname;
    $url_request = $url_request .= '&users%5B0%5D%5Blastname%5D=' . $lastname . '&users%5B0%5D%5Bpassword%5D=' . $password . '&users%5B0%5D%5Bemail%5D=' . $email;
    $url_request = $url_request .= '&users%5B0%5D%5Bcustomfields%5D%5B0%5D%5Btype%5D=' . $custom_field_type . '&users%5B0%5D%5Bcustomfields%5D%5B0%5D%5Bvalue%5D=' . $dealid;
    $url_request = $url_request .= '&users%5B0%5D%5Bidnumber%5D=' . $dealid;

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url_request,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    $result = json_decode($response, true);
    curl_close($curl);
    return $result;
}

//#C------




#C - Comments to functions ------------
/*
//function rest_get_user_moodle($key, $value) {
//postman -
    //https://example.com/webservice/rest/server.php?wstoken=token5633133&wsfunction=core_user_get_users&moodlewsrestformat=json&criteria[0][key]=username&criteria[0][value]=testuser_test_1
//curl -
   // CURLOPT_URL => "https://example.com/webservice/rest/server.php?wstoken=token5633133&moodlewsrestformat=json&wsfunction=$function&criteria%5B0%5D%5Bkey%5D=$criteria_key&criteria%5B0%5D%5Bvalue%5D=$criteria_value",
//}


//function rest_create_user_moodle($username, $password, $firstname, $lastname, $email) {
//postman -
    //https://example.com/webservice/rest/server.php?wstoken=token5633133&wsfunction=core_user_create_users&moodlewsrestformat=json&users[0][username]=testuser_test_1&users[0][firstname]=Anne&users[0][lastname]=Example&users[0][password]=?hJYrbH1F3cWMBw{s6*EpoTx&users[0][email]=test@m.ru
//curl -
    //  CURLOPT_URL => 'https://example.com/webservice/rest/server.php?wstoken=token5633133&wsfunction=core_user_create_users&moodlewsrestformat=json&users%5B0%5D%5Busername%5D=testuser_test_2&users%5B0%5D%5Bfirstname%5D=Anne&users%5B0%5D%5Blastname%5D=Example&users%5B0%5D%5Bpassword%5D=?hJYrbH1F3cWMBw%7Bs6*EpoTx&users%5B0%5D%5Bemail%5D=test1@m.ru',
//}
*/
//#C ------------------------------

?>
