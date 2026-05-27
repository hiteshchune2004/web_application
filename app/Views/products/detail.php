<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <main>
        <div class="container">
            <a href="/products" class="back-link">← Back</a>
            <div class="product-detail">
                <div class="product-image">
                    <img src="<?php echo htmlspecialchars($product['image'] ?? '/images/placeholder.jpg'); ?>">
                </div>
                <div class="product-details">
                    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                    <p class="grade">Grade: <strong><?php echo htmlspecialchars($product['grade'] ?? 'N/A'); ?></strong></p>
                    <p class="price-large">₹<?php echo number_format($product['price'], 2); ?></p>
                    <div class="description">
                        <h3>Description</h3>
                        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
