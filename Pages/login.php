<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS (Toast) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="../Assets/css/style.css" rel="stylesheet">

</head>


<body class="loginBody">


    <!-- UYARILAR (START) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['status']) && $_GET['status'] === 'failedLogin'): ?>
            <!-- Failed Login Toast -->
            <div id="failed-login-toast" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8S2 14.418 2 10 5.582 2 10 2s8 3.582 8 8zm-9 4a1 1 0 112 0v-4a1 1 0 00-2 0v4zm0-6a1 1 0 112 0v-2a1 1 0 00-2 0v2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal">Giriş yapılamadı. Lütfen bilgilerinizi kontrol ediniz!</div>
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
        <?php if (isset($_GET['update']) && $_GET['update'] === 'register_success'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Kayıt işlemi tamamlandı! Giriş yapabilirsiniz.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- UYARILAR (END) -->



    <div class="loginFormContainer">
        <h1 class="loginFormTitle">Giriş Yap!</h1>
        <form action="../Config/config.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label visually-hidden">Your email</label>
                <input type="email" class="loginFormControl w-100" id="email" name="email" placeholder="E-posta adresinizi girin" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label visually-hidden">Password</label>
                <input type="password" class="loginFormControl w-100" id="password" name="password" placeholder="Şifrenizi girin" required>
            </div>
            <button type="submit" class="btn btn-primary loginButton" name="girisYap">Giriş Yap</button>
        </form>
        <p class="loginFooterText">
            Giriş yaparak
            <a href="#"><b>Hizmet Şartlarını</b></a> ve
            <a href="#"><b>Kullanıcı Koşullarını</b></a> kabul etmiş olurunuz.
        </p>
        <hr style="border: none; border-top: 1px solid rgba(0, 0, 0, 0.1); margin: 1.5rem 0; ">
        <p class="loginFormText">Hesabın yok mu? Hemen <a href="register.php">Kayıt Ol</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Flowbite (Toast) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.4/flowbite.min.js"></script>
</body>

</html>