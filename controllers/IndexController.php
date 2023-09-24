<?php
include_once 'ClientController.php';
include_once 'MaintenanceReportController.php';
include_once 'MotorbikeController.php';
include_once 'MechanicController.php';

class IndexController
{
    private $clientController;
    private $maintenanceReportController;
    private $motorbikeController;
    private $mechanicController;

    public function __construct()
    {

        $this->clientController = new ClientController();
        $this->maintenanceReportController = new MaintenanceReportController();
        $this->motorbikeController = new MotorbikeController();
        $this->mechanicController = new MechanicController();
    }

    public function getAllClientsOnIndex()
    {
        return count($this->clientController->getAllClients());
    }

    public function getAllMaintenanceReportsOnIndex()
    {
        return count($this->maintenanceReportController->getAllMaintenanceReports());
    }

    public function getAllMotorbikesOnIndex()
    {
        return count($this->motorbikeController->getAllMotorbikes());
    }

    public function getAllMechanicsOnIndex()
    {
        return count($this->mechanicController->getAllMechanics());
    }
}
