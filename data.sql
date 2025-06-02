create table rol (
    id int auto_increment primary key,
    nombre varchar(50) unique not null
);

create table usuario (
    id int auto_increment primary key,
    nombre varchar(100),
    correo varchar(100) unique,
    contraseña varchar(255),
    rol_id int,
    foreign key (rol_id) references rol(id)
);

create table estado_proyecto (
    id int auto_increment primary key,
    nombre varchar(50) unique not null
);

create table proyecto (
    id int auto_increment primary key,
    nombre varchar(150),
    descripcion text,
    fecha_inicio date,
    fecha_fin date,
    estado_id int null default 1,
    foreign key (estado_id) references estado_proyecto(id)
);

create table proyecto_usuario (
    id int auto_increment primary key,
    proyecto_id int not null,
    usuario_id int not null,
    foreign key (proyecto_id) references proyecto(id) on delete cascade,
    foreign key (usuario_id) references usuario(id) on delete cascade
);

create table estado_ticket (
    id int auto_increment primary key,
    nombre varchar(50) unique not null
);

create table ticket (
    id int auto_increment primary key,
    nombre varchar(150) not null,
    descripcion text,
    estado_id int null default 1,
    proyecto_id int,
    fecha_creacion timestamp default current_timestamp,
    foreign key (estado_id) references estado_ticket(id),
    foreign key (proyecto_id) references proyecto(id)
);


drop table if exists ticket;
drop table if exists proyecto_usuario;
drop table if exists proyecto;
drop table if exists usuario;
drop table if exists estado_ticket;
drop table if exists estado_proyecto;
drop table if exists rol;


-- Roles
insert into rol(nombre) values
('empleado'),
('jefe de proyecto'),
('administrativo');

-- Usuarios
insert into usuario (nombre, correo, contraseña, rol_id) values
('franco', 'franco@myd.com', 'franco123', 1),
('maria', 'maria@myd.com', 'maria123', 2),
('ricardo', 'ricardo@myd.com', 'ricardo123', 3),
('sofia', 'sofia@myd.com', 'sofia123', 1),
('luis', 'luis@myd.com', 'luis123', 1);

-- Estados de proyecto
insert into estado_proyecto (nombre) values
('abierto'),
('en proceso'),
('cerrado');

-- Proyectos
insert into proyecto (nombre, descripcion, fecha_inicio, fecha_fin, estado_id) values
('proyecto a', 'sistema de control de inventarios', '2024-05-01', '2024-07-31', DEFAULT),
('proyecto b', 'plataforma de gestión de clientes', '2024-06-01', '2024-08-31', DEFAULT),
('proyecto c', 'sistema de calendario virtual', '2024-05-01', '2024-07-31', 3);

-- Asignación de usuarios a proyectos
insert into proyecto_usuario (proyecto_id, usuario_id) values
(1, 1),
(2, 1),
(1, 4),
(3, 5);

-- Estados de ticket
insert into estado_ticket (nombre) values
('abierto'),
('en proceso'),
('cerrado');

-- Tickets
insert into ticket (nombre, descripcion, proyecto_id) values
-- proyecto A
('diseño base de datos', 'modelar entidades para el sistema', 1),
('interfaz de usuario', 'diseñar vistas en bootstrap', 1),
('pruebas unitarias', 'verificar funcionalidades clave', 1),
-- proyecto B
('login y autenticación', 'agregar seguridad y roles', 2),
('dashboard general', 'panel con estadísticas', 2),
('reporte de errores', 'registrar errores del sistema', 2);

-- Tickets adicionales para proyecto A (id: 1)
insert into ticket (nombre, descripcion, estado_id, proyecto_id) values
('integración con API', 'integrar sistema con servicios externos', 1, 1),
('control de stock', 'monitoreo y control de inventario', 2, 1);

-- Tickets para proyecto B (id: 2)
insert into ticket (nombre, descripcion, estado_id, proyecto_id) values
('notificaciones por correo', 'enviar alertas al cliente', 2, 2),
('módulo de exportación', 'exportar datos en PDF y Excel', 3, 2),
('mantenimiento de base de datos', 'limpieza y respaldo periódico', 1, 2);

-- Tickets para proyecto C (id: 3)
insert into ticket (nombre, descripcion, estado_id, proyecto_id) values
('calendario mensual', 'vista completa del mes', 1, 3),
('recordatorios automáticos', 'alertas programadas por fecha', 2, 3),
('soporte multizona horaria', 'compatibilidad de horarios globales', 3, 3);



SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE proyecto_usuario;
TRUNCATE TABLE ticket;

TRUNCATE TABLE proyecto;
TRUNCATE TABLE usuario;

TRUNCATE TABLE estado_ticket;
TRUNCATE TABLE estado_proyecto;
TRUNCATE TABLE rol;

SET FOREIGN_KEY_CHECKS = 1;
