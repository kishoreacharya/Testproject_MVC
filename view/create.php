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
        <div class="container" >
            <form method="POST" id="messageForm" action="#">
                <label for="message_title">Rubrik</label>
                <input type="text" name="message_title" id="message_title" value="" placeholder="Rubrik..">
                <label for="message_description">Beskrivning</label>
                <textarea name="message_description" id="message_description" placeholder="Beskrivning.."></textarea>
                <input type="submit" value="Submit" id="submit" />
            </form>
        </div>
    </body>
</html>