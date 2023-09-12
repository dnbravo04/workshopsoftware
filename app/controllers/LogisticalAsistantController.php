<?php
class LogisticalAsistantController
{
    private $model;

    public function __construct()
    {
        $this->model = new LogisticalAsistantModel();
    }

    public function index()
    {
        // Obtener todos los asistentes logísticos
        $asistentes = $this->model->getAll();
        include 'views/logistical_assistant/index.php';
    }

    public function create()
    {
        include 'views/logistical_assistant/create.php';
    }

    public function store()
    {
        $data = [
            'ALDocumento' => $_POST['ALDocumento'],
            'ALNombre' => $_POST['ALNombre'],
            'ALApellido' => $_POST['ALApellido'],
            'ALTelefono' => $_POST['ALTelefono'],
            'ALCorreo' => $_POST['ALCorreo'],
        ];

        $result = $this->model->save($data);

        if ($result) {
            header('Location: index.php?action=index');
        } else {
            echo "Error al crear el asistente logístico.";
        }
    }

    public function edit($id)
    {
        // Obtener los datos del asistente logístico que se va a editar
        $asistente = $this->model->find($id);

        // Aquí puedes cargar una vista con un formulario para editar los datos del asistente logístico.
        include 'views/logistical_assistant/edit.php';
    }

    public function update($id)
    {
        // Recuperar los datos del formulario de edición
        $data = [
            'ALDocumento' => $_POST['ALDocumento'],
            'ALNombre' => $_POST['ALNombre'],
            'ALApellido' => $_POST['ALApellido'],
            'ALTelefono' => $_POST['ALTelefono'],
            'ALCorreo' => $_POST['ALCorreo'],
            'idAsistLogistico' => $id,
        ];

        // Actualizar los datos del asistente logístico en la base de datos
        $result = $this->model->update($data);

        // Redirigir a la página de inicio o mostrar un mensaje de éxito/error
        if ($result) {
            // Éxito: redirigir a la página de inicio de asistentes logísticos
            header('Location: index.php?action=index');
        } else {
            // Error: mostrar un mensaje de error
            echo "Error al actualizar el asistente logístico.";
        }
    }

    public function delete($id)
    {
        // Eliminar el asistente logístico de la base de datos
        $result = $this->model->delete($id);

        // Redirigir a la página de inicio o mostrar un mensaje de éxito/error
        if ($result) {
            // Éxito: redirigir a la página de inicio de asistentes logísticos
            header('Location: index.php?action=index');
        } else {
            // Error: mostrar un mensaje de error
            echo "Error al eliminar el asistente logístico.";
        }
    }
}
