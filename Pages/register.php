<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS (Toast) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="../Assets/css/style.css" rel="stylesheet">
</head>

<!-- UYARILAR (START) -->
<div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
    <?php if (isset($_GET['update']) && $_GET['update'] === 'email_exists'): ?>
        <!-- Failed Login Toast -->
        <div id="failed-login-toast" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8S2 14.418 2 10 5.582 2 10 2s8 3.582 8 8zm-9 4a1 1 0 112 0v-4a1 1 0 00-2 0v4zm0-6a1 1 0 112 0v-2a1 1 0 00-2 0v2z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">Aynı E-Postaya ait farklı bir kullanıcı var.</div>
            <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#failed-login-toast" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    <?php endif; ?>
</div>

<div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
    <?php if (isset($_GET['update']) && $_GET['update'] === 'register_error'): ?>
        <!-- Failed Login Toast -->
        <div id="failed-login-toast" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8S2 14.418 2 10 5.582 2 10 2s8 3.582 8 8zm-9 4a1 1 0 112 0v-4a1 1 0 00-2 0v4zm0-6a1 1 0 112 0v-2a1 1 0 00-2 0v2z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">Kayıt işlemi gerçekleşmedi! Lütfen tekrar deneyin.</div>
            <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#failed-login-toast" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    <?php endif; ?>
</div>


<!-- UYARILAR (END) -->

<body class="loginBody">
    <div class="loginFormContainer">
        <h1 class="loginFormTitle">Kayıt Ol</h1>
        <form action="../Config/config.php" method="POST">
            <!-- Ad ve Soyad alanları -->
            <div class="row g-2 mb-3">
                <div class="col">
                    <label for="firstName" class="form-label visually-hidden">First Name</label>
                    <input type="text" class="loginFormControl w-100" id="firstName" placeholder="Ad" name="firstName" required>
                </div>
                <div class="col">
                    <label for="lastName" class="form-label visually-hidden">Last Name</label>
                    <input type="text" class="loginFormControl w-100" id="lastName" placeholder="Soyad" name="lastName" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label visually-hidden">Email</label>
                <input type="email" class="loginFormControl w-100" id="email" placeholder="E-posta adresinizi girin" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label visually-hidden">Password</label>
                <input type="password" class="loginFormControl w-100" id="password" name="password" placeholder="Şifre" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label visually-hidden">Confirm Password</label>
                <input type="password" class="loginFormControl w-100" id="confirmPassword" name="confirmPassword" placeholder="Şifreyi tekrar girin" required>
            </div>
            <button type="submit" class="btn btn-primary loginButton" name="kayitOl">Kayıt Ol</button>
        </form>
        <p class="loginFooterText">
            Kayıt olarak
            <a href="#"><b>Hizmet Şartlarını</b></a> ve
            <a href="#"><b>Kullanıcı Koşullarını</b></a> kabul etmiş olursunuz.
        </p>
        <hr style=" border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin: 1.5rem 0;">
        <p class="loginFormText">Zaten bir hesabın var mı? <a href="login.php">Giriş Yap</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Flowbite (Toast) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.4/flowbite.min.js"></script>

</body>

</html>