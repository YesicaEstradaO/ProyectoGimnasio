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

create view consultarClientes
as
select cliente.docCliente, cliente.nombreCliente, cliente.apellidoCliente, cliente.estado, cliente.alturaCliente, cliente.pesoCliente, entrenador.nombreEntrenador, usuario.nombreUsuario, cliente.celCliente from cliente
inner join usuario
on cliente.usuarioFk = usuario.docUsuario
inner join entrenador
on cliente.entrenadorFk = entrenador.docEntrenador;
select * from consultarClientes;

create view consultaAdmin
AS
select administrador.docAdministrador, administrador.celAdministrador, administrador.correoAdministrador, administrador.direcAdministrador, administrador.estado, 
administrador.nombreAdministrador, usuario.docUsuario from administrador
inner join usuario
on administrador.usuarioFk = usuario.docUsuario;

create view consultarEntrenadores
as
select entrenador.docEntrenador, entrenador.celEntrenador, entrenador.direcEntrenador, entrenador.estado, entrenador.nombreEntrenador, usuario.nombreUsuario from entrenador
inner join usuario
on entrenador.usuarioFk = usuario.docUsuario;

create view consultarProteina
as
select proteina.idProteina, proteina.nombreProteina, proteina.marcaProteina, proteina.usoProteina, cliente.nombreCliente, entrenador.nombreEntrenador
from proteina
inner join cliente
on proteina.clienteFk = cliente.docCliente
inner join entrenador 
on proteina.entrenadorFk = entrenador.docEntrenador;

create view consultarlistaseguimiento
as
SELECT `seguimientomedidas`.`idSeguimiento` AS `idSeguimiento`, `seguimientomedidas`.`fechaSeguimiento` AS `fechaSeguimiento`, `seguimientomedidas`.`medidas` 
AS `medidas`, `seguimientomedidas`.`clienteFk` AS `clienteFk`, `seguimientomedidas`.`entrenadorFk` AS `entrenadorFk`, `seguimientomedidas`.`parteCuerpoFk` AS `parteCuerpoFk` FROM `seguimientomedidas` ;

create view consultarlistadieta
as
SELECT `dieta`.`idDieta` AS `idDieta`, `dieta`.`fechaInicio` AS `fechaInicio`, `dieta`.`fechaFin` AS `fechaFin`, `dieta`.`diaDieta` AS `diaDieta`, 
`dieta`.`planDieta` AS `planDieta`, `dieta`.`clienteFk` AS `clienteFk`, `dieta`.`entrenadorFk` AS `entrenadorFk` FROM `dieta` ;

create view consultarlistapartecuerpo
as
SELECT `partecuerpo`.`idParteCuerpo` AS `idParteCuerpo`, `partecuerpo`.`nombreParteCuerpo` AS `nombreParteCuerpo` FROM `partecuerpo` ;

create view consultarlistaalimento
AS 
SELECT `alimento`.`idAlimento` AS `idAlimento`, `alimento`.`nombreAlimento` AS `nombreAlimento`, `alimento`.`valorNutricional` AS `valorNutricional`, 
`alimento`.`aminoacidosXporcion` AS `aminoacidosXporcion`, `alimento`.`caloriasXporcion` AS `caloriasXporcion` FROM `alimento` ;

create view consultarrutina
AS SELECT `rutina`.`idRutina` AS `idRutina`, `rutina`.`planRutina` AS `planRutina`, `rutina`.`intencidadRutina` AS `intencidadRutina`, 
`rutina`.`diaRutina` AS `diaRutina`, `rutina`.`clienteFk` AS `clienteFk`, `rutina`.`entrenadorFk` AS `entrenadorFk` FROM `rutina` ;

create view consultartipoejercicio
AS SELECT `tipoejercicio`.`idTipoEjercicios` AS `idTipoEjercicios`, `tipoejercicio`.`nombreEjercicios` AS `nombreEjercicios` FROM `tipoejercicio` ;

create view consultarcontraindicaciones
as
select`contraindicaciones`.`idContraindicaciones` AS `idContraindicaciones`, `contraindicaciones`.`descricionContraindicaiones`
AS `descricionContraindicaiones` FROM `contraindicaciones` ;

CREATE VIEW consultarXidObjetivo
AS
SELECT objetivo.idObjetivo, cliente.nombreCliente, cliente.docCliente ,objetivo.descripcion, objetivo.fechaInicio, objetivo.fechaCumplimiento FROM objetivo
INNER JOIN cliente
ON objetivo.clienteFk = cliente.docCliente;