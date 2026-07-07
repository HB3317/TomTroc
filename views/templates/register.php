<?php 
 
?>

<div class="registerView">
    <div class="registerInfo">
        <form action="index.php?action=register" method="post" class="registerForm">
            <h1>Inscription</h1>
            <div class="formGrid">
                <label for="nickname">Pseudo</label>
                <input type="text" name="nickname" id="nickname" required>
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" class="primaryBtn">S'inscrire</button>
            </div>
            <p>Déjà inscrit ? <a href="index.php?action=loginForm">Connectez-vous</a></p>
        </form>
    </div>
    <div class="registerImage">
        <img src="./assets/images/pages/register/register.png" alt="Inscription">
    </div>
</div>