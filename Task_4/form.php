<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <style>
        .error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 to-purple-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto form-container p-8 rounded-lg shadow-xl">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Form Pendaftaran</h1>
        
        <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data" 
              class="space-y-6" onsubmit="return validateForm()">
            
            <!-- Nama Lengkap -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       minlength="3" maxlength="50" required>
                <span class="error" id="namaError"></span>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       required>
                <span class="error" id="emailError"></span>
            </div>

            <!-- No. Telepon -->
            <div>
                <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                <input type="tel" name="telepon" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       pattern="[0-9]{10,13}" required>
                <span class="error" id="teleponError"></span>
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                          rows="3" required></textarea>
                <span class="error" id="alamatError"></span>
            </div>

            <!-- Upload TXT -->
            <div class="mb-6">
                <label for="dokumen" class="block text-sm font-medium text-gray-700">Unggah File TXT</label>
                <input type="file" id="dokumen" name="dokumen" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-blue-500 focus:border-blue-500" accept=".txt" required>
                <p class="mt-2 text-sm text-gray-500">File harus berformat TXT dengan ukuran maksimal 2MB.</p>
            </div>

            <button type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Daftar
            </button>
        </form>
    </div>

    <script>
        function validateForm() {
            let isValid = true;
            const form = document.getElementById('registrationForm');
            
            // Reset errors
            document.querySelectorAll('.error').forEach(error => error.textContent = '');

            // Validate nama
            const nama = form.nama.value;
            if (nama.length < 3) {
                document.getElementById('namaError').textContent = 'Nama minimal 3 karakter';
                isValid = false;
            }

            // Validate email
            const email = form.email.value;
            if (!email.match(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/)) {
                document.getElementById('emailError').textContent = 'Email tidak valid';
                isValid = false;
            }

            // Validate telepon
            const telepon = form.telepon.value;
            if (!telepon.match(/^[0-9]{10,13}$/)) {
                document.getElementById('teleponError').textContent = 'Nomor telepon harus 10-13 digit';
                isValid = false;
            }

            // Validate file
            const file = document.getElementById("dokumen").files[0];
            if (!file) {
                errors.push("File harus diunggah");
            } else if (file.type !== "text/plain") {
                errors.push("File harus berformat TXT");
            } else if (file.size > 2 * 1024 * 1024) {
                errors.push("Ukuran file maksimal 2MB");
            }

            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
</body>
</html>