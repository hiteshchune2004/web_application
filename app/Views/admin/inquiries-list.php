<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Inquiries</title>
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
                    <a href="/admin/products">Products</a>
                    <a href="/admin/inquiries" class="active">Inquiries</a>
                </nav>
            </aside>
            <div class="admin-content">
                <h1>Inquiries</h1>
                <button class="btn btn-secondary" onclick="exportInquiries('csv')">Export CSV</button>
                <table class="admin-table">
                    <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Status</th><th>Date</th></tr></thead>
                    <tbody>
                        <?php foreach ($inquiries as $inq): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($inq['id']); ?></td>
                                <td><?php echo htmlspecialchars($inq['name']); ?></td>
                                <td><?php echo htmlspecialchars($inq['email']); ?></td>
                                <td><?php echo htmlspecialchars($inq['phone'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($inq['status']); ?></td>
                                <td><?php echo date('d M Y', strtotime($inq['created_at'])); ?></td>
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
