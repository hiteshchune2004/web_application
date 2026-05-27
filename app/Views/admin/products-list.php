<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <main>
        <div class="admin-container">
            <aside class="admin-sidebar">
                <h2>Admin</h2>
                <nav>
                    <a href="/admin/dashboard">Dashboard</a>
                    <a href="/admin/products" class="active">Products</a>
                    <a href="/admin/inquiries">Inquiries</a>
                </nav>
            </aside>
            <div class="admin-content">
                <h1>Products</h1>
                <button class="btn btn-primary" onclick="toggleAddForm()">+ Add Product</button>
                <table class="admin-table">
                    <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php foreach ($products as $prod): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($prod['id']); ?></td>
                                <td><?php echo htmlspecialchars($prod['name']); ?></td>
                                <td>₹<?php echo number_format($prod['price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($prod['stock']); ?></td>
                                <td><button onclick="deleteProduct(<?php echo $prod['id']; ?>)" class="btn btn-danger">Delete</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
