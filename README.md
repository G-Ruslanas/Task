# About
This is a PHP application, where a user has a opportunity to register for vaccination. In application there are two types of users:
1. typical user, who can:
  a. Register;
  b. Login;
  c. Register for Vaccination;
  d. See details about personal appointment, e.g. delete, edit;
2. medical personnel, who can:
  a. All same things as typical user plus...;
  b. See all registered people for vaccination;
  c. Print list of appointment for specific date, sorted by time;
  d. Export and Import appointments in .CSV format;
# Instructions
1. Run command: php -S localhost:port -t your_folder, e.g. php -S localhost:8000 -t C:\xampp\htdocs\Visma
2. Navigate to the folder where your MySQL is installed, go to the bin folder and run command: mysqld; to start MySQL;
3. Important step is to create the database, which is called "visma", you can do it after you complete the second step by running the command: mysql -u root -p => press enter, for empty password and type "create database visma;"
4. When all steps will be completed, after first visit to the application automatically two tables will be created and one record will be inserted into the users table, which will let you log in to the system with: email = ruslanas.g21@gmail.com, password = slaptaslabai, this will allow you to see all functionality, which is provided for medical personnel. To see functionality for a typical user, log out and create a new user.
# Database
For this project was user MySQL database: httt://localhost/phpmyadmin
