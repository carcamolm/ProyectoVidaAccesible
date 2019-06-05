create database if not exists bd_Accesible;
use bd_Accesible;
create table  usuario
(
	idUsusario int not null,
    nombre varchar(30) not null,
    correo varchar(50) not null,
    contrasena varchar(20) not null,
    primary key (idUsuario)
)engine=innodb;

create table if not exists  implemento
(
	idImplemento int not null,
    idUsusario int not null,
    nombreImplemento varchar(30) not null,
    telefono varchar(50) not null,
    imagen longblob not null,
    descripcion longtext,
    primary key (idImplemento),
    foreign key (idUsuario) references usuario(idUsuario)
)engine=innodb;
create table if not exists  experiencia
(
	idExperiencia int not null,
    idUsusario int not null,
    descripcionExperiencia longtext not null,
    video longblob,
    texto longtext,
    primary key (idExperiencia),
    foreign key (idUsuario) references usuario(idUsuario)
)engine=innodb;
create table if not exists  evento
(
	idEvento int not null,
    idUsusario int not null,
    nombreEvento text not null,
    ubicacion text not null,
    primary key (idEvento),
    foreign key (idUsuario) references usuario(idUsuario)
)engine=innodb;
create table if not exists  institucion
(
	idInstitucion int not null,
    idUsusario int not null,
    nombreInstutucion text not null,
    ubicacion text not null,
    primary key (idInstitucion),
    foreign key (idUsuario) references usuario(idUsuario)
)engine=innodb;
create table if not exists categoriaPunto
(
	idCategoria int not null,
    nombreCategoria varchar(50) not null,
    primary key (idCategoria),
    foreign key (idUsuario) references usuario(idUsuario)
)engine=innodb;
create table if not exists tipoacceso
(
	idTipo int not null,
    nombreAcceso text not null,
    primary key (idTipo)
   )engine=innodb;
create table if not exists  punto
(
	idPunto int not null,
    idUsusario int not null,
    idTipo int not null,
    idCategoria int  not null,
    primary key (idPunto),
    foreign key (idUsuario) references usuario(idUsuario),
    foreign key (idTipo) references tipoacceso(idTipo),
    foreign key (idCategoria) references categoriaPunto(idCategoria)
)engine=innodb;




