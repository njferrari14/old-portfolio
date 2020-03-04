let root = document.documentElement;

let body = document.querySelector('body');
let about = document.querySelector('.about');
let examples = document.querySelectorAll('.example');

let bHeight = body.offsetHeight;
let aHeight = about.offsetHeight;
let eHeight = examples[0].offsetHeight;

root.style.setProperty('--height-body', bHeight + 'px');
root.style.setProperty('--height-about', aHeight + 'px');
root.style.setProperty('--height-element', eHeight + 'px');