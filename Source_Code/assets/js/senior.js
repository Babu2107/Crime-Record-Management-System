function openModal(message) {
    // Format the message into a table
    message = message.replace(/&/g, '\n');
    var lines = message.split('\n');
    var tableHTML = '<table style="border-collapse: collapse; width: 100%;border: 3px solid black;">';
    
    lines.forEach(function(line) {
        var parts = line.split(':');
        if (parts.length === 2) {
            var attribute = parts[0].trim();
            var value = parts[1].trim();
            tableHTML += `<tr><td style="border: 1px solid #ddd; padding: 8px;">${attribute}</td><td style="border: 1px solid #ddd; padding: 8px;">${value}</td></tr>`;
        }
    });
    
    tableHTML += '</table>';

    // Display the formatted table within the modal
    var modalContainer = document.getElementById('modal-container');
    var modalMessage = document.getElementById('modal-message');
    modalMessage.innerHTML = tableHTML;
    modalContainer.style.display = 'flex';
}
function openModal1(message,cas) {
    var ids = message.split('|').filter(Boolean); // Split the message into IDs and remove empty strings

    var tableHTML = '<form method="POST"><select id="app" name="app" required>';
    ids.forEach(function(id) {
        tableHTML += `<option value="${id},${cas}">${id}</option>`;
    });
    
    tableHTML += '</select><br><button type="submit" name="submit" value="s20">APPOINT</button></form>';

    // Display the formatted table within the modal
    var modalContainer = document.getElementById('modal-container');
    var modalMessage = document.getElementById('modal-message');
    modalMessage.innerHTML = tableHTML;
    modalContainer.style.display = 'flex';
}



function closeModal() {
// Hide the modal container
var modalContainer = document.getElementById('modal-container');
modalContainer.style.display = 'none';
}


function closeModal1() {
    // Hide the modal container
    var modalContainer = document.getElementById('modal-container1');
    modalContainer.style.display = 'none';
    }