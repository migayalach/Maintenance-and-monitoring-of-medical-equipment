create table nivel(
	idNivel int auto_increment not null,
	tipo varchar(13) not null,
	primary key (idNivel)
);

create table usuario(
	idUsuario int auto_increment not null,
    idNivel int not null,
	nombre varchar(100) not null,
	apellido varchar(100) not null,
	carnet varchar(15) not null,
	direccion varchar(250) not null,
    email varchar(245) not null,
	celular varchar(20) not null,	
	usuario varchar(50) not null,
	clave text(50) not null,
	primary key(idUsuario),
	foreign key(idNivel) references nivel(idNivel)
);

create table tipoMantenimiento(
    idTipoMantenimiento int auto_increment not null,
    nombre varchar(100) not null,
    primary key(idTipoMantenimiento)
);

create table tipoEstado(
    idTipoEstado int auto_increment not null,
    estadoGarantia varchar (250) not null,
    primary key (idTipoEstado)
);

create table equipo(
    idEquipo int auto_increment not null,
    idTipoEstado int not null,
    nombre varchar(100) not null,
    marca varchar(50) not null,
    modelo varchar(100) not null,
    nroSerie varchar(50) null,
    nroInventario varchar(50) null,
    fechaEquipo datetime not null default current_timestamp(),
    primary key(idEquipo),
    foreign key(idTipoEstado) references tipoEstado(idTipoEstado)
);

create table encargadoUnidad(
    idEncargado int auto_increment not null,
    nombre varchar(100) not null,
    fechaEncargado datetime not null default current_timestamp(),
    primary key(idEncargado)
);

create table unidad(
    idUnidad int auto_increment not null,
    idEquipo int not null,
    idEncargado int not null,
    nombre varchar(100) not null,
    primary key(idUnidad),
    foreign key(idEquipo) references equipo(idEquipo),
    foreign key(idEncargado) references encargadoUnidad(idEncargado)
);

create table mantenimiento(
    idMantenimiento int auto_increment not null,
    idTipoMantenimiento int not null,
    idEquipo int not null,
    idUsuario int not null,
    fechaMantenimiento date not null,
    nroDocumento varchar(100) not null,
    reporte varchar (1000) not null,
    observacion varchar(1000) not null,
    primary key(idMantenimiento),
    foreign key(idTipoMantenimiento) references tipoMantenimiento (idTipoMantenimiento),
    foreign key(idEquipo) references equipo (idEquipo),
    foreign key(idUsuario) references usuario(idUsuario)
);

create table archivos(
    idArchivo int auto_increment not null,
    idMantenimiento int not null,
    idUsuario int not null,
    nombre varchar(250) not null,
    tipo varchar (250) not null,
    ruta text default null,
    fecha datetime NOT NULL DEFAULT current_timestamp(),
    hecho boolean not null,
    primary key(idArchivo),
    foreign key(idMantenimiento) references mantenimiento(idMantenimiento),
    foreign key(idUsuario) references usuario(idUsuario)
);

INSERT INTO `nivel` (`idNivel`, `tipo`) VALUES (NULL, 'Administrador'), 
                                               (NULL, 'Estandar'), 
                                               (NULL, 'Visitante');

INSERT INTO `tipoEstado` (`idTipoEstado`, `estadoGarantia`) VALUES (NULL, 'Garantia'), 
                                                                   (NULL, 'Sin garantia');

create table asistencia(
    idAsistencia int auto_increment not null,
    idUsuario int not null,
    fechaAsistencia datetime not null default current_timestamp(),
    primary key (idAsistencia),
    foreign key(idUsuario) references usuario(idUsuario)
);
