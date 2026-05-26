<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main>
        <div class="container">
            <div class="products-container">
                <!-- Sidebar Filters -->
                <aside class="sidebar">
                    <h3>Filters</h3>
                    
                    <div class="filter-group">
                        <h4>Categories</h4>
                        <form action="/products" method="GET">
                            <?php foreach ($categories as $cat): ?>
                                <label>
                                    <input type="checkbox" name="category" value="<?php echo htmlspecialchars($cat['id']); ?>" 
                                        <?php echo isset($category_id) && $category_id == $cat['id'] ? 'checked' : ''; ?>>
                                    <?php echo htmlspecialchars($cat['name']); ?>
                                </label>
                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-secondary">Apply</button>
                        </form>
                    </div>

                    <div class="filter-group">
                        <h4>Search</h4>
                        <form action="/products" method="GET">
                            <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </form>
                    </div>
                </aside>

                <!-- Products Grid -->
                <section class="products-section">
                    <div class="products-header">
                        <h2>Products</h2>
                        <p>Showing <?php echo count($products); ?> of <?php echo htmlspecialchars($current_page); ?> page</p>
                    </div>

                    <div class="products-grid">
                        <?php foreach ($products as $product): ?>
                            <div class="product-card">
                                <?php if ($product['image']): ?>
                                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                <?php else: ?>
                                    <div class="no-image">No Image</div>
                                <?php endif; ?>
                                <div class="product-info">
                                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                    <p class="grade">Grade: <?php echo htmlspecialchars($product['grade'] ?? 'N/A'); ?></p>
                                    <p class="price">₹<?php echo number_format($product['price'], 2); ?></p>
                                    <p class="stock">Stock: <?php echo htmlspecialchars($product['stock']); ?> units</p>
                                    <a href="/products/<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        <?php if ($current_page > 1): ?>
                            <a href="/products?page=<?php echo $current_page - 1; ?>" class="btn btn-secondary">← Previous</a>
                        <?php endif; ?>
                        
                        <span class="page-info">Page <?php echo htmlspecialchars($current_page); ?> of <?php echo htmlspecialchars($total_pages); ?></span>
                        
                        <?php if ($current_page < $total_pages): ?>
                            <a href="/products?page=<?php echo $current_page + 1; ?>" class="btn btn-secondary">Next →</a>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="/js/main.js"></script>
</body>
</html>
