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

        <h1 class="text-2xl font-semibold text-center mb-4">Inicio de Sesión</h1>

        <?php
        include_once '../../controllers/LoginController.php';
        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aquí puedes procesar los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Llama al método de autenticación del controlador
            $loginController = new LoginController();
            $result = $loginController->login($username, $password);

            if (is_string($result)) {
                // Muestra el mensaje de error específico
                echo '<p class="text-red-500 text-center">' . htmlspecialchars($result) . '</p>';
            } else {
                // Autenticación exitosa
                header('Location: ../../views/index.php');
                exit();
            }
        }

        ?>

        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Nombre de Usuario</label>
                <input type="text" name="username" id="username" class="w-full border rounded-md py-2 px-3
                    focus:outline-none focus:ring focus:border-blue-300" placeholder="Nombre de Usuario" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full border rounded-md py-2 px-3
                    focus:outline-none focus:ring focus:border-blue-300" placeholder="Contraseña" required>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mb-8 hover:bg-blue-600
                    focus:outline-none focus:ring focus:border-blue-300">Login</button>
            </div>
        </form>
    </div>
</body>

</html>