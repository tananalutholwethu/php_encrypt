# Data Encryption and Decryption System

This repository contains a simple PHP implementation of data encryption and decryption using the AES-256-CBC encryption algorithm. The system allows for encrypting and decrypting sensitive information (e.g., bank details) securely.

Background

As part of my internship, I was tasked with finding a way to securely encrypt and decrypt sensitive data, such as bank details, for a system we are developing at work. To familiarize myself with the process, I decided to implement a practice project that handles encryption and decryption of text-based data using PHP.

This project demonstrates how to securely encrypt sensitive data with a secret key and then decrypt it back to its original form. The goal was to ensure that even if the data is intercepted, it cannot be read without the proper key.

Features

- Encrypts Data: The system securely encrypts data using the AES-256-CBC encryption algorithm.
- Decrypts Data: The system allows for the decryption of previously encrypted data, restoring it to its original form.
- User-Friendly Interface: A simple web-based UI allows users to input text, encrypt it, and view the decrypted output.

How It Works

1. Encryption:
    - The data is encrypted using the AES-256-CBC algorithm.
    - A unique initialization vector (IV) is generated for each encryption to ensure that the same data encrypted multiple times will have different results.
    - The encrypted data and the IV are then concatenated and base64 encoded for safe transmission.

2. Decryption:
    - The encrypted data is base64 decoded.
    - The IV is extracted from the base64 string, and the encrypted data is decrypted using the same AES-256-CBC algorithm and key.
    - The decrypted data is returned in its original form.

#Getting Started

Prerequisites

Make sure you have the following installed:
- PHP (preferably PHP 7.4 or higher)
- A web server (Apache, Nginx, or PHP's built-in server)
- OpenSSL library (required for encryption/decryption)

Setup

1. Clone this repository to your local machine:

    git clone https://github.com/your-username/encryption-example.git
 

2. Navigate to the project folder:

    cd encryption-example


3. If you are using a local web server like Apache, ensure the project folder is placed in the appropriate directory (e.g., `htdocs` for XAMPP).

4. Set up your environment:
   - It’s highly recommended to store the encryption key in an environment variable (`ENCRYPTION_KEY`) instead of hardcoding it into the code. This improves security.
   
   - You can set the `ENCRYPTION_KEY` in your `.env` file (if using something like `vlucas/phpdotenv`) or directly as an environment variable in your server configuration.

Running the Project

1. Start your PHP server (if using PHP's built-in server):

    ```bash
    php -S localhost:8000
    ```

2. Open your web browser and navigate to `http://localhost:8000/index.php` to access the encryption and decryption interface.

3. Enter the data you want to encrypt and click **Encrypt**. You will see the encrypted data, and you can decrypt it back to its original form.

Code Overview

- `Library/Encrypt.php`: Contains the main `Encrypt` class responsible for encrypting and decrypting data.
- `Backend.php`: Handles form submission and processes the data by calling the methods from the `Encrypt` class.
- `index.php`: A simple front-end interface where users can input data to be encrypted and decrypted.

Learnings from this Project

As an intern, this project allowed me to practice:
- Understanding Encryption Algorithms: I gained hands-on experience with AES-256-CBC and learned about the importance of key management and IV generation.
- Data Security Best Practices: The project helped me understand the importance of securing sensitive data, especially in a production environment like handling bank details.
- PHP Web Development*: I became more familiar with PHP and its cryptography functions (like `openssl_encrypt` and `openssl_decrypt`).
- Error Handling: I learned how to implement proper error handling in encryption/decryption workflows to ensure that any issues are clearly communicated to users.

Next Steps

For future improvements, I plan to:
- Implement better key management practices, such as using a secure vault or environment variables.
- Add more advanced error handling and logging for debugging purposes.
- Enhance the UI to support more complex encryption workflows.

License

This project is open source and available under the MIT License. See the [LICENSE](LICENSE) file for more details.
