### Installer le projet Artisans

[Comment bien rédiger un readme.md](https://fr.acervolima.com/qu-est-ce-que-le-fichier-readme-md/)

**Artisans**

Site de référencement d'artisans dans un quartier défini.

---
**Bien se placer à la racine du projet.**

- Pour initaliser le projet, entrez :
> `composer install`

---
## from **features/BDD**

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

### Jointures des Entity

---

 > `console make:entity Artisan

 New property name (press <return> to stop adding fields):
 > owner

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Owner 

What type of relationship is this?
 ------------ --------------------------------------------------------------------
  Type         Description
 ------------ --------------------------------------------------------------------
  ManyToOne    Each Artisan relates to (has) one Owner.
               Each Owner can relate to (can have) many Artisan objects

  OneToMany    Each Artisan can relate to (can have) many Owner objects.
               Each Owner relates to (has) one Artisan

  ManyToMany   Each Artisan can relate to (can have) many Owner objects.
               Each Owner can also relate to (can also have) many Artisan objects

  OneToOne     Each Artisan relates to (has) exactly one Owner.
               Each Owner also relates to (has) exactly one Artisan.
 ------------ --------------------------------------------------------------------

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > OneToMany

 A new property will also be added to the Owner class so that you can access and set the related Artisan object from it.

 New field name inside Owner [artisan]:
 >

 Is the Owner.artisan property allowed to be null (nullable)? (yes/no) [yes]:
 >

 updated: src/Entity/Artisan.php
 updated: src/Entity/Owner.php

 Add another property? Enter the property name (or press <return> to stop adding fields):   
 > type

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Type

What type of relationship is this?
 ------------ -------------------------------------------------------------------
  Type         Description
 ------------ -------------------------------------------------------------------
  ManyToOne    Each Artisan relates to (has) one Type.
               Each Type can relate to (can have) many Artisan objects

  OneToMany    Each Artisan can relate to (can have) many Type objects.
               Each Type relates to (has) one Artisan

  ManyToMany   Each Artisan can relate to (can have) many Type objects.
               Each Type can also relate to (can also have) many Artisan objects

  OneToOne     Each Artisan relates to (has) exactly one Type.
               Each Type also relates to (has) exactly one Artisan.
 ------------ -------------------------------------------------------------------

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > OneToOne

 Is the Artisan.type property allowed to be null (nullable)? (yes/no) [yes]:
 >

 Do you want to add a new property to Type so that you can access/update Artisan objects from it - e.g. $type->getArtisan()? (yes/no) [no]:
 >


 Add another property? Enter the property name (or press <return> to stop adding fields):   
 >


  Success! 
 

 Next: When you're ready, create a migration with php bin/console make:migration

PS C:\laragon\www\Artisans> symfony console doctrine:schema:update --force

 Updating database schema...

     6 queries were executed

                                                                                            
 [OK] Database schema updated successfully!                                                 
                                                                                            

PS C:\laragon\www\Artisans>

---
## from **features/BDD**

16 Juin 2022

- Route HomeController :

> `PS C:\laragon\www\Artisans> symfony console make:controller HomeController`

- Route ArtisanController :

> `PS C:\laragon\www\Artisans> symfony console make:controller ArtisanController`

- Route AdminController :

> `PS C:\laragon\www\Artisans> symfony console make:controller AdminController`

- Route AvisController :

> `PS C:\laragon\www\Artisans> symfony console make:controller AvisController`

### Megane :

- Installation du bundle KNP PAGINATORE Commande : 

> `composer require knplabs/knp-paginator-bundle`

- Créer un nouveau fichier yaml appeler knp-paginator.yaml et y insérer le code ci-dessous :

```yaml
knp_paginator:
    page_range: 5                       # number of links shown in the pagination menu (e.g: you have 10 pages, a page_range of 3, on the 5th page you'll see links to page 4, 5, 6)
    default_options:
        page_name: page                 # page query parameter name
        sort_field_name: sort           # sort field query parameter name
        sort_direction_name: direction  # sort direction query parameter name
        distinct: true                  # ensure distinct results, useful when ORM queries are using GROUP BY statements
        filter_field_name: filterField  # filter field query parameter name
        filter_value_name: filterValue  # filter value query parameter name
    template:
        pagination: '@KnpPaginator/Pagination/sliding.html.twig'     # sliding pagination controls template
        sortable: '@KnpPaginator/Pagination/sortable_link.html.twig' # sort link template
        filtration: '@KnpPaginator/Pagination/filtration.html.twig'  # filters template
```

