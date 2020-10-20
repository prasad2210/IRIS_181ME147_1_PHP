# IRIS_81ME147_PHP

This is an a library dashboard which isdevelped to extend iris website of nitk.(requirenment task)

## Set Up Instructions For Running Website
1. Start the Apache and MySQL modules using the XAMPP controller.
2. Open the phpMyAdmin and create a database "library".
3. Import the library.sql file present in the database folder.
4. Open the htdocs folder in the xampp folder. Copy paste the folder IRIS_181ME147_1_PHP.
5. Open the browser (chrome), type localhost/IRIS_181ME147_1_PHP and you should see the index page of the website.

## operating steps

1. in first page you will see a dashboard. to operate you need to log in first
    1.  id. admin passward. Admin@123  use this id and passward to see admin control panel 
        here admin can add a book edit data.
        anv tab in issues there are 3 tabs in pending tab admin can approve request or reject it
        it should appear in approve or rejected tab as per action.
      
        when a book is approved and also returned by a student it should appear in transactions
     
   2.  for student dashboard you can log in with id. 18ME147 passward. 147
       or you can create a account with sign up option.
       student can make a issue request with given button, and can see all of his requests in issue request tab
       and all of his books that are approved ny admin should be in my books session
       his transactions can be viewed in transactions tab
       
       
## List of Immplementerd Fetures
  1. log in/ sign up with validaions
  2. add book option to admin
  3. approve/reject actions tab for admin
  4. edit option with modal
  5. all the requests, my books, transaction tabs for student dashboard.
  6. issues, transaction tabs for admin
  
## List of non-implemented/planned features
  1. overdue charges calculator
  2. improve books card session(design part)
  3. Edit form glitches as it require to add all inputs
  
## Reference
  1. w3school
  2. stackoverflow
## screenshots
## dashboard
![Alt text](./screenshots/1.png?raw=true "dashboard")
## login/signup

![Alt text](./screenshots/2.png?raw=true "login")
## Addbook/edit

![Alt text](./screenshots/3.png?raw=true "Addbook/edit")
## issue_pending

![Alt text](./screenshots/4.png?raw=true "issue_pending")
## dashboard-admin

![Alt text](./screenshots/5.png?raw=true "dashboard-admin")
## myBooks

![Alt text](./screenshots/6.png?raw=true "myBooks")
## issue_requests

![Alt text](./screenshots/7.png?raw=true "issue_requests")
## transactions

![Alt text](./screenshots/8.png?raw=true "transactions")
