# Worshop Software

Por Diego Bravo Arias, Estudiante de BYU-Idaho y El Servicio Nacional de Aprendizaje SENA - Colombia

## Que Es?

El software es una aplicación web que funciona en navegadores de internet de escritorio y dispositivos móviles. El software llevara a cabo la gestión de los datos de las motocicletas que llevan al taller a reparación. El software recopila los datos personales de los clientes y los datos de las motocicletas. El sistema también permite llenar informes de los mantenimientos realizados junto con los repuestos utilizados, fechas, etc. Y además permite imprimir o generar informes de los mantenimientos realizados.

## Como funciona?

• El sistema gestionará el historial de mantenimiento de las motocicletas por usuario, es decir, datos básicos del usuario y las veces que lleva a revisión el automotor.
• El sistema llevará un inventario de los repuestos y partes que hay en el taller mecánico, además de asignarlos a las motos en reparación, de ser necesario.

## Que tecnologias utiliza?

Creado en PHP, utiliza la libreria fpdf para generar los reportes, y además utiliza las librerias TailwindCSS y Flowbite para el diseño y la interfaz de usuario

## Como está estructurado?

Workshopsoftware está diseñado para utilizar el patron MVC, por lo que está dividido en capas y cada capa cumple con una función especifica:

    workshopsoftware/
    ├── controllers/
    |   ├── AdminController.php
    |   |-- ClientController.php
    |   |-- LogisticalAsistantController.php
    |   |-- IndexController.php
    |   |-- LoginController.php
    |   |-- MaintenanceReportController.php
    |   |-- MechanicController.php
    |   |-- MororbikeController.php
    |   └── MororbikeController.php
    |-- models/
    |   ├── AdminModel.php
    |   |-- ClientModel.php
    |   |-- LoginModel.php
    |   |-- LogisticalAsistantModel.php
    |   |-- MaintenanceReportModel.php
    |   |-- MechanicModel.php
    |   |-- MororbikeModel.php
    |   └── SparePartsModel.php
    |-- views/
    |   |── admin/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |── client/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |── login/
    |   |   └── login.php
    |   |
    |   |── logistical_assistant/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |── maintenance_report/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |── mechanic/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |── motorbike/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |── spare_parts/
    |   |   ├── create.php
    |   |   ├── delete.php
    |   |   ├── edit.php
    |   |   ├── index.php
    |   |   └── view.php
    |   |
    |   |──index.php
    |   |
    |   |-- assets/
    |   |-- scripts/
    |   |   └── scripts.php
    |   |-- styles/
    |   |   └── styles.php
    |   └── shared/
    |       ├── header.php
    |       └──footer.php
    |──index.php
    └── docs/

## Ya está terminado el proyecto?

Si bien la creación del proyecto ya finmalizó su estapa inicial, el proyecto continuará con novedades y refactorizaciones, esto para que sea mucho más rapido, facil de usar, e inclusive, reactivo.

## Como puedo probarlo?

Para instalar workshop software lo unico que necesitas es insertar el proyecto en la carpeta _htdocs_ de Xaamp. y luego ingresar a _localhost/workshopsoftware_
