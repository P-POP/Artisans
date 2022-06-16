# Artisans
Site de référencement d'artisans dans un quartier défini.
 Création des Contrôleurs.
 
Route HomeController :

PS C:\laragon\www\Artisans> symfony console make:controller HomeController

Route ArtisanController :

PS C:\laragon\www\Artisans> symfony console make:controller ArtisanController

Route AdminController :

PS C:\laragon\www\Artisans> symfony console make:controller AdminController

Route AvisController :

PS C:\laragon\www\Artisans> symfony console make:controller AvisController



Megane : 

Installation du bundle KNP PAGINATORE 
Commande : composer require knplabs/knp-paginator-bundle 

Créer un nouveau fichier yaml appeler knp-paginator.yaml et y insérer le code ci-dessous :

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

 
 
