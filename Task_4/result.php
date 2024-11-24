<?php
session_start();

if (!isset($_SESSION['form_data'])) {
    header("Location: form.php");
    exit;
}

// Redirect jika data tidak tersedia
if (!isset($_SESSION['txt_content'])) {
    header("Location: form.php");
    exit;
}

// Ambil data dari session
$form_data = $_SESSION['form_data'];
$txt_content = $_SESSION['txt_content'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 to-purple-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Hasil Pendaftaran</h1>

        <!-- Data Pendaftar -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Data Pendaftar</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Nama</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($form_data['nama']); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Email</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($form_data['email']); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Telepon</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($form_data['telepon']); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Alamat</td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo nl2br(htmlspecialchars($form_data['alamat'])); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

       <!-- Isi File TXT -->
       <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Isi File TXT</h2>
            <div class="bg-gray-50 rounded-lg p-4">
                <pre class="text-sm text-gray-600 whitespace-pre-wrap"><?php echo htmlspecialchars($txt_content); ?></pre>
            </div>
        </div>

        <!-- Informasi Browser -->
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi Sistem</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">User Agent</td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo htmlspecialchars($form_data['browser_info']['user_agent']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
