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

CREATE TABLE usuarios(
    id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id  int(11) NOT NULL
    nombres varchar(255) NOT NULL,
    cargo varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE KEY,
    password text NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11),
    
    FOREIGN KEY(rol_id) REFERENCES roles (id_rol)on delete cascade on update cascade
)ENGINE=InnoDB;

INSERT INTO usuarios(rol_id,nombres, cargo, email, password, fyh_creacion, estado)
VALUES ('1','Mathyas Coronado', 'Administrador', 'admin@gmail.com','$2y$10$.xgQGtzbd6a5L5A5zOykaO3oO1oNmD8YWfZ7Y2U4BM//quGkEs/Ni','2023-12-20 20:29:10','1')

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
VALUES ('Recalde','logo.jpg', 'zona los olivos','064578932','931789456', 'admin@gmail.com','2023-12-20 20:29:10','1')

CREATE TABLE gestiones(

    id_gestion int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion varchar(255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11)
    
)ENGINE=InnoDB;

INSERT INTO gestiones(gestion,fyh_creacion, estado)
VALUES ('2024-I','2023-12-20 20:29:10','1')

CREATE TABLE niveles(

    id_nivel int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id int(11) NOT NULL AUTO_INCREMENT,
    nivel varchar(255) NOT NULL,
    turno varchar(255) NULL,


    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado varchar(11)

    FOREIGN KEY(gestion_id) REFERENCES gestiones (id_gestion)on delete cascade on update cascade

)ENGINE=InnoDB;ñ

INSERT INTO niveles(gestion_id,nivel,turno,fyh_creacion, estado)
VALUES ('1','PRIMARIA', 'mañana','2023-12-20 20:29:10','1')

