create view consultarUsuarios
as
select usuario.docUsuario, usuario.celUsuario, usuario.contrasenaUsuario, usuario.correoUsuario, usuario.nombreUsuario, tipousuario.nombreTipoUsuario from usuario
inner join tipousuario
on usuario.tipoUsuarioFk = tipousuario.idTipoUsuario;
select * from consultarUsuarios;

create view consultaLogin
as
select usuario.correoUsuario, usuario.contrasenaUsuario, tipousuario.nombreTipoUsuario from usuario 
inner join tipousuario
on usuario.tipoUsuarioFk = tipousuario.idTipoUsuario;
SELECT * FROM consultaLogin;

SELECT nombreUsuario, contrasenaUsuario from usuario WHERE nombreUsuario = "MariaERC1981" and contrasenaUsuario = "actualizaClave";
select * from consultalogin where nombreUsuario = "MariaERC1981"and contrasenaUsuario = "actualizaClave";

select nombreUsuario, nombreUsuario, nombreTipoUsuario from consultalogin WHERE nombreUsuario = "MariaERC1981" and contrasenaUsuario = "actualizaClave";

select * from tipousuario;
DELIMITER $$
create procedure insertarUsuario
(
	in _docUsuario int(11), 
    in _celUsuario varchar(11), 
    in _contrasenaUsuario varchar(45), 
    in _correoUsuario varchar(50), 
    in _nombreUsuario varchar(50),
    in _tipoUsuarioFk int
)
begin
	insert into usuario values(_docUsuario, _celUsuario, _contrasenaUsuario, _correoUsuario, _nombreUsuario, _tipoUsuarioFk);
END$$
DELIMITER ;
CALL insertarUsuario (24718680,3008878466, 'bienvenidos','helena@gmail.com','MariaEricil98',  1); 

DELIMITER $$
CREATE PROCEDURE actualizarUsuario
(
	in _docUsuario int(11), 
    in _celUsuario varchar(11), 
    in _contrasenaUsuario varchar(45), 
    in _correoUsuario varchar(50), 
    in _nombreUsuario varchar(50),
    in _tipoUsuarioFk int
)
BEGIN
	UPDATE usuario SET
        celUsuario = _celUsuario, 
        contrasenaUsuario = _contrasenaUsuario, 
        correoUsuario = _correoUsuario,
        nombreUsuario = _nombreUsuario,
        tipoUsuarioFk = _tipoUsuarioFk
	where docUsuario = _docUsuario;
END$$
DELIMITER ;
CALL actualizarUsuario (24718680,3219876543, 'bienvenidos','helena@gmail.com','HelenaPer23',  1); 


CALL actualizarUsuario(24718689, 3008878466, 'actualizaClave', 'mari@gmail.com', 'MariaERC1981', 1);
CALL actualizarUsuario(3009229,3002922392, 'sera', 'taMon@gmail.com', 'TatianaMontes',3);
DELIMITER $$

SELECT * FROM usuario WHERE docUsuario = 24718689;

DELIMITER $$
CREATE PROCEDURE eliminarUsuario
(
	in _docUsuario INT
)
BEGIN
	DELETE FROM usuario WHERE docUsuario = _docUsuario;
END$$
DELIMITER ;
CALL eliminarUsuario(24718680);

-- cliente--

	create view consultarClientes
	as
	select cliente.docCliente, cliente.nombreCliente, cliente.apellidoCliente, cliente.estado, cliente.alturaCliente, cliente.pesoCliente, entrenador.nombreEntrenador, usuario.nombreUsuario, cliente.celCliente from cliente
	inner join usuario
	on cliente.usuarioFk = usuario.docUsuario
	inner join entrenador
	on cliente.entrenadorFk = entrenador.docEntrenador;
	select * from consultarClientes;
DELIMITER $$
create procedure insertarCliente
(
	in _docCliente int(11), 
    in _alturaCliente int(4), 
    in _apellidoCliente varchar(50),
    in _celCliente varchar(11),
    in _estado varchar(10), 
    in _nombreCliente varchar(50), 
    in _pesoCliente int(4), 
    in _entrenadorFk int, 
    in _usuarioFk int
)
begin
	insert into cliente values(_docCliente, _alturaCliente, _apellidoCliente, _celCliente, _estado, _nombreCliente, _pesoCliente, _entrenadorFk, _usuarioFk);
END$$
DELIMITER ;
CALL insertarCliente(1029283677, 159, 'ortiz tapiero', 4098927, 'activo', 'santiago', 67, 1001001001, 1092927388);

CALL insertarCliente(1190898999,165,'cuesta lara',3003912818,'activo','estefania', 54,1001001001,1190898999);
CALL insertarCliente(17873900,176,'ortiz padilla',3114503922,'activo','fernando jose',89,1001001001,1092927388);

DELIMITER $$
CREATE PROCEDURE actualizarCliente
(
	in _docCliente int(11), 
    in _alturaCliente int(4), 
    in _apellidoCliente varchar(50),
    in _celCliente varchar(11),
    in _estado varchar(10), 
    in _nombreCliente varchar(50), 
    in _pesoCliente int(4), 
    in _entrenadorFk int, 
    in _usuarioFk int
)
BEGIN
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
DELIMITER ;
CALL actualizarCliente(1029283677,159,'ortiz tapiero',4098927,'activo','santiago david',67,1001001001,1029283677);


DELIMITER $$
create procedure eliminarCliente
(
	in _docCliente int
)
BEGIN 
	DELETE FROM cliente WHERE docCliente = _docCliente;
END$$
DELIMITER ;

-- Administrador  
create view consultaAdmin
AS
select administrador.docAdministrador, administrador.celAdministrador, administrador.correoAdministrador, administrador.direcAdministrador, administrador.estado, 
administrador.nombreAdministrador, usuario.docUsuario from administrador
inner join usuario
on administrador.usuarioFk = usuario.docUsuario;
select * from consultaAdmin;

DELIMITER $$
create procedure insertarAdmin 
(
	in _docAdministrador int(11),
	in _celAdministrador varchar(11),
	in _correoAdministrador varchar(50),
	in _direcAdministrador varchar(50),
	in _estado varchar(10),
	in _nombreAdministrador varchar(50),
	in _usuarioFk int
)
BEGIN 
	INSERT INTO administrador values( _docAdministrador, _celAdministrador, _correoAdministrador, _direcAdministrador, _estado, _nombreAdministrador,
    _usuarioFk);
END $$
DELIMITER ;
CALL insertarAdmin(20432764, 3104506093, 'camilo@gmail.com', 'calle 34 av 23', 'activo', 'Camilo Puerto Lopez', 24718689);

DELIMITER $$
create procedure actualizarAdmin
(
	in _docAdministrador int(11),
	in _celAdministrador varchar(11),
	in _correoAdministrador varchar(50),
	in _direcAdministrador varchar(50),
	in _estado varchar(10),
	in _nombreAdministrador varchar(50),
	in _usuarioFk int
)
BEGIN 
	UPDATE administrador SET
		celAdministrador = _celAdministrador, 
        correoAdministrador = _correoAdministrador,
        direcAdministrador = _direcAdministrador,
        estado = _estado, 
        nombreAdministrador = _nombreAdministrador, 
        usuarioFk = _usuarioFk
	where docAdministrador = _docAdministrador;
END $$
DELIMITER ;
CALL actualizarAdmin(20432764, 3104506093, 'camiloPlop@gmail.com', 'calle 12 av 23', 'activo', 'Camillo Puerto Lopez', 20432764);


select * from usuario where tipoUsuarioFk = 1;

-- entrenador --
create view consultarEntrenadores
as
select entrenador.docEntrenador, entrenador.celEntrenador, entrenador.direcEntrenador, entrenador.estado, entrenador.nombreEntrenador, usuario.nombreUsuario from entrenador
inner join usuario
on entrenador.usuarioFk = usuario.docUsuario;
select * from consultarEntrenadores;
drop view consultarEntrenadores;
DELIMITER $$
create procedure insertarEntrenador
(
	in _docEntrenador int(11),
    in _celEntrenador varchar(11), 
    in _direcEntrenador varchar(50),
    in _estado varchar(50),
    in _nombreEntrenador varchar(50), 
	in _usuarioFk int
)
begin
	insert into entrenador values(_docEntrenador,_celEntrenador, _direcEntrenador,_estado,_nombreEntrenador,_usuarioFk);
END$$
DELIMITER ;
CALL insertarEntrenador(20432764,3209182929,'carrera 100', 'activo', 'camilo andres escobar ortiz', 20432764);
select * from entrenador;
DELIMITER $$
CREATE PROCEDURE actualizarEntrenador
(
	in _docEntrenador int(11),
	in _celEntrenador varchar(11), 
	in _direcEntrenador varchar(50), 
	in _estado varchar(50),
	in _nombreEntrenador varchar(50), 
	in _usuarioFk int
)
BEGIN 
	UPDATE entrenador SET 
		celEntrenador = _celEntrenador, 
		direcEntrenador = _direcEntrenador, 
		estado = _estado,
		nombreEntrenador = _nombreEntrenador, 
		usuarioFk = _usuarioFk
	where docEntrenador = _docEntrenador;
END$$
DELIMITER ;
CALL actualizarEntrenador(20432764, 6690827, 'calle 100', 'Activo', 'camilo andres escobar ortiz', '20432764');


DELIMITER $$
CREATE PROCEDURE eliminarEntrenador
(
	in _docEntrenador int
)
BEGIN 
	DELETE FROM entrenador WHERE docEntrenador = _docEntrenador;
END$$
DELIMITER ;
CALL eliminarEntrenador(20432764);

-- proteina --
create view consultarProteina
as
select proteina.idProteina, proteina.nombreProteina, proteina.marcaProteina, proteina.usoProteina, cliente.nombreCliente, entrenador.nombreEntrenador
from proteina
inner join cliente
on proteina.clienteFk = cliente.docCliente
inner join entrenador 
on proteina.entrenadorFk = entrenador.docEntrenador;
select * from consultarProteina;

DELIMITER $$
create procedure insertarProteina
(
	in _nombreProteina varchar(50),
	in _marcaProteina varchar(45),
	in _usoProteina varchar(45),
	in _clienteFk int(11),
	in _entrenadorFk int(11)
)
BEGIN 
	insert into proteina value(null, _nombreProteina, _marcaProteina, _usoProteina,_clienteFk,_entrenadorFk);
END$$
DELIMITER ;
CALL insertarProteina('ByPro', 'naturalma', '1 cda, cada 8 horas y antes de ejericio', 1190898999, 1001001001);

DELIMITER $$
CREATE PROCEDURE actualizarProteina
(
	in _idProteina int(11),
	in _nombreProteina varchar(50),
	in _marcaProteina varchar(45),
	in _usoProteina varchar(45),
	in _clienteFk int(11),
	in _entrenadorFk int(11)
)
BEGIN 
	UPDATE proteina SET
		nombreProteina = _nombreProteina,
        marcaProteina = _marcaProteina,
        usoProteina = _usoProteina, 
        clienteFk = _clienteFk,
        entrenadorFk = _entrenadorFk
	WHERE idProteina = _idProteina;
END$$
DELIMITER ;
CALL actualizarProteina(1,'BiPro', 'proteMax', '1 cda, cada 10 horas y despues de ejericio', 1190898999, 1001001001);

DELIMITER $$
CREATE PROCEDURE eliminarProteina
(
	in _idProteina int(11)
)
BEGIN 
	DELETE FROM proteina WHERE idProteina = _idProteina;
END$$
DELIMITER ;
CALL eliminarProteina(1);

select idTipoUsuario, nombreTipoUsuario from tipousuario;
select docUsuario, nombreUsuario from usuario;
select docEntrenador, nombreEntrenador from entrenador;
select docCliente, nombreCliente, apellidoCliente from cliente;
select * from proteina;
select * from tipousuario;
delete from entrenador where docEntrenador=31490089;
select * from usuario;


create view consultaH
as
select * from historialclinico;

select * from consultaH;

-- seguimiento medida --
DELIMITER $$
CREATE PROCEDURE insertarSeguimientoM(
    in _idSeguimiento INT(11),
    in _fechaSeguimiento Date,
    in _medidas INT(11),
    in _clientesFK INT(11),
    in _entrenadorFk INT(11),
    in _parteCuerpoFk INT(11)
    
)
begin 
	INSERT INTO seguimientomedidas VALUES(_idSeguimiento, _fechaSeguimiento, _medidas, _clientesFK, _entrenadorFk, _parteCuerpoFk);
    END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarSeguimientoM(
	in _idSeguimiento int(11), 
    in _fechaSeguimiento  Date, 
    in _medidas int(11), 
    in _clienteFk int(11), 
    in _entrenadorFk int(11),
    in _ParteCuerpoFk int(11)
   
)
BEGIN
	UPDATE seguimientomedidas SET
        fechaSeguimiento = _fechaSeguimiento, 
        medidas = _medidas, 
        clienteFk = _clienteFk,
        entrenadorFk = _entrenadorFk,
        ParteCuerpoFk = _ParteCuerpoFk
       
	where idSeguimiento = _idSeguimiento;
    
END$$

DELIMITER $$
CREATE PROCEDURE eliminarSeguimiento(
	in _idSeguimiento INT
)
BEGIN
	DELETE FROM seguimientomedidas WHERE idSeguimiento = _idSeguimiento;
END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistaseguimiento`  AS SELECT `seguimientomedidas`.`idSeguimiento` AS `idSeguimiento`, `seguimientomedidas`.`fechaSeguimiento` AS `fechaSeguimiento`, `seguimientomedidas`.`medidas` AS `medidas`, `seguimientomedidas`.`clienteFk` AS `clienteFk`, `seguimientomedidas`.`entrenadorFk` AS `entrenadorFk`, `seguimientomedidas`.`parteCuerpoFk` AS `parteCuerpoFk` FROM `seguimientomedidas` ;
select *  from consultarlistaseguimiento;
create view consultarlistaseguimiento
as
SELECT `seguimientomedidas`.`idSeguimiento` AS `idSeguimiento`, `seguimientomedidas`.`fechaSeguimiento` AS `fechaSeguimiento`, `seguimientomedidas`.`medidas` 
AS `medidas`, `seguimientomedidas`.`clienteFk` AS `clienteFk`, `seguimientomedidas`.`entrenadorFk` AS `entrenadorFk`, `seguimientomedidas`.`parteCuerpoFk` AS `parteCuerpoFk` FROM `seguimientomedidas` ;
drop view consultarlistaseguimiento;

insert into seguimientomedidas values(null, '2021-02-22', 34, 1092927388,1092927388,2);
insert into partecuerpo values(null, 'piernas');
select * from partecuerpo;

-- dieta --
DELIMITER $$
CREATE PROCEDURE insertarDieta(
    in _idDieta INT(11),
    in _fechaInicio Date,
    in _fechaFin Date,
    in _diaDieta VARCHAR(10),
    in _planDieta VARCHAR(45),
    in _clienteFK INT(11),
    in _entrenadorFk INT(11)
    
    
)
begin 
	INSERT INTO dieta VALUES(_idDieta, _fechaInicio, _fechaFin, _diaDieta, _planDieta, _clienteFK, _entrenadorFk);
    END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarDieta(
in _idDieta int(11),
    in _fechaInicio date,
    in _fechaFin date,
    in _diaDieta VARCHAR(10),
    in _planDieta Varchar(45),
    in _clienteFk int(11),
    in _entrenadorFk int(11)
)
BEGIN
update dieta SET
	fechaInicio = _fechaInicio,
    fechaFin = _fechaFin,
    diaDieta = _diaDieta,
    planDieta = _planDieta,
    clienteFk = _clienteFk,
    entrenadorFk = _entrenadorFk
    
    where idDieta = _idDieta;
    
 END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE eliminarDieta(
	in _idDieta INT(11)
)
BEGIN 
	DELETE FROM dieta where idDieta = _idDieta;
    END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistadieta`  AS SELECT `dieta`.`idDieta` AS `idDieta`, `dieta`.`fechaInicio` AS `fechaInicio`, `dieta`.`fechaFin` AS `fechaFin`, `dieta`.`diaDieta` AS `diaDieta`, `dieta`.`planDieta` AS `planDieta`, `dieta`.`clienteFk` AS `clienteFk`, `dieta`.`entrenadorFk` AS `entrenadorFk` FROM `dieta` ;
select * from consultarlistadieta;
drop view consultarlistadieta;
create view consultarlistadieta
as
SELECT `dieta`.`idDieta` AS `idDieta`, `dieta`.`fechaInicio` AS `fechaInicio`, `dieta`.`fechaFin` AS `fechaFin`, `dieta`.`diaDieta` AS `diaDieta`, 
`dieta`.`planDieta` AS `planDieta`, `dieta`.`clienteFk` AS `clienteFk`, `dieta`.`entrenadorFk` AS `entrenadorFk` FROM `dieta` ;


-- parte cuerpo --
DELIMITER $$
CREATE PROCEDURE insertarParteCuerpo(
in _nombreParteCuerpo varchar(50)
)
BEGIN
INSERT into partecuerpo values(null, _nombreParteCuerpo);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarParteCuerpo(
in _idParteCuerpo int(11),
in _nombreParteCuerpo varchar(50)
)
BEGIN
UPDATE partecuerpo SET
nombreParteCuerpo = _nombreParteCuerpo
where idParteCuerpo = _idParteCuerpo;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE eliminarParteCuerpo(

in _IdParteCuerpo INT
)
BEGIN
DELETE FROM partecuerpo WHERE idParteCuerpo = _idParteCuerpo;
END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistapartecuerpo`  AS SELECT `partecuerpo`.`idParteCuerpo` AS `idParteCuerpo`, `partecuerpo`.`nombreParteCuerpo` AS `nombreParteCuerpo` FROM `partecuerpo` ;

create view consultarlistapartecuerpo
as
SELECT `partecuerpo`.`idParteCuerpo` AS `idParteCuerpo`, `partecuerpo`.`nombreParteCuerpo` AS `nombreParteCuerpo` FROM `partecuerpo` ;
drop view consultarlistapartecuerpo;
select * from consultarlistapartecuerpo;


-- alimento --
DELIMITER $$
CREATE PROCEDURE insertarAlimento(
in _nombreAlimento varchar(45),
in _valorNutricional int,
in _aminoacidosXporcion int,
in _caloriaXporcion int 
)
BEGIN
INSERT INTO alimento values(null, _nombreAlimento, _valorNutricional, _aminoacidosXporcion, _caloriaXporcion);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarAlimento(
	in _idAlimento int(11), 
    in _nombreAlimento  varchar(11), 
    in _valorNutricional varchar(45), 
    in _aminoacidosXporcion varchar(50), 
    in _caloriasXporcion varchar(50)
   
)
BEGIN
	UPDATE alimento SET
        nombreAlimento = _nombreAlimento, 
        valorNutricional = _valorNutricional, 
        aminoacidosXporcion = _aminoacidosXporcion,
        caloriasXporcion = _caloriasXporcion
       
	where idAlimento = _idAlimento;
    
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE eliminarAlimento(
	in _idAlimento INT
)
BEGIN
	DELETE FROM alimento WHERE idAlimento = _idAlimento;
END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarlistaalimento`  AS SELECT `alimento`.`idAlimento` AS `idAlimento`, `alimento`.`nombreAlimento` AS `nombreAlimento`, `alimento`.`valorNutricional` AS `valorNutricional`, `alimento`.`aminoacidosXporcion` AS `aminoacidosXporcion`, `alimento`.`caloriasXporcion` AS `caloriasXporcion` FROM `alimento` ;

create view consultarlistaalimento
AS 
SELECT `alimento`.`idAlimento` AS `idAlimento`, `alimento`.`nombreAlimento` AS `nombreAlimento`, `alimento`.`valorNutricional` AS `valorNutricional`, 
`alimento`.`aminoacidosXporcion` AS `aminoacidosXporcion`, `alimento`.`caloriasXporcion` AS `caloriasXporcion` FROM `alimento` ;

select * from consultarlistaalimento;
-- rutina --
DELIMITER $$
CREATE PROCEDURE insertarRutina(
	in _idRutina int(11),
    in _planRutina VARCHAR (45),
    in _intencidadRutina VARCHAR (45),
    in _diaRutinafk VARCHAR (45),
    in _clienteFk int(11),
    in _entrenadorFk int(11)
    
)
BEGIN 
	INSERT INTO rutina values(_idRutina, _planRutina, _intencidadRutina, _diaRutinafk, _clienteFk, _entrenadorFk );
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarRutina(
in _idRutina int(11),
    in _planRutina varchar (45),
    in _intencidadRutina varchar (45),
    in _diaRutina VARCHAR (10),
    in _clienteFk int(11),
    in _entrenadorFk int(11)
)
BEGIN
update rutina SET
	planRutina = _planRutina,
    intencidadRutina = _intencidadRutina,
    diaRutina = _diaRutina,
    clienteFk = _clienteFk,
    entrenadorFk = _entrenadorFk
    
    where idRutina = _idRutina;
    
 END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE eliminarRutina(
	in _idRutina INT
)
BEGIN
	DELETE FROM rutina WHERE idRutina = _idRutina;
END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarrutina`  AS SELECT `rutina`.`idRutina` AS `idRutina`, `rutina`.`planRutina` AS `planRutina`, `rutina`.`intencidadRutina` AS `intencidadRutina`, `rutina`.`diaRutina` AS `diaRutina`, `rutina`.`clienteFk` AS `clienteFk`, `rutina`.`entrenadorFk` AS `entrenadorFk` FROM `rutina` ;

create view consultarrutina
AS SELECT `rutina`.`idRutina` AS `idRutina`, `rutina`.`planRutina` AS `planRutina`, `rutina`.`intencidadRutina` AS `intencidadRutina`, 
`rutina`.`diaRutina` AS `diaRutina`, `rutina`.`clienteFk` AS `clienteFk`, `rutina`.`entrenadorFk` AS `entrenadorFk` FROM `rutina` ;
drop view consultarrutina;
select * from consultarrutina;

-- ejercicios --
DELIMITER $$
CREATE PROCEDURE insertarEjercicios(
	in _idEjercicio int(11),
    in _tipoEjercicioFk VARCHAR (45)
)
BEGIN 
	INSERT INTO ejercicios values(_idEjercicio, _tipoEjercicioFk);
END$$
DELIMITER ;

-- tipo ejercicio --
DELIMITER $$
CREATE PROCEDURE insertartipoejercicio(
	in _idTipoEjercicios int(11),
    in _nombreEjercicios VARCHAR (45)
)
BEGIN 
	INSERT INTO tipoejercicio values(_idTipoEjercicios, _nombreEjercicios);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarTipoEjercicio(
	in _idTipoEjercicios int(11), 
	in _nombreEjercicios varchar (45)
)
BEGIN 
UPDATE tipoejercicio SET 
	nombreEjercicios = _nombreEjercicios 
    WHERE idTipoEjercicios =  _idTipoEjercicios;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE eliminarTipoejercicio(
	in _idTipoejercicios INT
)
BEGIN
	DELETE FROM tipoejercicio WHERE idTipoejercicios = _idtipoejercicios;
END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultartipoejercicio`  AS SELECT `tipoejercicio`.`idTipoEjercicios` AS `idTipoEjercicios`, `tipoejercicio`.`nombreEjercicios` AS `nombreEjercicios` FROM `tipoejercicio` ;

create view consultartipoejercicio
AS SELECT `tipoejercicio`.`idTipoEjercicios` AS `idTipoEjercicios`, `tipoejercicio`.`nombreEjercicios` AS `nombreEjercicios` FROM `tipoejercicio` ;

select * from consultartipoejercicio;

-- contraindicaciones --
DELIMITER $$
CREATE PROCEDURE insertarContraindicaciones(IN `_idContraindicaciones` INT(11), IN `_descricionContraindicaciones` VARCHAR(45))
BEGIN 
	INSERT INTO contraindicaciones values(_idContraindicaciones, _descricionContraindicaciones);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE actualizarContraindicaciones(
	in _idContraindicaciones int,
    in _descricionContraindicaiones Varchar(100)
)
begin 
	update Contraindicaciones set
		descricionContraindicaiones = _descricionContraindicaiones
    where idContraindicaciones = _idContraindicaciones;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE eliminarContraindicaciones(
	in _idContraindicaciones INT
)
BEGIN
	DELETE FROM contraindicaciones WHERE idContraindicaciones = _idContraindicaciones;
END$$
DELIMITER ;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultarcontraindicaciones`  AS SELECT `contraindicaciones`.`idContraindicaciones` AS `idContraindicaciones`, `contraindicaciones`.`descricionContraindicaiones` AS `descricionContraindicaiones` FROM `contraindicaciones` ;
drop view consultarcontraindicaciones;
create view consultarcontraindicaciones
as
select`contraindicaciones`.`idContraindicaciones` AS `idContraindicaciones`, `contraindicaciones`.`descricionContraindicaiones`
AS `descricionContraindicaiones` FROM `contraindicaciones` ;

select * from consultarcontraindicaciones;
-- OBJETIVO

DELIMITER $$

CREATE PROCEDURE insertarObjetivo
(
    in _descripcion varchar(400), 
    in _fechaCumplimiento date, 
    in _fechaInicio date, 
	in _clienteFk int 
)
BEGIN
	INSERT INTO objetivo VALUES (NULL, _descripcion, _fechaCumplimiento,_fechaInicio , _clienteFK);
END$$

DELIMITER ; 



CREATE VIEW consultarXidObjetivo
AS
SELECT objetivo.idObjetivo, cliente.nombreCliente, cliente.docCliente ,objetivo.descripcion, objetivo.fechaInicio, objetivo.fechaCumplimiento FROM objetivo
INNER JOIN cliente
ON objetivo.clienteFk = cliente.docCliente;

DELIMITER $$

CREATE PROCEDURE actualizarObjetivo
(
	in _idObjetivo int,
    in _descripcion varchar(400), 
    in _fechaCumplimiento date, 
    in _fechaInicio date, 
    in _clienteFk int
)
BEGIN
	UPDATE objetivo SET descripcion = _descripcion, fechaCumplimiento = _fechaCumplimiento, fechaInicio = _fechaInicio, clienteFk = _clienteFk
                 WHERE idObjetivo = _idObjetivo;        
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE eliminarObjetivo
(
	in _idObjetivo INT
)
BEGIN
	DELETE FROM objetivo WHERE _idObjetivo = idObjetivo;
END$$

DELIMITER ;

SELECT * FROM consultarXidObjetivo;
SELECT * FROM administrador WHERE docAdministrador = "20432764";