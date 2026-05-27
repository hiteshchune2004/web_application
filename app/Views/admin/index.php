<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main>
        <div class="admin-container">
            <aside class="admin-sidebar">
                <h2>Admin Menu</h2>
                <nav>
                    <a href="/admin/dashboard" class="active">Dashboard</a>
                    <a href="/admin/products">Products</a>
                    <a href="/admin/inquiries">Inquiries</a>
                </nav>
            </aside>

            <div class="admin-content">
                <h1>Dashboard</h1>

                <div class="stats-dashboard">
                    <div class="stat-card">
                        <h3><?php echo htmlspecialchars($total_products); ?></h3>
                        <p>Total Products</p>
                    </div>
                    <div class="stat-card">
                        <h3><?php echo htmlspecialchars($total_inquiries); ?></h3>
                        <p>Total Inquiries</p>
                    </div>
                </div>

                <section class="recent-inquiries">
                    <h2>Recent Inquiries</h2>
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_inquiries as $inq): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($inq['id']); ?></td>
                                    <td><?php echo htmlspecialchars($inq['name']); ?></td>
                                    <td><?php echo htmlspecialchars($inq['email']); ?></td>
                                    <td><?php echo htmlspecialchars($inq['product_name'] ?? 'N/A'); ?></td>
                                    <td><span class="status-badge status-<?php echo htmlspecialchars($inq['status']); ?>"><?php echo htmlspecialchars($inq['status']); ?></span></td>
                                    <td><?php echo date('d M Y', strtotime($inq['created_at'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="/js/main.js"></script>
</body>
</html>
