<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inicio de Sesión</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-80">
        <!-- Logo at the top -->
        <div class="text-center mb-4">
            <img src="../assets/logo-dark.png" alt="Motorcycle Workshop Software">
        </div>

        <h1 class="text-2xl font-semibold text-center mb-4">Inico de Sesión</h1>

        <form action="login.php?controller=login&action=login" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Nombre de Usuario</label>
                <input type="text" name="username" id="username" class="w-full border rounded-md py-2 px-3
                    focus:outline-none focus:ring focus:border-blue-300" placeholder="Nombre de Usuario">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full border rounded-md py-2 px-3
                    focus:outline-none focus:ring focus:border-blue-300" placeholder="Contraseña">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mb-8 hover:bg-blue-600
                    focus:outline-none focus:ring focus:border-blue-300">Login</button>
                <?php
                // Incluye el controlador
                include '../../controllers/LoginController.php';

                // Crea una instancia del controlador
                $loginController = new LoginController();

                // Verifica si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Obtiene los datos del formulario (escapados para prevenir inyecciones SQL)
                    $username = htmlspecialchars($_POST["username"]);
                    $password = htmlspecialchars($_POST["password"]);

                    // Llama al método de autenticación del controlador
                    $loginController->login($username, $password);
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>