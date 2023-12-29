<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches</title>
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
          <th>Name</th>
          <th>Description</th>
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
        <h2>Create New Match</h2>
        <label for="id">ID:</label>
        <input type="text" id="id">
        <label for="name">Name:</label>
        <input type="text" id="name">
        <label for="description">Description:</label>
        <input type="text" id="description">
        <button onclick="createItem()">Create</button>
    </div>
</div>
</body>
</html>


<script>
    // Sample data for demonstration
    const data = [
      { id: 1, name: 'Best of Three', description: 'The winner is decided by the best of three games.' },

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
          <td>${item.name}</td>
          <td>${item.description}</td>
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