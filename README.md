
# Boutique de Produits de Beauté et de Soins

Ce projet est une application e-commerce développée avec Laravel pour une boutique en ligne de produits de beauté et de soins. L'objectif est de permettre aux utilisateurs de parcourir, acheter et gérer des produits de beauté et de soins.

## Fonctionnalités

- Affichage d'une liste des produits disponibles.
- Création, modification et suppression d'un produit.
- Affichage du détail d'un produit.
- Système d'authentification avec des rôles (utilisateur, administrateur).
- Pagination de la liste des produits.
- Tri par date ou par ordre alphabétique des produits.
- Affichage des produits selon leurs catégorie.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé ce qui suit sur votre système :

- PHP >= 7.4
- Composer
- MySQL

## Installation

1. Clonez le dépôt :

   ```bash
   git clone https://github.com/Youcode-Classe-E-2023-2024/Maryam_Jammar_e-commerce.git
   ```

2. Accédez au répertoire du projet :

   ```bash
   cd beauty-products
   ```

3. Installez les dépendances PHP avec Composer :

   ```bash
   composer install
   ```

4. Copiez le fichier `.env.example` et renommez-le en `.env`. Configurez les paramètres de base de données dans ce fichier.

5. Générez une clé d'application Laravel :

   ```bash
   php artisan key:generate
   ```

6. Exécutez les migrations pour créer les tables de base de données :

   ```bash
   php artisan migrate
   ```

7. Démarrez le serveur de développement :

   ```bash
   php artisan serve
   ```

8. Accédez à l'URL fournie par `php artisan serve` dans votre navigateur pour accéder à l'application.

## Utilisation

- Connectez-vous en tant qu'administrateur pour gérer les produits et les utilisateurs.
- Parcourez la liste des produits disponibles.
- Consultez les détails des produits.
- Créez, modifiez ou supprimez des produits en tant qu'administrateur.

## Contribution

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à ce projet, veuillez soumettre une demande d'extraction (pull request) avec vos modifications.

## Auteurs

- [Maryam](https://github.com/J-Maryam)

## Licence

Ce projet est sous licence MIT. Consultez le fichier `LICENSE` pour plus de détails.
