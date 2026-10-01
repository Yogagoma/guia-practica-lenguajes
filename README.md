# Guía-práctica-lenguajes
Retos de fundamentos de programación funcional, arquitectura web y bases de datos. 

Para la ejecución de los programas, se requiere la instalación de Python, XAMPP y Docker (ya sea como Docker Desktop o Engine). Luego se debe entrar al directorio htdocs de XAMPP mediante el comando:
```sh
cd C:\xampp\htdocs
```
En dicho directorio, clonar el repositorio ejecutando:
```sh
git clone https://github.com/Yogagoma/guia-practica-lenguajes.git
```

Los retos están contenidos en directorios que los identifican, distribuidos de la siguiente forma:

1. reto-1
2. reto-2
3. reto-3
4. reto-4

### Reto 1:  Python Multiparadigmático 
Creación de un script con una clase Estudiante que posee nombre y promedio. Dada una lista de 5 estudiantes como mínimo, se requiere extraer y mostrar en la consola a los registros con un promedio mayor o igual a 14.0 puntos, aplicando programación funcional.

No se requiere la instalación de ninguna librería para este reto. Para ejecutar el programa, ejecute dentro de la carpeta 'Reto 1':

```sh
python main.py
```

### Reto 2: PHP, Formularios y Seguridad 
Archivo index.php con formulario HTML para registar a un estudiante nuevo, tras ingresar nombre, edad y correo electrónico.

El primer script escrito en PHP se encarga de validar que los datos recibidos del formulario y, de cumplir con las especificaciones, se crea un nuevo registro en la base de datos, la cual no se encuentra levantada. Por otro lado, segundo script (contenido dentro del fomulario) se encarga de mostrar que especifica si el registro se realizó exitosamente o si hay un campo no cumple con alguna especificación.

Para visualizar el formulario se debe abrir el panel de control de XAMPP e iniciar el módulo de Apache (clicar el botón 'start'), luego escribir en un navegador web la dirección.

<http://localhost/guia-practica-lenguajes/reto-2/index.php>

### Reto 3: Modelado Relacional y Docker  
Script schema.sql que crea dos tablas, estudiantes y materias (incluyendo su relación N:M), normalizadas en tercera forma normal. Luego inserta dos registros de prueba en cada tabla.

La base de datos se encuentra levantada en un contenedor que usa la imagen oficial de postgreSQL, versión 17 para el sistema operativo Alpine.

Para interactuar con la base de datos, debe seguir los siguientes pasos:

1. Dentro del directorio reto-3, levantar el contenedor de la base de datos, ejecutando en la interfaz de línea de comandos:
```sh
docker compose up -d
```

2. Acceder a la base de datos, ejecutando:
```sh
docker exec -it reto_3_db psql -U root -d reto_3_db
```
3. Puede realizar consultas en las tablas, ejecutando comandos como:
```sh
SELECT * FROM estudiantes;
SELECT * FROM materias;
SELECT * FROM inscripciones;
```

4. Para dejar de interactuar con la base de datos, ejecute:
```sh
exit
```

5. Para detener la ejecución del contenedor, ejecute:
```sh
docker compose down -v
```

### Reto 4:  Mapeo de Datos con Django 
Creación de un archivo models.py, dentro del cual se tradujo la tabla estudiantes del reto anterior hacia una clase de modelo usando el ORM de Django. Además, se destacó las ventajas que ofrece esta alternativa frente al uso de sentencias en crudo SQL, en términos de seguridad y rapidez de implementación.