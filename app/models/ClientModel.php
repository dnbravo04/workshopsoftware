<?php
class ClientModel
{
    private $db;

    public $idCliente;
    public $CliDocumento;
    public $CliNombre;
    public $CliApellido;
    public $CliTelefono;
    public $CliTelefonoSecundario;
    public $CliCorreo;
    public $CliDireccion;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=workshopsoftware_db", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($idCliente)
    {
        $sql = "SELECT * FROM clientes WHERE idCliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idCliente]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO clientes (CliDocumento, CliNombre, CliApellido, CliTelefono, CliTelefonoSecundario, CliCorreo, CliDireccion) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->CliDocumento, $this->CliNombre, $this->CliApellido, $this->CliTelefono, $this->CliTelefonoSecundario, $this->CliCorreo, $this->CliDireccion]);

        return $stmt->rowCount();
    }

    public function update()
    {
        $sql = "UPDATE clientes SET CliDocumento = ?, CliNombre = ?, CliApellido = ?, CliTelefono = ?, CliTelefonoSecundario = ?, CliCorreo = ?, CliDireccion = ? WHERE idCliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->CliDocumento, $this->CliNombre, $this->CliApellido, $this->CliTelefono, $this->CliTelefonoSecundario, $this->CliCorreo, $this->CliDireccion, $this->idCliente]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM clientes WHERE idCliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idCliente]);

        return $stmt->rowCount();
    }
}
