<?php

include '../../models/MechanicModel.php';
class MechanicController
{
    private $mechanicModel;

    public function __construct()
    {
        $this->mechanicModel = new MechanicModel();
    }

    public function getAllMechanics()
    {
        try {
            $mechanics = $this->mechanicModel->getAll();
            return $mechanics;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getMechanicById($idMecanico)
    {
        try {
            return $this->mechanicModel->find($idMecanico);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }
    public function createMechanic($data)
    {
        try {
            $this->mechanicModel->MecDocumento = $data['MecDocumento'];
            $this->mechanicModel->MecNombre = $data['MecNombre'];
            $this->mechanicModel->MecApellido = $data['MecApellido'];
            $this->mechanicModel->MecTelefono = $data['MecTelefono'];
            $this->mechanicModel->MecCorreo = $data['MecCorreo'];
            $this->mechanicModel->MecEspecializacion = $data['MecEspecializacion'];
            return $this->mechanicModel->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MecDocumento' => $_POST['MecDocumento'],
                'MecNombre' => $_POST['MecNombre'],
                'MecApellido' => $_POST['MecApellido'],
                'MecTelefono' => $_POST['MecTelefono'],
                'MecCorreo' => $_POST['MecCorreo'],
                'MecEspecializacion' => $_POST['MecEspecializacion']
            ];
            $result = $this->createMechanic($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al crear el mecánico";
            }
        }
    }

    public function edit($idMecanico)
    {
        if ((empty($idMecanico)) || !is_numeric($idMecanico)) {
            echo "ID de mecanico no valido";
            return;
        }
        $mecanico = $this->getMechanicById($idMecanico);
        if ($mecanico === null) {
            echo "El mecánico no existe";
            return;
        }
        $this->updateMechanic($mecanico);
        include 'views/mechanic/edit.php';
    }
    public function updateMechanic($data)
    {
        try {
            $this->mechanicModel->idMecanico = $data['idMecanico'];
            $this->mechanicModel->MecDocumento = $data['MecDocumento'];
            $this->mechanicModel->MecNombre = $data['MecNombre'];
            $this->mechanicModel->MecApellido = $data['MecApellido'];
            $this->mechanicModel->MecTelefono = $data['MecTelefono'];
            $this->mechanicModel->MecCorreo = $data['MecCorreo'];
            $this->mechanicModel->MecEspecializacion = $data['MecEspecializacion'];
            return $this->mechanicModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function deleteMechanic($idMecanico)
    {
        try {
            $this->mechanicModel->idMecanico = $idMecanico;
            return $this->mechanicModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idMecanico = $_POST['idMecanico'];
            $result = $this->deleteMechanic($idMecanico);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar el mecánico";
            }
        }
    }
}
