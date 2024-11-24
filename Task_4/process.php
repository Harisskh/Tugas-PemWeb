<?php
session_start();

// Validasi server-side
$errors = [];

// Validasi nama
if (empty($_POST['nama']) || strlen($_POST['nama']) < 3) {
    $errors[] = "Nama minimal 3 karakter";
}

// Validasi email
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid";
}

// Validasi telepon
if (empty($_POST['telepon']) || !preg_match("/^[0-9]{10,13}$/", $_POST['telepon'])) {
    $errors[] = "Nomor telepon harus 10-13 digit";
}

// Validasi alamat
if (empty($_POST['alamat'])) {
    $errors[] = "Alamat tidak boleh kosong";
}

// Validasi file TXT
if (isset($_FILES['dokumen'])) {
    $file = $_FILES['dokumen'];
    $allowed = ['text/plain'];
    $max_size = 2 * 1024 * 1024; // 2MB

    if ($file['size'] > $max_size) {
        $errors[] = "Ukuran file maksimal 2MB";
    }

    if (!in_array($file['type'], $allowed)) {
        $errors[] = "File harus berformat TXT";
    }

    // Baca isi file TXT
    if (empty($errors)) {
        $temp_path = $file['tmp_name'];
        $txt_content = file_get_contents($temp_path); // Membaca isi file TXT
        $_SESSION['txt_content'] = $txt_content;
    }
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: form.php");
    exit;
}

// Simpan data form
$_SESSION['form_data'] = [
    'nama' => $_POST['nama'],
    'email' => $_POST['email'],
    'telepon' => $_POST['telepon'],
    'alamat' => $_POST['alamat'],
    'browser_info' => [
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'platform' => php_uname('s'),
        'browser' => get_browser(null, true)
    ]
];

header("Location: result.php");
exit;
?>