### Installer le projet Artisans

[Comment bien rédiger un readme.md](https://fr.acervolima.com/qu-est-ce-que-le-fichier-readme-md/)

**Artisans**

Site de référencement d'artisans dans un quartier défini.

---
**Bien se placer à la racine du projet.**

- Pour initaliser le projet, entrez :
> `composer update`

> `composer install`

> `npm install` 

> `npm run build`

> `symfony console doctrine:database:create`

> `symfony console make:migration`

> `symfony console doctrine:migrations:migrate`

> `symfony console doctrine:schema:update --force`

> `composer require orm-fixtures --dev`

> `composer require knplabs/knp-paginator-bundle`

> `composer require symfonycasts/reset-password-bundle`

> `composer require vich/uploader-bundle`

> `composer require liip/imagine-bundle`

> `composer require easycorp/easyadmin-bundle`

> `symfony console doctrine:schema:update --force`

> `symfony console doctrine:fixtures:load`

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

> `symfony console doctrine:schema:update --force`

- Installer le bundle Fixtures

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

- Créer un nouveau fichier **yaml** dans **config/packages/knp-paginator.yaml** et y insérer le code ci-dessous :

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
---
### Mise en place des Avis artisan
---
- Il est possible pour un utilisateur de deposer un avis en ciblant un artisan.

- Pensez à faire un update après avoir pull le projet: 
> `symfony console doctrine:schema:update --force`

---
## from **features/forms**

17 Juin 2022

- Commande dans VSCode
> `Symfony console make: form ArtisanType`

```php
<?php

namespace App\Form;

use App\Entity\Artisan;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArtisanFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('name', TextType::class, [ 
                'label' => 'Nom de l\'artisan',
                'required' => false
                ])
                ->add('address', TextareaType::class, [
                    'required' => true,
                    'label' => 'Adresse complète de l\'artisan',
                    'constraints' => [
                       new NotBlank([
                          'message' => 'Veuillez saisir une adresse'
                       ])
                    ]
                ])
                ->add('phone', Integer::class, [
                    'label' => 'Télephone',
                    'required' => false,
                ])


                ->add('email', EmailType::class, [
                    'label' => 'Adresse e-mail',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'l\'adresse e-mail est obligatoire'
                        ]),
                        new Email([
                            'message' => 'Cet adresse e-mail est invalide'
                        ])
                ]
                ])
            
                ->add('description', TextareaType::class, [
                    'required' => false,
                    'label' => 'Description de l\'artisan'
                ])

                ->add('cover', Image::class, [
                    'required' => false,
                    'label' => 'image de couverture',
                    'download_label' => false,
                    'delete_label' => 'Cocher pour supprimer cette image',
                ])
                ->add('type', TextType::class,[
                    'label' => 'Nom de l\'artisan',
                'required' => false
            ])
            
            ->add('save', SubmitType::class, [
                'label' => 'Enregister'
            ])

            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => Artisan::class,
            ]);
        }
    }
```

---
#### L'entité User a été crée lors de la création de la table User avec :

- id	
- email 
- roles 
- password 	varchar(255) 	

---

### Authentification :

La table User crée et le le fichier de configuration sécurité.yaml est à jour mettons en place nos connexion et deconnexion.

- ligne de commande dans le terminal :
 
> `symfony console make:auth`

> `PS C:\laragon\www\Artisans> symfony console make:auth  `
 
- Répondre aux questions :

> `What style of authentication do you want? [Empty authenticator] :`

Répondre 1 afin afin de créer notre formulaire d'identification automatiquement.
 
> `The class name of the authenticator to create (e.g. AppCustomAuthenticator) :`

Choix d'un nom au fichier qui se chargera de l'authentification : ça sera "UserAuthenticator".
 
> `Choose a name for the controller class (e.g. SecurityController) [SecurityController] :`

Choisir un nom pour le contrôleur qui contient les routes vers le formulaire de connexion et vers la déconnexion. Je choisi par défaut : "SecurityController".
  
> `Do you want to generate a '/logout' URL? (yes/no) [yes] :`

Nous répondons "yes" afin de donner la possibilité à l'utilisateur de se déconnecter.

- Création de 3 fichiers :

    - **src/Security/UserAuthenticator.php**
    - **src/Controller/SecurityController.php**
    - **templates/security/login.html.twig**

- Modifications à apporter :

Ouvrir le fichier **"src/Security/UserAuthenticator.php".**

```php
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        // For example : return new RedirectResponse($this->urlGenerator->generate('some_route'));throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }
```

- Changer la route et mettre 'app-home' au lieu de 'some_route' afin de définir le chemin vers 'app-home' une fois l'utilisateur authentifié"

```php
public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // For example:
        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    
    }
```

---
### Inscription :
     
- Dans le terminal, mettre :
     
> `symfony console make:registration-form`
     
- Répondre aux questions :
     
> `Do you want to add a @UniqueEntity validation annotation on your Users class to make sure duplicate accounts aren't created? (yes/no) [yes] :`

Répondre yes afin d'avoir plusieurs comptes utilisateurs avec le même mail.
     
> `Do you want to send an email to verify the user's email address after registration? (yes/no) [yes] :`

Voulez-vous  veut envoyer un e-mail à l'utilisateur afin de vérifier la validité de son adresse e-mail. Il est préférable de répondre Yes
     
> `What email address will be used to send registration confirmations? e.g. mailer@your-domain.com :`

Si vous avez répondu oui à la question précédente, entrez une adresse e-mail. Elle sera utilisée en tant qu'adresse expéditeur.
     
> `What "name" should be associated with that email address? e.g. "Acme Mail Bot" :`

Entrez  un nom qui sera utilisé lors de l'envoi de l'e-mail de vérification. pour moi cel sera 'Artisan'
      
> `Do you want to automatically authenticate the user after registration? (yes/no) [yes] :`

Si vous voulez connecter automatiquement l'utilisateur une fois qu'il est inscrit répondre oui.


- Vu que nous avons répondu oui à la question précendente il faut installer :
      
> `composer require symfonycasts/verify-email-bundle`
      
- Ouvrir le fichier "**src/Controller/RegistrationController.php**" et modifiez la méthode **verifyUserEmail()**

```php
public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_home');
    }
```

- Modifiez la dernière ligne de la méthode, à savoir $this->redirectToRoute() , j'ai mis 'app_home' afin de rediriger sur la page d'acceuil une fois son       email vérifié.
    
- Mise à jour de la base de donnée :
    
> `symfony console doctrine:schema:update --force`
    
---

### Mot de passe oublié ?
    
- Sur le terminal tapé les lignes de commandes :
    
> `composer require symfonycasts/reset-password-bundle`
    
> `symfony console make:reset-password`
    
- Répondre aux questions :
    
> `What route should users be redirected to after their password has been successfully reset? [app_home] :`

Des que l'utilisateur a correctement modifié son mot de passe, où le rediriger ? Le mieux reste le formulaire de connexion soit "app_login".

> `What email address will be used to send reset confirmations? e.g. mailer@your-domain.com :`

Ici, nous pouvons choisir l'adresse e-mail utilisée pour envoyer l'e-mail permettant de modifier le mot de passe.

> `What "name" should be associated with that email address? e.g. "Acme Mail Bot" :`

On définit le nom qui sera affiché dans le mail de modification du mot de passe envoyé.
       
- Mettre à jour la base de données :
       
> `symfony console doctrine:schema:update --force`

---
       
- Pour ajouter un "**remember me**" lors de la connexion, aller sur : 
       
- Dans le fichier **config/packages/security.yaml** sous le main écrire :

```yaml
        main:
            remember_me:
                secret: '%kernel.secret%'
                lifetime: 2419200 #1 month in seconds
```

---

### Mise en place de Mailhog :
      
- télécharger votre version à l'adresse https://github.com/mailhog/MailHog/releases et lancer l'executable.
      
- Aller dans le fichier **.env** et mettre ceci ligne 42 : 

> `MAILER_DSN=smtp://localhost:1025`
      
-Pour mettre en place l’envoie automatique des mails, aller dans **.env** et modifier ligne 22 :

> `MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=1`

- Pour envoyer les mails automatiquement, aller dans **config\packages\messenger.yaml** et décommenter la ligne 16 ainsi que modifier la ligne 19 :

```yaml
sync: 'sync://'

Symfony\Component\Mailer\Messenger\SendEmailMessage: sync
```           

- Dans **templates/security/login.html.twig** décommenter :

```html  
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="_remember_me"> Remember me
            </label>
        </div>
```
---

### Installer VichUploaderBundle, qui est un otuil/bundle de gestion des images :
        
- Se placer dans le dossier racine du projet, taper dans le terminal :

> `composer require vich/uploader-bundle`
        
- Pour activer l’outil, aller dans config/packages/vich_uploder.yaml et décommenter à partir de la ligne 4, le modifier en fonction de ses besoins,           puis rajouter une autre option : 

```yaml
        mappings:
             artisans:
                 uri_prefix: /images/artisans
                 upload_destination: '%kernel.project_dir%/public/images/artisans'
                 namer: Vich\UploaderBundle\Naming\SmartUniqueNamer

          Rajouter aussi ceci sous la ligne 2 :

         metadata:
             type: attribute
```

- Ensuite, modifier l’entité qui vas contenir l’image : 

> `symfony console make:entity Artisan`

- Ajouter les objet suivants :

profileFile 
string
255
No

Profile
String
255
Yes

updated_at
datetime_immutable
yes

- Modifier dans le fichier de l’entité la ligne au-dessus de private $profileFile; :

> `#[Vich\UploadableField(mapping: 'authors', fileNameProperty: 'profile')]`

- Rajouter en dessous de la ligne #[ORM\Entity(repositoryClass: AuthorRepository::class)] :

> `#[Vich\Uploadable]`
     
- Rajouter le use : 

> `use Vich\UploaderBundle\Mapping\Annotation as Vich;`

- Modifier public function getProfileFile() et public function setProfileFile(string $profileFile) :

```php
    public function getProfileFile(): ?File
    {
        return $this->profileFile;
    }

    public function setProfileFile(?File $profileFile = null): self
    {
        $this->profileFile = $profileFile;

        if ($profileFile !== null) {
            $this->updated_at = new DateTimeImmutable();
        }

        return $this;
    }
```

- Vérifier si le use est bel et bien le bon :

> `use Symfony\Component\HttpFoundation\File\File;`
       
- Ajouter dans le formulaire correspondant à l’entité modifée :

```php    
        ->add('cover', VichImageType::class, [
                    'required' => false,
                    'label' => 'image de couverture',
                    'download_label' => false,
                    'delete_label' => 'Cocher pour supprimer cette image',
                    'imagine_pattern' => 'thumbnail',
                ])
```

- Envoyer les modifications sans écraser les données de la table : 

> `symfony console doctrine:schema:update –force`
        
---
        
- Installer LiipImagineBundle qui est un otuil/bundle de redimenssion d’images :
        
> `composer require liip/imagine-bundle`
        
- Rajouter : 

```php
            'imagine_pattern' => 'thumbnail',
        
            ->add('cover', VichImageType::class, [
                        'required' => false,
                        'label' => 'image de couverture',
                        'download_label' => false,
                        'delete_label' => 'Cocher pour supprimer cette image',
                        'imagine_pattern' => 'thumbnail',
                    ])
```
     
- Ajouter des contraintes à l’objet profileFile de l’entité artisan  afin de filtrer l’image :

```yaml
	#[ORM\Column(type: 'string', length: 255, nullable: true)]
    	#[Assert\Image(mimeTypesMessage: 'Ceci n\'est pas une image')]
    	#[Assert\File(maxSize: '1M', maxSizeMessage: 'Cette image ne doit pas dépasser les {{ limit }}')]
    	private $profile;
```
	
- Sur le terminal taper les lignes de commandes : 

> `npm install && npm run build`
	

- Pour initaliser le projet, entrez :
	
> `composer require vich/uploader-bundle`

> `composer require liip/imagine-bundle`
	
Télécharger et installer si besoin : https://github.com/mailhog/MailHog/releases

---
## from features/avisManage

21 juin 2021
### Mise en place des avis

Création d'un fichier js qui se nomme stars.js

- Enregistrement dans l'input du score attribué par un user.
- Mise en place d'écouteurs d'évènement au "click" et au "mousseout".
- Création d'un ecouteur d'evenement pour recuperer la valeur de la note donnée.
- Garder la valeur du click sur l'étoile.


### Mise en place de la route dans le controller et d'une vue pour la section des dépots des avis

- Création d'un formulaire et insertion dans la base de données.
- Choix de l'artisan
- Dépôt d'un commentaire
- Note attribué à l'artisan

---
## from features/Template
18 juin 2021

- Template de Home (Disponible dans **templates/template-Home/ressources**)

#### Toutes les images et les ressources (sauf la police à implémenter dans le code via googlefonts) sont disponibles dans templates/template-Home/ressources

- **Police décriture**
[Raleway](https://fonts.google.com/specimen/Raleway?query=Raleway&category=Sans+Serif,Display,Handwriting,Monospace)
```
Thin
Light
Regular
Medium
SemiBold

Couleurs de texte :

:root {
    --black: #000000; 
    --with: #FFFFFF;
    --gray: #242424;
    --medium-gray: #575756;
    --medim-light-gray: #706f6f;
    --light-gray: #e3e3e3;
}
```

- **Couleurs**
```
Background : blanc
Background NavBar : blanc
Bars de séparation : #c6c6c6
Background Footer : #3c3c3b
Bars de séparation du footer : #e3e3e3
```

- **Icons**
[flaticon](https://fonts.google.com/specimen/Raleway?query=Raleway&category=Sans+Serif,Display,Handwriting,Monospace)

- Icons utilisés :
```
Travaux : 
- plein : <i class="fi fi-sr-home"></i>
- contours : <i class="fi fi-rr-home"></i>

Bien être :
- plein : <i class="fi fi-sr-spa"></i>
- contours : <i class="fi fi-rr-spa"></i>

Alimentation :
- plein : <i class="fi fi-sr-salad"></i>
- contours : <i class="fi fi-rr-salad"></i>

Présation de service :
- plein : <i class="fi fi-sr-hand-holding-heart"></i>
- contours : <i class="fi fi-rr-hand-holding-heart"></i>

Étoile :
- plein : <i class="fi fi-ss-star"></i>
- contours : <i class="fi fi-rs-star"></i>

Position :
- plein : <i class="fi fi-sr-marker"></i>
- contours : <i class="fi fi-rr-marker"></i>
```

![image](https://www.zupimages.net/up/22/24/6miv.png)

----------------------------------------------------------------------------------------------------------------------------

- Pour initaliser le projet, entrez :

> `composer require easycorp/easyadmin-bundle`

- Installation VichUploader:

    Ajoutez la configuration minimale qui fait fonctionner le bundle :

        vich_uploader:
            db_driver: orm
            metadata:
                type: attribute

            mappings:
                artisans:
                    uri_prefix: /images/artisans
                    upload_destination: '%kernel.project_dir%/public/images/artisans'
                    namer: Vich\UploaderBundle\Naming\SmartUniqueNamer
                    delete_on_update: true
                    delete_on_remove: true

        Avant de télécharger des fichiers, nous devons configurer les "mappings" pour le VichUploaderBundle. Ces "mappages" indiquent au bundle où les fichiers doivent être téléchargés et quels chemins doivent être utilisés pour les afficher dans l'application. 

        ajouter le mappings:

        mappings:
                artisans: // nom du mapping
                    uri_prefix: /images/artisans
                    upload_destination: '%kernel.project_dir%/public/images/artisans' // Chemin d'upload
                    namer: Vich\UploaderBundle\Naming\SmartUniqueNamer

    Préparation des entités pour conserver des images:
    la première modification que nous faisons e est d'ajouter le #[Vich\Uploadable] à la classe d'entité : 
        #[Vich\Uploadable]
        >`class Artisan` 

    Ensuite, nous ajoutons deux nouvelles propriétés ( cover et coverFile):

        #[ORM\Column(type: 'text', nullable: true)]
        private $cover;

        #[Vich\UploadableField(mapping: 'artisans', fileNameProperty: 'cover')]
        #[Assert\Image(mimeTypesMessage: 'Ceci n\'est pas une image')] //verifie sic'est bien une image
        #[Assert\File(maxSize: '1M', maxSizeMessage: 'Cette image ne doit pas dépasser les {{ limit }} {{ suffix }}')] //Vérifie que l'image ne dépasse 1MO
        private $coverFile;

    Installer les Guetter Setter correspondants:

        /**
        * Get the value of coverFile
        */ 
        public function getCoverFile(): ?File 
        {
            return $this->coverFile;
        }

        /**
        * Set the value of coverFile
        *
        * @return  self
        */ 
        public function setCoverFile(?File $coverFile = null)
        {
            $this->coverFile = $coverFile;

            if ($coverFile !== null) {
                $this->updated_at = new DateTimeImmutable();

            }

            return $this;
        }

        public function getCover(): ?string
        {
            return $this->cover;
        }

        public function setCover(?string $cover): self
        {
            $this->cover = $cover;

            return $this;
        }
            




- Installation Easy Admin:

Dans le terminal lancer la commande:

> `composer require easycorp/easyadmin-bundle`

Création du DashBoard:

> `symfony console make:admin:dashboard`

"La page d'aministration du site est désormé accessible sous artisans.test/admin"

Création des fichiers CRUD:

Dans le terminal lancer la commande:

> `symfony console make:admin:crud`

Répondre aux questions:

 Which Doctrine entity are you going to manage with this CRUD controller?:
  [0] App\Entity\Artisan
  [1] App\Entity\Owner
  [2] App\Entity\ResetPasswordRequest
  [3] App\Entity\Type
  [4] App\Entity\User
  [5] Vich\UploaderBundle\Entity\File
 > 
 Choisir quel Doctrine on veut manager, pour nous cela sera Artisan, Owner, User, Type.

 Le faire pour chaque doctrine.
 Taper entrer à chaque question
  > `Which directory do you want to generate the CRUD controller in? [src/Controller/Admin/]:`
  > ` Namespace of the generated CRUD controller [App\Controller\Admin]:`

Créer la route:

    #[Route('/admin', name: 'admin')]

        public function index(): Response
        {
                    
            return $this->render('admin/index.html.twig');
        }

Modifier le fichier DashboardController.php afin que le Dashboard porte le nom Artisans:

     public function configureDashboard(): Dashboard
        {
            return Dashboard::new()
                ->setTitle('Artisans');// Mettre le nom artisans
                
        }

Modifier les menuItem qui vont apparaître pour l'administrateur dans le DashboardController.php

    public function configureMenuItems(): iterable
    {
            
        return [

            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'), // Ajout de Dashboard            
            MenuItem::linkToCrud('utilisateurs', 'fas fa-list', User::class),  // Ajout de utilisateurs          
            MenuItem::linkToCrud('Artisans', 'fas fa-list', Artisan::class), // Ajout de Artisans            
            MenuItem::linkToCrud('Avis', 'fas fa-list', Owner::class),  // Ajout de Avis              
            MenuItem::linkToCrud('Type', 'fas fa-list', Type::class),// Ajout de Type 
            
        ];
            
    }


Dans les fichiers CrudController.php modifier la public Function:

ArtisansCrudController.php

    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('name', 'nom'),
            TextField::new('address'),
            NumberField::new('phone'),
            EmailField::new('email')
            ->setFormTypeOption('disabled','disabled'), // l'eamil apparaît mais n'est pas modifiable
            TextEditorField::new('description'),
            TextField::new('coverFile', 'image') //Pour charger l'image dans l'edit
            ->setFormType(VichImageType::class) // redimenssionnement avec VichImage
            ImageField::new('cover', 'image') // faire apparaître l'image dans le formulaire
            ->setBasePath('images/artisans') // chemin d'accés de l'image dans le formulaire
            ->setUploadDir('public/images/artisans') pour uploader l'image
            ->hideOnForm() //pour n'apparaite que dans le form
            
        ];
    }
    
    Ajouter les Information de la table phpMyadmin que l'on veut récupérer.

UtilisateursCrudController.php

    public function configureFields(string $pageName): iterable
        {
            yield TextField::new('email'); //récupère l'email
            yield ArrayField::new('roles'); //récupère le role
            
            
            
        }

OwnerCrudController.php

public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),  //récupère l'ID
            TextField::new('avis'), //récupère l'avis
            
        ];
    }











