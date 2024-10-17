## Étape 2 : Serveur HTTP, PHP-FPM et Base de Données SQL

### Objectif:
L'objectif de cette étape est de mettre en place une architecture composée de trois containers Docker :

- HTTP : un container avec un serveur HTTP (NGINX) qui écoute sur le port 8080.
- SCRIPT : un container avec un interpréteur PHP utilisant le protocole FPM pour traiter les requêtes PHP.
- DATA : un container avec un serveur de base de données SQL (MariaDB, MySQL, PostgreSQL, etc.).

### Structure:
- docker-compose.yml : fichier de configuration Docker pour orchestrer les services.
- src/ : répertoire contenant le code source PHP.
- index.php : fichier PHP affichant les informations de PHP avec phpinfo().
- test_bdd.php : fichier PHP qui interagit avec la base de données (une insertion et une lecture de données).
- config/ : répertoire contenant la configuration du serveur NGINX.
- nginx.conf : fichier de configuration NGINX, configuré pour gérer les fichiers PHP.

### Commandes:
- docker-compose up --build 
(L'option --build force Docker à reconstruire les images pour s'assurer que le service PHP a bien l'extension mysqli installée)

- docker-compose down
(Stoppe et supprime les containers créés par Docker Compose, libérant ainsi les ports et les volumes associés)