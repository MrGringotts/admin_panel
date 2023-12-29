<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tables.css">
</head>
<body>
    <?php include 'sidebar.php'?>
    <div class="content">
    <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Date Registered</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Is Admin</th>
          <th>Profile</th>
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
</body>
</html>


<script>
    // Sample data for demonstration
    const data = [
      { id: 1, date_registered: '2022-01-06 11:17:59', firstname: 'Son', lastname: 'Goku', username: 'songoku', 
        email: 'judithcharisma1978@gmail.com', password: '827ccb0eea8a706c4c34a16891f84e7b', is_admin: '0', profile: '1647586376.png'},
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
          <td>${item.date_registered}</td>
          <td>${item.firstname}</td>
          <td>${item.lastname}</td>
          <td>${item.username}</td>
          <td>${item.email}</td>
          <td>${item.password}</td>
          <td>${item.is_admin}</td>
          <td>${item.profile}</td>
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