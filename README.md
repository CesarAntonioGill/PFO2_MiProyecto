# PFO2_MiProyecto

## Descripción
Proyecto realizado para la **Práctica Formativa Obligatoria N°2**, donde se aprende a usar Docker, imágenes y contenedores.  
Se dockerizó un proyecto web con PHP y Apache, conectado a una base de datos MySQL.

---

## Tecnologías utilizadas
- Docker
- PHP 8.2 con Apache
- MySQL 8
- Docker Hub
- GitHub

---

## Contenedores creados

1. **Web PHP**
   - Imagen: `php:8.2-apache`
   - Puerto host: 8080
   - Código fuente: `src/`
   - Contenedor linkeado a MySQL: `db-test`

2. **MySQL**
   - Imagen: `mysql:8`
   - Puerto host: 3306
   - Base de datos: `demo`
   - Usuario y contraseña: `demo/demo`
   - Contenedor: `db-test`

---

## Uso con Docker Compose

Para levantar los contenedores usando Docker Compose:

```bash
docker-compose up -d
Acceder al proyecto web: http://localhost:8080

Contenedor MySQL accesible por db-test desde PHP.

Para detener los contenedores:

bash
Copiar código
docker-compose down
Docker Hub
Imagen del proyecto PHP + Apache: antoniogill/mi-web:1.0

Para descargar y correr la imagen directamente:

bash
Copiar código
docker pull antoniogill/mi-web:1.0
docker run -d --name web-test -p 8080:80 --link db-test antoniogill/mi-web:1.0
Repositorio GitHub
Repositorio remoto: https://github.com/CesarAntonioGill/PFO2_MiProyecto

Comandos Docker utilizados
bash
Copiar código
docker run -d --name db-test -e MYSQL_ROOT_PASSWORD=demo -e MYSQL_DATABASE=demo -e MYSQL_USER=demo -e MYSQL_PASSWORD=demo -v mysql_data:/var/lib/mysql mysql:8

docker run -d --name web-test -p 8080:80 -v C:\Users\anton\Desktop\PFO2_MiProyecto\src:/var/www/html --link db-test php:8.2-apache

docker build -t mi-web:1.0 .

docker tag mi-web:1.0 antoniogill/mi-web:1.0
docker push antoniogill/mi-web:1.0
Problemas y soluciones
Error "could not find driver": Se resolvió instalando pdo y pdo_mysql en el Dockerfile.

Conflicto de nombres de contenedor: Se resolvió eliminando el contenedor existente con docker rm -f web-test.

Archivos MySQL no rastreables por Git: Se resolvió agregando mysql_data/ en .gitignore.

Observaciones
La base de datos demo contiene la tabla personas y registros de ejemplo.

La página web muestra los datos de la tabla para comprobar la conexión PHP-MySQL.