# Employee Manager Plugin

A custom WordPress plugin that registers an **Employee** post type with additional admin features like viewing employee data, calculating average salary, and exporting data to CSV.

---

## 🔧 Installation

1. Download the ZIP file.
2. In your WordPress Dashboard, go to **Plugins → Add New**.
3. Click **Upload Plugin** and choose the ZIP file.
4. Click **Install Now**, then **Activate** the plugin.

---

## 🚀 Features

- ✅ Custom Post Type: `Employee`
- 📝 Custom Fields:
  - Position
  - Email
  - Date of Hire
  - Salary
- 🗂️ Admin Submenu Page:
  - Lists all employees with their details
  - Shows **Average Salary** using AJAX (no page reload)
  - Provides **Export to CSV** functionality

---

## 📍 How to Use

1. Go to **Employees → Add New** to add employee data.
2. Visit **Employees → Admin Page** to:
   - View all employee records in a table
   - See the average salary (calculated in real-time)
   - Download a CSV of employee data

---

## 🔐 Security

- All inputs are validated and sanitized.
- Outputs are properly escaped.
- Only users with `manage_options` capability (typically admins) can access sensitive features like export and AJAX salary calculation.

---

## 📁 Plugin Structure

employee-manager/ 
├── employee-manager.php 
├── includes/ 
│ ├── post-type.php 
│ ├── meta-boxes.php 
│ ├── admin-page.php 
│ ├── export.php 
│ └── ajax-handler.php 
└── js/ 
  └── admin-script.js# employee-manager
