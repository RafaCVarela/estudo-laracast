<?php require basePath('views/partials/header'); ?>
<?php require basePath('views/partials/nav'); ?>
<?php require basePath('views/partials/banner'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id']; ?>">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Nota</label>
                        <div class="mt-2">
                            <textarea 
                                id="body" 
                                name="body" 
                                rows="3" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                                placeholder="Escreva a nota..."
                                ><?= $note['body'] ?? '' ?></textarea>
                        
                            <?php if (isset($errors['body'])): ?>
                                <p class="text-red-500 text-xs mt-2">
                                    <?= $errors['body'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="text-sm/6 font-semibold text-gray-900 text-gray-500 border border-current px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >Update</button>
            </div>
        </form>

    </div>
</main>

<?php require basePath('views/partials/footer'); ?>

