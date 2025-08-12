<?php require basePath('views/partials/header'); ?>
<?php require basePath('views/partials/nav'); ?>
<?php require basePath('views/partials/banner'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        
        <a href="/notes" class="text-blue-500 underline">Voltar a notas</a>
        
        <p><?= htmlspecialchars($note['body']) ?></p>

        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-red-500 underline">Deletar</button>
        </form>

    </div>
</main>

<?php require basePath('views/partials/footer'); ?>

