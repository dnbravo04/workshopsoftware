<?php

include_once '../../models/MotorbikeModel.php';
include_once 'ClientController.php';


class MotorbikeController
{
    private  $motorbikeModel;

    private  $clientController;

    public function __construct()
    {
        $this->motorbikeModel = new MotorbikeModel();

        $this->clientController = new ClientController();
    }
    public function getAllMotorbikes()
    {
        try {
            $motorbikes = $this->motorbikeModel->getAll();
            return $motorbikes;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getMotorbikeById($idMotocicleta)
    {
        try {
            return $this->motorbikeModel->find($idMotocicleta);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function createMotorbike($data)
    {
        try {
            $this->motorbikeModel->MtPlaca = $data['MtPlaca'];
            $this->motorbikeModel->MtMarca = $data['MtMarca'];
            $this->motorbikeModel->MtModelo = $data['MtModelo'];
            $this->motorbikeModel->MtCilindraje = $data['MtCilindraje'];
            $this->motorbikeModel->MtColor = $data['MtColor'];
            $this->motorbikeModel->MtCliente = $data['MtCliente'];
            return $this->motorbikeModel->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MtPlaca' => $_POST['MtPlaca'],
                'MtMarca' => $_POST['MtMarca'],
                'MtModelo' => $_POST['MtModelo'],
                'MtCilindraje' => $_POST['MtCilindraje'],
                'MtColor' => $_POST['MtColor'],
                'MtCliente' => $_POST['MtCliente'],
            ];
            $result = $this->createMotorbike($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al crear el cliente";
            }
        }
    }


    public function edit($idMotocicleta)
    {
        if (empty($idMotocicleta) || !is_numeric($idMotocicleta)) {
            echo "ID de motocicleta no válido";
            return;
        }
        $motorbike = $this->getMotorbikeById($idMotocicleta);
        if ($motorbike === null) {
            echo "Motocicleta no encontrada";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'idMotocicleta' => $_POST['idMotocicleta'],
                'MtPlaca' => $_POST['MtPlaca'],
                'MtMarca' => $_POST['MtMarca'],
                'MtModelo' => $_POST['MtModelo'],
                'MtCilindraje' => $_POST['MtCilindraje'],
                'MtColor' => $_POST['MtColor'],
                'MtCliente' => $_POST['MtCliente']
            ];
            $result = $this->updateMotorbike($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al actualizar el cliente";
            }
        }
    }
    public function updateMotorbike($data)
    {
        try {
            $this->motorbikeModel->idMotocicleta = $data['idMotocicleta'];
            $this->motorbikeModel->MtPlaca = $data['MtPlaca'];
            $this->motorbikeModel->MtMarca = $data['MtMarca'];
            $this->motorbikeModel->MtModelo = $data['MtModelo'];
            $this->motorbikeModel->MtCilindraje = $data['MtCilindraje'];
            $this->motorbikeModel->MtColor = $data['MtColor'];
            $this->motorbikeModel->MtCliente = $data['MtCliente'];
            return $this->motorbikeModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }
    }
    public function deleteMotorbike($idMotocicleta)
    {
        try {
            $this->motorbikeModel->idMotocicleta = $idMotocicleta;
            return $this->motorbikeModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idMotocicleta = $_POST['idMotocicleta'];
            $result = $this->deleteMotorbike($idMotocicleta);
            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar motocicleta";

                return false;
            }
        }
    }
    public function showClientByMotorbike($idMotocicleta)
    {
        try {
            $motorbike = $this->motorbikeModel->find($idMotocicleta);

            if ($motorbike === null) {
                return null;
            }

            $client = $this->getClientByMotorbike($motorbike);

            return $client !== null ? [
                'CliNombre' => $client['CliNombre'],
                'CliApellido' => $client['CliApellido'],
            ] : null;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getClientByMotorbike($motorbike)
    {
        $clientId = intval($motorbike['MtCliente']);
        return $this->clientController->getClientById($clientId);
    }
    
    public function getAllClients()
    {
        try {
            $clients = $this->clientController->getAllClients();
            return $clients;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
