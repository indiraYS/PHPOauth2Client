<?php
/**
 * Created by IntelliJ IDEA.
 * User: indy
 * Date: 15.06.19
 * Time: 23:51
 */
function goToAuthUrl() {
    $url = "http://localhost:8081/auth/oauth/authorize?client_id=ClientId&redirect_uri=http://prj.local:80/callback.php&scope=user_info&response_type=code&secret=secret";
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        header("location: ".$url, true);
    }
}

function  fetchData() {
    echo "asdasd";

    if ($_SERVER['REQUEST_METHOD']=="GET") {
        if ($_GET['code']) {
            $pars = [
                'client_id' => 'ClientId',
                'client_secret' => 'secret',
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'http://prj.local:80/callback.php',
                'code' =>  $_GET['code']
            ];

            $ctx = stream_context_create([
                'http'=>array(
                    'method'=>"POST",
                    'header'=>"Accept-language: en\r\n" .
                        "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Basic ".base64_encode("ClientId:secret"),
                    'content' => http_build_query($pars)
                )
            ]);
            $data = @file_get_contents("http://localhost:8081/auth/oauth/token", false, $ctx);

            if (!$data || $data==null) {
                die('Error on try getting access token');
            }
            var_dump($data);

            $json_data = json_decode($data);
            $access_token = $json_data->access_token;
            var_dump($json_data->access_token);

            $user_data = @file_get_contents("http://localhost:8081/auth/user/me?access_token=".$access_token);
            var_dump($user_data);
        }
    }
}

