*** CRUD VETERINARIA MASCOTAS ***

Este es un proyecto desarrollado en PHP, JavaScript, css, html5 bootsrap. Para ejecutar este proyecto de manera local, sigue los pasos a continuación.

## Requisitos previos

- [Instrucciones sobre los requisitos previos del proyecto, por ejemplo: PHP, Apache, MySQL, etc.]
- Tener configurado un servidor local (XAMPP, WAMP, LAMP, etc.) o similar.

## Instrucciones de instalación

### 1. Descargar e importar la base de datos

Para que el proyecto funcione correctamente en tu entorno local, es necesario importar la base de datos. Sigue estos pasos:

1. **Descargar el archivo de la base de datos**: [Proporcionar enlace o indicaciones si es necesario].
2. **Importar la base de datos en tu servidor MySQL**: Utiliza herramientas como phpMyAdmin o el cliente de MySQL para importar el archivo SQL.

### 2. Crear el archivo `.htaccess`

Es necesario crear un archivo `.htaccess` en la raíz del proyecto con el siguiente código:

```apache
Options All -Indexes

RewriteEngine On

RewriteRule ^([-a-zA-Z0-9]+)$ index.php?ruta=$1
