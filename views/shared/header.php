<nav class="bg-gray-800 p-6">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center flex-shrink-0 text-white">
            <a href="/workshopsoftware/views/index.php">
                <img src="/workshopsoftware/views/assets/logo.png" class="object-contain h-11" alt="Logo">
            </a>
        </div>

        <div class="block lg:hidden">
            <button id="mobileMenuButton" class="flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div id="mobileMenu" class="w-full lg:w-auto block lg:flex-grow lg:flex lg:items-center lg:justify-end hidden">
            <div class="text-lg lg:flex-grow">
                <a href="/workshopsoftware/views/admin/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Administradores
                </a>
                <a href="/workshopsoftware/views/client/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Clientes
                </a>
                <a href="/workshopsoftware/views/logistical_assistant/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Asistentes Logísticos
                </a>
                <a href="/workshopsoftware/views/maintenance_report/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Informes de Mantenimiento
                </a>
                <a href="/workshopsoftware/views/mechanic/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Mecánicos
                </a>
                <a href="/workshopsoftware/views/motorbike/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Motocicletas
                </a>
                <a href="/workshopsoftware/views/spare_parts/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Repuestos
                </a>
                <a href="/workshopsoftware/views/login/login.php?action=logout" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white ml-4">
                    Salir
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById("mobileMenuButton").addEventListener("click", function() {
        var mobileMenu = document.getElementById("mobileMenu");
        if (mobileMenu.classList.contains("hidden")) {
            mobileMenu.classList.remove("hidden");
            mobileMenu.classList.add("block");
        } else {
            mobileMenu.classList.remove("block");
            mobileMenu.classList.add("hidden");
        }
    });
</script>