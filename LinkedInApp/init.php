<!-- IT15018960 - D.U. Liyanage -->
<!-- SSD Assignment 2 - OAuth -->

<!-- handles the session and cookie creation -->
<!-- handles the request to OAuth authorization server to obtain access token -->
<!-- handles the request to OAuth resource server to obtain protected resources -->

<?php 
    //start session
    ob_start();
    session_start();
    session_regenerate_id();
    //set session cookie parameters
    setcookie('session_cookie', session_id(), time() + (86400 * 30), "/"); // 86400 = 1 day
    
    $client_id = "81d0kvx2ky6l22";
    $client_secret = "WLiUfbjcLQxMGzFF";
    $redirect_uri = "http://localhost/LinkedInApp/callback.php";
    $csrf_token = sha1(base64_encode(openssl_random_pseudo_bytes(32)));
    $scopes = "r_basicprofile%20r_emailaddress";

    //handles the POST request to obtain the access token from OAuth authorization server
    function curl($url, $parameters)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = [];
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        return $result;
    }

    //handles the GET request to obtain user's profile details from OAuth resource server
    function getCallback()
    {
        $client_id = "81d0kvx2ky6l22";
        $client_secret = "WLiUfbjcLQxMGzFF";
        $redirect_uri = "http://localhost/LinkedInApp/callback.php";
        $csrf_token = sha1(base64_encode(openssl_random_pseudo_bytes(32)));
        $scopes = "r_basicprofile%20r_emailaddress";

        if (isset($_REQUEST['code'])) 
        {
            $code = $_REQUEST['code']; 
            $url = "https://www.linkedin.com/oauth/v2/accessToken";
            $params = [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri,
                'code' => $code,
                'grant_type' => 'authorization_code',
            ];
            $accessToken = curl($url,http_build_query($params));
            $accessToken = json_decode($accessToken)->access_token;

            $url = "https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrl,headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token=" . $accessToken;
            $user = file_get_contents($url, false);

            return (json_decode($user));
        }
    }
?>
