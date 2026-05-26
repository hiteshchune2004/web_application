<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotton Industry - Premium Cotton Products</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/layouts/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Premium Cotton Products</h1>
                <p>Quality cotton sourced from finest farms across the region</p>
                <a href="/products" class="btn btn-primary">Shop Now</a>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats">
            <div class="stat">
                <h3><?php echo htmlspecialchars($total_products); ?></h3>
                <p>Products Available</p>
            </div>
            <div class="stat">
                <h3>4</h3>
                <p>Categories</p>
            </div>
            <div class="stat">
                <h3>100%</h3>
                <p>Quality Guaranteed</p>
            </div>
            <div class="stat">
                <h3>1000+</h3>
                <p>Satisfied Customers</p>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="categories-section">
            <h2>Our Categories</h2>
            <div class="categories-grid">
                <?php foreach ($categories as $cat): ?>
                    <div class="category-card">
                        <h3><?php echo htmlspecialchars($cat['name']); ?></h3>
                        <a href="/products?category=<?php echo htmlspecialchars($cat['id']); ?>" class="btn btn-secondary">Explore</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section class="featured-section">
            <h2>Featured Products</h2>
            <div class="products-grid">
                <?php foreach ($featured as $product): ?>
                    <div class="product-card">
                        <?php if ($product['image']): ?>
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <?php else: ?>
                            <div class="no-image">No Image</div>
                        <?php endif; ?>
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="grade">Grade: <?php echo htmlspecialchars($product['grade'] ?? 'N/A'); ?></p>
                        <p class="price">₹<?php echo number_format($product['price'], 2); ?></p>
                        <a href="/products/<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-secondary">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/layouts/footer.php'; ?>
    <script src="/js/main.js"></script>
</body>
</html>
