### Installer le projet Artisans

[Comment bien rédiger un readme.md](https://fr.acervolima.com/qu-est-ce-que-le-fichier-readme-md/)

**Artisans**

Site de référencement d'artisans dans un quartier défini.

---
**Bien se placer à la racine du projet.**

- Pour initaliser le projet, entrez :
> `composer install`

---
16 Juin 2022
### Création d'une BDD Artisans

- Commande dans VSCode

> `symfony console doctrine:database:create`

- Creation des Entity

> `symfony console make:entity Artisan`

> `symfony console make:entity Owner`

> `symfony console make:entity Type`

> `symfony console make:entity User`

*Les jointures des Entity ne sont pas faites*

- Relier avec php

> `symfony console make:migration`

> `symfony console doctrine:migrations:migrate`

> `symfony console doctrine:shema:update --force`

- Fixtures

> `composer require orm-fixtures --dev`

**Supprimer le fichier AppFixtures !!**

- Création des Fichiers Fixtures pour les Entity

> `symfony console make:fixtures ArticleFixtures`

> `symfony console doctrine:fixtures:load`





