<?php
    function get_token($username, $password) {
        $url = 'http://localhost/api/src/api/authServer.php';

        $data = array(
            'username' => $username,
            'password' => $password
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json",
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return null;
        } else {
            $response = json_decode($result, true);
            if (isset($response['status']) && $response['status'] == 200 && isset($response['data']) ) {
                return $response['data'];
            } else {
                return null;
            }
        }
    }

    function getPayload($jwt) {
        $tokenParts = explode('.', $jwt);
        return json_decode(base64_decode($tokenParts[1]), true);
    }

    function get_role($token)
    {
        if ($token == "anonymous") {
            return "anonymous";
        } else {
            return getPayload($token)['role'];
        }
    }

    function get_id($token)
    {
        if ($token == "anonymous") {
            return -1;
        } else {
            return getPayload($token)['id'];
        }
    }

?>
