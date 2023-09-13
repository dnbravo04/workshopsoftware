El nombre de la base de datos es workshopsoftware_db.sql

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL COMMENT 'Llave Primaria',
  `AdmDocumento` bigint(20) NOT NULL COMMENT 'Documento de identidad del Administrador',
  `AdmNombre` varchar(30) NOT NULL COMMENT 'Nombre(s) del administrador',
  `AdmApellido` varchar(30) NOT NULL COMMENT 'Apellidos del Administrador',
  `AdmTelefono` varchar(15) NOT NULL COMMENT 'Telefono (de preferencia celular) del administrador',
  `AdmCorreo` varchar(40) DEFAULT NULL COMMENT 'Correo electronico del administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `asistentelogistico` (
  `idAsistLogistico` int(11) NOT NULL COMMENT 'Llave Primaria',
  `ALDocumento` bigint(20) NOT NULL COMMENT 'Documento Asistente Logistico',
  `ALNombre` varchar(30) NOT NULL COMMENT 'Nombre(s) del Asistente Logistico',
  `ALApellido` varchar(30) NOT NULL COMMENT 'apellido del Asistente Logistico',
  `ALTelefono` varchar(15) NOT NULL COMMENT 'Telefono (Celular de preferencia) del Asistente Logistico',
  `ALCorreo` varchar(40) DEFAULT NULL COMMENT 'Correo del Asistente logistico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL COMMENT 'Llave Primaria',
  `CliDocumento` bigint(20) NOT NULL COMMENT 'Documento de identidad del cliente',
  `CliNombre` varchar(30) NOT NULL COMMENT 'Nombre(s) del Cliente',
  `CliApellido` varchar(30) NOT NULL COMMENT 'Apellidos del Cliente',
  `CliTelefono` varchar(15) NOT NULL COMMENT 'Telefono principal del cliente',
  `CliTelefonoSecundario` varchar(15) DEFAULT NULL COMMENT 'Telefono secundario del cliente (Opcional)',
  `CliCorreo` varchar(40) DEFAULT NULL COMMENT 'Correo Electronico del cliente',
  `CliDireccion` varchar(80) NOT NULL COMMENT 'Direccion de la casa/oficina del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `mecanico` (
  `idMecanico` int(11) NOT NULL COMMENT 'Llave Primaria',
  `MecDocumento` bigint(20) NOT NULL COMMENT 'Documento de identidad del mecanico',
  `MecNombre` varchar(30) NOT NULL COMMENT 'Nombre(s) del mecanico',
  `MecApellido` varchar(30) NOT NULL COMMENT 'Apellidos del mecanico',
  `MecTelefono` varchar(15) NOT NULL COMMENT 'Telefono (Preferiblemente celular) del mecanico',
  `MecCorreo` varchar(40) DEFAULT NULL COMMENT 'Correo electronico del mecanico',
  `MecEspecializacion` varchar(30) NOT NULL COMMENT 'Area de especializacion del mecanico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `motocicleta` (
  `idMotocicleta` int(11) NOT NULL COMMENT 'Llave Primaria',
  `MtPlaca` varchar(10) NOT NULL COMMENT 'Placa de la Motocicleta',
  `MtMarca` varchar(20) NOT NULL COMMENT 'Marca de la Motocicleta',
  `MtModelo` varchar(10) NOT NULL COMMENT 'Modelo de la motocicleta',
  `MtCilindraje` varchar(15) NOT NULL COMMENT 'Cilindraje de la motocicleta',
  `MtColor` varchar(30) NOT NULL COMMENT 'Color de la motocicleta',
  `MtCliente` int(11) NOT NULL COMMENT 'Cliente de la motocicleta. Hace referencia a la columna idCliente de la tabla Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reporte_mantenimiento` (
  `idReporte` int(11) NOT NULL COMMENT 'Llave Primaria',
  `RepFecha` date NOT NULL COMMENT 'Fecha en la que se realiza el reporte de mantenimineto',
  `RepInformeDiagnostico` varchar(80) NOT NULL COMMENT 'Informe de diagnostico realizado antes del mantenimiento',
  `RepMantenimientoRealizado` varchar(80) DEFAULT NULL COMMENT 'Informe donde se detalla el mantenimiento realizado',
  `RepTiempoReparacion` varchar(30) DEFAULT NULL COMMENT 'Tiempo que tardo en realizarse la reparacion',
  `RepMotocicleta` int(11) NOT NULL COMMENT 'Motocicleta a la cual se le realiza el informe. Esta hace referencia a la columna idMotocicleta de la tabla Motocicleta',
  `RepMecanicoEncargado` int(11) NOT NULL COMMENT 'Mecanico que realizo el mantenimiento. Esta hace referencia a la tabla idMecanico de la tabla Mecanico',
  `RepRepuestosUtilizados` int(11) NOT NULL COMMENT 'Repuestos utilizados durante la reparacion de la motocicleta. Esta hace referencia a la columna idRepuesto de la tabla RepuestoMotocicleta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `repuestos_motocicleta` (
  `idRepuesto` int(11) NOT NULL COMMENT 'Llave Foranea',
  `RepuCodigo` varchar(35) NOT NULL COMMENT 'Codigo del Repuesto',
  `RepuNombre` varchar(35) NOT NULL COMMENT 'Nombre del Repuesto',
  `RepuDescripcion` varchar(60) NOT NULL COMMENT 'Descripcioon del repuesto',
  `RepuTipo` varchar(35) NOT NULL COMMENT 'Tipo de repuesto (Ej. Hidraulico, electrico, Aceite, etc.)',
  `RepuMarca` varchar(20) NOT NULL COMMENT 'Marca del Repuesto',
  `RepuModelo` varchar(15) NOT NULL COMMENT 'Modelo del Repuesto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD UNIQUE KEY `Documento_Unique_Index` (`AdmDocumento`) USING BTREE;


ALTER TABLE `asistentelogistico`
  ADD PRIMARY KEY (`idAsistLogistico`),
  ADD UNIQUE KEY `Documento_Unique_Index` (`ALDocumento`) USING BTREE;


ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `Documento_Unique_Index` (`CliDocumento`) USING BTREE;


ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`idMecanico`),
  ADD UNIQUE KEY `Documento_Unique_Index` (`MecDocumento`) USING BTREE;


ALTER TABLE `motocicleta`
  ADD PRIMARY KEY (`idMotocicleta`),
  ADD UNIQUE KEY `Placa_Unique_Index` (`MtPlaca`) USING BTREE,
  ADD KEY `Motocicleta_Cliente_FK` (`MtCliente`);


ALTER TABLE `reporte_mantenimiento`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `Reporte_Motocicleta_FK` (`RepMotocicleta`),
  ADD KEY `Reporte_MecanicoFK` (`RepMecanicoEncargado`),
  ADD KEY `Reporte_Repuesto_FK` (`RepRepuestosUtilizados`);

ALTER TABLE `repuestos_motocicleta`
  ADD PRIMARY KEY (`idRepuesto`);

ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria';


ALTER TABLE `asistentelogistico`
  MODIFY `idAsistLogistico` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria';


ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria';


ALTER TABLE `mecanico`
  MODIFY `idMecanico` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria';


ALTER TABLE `motocicleta`
  MODIFY `idMotocicleta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria';

ALTER TABLE `reporte_mantenimiento`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria';

ALTER TABLE `repuestos_motocicleta`
  MODIFY `idRepuesto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Foranea';


ALTER TABLE `motocicleta`
  ADD CONSTRAINT `motocicleta_ibfk_1` FOREIGN KEY (`MtCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `reporte_mantenimiento`
  ADD CONSTRAINT `reporte_mantenimiento_ibfk_1` FOREIGN KEY (`RepMotocicleta`) REFERENCES `motocicleta` (`idMotocicleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_mantenimiento_ibfk_2` FOREIGN KEY (`RepMecanicoEncargado`) REFERENCES `mecanico` (`idMecanico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_mantenimiento_ibfk_3` FOREIGN KEY (`RepRepuestosUtilizados`) REFERENCES `repuestos_motocicleta` (`idRepuesto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

