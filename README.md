# PFO2_MiProyecto

IFTS 29 - Tecnicatura en Desarrollo de Software  
Seminario de actualización DevOps - 3° D  
Práctica Formativa Obligatoria 2  
Alumnos: Damián Andrés Clausi, Descosido Cristian, Gill César Antonio  
Profesor: Javier Blanco

---

## 1) Objetivo
Levantar un stack Web + Base de Datos con Docker, mostrar conexión desde PHP a MySQL, generar imagen propia de la web y publicarla en Docker Hub, subir proyecto a GitHub con documentación completa y evidencias visuales.

---

## 2) Arquitectura

Navegador → http://localhost:8080 → [web (PHP+Apache)] --(bridge)--> [db (MySQL 8)]

yaml
Copiar código

- **web:** PHP 8.2 + Apache, conecta a MySQL vía PDO/MySQL.  
- **db:** MySQL 8, datos persistidos en volumen Docker.

---

## 3) Requisitos

- Docker Desktop/Engine corriendo.  
- (Opcional) MySQL Workbench.  
- Cuenta en Docker Hub y GitHub.  

---

## 4) Estructura del repositorio

./
├─ Dockerfile
├─ docker-compose.yml
├─ .gitignore
├─ README.md
├─ src/
│ └─ index.php
└─ screenshots/
├─ localhost.png
├─ dockerhub.png
└─ mysql1.png

yaml
Copiar código

---

## 5) Variables de entorno (.env)

Crear un archivo `.env` (no subir al repo) con:

```env
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=demo
MYSQL_USER=demo
MYSQL_PASSWORD=demo
.env.example incluido como referencia.

6) Ejecución
6.1 Levantar servicios
bash
Copiar código
docker-compose up -d
Web: http://localhost:8080

MySQL: 3306

6.2 Construcción y publicación de imagen web
bash
Copiar código
# Construir imagen local
docker build -t pfo2_miproyecto-web:latest .

# Etiquetar para Docker Hub
docker tag pfo2_miproyecto-web:latest antoniogill/mi-web:1.0

# Subir imagen a Docker Hub
docker push antoniogill/mi-web:1.0
6.3 Conexión desde MySQL Workbench
Hostname: localhost

Usuario: demo

Password: demo

Puerto: 3306

7) Comandos útiles
bash
Copiar código
# Estado de contenedores
docker-compose ps

# Ver imágenes
docker-compose images

# Logs
docker-compose logs -f web
docker-compose logs -f db

# Parar servicios
docker-compose down

# Reiniciar contenedor web
docker-compose restart web

# Acceder a shell de contenedor
docker-compose exec web bash
docker-compose exec db bash
8) Evidencias
localhost.png: Home page mostrando listado de personas desde MySQL.
<img width="990" height="322" alt="localhost" src="https://github.com/user-attachments/assets/ad77d583-e149-4011-b78e-b212888e00b1" />


dockerhub.png: Imagen publicada en Docker Hub.
<img width="1889" height="950" alt="dockerhub" src="https://github.com/user-attachments/assets/031d1bd4-f8a3-44f2-9772-4e409aa8a30c" />


mysql1.png: Conexión a MySQL Workbench.
<img width="1276" height="1015" alt="mysql" src="https://github.com/user-attachments/assets/9619f78f-d31f-453e-bfc6-69375e438751" />


9) Problemas y soluciones
Variables de entorno hardcodeadas → Solución: usar .env.

Contenedores no conectaban → Solución: usar nombre del servicio (db) como host.

Persistencia de datos → Solución: volumen Docker mysql_data.

Conflictos de contenedor → Solución: eliminar contenedores existentes antes de levantar stack.

10) Conclusión
Se cumplió la PFO2: stack Web+DB en Docker, home conectada a MySQL, imagen publicada en Docker Hub, capturas incluidas y documentación completa.
