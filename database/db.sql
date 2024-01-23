CREATE TABLE roles(
    id_rol int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol varchar(255) NOT NULL UNIQUE KEY,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11)
)ENGINE=InnoDB;

INSERT INTO roles(nombre_rol, fyh_creacion, estado) VALUES ('Administrador', '2024-01-12 01:16:34','1');
INSERT INTO roles(nombre_rol, fyh_creacion, estado) VALUES ('Director Academico', '2024-01-12 01:16:34','1');
INSERT INTO roles(nombre_rol, fyh_creacion, estado) VALUES ('Director Administrativo', '2024-01-12 01:16:34','1');
INSERT INTO roles(nombre_rol, fyh_creacion, estado) VALUES ('Secretaria', '2024-01-12 01:16:34','1');
INSERT INTO roles(nombre_rol, fyh_creacion, estado) VALUES ('Auxiliar', '2024-01-12 01:16:34','1');
INSERT INTO roles(nombre_rol, fyh_creacion, estado) VALUES ('Docente', '2024-01-12 01:16:34','1');

CREATE TABLE usuarios(
    id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id  int(11) NOT NULL,
    email varchar(255) NOT NULL UNIQUE KEY,
    password text NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),
    
    FOREIGN KEY(rol_id) REFERENCES roles (id_rol)on delete cascade on update cascade
)ENGINE=InnoDB;

INSERT INTO usuarios(rol_id, email, password, fyh_creacion, estado)
VALUES ('1', 'admin@gmail.com','$2y$10$.xgQGtzbd6a5L5A5zOykaO3oO1oNmD8YWfZ7Y2U4BM//quGkEs/Ni','2023-12-20 20:29:10','1') ;
INSERT INTO usuarios(rol_id, email, password, fyh_creacion, estado)
VALUES ('6', 'cachetes@gmail.com','$2y$10$.xgQGtzbd6a5L5A5zOykaO3oO1oNmD8YWfZ7Y2U4BM//quGkEs/Ni','2023-12-20 20:29:10','1');


CREATE TABLE personas(
   id_persona int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id  int(11) NOT NULL,
    nombres varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    dni varchar(20)  NULL,
    fecha_nacimiento varchar(20)  NULL,
    profesion varchar(50)  NULL,
    direccion varchar(100)  NULL,
    celular varchar(20)  NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(usuario_id) REFERENCES usuarios(id_usuario) on delete cascade on update cascade

)ENGINE=InnoDB;
INSERT INTO personas(usuario_id, nombres, apellidos, dni,fecha_nacimiento,profesion,direccion,celular, fyh_creacion, estado)
VALUES ('1','Mathyas ', 'Coronado', '12345678','17/10/2000','ingeniero','av.Nicolas Ayllón 3378','931038431','2023-12-20 20:29:10','1');
INSERT INTO personas(usuario_id, nombres, apellidos, dni,fecha_nacimiento,profesion,direccion,celular, fyh_creacion, estado)
VALUES ('2','cuya ', 'Caballero', '12345678','17/10/2002','ingenieRA','av.Nicolas Ayllón 4444','444444444','2023-12-20 20:29:10','1');

CREATE TABLE administrativos(
   id_administrativo int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id int(11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(persona_id) REFERENCES personas(id_persona) on delete cascade on update cascade

)ENGINE=InnoDB;
INSERT INTO administrativos(persona_id, fyh_creacion, estado)
VALUES ('1','2023-12-20 20:29:10','1');


CREATE TABLE docentes(
    id_docentes int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id int(11) NOT NULL,
    especialidad varchar(255)  NULL,
    antiguedad varchar(255)  NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(persona_id) REFERENCES personas(id_persona) on delete cascade on update cascade

)ENGINE=InnoDB;
INSERT INTO docentes(persona_id, fyh_creacion,especialidad,antiguedad, estado)
VALUES ('2','2023-12-20 20:29:10','geometria,algebra','22-01-2024','1');


CREATE TABLE estudiantes(
    id_estudiante int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id int(11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(persona_id) REFERENCES personas(id_persona) on delete cascade on update cascade

)ENGINE=InnoDB;



CREATE TABLE padres_familia(
    id_padres_familia int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id int(11) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(persona_id) REFERENCES personas(id_persona) on delete cascade on update cascade

)ENGINE=InnoDB;


CREATE TABLE configuracion_instituciones(

    id_config_institucion int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_Institucion varchar(255) NOT NULL,
    logo varchar(255) NULL,
    direccion varchar(255) NOT NULL,
    telefono varchar(100) NULL,
    celular varchar(100) NULL,
    email varchar(255) NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11)
    
)ENGINE=InnoDB;

INSERT INTO configuracion_instituciones(nombre_Institucion,logo, direccion, telefono, celular, email,fyh_creacion, estado)
VALUES ('Recalde','logo.jpg', 'zona los olivos','064578932','931789456', 'admin@gmail.com','2023-12-20 20:29:10','1');

CREATE TABLE gestiones(

    id_gestion int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion varchar(255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11)
    
)ENGINE=InnoDB;

INSERT INTO gestiones(gestion,fyh_creacion, estado)
VALUES ('2024-I','2023-12-20 20:29:10','1');

CREATE TABLE niveles(

    id_nivel int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id int(11) NOT NULL,
    nivel varchar(255) NOT NULL,
    turno varchar(255) NULL,


    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(gestion_id) REFERENCES gestiones (id_gestion)on delete cascade on update cascade

)ENGINE=InnoDB;

INSERT INTO niveles(gestion_id,nivel,turno,fyh_creacion, estado)
VALUES ('1','PRIMARIA', 'mañana','2023-12-20 20:29:10','1');


CREATE TABLE grados(
    id_grado int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_id int(11) NOT NULL,
    curso varchar(255) NOT NULL,
    seccion varchar(255) NULL,


    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),

    FOREIGN KEY(nivel_id) REFERENCES niveles(id_nivel) on delete cascade on update cascade

)ENGINE=InnoDB;

INSERT INTO grados(nivel_id,curso,seccion,fyh_creacion, estado)
VALUES ('1','inicial - 1', 'A','2023-12-20 20:29:10','1');

CREATE TABLE materias(

    id_materia int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_materia varchar(255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11)
    
)ENGINE=InnoDB;

INSERT INTO materias(nombre_materia,fyh_creacion, estado)
VALUES ('geometria','2023-12-20 20:29:10','1')