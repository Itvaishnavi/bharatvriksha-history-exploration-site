<?php
            include("connection1.php");

        if(isset($_POST["submit"]))
        {
            $name=$_POST["name"];
            
            $email=$_POST["email"];
            $mobileno=$_POST["mobileno"];
            $person=$_POST["person"];
            $date=$_POST["date"];
            $file=$_FILES["identity"]["name"];
            $dir="uploads/";
            $targetdir=$dir.basename($file); 
            if(move_uploaded_file($_FILES["identity"]["tmp_name"],$targetdir))
            {
                echo"Updated successfully";

            }else{
                echo"not connected";
            }
         $query1="insert into roombooking (name,email,mobileno,person,date,identity) values ('".$name."','".$email."','".$mobileno."','".$person."','".$date."','".$targetdir."')";
         $result1=mysqli_query($conn,$query1);
        
         
           if($result1)
           {
            echo '<script>
            if("'. $result1. '") {
                alert("Room Booked for '. $person. '. Thank You...");
            }
        </script>';
           }
           else{
            echo '<script> alert("Booking Not Successful!"); </script>';
           }
        }
        ?>
<html>
    <head>
    <link rel="stylesheet"href="web.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            function validateForm() {
                if (document.getElementById("name").value == "") {
                    alert("Please enter name");
                    return false;
                }
                if (document.getElementById("email").value == "") {
                    alert("Please enter email");
                    return false;
                }
                if (document.getElementById("mobileno").value == "") {
                    alert("Please enter mobile number");
                    return false;
                }
                if (document.getElementById("person").value == "") {
                    alert("Please enter number of persons");
                    return false;
                }
                if (document.getElementById("date").value == "") {
                    alert("Please enter date");
                    return false;
                }
                if (document.getElementById("identity").value == "") {
                    alert("Please upload identity proof");
                    return false;
                }
                if (isNaN(document.getElementById("mobileno").value) || document.getElementById("mobileno").value.length != 10) {
                    alert("Please enter a valid 10-digit mobile number");
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body id="b1">
        <div class="container">
    <form action="roomt.php" id="loginForm" method="post" enctype="multipart/form-data"onsubmit="return validateForm()">
        <h1>Room Booking Info</h1><br>
        <label >Name:</label><br>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter name:"value="" ><br>
        
        <label >Email:</label><br>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter mail:"value=""><br>
              
        <label >mobileno:</label><br>
        <input type="text" id="mobileno" name="mobileno" class="form-control" placeholder="Enter mobile no:"value="" maxlength="10"><br>
         
        <label >Persons:</label><br>
        <input type="text" id="person" name="person" class="form-control" placeholder="Enter no of persons:"value="" ><br>
         
        <label >Date:</label><br>
        <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date:"value="" ><br>

        <label >Upload Identy Proof:</label><br>
        <input type="file" id="identity" name="identity" class="form-control" value="" ><br>
        <input type="submit" value="submit"id="submit"name="submit" >
         
        <label><a href="home.php"><h1>Go Back</h1></a></label>
        </form></div>
    </body>
</html>