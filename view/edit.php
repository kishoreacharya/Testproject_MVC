<!DOCTYPE html>
<html>
    <head>
        <title>TestProject</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/formValidation.js"></script>
    </head>
    <body id="form_body">
        <h3>Meddelande</h3>
        <div class="container">
            <form method="POST" id="messageForm" action="#">
                <label for="message_title">Rubrik:</label><br/>
                <input type="text" name="message_title" id="message_title" value="<?php print $messages['0']['message_title'] ?>"/>
                <br/>

                <label for="message_description">Beskrivning:</label><br/>
                <textarea name="message_description" id="message_description"><?php print $messages['0']['message_description'] ?></textarea>
                <br/>

                <input type="submit" id="submit" value="Submit" />
            </form>
        </div>
    </body>
</html>