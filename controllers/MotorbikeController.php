<?php

include_once '../../models/MotorbikeModel.php';
include '../../models/ClientModel.php';


class MotorbikeController
{
    private  $motorbikeModel;
    private  $clientModel;

    public function __construct()
    {
        $this->motorbikeModel = new MotorbikeModel();
        $this->clientModel = new ClientModel();
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
    public function getMotorbikeById($idMotorbike)
    {
        try {
            return $this->motorbikeModel->find($idMotorbike);
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


    public function edit($idMotorbike)
    {
        if (empty($idMotorbike) || !is_numeric($idMotorbike)) {
            echo "ID de motocicleta no válido";
            return;
        }
        $motorbike = $this->getMotorbikeById($idMotorbike);
        if ($motorbike === null) {
            echo "Motocicleta no encontrada";
            return;
        }
        $this->updateMotorbike($motorbike);
        include_once 'views/motorbike/edit.php';
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
    public function deleteMotorbike($idMotorbike)
    {
        try {
            $this->motorbikeModel->idMotocicleta = $idMotorbike;
            return $this->motorbikeModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idMotorbike = $_POST['idMotorbike'];
            $result = $this->deleteMotorbike($idMotorbike);
            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar motocicleta";

                return false;
            }
        }
    }
    public function showClientByMotorbike($idMotorbike)
    {
        try {
            $motorbike = $this->motorbikeModel->find($idMotorbike);

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

    private function getClientByMotorbike($motorbike)
    {
        $clientId = intval($motorbike['MtCliente']);
        return $this->clientModel->find($clientId);
    }
}
