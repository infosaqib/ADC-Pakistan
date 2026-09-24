<?php
// template.php
// Post data will be injected here by the generator
$post = /* POST_DATA_PLACEHOLDER */;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="03001690800 | 03332874135 | Our mission is to help you by using our trained dogs to find evidence and clues.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://armydogcenterpk.com/<?= $post['url'] ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= htmlspecialchars($post['title']) ?>">
    <meta property="og:description" content="03001690800 | 03332874135 | Our mission is to help you by using our trained dogs to find evidence and clues.">
    <meta property="og:url" content="https://armydogcenterpk.com/<?= $post['url'] ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://armydogcenterpk.com/images/logo-armydog.webp">
     <!-- Favicon link -->
    <link rel="icon" href="https://armydogcenterpk.com/images/logo-armydog.webp" type="image/x-icon">
    <link rel="shortcut icon" href="https://armydogcenterpk.com/images/logo-armydog.webp" type="image/x-icon">
    
    <title><?= htmlspecialchars($post['title']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
      <?php
require '../../includes/header.php';
?>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://armydogcenterpk.com/images/logo-armydog.webp" alt="Army Dog Center">
                            <div>
                                <a rel="author" class="text-xl font-bold text-gray-900">
                                    Army Dog Center</a>
                               
                                <p class="text-base text-gray-500 ">
                                    <time pubdate datetime="<?= $post ? $post['created_at'] : ''; ?>">
                                        <?= $post ? date('M d, Y', strtotime($post['created_at'])) : ''; ?>
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">
                        <?= htmlspecialchars($post['title']) ?>
                    </h1>
                </header>
                <div class="text-gray-700">
                    <?= $post['description'] ?>
                </div>
            </article>
        </div>
    </main>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900">Related articles</h2>
            <div class="grid gap-4" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                 <?php /* RELATED_POSTS_PLACEHOLDER */ ?>
            </div>
        </div>
    </aside>
      <?php
require '../../includes/footer.php';
?>
</body>
</html>