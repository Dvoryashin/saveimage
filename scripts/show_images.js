import get_cookie from './get_cookie.js';

window.onload = function get_body() {

    var form = document.getElementById('upload_image_form');

    if (!localStorage.getItem('submit')){
        console.log('sub');
        form.submit();
        localStorage.setItem('submit', 'true');
    }
}
  

var i = 0;
var posts = document.getElementById('posts');

while(i < 12){

    var post = document.createElement("div");

    var author = document.createElement('h1');
    var image = document.createElement('img');
    var br = document.createElement('br');
    var hr = document.createElement('hr');

    author.innerHTML = get_cookie(i).split('.')[0];
    image.src = '/files/' + get_cookie(i);
    
    posts.appendChild(post);

    post.appendChild(author);
    post.appendChild(image);
    post.appendChild(br);
    post.appendChild(hr);
    
    i = i + 1;

}