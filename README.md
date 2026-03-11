# Blog Test — Laravel 12

A simple blog application built with Laravel 12 using the Repository-Service-Request-Resource (Clean Architecture) pattern.

## Requirements

- PHP 8.2+
- Composer
- MySQL / MariaDB
- XAMPP or Laragon

## Architecture

| Layer | Responsibility |
|---|---|
| Controller | Handles HTTP request and response |
| FormRequest | Validates all input |
| Service | Contains all business logic |
| Repository | All database operations via Eloquent |
| Resource | Formats JSON API responses |
| Blade Views | Server-side rendered HTML |

## Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/YOUR_USERNAME/blog-test.git
cd blog-test
```

### 2. Install dependencies
```bash
composer install
```

### 3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and update these values:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_test
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Create the database

Open phpMyAdmin and create a database named `blog_test`

OR run via terminal:
```bash
mysql -u root -e "CREATE DATABASE blog_test;"
```

### 5. Run migrations and seed
```bash
php artisan migrate --seed
```

### 6. Start the server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## Available Routes

### Frontend (Blade)

| URL | Description |
|---|---|
| GET / | Latest 5 articles with truncated body |
| GET /articles/{id} | Single article with full body and nested comments |

### Admin Panel (Blade)

| URL | Description |
|---|---|
| GET /admin/articles | List all articles |
| GET /admin/articles/create | Create article form |
| POST /admin/articles | Store new article |
| GET /admin/articles/{id}/edit | Edit article form |
| PUT /admin/articles/{id} | Update article |
| DELETE /admin/articles/{id} | Delete article |

### REST API (JSON)

| Method | URL | Description |
|---|---|---|
| GET | /api/articles | List all articles |
| GET | /api/articles/{id} | Single article with comments |
| POST | /api/articles | Create article |
| PUT | /api/articles/{id} | Update article |
| DELETE | /api/articles/{id} | Delete article |

---

## Features

- Latest 5 articles displayed on homepage with body truncated to 100 characters
- Single article page with full body and publication date
- Nested comments support unlimited nesting levels (n-level replies)
- Admin panel for full article management
- Title enforced to maximum 50 characters at database, validation, and UI levels
- REST API with JSON responses for all article operations
- Flash messages auto-dismiss after 3 seconds
- Comment data can be inserted directly into the database for testing

---

## Project Structure
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Frontend/ArticleController.php
│   │   ├── Admin/ArticleController.php
│   │   └── Api/ArticleController.php
│   ├── Requests/
│   │   ├── StoreArticleRequest.php
│   │   └── UpdateArticleRequest.php
│   └── Resources/
│       ├── ArticleResource.php
│       └── CommentResource.php
├── Models/
│   ├── Article.php
│   └── Comment.php
├── Repositories/
│   ├── Interfaces/
│   │   └── ArticleRepositoryInterface.php
│   └── ArticleRepository.php
└── Services/
    └── ArticleService.php
```