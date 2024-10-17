# Projet Docker - Étape 3

## Description

Cette étape consiste à configurer un environnement Docker pour exécuter une application WordPress complète. L'architecture se compose de trois conteneurs :

1. **HTTP** : Un conteneur avec un serveur HTTP (NGINX) écoutant sur le port 8080.
2. **SCRIPT** : Un conteneur avec un interpréteur PHP (utilisant PHP-FPM) pour le traitement des scripts PHP.
3. **DATA** : Un conteneur avec un serveur de base de données (MariaDB, MySQL ou PostgreSQL) pour stocker les données de l'application WordPress.

## Configuration des Conteneurs

### 1. Conteneur HTTP (NGINX)

Le conteneur NGINX est configuré pour servir les fichiers WordPress et communiquer avec le conteneur PHP-FPM.

#### Commande Docker

```bash
docker run -d --name php --network my_network_3 -v '"C:\Users\joris\OneDrive\Documents\efrei_cours\docker\docker-tp2\etape3\wordpress":/app' php:7.4-fpm
```
=> cette commande crée un conteneur Docker exécutant PHP 7.4 avec FPM, le connecte à un réseau spécifique, et monte un volume pour permettre l'accès aux fichiers de votre projet WordPress depuis l'intérieur du conteneur. Cela facilite le développement et la gestion de votre application web en permettant à PHP d'interpréter les scripts PHP présents dans le répertoire spécifié.

```bash
docker run -d --name data --network my_network_3 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=wordpress -e MYSQL_USER=wordpress_user -e MYSQL_PASSWORD=wordpress_password mariadb
```
=> cette commande crée et exécute un conteneur Docker pour un serveur de base de données MariaDB.

```bash
docker run -d --name nginx --network my_network_3 -p 8080:8080 -v "C:\Users\joris\OneDrive\Documents\efrei_cours\docker\docker-tp2\etape3\config\nginx.conf:/etc/nginx/conf.d/default.conf" -v "C:\Users\joris\OneDrive\Documents\efrei_cours\docker\docker-tp2\etape3\wordpress:/app" nginx
```
=> cette commande crée et exécute un conteneur Docker pour un serveur web NGINX, avec les spécifications suivante.
Cela permet à NGINX de servir votre application WordPress tout en utilisant une configuration personnalisée définie dans nginx.conf.

