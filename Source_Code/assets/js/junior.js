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

function openModal2(message,m2,m3,m4,m5) {
    // Format the message into a table
    message = message.replace(/&/g, '\n');
    var lines = message.split('\n');
    var tableHTML = '<h3>Record Information</h3><table style="border-collapse: collapse; width: 100%;border: 3px solid black;">';
    
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
    var modalMessage = document.getElementById('Record');
    modalMessage.innerHTML = tableHTML;
    
    m2 = m2.replace(/&/g, '\n');
     lines = m2.split('\n');
     tableHTML = '<h3>Witness Information</h3><table style="border-collapse: collapse; width: 100%;border: 3px solid black;">';
    
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
     modalMessage = document.getElementById('Witness');
    modalMessage.innerHTML = tableHTML;
    
    m3 = m3.replace(/&/g, '\n');
     lines = m3.split('\n');
     tableHTML = '<h3>Victim Information</h3><table style="border-collapse: collapse; width: 100%;border: 3px solid black;">';
    
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
     modalMessage = document.getElementById('Victim');
    modalMessage.innerHTML = tableHTML;
     
    m4 = m4.replace(/&/g, '\n');
     lines = m4.split('\n');
     tableHTML = '<h3>Suspect Information</h3><table style="border-collapse: collapse; width: 100%;border: 3px solid black;">';
    
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
     modalMessage = document.getElementById('Suspect');
    modalMessage.innerHTML = tableHTML;
     
    m5 = m5.replace(/&/g, '\n');
     lines = m5.split('\n');
     tableHTML = '<h3>Evidence Information</h3><table style="border-collapse: collapse; width: 100%;border: 3px solid black;">';
    
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
     modalMessage = document.getElementById('Evidence');
    modalMessage.innerHTML = tableHTML;
    var modalContainer = document.getElementById('modal-container1');
    modalContainer.style.display = 'flex';
}


function closeModal() {
// Hide the modal container
var modalContainer = document.getElementById('modal-container');
modalContainer.style.display = 'none';
}
function openTab(tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");
}


function closeModal1() {
    // Hide the modal container
    var modalContainer = document.getElementById('modal-container1');
    modalContainer.style.display = 'none';
    }