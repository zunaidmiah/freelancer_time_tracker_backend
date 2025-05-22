# Freelance Time Tracker API

A simple RESTful API built with Laravel 12 that allows freelancers to manage clients, projects, and track their time logs.
Authentication is handled via Laravel Sanctum.

---

## 🚀 Features

* User Registration & Login (Sanctum)
* Manage Clients & Projects
* Track Time Logs (Start/End & Manual)
* Filter reports by client, project, or date
* API-ready with proper authentication

---

## 🛠️ Tech Stack

* Laravel 12+
* Sanctum for API authentication
* Eloquent ORM
* Factories & Seeders
* MySQL or any Laravel-supported DB

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/zunaidmiah/freelancer_time_tracker_backend.git
cd freelancer_time_tracker_backend
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
```

Then update the `.env` file with your database and app credentials.

### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Run Migrations with Seed

This will reset the database, run all migrations, and populate demo data (users, clients, projects, time logs):

```bash
php artisan migrate:fresh --seed
```

### 6. Serve the Application

```bash
php artisan serve
```

The API will now be available at:
`http://127.0.0.1:8000`

---

---

## 👤 Author

**Zunaid Miah**
Laravel Developer | PHP, MySQL, Vue, REST APIs

---

## 📜 License

This project is open-source and free to use.
