import get_cookie from './get_cookie.js';

window.onload = function get_body() {

    const form = document.getElementById('upload_image_form');

    if (!localStorage.getItem('submit')){
        console.log('sub');
        form.submit();
        localStorage.setItem('submit', 'true');
    }
}
  
window.addEventListener('scroll', function () {

    const scroll_position = window.scrollY;
    console.log(window.innerHeight);
    console.log(scroll_position)

});

var i = 0;
const posts = document.getElementById('posts');

while(i < 3){

    const post = document.createElement("div");

    const author = document.createElement('h1');
    const image = document.createElement('img');
    const br = document.createElement('br');
    const hr = document.createElement('hr');

    author.innerHTML = get_cookie(i).split('.')[0];
    image.src = '/files/' + get_cookie(i);
    
    posts.appendChild(post);

    post.appendChild(author);
    post.appendChild(image);
    post.appendChild(br);
    post.appendChild(hr);
    
    i = i + 1;

}