Tengo una aplicación llamada workshopsoftware. Esta se encarga de administrar talleres de motocicleta y genera informes de mantenimiento. Está basada en la siguiente estructura.

workshopsoftware/
├── controllers/
|   ├── AdminController.php
|   |-- ClientController.php
|   |-- LogisticalAsistantController.php
|   |-- MaintenanceReportController.php
|   |-- MechanicController.php
|   |-- MororbikeController.php
|   └── MororbikeController.php
|-- models/
|   ├── AdminModel.php
|   |-- ClientModel.php
|   |-- LogisticalAsistantModel.php
|   |-- MaintenanceReportModel.php
|   |-- MechanicModel.php
|   |-- MororbikeModel.php
|   └── MororbikeModel.php
|-- views/
|   |── admin/
|   |   ├── index.php               # Lista de administradores
|   |   ├── edit.php                # Formulario de edición de administrador
|   |   ├── create.php              # Formulario de creación de administrador
|   |   └── ...                     # Otras vistas relacionadas con administradores
|   |
|   |── client/
|   |   ├── index.php               # Lista de clientes
|   |   ├── edit.php                # Formulario de edición de cliente
|   |   ├── create.php              # Formulario de creación de cliente
|   |   └── ...                     # Otras vistas relacionadas con clientes
|   |
|   |── logistical_assistant/
|   |   ├── index.php               # Lista de asistentes logísticos
|   |   ├── edit.php                # Formulario de edición de asistente logístico
|   |   ├── create.php              # Formulario de creación de asistente logístico
|   |   └── ...                     # Otras vistas relacionadas con asistentes logísticos
|   |
|   |── maintenance_report/
|   |   ├── index.php               # Lista de informes de mantenimiento
|   |   ├── edit.php                # Formulario de edición de informe de mantenimiento
|   |   ├── create.php              # Formulario de creación de informe de mantenimiento
|   |   └── ...                     # Otras vistas relacionadas con informes de mantenimiento
|   |
|   |── mechanic/
|   |   ├── index.php               # Lista de mecánicos
|   |   ├── edit.php                # Formulario de edición de mecánico
|   |   ├── create.php              # Formulario de creación de mecánico
|   |   └── ...                     # Otras vistas relacionadas con mecánicos
|   |
|   |── motorbike/
|   |   ├── index.php               # Lista de motocicletas
|   |   ├── edit.php                # Formulario de edición de motocicleta
|   |   ├── create.php              # Formulario de creación de motocicleta
|   |   └── ...                     # Otras vistas relacionadas con motocicletas
|   |
|   |── spare_parts/
|   |   ├── index.php               # Lista de repuestos
|   |   ├── edit.php                # Formulario de edición de repuesto
|   |   ├── create.php              # Formulario de creación de repuesto
|   |   └── ...                     # Otras vistas relacionadas con repuestos
|   |-- assets/
|   └── shared/
|       ├── header.php              # Encabezado compartido
|       ├── footer.php              # Pie de página compartido
|       └── ...                     # Otros elementos compartidos
|--db.php
|──index.php
└── docs/

Necesito que me ayudes a crear la logica del front, ya que el resto está creado usando un odelo mvc con php, y me gustaria que pudieramos seguir usando ese lenguaje sin frameworks del backend. Está bien si te envío tambien como está diseñada la base de datos, los modelos y los controladores?