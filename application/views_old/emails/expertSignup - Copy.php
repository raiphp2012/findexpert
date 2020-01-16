<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Visheshagya - Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <div>
            <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif;text-align: center" align="center" id="emb-email-header">
                <!--<img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 152px" src="http://www.anil2u.info/wp-content/uploads/2013/09/anil-kumar-panigrahi-blog.png" alt="" width="152" height="108">-->
                Hello <?php echo $expertName."<br/>"; ?>
                <p>Congratulations on being part of Visheshagya family</p>
                <p>Your account has been created successfully, and will be made active on successful verification</p>
                <p>
                    Your login Details are mentioned below.
                </p>
                <p>
                    URL : <?php echo $url."<br/>";?>
                </p>
                <p>
                    Email : <?php echo $expertEmail."<br/>";?>
                </p>
                <p>
                    Password : <?php echo $expertPassword."<br/>"; ?>
                </p>
                
            </div>
            <!--<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">-->
                <!--Hey <?php // echo $userName; ?>,-->
            <!--</p>--> 
            <!--<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">-->
                
            <!--</p>-->
        </div>
    </body>
</html>

