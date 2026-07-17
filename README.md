# TomTroc

# Prérequis

Avant de lancer le projet, assurez-vous de disposer de :

- PHP 8 ou supérieur
- MySQL / MariaDB
- Un serveur web local compatible PHP (XAMPP recommandé)
- L'extension PHP **GD** activée

## Vérification de l'extension GD

L'application utilise l'extension **GD** de PHP pour le traitement des images (redimensionnement et conversion en JPEG).

Sous XAMPP, cette extension est généralement activée par défaut. Si ce n'est pas le cas, ouvrez le fichier `php.ini`, décommentez la ligne :

```ini
extension=gd
```

---

# Installation

## 1. Cloner le dépôt

```bash
git clone https://github.com/HB3317/TomTroc.git
```

Ou télécharger le dépôt GitHub puis le placer dans le répertoire web de votre serveur local.

---

## 2. Ajouter le fichier de configuration

Le fichier **config.php** est fourni avec les livrables remis sur la plateforme OpenClassrooms.

Renommez le fichier fourni en **config.php**, puis placez-le dans le dossier :

```
config/
```

---

## 3. Créer la base de données

Ouvrir phpMyAdmin (ou votre outil de gestion MySQL).

Créer une nouvelle base de données nommée :

```
tomtroc
```

---

## 4. Importer les données

Importer le fichier :

```
tomtroc.sql
```

Le fichier crée automatiquement les tables ainsi que les données nécessaires au fonctionnement de l'application.

---

## 5. Lancer le projet

Assurez-vous qu'Apache et MySQL sont démarrés, puis ouvrez dans votre navigateur :

```
http://localhost/tomtroc/index.php
```