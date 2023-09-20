<?php

include '../../models/LogisticalAssistantModel.php';
class LogisticalAssistantController
{
    private $LogisticalAssistantModel;

    public function __construct()
    {
        $this->LogisticalAssistantModel = new LogisticalAssistantModel();
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

    public function getLogisticalAssistantById($idLogisticalAssistant)
    {
        try {
            return $this->LogisticalAssistantModel->find($idLogisticalAssistant);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
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


    public function edit($idLogisticalAssistant)
    {
        // Obtener los datos del asistente logístico que se va a editar
        if (empty($idLogisticalAssistant) || !is_numeric($idLogisticalAssistant)) { {
                echo "ID de asistente logístico no válido";
                return;
            }
            $LogisticalAssistant = $this->getLogisticalAssistantById($idLogisticalAssistant);
            // Aquí puedes cargar una vista con un formulario para editar los datos del asistente logístico.
            if ($LogisticalAssistant === null) {
                echo "Asistente logístico no encontrado";
                return;
            }
            $this->updateLogisticalAssistant($LogisticalAssistant);
            include 'views/LogisticalAssistant/edit.php';
        }
    }


    public function updateLogisticalAssistant($id)
    {
        try {
            $this->LogisticalAssistantModel->idAsistLogistico = $id['idAsistLogistico'];
            $this->LogisticalAssistantModel->ALDocumento = $id['ALDocumento'];
            $this->LogisticalAssistantModel->ALNombre = $id['ALNombre'];
            $this->LogisticalAssistantModel->ALApellido = $id['ALApellido'];
            $this->LogisticalAssistantModel->ALTelefono = $id['ALTelefono'];
            $this->LogisticalAssistantModel->ALCorreo = $id['ALCorreo'];

            return $this->LogisticalAssistantModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }
    }

    public function deleteLogisticalAssistant($idLogisticalAssistant)
    {
        try {
            $this->LogisticalAssistantModel->idAsistLogistico = $idLogisticalAssistant;
            return $this->LogisticalAssistantModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idLogisticalAssistant = $_POST['idLogisticalAssistant'];
            $result = $this->deleteLogisticalAssistant($idLogisticalAssistant);
            if ($result) {
                // La eliminación se realizó correctamente, puedes redirigir a otra página o mostrar un mensaje de éxito.
                header('Location: index.php');
                exit();
            } else {
            }
        }
    }
}
