<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Visheshagya - APPOINTMENT BOOKING CONFIRMATION !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Muli|Roboto" rel="stylesheet">
    </head>
    <body>
        <main>
            <div style="display:block;margin:0 auto;width:600px;text-align: center; border:1px solid #ccc;padding: 20px;box-shadow: 0px 3px 5px 1px #B3B3B3;-webkit-box-shadow: 0px 3px 5px 1px #B3B3B3;-moz-box-shadow: 0px 3px 5px 1px #B3B3B3;-o-box-shadow: 0px 3px 5px 1px #B3B3B3;" id="emb-email-header">
                <div>
                    <img src="http://visheshagya.in/assets/images/logo.png" style="width:60px;height: auto;">
                    <h3 style="font-family: 'muli', sans-serif;font-weight: 600;font-size:28px;margin: 0;color:#000;">APPOINTMENT BOOKING CONFIRMATION!</h3>
                    <p style="color:#db5353;font-weight: bold;font-size:24px;font-family: 'Roboto', sans-serif;margin:10px;">CONGRATULATIONS..!! </p>
                    <p style="color:#777777;font-size:18px;font-family: 'Roboto', sans-serif;margin:10px;font-weight: 200;"> Your Appointment has been booked successfully.</p>
                    <table style="text-align: left;border:1px solid #ccc;width: 100%;border-collapse: collapse;margin: 20px 0;">
                        <tbody>
                            <tr style="border:1px solid #ccc;">
                                <th style="color:#5f9ea0;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;font-weight: 200;">Appointment ID</th>
                                <td style="color:#3d3d3d;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;"><?php echo $appointmentId; ?></td>
                            </tr>
                            <tr style="border:1px solid #ccc;">
                                <th  style="color:#5f9ea0;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;font-weight: 200;">Consulting Client</th>
                                <td style="color:#3d3d3d;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;"><?php echo $consultingExpert; ?></td>
                            </tr>
                            <tr style="border:1px solid #ccc;">
                                <th  style="color:#5f9ea0;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;font-weight: 200;">Booking Date</th>
                                <td style="color:#3d3d3d;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;"><?php echo date("d-m-Y", strtotime($appointmentBookingDate)); ?></td>
                            </tr>
                            <tr style="border:1px solid #ccc;">
                                <th  style="color:#5f9ea0;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;font-weight: 200;">Appointment Date</th>
                                <td style="color:#3d3d3d;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;"><?php echo date("d-m-Y", strtotime($appointmentDate)); ?></td>
                            </tr>
                            <tr style="border:1px solid #ccc;">
                                <th  style="color:#5f9ea0;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;font-weight: 200;">Consultation Time</th>
                                <td style="color:#3d3d3d;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;"><?php echo $appointmentTime; ?></td>
                            </tr>
                            <tr style="border:1px solid #ccc;">
                                <th  style="color:#5f9ea0;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;font-weight: 200;">Consultation Type</th>
                                <td style="color:#3d3d3d;font-size:18px;font-family: 'Roboto', sans-serif;padding: 5px 20px;border-right: 1px solid #ccc;width:50%;"><?php echo $consultationType; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: left; font-size: 14px;color: #000;font-family: 'muli', sans-serif;">
                        <p> A confirmation email with instructions to start the appointment has been sent to your registered email Id.</p>
                        <p> Please ensure the following at the time of appointment:</p>
                        <p> 1. Your device has an active Internet connection.</p>
                        <p> 2. Your web-cam is working(In case of Video consultation).</p>
                        <p> 3. You should have headphone-mic to do a Video call.</p>
                    </div>
                </div>
            </main>
    </body>
</html>