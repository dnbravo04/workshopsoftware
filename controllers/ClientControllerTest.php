<?php
require_once('ClientController.php');

class ClientControllerTest
{
    public function testCreateClient()
    {
        $clientController = new ClientController();

        $data = [
            'CliDocumento' => '123456789',
            'CliNombre' => 'John',
            'CliApellido' => 'Doe',
            'CliTelefono' => '555-555-5555',
            'CliTelefonoSecundario' => '555-555-5556',
            'CliCorreo' => 'john@example.com',
            'CliDireccion' => '123 Main St',
        ];

        $result = $clientController->createClient($data);

        if ($result === 1) {
            echo "testCreateClient: PASSED\n";
        } else {
            echo "testCreateClient: FAILED\n";
        }
    }

    public function testGetAllClients()
    {
        $clientController = new ClientController();

        $clients = $clientController->getAllClients();

        if (is_array($clients)) {
            echo "testGetAllClients: PASSED\n";
            echo '
            <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Lista de Clientes</h1>

        <!-- Enlace para crear un nuevo cliente -->
        <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Crear Cliente</a>

        <?php if (!empty($clients) && is_array($clients)) : ?>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-2 px-4">Documento</th>
                        <th class="w-1/6 text-left py-2 px-4">Nombre</th>
                        <th class="w-1/6 text-left py-2 px-4">Apellido</th>
                        <th class="w-1/6 text-left py-2 px-4">Teléfono</th>
                        <th class="w-1/6 text-left py-2 px-4">Correo</th>
                        <th class="w-1/6 text-left py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td class="text-left py-2 px-4"><?php echo $client[`CliDocumento`]; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $client[`CliNombre`]; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $client[`CliApellido`]; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $client[`CliTelefono`]; ?></td>
                        <td class="text-left py-2 px-4"><?php echo $client[`CliCorreo`]; ?></td>
                        <td class="text-left py-2 px-4">
                            <a href="edit.php?id=<?php echo $client[`idCliente`]; ?>" class="text-blue-500 hover:underline">Editar</a>
                            <a href="delete.php?id=<?php echo $client[`idCliente`]; ?>" class="text-red-500 hover:underline ml-4">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-gray-700 text-lg">No se encontraron clientes.</p>
        <?php endif; ?>
    </div>
            ';
        } else {
            echo "testGetAllClients: FAILED\n";
        }
    }

    public function testUpdateClient()
    {
        $clientController = new ClientController();

        // Replace with an existing client ID from your database
        $existingClientId = 1;

        $data = [
            'idCliente' => $existingClientId,
            'CliDocumento' => '987654321',
            'CliNombre' => 'Updated',
            'CliApellido' => 'Name',
            'CliTelefono' => '555-555-5555',
            'CliTelefonoSecundario' => '555-555-5556',
            'CliCorreo' => 'updated@example.com',
            'CliDireccion' => '456 Elm St',
        ];

        $result = $clientController->updateClient($data);

        if ($result === 1) {
            echo "testUpdateClient: PASSED\n";
        } else {
            echo "testUpdateClient: FAILED\n";
        }
    }

    public function testDeleteClient()
    {
        $clientController = new ClientController();

        // Replace with an existing client ID from your database
        $existingClientId = 1;

        $result = $clientController->deleteClient($existingClientId);

        if ($result === 1) {
            echo "testDeleteClient: PASSED\n";
        } else {
            echo "testDeleteClient: FAILED\n";
        }
    }
}

$testSuite = new ClientControllerTest();
$testSuite->testCreateClient();
$testSuite->testGetAllClients();
$testSuite->testUpdateClient();
$testSuite->testDeleteClient();
