<?php
namespace Library;

class Encrypt {

    private $key;

    public function __construct() {
        $this->key= "ldfhahhahtdot674hs4wyhhw6yjhfd8b"; // encryption key
    }

    public function encryptData($data) {
        // Encrypt the data
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $this->key, 0, $iv);
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
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $this->key, 0, $iv);
    }

}

// Example usage
$rw = new Encrypt();

$data = '{"bank_name":"Rand Merchant Bank (RMB)","branch_code":"198765","branch_name":"Hedy Bean","account_number":"632","account_type":"current","account_name":"Piper Norris"}';
$encrypted = $rw->encryptData($data);
echo "Encrypted: " . $encrypted . "\n";

$decrypted = $rw->decryptData($encrypted);
echo "Decrypted: " . $decrypted . "\n";