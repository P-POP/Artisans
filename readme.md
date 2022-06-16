### Installer le projet Artisans

[Comment bien rédiger un readme.md](https://fr.acervolima.com/qu-est-ce-que-le-fichier-readme-md/)

---
> Bien se placer à la racine du projet. 

- Pour initaliser le projet, entrez :
`composer install`

### Création de la BDD

-Création Entity Artisan
-Création Entity Owner
-Création de Entity Type

- Pour initialiser les Entity à votre BDD faire

- composer install

- symfony console doctrine:database:create

- symfony console make:migration

- symfony console doctrine:migration:migrate

- symfony console doctrine:fixtures:load

-Les jointures des Entity ne sont pas faites
