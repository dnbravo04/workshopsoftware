<?php
require_once 'Database.php';
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
        $database = new Database();
        $this->db = $database->connect();
    }

    public function save()
    {
        $sql = "INSERT INTO cliente (CliDocumento, CliNombre, CliApellido, CliTelefono, CliTelefonoSecundario, CliCorreo, CliDireccion) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->CliDocumento, $this->CliNombre, $this->CliApellido, $this->CliTelefono, $this->CliTelefonoSecundario, $this->CliCorreo, $this->CliDireccion]);

        return $stmt->rowCount();
    }

    public function find(int $idCliente)
    {
        $query = "SELECT * FROM cliente WHERE idCliente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $idCliente);
        $stmt->execute();

        $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $clientData ?: [];
    }

    public function getAll()
    {
        $sql = "SELECT * FROM cliente";
        $stmt = $this->db->query($sql);

        if ($stmt->errorInfo()[0] !== '00000') {
            throw new Exception('Error al obtener los clientes');
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $sql = "UPDATE cliente SET CliDocumento = ?, CliNombre = ?, CliApellido = ?, CliTelefono = ?, CliTelefonoSecundario = ?, CliCorreo = ?, CliDireccion = ? WHERE cliente.idCliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->CliDocumento, $this->CliNombre, $this->CliApellido, $this->CliTelefono, $this->CliTelefonoSecundario, $this->CliCorreo, $this->CliDireccion, $this->idCliente]);

        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM cliente WHERE idCliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->idCliente]);

        return $stmt->rowCount();
    }
}
