var conn = new WebSocket('ws://localhost:8080'),
  btn = $('#send'),
  input = $('#message'),
  chat = $('#chat');

conn.onopen = function(e) {
  console.log("Connection established!");
};

conn.onmessage = function(e) {
  chat.val(chat.val() + '\n' + e.data);
};

btn.on('click', function () {
  conn.send(input.val());
});
