 $(document).ready(function () {   /* Validate the form fields */
    var form = $('#messageForm');
    form.submit(function (event) {
        var message_title = $('#message_title').val();
        var message_description = $('#message_description').val();
        
        if (message_title == '') { /* Check for heading*/
            alert('Var god ange rubrik');
            return false;
        }

        if (message_description == '') {  /* Check for description */
            alert('Var god ange beskrivning');
            return false;
        }
    });
});