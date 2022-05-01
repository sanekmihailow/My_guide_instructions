<?
function getEnity($method, $id) {
    $http = 'https:/example.com/rest/';
    $user = '1321235';

    if ($method == 'crm.invoice.get') {
        $token = 'аяаяаяаяаяаяаяаяыя';
    } else if ($method == 'crm.deal.get') {
        $token = 'аяаяаяаяeqweqweqweq';
    }

    $url_request = $http . $user . '/' . $token . '/' . "$method" . '?' . 'id=' . "$id";

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => "$url_request",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ]);

      $response = curl_exec($curl);
      curl_close($curl);
      return json_decode($response, true);
}

function enityUpdate ($method, $id, $fields) {
    $http = 'https:/example.com/rest/';
    $user = '1321235';

    if ($method == 'crm.invoice.update') {
        $token = 'аяаяаяаяая31231231аяаяаяыя';
    } else if ($method == 'crm.deal.update') {
        $token = 'ewqeqweqeqsczcxcz';
    }

    $url_request = $http . $user . '/' . $token . '/' . "$method" . '?' . 'id=' . "$id" . '&' . "$fields";

        $curl = curl_init();
        curl_setopt_array($curl, [
                CURLOPT_URL => "$url_request",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
}

function postToChat($dialog, $message, $system_x) {

    $http = 'https:/example.com/rest/';
    $user = '10002131';
    $token = 'аяаяаяаяаяаяаяаяыя';
    $method = 'im.message.add';
    $system = "$system_x";

    $url_request = $http . $user . '/' . $token . '/' . "$method" . '?' . 'DIALOG_ID=' . "$dialog" . '&' . 'MESSAGE=' . "$message" . '&' . 'SYSTEM=' . "$system";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "$url_request",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ]);

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true);
}
