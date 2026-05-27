# Cotton Industry Website

A complete full-stack Cotton Industry website built with a custom PHP MVC framework from scratch.

## Features

✅ **Custom PHP MVC Framework**
- Router with GET, POST, PUT, DELETE support
- Route parameters and middleware support
- Base Controller with render, redirect, json methods
- Base Model with PDO prepared statements
- Request validation and sanitization

✅ **Authentication & Security**
- Custom JWT implementation (HS256)
- Session-based authentication
- Password hashing with bcrypt
- CSRF token protection on forms
- PDO prepared statements

✅ **Image Processing**
- GD library image resizing (800x800)
- MIME type validation
- 2MB file size limit
- jpg, jpeg, png, webp support

✅ **Admin Features**
- Product CRUD operations
- Inquiry management with status tracking
- CSV export functionality
- Dashboard with statistics

✅ **Frontend**
- Pure CSS (no Bootstrap)
- Responsive mobile/tablet/desktop
- Sticky header with language switcher
- Product grid with pagination
- Category filtering and search

✅ **Multi-Language**
- English and Hindi support
- Session-based language selection

✅ **API Routes**
- JWT-protected endpoints
- RESTful architecture
- JSON responses

## Setup Instructions

### Database Setup

```bash
# Create MySQL database
mysql -u root -p < database/schema.sql
mysql -u root -p cotton_industry < database/seed.sql
```

### Configuration

Edit `config/config.php`:

```php
'db_host' => 'localhost',
'db_name' => 'cotton_industry',
'db_user' => 'root',
'db_password' => '',
'jwt_secret' => 'your-secret-key',
```

### Apache Setup

Enable mod_rewrite and ensure `.htaccess` is processed:

```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

## Database Schema

### Users
- id (INT, PK)
- name (VARCHAR)
- email (VARCHAR, UNIQUE)
- password (VARCHAR)
- role (ENUM: admin, user)
- created_at (TIMESTAMP)

### Categories
- id (INT, PK)
- name (VARCHAR)
- slug (VARCHAR, UNIQUE)
- created_at (TIMESTAMP)

### Products
- id (INT, PK)
- category_id (INT, FK)
- name (VARCHAR)
- slug (VARCHAR, UNIQUE)
- grade (VARCHAR)
- price (DECIMAL)
- stock (INT)
- image (VARCHAR)
- description (LONGTEXT)
- is_featured (BOOLEAN)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

### Inquiries
- id (INT, PK)
- product_id (INT, FK)
- name (VARCHAR)
- email (VARCHAR)
- phone (VARCHAR)
- message (LONGTEXT)
- status (ENUM: pending, replied, resolved)
- created_at (TIMESTAMP)

## Seed Data

**Admin Credentials:**
- Email: admin@cotton.com
- Password: admin123

**Categories:**
1. Raw Cotton
2. Cotton Yarn
3. Cotton Fabric
4. Cotton Seeds

**Products:** 20 sample products across all categories

**Inquiries:** 5 sample inquiries

## API Endpoints

### Authentication
```
POST /api/auth/login
POST /api/auth/register
```

### Products (Public)
```
GET  /api/products
GET  /api/products/{id}
GET  /api/categories
```

### Products (Protected)
```
POST   /api/products
PUT    /api/products/{id}
DELETE /api/products/{id}
```

### Inquiries
```
POST /api/inquiry
GET  /api/inquiries (Protected)
```

## Example API Request

```bash
# Login
curl -X POST http://localhost/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@cotton.com","password":"admin123"}'

# Use token for protected routes
curl -X GET http://localhost/api/products \
  -H "Authorization: Bearer <token>"
```

## File Structure

```
.
├── core/
│   ├── App.php
│   ├── Controller.php
│   ├── Model.php
│   ├── Database.php
│   ├── Request.php
│   ├── JWT.php
│   ├── Auth.php
│   ├── Upload.php
│   └── Paginator.php
├── config/
│   ├── config.php
│   └── routes.php
├── database/
│   ├── schema.sql
│   └── seed.sql
├── app/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Category.php
│   │   ├── Product.php
│   │   └── Inquiry.php
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── ProductController.php
│   │   ├── InquiryController.php
│   │   ├── AdminController.php
│   │   └── api/
│   │       ├── AuthApiController.php
│   │       ├── ProductApiController.php
│   │       └── InquiryApiController.php
│   └── Views/
│       ├── layouts/
│       ├── home/
│       ├── products/
│       ├── contact/
│       └── admin/
├── public/
│   ├── index.php
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── main.js
│   └── uploads/
│       └── products/
├── lang/
│   ├── en.php
│   └── hi.php
└── .htaccess
```

## Technologies Used

- **Backend:** PHP 7.4+, MySQL
- **Frontend:** HTML5, CSS3, Vanilla JavaScript
- **Framework:** Custom PHP MVC
- **Security:** JWT, bcrypt, CSRF tokens
- **Image Processing:** GD Library

## License

MIT
