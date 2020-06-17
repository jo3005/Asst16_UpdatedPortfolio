$( document ).ready(function() {
    $('#contact_form').on('submit', function (e) { 
       $.ajax({
           type: "POST",
           url: "mail.php",
           data: $(this).serialize(),
           success: function (response) {				
               var message_type = 'alert-' + response.type;
               var message_text = response.message;
               var message = '<div class="alert ' + message_type + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + message_text + '</div>';
               if (message_type && message_text) {
                   $('#contact_form').find('.messages').html(message);
                   $('#contact_form')[0].reset();
                   grecaptcha.reset();
               }
           }
       });
       return false;       
   })
});