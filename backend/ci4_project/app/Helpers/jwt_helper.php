<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (!function_exists('generate_jwt')) {
    function generate_jwt($payload, $expireInSeconds = 3600)
    {
        $key = "your-very-strong-secret-key"; // hardcoded secret key
        $issuedAt = time();
        $expire   = $issuedAt + $expireInSeconds;

        $token = [
            'iss' => base_url(),
            'aud' => base_url(),
            'iat' => $issuedAt,
            'exp' => $expire,
            'data' => $payload
        ];

        return JWT::encode($token, $key, 'HS256');
    }
}

if (!function_exists('decode_jwt')) {
    function decode_jwt($jwt)
    {
        $key = "your-very-strong-secret-key"; // same secret

        try {
            return JWT::decode($jwt, new Key($key, 'HS256'));
        } catch (\Exception $e) {
            return null; // invalid or expired token
        }
    }
}
