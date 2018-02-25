# WATCHERS
Hello!, this is my forum app. I like to call it watchers.
It was built ontop codeigniter PHP framework

I used table prefix of van_. I do this to add security to my db tables.It confuses anyone trying to manipulate the code or db tables.
There are relationship between some of the tables. Used simple search not full text searching because don't know how you server is setup.

To login to the backend  click the Admin button at the top left corner of the pages. 
    The username is vanhack
    The password is vanhack

#PROJECT REQUIREMENT FROM VANHACK
A simple forum app
Landing page with all posts
Post's category
Commenting system
Login/logout with permission to edit only owned post and comments

#FEATURES OF GOVERNANCE WATCHERS
Landing page with all topic
About  page
Topic category
Topic commenting system
Contact page
Survey Q & A
Survey opinion poll
Search Topics

In facts.Watchers forum is production ready!!!. 

### Installation
    # REQUIREMENT
    - THE DATABASE ATTACHED TO THE PROJECT
    - PROJECT FILES AND ASSETS
    - CONFIGURE .htaccess

    ------------------------------------------------------

    #DB INSTALL (STEP 1)
    create a new database then import the project database file. It's called van_hack_greenDevNG_db.db
    I called it van_hack_greenDevNG_db.db because i assume alot of people will name their db (van_hack) or something similar.
    Don't forget to assign a user to the database and please remember the username and password.
    You need it to configure the database for the application.

    #PROJECT FILES (STEP 2)
    Copy all project files to a web accessible folder.

    ### DATABASE CONFIGURATION (STEP 3)
    Configure the db setting. It's located at application/config/database.php
    You change the 

	    'hostname' => 'localhost',
	    'username' => 'root',
	    'password' => '',
	    'database' => 'van_hack_greenDevNG_db',

    to match your own database and database user configuration.

    #BASE URL (STEP 4)
    Configure the base url at /application/config/config.php.
___

__Developed by Bernard Dublin-Green (greendublin007@gmail.com)
