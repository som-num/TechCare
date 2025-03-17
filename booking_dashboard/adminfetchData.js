document.addEventListener('DOMContentLoaded', function () {
    // Fetch the event status counts from the server
    fetch('adminData.php') // Make sure the PHP file is named correctly
        .then(response => response.json())
        .then(data => {
            // Update the card contents with the fetched counts
            document.getElementById('pending').querySelector('p').textContent = `${data.pending}`;
            document.getElementById('accepted').querySelector('p').textContent = `${data.accepted}`;
            document.getElementById('denied').querySelector('p').textContent = `${data.denied}`;
            document.getElementById('completed').querySelector('p').textContent = `${data.completed}`;
        })
        .catch(error => {
            console.error('Error fetching status counts:', error);
        });
});



