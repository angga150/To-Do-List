<?php
session_start();
require 'config.php';

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['signup_btn'])) {
    // Proses pendaftaran pengguna baru di sini
    $username = $_POST['username'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi dan simpan data pengguna ke database
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");
    if (mysqli_num_rows($checkUser) > 0) {
        // Jika email atau username sudah terdaftar, tampilkan pesan kesalahan
        echo "<script>alert('Email atau Username sudah terdaftar. Silakan gunakan yang lain.');</script>";
    } else {
    $query = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
    mysqli_query($conn, $query);
    }

    // Setelah pendaftaran berhasil, arahkan ke halaman login atau halaman utama
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up to Dolis</title>
    <link rel="icon" href="img/logo/Untitled-1.png">

    <link rel="stylesheet" href="css/output.css">
</head>
<body class="flex justify-center items-center font-Mons">

    <body class="min-h-screen flex items-center justify-center p-4">

    <!-- Kotak Pesan Kustom (Mengganti alert()) -->
    <div id="message-box" class="fixed top-5 right-5 p-4 rounded-xl shadow-2xl transition-all duration-300 opacity-0 transform translate-x-10 pointer-events-none" role="alert">
        <p id="message-text" class="font-medium"></p>
    </div>

    <!-- Card Login Utama -->
    <div class="bg-white/40 backdrop-blur-md w-full max-w-sm p-8 space-y-6 bg-card-bg rounded-3xl">

        <!-- Header -->
        <div class="flex flex-col items-center space-y-2">

            <h1 class="text-3xl font-extrabold tracking-tight text-center">Hey, Welcome!</h1>
            <p class="text-sm text-center font-z">
               Don't just dream, let's make it happen one by one!
            </p>
        </div>

        <!-- Form Input -->
        <form action="" method="post">
        <div class="space-y-4">
            <!-- Input Email -->
            <div>
                <input type="text" id="username" name="username" placeholder="Enter your username"
                       class="w-full px-4 py-3 rounded-xl bg-input-bg border border-gray-500/40 focus:border-blue-500 hover:border-blue-500 outline-none transition ease-in-out duration-200"
                       required>
            </div>
            <div>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name"
                       class="w-full px-4 py-3 rounded-xl bg-input-bg border border-gray-500/40 focus:border-blue-500 hover:border-blue-500 outline-none transition ease-in-out duration-200"
                       required>
            </div>
            <div>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                       class="w-full px-4 py-3 rounded-xl bg-input-bg border border-gray-500/40 focus:border-blue-500 hover:border-blue-500 outline-none transition ease-in-out duration-200"
                       required>
            </div>

            <!-- Input Password dengan Tombol Show/Hide -->
            <div>

                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Create your password"
                           class="w-full px-4 py-3 rounded-xl bg-input-bg border border-gray-500/40 focus:border-blue-500 hover:border-blue-500 outline-none transition ease-in-out duration-200"
                           required>
                    <!-- Tombol Tampilkan/Sembunyikan Kata Sandi -->
                    <button id="toggle-password" type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-blue-500 hover:text-white" onclick="togglePassword()">
                        <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <!-- Icon Mata Tertutup (default) -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.874-.01m5.874.01A9.97 9.97 0 0121 12c-1.275 4.057-5.065 7-9.543 7-1.125 0-2.21-0.218-3.235-0.627M12 9a3 3 0 110 6 3 3 0 010-6z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->


            <!-- Tombol Login -->
            <button onclick="handleLogin()"
                    class="w-full py-3 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition ease-in-out duration-200 shadow-lg"
                    name="signup_btn">
                <p class="font-semibold">Sign up</p>
            </button>
        </div>
        </form>

        <!-- Separator "OR" -->
        <div class="flex items-center my-4">
            <div class="flex-grow border-t "></div>
            <span class="mx-4 text-sm ">Or</span>
            <div class="flex-grow border-t "></div>
        </div>

        <!-- Sign In with Google -->
            <button
                    class="flex items-center justify-center w-full py-3 bg-white font-Mons rounded-xl hover:bg-gray-300 transition ease-in-out duration-200 shadow-lg">
                <svg class="mr-2" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="none" fill-rule="evenodd" clip-rule="evenodd"><path fill="#F44336" d="M7.209 1.061c.725-.081 1.154-.081 1.933 0a6.57 6.57 0 0 1 3.65 1.82a100 100 0 0 0-1.986 1.93q-1.876-1.59-4.188-.734q-1.696.78-2.362 2.528a78 78 0 0 1-2.148-1.658a.26.26 0 0 0-.16-.027q1.683-3.245 5.26-3.86" opacity=".987"/><path fill="#FFC107" d="M1.946 4.92q.085-.013.161.027a78 78 0 0 0 2.148 1.658A7.6 7.6 0 0 0 4.04 7.99q.037.678.215 1.331L2 11.116Q.527 8.038 1.946 4.92" opacity=".997"/><path fill="#448AFF" d="M12.685 13.29a26 26 0 0 0-2.202-1.74q1.15-.812 1.396-2.228H8.122V6.713q3.25-.027 6.497.055q.616 3.345-1.423 6.032a7 7 0 0 1-.51.49" opacity=".999"/><path fill="#43A047" d="M4.255 9.322q1.23 3.057 4.51 2.854a3.94 3.94 0 0 0 1.718-.626q1.148.812 2.202 1.74a6.62 6.62 0 0 1-4.027 1.684a6.4 6.4 0 0 1-1.02 0Q3.82 14.524 2 11.116z" opacity=".993"/></g></svg>
                <p class="font-semibold">Sign up with google</p>
            </button>

        <!-- Sign Up Link -->
        <p class="text-center text-sm  pt-4">
            Already have account?
            <a href="login.php"  class="font-bold text-white hover:text-blue-500 transition duration-150">Login now</a>
        </p>
<!-- onclick="showCustomMessage('Anda diarahkan ke halaman pendaftaran. Mari mulai terorganisir!', 'bg-indigo-600')" -->
    </div>

    <script>
                function togglePassword() {
            const passwordField = document.getElementById('password');
            const icon = document.getElementById('eye-icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                // Ganti ikon menjadi mata terbuka
                icon.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0z');
                icon.parentElement.innerHTML = `<svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>`;
            } else {
                passwordField.type = 'password';
                // Ganti ikon menjadi mata tertutup
                icon.parentElement.innerHTML = `<svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.874-.01m5.874.01A9.97 9.97 0 0121 12c-1.275 4.057-5.065 7-9.543 7-1.125 0-2.21-0.218-3.235-0.627M12 9a3 3 0 110 6 3 3 0 010-6z" /></svg>`;
            }
        }

                function showCustomMessage(message, bgColorClass) {
            const msgBox = document.getElementById('message-box');
            const msgText = document.getElementById('message-text');

            // Set pesan dan warna
            msgText.textContent = message;
            msgBox.className = `fixed top-5 right-5 p-4 rounded-xl shadow-2xl transition-all duration-300 ${bgColorClass} text-white opacity-100 transform translate-x-0 pointer-events-auto`;

            // Sembunyikan setelah 3 detik
            setTimeout(() => {
                msgBox.className = msgBox.className.replace('opacity-100 transform translate-x-0 pointer-events-auto', 'opacity-0 transform translate-x-10 pointer-events-none');
            }, 3000);
        }

        
                function handleLogin() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (email === '' || password === '') {
                showCustomMessage('Email dan Kata Sandi wajib diisi.', 'bg-red-600');
                return;
            }

            // Simulasi proses login
            if (email === 'test@example.com' && password === 'password') {
                showCustomMessage('Masuk Berhasil! Anda siap menaklukkan to-do list Anda.', 'bg-green-600');
            } else if (password.length < 6) {
                showCustomMessage('Kata sandi terlalu pendek. Masukkan minimal 6 karakter.', 'bg-yellow-600');
            } else {
                showCustomMessage('Gagal Masuk. Email atau kata sandi tidak valid.', 'bg-red-600');
            }
        }
    </script>
</body>
</html>