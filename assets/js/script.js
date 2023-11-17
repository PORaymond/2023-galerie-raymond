function myFunction() {
    var largeurViewport = window.innerWidth;
    var x = document.getElementById("myLinks");
    var menu = document.getElementById("nav-menu");

    if (largeurViewport <576){ //version mobile
        menu.classList.toggle("montre");
        if (x.style.display === "block") {
            x.style.display = "none";

        } else {
            x.style.display = "block";

        }
    } else { //version ordinateur de bureau
        menu.classList.toggle("montre")
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

  }

function affichageChoixMenu() {

    document.getElementById('testaff1').classList.toggle("testAff");
    document.getElementById('testaff2').classList.toggle("testAff");

}
function afficherGrandeOeuvre(photo, prix, idOeuvre, titreOeuvre){

    $("#zone-affiche img").attr("src", photo);
    $("#zone-affiche h3").html(titreOeuvre);
    $("#zone-affiche div div").html(prix + " $");
    $("#btnAjouter").attr ("onclick", "ajouterAuPanier("+ idOeuvre +")");

    toggleZoneAffiche();
}

function toggleZoneAffiche(){
    $("#ecranCache").toggleClass("ecranVisible");
    $("#zone-affiche").toggleClass("invisible d-flex");
}

function ajouterAuPanier(idOeuvre){
    toggleZoneAffiche();
    $.post('controleurs/redirectionVersCatalogue.php',
        {id_oeuvre: idOeuvre},
        function (data, status){
          $("#nbOeuvresPanier").html(data);
          console.log(status);
        });
    $(".thumb_" + idOeuvre).remove();
}
function enleverOeuvre(idOeuvre, monPrix){
    $.post('controleurs/controleurRetirerOeuvre.php',
        {id_oeuvre: idOeuvre,
        prix: monPrix},
        function (data, status){
            console.log("status :" +status +" " +data);
            $("#total").html(data);
        });
    $(".casepanier" + idOeuvre).remove();
}

function montrerInputCategorie(){
    let nouvCat = document.getElementById("nouvelleCategorie");
    if (nouvCat.style.display === "none"){
        nouvCat.style.display ="block";
    } else {
      nouvCat.style.display = "none";
    }
}