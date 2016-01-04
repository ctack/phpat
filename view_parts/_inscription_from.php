<?php
var_dump($_POST);
//validation ici
$prenom_ok = false;
if (array_key_exists('prenom', $_POST)){
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
    $prenom_ok = (1 === preg_match('/^[a-z]{3,}$/', $prenom));
    var_dump($prenom);
    var_dump($prenom_ok);
}
$name_ok = false;
if (array_key_exists('nom', $_POST)) {
    $name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $name_ok = (1 === preg_match('/^[a-z]{3,}$/', $name));
    var_dump($name);
    var_dump($name_ok);
}

$courriel_ok = false;
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_MAGIC_QUOTES);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $courriel_ok = (1 === preg_match('/^[A-Za-z0-9@%&$!.*?]{8,}$/', $courriel));
    var_dump($courriel);
    var_dump($courriel_ok);
}

$pseudo_ok = false;
if (array_key_exists('pseudo', $_POST)) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_MAGIC_QUOTES);
    $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
    $pseudo_ok = (1 === preg_match('/^[A-Za-z0-9%&$!*?]{3,}$/', $pseudo));
    var_dump($pseudo);
    var_dump($pseudo_ok);
}

$password_ok = false;
if (array_key_exists('password', $_POST)) {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$!.@*?]{3,}$/', $password));
    var_dump($password);
    var_dump($password_ok);
}
if ($prenom_ok && $name_ok && $courriel_ok && $pseudo_ok && $password_ok ) {
    header("Location: index.php");
    echo "bonjour : $prenom_ok !";
}

?>
<form id="formulaire" method="post" >
    <label for = "prenom">Prénom : </label>
    <input type="text" name="prenom" id="prenom" value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>"/></br>
    <label for = "nom">Nom : </label>
    <input type="text" name="nom" id="nom" value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>"/></br>
    <label for = "courriel">Courriel : </label>
    <input type="text" name="courriel" id="courriel" value=""/></br>
    <label for = "pseudo">Pseudo : </label>
    <input type="text" name="pseudo" id="pseudo" value=""/></br>
    <label for = "password">Mot de passe : </label>
    <input type="text" name="password" id="password" value="" /></br>
    <input type="submit" value="S'inscrire"/>
</form>
