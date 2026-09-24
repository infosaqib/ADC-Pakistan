<?php
// Include your database connection
include 'config/config.php';

// Initialize variables
$post = null;

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input
    try {
        // Fetch the blog post based on the ID
        $stmt = $pdo->prepare("SELECT * FROM blog WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle errors (optional logging)
        echo "<p class='text-red-500'>Error loading blog post: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-------- META TAGS  -------->
  <meta name="description" content="03001690800 | 03332874135 | Our mission is to help you by using our trained dogs to find evidence
    and clues. You can rely on us because your safety is our top priority. We ensure we are available around the clock,
    anywhere and anytime you need us.">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://armydogcenterpk.com/blog.php">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="<?= $post ? htmlspecialchars($post['title']) : 'Blog Post'; ?>">
  <meta property="og:description" content="03001690800 | 03332874135 | Our mission is to help you by using our trained dogs to find
    evidence and clues. You can rely on us because your safety is our top priority. We ensure we are available around
    the clock, anywhere and anytime you need us.">
    <meta property="og:url" content="https://armydogcenterpk.com/blog.php">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://armydogcenterpk.com/images/logo-armydog.webp">
    <title><?= $post ? htmlspecialchars($post['title']) : 'Blog Post'; ?></title>
  <!-- Favicon link -->
  <link rel="icon" href="https://armydogcenterpk.com/images/logo-armydog.webp" type="image/x-icon">
  <link rel="shortcut icon" href="https://armydogcenterpk.com/images/logo-armydog.webp" type="image/x-icon">
  <!------- JSON - LD ---------->
  <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "WebSite",
          "name": "<?= $post ? htmlspecialchars($post['title']) : 'Blog Post'; ?>",
          "url": "https://armydogcenterpk.com/blog",
          "potentialAction": {
              "@type": "SearchAction",
              "target": "https://armydogcenterpk.com/search?query={search_term_string}",
              "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
require 'includes/header.php';
?>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue ">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="images/logo-armydog.webp" alt="Army Dog Center">
                            <div>
                                <a href="/" rel="author" class="text-xl font-bold text-gray-900">
                                    Army Dog Center</a>
                               
                                <p class="text-base text-gray-500 ">
                                    <time pubdate datetime="<?= $post ? $post['created_at'] : ''; ?>">
                                        <?= $post ? date('M d, Y', strtotime($post['created_at'])) : ''; ?>
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1 class="text-3xl font-bold leading-tight text-gray-900 ">
                        <?= $post ? htmlspecialchars($post['title']) : 'Post Not Found'; ?>
                    </h1>
                </header>
                <div class="text-gray-700">
    <?= $post ? $post['description'] : '<p>No content available for this post.</p>'; ?>
</div>
            </article>
        </div>
    </main>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 ">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 ">Related articles</h2>
            <div class="grid gap-4" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                 
               <?php
// Fetch 4 random blog posts for the "Related articles" section
$stmt = $pdo->prepare("SELECT id, title, description, image FROM blog WHERE id != ? ORDER BY RAND() LIMIT 4");
$stmt->execute([$id]);
$related_posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($related_posts as $related) {
    echo '<article class="max-w-xs border border-gray-300">
        <a href="blogpost.php?id=' . $related['id'] . '">
            <img src="admin/uploads/' . ($related['image'] ? htmlspecialchars($related['image']) : 'default-thumbnail.jpg') . '"
                class="mb-5 rounded-lg w-full h-64" alt="Related Post Image">
        </a>
        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 ">
            <a href="blogpost.php?id=' . $related['id'] . '">' . htmlspecialchars($related['title']) . '</a>
        </h2>
        <p class="mb-4 text-gray-500 ">' . 
            (strlen(strip_tags($related['description'])) > 100 
                ? substr(strip_tags($related['description']), 0, 100) . '...' 
                : strip_tags($related['description'])) . 
        '</p>
    </article>';
}
?>

            </div>
        </div>
    </aside>
    <?php
require 'includes/footer.php';
?>
</body>

</html>
