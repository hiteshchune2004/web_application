<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Cotton Industry</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main>
        <div class="container">
            <div class="contact-section">
                <h1>Contact Us</h1>
                <p>Get in touch with us for any inquiries or bulk orders</p>

                <div class="contact-content">
                    <!-- Contact Form -->
                    <form class="contact-form" onsubmit="handleContactInquiry(event)">
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                        
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="product_id">Product (Optional)</label>
                            <select id="product_id" name="product_id">
                                <option value="">Select a product</option>
                                <?php foreach ($products as $prod): ?>
                                    <option value="<?php echo htmlspecialchars($prod['id']); ?>">
                                        <?php echo htmlspecialchars($prod['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                        <div class="loading" id="loading" style="display: none;">Sending...</div>
                        <div class="success-msg" id="successMsg" style="display: none; color: green;">Message sent successfully!</div>
                    </form>

                    <!-- Contact Info -->
                    <div class="contact-info">
                        <h3>Contact Information</h3>
                        <div class="info-item">
                            <h4>Email</h4>
                            <p><a href="mailto:info@cotton.com">info@cotton.com</a></p>
                        </div>
                        <div class="info-item">
                            <h4>Phone</h4>
                            <p>+91 XXXXX XXXXX</p>
                        </div>
                        <div class="info-item">
                            <h4>Address</h4>
                            <p>Cotton Industry Complex<br>Textile Zone<br>India</p>
                        </div>
                        <div class="info-item">
                            <h4>Office Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="/js/main.js"></script>
</body>
</html>
