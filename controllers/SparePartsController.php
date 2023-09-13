<?php

class SparePartsController
{
    public function index()
    {
        // Lógica para mostrar la lista de repuestos
        $sparePartsModel = new SpareParts();
        $spareParts = $sparePartsModel->getAll(); // Asegúrate de tener un método getAll en tu modelo

        // Puedes cargar la vista correspondiente y pasar los datos de los repuestos a la vista
        include 'views/spareparts/index.php';
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de repuestos
        include 'views/spareparts/create.php';
    }

    public function store()
    {
        // Lógica para almacenar un nuevo repuesto en la base de datos
        // Recuperar los datos del formulario
        $RepNombre = $_POST['RepNombre'];
        $RepCantidad = $_POST['RepCantidad'];
        $RepCosto = $_POST['RepCosto'];
        $RepMotocicleta = $_POST['RepMotocicleta'];

        // Crear una instancia del modelo y guardar los datos
        $sparePartsModel = new SpareParts();
        $sparePartsModel->RepNombre = $RepNombre;
        $sparePartsModel->RepCantidad = $RepCantidad;
        $sparePartsModel->RepCosto = $RepCosto;
        $sparePartsModel->RepMotocicleta = $RepMotocicleta;

        if ($sparePartsModel->save()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al guardar el repuesto.';
        }
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de un repuesto
        $sparePartsModel = new SpareParts();
        $sparePart = $sparePartsModel->find($id);

        // Puedes cargar la vista correspondiente y pasar los datos del repuesto a la vista
        include 'views/spareparts/edit.php';
    }

    public function update($id)
    {
        // Lógica para actualizar los datos de un repuesto en la base de datos
        // Recuperar los datos del formulario
        $RepNombre = $_POST['RepNombre'];
        $RepCantidad = $_POST['RepCantidad'];
        $RepCosto = $_POST['RepCosto'];
        $RepMotocicleta = $_POST['RepMotocicleta'];

        // Crear una instancia del modelo y actualizar los datos
        $sparePartsModel = new SpareParts();
        $sparePartsModel->idRepuesto = $id;
        $sparePartsModel->RepNombre = $RepNombre;
        $sparePartsModel->RepCantidad = $RepCantidad;
        $sparePartsModel->RepCosto = $RepCosto;
        $sparePartsModel->RepMotocicleta = $RepMotocicleta;

        if ($sparePartsModel->update()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al actualizar el repuesto.';
        }
    }

    public function delete($id)
    {
        // Lógica para eliminar un repuesto de la base de datos
        $sparePartsModel = new SpareParts();
        $sparePartsModel->idRepuesto = $id;

        if ($sparePartsModel->delete()) {
            // Redirigir o mostrar un mensaje de éxito
            header('Location: index.php');
        } else {
            // Mostrar un mensaje de error
            echo 'Error al eliminar el repuesto.';
        }
    }
}
