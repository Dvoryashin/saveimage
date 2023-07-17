import get_cookie from "./get_cookie.js";

// window.onload = function get_body() {

//     body = document.getElementsByTagName('body')[0];
// }
  

var i = 0;
var images = document.getElementById('images');

while(i < 12){

    var img = document.createElement("img");
    console.log(get_cookie(i));
    img.src = "/files/" + get_cookie(i);
    images.appendChild(img);
    i = i + 1;

}