<?php require_once 'Backend.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryption Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center mb-4">Encrypt and Decrypt Your Data</h1>

            <!-- Form for user input -->
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-6">
                <label for="data" class="block text-lg font-semibold">Enter Data to Encrypt:</label>
                <textarea name="data" id="data" rows="4" class="w-full mt-2 p-3 border border-gray-300 rounded-md" required></textarea>
                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Encrypt</button>
            </form>

            <?php if (!empty($errorMessage)): ?>
                <div class="mb-6 text-red-600">
                    <h2 class="text-xl font-semibold">Error:</h2>
                    <p class="bg-red-200 p-4 rounded text-sm text-red-800 mt-2"><?php echo htmlspecialchars($errorMessage); ?></p>
                </div>
            <?php endif; ?>

            <?php if ($encrypted): ?>
                <div class="mb-6">
                    <h2 class="text-xl font-semibold">Encrypted Data:</h2>
                    <p class="bg-gray-200 p-4 rounded text-sm text-gray-800 mt-2"><?php echo htmlspecialchars($encrypted); ?></p>
                </div>
            <?php endif; ?>

            <?php if ($decrypted): ?>
                <div class="mb-6">
                    <h2 class="text-xl font-semibold">Decrypted Data:</h2>
                    <pre class="bg-gray-200 p-4 rounded text-sm text-gray-800 mt-2"><?php echo htmlspecialchars($decrypted); ?></pre>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
