<!DOCTYPE html>
<html>
    <head>
        <title>TestProject</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" />
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
    </head>
    <body id="listall_body">
        <div class="container_list">
            <div class="table">
                <div class="table-header">
                    <div class="header__item">Meddelandelista
                        <span class="span_link"><a href="index.php?param=add" id="anchor_link">[Lägg till]</a></span>
                    </div>
                </div>
                <div class="table-content">
                     <?php if(empty($messages)){echo 'No records found! Please add new record';}?>
                    <?php foreach ($messages as $message): ?>
                        <div class="table-row">
                            &nbsp;&nbsp;<?php print $message['message_title']; ?>
                            <br >
                            &nbsp;&nbsp;<?php print $message['message_description']; ?>

                            <span class="span_desc"><a href="index.php?param=delete&id=<?php print $message['id']; ?>" onclick="return confirm('Är du säker?')" >[Radera]</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <br /><br />
                                <a href="index.php?param=edit&id=<?php print $message['id']; ?>">[Ändra]</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </body>
</html>