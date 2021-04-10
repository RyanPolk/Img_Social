# CP476 Project Report: Img Social  
### Ryan Polkiewicz, Chloe (Aaron) Szucs  
### 2021-04-10  

# How to compile, deploy and run Img Social
Img Social is ran using the XAMPP Control Panel that was provided through the class.

# Steps:

## 1.You first must create a directory and alias to access the project within the file C:/xampp/apache/conf/httpd.conf 

![Step 1](images/Step_1.png)

## 2.The next major change is you must change the max_allowed_packet size to 17M in file: C:/xampp/mysql/bin/my.ini  

![Step 2](images/Step_2.png)

## 3.Now you will want to start Apache and MySQL from the XAMPP Control Panel.  

![Step 3](images/Step_3.png)

## 4.Navigate to http://localhost/phpmyadmin/index.php and then import the SQL database file: C:/Img_Social/Backend/img_social.sql  

![Step 4](images/Step_4.png)

## 5.Navigate to your alias for Img_Social and the application should be ready to use! Enjoy!  

![Step 5](images/Step_5.png)