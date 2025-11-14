# Gestion de Cinéma

## Description
Projet de gestion d'un cinéma en PHP avec interface CRUD pour les différentes entités du système.  
Le projet permet de gérer les entités suivantes :

- **INDIVIDU** : Gestion des utilisateurs ou clients
- **CINÉMA** : Gestion des cinémas
- **FILM** : Gestion des films
- **ACTEUR** : Gestion des acteurs
- **PROJECTION** : Gestion des projections des films
- **INTERROGATIONS** : Permet d’exécuter certaines requêtes prédéfinies pour afficher des informations (via une sidebar) sans que l’utilisateur voie directement la requête SQL.

## Capture d'écran
![Interface du projet](assets/screenshots/screenshot.png)

## Fonctionnalités principales

- Menu principal pour naviguer entre les entités
- CRUD complet pour chaque entité
- Affichage des résultats d'interrogations dans des tableaux
- Backend en PHP avec MySQL (`bdcinema2023`) pour la gestion des données

## Structure du projet
assets/ # CSS, JS, images
database/ # Scripts de base de données
public/ # Fichiers accessibles via navigateur
index.php # Page principale

## Installation

1. Cloner le projet :  
```bash
git clone git@github.com:aliou90/cinema.git
```

2. Placer le projet dans un serveur local (XAMPP, WAMP, ou PHP Built-in Server)

3. Assurez-vous que votre serveur MySQL est bien démarré

3. Initialiser la base de données
```bash
# Entrer dans le dossier du projet 
cd CHEMIN_VERS/cinema.local

# Initialiser (Créer la base de données, les tables et insérer les données)
php database/models/bdd_reset.php

```

4. Accéder à http://localhost/cinema.local/ via navigateur

**Auteur**

Aliou Mbengue - alioumbengue2828@gmail.com
