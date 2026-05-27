<?php
session_start();
$lang = $_SESSION['lang'] ?? 'en';
?>
<header class="sticky-header">
    <div class="header-content">
        <div class="logo">
            <h1>🌾 Cotton Industry</h1>
        </div>
        
        <nav class="navbar">
            <a href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/contact">Contact</a>
            <a href="/admin/dashboard">Admin</a>
        </nav>

        <div class="header-actions">
            <div class="language-switcher">
                <button onclick="switchLanguage('en')" class="<?php echo $lang === 'en' ? 'active' : ''; ?>">English</button>
                <button onclick="switchLanguage('hi')" class="<?php echo $lang === 'hi' ? 'active' : ''; ?>">हिंदी</button>
            </div>
            <button class="search-btn" onclick="toggleSearch()">🔍</button>
        </div>
    </div>

    <div class="search-bar" id="searchBar" style="display: none;">
        <form action="/products" method="GET">
            <input type="text" name="search" placeholder="Search products..." required>
            <button type="submit">Search</button>
        </form>
    </div>
</header>

<style>
    .sticky-header { position: sticky; top: 0; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 1000; }
    .header-content { display: flex; justify-content: space-between; align-items: center; padding: 1rem 2rem; max-width: 1200px; margin: 0 auto; }
    .logo h1 { margin: 0; color: #4a7c59; }
    .navbar { display: flex; gap: 2rem; }
    .navbar a { text-decoration: none; color: #2c2c2c; transition: color 0.3s; }
    .navbar a:hover { color: #4a7c59; }
</style>
