<?php
    class Token {
        private $userID = 'userID';
        private $userEmail = 'userEmail';
        private $standardHeader = [];
        private $standardPayload = [];
        private $payloadSt = [];
        private $admin = true;

        function __construct($userID = NULL, $userEmail = NULL, $admin = NULL){
            
            $this->standardHeader = [
                "alg"=> "HS256",
                "typ"=> "JWT"
            ];
            $this->standardPayload = [
                "id"=> "$this->userID",
                "email"=> "$this->userEmail"
            ];
            $this->payloadSt = [
                "id"=> "$this->userID",
                "email"=> "$this->userEmail",
                "admin"=> $admin
            ];
        }
        
        function base64Url_encode($data) {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }
        
        function base64Url_decode($data) {
            return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
        }

        function getAlg($standardHeader) {
            if ($standardHeader['alg'] == "HS256") {
                return "SHA256";
            } if ($standardHeader['alg'] == "HS384") {
                return "SHA384";
            } if ($standardHeader['alg'] == "HS512") {
                return "SHA512";
            } else die('error');
        }

        function encodeToken($key, $header = NULL, $payload = NULL) {

            if ($header == null) $header = $this->standardHeader;
            $header_encoded = $this->base64Url_encode(json_encode($header));
            
            if ($payload == null) $payload = $this->standardPayload;
            $payload_encoded = $this->base64Url_encode(json_encode($payload));

            $signature = hash_hmac($this->getAlg($header),"$header_encoded.$payload_encoded",$key, true);
            $signature_encoded = $this->base64Url_encode($signature);
            
            $token = "$header_encoded.$payload_encoded.$signature_encoded";
            return $token;
        }

        function checkToken($token, $key, $headerCheck = NULL, $payloadCheck = NULL) {
            $tokenArray = explode(".", $token);
            $encoded_signature = $tokenArray[2];
            $signature = $this->base64Url_decode($encoded_signature);
            
            if ($headerCheck == null) $headerCheck = $this->standardHeader;
            $headerCheck_encoded = $this->base64Url_encode(json_encode($headerCheck));
            
            if ($payloadCheck == null) $payloadCheck = $this->standardPayload;
            $payloadCheck_encoded = $this->base64Url_encode(json_encode($payloadCheck));

            $signatureCheck = hash_hmac($this->getAlg($headerCheck),"$headerCheck_encoded.$payloadCheck_encoded",$key, true);
            
            return $signatureCheck == $signature;
        }

        function encodeHS256($key, $payload = NULL) {
            $header = $this->standardHeader;
            if ($payload == null) $payload = $this->standardPayload;
            return $this->encodeToken($key, $header, $payload);
        }
        
        function checkHS256($token, $key, $payload = NULL) {
            $header = $this->standardHeader;
            if ($payload == null) $payload = $this->standardPayload;
            return $this->checkToken($token, $key, $header, $payload);
        }

        function encodeHS384($key, $payload = NULL) {
            $header = [
                'alg'=>'HS384',
                'typ'=>'JWT'
            ];
            if ($payload == null) $payload = $this->payloadSt;
            return $this->encodeToken($key, $header, $payload);
        }

        function checkHS384($token, $key, $payload = NULL) {
            $header = [
                'alg'=>'HS384',
                'typ'=>'JWT'
            ];
            if ($payload == null) $payload = $this->payloadSt;
            return $this->checkToken($token, $key, $header, $payload);
        }

        function encodeHS512($key, $payload = NULL) {
            $header = [
                'alg'=>'HS512',
                'typ'=>'JWT'
            ];
            if ($payload == null) $payload = $this->payloadSt;
            return $this->encodeToken($key, $header, $payload);
        }

        function checkHS512($token, $key, $payload = NULL) {
            $header = [
                'alg'=>'HS512',
                'typ'=>'JWT'
            ];
            if ($payload == null) $payload = $this->payloadSt;
            return $this->checkToken($token, $key, $header, $payload);
        }

    }
?>
