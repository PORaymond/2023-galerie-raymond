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

var currentStep = 0;
var steps = document.getElementsByClassName("step");
var prevBtn = document.getElementById("prevBtn");
var nextBtn = document.getElementById("nextBtn");

function showStep(stepIndex) {
    for (var i = 0; i < steps.length; i++) {
        steps[i].classList.add("hidden");
    }
    steps[stepIndex].classList.remove("hidden");

    if (stepIndex === 0) {
        prevBtn.disabled = true;
    } else {
        prevBtn.disabled = false;
    }

    if (stepIndex === steps.length - 1) {
        nextBtn.disabled = true;
    } else {
        nextBtn.disabled = false;
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
}

function nextStep() {
    if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    showStep(currentStep);
});