<?php
function trouverDepartement($codePostal) {
  
    if(strlen($codePostal) !== 5) {
        return "Erreur : Le code postal doit comporter exactement 5 chiffres.";
    }
    

    if(!ctype_digit($codePostal)) {
        return "Erreur : Le code postal ne doit contenir que des chiffres.";
    }

    $departements = [
        91 => "Essonne",
        92 => "Hauts-de-Seine",
        75 => "Paris",
        77 => "Seine-et-Marne",
        93 => "Seine-Saint-Denis",
        94 => "Val-de-Marne",
        95 => "Val-d’Oise",
        78 => "Yvelines"
    ];
    
   
    $numDepartement = substr($codePostal, 0, 2);
   
 
    if(array_key_exists($numDepartement, $departements)) {
        return "Le code postal $codePostal correspond au département de " . $departements[$numDepartement] . ".";
    } else {
        return "Erreur : Le code postal correspond à un département hors de l'Île-de-France.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST["codePostal"]) && !empty($_POST["codePostal"])) {
        $codePostal = $_POST["codePostal"];
       
        $resultat = trouverDepartement($codePostal);

        echo $resultat;
    } else {
       
        echo "Erreur : Veuillez entrer un code postal.";
    }
}
?>
