# Red Yellow Blue

 A delightfully simple web design / development tool and Content management system. 


      Features include:
      
      No coding necessary for a basic users
      Drag and drop layout and design 
      Pop-Out CMS control panel for live editing
      Content Boxes: custom inputs in the CMS for extendable uses
      Responsive Design for phones and tablets
      Minimalist setup - start with a blank canvas
      Flexible options left open for developers to use custom scripts and plugins

This software is free to use for any purpose on your own web server. 

Created by John Swanson - Contact: john@red.yellow.blue
More info at http://red.yellow.blue


Requirements:  You must have a Web Host server and a Domain name to use this software. 


Installation Instructions:

Step 1: Download the Red.Yellow.Blue Install ZIP file

        See the folder contents :
            A Folder called "Copy These to public_html" 
            Database Install.sql
            connect.php
        
Step 2: Create an empty MYSQL database: 

        Use the tools provided by your Host Server 
                              (PhpMyAdmin or Cpanel, for example). 
        Import the MYSQLDB.sql starter file into the new empty database
        Edit the connect.php file to point to your own Host MYSQL Server
        Move the connect.php file into the folder: public_html/admin/ 

Step 3: Copy the files to public_html folder on your web host: 


Step 4: Go to http://YOUR-URL/admin/register.php in a web browser and Create an Administrator account for your site:

        THIS IS IMPORTANT: 
        After you have created your admistrator account, 
        DELETE the register.php file from your webserver.
        
        Once these setup steps are complete, you should be able to login. 
        

Step 5: You can now begin to use Red.Yellow.Blue to design and manage your website.
       TO LOGIN: Go to http://YOUR-URL/?go=admin
        Click the 3-Color Menu in the upper left hand corner of your screen to enter the Administrator email and password you created in the previous step. 


HOW IT WORKS:

* Pop-Up Content Management System: The backend controls are built right into the frontend of the website. You could also say: The design of the frontend is applied to the backend, or vice versa. It's the same thing.  As the editor of your page, you don't have to go back and forth between a dashboard and the live website to see your changes. Instead, you edit your content in the Pop-Up Helper Window, and see the results right away. A 3-Color menu icon appears in the top left hand corner of the screen. This menu is the only minimalistic indication that you are logged in. You are able to edit everything right in it's place, right where you see it. 


* Adding Elements : You start with a blank page, and you can add things to it.  Elements might be a Photo, some Text, or a Box for content.  


* Saving Changes : Each element is stored as a record in the database. CSS rules (for example: color, font, size, position, etc...) for each element on the page are also stored in the database. To change something on your page, you simply click on the thing you want to edit, and a MOVE button and  EDIT button will appear over the element. Click on the EDIT button to launch the Pop-Out Helper Window for that specific element. As you make changes, the attributes of that element are then modified in the database aand live on the page. As you continue to add more content and move things around on your page the database is updated in real time! 


* Version 2 Released March 10, 2016
* Version 1 released on October 1, 2015



Special Thanks To 
Allon Hadaya and Jeff Jassky, 
Without all the help I got from these two bad-asses, this project would not be possible. 
