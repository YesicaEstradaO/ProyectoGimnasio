-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2021 a las 07:09:44
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectogimnasio`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarAdmin` (IN `_docAdministrador` INT(11), IN `_celAdministrador` VARCHAR(11), IN `_correoAdministrador` VARCHAR(50), IN `_direcAdministrador` VARCHAR(50), IN `_estado` VARCHAR(10), IN `_nombreAdministrador` VARCHAR(50), IN `_usuarioFk` INT)  BEGIN 
	UPDATE administrador SET
		celAdministrador = _celAdministrador, 
        correoAdministrador = _correoAdministrador,
        direcAdministrador = _direcAdministrador,
        estado = _estado, 
        nombreAdministrador = _nombreAdministrador, 
        usuarioFk = _usuarioFk
	where docAdministrador = _docAdministrador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarAlimento` (IN `_idAlimento` INT(11), IN `_nombreAlimento` VARCHAR(11), IN `_valorNutricional` VARCHAR(45), IN `_aminoacidosXporcion` VARCHAR(50), IN `_caloriasXporcion` VARCHAR(50))  BEGIN
	UPDATE alimento SET
        nombreAlimento = _nombreAlimento, 
        valorNutricional = _valorNutricional, 
        aminoacidosXporcion = _aminoacidosXporcion,
        caloriasXporcion = _caloriasXporcion
       
	where idAlimento = _idAlimento;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarCliente` (IN `_docCliente` INT(11), IN `_alturaCliente` INT(4), IN `_apellidoCliente` VARCHAR(50), IN `_celCliente` VARCHAR(11), IN `_estado` VARCHAR(10), IN `_nombreCliente` VARCHAR(50), IN `_pesoCliente` INT(4), IN `_entrenadorFk` INT, IN `_usuarioFk` INT)  BEGIN
	update cliente set
        alturaCliente = _alturaCliente, 
        apellidoCliente = _apellidoCliente,
        celCliente = _celCliente, 
        estado = _estado, 
        nombreCliente = _nombreCliente,
        pesoCliente = _pesoCliente,
        entrenadorFk = _entrenadorFk, 
        usuarioFk = _usuarioFk
	where docCliente = _docCliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarContraindicaciones` (IN `_idContraindicaciones` INT, IN `_descricionContraindicaiones` VARCHAR(100))  begin 
	update Contraindicaciones set
		descricionContraindicaiones = _descricionContraindicaiones
    where idContraindicaciones = _idContraindicaciones;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarDieta` (IN `_idDieta` INT(11), IN `_fechaInicio` DATE, IN `_fechaFin` DATE, IN `_diaDieta` VARCHAR(10), IN `_planDieta` VARCHAR(45), IN `_clienteFk` INT(11), IN `_entrenadorFk` INT(11))  BEGIN
update dieta SET
	fechaInicio = _fechaInicio,
    fechaFin = _fechaFin,
    diaDieta = _diaDieta,
    planDieta = _planDieta,
    clienteFk = _clienteFk,
    entrenadorFk = _entrenadorFk
    
    where idDieta = _idDieta;
    
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEntrenador` (IN `_docEntrenador` INT(11), IN `_celEntrenador` VARCHAR(11), IN `_direcEntrenador` VARCHAR(50), IN `_estado` VARCHAR(50), IN `_nombreEntrenador` VARCHAR(50), IN `_usuarioFk` INT)  BEGIN 
	UPDATE entrenador SET 
		celEntrenador = _celEntrenador, 
		direcEntrenador = _direcEntrenador, 
		estado = _estado,
		nombreEntrenador = _nombreEntrenador, 
		usuarioFk = _usuarioFk
	where docEntrenador = _docEntrenador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarObjetivo` (IN `_idObjetivo` INT, IN `_descripcion` VARCHAR(400), IN `_fechaCumplimiento` DATE, IN `_fechaInicio` DATE, IN `_clienteFk` INT)  BEGIN
	UPDATE objetivo SET descripcion = _descripcion, fechaCumplimiento = _fechaCumplimiento, fechaInicio = _fechaInicio, clienteFk = _clienteFk
                 WHERE idObjetivo = _idObjetivo;        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarParteCuerpo` (IN `_idParteCuerpo` INT(11), IN `_nombreParteCuerpo` VARCHAR(50))  BEGIN
UPDATE partecuerpo SET
nombreParteCuerpo = _nombreParteCuerpo
where idParteCuerpo = _idParteCuerpo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarProteina` (IN `_idProteina` INT(11), IN `_nombreProteina` VARCHAR(50), IN `_marcaProteina` VARCHAR(45), IN `_usoProteina` VARCHAR(45), IN `_clienteFk` INT(11), IN `_entrenadorFk` INT(11))  BEGIN 
	UPDATE proteina SET
		nombreProteina = _nombreProteina,
        marcaProteina = _marcaProteina,
        usoProteina = _usoProteina, 
        clienteFk = _clienteFk,
        entrenadorFk = _entrenadorFk
	WHERE idProteina = _idProteina;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarRutina` (IN `_idRutina` INT(11), IN `_planRutina` VARCHAR(45), IN `_intencidadRutina` VARCHAR(45), IN `_diaRutina` VARCHAR(10), IN `_clienteFk` INT(11), IN `_entrenadorFk` INT(11))  BEGIN
update rutina SET
	planRutina = _planRutina,
    intencidadRutina = _intencidadRutina,
    diaRutina = _diaRutina,
    clienteFk = _clienteFk,
    entrenadorFk = _entrenadorFk
    
    where idRutina = _idRutina;
    
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarSeguimientoM` (IN `_idSeguimiento` INT(11), IN `_fechaSeguimiento` DATE, IN `_medidas` INT(11), IN `_clienteFk` INT(11), IN `_entrenadorFk` INT(11), IN `_ParteCuerpoFk` INT(11))  BEGIN
	UPDATE seguimientomedidas SET
        fechaSeguimiento = _fechaSeguimiento, 
        medidas = _medidas, 
        clienteFk = _clienteFk,
        entrenadorFk = _entrenadorFk,
        ParteCuerpoFk = _ParteCuerpoFk
       
	where idSeguimiento = _idSeguimiento;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarTipoEjercicio` (IN `_idTipoEjercicios` INT(11), IN `_nombreEjercicios` VARCHAR(45))  BEGIN 
UPDATE tipoejercicio SET 
	nombreEjercicios = _nombreEjercicios 
    WHERE idTipoEjercicios =  _idTipoEjercicios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarUsuario` (IN `_docUsuario` INT(11), IN `_celUsuario` VARCHAR(11), IN `_contrasenaUsuario` VARCHAR(45), IN `_correoUsuario` VARCHAR(50), IN `_nombreUsuario` VARCHAR(50), IN `_tipoUsuarioFk` INT)  BEGIN
	UPDATE usuario SET
        celUsuario = _celUsuario, 
        contrasenaUsuario = _contrasenaUsuario, 
        correoUsuario = _correoUsuario,
        nombreUsuario = _nombreUsuario,
        tipoUsuarioFk = _tipoUsuarioFk
	where docUsuario = _docUsuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarAlimento` (IN `_idAlimento` INT)  BEGIN
	DELETE FROM alimento WHERE idAlimento = _idAlimento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCliente` (IN `_docCliente` INT)  BEGIN 
	DELETE FROM cliente WHERE docCliente = _docCliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarContraindicaciones` (IN `_idContraindicaciones` INT)  BEGIN
	DELETE FROM contraindicaciones WHERE idContraindicaciones = _idContraindicaciones;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarDieta` (IN `_idDieta` INT(11))  BEGIN 
	DELETE FROM dieta where idDieta = _idDieta;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarEntrenador` (IN `_docEntrenador` INT)  BEGIN 
	DELETE FROM entrenador WHERE docEntrenador = _docEntrenador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarObjetivo` (IN `_idObjetivo` INT)  BEGIN
	DELETE FROM objetivo WHERE _idObjetivo = idObjetivo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarParteCuerpo` (IN `_IdParteCuerpo` INT)  BEGIN
DELETE FROM partecuerpo WHERE idParteCuerpo = _idParteCuerpo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarProteina` (IN `_idProteina` INT(11))  BEGIN 
	DELETE FROM proteina WHERE idProteina = _idProteina;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarRutina` (IN `_idRutina` INT)  BEGIN
	DELETE FROM rutina WHERE idRutina = _idRutina;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarSeguimiento` (IN `_idSeguimiento` INT)  BEGIN
	DELETE FROM seguimientomedidas WHERE idSeguimiento = _idSeguimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarTipoejercicio` (IN `_idTipoejercicios` INT)  BEGIN
	DELETE FROM tipoejercicio WHERE idTipoejercicios = _idtipoejercicios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuario` (IN `_docUsuario` INT)  BEGIN
	DELETE FROM usuario WHERE docUsuario = _docUsuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarAdmin` (IN `_docAdministrador` INT(11), IN `_celAdministrador` VARCHAR(11), IN `_correoAdministrador` VARCHAR(50), IN `_direcAdministrador` VARCHAR(50), IN `_estado` VARCHAR(10), IN `_nombreAdministrador` VARCHAR(50), IN `_usuarioFk` INT)  BEGIN 
	INSERT INTO administrador values( _docAdministrador, _celAdministrador, _correoAdministrador, _direcAdministrador, _estado, _nombreAdministrador,
    _usuarioFk);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarAlimento` (IN `_nombreAlimento` VARCHAR(45), IN `_valorNutricional` INT, IN `_aminoacidosXporcion` INT, IN `_caloriaXporcion` INT)  BEGIN
INSERT INTO alimento values(null, _nombreAlimento, _valorNutricional, _aminoacidosXporcion, _caloriaXporcion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCliente` (IN `_docCliente` INT(11), IN `_alturaCliente` INT(4), IN `_apellidoCliente` VARCHAR(50), IN `_celCliente` VARCHAR(11), IN `_estado` VARCHAR(10), IN `_nombreCliente` VARCHAR(50), IN `_pesoCliente` INT(4), IN `_entrenadorFk` INT, IN `_usuarioFk` INT)  begin
	insert into cliente values(_docCliente, _alturaCliente, _apellidoCliente, _celCliente, _estado, _nombreCliente, _pesoCliente, _entrenadorFk, _usuarioFk);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarContraindicaciones` (IN `_idContraindicaciones` INT(11), IN `_descricionContraindicaciones` VARCHAR(45))  BEGIN 
	INSERT INTO contraindicaciones values(_idContraindicaciones, _descricionContraindicaciones);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarDieta` (IN `_idDieta` INT(11), IN `_fechaInicio` DATE, IN `_fechaFin` DATE, IN `_diaDieta` VARCHAR(10), IN `_planDieta` VARCHAR(45), IN `_clienteFK` INT(11), IN `_entrenadorFk` INT(11))  begin 
	INSERT INTO dieta VALUES(_idDieta, _fechaInicio, _fechaFin, _diaDieta, _planDieta, _clienteFK, _entrenadorFk);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarEjercicios` (IN `_idEjercicio` INT(11), IN `_tipoEjercicioFk` VARCHAR(45))  BEGIN 
	INSERT INTO ejercicios values(_idEjercicio, _tipoEjercicioFk);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarEntrenador` (IN `_docEntrenador` INT(11), IN `_celEntrenador` VARCHAR(11), IN `_direcEntrenador` VARCHAR(50), IN `_estado` VARCHAR(50), IN `_nombreEntrenador` VARCHAR(50), IN `_usuarioFk` INT)  begin
	insert into entrenador values(_docEntrenador,_celEntrenador, _direcEntrenador,_estado,_nombreEntrenador,_usuarioFk);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarHistorialClinico` (IN `_eps` VARCHAR(45), IN `_medicacionesFk` INT, IN `_detalleMedicacion` VARCHAR(450), IN `_tipoCirugiaFk` INT, IN `_detalleCirugia` VARCHAR(450), IN `_tipoPadecimientoFk` INT, IN `_detallePadecimiento` VARCHAR(450), IN `_clienteFk` INT)  BEGIN
	INSERT INTO historialclinico VALUES (NULL, _eps, _medicacionesFk, _detalleMedicacion, _tipoCirugiaFk, _detalleCirugia, _tipoPadecimientoFk, _detallePadecimiento, _clienteFk);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarObjetivo` (IN `_descripcion` VARCHAR(400), IN `_fechaCumplimiento` DATE, IN `_fechaInicio` DATE, IN `_clienteFk` INT)  BEGIN
	INSERT INTO objetivo VALUES (NULL, _descripcion, _fechaCumplimiento,_fechaInicio , _clienteFK);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarParteCuerpo` (IN `_nombreParteCuerpo` VARCHAR(50))  BEGIN
INSERT into partecuerpo values(null, _nombreParteCuerpo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarProteina` (IN `_nombreProteina` VARCHAR(50), IN `_marcaProteina` VARCHAR(45), IN `_usoProteina` VARCHAR(45), IN `_clienteFk` INT(11), IN `_entrenadorFk` INT(11))  BEGIN 
	insert into proteina value(null, _nombreProteina, _marcaProteina, _usoProteina,_clienteFk,_entrenadorFk);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarRutina` (IN `_idRutina` INT(11), IN `_planRutina` VARCHAR(45), IN `_intencidadRutina` VARCHAR(45), IN `_diaRutinafk` VARCHAR(45), IN `_clienteFk` INT(11), IN `_entrenadorFk` INT(11))  BEGIN 
	INSERT INTO rutina values(_idRutina, _planRutina, _intencidadRutina, _diaRutinafk, _clienteFk, _entrenadorFk );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarSeguimientoM` (IN `_idSeguimiento` INT(11), IN `_fechaSeguimiento` DATE, IN `_medidas` INT(11), IN `_clientesFK` INT(11), IN `_entrenadorFk` INT(11), IN `_parteCuerpoFk` INT(11))  begin 
	INSERT INTO seguimientomedidas VALUES(_idSeguimiento, _fechaSeguimiento, _medidas, _clientesFK, _entrenadorFk, _parteCuerpoFk);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertartipoejercicio` (IN `_idTipoEjercicios` INT(11), IN `_nombreEjercicios` VARCHAR(45))  BEGIN 
	INSERT INTO tipoejercicio values(_idTipoEjercicios, _nombreEjercicios);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarUsuario` (IN `_docUsuario` INT(11), IN `_celUsuario` VARCHAR(11), IN `_contrasenaUsuario` VARCHAR(45), IN `_correoUsuario` VARCHAR(50), IN `_nombreUsuario` VARCHAR(50), IN `_tipoUsuarioFk` INT)  begin
	insert into usuario values(_docUsuario, _celUsuario, _contrasenaUsuario, _correoUsuario, _nombreUsuario, _tipoUsuarioFk);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `docAdministrador` int(11) NOT NULL,
  `celAdministrador` varchar(11) NOT NULL,
  `correoAdministrador` varchar(50) NOT NULL,
  `direcAdministrador` varchar(50) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `nombreAdministrador` varchar(50) NOT NULL,
  `usuarioFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`docAdministrador`, `celAdministrador`, `correoAdministrador`, `direcAdministrador`, `estado`, `nombreAdministrador`, `usuarioFk`) VALUES
(20432764, '3104506093', 'camilo@gmail.com', 'calle 34 av 23', 'activo', 'Camilo Puerto Lopez', 24718689);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `idAlimento` int(11) NOT NULL,
  `nombreAlimento` varchar(45) NOT NULL,
  `valorNutricional` int(11) NOT NULL,
  `aminoacidosXporcion` int(11) DEFAULT NULL,
  `caloriasXporcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `docCliente` int(11) NOT NULL,
  `alturaCliente` int(4) NOT NULL,
  `apellidoCliente` varchar(50) NOT NULL,
  `celCliente` varchar(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `pesoCliente` int(4) NOT NULL,
  `entrenadorFk` int(11) DEFAULT NULL,
  `usuarioFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`docCliente`, `alturaCliente`, `apellidoCliente`, `celCliente`, `estado`, `nombreCliente`, `pesoCliente`, `entrenadorFk`, `usuarioFk`) VALUES
(17873900, 120, 'ortiz padilla ', '3114503922', 'activo ', 'fernando jose', 89, 1001001001, 1092927388),
(24718689, 123, 'ortiz padilla', '4098947', 'activo', 'karen', 65, 1001001001, 24718689),
(1029283677, 159, 'ortiz tapiero', '4098927', 'activo', 'santiago david', 67, 1001001001, 1029283677),
(1034245644, 167, 'Montes estrada', '3120039332', 'activo', 'adriana', 69, 123400003, 1034245644),
(1069714619, 165, 'cuesta lara', '3195059837', 'activo', 'estefania', 54, 1001001001, 1069714619),
(1092332323, 165, 'Pereira lopez', '4321121', 'activo', 'Nataly', 54, 1001001001, 1092332323),
(1092927388, 170, 'cortes', '3003912818', 'activo ', 'david', 60, 1001001001, 1092927388);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultaadmin`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultaadmin` (
`docAdministrador` int(11)
,`celAdministrador` varchar(11)
,`correoAdministrador` varchar(50)
,`direcAdministrador` varchar(50)
,`estado` varchar(10)
,`nombreAdministrador` varchar(50)
,`docUsuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultah`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultah` (
`idHistorialClinico` int(11)
,`eps` varchar(45)
,`medicacionesFk` int(11)
,`detalleMedicacion` varchar(450)
,`tipoCirugiaFk` int(11)
,`detalleCirugia` varchar(450)
,`tipoPadecimientoFk` int(11)
,`detallePadecimiento` varchar(450)
,`clienteFk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultalogin`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultalogin` (
`correoUsuario` varchar(50)
,`contrasenaUsuario` varchar(45)
,`nombreTipoUsuario` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarclientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarclientes` (
`docCliente` int(11)
,`nombreCliente` varchar(50)
,`apellidoCliente` varchar(50)
,`estado` varchar(10)
,`alturaCliente` int(4)
,`pesoCliente` int(4)
,`nombreEntrenador` varchar(50)
,`nombreUsuario` varchar(50)
,`celCliente` varchar(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarcontraindicaciones`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarcontraindicaciones` (
`idContraindicaciones` int(11)
,`descricionContraindicaiones` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarentrenadores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarentrenadores` (
`docEntrenador` int(11)
,`celEntrenador` varchar(11)
,`direcEntrenador` varchar(50)
,`estado` varchar(50)
,`nombreEntrenador` varchar(50)
,`nombreUsuario` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarhistorialclinico`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarhistorialclinico` (
`idHistorialClinico` int(11)
,`docCliente` int(11)
,`nombreCliente` varchar(50)
,`apellidoCliente` varchar(50)
,`celCliente` varchar(11)
,`eps` varchar(45)
,`alturaCliente` int(4)
,`pesoCliente` int(4)
,`nombreMedicamentos` varchar(60)
,`detalleMedicacion` varchar(450)
,`nombreTipoCirugia` varchar(60)
,`detalleCirugia` varchar(450)
,`nombreTipoPadecimiento` varchar(60)
,`detallePadecimiento` varchar(450)
,`idMedicamentos` int(11)
,`idTipoCirugia` int(11)
,`idTipoPadecimiento` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarlistaalimento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarlistaalimento` (
`idAlimento` int(11)
,`nombreAlimento` varchar(45)
,`valorNutricional` int(11)
,`aminoacidosXporcion` int(11)
,`caloriasXporcion` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarlistadieta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarlistadieta` (
`idDieta` int(11)
,`fechaInicio` date
,`fechaFin` date
,`diaDieta` varchar(10)
,`planDieta` varchar(45)
,`clienteFk` int(11)
,`entrenadorFk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarlistapartecuerpo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarlistapartecuerpo` (
`idParteCuerpo` int(11)
,`nombreParteCuerpo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarlistaseguimiento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarlistaseguimiento` (
`idSeguimiento` int(11)
,`fechaSeguimiento` timestamp
,`medidas` int(11)
,`clienteFk` int(11)
,`entrenadorFk` int(11)
,`parteCuerpoFk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarproteina`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarproteina` (
`idProteina` int(11)
,`nombreProteina` varchar(50)
,`marcaProteina` varchar(45)
,`usoProteina` varchar(45)
,`nombreCliente` varchar(50)
,`nombreEntrenador` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarrutina`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarrutina` (
`idRutina` int(11)
,`planRutina` varchar(45)
,`intencidadRutina` varchar(45)
,`diaRutina` varchar(45)
,`clienteFk` int(11)
,`entrenadorFk` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultartipoejercicio`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultartipoejercicio` (
`idTipoEjercicios` int(11)
,`nombreEjercicios` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarusuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarusuarios` (
`docUsuario` int(11)
,`celUsuario` varchar(11)
,`contrasenaUsuario` varchar(45)
,`correoUsuario` varchar(50)
,`nombreUsuario` varchar(50)
,`nombreTipoUsuario` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarxidobjetivo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarxidobjetivo` (
`idObjetivo` int(11)
,`nombreCliente` varchar(50)
,`docCliente` int(11)
,`descripcion` varchar(45)
,`fechaInicio` datetime
,`fechaCumplimiento` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contraindicaciones`
--

CREATE TABLE `contraindicaciones` (
  `idContraindicaciones` int(11) NOT NULL,
  `descricionContraindicaiones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dieta`
--

CREATE TABLE `dieta` (
  `idDieta` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `diaDieta` varchar(10) NOT NULL,
  `planDieta` varchar(45) NOT NULL,
  `clienteFk` int(11) DEFAULT NULL,
  `entrenadorFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dieta`
--

INSERT INTO `dieta` (`idDieta`, `fechaInicio`, `fechaFin`, `diaDieta`, `planDieta`, `clienteFk`, `entrenadorFk`) VALUES
(1, '2021-12-07', '2021-12-14', 'miercoles', 'diario', 1092927388, 1001001001),
(2, '2021-12-07', '2021-12-14', 'viernes', 'diario', 1092927388, 1001001001),
(3, '2021-12-07', '2021-12-14', 'martes', 'diario', 1092927388, 1001001001),
(4, '2021-12-09', '2021-12-16', 'martes', 'aumentar muscolatoria', 24718689, 1001001001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietaalimento`
--

CREATE TABLE `dietaalimento` (
  `idDietaAlimento` int(11) NOT NULL,
  `alimentoFk` int(11) DEFAULT NULL,
  `dietaFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `idEjercicio` int(11) NOT NULL,
  `tipoEjercicioFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicioscontraindicaciones`
--

CREATE TABLE `ejercicioscontraindicaciones` (
  `idEjerContra` int(11) NOT NULL,
  `contraindicacionesFk` int(11) DEFAULT NULL,
  `ejerciciosFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `docEntrenador` int(11) NOT NULL,
  `celEntrenador` varchar(11) NOT NULL,
  `direcEntrenador` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `nombreEntrenador` varchar(50) NOT NULL,
  `usuarioFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`docEntrenador`, `celEntrenador`, `direcEntrenador`, `estado`, `nombreEntrenador`, `usuarioFk`) VALUES
(31490089, '3195950827', 'calle 100', 'activo', 'dylan sebastian rojas', 31490089),
(123400003, '3024326712', 'calle 130', 'activo', 'Camilo Andres diaz', 123400003),
(1001001001, '2147483647', 'calle 20#89', 'activo', 'Diana Perez', 1001001001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialclinico`
--

CREATE TABLE `historialclinico` (
  `idHistorialClinico` int(11) NOT NULL,
  `eps` varchar(45) NOT NULL,
  `medicacionesFk` int(11) DEFAULT NULL,
  `detalleMedicacion` varchar(450) DEFAULT NULL,
  `tipoCirugiaFk` int(11) DEFAULT NULL,
  `detalleCirugia` varchar(450) DEFAULT NULL,
  `tipoPadecimientoFk` int(11) DEFAULT NULL,
  `detallePadecimiento` varchar(450) DEFAULT NULL,
  `clienteFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialclinico`
--

INSERT INTO `historialclinico` (`idHistorialClinico`, `eps`, `medicacionesFk`, `detalleMedicacion`, `tipoCirugiaFk`, `detalleCirugia`, `tipoPadecimientoFk`, `detallePadecimiento`, `clienteFk`) VALUES
(1, 'Famisanar', 1, '', 1, '', 1, '', 17873900),
(2, 'sanitas', 1, '', 1, '', 3, '', 24718689),
(3, 'compensar', 6, 'para la tiroides', 3, '', 5, '', 1029283677);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicaciones`
--

CREATE TABLE `medicaciones` (
  `idMedicamentos` int(11) NOT NULL,
  `nombreMedicamentos` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicaciones`
--

INSERT INTO `medicaciones` (`idMedicamentos`, `nombreMedicamentos`) VALUES
(1, 'para la alergia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo`
--

CREATE TABLE `objetivo` (
  `idObjetivo` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fechaCumplimiento` datetime NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `clienteFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `objetivo`
--

INSERT INTO `objetivo` (`idObjetivo`, `descripcion`, `fechaCumplimiento`, `fechaInicio`, `clienteFk`) VALUES
(2, 'Bajar 20 kilos en un mes', '2021-12-16 00:00:00', '2021-12-10 00:00:00', 24718689);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partecuerpo`
--

CREATE TABLE `partecuerpo` (
  `idParteCuerpo` int(11) NOT NULL,
  `nombreParteCuerpo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partecuerpo`
--

INSERT INTO `partecuerpo` (`idParteCuerpo`, `nombreParteCuerpo`) VALUES
(1, 'piernas'),
(2, 'piernas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proteina`
--

CREATE TABLE `proteina` (
  `idProteina` int(11) NOT NULL,
  `nombreProteina` varchar(50) NOT NULL,
  `marcaProteina` varchar(45) DEFAULT NULL,
  `usoProteina` varchar(45) NOT NULL,
  `clienteFk` int(11) DEFAULT NULL,
  `entrenadorFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proteina`
--

INSERT INTO `proteina` (`idProteina`, `nombreProteina`, `marcaProteina`, `usoProteina`, `clienteFk`, `entrenadorFk`) VALUES
(5, 'whet protein isolate', 'whet protein isolate', 'cada dos días, en ayunas', 1029283677, 1001001001),
(7, 'BiPro', 'porBi', 'dos a la semana ', 1029283677, 1001001001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
  `idRutina` int(11) NOT NULL,
  `planRutina` varchar(45) NOT NULL,
  `intencidadRutina` varchar(45) NOT NULL,
  `diaRutina` varchar(45) NOT NULL,
  `clienteFk` int(11) DEFAULT NULL,
  `entrenadorFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`idRutina`, `planRutina`, `intencidadRutina`, `diaRutina`, `clienteFk`, `entrenadorFk`) VALUES
(1, 'Repetir 2 veces a la semana', '30 sentadilla', 'martes 2', 17873900, 1001001001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinaejercicios`
--

CREATE TABLE `rutinaejercicios` (
  `idRutinaEjercicios` int(11) NOT NULL,
  `repeticiones` int(11) NOT NULL,
  `secuencias` int(11) NOT NULL,
  `rutinaFk` int(11) DEFAULT NULL,
  `ejerciciosFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientomedidas`
--

CREATE TABLE `seguimientomedidas` (
  `idSeguimiento` int(11) NOT NULL,
  `fechaSeguimiento` timestamp NOT NULL DEFAULT current_timestamp(),
  `medidas` int(11) NOT NULL,
  `clienteFk` int(11) DEFAULT NULL,
  `entrenadorFk` int(11) DEFAULT NULL,
  `parteCuerpoFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimientomedidas`
--

INSERT INTO `seguimientomedidas` (`idSeguimiento`, `fechaSeguimiento`, `medidas`, `clienteFk`, `entrenadorFk`, `parteCuerpoFk`) VALUES
(3, '2021-12-03 05:00:00', 34, 1092927388, 1001001001, 1),
(4, '2021-12-03 05:00:00', 34, 1092927388, 1001001001, 1),
(5, '2021-12-01 05:00:00', 12, 1092927388, 1001001001, 1),
(6, '2021-12-09 05:00:00', 12, 1092927388, 1001001001, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoaccidentes`
--

CREATE TABLE `tipoaccidentes` (
  `idTipoAccidentes` int(11) NOT NULL,
  `nombreTipoAccidentes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocirugias`
--

CREATE TABLE `tipocirugias` (
  `idTipoCirugia` int(11) NOT NULL,
  `nombreTipoCirugia` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocirugias`
--

INSERT INTO `tipocirugias` (`idTipoCirugia`, `nombreTipoCirugia`) VALUES
(1, 'urgencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoejercicio`
--

CREATE TABLE `tipoejercicio` (
  `idTipoEjercicios` int(11) NOT NULL,
  `nombreEjercicios` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopadecimiento`
--

CREATE TABLE `tipopadecimiento` (
  `idTipoPadecimiento` int(11) NOT NULL,
  `nombreTipoPadecimiento` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopadecimiento`
--

INSERT INTO `tipopadecimiento` (`idTipoPadecimiento`, `nombreTipoPadecimiento`) VALUES
(1, 'hipertension');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombreTipoUsuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `nombreTipoUsuario`) VALUES
(1, 'Administrador'),
(3, 'Cliente'),
(2, 'Entrenador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `docUsuario` int(11) NOT NULL,
  `celUsuario` varchar(11) NOT NULL,
  `contrasenaUsuario` varchar(45) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `tipoUsuarioFk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`docUsuario`, `celUsuario`, `contrasenaUsuario`, `correoUsuario`, `nombreUsuario`, `tipoUsuarioFk`) VALUES
(123344, '3003912810', 'blabla', 'roj@gmail.com', 'roja_13', 1),
(24718689, '3008878466', '891dbdfa53', 'yesipa534111@gmail.com', 'MariaERC1981', 3),
(31490089, '4327823', 'competencia', 'dylan@gmail.com', 'dylanRo45', 1),
(123400003, '3242241222', 'woww', 'camilo122@gmail.com', 'camilo123', 2),
(1001001001, '2147483647', '12345', 'dianaPez@gmail.com', 'DianaPz', 2),
(1001316986, '3195950827', '9b611a7ebf', 'ypestrada68@misena.edu.co', 'Yesica Paola Estrada', 3),
(1029283677, '4098927', '2014**', 'santi@gmail.com', 'santiago4509', 3),
(1034245644, '3012934443', 'hola123', 'adriana@gmail.com', 'Adriana34//', 3),
(1069714619, '3195059837', 'pavaesunpirobo', 'estefania@gmail.com', 'estefania23', 3),
(1092332323, '3002344343', 'martes123', 'naty@gmail.com', 'naty9023**', 3),
(1092927388, '327483647', 'martes', 'cDavid34@gmail.com', 'Cdavid', 3);

-- --------------------------------------------------------

--
-- Estructura para la vista `consultaadmin`
--
DROP TABLE IF EXISTS `consultaadmin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultaadmin`  AS SELECT `administrador`.`docAdministrador` AS `docAdministrador`, `administrador`.`celAdministrador` AS `celAdministrador`, `administrador`.`correoAdministrador` AS `correoAdministrador`, `administrador`.`direcAdministrador` AS `direcAdministrador`, `administrador`.`estado` AS `estado`, `administrador`.`nombreAdministrador` AS `nombreAdministrador`, `usuario`.`docUsuario` AS `docUsuario` FROM (`administrador` join `usuario` on(`administrador`.`usuarioFk` = `usuario`.`docUsuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultah`
--
DROP TABLE IF EXISTS `consultah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultah`  AS SELECT `historialclinico`.`idHistorialClinico` AS `idHistorialClinico`, `historialclinico`.`eps` AS `eps`, `historialclinico`.`medicacionesFk` AS `medicacionesFk`, `historialclinico`.`detalleMedicacion` AS `detalleMedicacion`, `historialclinico`.`tipoCirugiaFk` AS `tipoCirugiaFk`, `historialclinico`.`detalleCirugia` AS `detalleCirugia`, `historialclinico`.`tipoPadecimientoFk` AS `tipoPadecimientoFk`, `historialclinico`.`detallePadecimiento` AS `detallePadecimiento`, `historialclinico`.`clienteFk` AS `clienteFk` FROM `historialclinico` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultalogin`
--
DROP TABLE IF EXISTS `consultalogin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultalogin`  AS SELECT `usuario`.`correoUsuario` AS `correoUsuario`, `usuario`.`contrasenaUsuario` AS `contrasenaUsuario`, `tipousuario`.`nombreTipoUsuario` AS `nombreTipoUsuario` FROM (`usuario` join `tipousuario` on(`usuario`.`tipoUsuarioFk` = `tipousuario`.`idTipoUsuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarclientes`
--
DROP TABLE IF EXISTS `consultarclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarclientes`  AS SELECT `cliente`.`docCliente` AS `docCliente`, `cliente`.`nombreCliente` AS `nombreCliente`, `cliente`.`apellidoCliente` AS `apellidoCliente`, `cliente`.`estado` AS `estado`, `cliente`.`alturaCliente` AS `alturaCliente`, `cliente`.`pesoCliente` AS `pesoCliente`, `entrenador`.`nombreEntrenador` AS `nombreEntrenador`, `usuario`.`nombreUsuario` AS `nombreUsuario`, `cliente`.`celCliente` AS `celCliente` FROM ((`cliente` join `usuario` on(`cliente`.`usuarioFk` = `usuario`.`docUsuario`)) join `entrenador` on(`cliente`.`entrenadorFk` = `entrenador`.`docEntrenador`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarcontraindicaciones`
--
DROP TABLE IF EXISTS `consultarcontraindicaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarcontraindicaciones`  AS SELECT `contraindicaciones`.`idContraindicaciones` AS `idContraindicaciones`, `contraindicaciones`.`descricionContraindicaiones` AS `descricionContraindicaiones` FROM `contraindicaciones` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarentrenadores`
--
DROP TABLE IF EXISTS `consultarentrenadores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarentrenadores`  AS SELECT `entrenador`.`docEntrenador` AS `docEntrenador`, `entrenador`.`celEntrenador` AS `celEntrenador`, `entrenador`.`direcEntrenador` AS `direcEntrenador`, `entrenador`.`estado` AS `estado`, `entrenador`.`nombreEntrenador` AS `nombreEntrenador`, `usuario`.`nombreUsuario` AS `nombreUsuario` FROM (`entrenador` join `usuario` on(`entrenador`.`usuarioFk` = `usuario`.`docUsuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarhistorialclinico`
--
DROP TABLE IF EXISTS `consultarhistorialclinico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarhistorialclinico`  AS SELECT `historialclinico`.`idHistorialClinico` AS `idHistorialClinico`, `cliente`.`docCliente` AS `docCliente`, `cliente`.`nombreCliente` AS `nombreCliente`, `cliente`.`apellidoCliente` AS `apellidoCliente`, `cliente`.`celCliente` AS `celCliente`, `historialclinico`.`eps` AS `eps`, `cliente`.`alturaCliente` AS `alturaCliente`, `cliente`.`pesoCliente` AS `pesoCliente`, `medicaciones`.`nombreMedicamentos` AS `nombreMedicamentos`, `historialclinico`.`detalleMedicacion` AS `detalleMedicacion`, `tipocirugias`.`nombreTipoCirugia` AS `nombreTipoCirugia`, `historialclinico`.`detalleCirugia` AS `detalleCirugia`, `tipopadecimiento`.`nombreTipoPadecimiento` AS `nombreTipoPadecimiento`, `historialclinico`.`detallePadecimiento` AS `detallePadecimiento`, `medicaciones`.`idMedicamentos` AS `idMedicamentos`, `tipocirugias`.`idTipoCirugia` AS `idTipoCirugia`, `tipopadecimiento`.`idTipoPadecimiento` AS `idTipoPadecimiento` FROM ((((`historialclinico` join `cliente` on(`historialclinico`.`clienteFk` = `cliente`.`docCliente`)) join `medicaciones` on(`historialclinico`.`medicacionesFk` = `medicaciones`.`idMedicamentos`)) join `tipocirugias` on(`historialclinico`.`tipoCirugiaFk` = `tipocirugias`.`idTipoCirugia`)) join `tipopadecimiento` on(`historialclinico`.`tipoPadecimientoFk` = `tipopadecimiento`.`idTipoPadecimiento`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarlistaalimento`
--
DROP TABLE IF EXISTS `consultarlistaalimento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistaalimento`  AS SELECT `alimento`.`idAlimento` AS `idAlimento`, `alimento`.`nombreAlimento` AS `nombreAlimento`, `alimento`.`valorNutricional` AS `valorNutricional`, `alimento`.`aminoacidosXporcion` AS `aminoacidosXporcion`, `alimento`.`caloriasXporcion` AS `caloriasXporcion` FROM `alimento` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarlistadieta`
--
DROP TABLE IF EXISTS `consultarlistadieta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistadieta`  AS SELECT `dieta`.`idDieta` AS `idDieta`, `dieta`.`fechaInicio` AS `fechaInicio`, `dieta`.`fechaFin` AS `fechaFin`, `dieta`.`diaDieta` AS `diaDieta`, `dieta`.`planDieta` AS `planDieta`, `dieta`.`clienteFk` AS `clienteFk`, `dieta`.`entrenadorFk` AS `entrenadorFk` FROM `dieta` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarlistapartecuerpo`
--
DROP TABLE IF EXISTS `consultarlistapartecuerpo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistapartecuerpo`  AS SELECT `partecuerpo`.`idParteCuerpo` AS `idParteCuerpo`, `partecuerpo`.`nombreParteCuerpo` AS `nombreParteCuerpo` FROM `partecuerpo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarlistaseguimiento`
--
DROP TABLE IF EXISTS `consultarlistaseguimiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistaseguimiento`  AS SELECT `seguimientomedidas`.`idSeguimiento` AS `idSeguimiento`, `seguimientomedidas`.`fechaSeguimiento` AS `fechaSeguimiento`, `seguimientomedidas`.`medidas` AS `medidas`, `seguimientomedidas`.`clienteFk` AS `clienteFk`, `seguimientomedidas`.`entrenadorFk` AS `entrenadorFk`, `seguimientomedidas`.`parteCuerpoFk` AS `parteCuerpoFk` FROM `seguimientomedidas` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarproteina`
--
DROP TABLE IF EXISTS `consultarproteina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarproteina`  AS SELECT `proteina`.`idProteina` AS `idProteina`, `proteina`.`nombreProteina` AS `nombreProteina`, `proteina`.`marcaProteina` AS `marcaProteina`, `proteina`.`usoProteina` AS `usoProteina`, `cliente`.`nombreCliente` AS `nombreCliente`, `entrenador`.`nombreEntrenador` AS `nombreEntrenador` FROM ((`proteina` join `cliente` on(`proteina`.`clienteFk` = `cliente`.`docCliente`)) join `entrenador` on(`proteina`.`entrenadorFk` = `entrenador`.`docEntrenador`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarrutina`
--
DROP TABLE IF EXISTS `consultarrutina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarrutina`  AS SELECT `rutina`.`idRutina` AS `idRutina`, `rutina`.`planRutina` AS `planRutina`, `rutina`.`intencidadRutina` AS `intencidadRutina`, `rutina`.`diaRutina` AS `diaRutina`, `rutina`.`clienteFk` AS `clienteFk`, `rutina`.`entrenadorFk` AS `entrenadorFk` FROM `rutina` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultartipoejercicio`
--
DROP TABLE IF EXISTS `consultartipoejercicio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultartipoejercicio`  AS SELECT `tipoejercicio`.`idTipoEjercicios` AS `idTipoEjercicios`, `tipoejercicio`.`nombreEjercicios` AS `nombreEjercicios` FROM `tipoejercicio` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarusuarios`
--
DROP TABLE IF EXISTS `consultarusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarusuarios`  AS SELECT `usuario`.`docUsuario` AS `docUsuario`, `usuario`.`celUsuario` AS `celUsuario`, `usuario`.`contrasenaUsuario` AS `contrasenaUsuario`, `usuario`.`correoUsuario` AS `correoUsuario`, `usuario`.`nombreUsuario` AS `nombreUsuario`, `tipousuario`.`nombreTipoUsuario` AS `nombreTipoUsuario` FROM (`usuario` join `tipousuario` on(`usuario`.`tipoUsuarioFk` = `tipousuario`.`idTipoUsuario`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarxidobjetivo`
--
DROP TABLE IF EXISTS `consultarxidobjetivo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarxidobjetivo`  AS SELECT `objetivo`.`idObjetivo` AS `idObjetivo`, `cliente`.`nombreCliente` AS `nombreCliente`, `cliente`.`docCliente` AS `docCliente`, `objetivo`.`descripcion` AS `descripcion`, `objetivo`.`fechaInicio` AS `fechaInicio`, `objetivo`.`fechaCumplimiento` AS `fechaCumplimiento` FROM (`objetivo` join `cliente` on(`objetivo`.`clienteFk` = `cliente`.`docCliente`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`docAdministrador`),
  ADD KEY `usuarioFk` (`usuarioFk`);

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`idAlimento`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`docCliente`),
  ADD KEY `entrenadorFk` (`entrenadorFk`),
  ADD KEY `usuarioFk` (`usuarioFk`);

--
-- Indices de la tabla `contraindicaciones`
--
ALTER TABLE `contraindicaciones`
  ADD PRIMARY KEY (`idContraindicaciones`);

--
-- Indices de la tabla `dieta`
--
ALTER TABLE `dieta`
  ADD PRIMARY KEY (`idDieta`),
  ADD KEY `clienteFk` (`clienteFk`),
  ADD KEY `entrenadorFk` (`entrenadorFk`);

--
-- Indices de la tabla `dietaalimento`
--
ALTER TABLE `dietaalimento`
  ADD PRIMARY KEY (`idDietaAlimento`),
  ADD KEY `alimentoFk` (`alimentoFk`),
  ADD KEY `dietaFk` (`dietaFk`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`idEjercicio`),
  ADD KEY `tipoEjercicioFk` (`tipoEjercicioFk`);

--
-- Indices de la tabla `ejercicioscontraindicaciones`
--
ALTER TABLE `ejercicioscontraindicaciones`
  ADD PRIMARY KEY (`idEjerContra`),
  ADD KEY `contraindicacionesFk` (`contraindicacionesFk`),
  ADD KEY `ejerciciosFk` (`ejerciciosFk`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`docEntrenador`),
  ADD KEY `usuarioFk` (`usuarioFk`);

--
-- Indices de la tabla `historialclinico`
--
ALTER TABLE `historialclinico`
  ADD PRIMARY KEY (`idHistorialClinico`);

--
-- Indices de la tabla `medicaciones`
--
ALTER TABLE `medicaciones`
  ADD PRIMARY KEY (`idMedicamentos`);

--
-- Indices de la tabla `objetivo`
--
ALTER TABLE `objetivo`
  ADD PRIMARY KEY (`idObjetivo`),
  ADD KEY `clienteFk` (`clienteFk`);

--
-- Indices de la tabla `partecuerpo`
--
ALTER TABLE `partecuerpo`
  ADD PRIMARY KEY (`idParteCuerpo`);

--
-- Indices de la tabla `proteina`
--
ALTER TABLE `proteina`
  ADD PRIMARY KEY (`idProteina`),
  ADD KEY `clienteFk` (`clienteFk`),
  ADD KEY `entrenadorFk` (`entrenadorFk`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD PRIMARY KEY (`idRutina`),
  ADD KEY `clienteFk` (`clienteFk`),
  ADD KEY `entrenadorFk` (`entrenadorFk`);

--
-- Indices de la tabla `rutinaejercicios`
--
ALTER TABLE `rutinaejercicios`
  ADD PRIMARY KEY (`idRutinaEjercicios`),
  ADD KEY `rutinaFk` (`rutinaFk`);

--
-- Indices de la tabla `seguimientomedidas`
--
ALTER TABLE `seguimientomedidas`
  ADD PRIMARY KEY (`idSeguimiento`),
  ADD KEY `clienteFk` (`clienteFk`),
  ADD KEY `entrenadorFk` (`entrenadorFk`),
  ADD KEY `parteCuerpoFk` (`parteCuerpoFk`);

--
-- Indices de la tabla `tipoaccidentes`
--
ALTER TABLE `tipoaccidentes`
  ADD PRIMARY KEY (`idTipoAccidentes`);

--
-- Indices de la tabla `tipocirugias`
--
ALTER TABLE `tipocirugias`
  ADD PRIMARY KEY (`idTipoCirugia`);

--
-- Indices de la tabla `tipoejercicio`
--
ALTER TABLE `tipoejercicio`
  ADD PRIMARY KEY (`idTipoEjercicios`);

--
-- Indices de la tabla `tipopadecimiento`
--
ALTER TABLE `tipopadecimiento`
  ADD PRIMARY KEY (`idTipoPadecimiento`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`),
  ADD UNIQUE KEY `nombreTipoUsuario` (`nombreTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`docUsuario`),
  ADD UNIQUE KEY `correoUsuario` (`correoUsuario`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`),
  ADD UNIQUE KEY `docUsuario` (`docUsuario`),
  ADD UNIQUE KEY `docUsuario_2` (`docUsuario`),
  ADD KEY `tipoUsuarioFk` (`tipoUsuarioFk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimento`
--
ALTER TABLE `alimento`
  MODIFY `idAlimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contraindicaciones`
--
ALTER TABLE `contraindicaciones`
  MODIFY `idContraindicaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dieta`
--
ALTER TABLE `dieta`
  MODIFY `idDieta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dietaalimento`
--
ALTER TABLE `dietaalimento`
  MODIFY `idDietaAlimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `idEjercicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicioscontraindicaciones`
--
ALTER TABLE `ejercicioscontraindicaciones`
  MODIFY `idEjerContra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialclinico`
--
ALTER TABLE `historialclinico`
  MODIFY `idHistorialClinico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medicaciones`
--
ALTER TABLE `medicaciones`
  MODIFY `idMedicamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `objetivo`
--
ALTER TABLE `objetivo`
  MODIFY `idObjetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `partecuerpo`
--
ALTER TABLE `partecuerpo`
  MODIFY `idParteCuerpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proteina`
--
ALTER TABLE `proteina`
  MODIFY `idProteina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
  MODIFY `idRutina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rutinaejercicios`
--
ALTER TABLE `rutinaejercicios`
  MODIFY `idRutinaEjercicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimientomedidas`
--
ALTER TABLE `seguimientomedidas`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipoaccidentes`
--
ALTER TABLE `tipoaccidentes`
  MODIFY `idTipoAccidentes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipocirugias`
--
ALTER TABLE `tipocirugias`
  MODIFY `idTipoCirugia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipoejercicio`
--
ALTER TABLE `tipoejercicio`
  MODIFY `idTipoEjercicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipopadecimiento`
--
ALTER TABLE `tipopadecimiento`
  MODIFY `idTipoPadecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`usuarioFk`) REFERENCES `usuario` (`docUsuario`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`entrenadorFk`) REFERENCES `entrenador` (`docEntrenador`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`usuarioFk`) REFERENCES `usuario` (`docUsuario`);

--
-- Filtros para la tabla `dieta`
--
ALTER TABLE `dieta`
  ADD CONSTRAINT `dieta_ibfk_1` FOREIGN KEY (`clienteFk`) REFERENCES `cliente` (`docCliente`),
  ADD CONSTRAINT `dieta_ibfk_2` FOREIGN KEY (`entrenadorFk`) REFERENCES `entrenador` (`docEntrenador`);

--
-- Filtros para la tabla `dietaalimento`
--
ALTER TABLE `dietaalimento`
  ADD CONSTRAINT `dietaalimento_ibfk_1` FOREIGN KEY (`alimentoFk`) REFERENCES `alimento` (`idAlimento`),
  ADD CONSTRAINT `dietaalimento_ibfk_2` FOREIGN KEY (`dietaFk`) REFERENCES `dieta` (`idDieta`);

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`tipoEjercicioFk`) REFERENCES `tipoejercicio` (`idTipoEjercicios`);

--
-- Filtros para la tabla `ejercicioscontraindicaciones`
--
ALTER TABLE `ejercicioscontraindicaciones`
  ADD CONSTRAINT `ejercicioscontraindicaciones_ibfk_1` FOREIGN KEY (`contraindicacionesFk`) REFERENCES `contraindicaciones` (`idContraindicaciones`),
  ADD CONSTRAINT `ejercicioscontraindicaciones_ibfk_2` FOREIGN KEY (`ejerciciosFk`) REFERENCES `ejercicios` (`idEjercicio`);

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`usuarioFk`) REFERENCES `usuario` (`docUsuario`);

--
-- Filtros para la tabla `objetivo`
--
ALTER TABLE `objetivo`
  ADD CONSTRAINT `objetivo_ibfk_1` FOREIGN KEY (`clienteFk`) REFERENCES `cliente` (`docCliente`);

--
-- Filtros para la tabla `proteina`
--
ALTER TABLE `proteina`
  ADD CONSTRAINT `proteina_ibfk_1` FOREIGN KEY (`clienteFk`) REFERENCES `cliente` (`docCliente`),
  ADD CONSTRAINT `proteina_ibfk_2` FOREIGN KEY (`entrenadorFk`) REFERENCES `entrenador` (`docEntrenador`);

--
-- Filtros para la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD CONSTRAINT `rutina_ibfk_1` FOREIGN KEY (`clienteFk`) REFERENCES `cliente` (`docCliente`),
  ADD CONSTRAINT `rutina_ibfk_2` FOREIGN KEY (`entrenadorFk`) REFERENCES `entrenador` (`docEntrenador`);

--
-- Filtros para la tabla `rutinaejercicios`
--
ALTER TABLE `rutinaejercicios`
  ADD CONSTRAINT `rutinaejercicios_ibfk_1` FOREIGN KEY (`rutinaFk`) REFERENCES `rutina` (`idRutina`),
  ADD CONSTRAINT `rutinaejercicios_ibfk_2` FOREIGN KEY (`rutinaFk`) REFERENCES `ejercicios` (`idEjercicio`);

--
-- Filtros para la tabla `seguimientomedidas`
--
ALTER TABLE `seguimientomedidas`
  ADD CONSTRAINT `seguimientomedidas_ibfk_1` FOREIGN KEY (`clienteFk`) REFERENCES `cliente` (`docCliente`),
  ADD CONSTRAINT `seguimientomedidas_ibfk_2` FOREIGN KEY (`entrenadorFk`) REFERENCES `entrenador` (`docEntrenador`),
  ADD CONSTRAINT `seguimientomedidas_ibfk_3` FOREIGN KEY (`parteCuerpoFk`) REFERENCES `partecuerpo` (`idParteCuerpo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipoUsuarioFk`) REFERENCES `tipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
