# Étape 4 : Configuration avec Docker Compose

Cette étape consiste à convertir la configuration de l'étape 3 en utilisant Docker Compose pour gérer les conteneurs de manière centralisée.

## Objectif

L'objectif est de créer une application WordPress fonctionnant avec NGINX, PHP-FPM et MariaDB à l'aide d'un fichier `docker-compose.yml`.

## Fichier `docker-compose.yml`

Le fichier de configuration `docker-compose.yml` pour cette étape est le suivant :

```yaml
version: '3.8'  # Version de Docker Compose à utiliser

services:
  # Service pour le serveur NGINX
  nginx:
    image: nginx
    container_name: nginx
    ports:
      - "8080:8080"
    networks:
      - my_network_3
    volumes:
      - ./config/nginx.conf:/etc/nginx/conf.d/default.conf
      - ./wordpress:/app

  # Service pour PHP-FPM
  php:
    image: php:7.4-fpm
    container_name: php
    networks:
      - my_network_3
    volumes:
      - ./wordpress:/app

  # Service pour la base de données MariaDB
  data:
    image: mariadb
    container_name: data
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress_user
      MYSQL_PASSWORD: wordpress_password
    networks:
      - my_ne
