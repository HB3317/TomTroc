<div class="loginView">
    <div class="loginInfo">
        <form action="index.php?action=login" method="post" class="loginForm">
            <h1>Connexion</h1>
            <div class="formGrid">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" class="primaryBtn">Se connecter</button>
            </div>
            <p>Pas encore inscrit ? <a href="index.php?action=registerForm">Inscrivez-vous</a></p>
        </form>
    </div>
    <div class="loginImage">
        <img src="./assets/images/pages/login/login.png" alt="Connexion">
    </div>
</div>