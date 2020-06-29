create database infonete;
use infonete;

insert into rol values(1,"usuario");
insert into rol values(2,"admin");
insert into rol values(3,"contenidista");
insert into foto values(4,"pagar.png",5);
select * from foto;

create table rol(
	id int not null auto_increment,
    nombre varchar(25),
    primary key(id)
);

insert into usuario values('1',"facu","facu","1234","19990101","facu@gmail.com",11111,"san justo",2);
insert into usuario values('2',"ale","ale","1234","19990101","ale@gmail.com",11111,"san justo",3);
insert into usuario values('3',"marcos","marcos","1234","19990101","marcos@gmail.com",11111,"san justo",1);

insert into categoria values('1','diario'),('2','revista');

insert into noticia values('5', 'paga', 'hola.com', 'hola', 'contenido', 'subtitulo', 'pagaa', '1', '2','3', false);

create table usuario(
	id integer not null auto_increment,
    nombre varchar(25) not null,
    nombre_usuario varchar(25) not null,
    contrasenia varchar(25) not null,
    fecha_nacimiento date not null,
    email varchar(40) not null,
    telefono integer,
    ubicacion varchar(30) not null,
    id_rol int not null,
    primary key(id),
    foreign key(id_rol)references rol(id)
);



create table categoria(
	id integer not null auto_increment,
    nombre varchar(25),
    primary key(id)
);

create table ejemplar(
	id integer not null auto_increment,
    nombre varchar(25),
    id_categoria integer not null,
    estado boolean,
	precio double,
    primary key(id),
    foreign key(id_categoria) references categoria(id)
);

create table usuarioSuscribeEjemplar(
	fecha date not null,
    id_usuario integer not null,
    id_ejemplar integer not null,
    estado_suscripcion boolean,
    primary key(id_usuario,id_ejemplar),
    foreign key(id_usuario) references usuario(id),
	foreign key(id_ejemplar) references ejemplar(id)
);

create table edicion(
	id integer not null auto_increment,
    nombre varchar(40),
    numero integer not null,
    id_ejemplar integer not null,
    estado boolean,
	precio double,
    primary key(id),
    foreign key(id_ejemplar) references ejemplar(id)
);

create table seccion(
	id integer not null auto_increment,
    nombre varchar(40),
    estado boolean,
    primary key(id)
);

create table usuarioCompraEdicion(
	id_usuario integer not null, 
    id_edicion integer not null,
    primary key(id_usuario,id_edicion),
    foreign key(id_usuario) references usuario(id),
    foreign key(id_edicion) references edicion(id)
);

create table edicionPoseeSeccion(
	id_seccion integer not null, 
    id_edicion integer not null,
    primary key(id_seccion,id_edicion),
    foreign key(id_seccion) references seccion(id),
    foreign key(id_edicion) references edicion(id)
);

create table noticia(
	id integer not null auto_increment,
    video varchar(255),
    link varchar(255),
    ubicacion varchar(30),
    contenido varchar(5000),
    subtitulo varchar(255),
    titulo varchar (255),
    id_seccion integer not null,
    id_usuario integer not null,
    precio integer not null,
    estado boolean,
    primary key(id),
    foreign key(id_seccion) references seccion(id),
	foreign key(id_usuario) references usuario(id)
);

create table foto(
	id integer not null auto_increment,
	direccion varchar(300),
    id_noticia integer not null,
    primary key(id),
    foreign key(id_noticia) references noticia(id)
);

create table usuarioLeeNoticia(
	id_usuario integer not null,
    id_noticia integer not null,
    primary key(id_usuario,id_noticia),
    foreign key(id_usuario) references usuario(id),
    foreign key(id_noticia) references noticia(id)
);

