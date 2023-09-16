<?php

require_once 'models/MotorbikeModel.php';

class MotorbikeController
{
    private $motocicletaModel;

    public function __construct()
    {
        $this->motocicletaModel = new MotorbikeModel();
    }

    public function index()
    {
        $motocicletas = $this->motocicletaModel->getAll();
        include 'views/motorbike/index.php';
    }

    public function create()
    {
        include 'views/motorbike/create.php';
    }

    public function store()
    {
        // Obtener los datos del formulario
        $placa = $_POST['MtPlaca'];
        $marca = $_POST['MtMarca'];
        $modelo = $_POST['MtModelo'];
        $cilindraje = $_POST['MtCilindraje'];
        $color = $_POST['MtColor'];
        $cliente = $_POST['MtCliente'];

        // Crear una nueva instancia de Motocicleta
        $motocicleta = new MotorbikeModel();
        $motocicleta->MtPlaca = $placa;
        $motocicleta->MtMarca = $marca;
        $motocicleta->MtModelo = $modelo;
        $motocicleta->MtCilindraje = $cilindraje;
        $motocicleta->MtColor = $color;
        $motocicleta->MtCliente = $cliente;

        // Guardar la motocicleta en la base de datos
        $result = $motocicleta->save();

        if ($result) {
            header('Location: index.php?action=motorbike.index');
        } else {
        }
    }

    public function edit($id)
    {
        $motocicleta = $this->motocicletaModel->find($id);

        if ($motocicleta) {
            include 'views/motorbike/edit.php';
        } else {
            // Manejar el error, por ejemplo, redirigir a una página de error
        }
    }

    public function update()
    {
        // Obtener los datos del formulario
        $id = $_POST['idMotocicleta'];
        $placa = $_POST['MtPlaca'];
        $marca = $_POST['MtMarca'];
        $modelo = $_POST['MtModelo'];
        $cilindraje = $_POST['MtCilindraje'];
        $color = $_POST['MtColor'];
        $cliente = $_POST['MtCliente'];

        $motocicleta = new MotorbikeModel();
        $motocicleta->idMotocicleta = $id;
        $motocicleta->MtPlaca = $placa;
        $motocicleta->MtMarca = $marca;
        $motocicleta->MtModelo = $modelo;
        $motocicleta->MtCilindraje = $cilindraje;
        $motocicleta->MtColor = $color;
        $motocicleta->MtCliente = $cliente;
        $result = $motocicleta->update();

        if ($result) {
            header('Location: index.php?action=motorbike.index');
        } else {
        }
    }

    public function delete($id)
    {
        $motocicleta = new MotorbikeModel();
        $motocicleta->idMotocicleta = $id;
        $result = $motocicleta->delete();

        if ($result) {
            header('Location: index.php?action=motorbike.index');
        } else {
        }
    }
}
?>
