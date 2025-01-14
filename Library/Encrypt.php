<?php 
namespace Library;

class Encrypt {

    private $key;

    public function __construct() {
        $this->key ="ldfhahhahtdot674hs4wyhhw6yjhfd8b";
    }

    public function encryptData($data) {
        // Encrypt the data
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

        if ($iv === false) {
            throw new \Exception("Failed to generate initialization vector (IV).");
        }

        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $this->key, 0, $iv);

        if ($encrypted === false) {
            throw new \Exception("Encryption failed.");
        }

        return base64_encode($encrypted . '::' . $iv);
    }

    public function decryptData($encryptedData) {
        // Base64 decode the encrypted data
        $decodedData = base64_decode($encryptedData);

        // Check if the data contains the delimiter '::'
        if (strpos($decodedData, '::') === false) {
            throw new \Exception("Invalid encrypted data format.");
        }

        // Split the base64 decoded data into encrypted data and IV
        list($encrypted_data, $iv) = explode('::', $decodedData, 2);

        // Decrypt the data
        $decrypted = openssl_decrypt($encrypted_data, 'aes-256-cbc', $this->key, 0, $iv);

        if ($decrypted === false) {
            throw new \Exception("Decryption failed.");
        }

        return $decrypted;
    }
}
