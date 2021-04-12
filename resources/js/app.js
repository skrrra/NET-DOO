require('./bootstrap');

require('alpinejs');

let moonOne = document.getElementById('moonOne');
let moonTwo = document.getElementById('moonTwo');

moonOne.addEventListener('click', toggleDarkMode)
moonTwo.addEventListener('click', toggleDarkMode)

function toggleDarkMode()
{
    console.log('clicked');
    if(document.body.classList.value != "dark")
    {
        document.body.classList.value = "dark"
        axios.post('http://localhost:3000/admin-panel/theme');
    }else{
        document.body.classList.value = ""
        axios.post('http://localhost:3000/admin-panel/theme');
    }
}