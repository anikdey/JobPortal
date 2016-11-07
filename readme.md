# JobPortal

A practice project using Laravel 5.3 and MySql for portfolio. There are two panels Admin Panel and the front end.
From admin panel Admin will be able to insert Departments/Category and Job Post under the inserted Departments.
The jobs posted by the Admin will be listed out in the front end, where the visitors will be able to apply for 
jobs by providing their credentials along with a CV(only PDF) and Picture.

From the Admin panel the Admin will be able to delete Job, Department and Applications. Admin will be able to view
the Applicants CV in the browser and download it. Search facilities also provided for the Admin in the Job List and
the Applicantion List.

# Concepts Implemented

1. IOC (Inversion OF Control)
2. ORM
3. ViewComposer
4. Middleware
5. Filesystem / Cloud Storage
6. Ajax
7. DataTable

# Installation

Create a table named job_portal with username "root" and password "".
If you have alreay installed composer then run the following commands from your terminal.

php artisan migrate
php artisan db:seed

If everything goes perfect then you will be able to login by using the following credentials.

Email : admin@gmail.com
Password : admin
