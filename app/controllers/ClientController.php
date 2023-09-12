<?php
class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function index()
    {
        $clients = $this->clientModel->getAll();
        include 'views/client/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new ClientModel();
            $client->CliDocumento = $_POST['CliDocumento'];
            $client->CliNombre = $_POST['CliNombre'];
            $client->CliApellido = $_POST['CliApellido'];
            $client->CliTelefono = $_POST['CliTelefono'];
            $client->CliTelefonoSecundario = $_POST['CliTelefonoSecundario'];
            $client->CliCorreo = $_POST['CliCorreo'];
            $client->CliDireccion = $_POST['CliDireccion'];

            if ($client->save()) {
                // La inserción fue exitosa, redirige o muestra un mensaje de éxito.
                header('Location: index.php');
                exit();
            } else {
                // Hubo un error en la inserción, muestra un mensaje de error.
                echo "Error al crear el cliente.";
            }
        } else {
            include 'views/client/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new ClientModel();
            $client->idCliente = $id;
            $client->CliDocumento = $_POST['CliDocumento'];
            $client->CliNombre = $_POST['CliNombre'];
            $client->CliApellido = $_POST['CliApellido'];
            $client->CliTelefono = $_POST['CliTelefono'];
            $client->CliTelefonoSecundario = $_POST['CliTelefonoSecundario'];
            $client->CliCorreo = $_POST['CliCorreo'];
            $client->CliDireccion = $_POST['CliDireccion'];

            if ($client->update()) {
                // La actualización fue exitosa, redirige o muestra un mensaje de éxito.
                header('Location: index.php');
                exit();
            } else {
                // Hubo un error en la actualización, muestra un mensaje de error.
                echo "Error al actualizar el cliente.";
            }
        } else {
            $client = $this->clientModel->find($id);
            include 'views/client/edit.php';
        }
    }

    public function delete($id)
    {
        $client = new ClientModel();
        $client->idCliente = $id;

        if ($client->delete()) {
            // La eliminación fue exitosa, redirige o muestra un mensaje de éxito.
            header('Location: index.php');
            exit();
        } else {
            // Hubo un error en la eliminación, muestra un mensaje de error.
            echo "Error al eliminar el cliente.";
        }
    }
}
