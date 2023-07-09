
export default function get_cookie(cname) {
    let name = cname + "=";
    //function decodeURIComponent decodes a URI component
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        //charAt returns a symbol by index in string
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        //indexOf returns an index by symbol in string
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

