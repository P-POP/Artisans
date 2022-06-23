window.onload = () => {

    //Récuperation la div qui englobe toutes les etoiles
    const stars =document.querySelectorAll(".star");

    // On cherche l'input
    const note = document.querySelector("#note");

    //On boucle sur les etoiles pour ajouter des ecouteurs d'événement
    for(star of stars){
        //On ecoute le survol de la souris
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color = "orange";

            //Permet de selectionner les etoiles soeurs précédentes
            let previousStar = this.previousElementSibling;

            //Boucle permettant de boucler à l'infinie au passage de la sourie
            while (previousStar) {
                //On passe l'etoile qui précède en orange
                previousStar.style.color="gold";
                //On récupere l'étoile qui la precede 
                previousStar = previousStar.previousElementSibling;
            }

        });


            // Création d'un ecouteur d'evenement pour recuperer la valeur de la note donnée
            star.addEventListener("click", function() {
                note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        });


    }

    //Permets de garder la valeur du click sur l'étoile et  grace a la valeur clicker 
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note) {
                star.style.color = "black";
            }else{
                star.style.color ="gold";
            }
            
        }

    }

}
