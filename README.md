# 🎓 Campus Event Management System (CEMS)
![License](https://img.shields.io/badge/license-MIT-blue.svg)

A web-based system designed to **organize, manage, and participate** in campus events seamlessly.  
This project is being developed progressively as part of **Web Technology (KP34903)** labs at **Universiti Malaysia Sabah (UMS)**.

---

## 💡 Project Overview

CEMS is a continuous weekly lab project that starts with basic **HTML structures** (Lab 01) and evolves into a responsive **HTML + CSS web application** (Lab 02), with further enhancements coming in **Lab 03** using **JavaScript** for interactivity.

The goal is to simulate a real-world project lifecycle where features are introduced incrementally.

---

## 🚀 Features (as of Lab 03)
- 📱 **Responsive Navigation Menu** with hamburger icon (Font Awesome)
- ⚙️ **JavaScript Toggle Function** for mobile navigation visibility
- 🧾 **Register Form Validation**:
  - Requires at least one event checkbox selected
  - Validates phone number (10 digits, numeric only)
  - Validates password length between 6–8 characters
- 💬 **Dynamic Feedback Message** showing all validated user input inside `<p id="output"></p>`
- 🔒 **Improved User Interaction** with inline alerts and smooth validation flow
- 🎨 **Consistent Styling** maintained using shared `styles.css` without changing aspect ratios

---

## 🛠️ Built With

- **HTML5**  
- **CSS3** (responsive design, media queries)  
- **VS Code** for development  
- **GitHub** for version control  

---

## 📁 Project Structure
```
CEMS/
├── lab01/ # Lab 01 - HTML only (no CSS)
│ ├── index.html
│ ├── login.html
│ └── register.html
├── lab02/ # Lab 02 - HTML + CSS
│ ├── index.html
│ ├── login.html
│ ├── register.html
│ ├── css/
│ | └── styles.css
├── lab03/ # Lab 03 - HTML + CSS + JavaScript
│ ├── index.html
│ ├── login.html
│ ├── register.html
│ ├── css/
│ | └── styles.css
├── assets/ # Shared images for all labs
│ ├── img/
│ │ ├── logo.jpg
│ │ ├── banner.jpg
│ │ ├── event1.jpg
│ │ ├── event2.jpg
│ │ └── event3.jpg
├── .gitignore # Ignore editor/system files
├── LICENSE # MIT License
└── README.md # Project documentation
```
---

## ▶️ How to Run

1. Clone this repository:
   ```bash
   git clone https://github.com/<your-username>/<your-repo>.git
2. Open the project folder in VS Code.
3. Open in a browser, or use Live Server in VS Code.
4. Explore the pages:
   - index.html → Home with event listings
   - register.html → Registration form
   - login.html → Login form
   
---

## 👤 Author
| Name                                   | Profile Link                                                            |
|----------------------------------------|-------------------------------------------------------------------------|
| **Aniq Najmuddin Bin Sharifuddin**     | [Linkedin](https://www.linkedin.com/in/aniqnaj)                         |
