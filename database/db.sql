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

