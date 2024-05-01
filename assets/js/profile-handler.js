"use strict";
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myDetails');
    const editButton = document.getElementById('editButton');

    editButton.addEventListener('click', function(event) {
        if (editButton.name === 'edit') {
            event.preventDefault();

            const inputs = form.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.disabled = false;
            });
            editButton.innerText = 'Opslaan';
            editButton.name = 'save';
            
            const cancelButton = document.createElement('button');
            cancelButton.name = 'cancel';
            cancelButton.innerText = 'X';
            cancelButton.style.background = 'grey';

            form.appendChild(cancelButton);
            cancelButton.addEventListener('click', function(event) {
                event.preventDefault();
                inputs.forEach(function(input) {
                    input.disabled = true;
                });
                form.removeChild(cancelButton);
                editButton.innerText = 'Wijzigen';
                editButton.name = 'edit';
            });
        }
    });
});