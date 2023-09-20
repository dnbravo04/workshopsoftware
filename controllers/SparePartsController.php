<?php

include '../../models/SparePartsModel.php';

class SparePartsController
{

    private $sparePartsModel;
    public function __construct()
    {
        $this->sparePartsModel = new SparePartsModel();
    }
    public function getAllSpareParts()
    {

        try {
            $spareParts = $this->sparePartsModel->getAll();
            return $spareParts;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function getSparePartsById($idRepiesto)
    {
        try {
            $spareParts = $this->sparePartsModel->find($idRepiesto);
            return $spareParts;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function createSpareParts($data)
    {
        try {
            $this->sparePartsModel->RepuCodigo = $data['RepuCodigo'];
            $this->sparePartsModel->RepuNombre = $data['RepuNombre'];
            $this->sparePartsModel->RepuDescripcion = $data['RepuDescripcion'];
            $this->sparePartsModel->RepuTipo = $data['RepuTipo'];
            $this->sparePartsModel->RepuMarca = $data['RepuMarca'];
            $this->sparePartsModel->RepuModelo = $data['RepuModelo'];

            return $this->sparePartsModel->save($data);
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'RepuCodigo' => $_POST['RepuCodigo'],
                'RepuNombre' => $_POST['RepuNombre'],
                'RepuDescripcion' => $_POST['RepuDescripcion'],
                'RepuTipo' => $_POST['RepuTipo'],
                'RepuMarca' => $_POST['RepuMarca'],
                'RepuModelo' => $_POST['RepuModelo'],
            ];
            $result = $this->createSpareParts($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al crear el repuesto";
            }
        }
    }
    public function edit($idRepiesto)
    {
        if (empty($idRepiesto) || !is_numeric($idRepiesto)) {
            echo "ID de repuesto no válido";
            return;
        }
        $repuesto = $this->getSparePartsById($idRepiesto);
        if ($repuesto === null) {
            echo "Repuesto no encontrado";
            return;
        }
        $this->updateSpareParts($repuesto);
        include 'views/spare_parts/edit.php';
    }
    public function updateSpareParts($data)
    {
        try {
            $this->sparePartsModel->idRepuesto = $data['idRepuesto'];
            $this->sparePartsModel->RepuCodigo = $data['RepuCodigo'];
            $this->sparePartsModel->RepuNombre = $data['RepuNombre'];
            $this->sparePartsModel->RepuDescripcion = $data['RepuDescripcion'];
            $this->sparePartsModel->RepuTipo = $data['RepuTipo'];
            $this->sparePartsModel->RepuMarca = $data['RepuMarca'];
            $this->sparePartsModel->RepuModelo = $data['RepuModelo'];
            return $this->sparePartsModel->update($data);
        } catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }
    }
    public function deleteSpareParts($idRepiesto)
    {
        try {
            $this->sparePartsModel->idRepuesto = $idRepiesto;
            return $this->sparePartsModel->delete($idRepiesto);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idRepiesto = $_POST['idRepuesto'];
            $result = $this->deleteSpareParts($idRepiesto);
            if ($result) {

                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar el repuesto";
            }
        }
    }
}
