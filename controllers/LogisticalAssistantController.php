<?php

include 'C:/xampp/htdocs/workshopsoftware/models/LogisticalAssistantModel.php';
class LogisticalAssistantController
{
    private $LogisticalAssistantModel;

    public function __construct()
    {
        $this->LogisticalAssistantModel = new LogisticalAssistantModel();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ALDocumento' => $_POST['ALDocumento'],
                'ALNombre' => $_POST['ALNombre'],
                'ALApellido' => $_POST['ALApellido'],
                'ALTelefono' => $_POST['ALTelefono'],
                'ALCorreo' => $_POST['ALCorreo'],
            ];
            $result = $this->createLogisticalAssistant($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al crear el cliente";
            }
        }
    }

    public function createLogisticalAssistant($data)
    {
        try {
            $this->LogisticalAssistantModel->ALDocumento = $data['ALDocumento'];
            $this->LogisticalAssistantModel->ALNombre = $data['ALNombre'];
            $this->LogisticalAssistantModel->ALApellido = $data['ALApellido'];
            $this->LogisticalAssistantModel->ALTelefono = $data['ALTelefono'];
            $this->LogisticalAssistantModel->ALCorreo = $data['ALCorreo'];

            return $this->LogisticalAssistantModel->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getLogisticalAssistantById($idAsistLogistico)
    {
        try {
            return $this->LogisticalAssistantModel->find($idAsistLogistico);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function getAllLogisticalAssistants()
    {
        try {
            $clients = $this->LogisticalAssistantModel->getAll();
            return $clients;
        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function edit($idAsistLogistico)
    {


        if (empty($idAsistLogistico) || !is_numeric($idAsistLogistico)) {
                echo "ID de asistente logístico no válido";
                return;
            }

            $LogisticalAssistant = $this->getLogisticalAssistantById($idAsistLogistico);

            if ($LogisticalAssistant === null) {
                echo "Asistente logístico no encontrado";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'idAsistLogistico' => $idAsistLogistico,
                    'ALDocumento' => $_POST['ALDocumento'],
                    'ALNombre' => $_POST['ALNombre'],
                    'ALApellido' => $_POST['ALApellido'],
                    'ALTelefono' => $_POST['ALTelefono'],
                    'ALCorreo' => $_POST['ALCorreo'],
                ];
            }
            $result = $this->updateLogisticalAssistant($data);

            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al actualizar el asistente logístico";
            }
    
    }

    public function updateLogisticalAssistant($data)
    {
        try {
            $this->LogisticalAssistantModel->idAsistLogistico = $data['idAsistLogistico'];
            $this->LogisticalAssistantModel->ALDocumento = $data['ALDocumento'];
            $this->LogisticalAssistantModel->ALNombre = $data['ALNombre'];
            $this->LogisticalAssistantModel->ALApellido = $data['ALApellido'];
            $this->LogisticalAssistantModel->ALTelefono = $data['ALTelefono'];
            $this->LogisticalAssistantModel->ALCorreo = $data['ALCorreo'];

            return $this->LogisticalAssistantModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idAsistLogistico = $_POST['idAsistLogistico'];
            $result = $this->deleteLogisticalAssistant($idAsistLogistico);
            if ($result) {
                header('Location: index.php');
                exit();
            } else {
            }
        }
    }
    
    public function deleteLogisticalAssistant($idAsistLogistico)
    {
        try {
            $this->LogisticalAssistantModel->idAsistLogistico = $idAsistLogistico;
            return $this->LogisticalAssistantModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
