<?php

include '../../models/ClientModel.php';

class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function getAllClients()
    {
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
            error_log($e->getMessage());
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
            // Log the exception and return null
            echo $e->getMessage();
            return null;
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

            // Guarda el cliente en la base de datos
            $result = $this->createClient($data);

            // Si el cliente se guardó correctamente, redirige a la lista de clientes
            if ($result !== null) {
                header('Location: index.php?controller=client&action=index');
                exit();
            } else {
                // Si el cliente no se guardó correctamente, muestra un mensaje de error
                echo "Error al crear el cliente";
            }
        }
    }

    public function edit($idCliente)
    {

        if (empty($idCliente) || !is_numeric($idCliente)) {
            echo "ID de cliente no válido";
            return;
        }
        $cliente = $this->getClientById($idCliente);

        if ($cliente === null) {
            echo "Cliente no encontrado";
            return;
        }
        $this->updateClient($cliente);
        include 'views/client/edit.php';
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
            echo $e->getMessage();
            return 0;
        }
    }

    public function deleteClient($idCliente)
    {
        try {
            $this->clientModel->idCliente = $idCliente;
            return $this->clientModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idCliente = $_POST['idCliente'];

            $result = $this->deleteClient($idCliente);

            if ($result) {
                // La eliminación se realizó correctamente, puedes redirigir a otra página o mostrar un mensaje de éxito.
                header('Location: index.php?controller=client&action=index');
                exit();
            } else {
                // Ocurrió un error al eliminar el cliente, muestra un mensaje de error o redirige a una página de error.
                echo "Error al eliminar el cliente";
            }
        }
    }
}
