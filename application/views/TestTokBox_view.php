<?php
/*
 * @author Avinash Raj
 */
?>
<html> 
    <head></head> 
    <body> 
        <script src='//static.opentok.com/v2/js/opentok.min.js'></script>
        <form action="<?php echo base_url() . 'TestTokBox/testAudioCall' ?>" method="POST">
            <input type="number" name="expertNumber">
            <input type="number" name="clientNumber">
            <input type="submit" value="Call">
        </form>
    </body> 
</html>
