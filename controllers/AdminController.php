<?php
include '../../models/AdminModel.php';

class AdminController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function getAllAdmins()
    {
        try {
            $admins = $this->adminModel->getAll();
            return $admins;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function getAdminById($id)
    {
        try {
            return $this->adminModel->find($id);
        } catch (Exception $e) {
            // Log the exception and return null
            echo $e->getMessage();
            return null;
        }
    }


    private function createAdmin($data)
    {
        try {
            $this->adminModel->AdmDocumento = $data['AdmDocumento'];
            $this->adminModel->AdmNombre = $data['AdmNombre'];
            $this->adminModel->AdmApellido = $data['AdmApellido'];
            $this->adminModel->AdmTelefono = $data['AdmTelefono'];
            $this->adminModel->AdmCorreo = $data['AdmCorreo'];

            return $this->adminModel->save();
        } catch (Exception $e) {
            // Log the exception and return false
            echo $e->getMessage();
            return false;
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'AdmDocumento' => $_POST['AdmDocumento'],
                'AdmNombre' => $_POST['AdmNombre'],
                'AdmApellido' => $_POST['AdmApellido'],
                'AdmTelefono' => $_POST['AdmTelefono'],
                'AdmCorreo' => $_POST['AdmCorreo'],
                'AdmUsuario' => $_POST['AdmUsuario'],
                'AdmContraseña' => $_POST['AdmContraseña']
            ];

            $result = $this->createAdmin($data);

            if ($result) {
                header('Location: index.php?action=controller&controller=admin&action=index');
            } else {
                echo "Error al crear el administrador";
            }
        }
    }

    public function edit($idAdmin)
    {
        if (empty($idAdmin) || !is_numeric($idAdmin)) {
            echo "ID de cliente no válido";
            return;
        }
        $admin = $this->getAdminById($idAdmin);

        if ($admin === null) {
            echo "Administrador no encontrado";
            return;
        }
        $this->updateAdmin($admin);
        include 'views/admin/edit.php';
    }


    public function updateAdmin($data)
    {

        try {
            $this->adminModel->idAdministrador = $data['idAdministrador'];
            $this->adminModel->AdmDocumento = $data['AdmDocumento'];
            $this->adminModel->AdmNombre = $data['AdmNombre'];
            $this->adminModel->AdmApellido = $data['AdmApellido'];
            $this->adminModel->AdmTelefono = $data['AdmTelefono'];
            $this->adminModel->AdmCorreo = $data['AdmCorreo'];
            $this->adminModel->AdmUsuario = $data['AdmUsuario'];
            $this->adminModel->AdmContraseña = $data['AdmContraseña'];

            return $this->adminModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    private function deleteAdmin($idAdmin)
    {
        try {
            $this->adminModel->idAdministrador = $idAdmin;
            return $this->adminModel->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idAdmin = $_POST['idCliente'];

            $result = $this->deleteAdmin($idAdmin);

            if ($result) {
                header('Location: index.php?controller=admin&action=index');
            } else {
                echo "Error al eliminar el administrador";
            }
        }
    }
}
