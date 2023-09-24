<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a09d03aeb8.js" crossorigin="anonymous"></script>
    <title>Inicio de Sesión</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen dark:bg-gray-800 dark:text-gray-300">
    <div class="bg-white p-8 rounded shadow-md w-80 dark:bg-gray-700">
        <div class="text-center mb-4">
            <img class="block dark:hidden" src="../assets/logo-dark.png" alt="Motorcycle Workshop Software">
            <img class="hidden dark:block" src="../assets/logo.png" alt="Motorcycle Workshop Software">
        </div>
        <h1 class="text-2xl font-semibold text-center mb-4">Inicio de Sesión</h1>
        <?php
        include_once '../../controllers/LoginController.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loginController = new LoginController();
            $result = $loginController->login($username, $password);

            if (is_string($result)) {
                echo '<p class="text-red-500 text-center">' . htmlspecialchars($result) . '</p>';
            } else {
                header('Location: ../../views/index.php');
                exit();
            }
        }
        ?>
        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 dark:text-gray-50">Nombre de Usuario</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de Usuario" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 dark:text-gray-50">Contraseña</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contraseña" required>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-violet-500 text-white py-2 px-4 rounded-md mb-8 hover:bg-blue-700
                    focus:outline-none focus:ring focus:border-violet-300 dark:bg-violet-900 dark:hover:bg-violet-950 "><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i> Inicia sesión</button>
            </div>
        </form>
    </div>
</body>

</html>