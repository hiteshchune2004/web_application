<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <main>
        <div class="products-container">
            <aside class="sidebar">
                <h3>Filters</h3>
                <form action="/products" method="GET">
                    <div class="filter-group">
                        <h4>Search</h4>
                        <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search ?? ''); ?>">
                        <button type="submit" class="btn btn-secondary">Search</button>
                    </div>
                </form>
            </aside>

            <section class="products-section">
                <div class="products-grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars($product['image'] ?? '/images/placeholder.jpg'); ?>">
                            <div class="product-info">
                                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="price">₹<?php echo number_format($product['price'], 2); ?></p>
                                <a href="/products/<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="pagination-wrapper">
                    <?php if ($current_page > 1): ?>
                        <a href="/products?page=<?php echo $current_page - 1; ?>" class="btn">← Previous</a>
                    <?php endif; ?>
                    <span class="page-info">Page <?php echo htmlspecialchars($current_page); ?> of <?php echo htmlspecialchars($total_pages); ?></span>
                    <?php if ($current_page < $total_pages): ?>
                        <a href="/products?page=<?php echo $current_page + 1; ?>" class="btn">Next →</a>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
