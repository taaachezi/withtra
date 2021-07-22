window.addEventListener('DOMContentLoaded', ()=> {

// contentをヘッダー要素分下げる
var height = document.getElementById('header').clientHeight;
var content = document.getElementById('content');
height += 30;
content.style.paddingTop = height  + 'px';

});
