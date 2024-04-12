"use strict"; // Dhr. Allen Pieter - In collaboration with ChatGPT

document.addEventListener('DOMContentLoaded', function() {
    // Grab filter and table rows
    const filterDropdown = document.getElementById('filterDropdown');
    const tableRows = document.querySelectorAll('#userDataTable tbody tr');

    // Event listener for filter
    filterDropdown.addEventListener('change', function() {

        // Grab selected filter value
        const selectedValue = filterDropdown.value;

        // Iterate over each table row
        tableRows.forEach(row => {
            const userLevelCell = row.querySelector('td:nth-child(6)'); // Grab 6th column

            // Verify if the row should be visible, based on filter value
            if (selectedValue === 'all' || userLevelCell.textContent.trim() === getLevel(parseInt(selectedValue))) {
                row.style.display = ''; // Show it
            } else {
                row.style.display = 'none'; // Hide it
            }
        });

        // Debugging: Log the selected value and number of visible rows after filtering
        //console.log('Selected Value:', selectedValue);
        //const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none');
        //console.log('Visible Rows:', visibleRows.length);
    });
});

// Translate values to readable words
function getLevel(level) {
    switch (level) {
        case 1:
            return "Guest";
        case 2:
            return "Member";
        case 3:
            return "Council";
        case 4:
            return "Admin";
        default:
            return "Unknown";
    }
}