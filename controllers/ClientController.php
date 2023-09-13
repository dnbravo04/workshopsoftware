<?php

include 'c:\xampp\htdocs\workshopsoftware\models\ClientModel.php';
class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function getAllClients()
    {
        echo'Emmmm... Que haces aquí?';
        try {
            $clients = $this->clientModel->getAll();
            return $clients;
        } catch (Exception $e) {
            // Manejo de errores aquí
            return [];
        }
    }


    public function getClientById($idCliente)
    {
        try {
            return $this->clientModel->find($idCliente);
        } catch (Exception $e) {
            // Manejo de errores aquí
            return null;
        }
    }

    public function createClient($data)
    {
        try {
            $this->clientModel->CliDocumento = $data['CliDocumento'];
            $this->clientModel->CliNombre = $data['CliNombre'];
            $this->clientModel->CliApellido = $data['CliApellido'];
            $this->clientModel->CliTelefono = $data['CliTelefono'];
            $this->clientModel->CliTelefonoSecundario = $data['CliTelefonoSecundario'];
            $this->clientModel->CliCorreo = $data['CliCorreo'];
            $this->clientModel->CliDireccion = $data['CliDireccion'];

            return $this->clientModel->save();
        } catch (Exception $e) {
            // Manejo de errores aquí
            return 0;
        }
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesa los datos del formulario y guarda el cliente en la base de datos
            $data = [
                'CliDocumento' => $_POST['CliDocumento'],
                'CliNombre' => $_POST['CliNombre'],
                'CliApellido' => $_POST['CliApellido'],
                'CliTelefono' => $_POST['CliTelefono'],
                'CliTelefonoSecundario' => $_POST['CliTelefonoSecundario'],
                'CliCorreo' => $_POST['CliCorreo'],
                'CliDireccion' => $_POST['CliDireccion'],
            ];

            // Llama a la función para crear el cliente
            $result = $this->createClient($data);

            if ($result) {
                // El cliente se creó correctamente, puedes redirigir a otra página o mostrar un mensaje de éxito.
                echo 'Listo Calisto';
                header('Location: ../views/client/index.php?controller=client&action=getAllClients');
                exit();
            } else {
                // Ocurrió un error al crear el cliente, muestra un mensaje de error o redirige a una página de error.
                echo "Error al crear el cliente";
            }
        }
    }
    public function updateClient($data)
    {
        try {
            $this->clientModel->idCliente = $data['idCliente'];
            $this->clientModel->CliDocumento = $data['CliDocumento'];
            $this->clientModel->CliNombre = $data['CliNombre'];
            $this->clientModel->CliApellido = $data['CliApellido'];
            $this->clientModel->CliTelefono = $data['CliTelefono'];
            $this->clientModel->CliTelefonoSecundario = $data['CliTelefonoSecundario'];
            $this->clientModel->CliCorreo = $data['CliCorreo'];
            $this->clientModel->CliDireccion = $data['CliDireccion'];

            return $this->clientModel->update();
        } catch (Exception $e) {
            // Manejo de errores aquí
            return 0;
        }
    }

    public function deleteClient($idCliente)
    {
        try {
            $this->clientModel->idCliente = $idCliente;
            return $this->clientModel->delete();
        } catch (Exception $e) {
            // Manejo de errores aquí
            return 0;
        }
    }
}
