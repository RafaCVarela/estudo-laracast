<?php require basePath('views/partials/header'); ?>
<?php require basePath('views/partials/nav'); ?>
<?php require basePath('views/partials/banner'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        
        <a href="/notes" class="text-blue-500 underline">Voltar a notas</a>
        
        <p><?= htmlspecialchars($note['body']) ?></p>



        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id']?>" class="text-gray-500 border border-current px-4 py-2 rounded">Editar</a>
        </footer>

    </div>
</main>

<?php require basePath('views/partials/footer'); ?>

