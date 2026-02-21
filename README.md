# HealthMart Bad UI - PHP Web Application

A deliberately chaotic healthcare web application with intentionally poor user interface design for educational purposes.

## Features
- Login system with session management
- Product shop homepage
- Appointment booking form with bad UX patterns
- BMI calculator
- Symptom checker
- Health triage assessment
- Mental health wellness tracker
- First aid guide with emergency information

## What's Lacking

1. **Database** - Currently no database integration; all data is session-based only
2. **Data Persistence** - Appointments, user data, and form submissions are not saved
3. **User Registration** - No actual user account creation or authentication system
4. **Form Validation Backend** - Limited server-side validation of user inputs
5. **Security Measures** - No password hashing, SQL injection protection, or CSRF tokens
6. **Product Shopping Cart** - Shop displays products but has no add-to-cart or checkout functionality
7. **Payment Integration** - No payment processing system
8. **Email Notifications** - No email confirmations for appointments or purchases
9. **Admin Panel** - No backend interface to manage users, appointments, or products
10. **File Uploads** - No functionality to upload prescriptions or medical documents
11. **Appointment Calendar** - No calendar system to manage appointment dates/times
12. **Doctor/Staff Accounts** - No separate user roles or professional accounts
13. **Medical Records** - No patient history or medical record storage
14. **API Integration** - No connection to real medical databases or drug information APIs
15. **Mobile Responsiveness** - Limited responsive design for mobile devices
16. **Accessibility Features** - Poor accessibility compliance (intentionally bad UI)
17. **Error Logging** - No system for logging errors or debugging
18. **Session Security** - Basic session management without proper security measures
19. **Input Sanitization** - Minimal protection against XSS and malicious inputs
20. **Backup System** - No data backup or recovery mechanisms

## How to Run

1. Install XAMPP or any PHP server
2. Navigate to project directory
3. Run: `php -S localhost:8000`
4. Open browser: `http://localhost:8000/login.php`
5. Login with any username/password (no validation)

## Note
This project intentionally features bad UI design patterns including:
- Comic Sans MS font everywhere
- Chaotic colors and animations
- Poor form UX (age shows "EXPIRED" when >18)
- Email validation that rejects @ symbol
- Phone number as 10 individual dropdown menus
- Random popup alerts
- Blinking and shaking elements

**For educational/entertainment purposes only!**
