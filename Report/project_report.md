# CP476 Project Report: Img Social  
### Ryan Polkiewicz, Chloe (Aaron) Szucs  
### 2021-04-10  
  
# System design & implementation
## P2.1 Client side component & UI   
The client side component that we chose to use was the XAMPP Apache web server that was used in the assignments for the course. 
We thought that this would be the most straight forward approach to creating a client side server with user friendly features.
All of the html elements that we wrote from scratch were those that were taught to us in class regarding web design.
Additionally, we used Bootstrap as well as Cloud Flares, Font Awesome library to make the creation of certain elements easier.

![P2.1](images/P2.1.png)

## P2.2 Server side CGI components 
The server side component that we choose to use was the XAMPP MySQL server running through the PHPmyAdmin online console.
We again thought that this would be the most straight forward approach in creating a server that had many of the features that we needed.
By using this both of our members had experience within SQL databases and it made creating a data model from scratch that much easier.
To communicate with the server we used AJAX get functions as well as PHP files that made the connection with the database.
The whole process was quite easy and straight forward and did what we needed to with relative ease.

![P2.2_1](images/P2.2_1.png)
![P2.2_2](images/P2.2_2.png)

## P2.3 Database tier design, data, usage  
When creating our initial idea for the project in the project proposal we created a system design that we followed the entire way thru the process.
This model was based on a four table scheme featuring our users, posts, comments, and likes where each of these tables had references to the user and/or post ID's.
As stated above we thought that the XAMPP MySQL server running through the PHPmyAdmin online console would be the most straight forward and useful system to host our database.
MySQL features many useful features that came in very handy when using it for our getting and setting of data within the application.
Overall, we are very pleased with the outcome and performace of this relational database and our system tier design.

![P2.3](images/P2.3.png)

## P2.4 New features and tools  
Compared to our project proposal, most of our new features we hadn't mentioned are UI based.

We included small animations for lots of different elements that are interactive for users. Such as a small increase in scale when hovering over images or 
a fade in from the top animation for the login and signup panels. An extra tool we used was Bootstrap to make a simple but effective navbar at the top of our website.
Editing and updating a user's profile was a new feature we added last minute. 

![P2.4](images/P2.4.png)

## P2.5 Problem solving algorithms
Our project's main problems revolved around being able to efficiently upload images to a database and to be able to quickly retrieve those images.
This was the critical idea that we had to maintain user retention on Img Social. We effectively met this criteria by using simple input file types
with a well organized database to maintain quick queries and optimization.

Some of the problems we had predicted in our proposal did appear during development and implementation. We found a way to upload images to the database
in a LONGBLOB format that also involved lossless compression. To do this, we used base64_encode and decode functions to read and store user uploaded
images. Using atomic operations within our database to synchronize likes and comments was made simple by using XHTTP calls to an asynchronous PHP function.
We had also planned to need an eye-catching and minimalistic design and by using our planned inspiration, we created something soothing to the eyes with
limited colors and objects. 

We did not however, find a way to host our database and instead used local copies as we found that easier to manage.

![P2.5](images/P2.5.png)

## P2.6 Efficiency and robustness 
With our system design, we have made a simple 3-Tiered web application. For efficiency this works wonderfully, pages build and react quickly.
The animations of all the polaroids are done smoothly and so are the interactive elements such as buttons or additional options. Our database
design is the primary reason for how efficient our website loads and runs.

The robustness of our website is well done too. Uploading images without descriptions or image files is not possible. Editing other people's
profile's isn't possible either. Any kind of form we have is well checked and validated before being submitted to our database by PHP. Updates and
Select statements in our SQL are done in atomically correct ways so that two user interactions cannot collide. Pages are built dynamically and
contain placeholders in case of slowness or other possible errors.

![P2.6](images/P2.6.png)