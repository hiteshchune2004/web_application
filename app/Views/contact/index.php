<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <main>
        <h1>Contact Us</h1>
        <div class="contact-content">
            <form class="contact-form" onsubmit="handleContactInquiry(event)">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone">
                </div>
                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
            <div class="contact-info">
                <h3>Contact Information</h3>
                <p><strong>Email:</strong> admin@cotton.com</p>
                <p><strong>Phone:</strong> +91 XXXXX XXXXX</p>
            </div>
        </div>
    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
