// Fichier unique JS gérant toutes les animations de notre site ! 
// les règles d'écritures sont les suivantes :
// - on commence toujours par un texte citant la page concerné et la fonctionnalité du code,
// - ensuite on récupère chaque élément impacté par l'animation
// - toujours faire un if avec l'élement sélectionné qui va recevoir le Listener  pour éviter les bugs sur d'autres pages
// - on ajoute ensuite l'événement et le contenu
// - si besoin de fonction pour factoriser le code je l'ajoute en dessous des Listener


// Views/devisOuvertureNb.php (ou Bis) avec Views/devisOuvertureVantaux.php
// Gere l'affichage des choix d'ouverture de vantaux en fonction du nombre de vantaux sélectionné

var card_fenetre1 = document.getElementsByName("vantail");
var card_fenetre2 = document.getElementsByName("vantaux");

var btn1vantail = document.getElementById("vantail1");
var btn2vantail = document.getElementById("vantail2");

if (btn1vantail) {
    btn1vantail.addEventListener("click", function () {
        for (let index = 0; index < card_fenetre2.length; index++) {
            card_fenetre2[index].classList.add("invisible");
        }
        for (let index = 0; index < card_fenetre1.length; index++) {
            card_fenetre1[index].classList.remove("invisible");
        }
    })
}

if (btn2vantail) {
    btn2vantail.addEventListener("click", function () {
        for (let index = 0; index < card_fenetre1.length; index++) {
            card_fenetre1[index].classList.add("invisible");
        }
        for (let index = 0; index < card_fenetre2.length; index++) {
            card_fenetre2[index].classList.remove("invisible");
        }
    })
}

// views/devisVolet.php
// gère l'affichage ou non des choix de volet roulant

var pictureAvecVR = document.getElementById("avecVR");
var pictureSansVR = document.getElementById("sansVR");
var rowDetailVR = document.getElementById("detailVR");
var lienSansVR = document.getElementById("lien")

if (pictureAvecVR) {
    pictureAvecVR.addEventListener("click", function () {
        rowDetailVR.classList.remove("invisible");
        lienSansVR.classList.add("invisible");
    })
}

if (pictureSansVR) {
    pictureSansVR.addEventListener("click", function () {
        rowDetailVR.classList.add("invisible");
        lienSansVR.classList.remove("invisible");
    })
}

// views/devisVolet.php
// gère l'affichage du choix sélectionné pour les VR

var couleur_VR = document.getElementsByName("couleur_VR")
var titreCouleur = document.getElementsByName("titreCouleur");
var choix_couleur = document.getElementById("choix_couleur");

if (couleur_VR) {
    for (let index = 0; index < couleur_VR.length; index++) {
        couleur_VR[index].addEventListener("click", function () {
            var nom = titreCouleur[index].innerHTML;
            choix_couleur.textContent = nom;
        })
    }
}

var manoeuvre_VR = document.getElementsByName("manoeuvre_VR")
var titreManoeuvre = document.getElementsByName("titreManoeuvre");
var choix_commande = document.getElementById("choix_commande");

if (manoeuvre_VR) {
    for (let index = 0; index < manoeuvre_VR.length; index++) {
        manoeuvre_VR[index].addEventListener("click", function () {
            var nom = titreManoeuvre[index].innerHTML;
            choix_commande.textContent = nom;
        })
    }
}

// views/devisMatiere.php
// gère l'affichage du nom de la couleur sélectionnée

var couleur_ext = document.getElementsByName("couleur_ext");
var couleur_int = document.getElementsByName("couleur_int");
var titreExt = document.getElementsByName("titreExt");
var titreInt = document.getElementsByName("titreInt");
var choix_coul_ext = document.getElementById("choix_coul_ext");
var choix_coul_int = document.getElementById("choix_coul_int");

if (couleur_ext) {
    for (let index = 0; index < couleur_ext.length; index++) {
        couleur_ext[index].addEventListener("click", function () {
            var nom = titreExt[index].innerHTML;
            choix_coul_ext.textContent = nom;
        })
    }
}

if (couleur_int) {
    for (let index = 0; index < couleur_int.length; index++) {
        couleur_int[index].addEventListener("click", function () {
            var nom = titreInt[index].innerHTML;
            choix_coul_int.textContent = nom;
        })
    }
}

// views/devisVitrage.php
// Gère l'affichage du type de vitrage sélectionné

var vit_perf_acoustique = document.getElementsByName("vit_perf_acoustique");
var vit_perf_securite = document.getElementsByName("vit_perf_securite");
var choix_vitrage_composition = document.getElementById("choix_vitrage_composition");
var choix_vitrage_sw = document.getElementById("choix_vitrage_sw");
var choix_vitrage_uw = document.getElementById("choix_vitrage_uw");
var vit_composition_list = document.getElementsByName("vit_composition_list");
var vit_sw_list = document.getElementsByName("vit_sw_list");
var vit_uw_list = document.getElementsByName("vit_uw_list");

var acoustique = 1;
var securite = 1;
var acoustique_securite = 1;
var vit_composition = "";
var vit_sw = "";
var vit_uw = "";

if (vit_perf_acoustique) {
    for (let index = 0; index < vit_perf_acoustique.length; index++) {
        vit_perf_acoustique[index].addEventListener("click", function () {
            acoustique = parseInt(vit_perf_acoustique[index].value);
            acoustique_securite = acoustique + (3 * (securite - 1));
            vit_composition = vit_composition_list[acoustique_securite].innerHTML;
            choix_vitrage_composition.textContent = vit_composition;
            vit_sw = vit_sw_list[acoustique_securite].innerHTML;
            choix_vitrage_sw.textContent = vit_sw;
            vit_uw = vit_uw_list[acoustique_securite].innerHTML;
            choix_vitrage_uw.textContent = vit_uw;
        })
    }
}

if (vit_perf_securite) {
    for (let index = 0; index < vit_perf_securite.length; index++) {
        vit_perf_securite[index].addEventListener("click", function () {
            securite = parseInt(vit_perf_securite[index].value);
            acoustique_securite = acoustique + (3 * (securite - 1));
            vit_composition = vit_composition_list[acoustique_securite].innerHTML;
            choix_vitrage_composition.textContent = vit_composition;
            vit_sw = vit_sw_list[acoustique_securite].innerHTML;
            choix_vitrage_sw.textContent = vit_sw;
            vit_uw = vit_uw_list[acoustique_securite].innerHTML;
            choix_vitrage_uw.textContent = vit_uw;
        })
    }
}

// views/devisRecap.php
// Gère le bouton +/- pour gérer la quantité de la menuiserie avant d'accèder au panier

var quantity_moins = document.getElementById("quantity-");
var quantity_plus = document.getElementById("quantity+");
var quantity = document.getElementById("quantity");
var input_quantity = document.getElementById("input_quantity");

if (quantity_moins) {
    quantity_moins.addEventListener("click", function () {
        var value = parseInt(quantity.innerHTML);
        if (value != 1) {
            value--;
            quantity.textContent = value;
            input_quantity.value = value;
        }
    })
}

if (quantity_plus) {
    quantity_plus.addEventListener("click", function () {
        var value = parseInt(quantity.innerHTML);
        value++;
        quantity.textContent = value;
        input_quantity.value= value;
    })
}

// views/formulaire.php
// Gère l'affichage du bon formulaire en fonction du fait que le client soit déjà inscrit ou non

var legend_connection = document.getElementById("legend_connection");
var legend_inscription = document.getElementById("legend_inscription");
var form_connection = document.getElementById("form_connection");
var form_inscription = document.getElementById("form_inscription");

if (legend_connection) {
    legend_connection.addEventListener("click", function () {
        form_connection.classList.remove("invisible");
        form_inscription.classList.add("invisible");
    })
}

if (legend_inscription) {
    legend_inscription.addEventListener("click", function () {
        form_inscription.classList.remove("invisible");
        form_connection.classList.add("invisible");
    })
}

// Controle du formulaire d'inscription

var regTexte50 = new RegExp("^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$");
var regMail = new RegExp("^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$");
var regCP = new RegExp("^[0-9]{5}$");
var regTelephone = new RegExp("^[0-9]{10,}$");
var regAdresse = new RegExp("^[a-zA-Z0-9'-àéèêâûùë]{5,}$");
var regPassword = new RegExp("^[a-zA-Z0-9'-àéèêâûùë!?:&]{1,50}$")

var cli_nom = document.getElementById("cli_nom");

if (cli_nom) {    
    cli_nom.addEventListener("blur", function() {
        if (regTexte50.test(cli_nom.value)) {
            cli_nom.classList.remove("KO");
            cli_nom.classList.add("OK");
            document.getElementById("aideCli_nom").textContent = "";
        } else {
            document.getElementById("aideCli_nom").textContent = "Champs incorrect";
            document.getElementById("aideCli_nom").style.color = "red";
            cli_nom.classList.remove("OK");
            cli_nom.classList.add("KO");
        }
    });
}
    
var cli_prenom = document.getElementById("cli_prenom");

if (cli_prenom) {    
    cli_prenom.addEventListener("blur", function() {
        if (regTexte50.test(cli_prenom.value)) {
            cli_prenom.classList.remove("KO");
            cli_prenom.classList.add("OK");
            document.getElementById("aideCli_prenom").textContent = "";
        } else {
            document.getElementById("aideCli_prenom").textContent = "Champs incorrect";
            document.getElementById("aideCli_prenom").style.color = "red";
            cli_prenom.classList.remove("OK");
            cli_prenom.classList.add("KO");
        }
    });
}
    
var cli_rue = document.getElementById("cli_rue");

if (cli_rue) {    
    cli_rue.addEventListener("blur", function() {
        if (regTexte50.test(cli_rue.value)) {
            cli_rue.classList.remove("KO");
            cli_rue.classList.add("OK");
            document.getElementById("aideCli_rue").textContent = "";
        } else {
            document.getElementById("aideCli_rue").textContent = "Champs incorrect, nous ne savons pas gérer les retours à la ligne !";
            document.getElementById("aideCli_rue").style.color = "red";
            cli_rue.classList.remove("OK");
            cli_rue.classList.add("KO");
        }
    });
}

var cli_ville = document.getElementById("cli_ville");

if (cli_ville) {    
    cli_ville.addEventListener("blur", function() {
        if (regTexte50.test(cli_ville.value)) {
            cli_ville.classList.remove("KO");
            cli_ville.classList.add("OK");
            document.getElementById("aideCli_ville").textContent = "";
        } else {
            document.getElementById("aideCli_ville").textContent = "Champs incorrect";
            document.getElementById("aideCli_ville").style.color = "red";
            cli_ville.classList.remove("OK");
            cli_ville.classList.add("KO");
        }
    });
}
    
var cli_pays = document.getElementById("cli_pays");

if (cli_pays) {    
    cli_pays.addEventListener("blur", function() {
        if (regTexte50.test(cli_pays.value)) {
            cli_pays.classList.remove("KO");
            cli_pays.classList.add("OK");
            document.getElementById("aideCli_pays").textContent = "";
        } else {
            document.getElementById("aideCli_pays").textContent = "Champs incorrect";
            document.getElementById("aideCli_pays").style.color = "red";
            cli_pays.classList.remove("OK");
            cli_pays.classList.add("KO");
        }
    });
}

var CP = document.getElementById("cli_code_postal");

if (CP) {    
    CP.addEventListener("blur", function() {
        if (regCP.test(CP.value)) {
            CP.classList.remove("KO");
            CP.classList.add("OK");
            document.getElementById("aideCli_code_postal").textContent = "";
        } else {
            CP.classList.remove("OK");
            CP.classList.add("KO");
            document.getElementById("aideCli_code_postal").textContent = "Entrez le code postal sur 5 chiffres SVP!!!";
            document.getElementById("aideCli_code_postal").style.color = "red";
        }
    });
}
    
var cli_mail = document.getElementById("cli_mail");

if (cli_mail) {    
    cli_mail.addEventListener("change", function() {
        if (regMail.test(cli_mail.value)) {
            cli_mail.classList.remove("KO");
            cli_mail.classList.add("OK");
            document.getElementById("aideCli_email").textContent = "";
            console.log('change mail2');
            
        } else {
            document.getElementById("aideCli_email").textContent = "Votre adresse mail est incorrect";
            document.getElementById("aideCli_email").style.color = "red";
            cli_mail.classList.remove("OK");
            cli_mail.classList.add("KO");
        }
    });
}
    
var phone = document.getElementById("cli_telephone");

if (phone) {    
    phone.addEventListener("blur", function() {
        if (regTelephone.test(phone.value)) {
            phone.classList.remove("KO");
            phone.classList.add("OK");
            document.getElementById("aideCli_telephone").textContent = "";
        } else {
            document.getElementById("aideCli_telephone").textContent = "Le numéro doit comporter uniquement 10 chiffres";
            document.getElementById("aideCli_telephone").style.color = "red";
            phone.classList.remove("OK");
            phone.classList.add("KO");
        }
    });
}

var cli_password = document.getElementById("cli_password");

if (cli_password) {
    cli_password.addEventListener("blur", function() {
        if (regPassword.test(cli_password.value)) {
            cli_password.classList.remove("KO");
            cli_password.classList.add("OK");
            document.getElementById("aideCli_password").textContent = "";
        } else {
            document.getElementById("aideCli_password").textContent = "Le mot de passe doit contenir entre 3 et 255 caractères";
            document.getElementById("aideCli_password").style.color = "red";
            cli_password.classList.remove("OK");
            cli_password.classList.add("KO");
        }
    });
}

var cli_password2 = document.getElementById("cli_password2");

if (cli_password2) {
    cli_password2.addEventListener("blur", function() {
        if (cli_password2.value == cli_password.value) {
            cli_password2.classList.remove("KO");
            cli_password2.classList.add("OK");
            document.getElementById("aideCli_password2").textContent = "";
        } else {
            document.getElementById("aideCli_password2").textContent = "Vos mots de passe ne sont pas identiques";
            document.getElementById("aideCli_password2").style.color = "red";
            cli_password2.classList.remove("OK");
            cli_password2.classList.add("KO");
        }
    });
}



// Controle 
var submit_inscription = document.getElementById("submit_inscription");

if (submit_inscription) {
    submit_inscription.addEventListener("click", function(e) {
        console.log("test")
        if (regTexte50.test(cli_nom.value) && regTexte50.test(cli_prenom.value) && regTexte50.test(cli_rue.value) && regCP.test(CP.value) && regTexte50.test(cli_ville.value) && regTexte50.test(cli_pays.value) && regMail.test(cli_mail.value) && regTelephone.test(phone.value) && regPassword.test(cli_password.value) && (cli_password.value == cli_password2.value)) {
            window.alert("Votre formulaire a bien été envoyé!!!");
        } else {
            e.preventDefault();
            window.alert("Veuillez vérifier votre formulaire avant envoi.");
        }
    });
}


// controle saisie adresse livraison

var com_livraison_rue = document.getElementById("com_livraison_rue");

if (com_livraison_rue) {    
    com_livraison_rue.addEventListener("blur", function() {
        if (regTexte50.test(com_livraison_rue.value)) {
            com_livraison_rue.classList.remove("KO");
            com_livraison_rue.classList.add("OK");
            document.getElementById("aide_com_livraison_rue").textContent = "";
        } else {
            document.getElementById("aide_com_livraison_rue").textContent = "Champs incorrect, nous ne savons pas gérer les retours à la ligne !";
            document.getElementById("aide_com_livraison_rue").style.color = "red";
            com_livraison_rue.classList.remove("OK");
            com_livraison_rue.classList.add("KO");
        }
    });
}

var com_livraison_ville = document.getElementById("com_livraison_ville");

if (com_livraison_ville) {    
    com_livraison_ville.addEventListener("blur", function() {
        if (regTexte50.test(com_livraison_ville.value)) {
            com_livraison_ville.classList.remove("KO");
            com_livraison_ville.classList.add("OK");
            document.getElementById("aide_com_livraison_ville").textContent = "";
        } else {
            document.getElementById("aide_com_livraison_ville").textContent = "Champs incorrect";
            document.getElementById("aide_com_livraison_ville").style.color = "red";
            com_livraison_ville.classList.remove("OK");
            com_livraison_ville.classList.add("KO");
        }
    });
}
    
var com_livraison_pays = document.getElementById("com_livraison_pays");

if (com_livraison_pays) {    
    com_livraison_pays.addEventListener("blur", function() {
        if (regTexte50.test(com_livraison_pays.value)) {
            com_livraison_pays.classList.remove("KO");
            com_livraison_pays.classList.add("OK");
            document.getElementById("aide_com_livraison_pays").textContent = "";
        } else {
            document.getElementById("aide_com_livraison_pays").textContent = "Champs incorrect";
            document.getElementById("aide_com_livraison_pays").style.color = "red";
            com_livraison_pays.classList.remove("OK");
            com_livraison_pays.classList.add("KO");
        }
    });
}

var CP = document.getElementById("com_livraison_code_postal");

if (CP) {    
    CP.addEventListener("blur", function() {
        if (regCP.test(CP.value)) {
            CP.classList.remove("KO");
            CP.classList.add("OK");
            document.getElementById("aide_com_livraison_code_postal").textContent = "";
        } else {
            CP.classList.remove("OK");
            CP.classList.add("KO");
            document.getElementById("aide_com_livraison_code_postal").textContent = "Entrez le code postal sur 5 chiffres SVP!!!";
            document.getElementById("aide_com_livraison_code_postal").style.color = "red";
        }
    });
}

// controle saisie adresse facture

var com_facture_rue = document.getElementById("com_facture_rue");

if (com_facture_rue) {    
    com_facture_rue.addEventListener("blur", function() {
        if (regTexte50.test(com_facture_rue.value)) {
            com_facture_rue.classList.remove("KO");
            com_facture_rue.classList.add("OK");
            document.getElementById("aide_com_facture_rue").textContent = "";
        } else {
            document.getElementById("aide_com_facture_rue").textContent = "Champs incorrect, nous ne savons pas gérer les retours à la ligne !";
            document.getElementById("aide_com_facture_rue").style.color = "red";
            com_facture_rue.classList.remove("OK");
            com_facture_rue.classList.add("KO");
        }
    });
}

var com_facture_ville = document.getElementById("com_facture_ville");

if (com_facture_ville) {    
    com_facture_ville.addEventListener("blur", function() {
        if (regTexte50.test(com_facture_ville.value)) {
            com_facture_ville.classList.remove("KO");
            com_facture_ville.classList.add("OK");
            document.getElementById("aide_com_facture_ville").textContent = "";
        } else {
            document.getElementById("aide_com_facture_ville").textContent = "Champs incorrect";
            document.getElementById("aide_com_facture_ville").style.color = "red";
            com_facture_ville.classList.remove("OK");
            com_facture_ville.classList.add("KO");
        }
    });
}
    
var com_facture_pays = document.getElementById("com_facture_pays");

if (com_facture_pays) {    
    com_facture_pays.addEventListener("blur", function() {
        if (regTexte50.test(com_facture_pays.value)) {
            com_facture_pays.classList.remove("KO");
            com_facture_pays.classList.add("OK");
            document.getElementById("aide_com_facture_pays").textContent = "";
        } else {
            document.getElementById("aide_com_facture_pays").textContent = "Champs incorrect";
            document.getElementById("aide_com_facture_pays").style.color = "red";
            com_facture_pays.classList.remove("OK");
            com_facture_pays.classList.add("KO");
        }
    });
}

var CP = document.getElementById("com_facture_code_postal");

if (CP) {    
    CP.addEventListener("blur", function() {
        if (regCP.test(CP.value)) {
            CP.classList.remove("KO");
            CP.classList.add("OK");
            document.getElementById("aide_com_facture_code_postal").textContent = "";
        } else {
            CP.classList.remove("OK");
            CP.classList.add("KO");
            document.getElementById("aide_com_facture_code_postal").textContent = "Entrez le code postal sur 5 chiffres SVP!!!";
            document.getElementById("aide_com_facture_code_postal").style.color = "red";
        }
    });
}

// views/devisType.php
// Gère les évenements liés au contrôle de saisie de la hauteur et la largeur sur la vue devisType

var men_hauteur = document.getElementById("men_hauteur");
var men_largeur = document.getElementById("men_largeur");

var cm = document.getElementById("cm");
var mm = document.getElementById("mm");

var span_hauteur = document.getElementById("span_men_hauteur");
var span_largeur = document.getElementById("span_men_largeur");

var submit_type = document.getElementById("submit_type");

var text_hauteur_cm = "(entre 32,7 et 300cm)";
var text_hauteur_mm = "(entre 327 et 3000mm)";
var text_largeur_cm = "(entre 22.5 et 590cm)";
var text_largeur_mm = "(entre 225 et 5900mm)";
var text_hauteur_mesure = text_hauteur_mm;
var text_largeur_mesure = text_largeur_mm;
var text_verif = "";
var text_erreur_sup = " valeur trop grande !!";
var text_erreur_inf = " valeur trop faible !!";
var text_good = "";

var boulean_hauteur = false;
var boulean_largeur = false;

if (cm) {
    cm.addEventListener("click", function () {
        text_hauteur_mesure = text_hauteur_cm;
        text_largeur_mesure = text_largeur_cm;
        verif_hauteur();
        verif_largeur();
        check_disable_submit_type()
    })
}

if (mm) {
    mm.addEventListener("click", function () {
        text_hauteur_mesure = text_hauteur_mm;
        text_largeur_mesure = text_largeur_mm;
        verif_hauteur();
        verif_largeur();
        check_disable_submit_type()
    })
}

if (men_hauteur) {
    men_hauteur.addEventListener("change", function () {
        verif_hauteur();
        check_disable_submit_type()
    })
}

if (men_largeur) {
    men_largeur.addEventListener("change", function () {
        verif_largeur();
        check_disable_submit_type()
    })
}



function verif_hauteur() {
    var hauteur = men_hauteur.value;
    if (hauteur.length > 0) {
        if (cm.checked) {
            if (hauteur < 32.7) {
                text_verif = text_erreur_inf;
                span_hauteur.textContent = text_hauteur_mesure + text_verif;
                add_class_ko_hauteur();
                boulean_hauteur = false;
            } else if (hauteur > 300) {
                text_verif = text_erreur_sup;
                span_hauteur.textContent = text_hauteur_mesure + text_verif;
                add_class_ko_hauteur();
                boulean_hauteur = false;
            } else {
                text_verif = text_good;
                span_hauteur.textContent = text_hauteur_mesure + text_verif;
                add_class_ok_hauteur();
                boulean_hauteur = true;
            }
        } else {
            if (hauteur < 327) {
                text_verif = text_erreur_inf;
                span_hauteur.textContent = text_hauteur_mesure + text_verif;
                add_class_ko_hauteur();
                boulean_hauteur = false;
            } else if (hauteur > 3000) {
                text_verif = text_erreur_sup;
                span_hauteur.textContent = text_hauteur_mesure + text_verif;
                add_class_ko_hauteur();
                boulean_hauteur = false;
            } else {
                text_verif = text_good;
                span_hauteur.textContent = text_hauteur_mesure + text_verif;
                add_class_ok_hauteur();
                boulean_hauteur = true;
            }
        }
    } else {
        span_hauteur.textContent = text_hauteur_mesure;
        remove_class_hauteur();
        boulean_hauteur = false;
    }
}

function verif_largeur() {
    var largeur = men_largeur.value;
    if (largeur.length > 0) {
        if (cm.checked) {
            if (largeur < 22.5) {
                text_verif = text_erreur_inf;
                span_largeur.textContent = text_largeur_mesure + text_verif;
                add_class_ko_largeur();
                boulean_largeur = false;
            } else if (largeur > 590) {
                text_verif = text_erreur_sup;
                span_largeur.textContent = text_largeur_mesure + text_verif;
                add_class_ko_largeur();
                boulean_largeur = false;
            } else {
                text_verif = text_good;
                span_largeur.textContent = text_largeur_mesure + text_verif;
                add_class_ok_largeur();
                boulean_largeur = true;
            }
        } else {
            if (largeur < 225) {
                text_verif = text_erreur_inf;
                span_largeur.textContent = text_largeur_mesure + text_verif;
                add_class_ko_largeur();
                boulean_largeur = false;
            } else if (largeur > 5900) {
                text_verif = text_erreur_sup;
                span_largeur.textContent = text_largeur_mesure + text_verif;
                add_class_ko_largeur();
                boulean_largeur = false;
            } else {
                text_verif = text_good;
                span_largeur.textContent = text_largeur_mesure + text_verif;
                add_class_ok_largeur();
                boulean_largeur = true;
            }
        }
    } else {
        span_largeur.textContent = text_largeur_mesure;
        remove_class_largeur();
        boulean_largeur = false;
    }
}

function add_class_ok_hauteur() {
    span_hauteur.style.color = "green";
    men_hauteur.classList.remove("KO");
    men_hauteur.classList.remove("borderClassique");
    men_hauteur.classList.add("OK");
}

function add_class_ko_hauteur() {
    span_hauteur.style.color = "red";
    men_hauteur.classList.remove("OK");
    men_hauteur.classList.remove("borderClassique");
    men_hauteur.classList.add("KO");
}

function remove_class_hauteur() {
    span_hauteur.style.color = "black";
    men_hauteur.classList.add("borderClassique");
}

function add_class_ok_largeur() {
    span_largeur.style.color = "green";
    men_largeur.classList.remove("KO");
    men_largeur.classList.remove("borderClassique");
    men_largeur.classList.add("OK");
}

function add_class_ko_largeur() {
    span_largeur.style.color = "red";
    men_largeur.classList.remove("OK");
    men_largeur.classList.remove("borderClassique");
    men_largeur.classList.add("KO");
}

function remove_class_largeur() {
    span_largeur.style.color = "black";
    men_largeur.classList.add("borderClassique");
}

function check_disable_submit_type() {
    if (boulean_largeur && boulean_hauteur) {
        submit_type.disabled = false;
    } else {
        submit_type.disabled = true;
    }
}