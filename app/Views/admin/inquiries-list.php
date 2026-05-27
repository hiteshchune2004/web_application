<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inquiries - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main>
        <div class="admin-container">
            <aside class="admin-sidebar">
                <h2>Admin Menu</h2>
                <nav>
                    <a href="/admin/dashboard">Dashboard</a>
                    <a href="/admin/products">Products</a>
                    <a href="/admin/inquiries" class="active">Inquiries</a>
                </nav>
            </aside>

            <div class="admin-content">
                <h1>Manage Inquiries</h1>

                <div class="export-section">
                    <h3>Export Inquiries</h3>
                    <form class="export-form" onsubmit="handleExport(event)">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" id="start_date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" id="end_date" name="end_date">
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="exportInquiries('csv')">Export CSV</button>
                        <button type="button" class="btn btn-secondary" onclick="exportInquiries('xlsx')">Export Excel</button>
                    </form>
                </div>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Product</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inquiries as $inq): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($inq['id']); ?></td>
                                <td><?php echo htmlspecialchars($inq['name']); ?></td>
                                <td><?php echo htmlspecialchars($inq['email']); ?></td>
                                <td><?php echo htmlspecialchars($inq['phone'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($inq['product_name'] ?? 'N/A'); ?></td>
                                <td><span class="status-badge status-<?php echo htmlspecialchars($inq['status']); ?>"><?php echo htmlspecialchars($inq['status']); ?></span></td>
                                <td><?php echo date('d M Y', strtotime($inq['created_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="/js/main.js"></script>
</body>
</html>
