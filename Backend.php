<?php
require_once 'Library/Encrypt.php';

use Library\Encrypt;

// Initialize the Encrypt class
$rw = new Encrypt();
$encrypted = '';
$decrypted = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data'])) {
    try {
        $data = $_POST['data'];
        $encrypted = $rw->encryptData($data);
        $decrypted = $rw->decryptData($encrypted);
    } catch (\Exception $e) {
        // Handle error if encryption or decryption fails
        $errorMessage = $e->getMessage();
    }
}
?>
