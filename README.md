Jeudi 16 Juin

# Artisans
Site de référencement d'artisans dans un quartier défini.

# Création d'une BDD Artisans

Commande dans VSCode

- symfony console doctrine:database:create

# Creation d'une Entity

- symfony console make:entity Artisan

- symfony console make:entity Owner

- symfony console make:entity Type

- symfony console make:entity User

# Relier avec php

- symfony console make:migration

- symfony console doctrine:migrations:migrate

 -symfony console doctrine:shema:update --force

# Fixtures

- composer require orm-fixtures --dev

### Supprimer le fichier AppFixtures !!

# Création des Fichiers Fixtures pour les Entity

- symfony console make:fixtures ArtisanFixtures

- symfony console make:fixtures TypeFixtures

- symfony console make:fixtures OwnerFixtures

- symfony console doctrine:fixtures:load



