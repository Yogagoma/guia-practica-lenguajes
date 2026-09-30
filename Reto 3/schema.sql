-- Tabla estudiantes
CREATE TABLE IF NOT EXISTS estudiantes(
	cedula_escolar VARCHAR(10) PRIMARY KEY,
	nombre_completo VARCHAR(70) NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	grado INT CHECK(grado >= 1 AND grado <= 6) -- Asumir que va de 1ero a 6to anio
);

-- Tabla materias
CREATE TABLE IF NOT EXISTS materias(
	codigo VARCHAR(10) PRIMARY KEY,
	nombre VARCHAR(30) UNIQUE NOT NULL,
	grado INT CHECK(grado >= 1 AND grado <= 6)  -- Asumir que va de 1ero a 6to anio
);

-- Tabla puente que establece relación N:M entre estudiantes y materias
CREATE TABLE IF NOT EXISTS estudiante_cursa_materia(
	cedula_estudiante VARCHAR(10),
	codigo_materia VARCHAR(10),

	-- Construccion de clave primaria compuesta entre cédula escolar y código de una materia
	CONSTRAINT pk PRIMARY KEY (cedula_estudiante, codigo_materia),

	-- Referencia a la tabla estudiantes
	CONSTRAINT FK_estudiante FOREIGN KEY (cedula_estudiante) REFERENCES estudiantes(cedula_escolar),

	-- Referencia a la tabla materias
	CONSTRAINT FK_materia FOREIGN KEY (codigo_materia) REFERENCES materias(codigo)
);

-- Adición de registros en tabla estudiantes
INSERT INTO estudiantes(cedula_escolar, nombre_completo, fecha_nacimiento, grado)
	VALUES ('123456', 'Yosgluis Gabriel Gonzalez Mago', '2006-03-25', 1),
			('789012', 'Lionel Andrés Messi Cuccitinni', '1987-06-24', 5);

-- Adición de registros en tabla materias
INSERT INTO materias(codigo, nombre, grado)
	VALUES ('072-5678', 'Matemáticas I', 1),
			('072-1234', 'Métodos Numéricos', 5);

-- Adición de registros en la tabla puente
INSERT INTO estudiante_cursa_materia(cedula_estudiante, codigo_materia)
VALUES ('123456', '072-5678'),
       ('789012', '072-1234');