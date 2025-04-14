# PorschePulse - Porsche Car Showcase Website

A modern website showcasing Porsche cars with features like car models display, test drive booking, and user authentication.

## Features

- Responsive design for all devices
- Interactive car showcase
- Test drive booking system
- User authentication (Login/Signup)
- Contact form
- Modern UI with animations

## Prerequisites

Before you begin, ensure you have the following installed:

- [XAMPP Control Panel](https://www.apachefriends.org/download.html) (Download the latest version for your operating system)

## Setup Instructions

1. **Install XAMPP**

   - Download XAMPP from the link above
   - Run the installer and follow the installation wizard
   - Choose the default installation directory (usually `C:\xampp`)

2. **Start Servers**

   - Open XAMPP Control Panel
   - Start Apache and MySQL servers by clicking the "Start" button next to each
   - Ensure both services are running (indicated by green status)

3. **Project Setup**

   - Navigate to your XAMPP installation directory (usually `C:\xampp\htdocs`)
   - Create a new folder (e.g., `porschepulse`)
   - Copy all project files into this folder

4. **Database Setup**

   - Open your web browser and go to `http://localhost/phpmyadmin`
   - Click on "New" to create a new database
   - Name the database `porsche`
   - Import the database schema (if provided)

5. **Access the Website**
   - Open your web browser
   - Navigate to `http://localhost/porschepulse` (replace 'porschepulse' with your folder name)

## Project Structure

```
porschepulse/
├── CSS/
│   ├── style.css
│   └── login.css
├── Images/
│   ├── car1.png
│   ├── car2.png
│   └── ...
├── JS/
│   ├── login.js
│   └── exp.js
├── Font/
│   └── TT Octosquares Trial Black.ttf
├── index.html
├── models.html
├── experience.html
├── login.html
├── login.php
└── signup.php
```

## Troubleshooting

1. **Apache/MySQL won't start**

   - Check if ports 80 and 3306 are in use
   - Run XAMPP as administrator
   - Check XAMPP error logs

2. **Website not loading**

   - Ensure files are in the correct directory
   - Check if Apache is running
   - Verify folder permissions

3. **Database connection issues**
   - Verify MySQL is running
   - Check database credentials in PHP files
   - Ensure database exists and is properly imported

## Security Notes

- Change default XAMPP passwords
- Keep your XAMPP installation updated
- Don't use this setup for production environments

## Support

For any issues or questions, please open an issue in the GitHub repository.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
