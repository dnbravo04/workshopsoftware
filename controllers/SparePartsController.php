<?php

include '../../models/SparePartsModel.php';

class SparePartsController
{

    private $sparePartsModel;
    public function __construct()
    {
        $this->sparePartsModel = new SparePartsModel();
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

    public function createSpareParts($data)
    {
        try {
            $this->sparePartsModel->RepuCodigo = $data['RepuCodigo'];
            $this->sparePartsModel->RepuNombre = $data['RepuNombre'];
            $this->sparePartsModel->RepuDescripcion = $data['RepuDescripcion'];
            $this->sparePartsModel->RepuTipo = $data['RepuTipo'];
            $this->sparePartsModel->RepuMarca = $data['RepuMarca'];
            $this->sparePartsModel->RepuModelo = $data['RepuModelo'];

            return $this->sparePartsModel->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getSparePartsById($idRepuesto)
    {
        try {
            $spareParts = $this->sparePartsModel->find($idRepuesto);
            return $spareParts;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
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

    public function edit($idRepuesto)
    {
        if (empty($idRepuesto) || !is_numeric($idRepuesto)) {
            echo "ID de repuesto no válido";
            return;
        }
        $repuesto = $this->getSparePartsById($idRepuesto);
        if ($repuesto === null) {
            echo "Repuesto no encontrado";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'idRepuesto' => $_POST['idRepuesto'],
                'RepuCodigo' => $_POST['RepuCodigo'],
                'RepuNombre' => $_POST['RepuNombre'],
                'RepuDescripcion' => $_POST['RepuDescripcion'],
                'RepuTipo' => $_POST['RepuTipo'],
                'RepuMarca' => $_POST['RepuMarca'],
                'RepuModelo' => $_POST['RepuModelo'],
            ];
            $result = $this->updateSpareParts($data);
            if ($result !== null) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al actualizar el repuesto";
            }
        }
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

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idRepuesto = $_POST['idRepuesto'];
            $result = $this->deleteSpareParts($idRepuesto);
            if ($result) {

                header('Location: index.php');
                exit();
            } else {
                echo "Error al eliminar el repuesto";
            }
        }
    }

    public function deleteSpareParts($idRepuesto)
    {
        try {
            $this->sparePartsModel->idRepuesto = $idRepuesto;
            return $this->sparePartsModel->delete($idRepuesto);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
