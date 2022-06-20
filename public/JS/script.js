
var lat = 46.308602;
var lon = 4.809854;
var macarte = null;



// On initialise la latitude et la longitude de Charnay-les-Macon (centre de la carte)


const artisans = chercher();
console.log("test " + JSON.stringify(artisans));
// Fonction d'initialisation de la carte


function initMap() {

    var iconBase = 'JS/markerIcons/marker-icon.png'
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 15);
   
  
// Nous initialisons les groupes de marqueurs

// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
       
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

    // Il est toujours bien de laisser le lien vers la source des données
            attribution:  '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            minZoom: 1,
            maxZoom: 20,
            

                }).addTo(macarte);
                console.log("effet" + JSON.stringify(artisans));

                artisans.forEach(artisan => {
                    
               
                

                    var myIcon = L.icon({

                        iconUrl: iconBase,
                        iconSize: [20, 30],
                        iconAnchor: [25, 50],
                        popupAnchor: [-3, -76],
                    });

                console.log(JSON.stringify(artisan));
                   var marker = L.marker([artisan.lat, artisan.lon], { icon: myIcon }).addTo(macarte);
                     // pas de addTo(macarte), l'affichage sera géré par la bibliothèque des clusters

                     marker.bindPopup(artisan.name +" "+ artisan.address).openPopup();
                    
                                     
             });
               
            }
        
            window.onload = function(){
	// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
	initMap(); 
            };


    function chercher(){
                
        var addressUsers = document.querySelector('#map').dataset.address

        const nameAddress = JSON.parse(addressUsers);

        console.log(nameAddress);

        var artisanList = [];

        for (let i = 0; i < nameAddress.length; i++) {

            const elements = nameAddress[i];

            const element = Object.values(elements)[0];

            const nameArtisans = Object.keys(elements)[0];

            if(element != ""){

                const Http = new XMLHttpRequest();
                const url = "https://nominatim.openstreetmap.org/search?" + "q="+element.replace(/\s/g, '+')+ " FRANCE&format=json&addressdetails=1&limit=1&polygon_svg=1" // Données envoyées (q -> adresse complète, format -> format attendu pour la réponse, limit -> nombre de réponses attendu, polygon_svg -> fournit les données de polygone de la réponse en svg);

              

                Http.open("GET", url, false);
                Http.onload = function (e) {
                    if (Http.readyState === 4) {
                      if (Http.status === 200) {
                        if (Http.responseText != "") {
 
                            console.log("test3657878");
                            const response = JSON.parse(Http.responseText);
                        
                
                            if(response.length != 0){
    
                                userlat = response[0]['lat'];
                                console.log(userlat);
                            
                                userlon = response[0]['lon'];
                                console.log(userlon);
    
                                var currentArtisans = {
                                    name: nameArtisans,
                                    lat: userlat,
                                    lon: userlon,
                                    address: element
                                };
                                console.log("test2555" + currentArtisans);
                                artisanList.push(currentArtisans);
                            }  
                            else {
                                console.error("Adresse inconnue : " + element)
                            }
                            
                        }
                        
                      } else {
                        console.error(Http.statusText);
                      }
                    }
                  };
                Http.send();
            
                  
            } 

            
        }
        return  artisanList
    }
