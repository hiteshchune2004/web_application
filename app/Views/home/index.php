<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotton Industry - Premium Cotton Products</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Premium Cotton Products</h1>
                <p>Quality cotton sourced from finest farms</p>
                <a href="/products" class="btn btn-primary">Shop Now</a>
            </div>
        </section>

        <section class="stats">
            <div class="stat"><h3><?php echo htmlspecialchars($total_products); ?></h3><p>Products</p></div>
            <div class="stat"><h3>4</h3><p>Categories</p></div>
            <div class="stat"><h3>100%</h3><p>Quality</p></div>
            <div class="stat"><h3>1000+</h3><p>Customers</p></div>
        </section>

        <section class="featured-section">
            <h2>Featured Products</h2>
            <div class="products-grid">
                <?php foreach ($featured as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['image'] ?? '/images/placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="price">₹<?php echo number_format($product['price'], 2); ?></p>
                            <a href="/products/<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="/js/main.js"></script>
</body>
</html>
