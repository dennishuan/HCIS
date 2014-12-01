##CMPT 470 Final Project Implementation
##Health Care Information System (HCIS) by "It HURTS when I PHP"(mx6)
##Jeffrey Fung, Dennis Huan, Andrew Liaw, James Taylor, and Eric Yuen


Abstract:
Emergency departments (ED) and medical clinics in Metro Vancouver experience increasing number of visits and ED admissions.
Integrating a web-based information system to unify patients' data from their general practitioners (GP), and their medical
doctors (MD) is vital to maximize health care resources and services. Our project focuses on patients' data and their medical
records in MySQL database management system (DBMS) to help with diagnosing, and efficiently performing treatments. 
Furthermore, our information system can provide data to health authorities to help better understand the growth in visits 
based on demographics, and provide better health services conducted from their statistical and decision analyses. 
Some analyses include: to reduce the time to queue in ED which is known to be few hours in Fraser Health hospitals; and to reduce the costly fee[1] on patients from transferring their records from one practitioner to another.

[1] Fee is set by BCMA. Full details can be found on page 4 in https://www.doctorsofbc.ca/sites/default/files/fee_guide_uploads/medical_legal.pdf

Login Information (userid/password) [case sensitive]:
Admin: admin/admin
Doctor: doctor/doctor
Nurse: nurse/nurse

Technology used:
Framework: Laravel 4.2
DBMS: MySQL
Bundles/Packages: CSS Bootstrap, JQuery/Java Script
    
Fully Functional Features:
1 Security
  1.1 Passwords are stored using HASH & AES encryptions.
  1.2 Authenticating users upon login and logout.
  1.3 Session timeouts.
  1.4 Protecting routes.
  1.5 CSRF tokens to prevent cross site request forgery.
2 Users
  2.1 All users can search and input in all search fields.
  2.2 Admins 
  *2.2.1 Allow to import, export files.
  *2.2.2 Allow to create, edit, delete, and view users, facility, patient, and records.
  2.3 Doctors
  *2.3.1 Allow to create, edit, and view patients, and records.
  *2.3.2 Allow to edit their own profile in users.
  *2.3.3 Allow to view facility.
  2.4 Nurses
  *2.4.1 Allow to create, edit, and view patients, and records.
  *2.4.2 Allow to edit their own profile in users.
  *2.4.3 Allow to view facility.       
3 Validation
  3.1 Real-time validation. Data is validated via HTML5 on client and the server validates the data again.
  3.2 Validates each field when creating or editing records, patients, users, facility, and search.
  3.3 Required fields are highlighted in red.
  3.4 Validates if fields are filled and if valid email address in the email field. Additionally validates the length of the required input.
4 Search
  4.1 Allow users to search for users, facility, medical records, or patients with at least one field filled. 
  4.2 Designed to be simple and similar to pharmacy search UI screen.
  4.3 Search efficiently and comprehensively to find patients, users, facility, and medical records.
  4.4 Intended to not be case sensitive.
5 Tables
  5.1 Sort by categories by clicking on column headers.
  5.2 Refresh table button beside the search bar.
  5.3 View by categories button beside the refresh button.
6 Import/Export
  6.1 Import csv files to record/patient tables and is stored in the database. Since this is a one-time setup for each facility, this is done by health authorities. This requires a specific format to be consistent for all facilities.
  6.2 Export record/patient table to csv file. Health authorities can export data to be used for decisions and statistical analyses to provide better health care services (e.g. reduce queue time in ED, and to understand what are the causes of growth in visits based on demographics). CSV file was chosen because it can be easily opened with Excel, JMP, SAS, and R statistical analysis software.
7 Upload
  7.1 Enable users to upload their profile pictures through their profile page (left hand side of the logout button).
  7.2 Enable users to choose their image from their file system.
  7.3 Uploading profile images and files (e.g. X-Ray images, and completed blood tests forms) to help identify patients, and users, as well as providing better health services without incurring additional fees to patients.
  7.4 Images are validated prior to upload.
8 Medical fields
  8.1 Includes exact medical fields as Fraser Health[1] hospitals and common medical fields from medical clinics[3] in Metro Vancouver. 
  *[2] Eric did a research project for Fraser Health Authority in Summer 2014.
  *[3] Acquired from several medical clinics including SFU Health Services in Maggie Benston Centre in Burnaby campus.
9 User Interface
  9.1 Simple UI for users to be quickly familiar with the technology.
  9.2 Creating new records and patients require most of the fields to be filled. This is vital to reduce the number of missing data to providing better health services.
10 Relational Database
  10.1 Business logics.
  10.2 Data is seeded by Laravel.
11 Error Exception Handling
  11.1 Returns 404 error page if page not found.
  
Non-functional features:
12 Selecting more than one selection and clicking on 'show' in tables will only display the first selection.