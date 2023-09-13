<?php
// Incluye el archivo de la clase ClientModel
include 'ClientModel.php';

// Crea una instancia de ClientModel
$clientModel = new ClientModel();

// Prueba el método getAll()
$clients = $clientModel->getAll();
echo "Clientes obtenidos: <pre>";
print_r($clients);
echo "</pre>";

// Prueba el método find() con un ID existente
$existingClientId = 1;
$client = $clientModel->find($existingClientId);
echo "Cliente encontrado con ID $existingClientId: <pre>";
print_r($client);
echo "</pre>";

// Prueba el método find() con un ID inexistente
$nonExistingClientId = 1000;
$client = $clientModel->find($nonExistingClientId);
echo "Cliente encontrado con ID $nonExistingClientId (debería ser null): <pre>";
var_dump($client);
echo "</pre>";

// Prueba el método save() (puedes personalizar los valores aquí)
$newClient = new ClientModel();
$newClient->CliDocumento = '123456789';
$newClient->CliNombre = 'Nuevo';
$newClient->CliApellido = 'Cliente';
$newClient->CliTelefono = '1234567890';
$newClient->CliTelefonoSecundario = '9876543210';
$newClient->CliCorreo = 'nuevo@cliente.com';
$newClient->CliDireccion = 'Dirección de prueba';

if ($newClient->save()) {
    echo "Nuevo cliente creado con éxito.";
} else {
    echo "Error al crear el nuevo cliente.";
}

// Recuerda manejar los otros métodos como update() y delete() de manera similar.

?>
