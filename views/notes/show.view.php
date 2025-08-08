<?php require basePath('views/partials/header'); ?>
<?php require basePath('views/partials/nav'); ?>
<?php require basePath('views/partials/banner'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($note['body']) ?></p>

        <p>
            <a href="/notes" class="text-blue-500 underline">Voltar a notas</a>
        </p>
    </div>
</main>

<?php require basePath('views/partials/footer'); ?>

