//Edit and Delete Functions
document.addEventListener("DOMContentLoaded", function () {
    let data = [
        { id: 1, date_created: '2022-02-24 15:46:57', date_expiration: '2024-02-25', date_start: '01/06/2024', created_by_id: '0', 
        game_id: '2',  name: 'Pre-Alpha Battle Series', type: 'null', entry_cost: '0', team_size: 'squad', max_teams: '16',
        prize: '100,', format: 'null', status: '0', logo: '1702820849.png'},
        // Add more rows as needed
    ];

    const tableBody = document.querySelector("#myTable tbody");

    // Populate the table with data
    function renderTable() {
        // Clear existing rows
        tableBody.innerHTML = "";

        data.forEach((row) => {
            const tr = document.createElement("tr");

            // Populate regular columns
            Object.values(row).forEach(value => {
                const td = document.createElement("td");
                td.textContent = value;
                tr.appendChild(td);
            });

            // Add Action Tab Column with buttons
            const actionTd = document.createElement("td");
            const editButton = createButton("Edit", () => handleEdit(row.id));
            const deleteButton = createButton("Delete", () => handleDelete(row.id));
            actionTd.appendChild(editButton);
            actionTd.appendChild(deleteButton);
            tr.appendChild(actionTd);

            tableBody.appendChild(tr);
        });
    }

    renderTable();

    // Function to create a button with a specified label and click handler
    function createButton(label, clickHandler) {
        const button = document.createElement("button");
        button.textContent = label;
        button.addEventListener("click", clickHandler);
        return button;
    }

    // CRUD Functions

    function handleEdit(id) {
        const index = data.findIndex(row => row.id === id);
        if (index !== -1) {
            const newName = prompt("Enter new name:");
            const newEmail = prompt("Enter new email:");

            if (newName !== null && newEmail !== null) {
                data[index].name = newName;
                data[index].email = newEmail;
                renderTable();
            }
        }
    }

    function handleDelete(id) {
        const confirmDelete = confirm("Are you sure you want to delete this record?");
        if (confirmDelete) {
            data = data.filter(row => row.id !== id);
            renderTable();
        }
    }
});


