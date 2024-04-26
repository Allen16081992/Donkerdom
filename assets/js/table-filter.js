"use strict";

document.addEventListener('DOMContentLoaded', function() {
    // Grab filter and table rows
    const filterDropdown = document.getElementById('filterDropdown');
    const tableRows = document.querySelectorAll('#userDataTable tbody tr');

    // Event listener for filter
    filterDropdown.addEventListener('change', function() {
        // Grab selected filter value
        const selectedValue = filterDropdown.value;

        // If the selected value is 'all', reset pagination to page 1 and return
        if (selectedValue === 'all') {
            showPage(1);
            return;
        }

        // Iterate over each table row
        tableRows.forEach(row => {
            const userLevelCell = row.querySelector('td:nth-child(6)'); // Grab 6th column

            // Verify if the row should be visible, based on filter value
            if (userLevelCell.textContent.trim() === getLevel(parseInt(selectedValue))) {
                row.style.display = ''; // Show it
            } else {
                row.style.display = 'none'; // Hide it
            }
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

    // Assuming you have fetched data from PHP and stored it in a variable named 'acData'
    const recordsPerPage = 10;
    let currentPage = 1;

    // Calculate total number of pages
    const totalPages = Math.ceil(tableRows.length / recordsPerPage);

    // Generate pagination links
    generatePaginationLinks(totalPages);

    // Show the initial page (page 1) after generating pagination links
    showPage(1);

    function generatePaginationLinks(totalPages) {
        const paginationContainer = document.querySelector('.pagination');
        paginationContainer.innerHTML = ''; // Clear existing links
    
        // Previous link
        const prevLink = document.createElement('a');
        prevLink.href = '#';
        prevLink.innerHTML = '&laquo;';
        paginationContainer.appendChild(prevLink);
    
        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.textContent = i;
            paginationContainer.appendChild(pageLink);
    
            // Add active class to the current page link
            if (i === currentPage) {
                pageLink.classList.add('active');
            }
        }
    
        // Next link
        const nextLink = document.createElement('a');
        nextLink.href = '#';
        nextLink.innerHTML = '&raquo;';
        paginationContainer.appendChild(nextLink);
    
        // Add event listeners to pagination links
        paginationContainer.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (link.textContent === '«') {
                    // Previous page
                    currentPage = Math.max(1, currentPage - 1);
                } else if (link.textContent === '»') {
                    // Next page
                    currentPage = Math.min(totalPages, currentPage + 1);
                } else {
                    // Page number clicked
                    currentPage = parseInt(link.textContent);
                }

                // Update the displayed page
                showPage(currentPage);

                // Update the active pagination link
                updateActiveLink(currentPage);
            });
        });
    }       

    function showPage(page) {
        // Calculate the range of rows to display
        const start = (page - 1) * recordsPerPage;
        const end = start + recordsPerPage;
    
        // Hide all rows
        tableRows.forEach(row => {
            row.style.display = 'none';
        });
    
        // Show the rows for the current page
        for (let i = start; i < Math.min(end, tableRows.length); i++) {
            tableRows[i].style.display = '';
        }
    }

    function updateActiveLink(currentPage) {
        const paginationContainer = document.querySelector('.pagination');
        paginationContainer.querySelectorAll('a').forEach(link => {
            if (link.textContent === currentPage.toString()) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }
});