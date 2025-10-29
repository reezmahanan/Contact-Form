# Beautiful PHP Contact Form

[![PHP Contact Form](https://img.shields.io/badge/PHP-Contact%2520Form-blue)](https://github.com/reezmahanan/Form)
[![License: MIT](https://img.shields.io/badge/License-MIT-green)](LICENSE)
[![Design: Responsive](https://img.shields.io/badge/Design-Responsive-orange)]()

A modern, responsive contact form with PHP validation and elegant styling. Clean UI, accessible markup, and both client-side and server-side validation make this an easy drop-in contact form for small sites and static pages served with PHP.

Demo
![Demo](https://github.com/reezmahanan/Contact-Form/blob/main/contact%20form.png)

Features
- ✨ Modern UI Design — Gradient background and card layout
- 📱 Fully Responsive — Works on mobile and desktop
- 🔒 Form Validation — Client-side (HTML5) and server-side (PHP)
- ⚡ PHP Backend — Secure input processing with sanitization
- 🎨 Beautiful Styling — CSS3 with smooth animations
- ♿ Accessible — Proper labels and semantic HTML

Table of Contents
- [Demo](#demo)
- [Installation](#installation)
- [Usage](#usage)
- [Form Fields](#form-fields)
- [Code Overview](#code-overview)
- [Customization](#customization)
- [File Structure](#file-structure)
- [Browser Support](#browser-support)
- [Contributing](#contributing)
- [License](#license)
- [Troubleshooting & Support](#troubleshooting--support)
- [Acknowledgments](#acknowledgments)

Installation
1. Clone the repository
```bash
git clone https://github.com/reezmahanan/Contact-Form.git
cd Form
```

2. Set up a PHP environment
- Ensure PHP 7.0+ is installed.
- Use XAMPP, MAMP, WAMP, or any PHP-enabled web server.

3. Run the application
- Place the project files in your web server's document root (e.g., htdocs or www).
- Open: http://localhost/Form/contact-form.php

Usage
- Open the form in your browser
- Fill the required fields:
  - Name (required)
  - Email (required)
  - Website (optional)
  - Gender (required)
  - Comment (optional)
- Submit the form and review validation feedback

Form Fields
| Field    | Type     | Required | Validation                 |
|----------|----------|----------|---------------------------|
| Name     | Text     | ✅       | Letters and spaces only   |
| Email    | Email    | ✅       | Valid email format        |
| Website  | URL      | ❌       | Valid URL format (optional) |
| Gender   | Radio    | ✅       | One option must be chosen |
| Comment  | Textarea | ❌       | Free text                 |

Code Overview

- Input sanitization and validation are performed server-side in PHP to prevent XSS and to ensure data integrity.
- The client uses HTML5 validation attributes and basic CSS to provide immediate feedback.

Example PHP sanitization helper:
```php
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
?>
```

Typical validation flow (simplified):
1. Check request method is POST
2. Validate required fields and formats
3. Sanitize inputs with test_input()
4. Return errors or success confirmation

Customization

Changing Colors
Edit the CSS variables in the <style> section or the linked CSS file:
```css
:root {
  --primary-color: #6a11cb;
  --secondary-color: #2575fc;
  --success-color: #2ecc71;
  --error-color: #e74c3c;
}
```

Adding New Fields
1. Add the HTML form element in contact-form.php
2. Update server-side validation and sanitization
3. Adjust styles as needed

File Structure
php-contact-form/  
├── contact-form.php           # Main form file (HTML + PHP)  
├── README.md                  # Project documentation  
├── LICENSE                    # MIT License  
└── screenshot.png             # Form screenshot / demo image

Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Modern mobile browsers

Contributing
Thank you for considering contributing! To contribute:
1. Fork the repository
2. Create your feature branch: git checkout -b feature/AmazingFeature
3. Commit your changes: git commit -m "Add some AmazingFeature"
4. Push to the branch: git push origin feature/AmazingFeature
5. Open a Pull Request and describe your changes

License
This project is licensed under the MIT License — see the LICENSE file for details.

Troubleshooting & Support
Common Issues
- Form not submitting:
  - Ensure PHP is installed and the web server is running.
  - Check that file is accessed through the server (http://localhost/...), not via file://.
- Validation errors:
  - Make sure all required fields are filled.
  - Check email/URL formatting.
- Styling issues:
  - Clear browser cache.
  - Verify CSS file path if external.

If you have questions or issues, please open an issue in the repository.

Acknowledgments
- PHP Documentation
- Modern CSS techniques and responsive design patterns
- Accessibility best practices

Made with ❤️ using PHP, HTML, and CSS

⬆ Back to Top
