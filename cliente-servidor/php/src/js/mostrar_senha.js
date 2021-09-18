var input = document.querySelector('#input1 input');
var button = document.querySelector('#input1 button');
button.addEventListener('click', function () {
  input.type = input.type == 'text' ? 'password' : 'text';
});

var input2 = document.querySelector('#input2 input');
var button2 = document.querySelector('#input2 button');
button2.addEventListener('click', function () {
  input2.type = input2.type == 'text' ? 'password' : 'text';
});


