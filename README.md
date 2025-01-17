# FOCO Web

FOCO es una plataforma web que conecta freelancers con clientes, proporcionando una experiencia intuitiva para gestionar gigs, pedidos y estadísticas de rendimiento.

## 🚀 Características Principales

- **Dashboard interactivo:** Administra gigs, revisa pedidos y analiza estadísticas desde un solo lugar.
- **Registro e inicio de sesión:** Sistema seguro con validación de contraseñas y roles de usuario.
- **Personalización:** Cada usuario tiene su perfil con foto y configuración propia.
- **Diseño responsivo:** Adaptado para dispositivos móviles y escritorio.

---

## 🛠️ Requisitos

- **PHP** >= 7.4
- **MySQL** >= 5.7
- **Composer** (para gestión de dependencias PHP)
- **Node.js** y **npm** (opcional, si utilizas herramientas front-end)
- **Docker** (opcional, para un entorno de desarrollo rápido)

---

## ⚙️ Configuración del Proyecto

### 1. Clonar el repositorio

git clone https://github.com/puxito/focoweb.git
cd focoweb

### 2. Configurar el entorno

Copia el archivo .env.example y renómbralo como .env. Luego, ajusta los valores según tu configuración local:

DB_HOST=localhost
DB_NAME=foco
DB_USER=root
DB_PASSWORD=tu_password

### 3. Configurar la base de datos

 - 1. Importa el esquema de la base de datos:
 mysql -u root -p foco < assets/static/static.sql
 - 2. Verifica las tablas creadas y los datos iniciales:

### 4. Iniciar el servidor PHP

php -S localhost:8000 -t public
 - Visita http://localhost:8000 para ver la aplicación en tu navegador.


## 🐳 Usando Docker (Opcional)

Si prefieres usar Docker, puedes levantar el entorno con el siguiente comando:
docker-compose up -d
Esto creará contenedores para PHP, MySQL y phpMyAdmin. Luego accede a http://localhost:8080.

## Estructura del Proyecto

mi-proyecto/
├── src/
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   ├── images/
│   │   └── fonts/
│   ├── components/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── navbar.php
│   ├── includes/
│   │   ├── db.php
│   │   ├── auth.php
│   │   └── session.php
│   ├── pages/
│   │   ├── index.php
│   │   ├── login.php
│   │   ├── register.php
│   │   ├── dashboard.php
│   │   ├── profile.php
│   │   ├── entertainers.php
│   │   ├── chat.php
│   │   ├── gigs.php
│   │   └── settings.php
│   ├── api/
│   │   ├── login.php
│   │   ├── register.php
│   │   ├── profile.php
│   │   └── chat.php
│   ├── templates/
│   │   ├── layout.php
│   │   └── partials/
│   │       ├── sidebar.php
│   │       ├── breadcrumbs.php
│   │       └── notifications.php
│   ├── vendor/
│   │   └── autoload.php
│   ├── .env
│   ├── .htaccess
│   ├── composer.json
│   ├── routes.php
│   └── index.php
├── docker-compose.yml
├── Dockerfile
├── .env
├── .gitignore
└── README.md
