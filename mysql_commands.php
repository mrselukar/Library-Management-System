//Inorder to create a table
create table registration_info{
  eid int(15) not null PRIMARY KEY,
  first varchar(100) not null,
  last varchar(100) not null,
  email varchar(100) not null,
  pwd varchar(1000) not null,
  cell int(15) not null
};

CREATE TABLE `login_db`.`books`
(
    `id` INT(16) NULL AUTO_INCREMENT , `subject` VARCHAR(100) NULL ,
     `name` VARCHAR(100) NULL , `auth` VARCHAR(100) NOT NULL , `copies` INT(8) NOT NULL
     , PRIMARY KEY (`id`)
)
 ENGINE = InnoDB;

//Inorder to insert into table
// 1st connect oto the database
INSERT INTO books(subject,name,auth,copies)
VALUES('Maths','Advanced Engineering Mathematics','Jain and Iyengar',32);

//SELECT FROM DATABASE
// 1st connect oto the database
SELECT name FROM books       // select all names from books table
SELECT * FROM books       // select everything from books table
SELECT * FROM books WHERE subject='Maths' ;      // select all date of columns with subject as maths in books table
SELECT * FROM books WHERE subject='Maths'AND name = 'Jain And Iyeanger' ;      // select all date of columns with subject as maths in books table



//Update stuff in database
UPDATE books
SET subject='Engineering' // this will change all rows subject to Engineering
UPDATE books
SET subject='Engineering' // this will change all rows subject to Engineering where id = 123
WHERE id ='123';


//DELETE STUFF
DELETE FROM books
WHERE subject = 'Maths'  // DELETE ALL MATHS ENTRIES

// TO sort data
SELECT * FROM books ORDER BY subject ASC




// To connect to a database
$coll = mysqli_connect('localhost','root','','books');        // server name username password database name
if(!$conn)
{
  die("Connection Failed:".mysqli_connect_error());     //remove mysql methord to prevent hacking
}


// to get data from database
// connect to database 1st
<?php
    $sql = "SELECT * FROM books WHERE subject='Maths' ";
    $result = mysqli_query($conn,$sql);
    //!$row = musqli_fetch_assoc($result); //returns data as an array;
    while($row = $results->fetch_assoc())
    {
        echo $row['subject'];
    }


    $sql = "SELECT * FROM books WHERE id='1'" ;
    $result = mysqli_query($conn,$sql);
    !$row = musqli_fetch_assoc($result); //returns data as an array;
    echo $row['subject'];

?>
    // To insert data in database
    // connect to data base 1st

    $sql = "INSERT INTO books(subject,name,auth,copiess)
    VALUES ('$subject','$name','$auth','$copies');
    $result = mysqli_query($conn,$sql); // this statement runs the sql query

    header('LOCATION: index.php')
?>
