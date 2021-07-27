window.addEventListener('DOMContentLoaded', ()=> {
// function dateFormat(date, format){
//     format = format.replace("YYYY", date.getFullYear());
//     format = format.replace("MM", ("0"+(date.getMonth() + 1)).slice(-2));
//     format = format.replace("DD", ("0"+ date.getDate()).slice(-2));
//     return format;
// }
// // フォーマット揃える必要がある
// const today = dateFormat(new Date(),'YYYY-MM-DD');
// const date = document.getElementById('today');
// date.value = today;
// date.setAttribute("min", today);

const element = document.getElementById('today');
const date = new Date();
console.log(date.setMinutes(date.getMinutes() - date.getTimezoneOffset()));
element.value = element.min = date.toJSON().match(/\d+-\d+-\d+/);
});
