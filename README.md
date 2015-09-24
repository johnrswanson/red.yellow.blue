# red.yellow.blue

Red.Yellow.Blue is a delightfully simple Web Design / Development tool and Content Management System. 
It was built with simplicity in mind. The goal is to create a more joyous experience for everyone who is publishing on the web. 

Built using PHP, MySQL, and JQuery

      Features include:
      
      Pop-Out CMS control panel for live editing
      Drag and drop layout and design 
      Content Boxes: custom inputs in the CMS for extendable uses
      Responsive Design for phones and tablets
      Minimalist setup - start with a blank canvas
      Flexible options left open for developers to use custom scripts and plugins
      No coding necessary for a basic users
     
      


This software is free to use for any purpose on your own web server. 

Created by John Swanson - Contact: john@red.yellow.blue

 More info at http://red.yellow.blue


Requirements:  You must have a Host server and a Domain name to use this software. 


Installation Instructions:

Step 1: Download the Red.Yellow.Blue software

        See the folder contents :
            public_html
            MYSQLDB.sql
            connect.php
        
Step 2: Create an empty MYSQL database: 

        Use the tools provided by your Host Server 
                              (PhpMyAdmin or Cpanel, for example). 
        Import the MYSQLDB.sql starter file into the new empty database
        Edit the connect.php file to point to your own Host MYSQL Server
        Move the connect.php file into the folder: public_html/admin/ 

Step 3: Copy the contents of your public_html folder into your webroot: 

        THIS IS IMPORTANT:  Enable "Show invisible Files/Folders" 
        in your FTP program before you copy the files. 
        Be sure to copy the hidden .htaccess file as well. 

Step 4: Go to http://YOUR-URL/register.php in a web browser and Create an Administrator account:

        THIS IS IMPORTANT: 
        After you have created your admistrator account, 
        DELETE the register.php file from your webserver.
        
        Once these setup steps are complete, you should be able to login. 
        

Step 5: You can now begin to use Red.Yellow.Blue to design and manage your website.

        Go to http://YOUR-URL/login.php
        Click the 3-Color Menu in the upper left hand corner of your screen to add your first page. 


HOW IT WORKS:

* Pop-Up Content Management System: The backend controls are built right into the frontend of the website. You could also say: The design of the frontend is applied to the backend, or vice versa. It's the same thing.  As the editor of your page, you don't have to go back and forth between a dashboard and the live website to see your changes. Instead, you edit your content in the Pop-Up Helper Window, and see the results right away. A 3-Color menu icon appears in the top left hand corner of the screen. This menu is the only minimalistic indication that you are logged in. You are able to edit everything right in it's place, right where you see it. 


* Adding Elements : You start with a blank page, and add elements to it.  Elements might be a Photo, some Text, or a Box for content.  There are different kinds of Boxes -  Blog, Gallery, Video or Shop. The format of existing Boxes is easy for developers to copy, so you can build add-ons and make your own specific content management system as needed in any given situation. 


* Saving Changes : Each element is stored as a record in the database. CSS rules (for example: color, font, size, position, etc...) for each element on the page are also stored in the database. To change something on your page, you simply click on the thing you want to edit, and an EDIT button will appear over the element. Click on the EDIT button to launch the Pop-Out Helper Window for that specific element. Click Save, and the attributes of that element are then modified in the database. As you continue to add more content and move things around on your page the database is updated in real time! 

* I will add more info here soon about the rest of the features. For now, this is a pretty good summary of what I'm working on releasing. I am planning to release the source code on October 1 2015


