  var likes = 0;
  var dom;

  function getElementBtnIncrement() {
    var button = document.getElementById("button1");
    button.addEventListener("click", increment, false) }

  function increment() {
    likes++;
    dom = document.getElementById("likes");
    dom.innerHTML = "Likes: " + likes; }
    
  function getElementBtnDecrement() {
    var button = document.getElementById("button2");
    button.addEventListener("click", decrement, false) }

  function decrement() {
    likes--;
    dom = document.getElementById("likes");
    dom.innerHTML = "Likes: " + likes; }
 
  window.addEventListener("load", getElementBtnIncrement, false);
  window.addEventListener("load", getElementBtnDecrement, false);