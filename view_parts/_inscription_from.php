<?php
var_dump($_POST); // Inspecter les données POST
$in_post = array_key_exists('register', $_POST); // En est en réception
/**
 * Validation du prenom
 */
$prenom_ok = false;
$prenom_msg = ''; // Message de feedback validation, affiché si non vide
if (array_key_exists('prenom', $_POST)) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    // Validation du prenom : min 2 caractères
    $prenom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $prenom));
    if ( ! $prenom_ok) { // Si le prénom n'est pas valide
        $prenom_msg = 'Le prénom ne doit contenir que des lettres (min 2).';
    }
    var_dump($prenom);
    var_dump($prenom_ok);
    var_dump($prenom_msg);
}
/**
 * Validation du nom
 */
$nom_ok = false;
$nom_msg = '';
if (array_key_exists('nom', $_POST)) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    // Validation du nom: min 2 caracteres
    $nom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $nom));
    if ( ! $nom_ok) {
        $nom_msg ='Le nom ne doit contenir que des lettres (min 2).';
    }
    var_dump($nom);
    var_dump($nom_ok);
    var_dump($nom_msg);
}
/**
 * Validation du courriel
 */
$courriel_ok = false;
$courriel_msg = '';
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $courriel_ok = (false !== $courriel);
    if ( ! $courriel_ok){
        $courriel_msg = 'Votre adresse courriel n\'est pas valide.';
    }
    var_dump($courriel);
    var_dump($courriel_ok);
    var_dump($courriel_msg);
}
/**
 * Validation du pseudo
 */
$pseudo_ok = false;
$pseudo_msg = '';
if (array_key_exists('pseudo', $_POST)) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
    // Validation du pseudo : min 4 caractères alpha ou chiffres
    $pseudo_ok = (1 === preg_match('/^[a-zA-Z0-9]{4,}$/', $pseudo));
    if ( ! $pseudo_ok ){
        //Est ce quen il estb libre
        require_once 'db/_user.php';
        if (username_exists($pseudo)){
           echo "Le username" . $pseudo . "est déjà pris";
        };
        $pseudo_msg = 'Votre pseudo ne peut contenir que des chiffres et des lettres et doit contenir au minimum 4 caractères !';
    }
    var_dump($pseudo);
    var_dump($pseudo_ok);
    var_dump($pseudo_msg);
}
/**
 * Validation du mot de passe
 */
$mot_passe_ok = false;
$mot_passe_msg = '';
if (array_key_exists('mot_passe', $_POST)) {
    $mot_passe = filter_input(INPUT_POST, 'mot_passe', FILTER_SANITIZE_STRING);
    // Validation du mot de passe: alpha, chiffres,caracteres speciaux, min de 4 caracteres
    $mot_passe_ok = (1 === preg_match('/^[a-zA-Z0-9%&$!*?]{4,}$/', $mot_passe));
    if ( ! $mot_passe_ok ) {
        $mot_passe_msg = 'Votre mot de passe doit contenir au minimum 4 caractères !';
    }
    var_dump($mot_passe);
    var_dump($mot_passe_ok);
    var_dump($mot_passe_msg);
}
if ($prenom_ok && $nom_ok && $courriel_ok && $pseudo_ok && $mot_passe_ok) {
    // On enregistre les données et s'en va sur une autre page
    require_once 'db/_user.php';
    $user_info = user_add($pseudo, $mot_passe, $nom, $prenom, $courriel);
    header("Location:index.php");
    exit;
}
?>

<form id="inscription" name="inscription" xmlns="http://www.w3.org/1999/html" method="post">
    <ul>
        <li>
        <label for="prenom">Prénom : </label>
    <input type="text" name="prenom" id="prenom"
        class="<?php echo $in_post && ! $prenom_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>"/>
    <span><?php echo $prenom_msg?></span>
         </li>
        <li>
    <label for="nom">Nom : </label>
    <input type="nom" name="nom" id="nom"
         class="<?php echo $in_post && ! $nom_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>"/>
    <span><?php echo $nom_msg?></span>
              </li>
        <li>
    <label for="courriel">Courriel : </label>
    <input type="courriel" name="courriel" id="courriel"
        class ="<?php echo $in_post && ! $courriel_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : '' ?>"/>
    <span><?php echo $courriel_msg?></span>
        </li>
        <li>
    <label for="pseudo">Pseudo : </label>
    <input type="pseudo" name="pseudo" id="pseudo"
        class="<?php echo $in_post && ! $pseudo_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('pseudo', $_POST) ? $_POST['pseudo'] : '' ?>"/>
    <span><?php echo $pseudo_msg?></span>
        </li>
        <li>
    <label for="mot_passe">Password : </label>
    <input type="mot_passe" name="mot_passe" id="mot_passe"
         class="<?php echo $in_post && ! $mot_passe_ok ? 'error' : '';?>"
           value="<?php echo array_key_exists('mot_passe', $_POST) ? $_POST['mot_passe'] : '' ?>"/>
    <span><?php echo $mot_passe_msg?></span>
        </li>
        <li>
    <input type="submit" name="register" id="register" value="S'inscrire"/>
        </li>
    </ul>
</form>
