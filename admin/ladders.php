<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ladders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tables.css">
</head>
<body>
    <?php include 'sidebar.php'?>
    <div class="content">
    <div class="table-container">

      <button class="create-button" onclick="openModal()">Create</button>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Date Created</th>
          <th>Date Expiration</th>
          <th>Date Start</th>
          <th>Created By (ID)</th>
          <th>Game ID</th>
          <th>Name</th>
          <th>Type</th>
          <th>Entry Cost</th>
          <th>Team Size</th>
          <th>Max Teams</th>
          <th>Prize</th>
          <th>Format</th>
          <th>Status</th>
          <th>Logo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Table rows will go here -->
      </tbody>
    </table>


  </div>

    <div class="pagination">
      <!-- Pagination links will go here -->
    </div>
    
    </div>



<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Create New Ladder</h2>
        <label for="id">ID:</label>
        <input type="text" id="id">
        <label for="date_created">Date Created:</label>
        <input type="text" id="date_created">
        <label for="date_expiration">Date Expiration:</label>
        <input type="text" id="date_expiration">
        <label for="date_start">Date Start:</label>
        <input type="text" id="date_start">
        <label for="created_by_id">Created By (ID):</label>
        <input type="text" id="created_by_id">
        <label for="game_id">Game ID:</label>
        <input type="text" id="game_id">
        <label for="name">Name:</label>
        <input type="text" id="name">
        <label for="type">Type:</label>
        <input type="text" id="type">
        <label for="entry_cost">Entry Cost:</label>
        <input type="text" id="entry_cost">
        <label for="team_size">Team Size:</label>
        <input type="text" id="team_size">
        <label for="max_teams">Max Teams:</label>
        <input type="text" id="max_teams">
        <label for="prize">Prize:</label>
        <input type="text" id="prize">
        <label for="format">Format:</label>
        <input type="text" id="format">
        <label for="status">Status:</label>
        <input type="text" id="status">
        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo">
        <button onclick="createItem()">Create</button>
    </div>
</div>
</body>
</html>


<script>
    // Sample data for demonstration
    const data = [
      { id: 1, date_created: '2022-02-24 15:46:57', date_expiration: '2024-02-25', date_start: '01/06/2024', created_by_id: '0', 
        game_id: '2',  name: 'Pre-Alpha Battle Series', type: 'null', entry_cost: '0', team_size: 'squad', max_teams: '16',
        prize: '100,', format: 'null', status: '0', logo: '1702820849.png'},
      // Add more data as needed
    ];

    // Function to display table rows and pagination
    function displayData(pageNumber = 1, itemsPerPage = 10) {
      const tableBody = document.querySelector('tbody');
      const paginationContainer = document.querySelector('.pagination');
      
      // Calculate start and end index for the current page
      const startIndex = (pageNumber - 1) * itemsPerPage;
      const endIndex = startIndex + itemsPerPage;
      
      // Display table rows
      const tableRows = data.slice(startIndex, endIndex).map(item => `
        <tr>
          <td>${item.id}</td>
          <td>${item.date_created}</td>
          <td>${item.date_expiration}</td>
          <td>${item.date_start}</td>
          <td>${item.created_by_id}</td>
          <td>${item.game_id}</td>
          <td>${item.name}</td>
          <td>${item.type}</td>
          <td>${item.entry_cost}</td>
          <td>${item.team_size}</td>
          <td>${item.max_teams}</td>
          <td>${item.prize}</td>
          <td>${item.format}</td>
          <td>${item.status}</td>
          <td>${item.logo}</td>
          <td class="action-buttons">
                <button class="edit-button" id="edit">E</button>
                <button class="delete-button" id="delete">D</button>
          </td>
        </tr>
      `).join('');
      tableBody.innerHTML = tableRows;
      
      // Display pagination links
      const pageCount = Math.ceil(data.length / itemsPerPage);
      const paginationLinks = Array.from({ length: pageCount }, (_, index) => index + 1).map(page => `
        <a href="#" class="page-link ${page === pageNumber ? 'active' : ''}" onclick="displayData(${page})">${page}</a>
      `).join('');
      paginationContainer.innerHTML = paginationLinks;
    }

    // Initial display
    displayData();
  </script>


<script>
    function openModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }

    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none';
    }

    function createItem() {
        const itemName = document.getElementById('itemName').value;
        const itemDescription = document.getElementById('itemDescription').value;

        if (itemName && itemDescription) {
            // Here, you can perform actions to save the item or handle the data as needed, change to php/sql.
            alert(`Item Created!\nName: ${itemName}\nDescription: ${itemDescription}`);
            closeModal();
        } else {
            alert('Please fill in both fields.');
        }
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function (event) {
        const modal = document.getElementById('myModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
</script>


