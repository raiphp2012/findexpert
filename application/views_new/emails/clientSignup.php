<?php
/*
 * @author Avinash Raj
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Visheshagya - Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body style="background:lightgray">
        <div align = "left">
            <img src="http://visheshagya.in/images/logo.png" style="width:15%">
            <p>Hello <?php echo $clientName . "<br/>"; ?></p>
           <p>Congratulations on being part of Visheshagya family</p>
                <p>Your account has been created successfully.</p>
                <p>
                    Your login Details are mentioned below.
                </p>
                <p>
                    URL : <?php echo $url."<br/>";?>
                </p>
                <p>
                    Email : <?php echo $clientEmail."<br/>";?>
                </p>
                <p>
                    Password : <?php echo $clientPassword."<br/>"; ?>
                </p>
        </div>
    </body>
</html>

