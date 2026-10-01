# guia-practica-lenguajes
Retos de fundamentos de programación funcional, arquitectura web y bases de datos. 

Para la ejecución de los programas, se requiere la instalación de Python, XAMPP y Docker (ya sea como Docker Desktop o Engine). Luego se debe entrar al directorio htdocs de XAMPP mediante el comando:
```sh
cd C:\xampp\htdocs
```
En dicho directorio, clonar el repositorio ejecutando:
```sh
git clone https://github.com/Yogagoma/guia-practica-lenguajes.git
```

Los retos están distribuidos de la siguiente forma:

### Reto 1:  Python Multiparadigmático 
Creación de un script con una clase Estudiante que posee nombre y promedio. Dada una lista de 5 estudiantes como mínimo, se requiere extraer y mostrar en la consola a los registros con un promedio mayor o igual a 14.0 puntos, aplicando programación funcional.

No se requiere la instalación de ninguna librería para este reto. Para ejecutar el programa, ejecute dentro de la carpeta 'Reto 1':

```sh
python main.py
```

### Reto 2: PHP, Formularios y Seguridad 
Archivo index.php con formulario HTML para registar a un estudiante nuevo, tras ingresar nombre, edad y correo electrónico.

El primer script escrito en PHP se encarga de validar que los datos recibidos del formulario. De cumplir con las especificaciones, se crea un nuevo registro en la base de datos, la cual no se encuentra levantada.

Para visualizar el formulario se debe abrir el panel de control de XAMPP e iniciar el módulo de Apache (clicar el botón 'start'), luego escribir en un navegador web la dirección.

<http://localhost/guia-practica-lenguajes/reto-2/index.php>

### Reto 3: Modelado Relacional y Docker  