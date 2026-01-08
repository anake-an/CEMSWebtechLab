# 🎓 Campus Event Management System (CEMS)
![License](https://img.shields.io/badge/license-MIT-blue.svg)

A web-based system designed to **organize, manage, and participate** in campus events seamlessly.  
This project is being developed progressively as part of **Web Technology (KP34903)** labs at **Universiti Malaysia Sabah (UMS)**.

---

## 💡 Project Overview

CEMS is a continuous weekly lab project that begins with basic **HTML structures** (Lab 01), evolves into a responsive **HTML + CSS web application** (Lab 02), adds **JavaScript interactivity** (Lab 03), integrates **PHP server-side processing** (Lab 04), and finally becomes a **full-stack system** with **database integration and admin panel** in **Lab 05**.

The goal is to simulate a real-world web application development lifecycle where features are introduced incrementally using industry-relevant practices.

---

## 🚀 Features (Up to Lab 05)

### 🧩 Frontend (Lab 01 – Lab 03)
- 📱 **Responsive Navigation Menu** with hamburger icon (Font Awesome)
- ⚙️ **JavaScript Toggle Function** for mobile navigation
- 🧾 **Register Form Validation**:
  - At least one event checkbox required
  - Phone number validation (numeric, 10 digits)
  - Password length validation (6–8 characters)
- 💬 **Dynamic Feedback Output** inside `<p id="output"></p>`
- 🎨 **Consistent UI styling** using shared `styles.css`

---

### 🖥️ Backend with PHP (Lab 04)
- 🔁 Converted all pages from `.html` to `.php`
- 🧩 **Reusable navigation menu** using PHP `include`
- 📤 Form submission using **POST & GET**
- 🛡️ Secure input handling with `htmlspecialchars()`
- 💾 **Session management** for editing registration data
- 🔄 Edit mode using query string (`?action=edit`)

---

### 🗄️ Database & Admin Panel (Lab 05)
- 🗂️ MySQL database integration (`cems.sql`)
- 🔐 Centralized configuration via `config.php`
- 🧑‍💼 **Admin Dashboard**
- 🧾 **Event Management (CRUD)**:
  - Create event (with image upload)
  - Manage events
  - Edit event
  - Delete event (with file removal)
- 🖼️ Image upload handling via `/uploads`
- 🔍 Event filtering by category (GET method)
- 🔄 Frontend event listing dynamically loaded from database

---

## 🛠️ Built With

- **HTML5**
- **CSS3** (responsive design, media queries)
- **JavaScript (ES6)**
- **PHP**
- **MySQL**
- **VS Code** for development
- **XAMPP** (Apache & MySQL)
- **GitHub** for version control

---

## 📁 Project Structure
```
CEMS/
├── lab01/ # Lab 01 - HTML only
│ ├── index.html
│ ├── login.html
│ └── register.html
│
├── lab02/ # Lab 02 - HTML + CSS
│ ├── index.html
│ ├── login.html
│ ├── register.html
│ └── css/
│ └── styles.css
│
├── lab03/ # Lab 03 - HTML + CSS + JavaScript
│ ├── index.html
│ ├── login.html
│ ├── register.html
│ └── css/
│ └── styles.css
│
├── lab04/ # Lab 04 - PHP & Web Forms
│ ├── index.php
│ ├── login.php
│ ├── login_action.php
│ ├── register.php
│ ├── register_action.php
│ ├── css/
│ │ └── styles.css
│ └── include/
│ └── topNav.php
│
├── lab05/ # Lab 05 - Database & Admin Panel
│ ├── cems.sql
│ ├── config.php
│ ├── index.php
│ ├── admin/
│ │ ├── index.php
│ │ ├── events/
│ │ │ ├── create.php
│ │ │ ├── create_action.php
│ │ │ ├── edit.php
│ │ │ ├── edit_action.php
│ │ │ ├── delete.php
│ │ │ └── manage.php
│ │ └── include/
│ │ ├── sidebar.php
│ │ ├── header.php
│ │ └── footer.php
│ ├── auth/
│ │ ├── login.php
│ │ ├── login_action.php
│ │ ├── logout.php
│ │ ├── register.php
│ │ └── register_action.php
│ ├── assets/
│ │ ├── css/
│ │ │ ├── styles.css
│ │ │ └── admin.css
│ │ ├── js/
│ │ │ ├── main.js
│ │ │ └── admin.js
│ │ └── img/
│ ├── include/
│ │ ├── topNav.php
│ │ └── footer.php
│ └── uploads/
│
├── assets/ # Shared images (Lab 01–03)
│ └── img/
│ ├── logo.jpg
│ ├── banner.jpg
│ ├── event1.jpg
│ ├── event2.jpg
│ └── event3.jpg
│
├── .gitignore
├── LICENSE
└── README.md
```
---

## ▶️ How to Run

### Requirements
- XAMPP / WAMP
- PHP 8+
- MySQL
- Web browser

### Steps
```bash
1. Clone the repository
2. Move project to:
   c:/xampp/htdocs/cems
3. Start Apache & MySQL (XAMPP)
4. Import lab05/cems.sql using phpMyAdmin
5. Access:
   - Lab 04: http://localhost/cems/lab04/
   - Lab 05: http://localhost/cems/lab05/
   - Admin Panel: http://localhost/cems/lab05/admin/
```
---
## 👤 Author
| Name | Profile Link |
|----------------------------------------|-------------------------------------------------------------------------|
| **Aniq Najmuddin Bin Sharifuddin** | [Linkedin](https://www.linkedin.com/in/aniqnaj) |
