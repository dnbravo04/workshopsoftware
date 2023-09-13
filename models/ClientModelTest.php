<?php
require_once 'ClientModel.php'; // Asegúrate de que la ruta sea correcta

class ClientModelSaveTest
{
    public function testSave()
    {
        $clientModel = new ClientModel();

        try {
            // Configura los datos de cliente para la prueba
            $clientModel->CliDocumento = '123456754';
            $clientModel->CliNombre = 'Juan';
            $clientModel->CliApellido = 'Pérez';
            $clientModel->CliTelefono = '555-5555';
            $clientModel->CliTelefonoSecundario = '555-5556';
            $clientModel->CliCorreo = 'juan@example.com';
            $clientModel->CliDireccion = 'Calle Principal';

            // Llama al método save()
            $rowCount = $clientModel->save();

            // Comprueba si el método save() devolvió un resultado exitoso (1 fila afectada)
            $this->assertEquals(1, $rowCount, "El método save() no devolvió el resultado esperado.");

            // Puedes agregar más aserciones para verificar los datos guardados en la base de datos
            // Por ejemplo, puedes llamar al método find() para verificar si el cliente se ha guardado correctamente.
            $savedClient = $clientModel->find($clientModel->idCliente);
            $this->assertNotEmpty($savedClient, "El cliente no se guardó correctamente en la base de datos.");
        } catch (Exception $e) {
            $this->fail("Error en testSave(): " . $e->getMessage());
        }
    }

    // Funciones auxiliares para aserciones
    private function assertEquals($expected, $actual, $message)
    {
        if ($expected !== $actual) {
            $this->fail($message);
        }
    }

    private function assertNotEmpty($value, $message)
    {
        if (empty($value)) {
            $this->fail($message);
        }
    }

    private function fail($message)
    {
        echo "Prueba fallida: $message\n";
    }
}

// Ejecuta la prueba de save()
// Ejecuta la prueba de save()
$test = new ClientModelSaveTest();
$test->testSave();