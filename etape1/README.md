## Étape 1 : Serveur HTTP et PHP

### Objectif :
Créer un serveur HTTP avec un interpréteur PHP utilisant le protocole FPM.

### Fichiers :
- `docker-compose.yml` : Définit les services HTTP et PHP
- `src/index.php` : Contient la page PHP avec `phpinfo()`
- `config/nginx.conf` : Configuration du serveur NGINX

### Commandes :
1. Démarrer les services :
commande: docker-compose up