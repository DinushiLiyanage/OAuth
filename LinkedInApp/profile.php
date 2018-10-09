<!-- IT15018960 - D.U. Liyanage -->
<!-- SSD Assignment 2 - OAuth -->

<!-- profile page -->
<?php
    require "init.php";
    //if user is not logged in redirect to index page
    if (!isset($_SESSION['user'])) {
        header("location: index.php");
    }

    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">      
    <link rel="icon" type="image/png" href="img/icon.png" sizes="16x16">
    <title>LinkedIn Profile Details</title>
</head>
    <body style="background: #F2F6F9; color: black; font-family: Helvetica;">
        <br>
        <!-- profile details -->
        <div class="modal-content">
            <div class="container">
                <div class="imgcontainer">      
                    <img  src="img/logo.png" style="height:30px; width: 100px; margin-bottom: 10px;">  
                    <br>                  
                    <img  src="<?php echo $user->pictureUrl ?>" style="height:100px; width: 100px; margin-bottom: 5px; border-radius: 5px; border-style:solid; border-width: thin;border-color: #0077B5;">
                </div>
                <div style="text-align:left; padding-left: 25px;">
                    <table>                      
                      <tr>
                        <td style="font-weight: 600">First Name:</td>
                        <td><?php echo $user->firstName ?></td>
                      </tr>
                      <tr>
                        <td style="font-weight: 600">Last Name:</td>
                        <td><?php echo $user->lastName ?></td>
                      </tr>
                      <tr>
                        <td style="font-weight: 600">Email Address:</td>
                        <td><?php echo $user->emailAddress ?></td>
                      </tr>
                      <tr>
                        <td style="font-weight: 600">Headline:</td>
                        <td><?php echo $user->headline ?></td>
                      </tr>
                      <tr>
                        <td style="font-weight: 600">Industry:</td>
                        <td><?php echo $user->industry ?></td>
                      </tr>                                   
                    </table>                    
                </div>
                <div style="text-align:center;">    
                    <button style=" background-color: #0077B5; padding: 10px 10px; margin: 15px 0; border: none; cursor: pointer; border-radius: 3px;"><a style="text-decoration:none; color: white;" href="logout.php">Logout</a></button>
                </div>                 
            </div>
        </div>

    </body>
</html>