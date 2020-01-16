<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Visheshagya - Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Muli|Roboto" rel="stylesheet">
    </head>
    <body>
        <div style="width: 500px;display: block;margin: 0 auto;padding: 20px;border: 1px solid #ccc;">
            <img src="http://visheshagya.in/assets/images/logo.png" style="width:60px;height: auto;display: block;margin: 0 auto;">
            <p style="font-family: 'muli', sans-serif;font-weight: 600;font-size:20px;margin: 0;">Hi! User</p>
           
                <p style="font-family: 'Roboto', sans-serif;font-size:16px;margin: 10px 0;">Your password has been reset successfully.</p>
                <p style="font-family: 'Roboto', sans-serif;font-size:16px;margin: 0 0 10px;color:#909bcb;">Your login Details are mentioned below.</p>
                <p style="font-family: 'Roboto', sans-serif;font-size:16px;margin: 10px 0;"><em style="color:#909bcb;font-style: inherit;">URL </em>: <?php echo $url;?></p>
                <p style="font-family: 'Roboto', sans-serif;font-size:16px;margin: 10px 0;"><em style="color:#909bcb;font-style: inherit;">Email </em>: <?php echo $clientEmail;?></p>
                <p style="font-family: 'Roboto', sans-serif;font-size:16px;margin: 10px 0;"><em style="color:#909bcb;font-style: inherit;">New Password </em>: <?php echo $clientPassword; ?></p>
        </div>
    </body>
</html>