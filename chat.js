$(document).ready(function() {
  setInterval(getMessages, 1000);
  $('#chat-form').submit(function(e) {
    e.preventDefault();
    var message = $('#message-input').val(); 
    if (message !== '') {
      if (message.length > 90) {
        alert("90 letters maximum, message too fat");
      } else {
        $.ajax({
          url: 'send_message.php', 
          type: 'POST',
          data: { message: message },
          success: function() {
            $('#message-input').val(''); 
          }
        });
      }
    } 
  });
});

function getMessages() {
  $.ajax({
    url: 'get_messages.php', 
    type: 'GET',
    success: function(response) {
      $('#chat-messages').html(response); 
      scrollToBottom(); 
    }
  });
}

function scrollToBottom() {
  var chatMessages = document.getElementById('chat-messages');
  chatMessages.scrollTop = chatMessages.scrollHeight;
}
