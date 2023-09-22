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

    public function getAdminById($id)
    {
        try {
            return $this->adminModel->find($id);
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }


    private function generateSalt()
    {
        return bin2hex(random_bytes(32)); // Tamaño de sal recomendado: 32 bytes
    }

    public function createAdmin($data)
    {
        try {
            // Generar una sal aleatoria
            $salt = $this->generateSalt();

            // Obtener la contraseña ingresada por el usuario
            $password = $data['AdmContraseña'];

            // Combinar la sal y la contraseña
            $saltedPassword = $salt . $password;

            // Calcular el hash de la contraseña con la sal
            $passwordHash = password_hash($saltedPassword, PASSWORD_BCRYPT);

            $this->adminModel->AdmDocumento = $data['AdmDocumento'];
            $this->adminModel->AdmNombre = $data['AdmNombre'];
            $this->adminModel->AdmApellido = $data['AdmApellido'];
            $this->adminModel->AdmTelefono = $data['AdmTelefono'];
            $this->adminModel->AdmCorreo = $data['AdmCorreo'];
            $this->adminModel->AdmUsuario = $data['AdmUsuario'];
            $this->adminModel->AdmContraseñaHash = $passwordHash;
            $this->adminModel->AdmSalt = $salt;

            return $this->adminModel->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
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

                if ($result !== null) {
                    header('Location: index.php');
                } else {
                    echo "Error al crear el administrador";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }



    public function edit($idAdmin)
    {
        if (empty($idAdmin) || !is_numeric($idAdmin)) {
            echo "ID de administrador no válido";
            return;
        }
        $admin = $this->getAdminById($idAdmin);

        if ($admin === null) {
            echo "Administrador no encontrado";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $salt = bin2hex(random_bytes(32));
                $password = $_POST['AdmContraseña'];
                $saltedPassword = $salt . $password;
                $passwordHash = password_hash($saltedPassword, PASSWORD_BCRYPT);

                $data = [
                    'idAdministrador' => $idAdmin,
                    'AdmDocumento' => $_POST['AdmDocumento'],
                    'AdmNombre' => $_POST['AdmNombre'],
                    'AdmApellido' => $_POST['AdmApellido'],
                    'AdmTelefono' => $_POST['AdmTelefono'],
                    'AdmCorreo' => $_POST['AdmCorreo'],
                    'AdmUsuario' => $_POST['AdmUsuario'],
                ];

                if (!empty($_POST['AdmContraseña'])) {
                    $data['AdmContraseña'] = $passwordHash;
                }

                $result = $this->updateAdmin($data);

                if ($result !== null) {
                    header('Location: index.php');
                } else {
                    echo "Error al actualizar el administrador";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function updateAdmin($data)
    {
        try {
            // Generar una sal aleatoria
            $salt = bin2hex(random_bytes(32)); // Tamaño de sal recomendado: 32 bytes

            // Obtener la contraseña ingresada por el usuario
            $password = $data['AdmContraseña'];

            // Combinar la sal y la contraseña
            $saltedPassword = $salt . $password;

            // Calcular el nuevo hash de la contraseña con la nueva sal
            $passwordHash = password_hash($saltedPassword, PASSWORD_BCRYPT);

            $this->adminModel->idAdministrador = $data['idAdministrador'];
            $this->adminModel->AdmDocumento = $data['AdmDocumento'];
            $this->adminModel->AdmNombre = $data['AdmNombre'];
            $this->adminModel->AdmApellido = $data['AdmApellido'];
            $this->adminModel->AdmTelefono = $data['AdmTelefono'];
            $this->adminModel->AdmCorreo = $data['AdmCorreo'];
            $this->adminModel->AdmUsuario = $data['AdmUsuario'];
            $this->adminModel->AdmContraseñaHash = $passwordHash; // Guardar el nuevo hash en lugar de la contraseña
            $this->adminModel->AdmSalt = $salt; // Guardar la nueva sal

            return $this->adminModel->update();
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }
    }

    public function deleteAdmin($idAdmin)
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
