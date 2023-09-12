<?php
require_once 'models/AdminModel.php';

class AdminController
{
    private $administradorModel;

    public function __construct()
    {
        $this->administradorModel = new AdminModel();
    }

    public function index()
    {
        $administradores = $this->administradorModel->getAll();
        include 'views/admin/index.php';
    }

    public function create()
    {
        include 'views/admin/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $documento = $_POST['AdmDocumento'];
            $nombre = $_POST['AdmNombre'];
            $apellido = $_POST['AdmApellido'];
            $telefono = $_POST['AdmTelefono'];
            $correo = $_POST['AdmCorreo'];

            // Crear una nueva instancia de Administrador
            $administrador = new AdminModel();
            $administrador->AdmDocumento = $documento;
            $administrador->AdmNombre = $nombre;
            $administrador->AdmApellido = $apellido;
            $administrador->AdmTelefono = $telefono;
            $administrador->AdmCorreo = $correo;

            // Guardar el administrador en la base de datos
            $result = $administrador->save();

            if ($result) {
                header('Location: index.php?action=admin.index');
            } else {
                // Manejar el error, por ejemplo, mostrar un mensaje de error
            }
        }
    }

    public function edit($id)
    {
        $administrador = $this->administradorModel->find($id);

        if ($administrador) {
            include 'views/admin/edit.php';
        } else {
            // Manejar el error, por ejemplo, redirigir a una página de error
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $id = $_POST['idAdministrador'];
            $documento = $_POST['AdmDocumento'];
            $nombre = $_POST['AdmNombre'];
            $apellido = $_POST['AdmApellido'];
            $telefono = $_POST['AdmTelefono'];
            $correo = $_POST['AdmCorreo'];

            // Crear una nueva instancia de Administrador
            $administrador = new AdminModel();
            $administrador->idAdministrador = $id;
            $administrador->AdmDocumento = $documento;
            $administrador->AdmNombre = $nombre;
            $administrador->AdmApellido = $apellido;
            $administrador->AdmTelefono = $telefono;
            $administrador->AdmCorreo = $correo;

            // Actualizar el administrador en la base de datos
            $result = $administrador->update();

            if ($result) {
                header('Location: index.php?action=admin.index');
            } else {
                // Manejar el error, por ejemplo, mostrar un mensaje de error
            }
        }
    }

    public function delete($id)
    {
        // Crear una nueva instancia de Administrador
        $administrador = new AdminModel();
        $administrador->idAdministrador = $id;

        // Eliminar el administrador de la base de datos
        $result = $administrador->delete();

        if ($result) {
            header('Location: index.php?action=admin.index');
        } else {
            // Manejar el error, por ejemplo, mostrar un mensaje de error
        }
    }
}
?>
