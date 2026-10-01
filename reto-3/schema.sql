-- Tabla estudiantes
CREATE TABLE IF NOT EXISTS estudiantes(
	cedula VARCHAR(10) PRIMARY KEY,
	nombre_completo VARCHAR(70) NOT NULL,
	fecha_nacimiento DATE NOT NULL
);

-- Tabla materias
CREATE TABLE IF NOT EXISTS materias(
	codigo VARCHAR(10) PRIMARY KEY,
	nombre VARCHAR(30) UNIQUE NOT NULL,
	creditos INT CHECK(creditos >=1)
);

-- Tabla puente que establece relación N:M entre estudiantes y materias
CREATE TABLE IF NOT EXISTS inscripciones(
	cedula_estudiante VARCHAR(10),
	codigo_materia VARCHAR(10),
	semestre VARCHAR(10) NOT NULL,

	-- Construccion de clave primaria compuesta entre la cédula del estudiante y código de una materia
	CONSTRAINT pk PRIMARY KEY (cedula_estudiante, codigo_materia),

	-- Referencia a la tabla estudiantes
	CONSTRAINT FK_estudiante FOREIGN KEY (cedula_estudiante) REFERENCES estudiantes(cedula),

	-- Referencia a la tabla materias
	CONSTRAINT FK_materia FOREIGN KEY (codigo_materia) REFERENCES materias(codigo)
);

-- Adición de registros en tabla estudiantes
INSERT INTO estudiantes(cedula, nombre_completo, fecha_nacimiento)
	VALUES ('123456', 'Yosgluis Gabriel Gonzalez Mago', '2006-03-25'),
			('789012', 'Lionel Andrés Messi Cuccitini', '1987-06-24');

-- Adición de registros en tabla materias
INSERT INTO materias(codigo, nombre, creditos)
	VALUES ('072-5678', 'Matemáticas I', 4),
			('072-1234', 'Métodos Numéricos', 3);

-- Adición de registros en la tabla puente
INSERT INTO inscripciones(cedula_estudiante, codigo_materia, semestre)
VALUES ('123456', '072-5678', 'II-2026'),
       ('789012', '072-1234', 'I-2023');