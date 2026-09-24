<?php
class StaticBlogGenerator {
    private $pdo;
    private $template;
    private $baseDir;
    private $baseUrl;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->baseDir = dirname(__FILE__);
        $this->baseUrl = 'https://blog.armydogcenterpk.com';
        $templatePath = $this->baseDir . '/template.php';
        
        if (!file_exists($templatePath)) {
            throw new Exception("Template file not found at: " . $templatePath);
        }
        
        $this->template = file_get_contents($templatePath);
    }
    
    public function generateSlug($title) {
        $slug = strtolower(trim($title));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }
    
    public function generateStaticPage($post) {
        $slug = $this->generateSlug($post['title']);
        $pagesDir = $this->baseDir . '/pages';
        
        if (!file_exists($pagesDir)) {
            if (!mkdir($pagesDir, 0755, true)) {
                throw new Exception("Failed to create pages directory at: " . $pagesDir);
            }
        }
        
        $filePath = $pagesDir . "/{$slug}.php";
        $url = $this->baseUrl . "/pages/{$slug}.php";
        $post['url'] = $url;
        
        $content = $this->template;
        $postDataPhp = var_export($post, true);
        $content = str_replace('/* POST_DATA_PLACEHOLDER */', $postDataPhp, $content);
        
        $relatedPosts = $this->getRelatedPosts($post['id']);
        $relatedPostsHtml = $this->generateRelatedPostsHtml($relatedPosts);
        $content = str_replace('<?php /* RELATED_POSTS_PLACEHOLDER */ ?>', $relatedPostsHtml, $content);
        
        if (file_put_contents($filePath, $content) === false) {
            throw new Exception("Failed to write static page to: " . $filePath);
        }
        
        $this->updatePostUrl($post['id'], $url);
        
        return $slug;
    }
    
    private function getRelatedPosts($postId) {
        $stmt = $this->pdo->prepare("
            SELECT id, title, description, image, created_at, url 
            FROM blog 
            WHERE id != ? AND url IS NOT NULL
            ORDER BY RAND() 
            LIMIT 4
        ");
        $stmt->execute([$postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    private function generateRelatedPostsHtml($relatedPosts) {
        $html = '';
        foreach ($relatedPosts as $related) {
            // Use the stored URL directly instead of generating it
            $html .= '<article class="max-w-xs border border-gray-300">
                <a href="' . htmlspecialchars($related['url']) . '">
                    <img src="' . $this->baseUrl . '/admin/uploads/' . htmlspecialchars($related['image']) . '"
                        class="mb-5 rounded-lg w-full h-64" alt="' . htmlspecialchars($related['title']) . '">
                </a>
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                        <a href="' . htmlspecialchars($related['url']) . '">' . htmlspecialchars($related['title']) . '</a>
                    </h2>
                    <p class="mb-4 text-gray-500">' . 
                        (strlen(strip_tags($related['description'])) > 100 
                            ? substr(strip_tags($related['description']), 0, 100) . '...' 
                            : strip_tags($related['description'])) . 
                    '</p>
                    <p class="text-sm text-gray-500">
                        ' . date('M d, Y', strtotime($related['created_at'])) . '
                    </p>
                </div>
            </article>';
        }
        return $html;
    }
    
    private function updatePostUrl($postId, $url) {
        try {
            $stmt = $this->pdo->prepare("UPDATE blog SET url = ? WHERE id = ?");
            $stmt->execute([$url, $postId]);
        } catch (PDOException $e) {
            throw new Exception("Failed to update post URL in database: " . $e->getMessage());
        }
    }
    
    public function generateAllPages() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM blog ORDER BY created_at DESC");
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $generatedCount = 0;
            foreach ($posts as $post) {
                $this->generateStaticPage($post);
                $generatedCount++;
            }
            
            return $generatedCount;
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch posts for regeneration: " . $e->getMessage());
        }
    }
    
    public function deleteStaticPage($postId) {
        try {
            $stmt = $this->pdo->prepare("SELECT url FROM blog WHERE id = ?");
            $stmt->execute([$postId]);
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($post && $post['url']) {
                $urlPath = parse_url($post['url'], PHP_URL_PATH);
                $filePath = $this->baseDir . $urlPath;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        } catch (Exception $e) {
            throw new Exception("Failed to delete static page: " . $e->getMessage());
        }
    }
    
    public function updateStaticPage($postId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM blog WHERE id = ?");
            $stmt->execute([$postId]);
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($post) {
                $this->deleteStaticPage($postId);
                $this->generateStaticPage($post);
            }
        } catch (Exception $e) {
            throw new Exception("Failed to update static page: " . $e->getMessage());
        }
    }
}