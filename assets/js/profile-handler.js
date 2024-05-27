"use strict";
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myDetails');
    const editProfile = document.getElementById('editProfile');

    editProfile.addEventListener('click', function(event) {
        if (editProfile.name === 'edit') {
            event.preventDefault();

            const inputs = form.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.disabled = false;
            });
            editProfile.innerText = 'Opslaan';
            editProfile.name = 'editMyself';
            
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
                editProfile.innerText = 'Wijzigen';
                editProfile.name = 'edit';
            });
        }
    });
});