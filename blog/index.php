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
  <link rel="canonical" href="https://blog.armydogcenterpk.com/">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="Blog |03001690800 | 03332874135">
  <meta property="og:description" content="03001690800 | 03332874135 | Our mission is to help you by using our trained dogs to find
    evidence and clues. You can rely on us because your safety is our top priority. We ensure we are available around
    the clock, anywhere and anytime you need us.">
  <meta property="og:url" content="https://blog.armydogcenterpk.com/">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://armydogcenterpk.com/images/logo-armydog.webp">
  <title>Blog |03001690800 | 03332874135</title>
  <!-- Favicon link -->
  <link rel="icon" href="https://armydogcenterpk.com/images/logo-armydog.webp" type="image/x-icon">
  <link rel="shortcut icon" href="https://armydogcenterpk.com/images/logo-armydog.webp" type="image/x-icon">
  <!------- JSON - LD ---------->
  <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "WebSite",
              "name": "Blog | 03001690800 | 03332874135",
              "url": "https://armydogcenterpk.com/blog",
              "potentialAction": {
                "@type": "SearchAction",
                "target": "https://armydogcenterpk.com/search?query={search_term_string}",
                "query-input": "required name=search_term_string"
              }
            }
            </script>
  <!-------- Stylesheets  -------->
  <link rel="stylesheet" href="../dist/output.css">
  <link rel="stylesheet" href="../stylesheets/style.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

</head>

<body>
    <?php
require '../includes/header.php';
?>
  <div class="overflow-hidden w-full" id="container">
  <section id="" class=" flex flex-col items-center justify-center px-10 py-6">
    <h1 class="mb-6 text-left text-indigo-500 text-3xl md:text-6xl text-center font-semibold">OUR BLOG</h1>
    <p class="text-sm md:text-lg text-gray-400 font-semibold text-center w-1/2">Discover the dedicated services of our Army Dog Center, showcasing the role of trained dogs in security, search and rescue, and defense operations.</p>

  </section>
 
   <section class="flex flex-row-reverse flex-wrap items-center justify-center gap-4 px-12 py-8">
    <?php
    include 'config/config.php';

    try {
        $stmt = $pdo->query("SELECT id, title, description, image, url FROM blog ORDER BY created_at DESC");
        while ($blog = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = htmlspecialchars($blog['title']);
            $description = strip_tags($blog['description']); // Remove HTML from content
            $image = htmlspecialchars($blog['image']);
         $readMoreUrl = !empty($blog['url']) ? $blog['url'] : "blogpost.php?id=" . $blog['id'];
            ?>
            
            <article class="overflow-hidden w-[300px] rounded-lg border border-gray-500 bg-white shadow-sm"><a href="<?= $readMoreUrl ?>">
                <?php if ($image): ?>
                     <img alt="<?= $title ?>" src="admin/uploads/<?= $image ?>" class="h-52 w-full object-fill" />
                <?php endif; ?>
                
                <div class="p-4 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900"><?= $title ?></h3>
                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                        <?= substr($description, 0, 150) . '...' ?>
                    </p>
                    <span class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
    Read more
    <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">→</span>
</span>
                </div>
           </a> </article>
            <?php
        }
    } catch(PDOException $e) {
        echo "<div class='text-red-500'>Error loading blog posts</div>";
    }
    ?>
</section>

 
  

  </div>
  <?php
require '../includes/footer.php';
?>
 <!-- SCRIPTS -->
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
 <script src="https://cdn.tailwindcss.com"></script>
 <script type="text/javascript">
     (function () {
         emailjs.init("hj0ktJGt8eMelJAtC");
     })();
 </script>
</body>

</html>