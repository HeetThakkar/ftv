Ftv Assignment

Live

Registration:
Validation for all the fields in registration form is done by php using jquery keyup function
Captcha is validated at the initial stage before final ajax call for validation
If all the details entered properly then the user's data is saved in the users table in the database
In the users table we have 1 primary key column id and 3 unique columns email, mobile and username

Login:
In the first field we can enter email or the username or phone number to validate the user with corresponding password.
If email does not exist it says user not found
If password does not match it shows an error or incorrect password
If password matches the email/username or mobile number then it navigates user to home page
If user selects remember me then the id is stored in the cookie with is valid for a year which is set by me, we can also change this period
If the remember me radio is not selected the id is saved in the session which is only valid for the current.
After user clicks on logout the data in session and cookie is cleared and is navigated to the index page

Live Link
https://brandniti.com/projects/ftv/

Login Details:
Username:heet
Password:Heet@1234


Links where I have used such functionalities
https://brandniti.com/hrdashboard/userhome.php
https://proptranxact.com/
https://jewelrynart.com/

All the above websites are CMS driven with an admin panel to change the add/edit/hide data.





