import './bootstrap';

import * as bootstrap from 'bootstrap';

let tableRows = document.querySelectorAll('.details');
let alert = document.querySelector('#alert');

tableRows.forEach(row => {
    row.addEventListener('click', function() {
        let id = this.children[0].textContent;
        window.location.href = `/marketer/${id}`;
    });
})

setTimeout(() => {
    alert.style.display = "none";
}, 3000);