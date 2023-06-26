# quai-antique-symfony

⚠️⚠️ SITE TOUJOURS EN CONSTRUCTION ⚠️⚠️

Réalisé pour mes évaluations de fin d'études pour le Titre Professionnel Développeur web et web mobile.

Contexte : Dans un monde de plus en plus connecté, la présence en ligne est essentielle pour les entreprises, y compris les restaurants gastronomiques. Ce site web permet au restaurant de présenter ses plats exquis et son équipe talentueuse à travers des photos haute résolution. Les clients ont la possibilité de créer un compte personnel pour bénéficier d'offres spéciales et réserver facilement une table en ligne. Un système de réservation en ligne pratique est également disponible. L'administrateur du site peut modifier les menus, télécharger de nouvelles photos et gérer les réservations. 

Livrables :
La charte graphique et le maquettage, le guide d'utilisation et les diagrammes UML (diagramme de cas d'utilisation, de séquences et de classe) seront disponibles dans dans la copie de l'ECF.

Récupération du projet : 

- Utiliser GIT Clone pour récupérer le dépôt 
- git clone https://github.com/Thatyc/quai-antique-symfony

Installation :
- Déplacement dans le dossier : cd quai-antique-symfony
- Installation des dépendances : composer install
- Configurez la base de données : Ouvrez le fichier .env à la racine du projet et configurez les informations de connexion à la base de données (nom de la base de données, utilisateur, mot de passe disponibles dans dans la copie de l'ECF).
- Création de la base de données : php bin/console doctrine:database:create
- Création des tables (migrations) : php bin/console doctrine:migrations:migrate
- Lancer le serveur : php bin/console server:start

Bonne visite !







