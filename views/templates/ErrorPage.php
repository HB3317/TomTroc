<div class="error-page">
    <?php if (isset($errorCode)) : ?>
        <h1><?= $errorCode ?> - Page introuvable</h1>
    <?php else : ?>
        <h1>Erreur</h1>
    <?php endif; ?>
    <p>
        <?php if (isset($errorCode) && $errorCode === 404) : ?>
            La page que vous recherchez n'existe pas.
        <?php else : ?>
            <?= htmlspecialchars($errorMessage) ?>
        <?php endif; ?>
    </p>
</div>
