<?php

namespace App\DataFixtures;

use App\Entity\Artisan;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArtisanFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $nom = [ "L'Atelier","La P'tite Retouche","L'Encrerie Macon","La voie du bio", "Jardin d'O","BOUCHERIE Christian Ravassard", "BUIRON Gérard", "Jaillet Menuiserie","Eclat de Chocolat","Deviservices Clé et Cordonnier", "Le Calypso"];
        $adresse = ["78 Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon","33 Place de l’Europe, 71850 Charnay-lès-Mâcon","5 Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon","106B Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon","62 Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon","50 Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon ","52 Chemin du Bois d'Alier, 71850 Charnay-lès-Mâcon ","140 Chemin des Liquidambars, 71850 Charnay-lès-Mâcon ","99 Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon ","23 Rue de la Chapelle, 71850 Charnay-lès-Mâcon","97 Grande Rue de la Coupée, 71850 Charnay-lès-Mâcon"];
        $phone = [ "0385345780","0987172366","0385201792","0385380469", "0385201186","0385341972","0385320072","0385342032","0385220145","0372835420 ", "0385389473"];
        $mail = [  "atelier@atelier.fr","retouche@retouche.fr", "papeterie@lencrerie.fr","severine@lavoiedubio.fr","jardindo@jardindo.fr","crboucherie@mail.com","buirongege@mail.fr","contact@jaillet.fr","choc@mail.fr","clé@cordonnier.fr", "calypso@poisson.fr"];
        $description = [ "L'atelier est une boulangerie pâtisserie ouvert du lundi au dimance",
        "La P’tite Retouche réalise des retouches vêtements comme les ourlets, ajustements à la taille et customisation. Confection de rideaux, housse de canapé, store bateau. N’hésitez pas à me contacter pour plus de renseignements.",
        "L'Encrecrie Mâcon vous propose une service de bureautique avec cartouche d'encre et tous le nécessaire pour votre bureau ",
        "La voie du Bio vous propose des produits en vracs, bio et locaux avec une vente de pain bio mais aussi en cas de petite faim, profiter des tables et chaises devant la boutique pour y déguster un délicieux thé ou café, du jus de fruit, des sirops et des biscuits du magasin !",
        "Au Jardin'O, vous trouverez un accueil personnalisé et un environnement où dominent le calme et la sérénité.
        Un espace dédié à l’eau où vous pourrez profiter d’un hammam et d’un SPA.",
        "Ancien Chef cuisinier, installé historiquement à Charnay les Mâcon, Christian Ravassard et son équipe vous propose au quotidien une cuisine simple et authentique au travers de son activité traiteur.",
        "Artisans plâtriers peintres depuis 1978, nous accompagnons particuliers et professionnels pour leurs projets de rénovation et décoration, avec nos prestations reconnues : plâtrerie-peinture, isolation, façade, pose de revêtements murs et sols. Fort de notre expérience, nous vous apportons tous les conseils techniques et préconisations pour un résultat fini de qualité, au plus proche de vos envies. N'hésitez pas à nous consulter pour prendre rendez-vous afin de discuter de votre projet et établir un devis.",
        "Spécialisés dans les travaux de rénovation, d'isolation et de plâtrerie-peinture, nous vous accompagnons dans vos projets, que vous soyez particuliers ou syndics de copropriété. Nous intervenons également pour la peinture intérieure et extérieure ainsi que pour le revêtement mural de votre habitat. Contactez-nous pour plus d'informations." ,
        "Notre chocolaterie vous accueille pour vous régaler avec nos succulents chocolats. Ici, une large variété de confiseries (confiseries artisanales, caramels et pralines) de même que de nombreux chocolats (chocolats personnalisés, fondue au chocolat et chocolat blanc) sont à votre disposition. Essayez nos marrons glacés, nos dragées et nos chocolats de Saint-Valentin ou de mariage. Nous disposons d'articles sans sucre. Sollicitez-nous pour des cadeaux d'entreprises. Livraison à domicile. ",
        "Vous recherchez une cordonnerie aux alentours de Charnay-lès-Mâcon? Vous cherchez à faire réparer vos chaussures ? Vous désirez réaliser un double des clés de votre maison ou de votre voiture ? Vous avez des documents, des cartes visite, sur clé USB, carte SD, téléphone (penser a votre cable), ou par mail à imprimer ? Vous avez des piles à remplacer (Montres, Télécommande de voiture/portail/garage etc) ? Vous avez besoin de graver une plaque d’immatriculation ? Faites confiance à Deviservices !",
        "Installée depuis 2001 à Mâcon, la poissonnerie Le Calypso sélectionne les meilleurs produits de la mer pour ravir vos papilles : poissons, coquillages, huitres et crustacés."];
        $cover=["atelier.jpg","laPetiteRetouche.jpg","lEncrerie.jpg","laVoieDuBio.jpg","jardinDo.jpg","boucherie.jpg","buiron.png","jaillet.webp","eclatChoc.jpg", "devisService.jpg","calypso.webp"];

        for ($i=0; $i < count($nom) ; $i++) { 
           //Instancie l'entité avec laquelle travailler
           $artisans = new Artisan();
           $artisans->setName($nom[$i]);
           $artisans->setAddress($adresse[$i]);
           $artisans->setPhone($phone[$i]);
           $artisans->setEmail($mail[$i]);
           $artisans->setDescription($description[$i]);
           $artisans->setCover($cover[$i]);
           $artisans->setMaker($this->getReference("user_".  rand(0, 9)));
           // Met de côté les données en attente d'insertion
           $manager->persist($artisans);
        }
           
       

       $manager->flush();
    }
    public function getDependencies(){
        return [
            UserFixtures::class
        ];
    }
}
