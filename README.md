<div align="center">
Выберите язык / Choose prefered language
    
[Русский](README.ru.md) | <b>English</b>

</div>
<hr>

# Pekarnya - Online Bakery Order System

Educational project of an online bakery built with Laravel 10 and MySQL.

## Technologies

- Backend: PHP 8.1+, Laravel 10.10
- Database: MySQL
- Authentication: Laravel Sanctum
- Frontend: Blade, HTML5, CSS3, JavaScript
- Build Tool: Vite

## Architectural Solutions
- MVC Architecture - separation of concerns (Models, Views, Controllers)
- Eloquent Relationships - hasMany, belongsTo for orders, items, addresses
- Middleware Groups - protecting authenticated routes
- Resource Controllers - RESTful approach for CRUD operations
- Blade Components - reusable UI components
- Form Requests - dedicated validation classes
- Database Transactions - ensuring data integrity during order placement

## Laravel Features Used

- Eloquent ORM for database operations and relationships
- Blade templating engine with layouts and components
- Middleware for authentication and route protection
- Migrations for database schema management
- Seeders and Factories for test data generation
- Form Requests for dedicated validation classes
- Route Model Binding for automatic model injection
- Service Container for dependency injection
- Session management for cart handling
- Artisan CLI for project management

<hr>

## Implemented Features
### Authentication System
- User registration with validation
- Login/Logout functionality
- Session-based authentication
- Protected routes with middleware

### Menu & Categories
- Category-based menu structure
- Dynamic menu generation from database
- Individual item pages with details
- Category filtering

### Shopping Cart
- Add items to cart
- Update item quantities
- Remove items from cart
- Cart persistence in session
- Real-time total calculation

### Order Management
- Order placement with address selection
- Multiple delivery addresses per user
- Active orders tracking
- Order history
- Order completion marking

### User Profile
- View profile information
- Manage delivery addresses:
  - Add new addresses
  - Delete existing addresses
  - Multiple addresses support
