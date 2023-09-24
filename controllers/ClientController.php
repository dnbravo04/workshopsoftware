<?php

include 'C:/xampp/htdocs/workshopsoftware/models/ClientModel.php';

class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'CliDocumento' => $_POST['CliDocumento'],
                'CliNombre' => $_POST['CliNombre'],
                'CliApellido' => $_POST['CliApellido'],
                'CliTelefono' => $_POST['CliTelefono'],
                'CliTelefonoSecundario' => $_POST['CliTelefonoSecundario'],
                'CliCorreo' => $_POST['CliCorreo'],
                'CliDireccion' => $_POST['CliDireccion']
            ];


            $result = $this->createClient($data);

            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al crear el cliente";
            }
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
            echo $e->getMessage();
            return null;
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

    public function getAllClients()
    {
        try {
            $clients = $this->clientModel->getAll();
            return $clients;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'idCliente' => $idCliente,
                'CliDocumento' => $_POST['CliDocumento'],
                'CliNombre' => $_POST['CliNombre'],
                'CliApellido' => $_POST['CliApellido'],
                'CliTelefono' => $_POST['CliTelefono'],
                'CliTelefonoSecundario' => $_POST['CliTelefonoSecundario'],
                'CliCorreo' => $_POST['CliCorreo'],
                'CliDireccion' => $_POST['CliDireccion'],
            ];
        }


        $result = $this->updateClient($data);

        if ($result !== null) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error al actualizar el cliente";
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
            echo $e->getMessage();
            return 0;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idCliente = $_POST['idCliente'];

            $result = $this->deleteClient($idCliente);

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar el cliente";
            }
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
}
