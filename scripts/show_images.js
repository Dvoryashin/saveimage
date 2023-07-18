import get_cookie from "./get_cookie.js";

window.onload = function get_body() {

    var form = document.getElementById('upload_image_form');

    if (!localStorage.getItem("submit")){
        console.log('sub');
        form.submit();
        localStorage.setItem('submit', 'true');
    }
}
  

var i = 0;
var images = document.getElementById('images');

while(i < 12){

    var img = document.createElement("img");
    img.src = "/files/" + get_cookie(i);
    images.appendChild(img);
    i = i + 1;

}