<?php
class MechanicController
{
    public function index()
    {
        // Lógica para mostrar la lista de mecánicos
        $mechanicModel = new MechanicModel();
        $mechanics = $mechanicModel->getAll(); // Asegúrate de tener un método getAll en tu modelo

        // Puedes cargar la vista correspondiente y pasar los datos de los mecánicos a la vista
        include 'views/mechanic/index.php';
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de mecánicos
        include 'views/mechanic/create.php';
    }

    public function store()
    {
        // Lógica para almacenar un nuevo mecánico en la base de datos
        // Recuperar los datos del formulario
        $MecDocumento = $_POST['MecDocumento'];
        $MecNombre = $_POST['MecNombre'];
        $MecApellido = $_POST['MecApellido'];
        $MecTelefono = $_POST['MecTelefono'];
        $MecCorreo = $_POST['MecCorreo'];
        $MecEspecializacion = $_POST['MecEspecializacion'];

        // Crear una instancia del modelo y guardar los datos
        $mechanicModel = new MechanicModel();
        $mechanicModel->MecDocumento = $MecDocumento;
        $mechanicModel->MecNombre = $MecNombre;
        $mechanicModel->MecApellido = $MecApellido;
        $mechanicModel->MecTelefono = $MecTelefono;
        $mechanicModel->MecCorreo = $MecCorreo;
        $mechanicModel->MecEspecializacion = $MecEspecializacion;

        if ($mechanicModel->save()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al guardar el mecánico.';
        }
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de un mecánico
        $mechanicModel = new MechanicModel();
        $mechanic = $mechanicModel->find($id);

        // Puedes cargar la vista correspondiente y pasar los datos del mecánico a la vista
        include 'views/mechanic/edit.php';
    }

    public function update($id)
    {
        // Lógica para actualizar los datos de un mecánico en la base de datos
        // Recuperar los datos del formulario
        $MecDocumento = $_POST['MecDocumento'];
        $MecNombre = $_POST['MecNombre'];
        $MecApellido = $_POST['MecApellido'];
        $MecTelefono = $_POST['MecTelefono'];
        $MecCorreo = $_POST['MecCorreo'];
        $MecEspecializacion = $_POST['MecEspecializacion'];

        // Crear una instancia del modelo y actualizar los datos
        $mechanicModel = new MechanicModel();
        $mechanicModel->idMecanico = $id;
        $mechanicModel->MecDocumento = $MecDocumento;
        $mechanicModel->MecNombre = $MecNombre;
        $mechanicModel->MecApellido = $MecApellido;
        $mechanicModel->MecTelefono = $MecTelefono;
        $mechanicModel->MecCorreo = $MecCorreo;
        $mechanicModel->MecEspecializacion = $MecEspecializacion;

        if ($mechanicModel->update()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al actualizar el mecánico.';
        }
    }

    public function delete($id)
    {
        // Lógica para eliminar un mecánico de la base de datos
        $mechanicModel = new MechanicModel();
        $mechanicModel->idMecanico = $id;

        if ($mechanicModel->delete()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al eliminar el mecánico.';
        }
    }
}
