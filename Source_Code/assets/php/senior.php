
<?php
    session_start();
    include 'connec.php';
    $s='select * from officer where officer_id="'.$_SESSION['ofs1'].'"';
    $res=$conn->query($s);
    $row=$res->fetch_assoc();
    $name = $row['officer_name'];
    $officerId = $row['officer_id'];
    $batchNumber = $row['officer_batch_no'];
    $casesHandled = $row['officer_case_handled'];
    $postingArea = $row['officer_posting_area'];
    $rank = $row['officer_rank'];
    $phoneNumber = $row['officer_phone_no'];
    $address = $row['officer_address'];
    $email = $row['officer_mail'];
?>
<?php
    if(isset($_POST['submit']))
    {
        if($_POST['submit']=='j3')
        {
            $k='update officer set officer_rank="Captain" where officer_id='.$_POST['j3'];
            $conn->query($k);
            echo '<script>alert("PROMOTED")</script>';
        }
    }
?>
<?php
    if(isset($_POST['submit']))
    {
        if($_POST['submit']=='s1')
        {
            $s='SELECT MAX(officer_id) AS max_officer_id FROM officer;';
            $k=$conn->query($s);
            $row=$k->fetch_assoc();
            $oid=$row['max_officer_id']+1;

            $sql = "INSERT INTO officer (officer_id, officer_name, officer_batch_no, officer_case_handled, officer_posting_area, officer_rank, officer_phone_no, officer_address, officer_mail)
        VALUES ('" . $oid . "', '" . $_POST['officer_name'] . "', '" . $_POST['officer_batch_no'] . "', '" . $_POST['officer_case_handled'] . "', '" . $_POST['officer_posting_area'] . "', '" . $_POST['officer_rank'] . "', '" . $_POST['officer_phone_no'] . "', '" . $_POST['officer_address'] . "', '" . $_POST['officer_mail'] . "')";

        // Execute query (assuming $conn is your database connection)
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Appointed successfully')";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        }
        else
        if($_POST['submit']=='s20')
        {
            $sv = explode(",", $_POST['app']);
            $s='update record set officer_incharge_id='.$sv[0].' where rec_id='.$sv[1];
            $conn->query($s);

            echo '<script>confirm("Appointed")</script>';
            
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crime Record Management System</title>
    <link rel="icon" type="image/png" href="../Images/icon/logo.jpg">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/senior.css">
    <script src="../js/main.js"></script>
    
    <script src="../js/senior.js"></script>
    <script>
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

    </script>
    <style>
        /* Basic CSS for navigation tabs */
        body {
    margin: 0;
    padding: 0;
    background-image: url('../Images/bg2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Set the height to full viewport height */
}
* {
    color: white;
}
.profile-card {
  background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (last parameter) to control transparency */
  /* Other styles for the profile card */
  padding: 20px;
  border-radius: 10px;
  /* Add more styles as needed */
}
        ul.nav-tabs {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f1f1f1;
        }

        ul.nav-tabs li {
            float: left;
        }

        ul.nav-tabs li a {
            display: block;
            color: #000;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.nav-tabs li a:hover {
            background-color: #ddd;
        }

        /* Styling for active tab */
        ul.nav-tabs li.active a {
            background-color: #ccc;
        }

        /* Hide all tab content by default */
        .tab-content {
            display: none;
        }

        /* Show active tab content */
        .active-content {
            display: block;
        }
        /* Styling for the form container */
.form-container {
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Adding a subtle shadow effect */
}

/* Styling for form elements */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #fff; /* Text color for labels */
}

input[type="text"],
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #fff; /* White border for input fields */
    border-radius: 5px;
    background-color: transparent; /* Transparent background for input fields */
    color: #fff; /* Text color for input fields */
    box-sizing: border-box;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #fff; /* White background for the button */
    color: #000; /* Text color for the button */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition on hover */
}

button[type="submit"]:hover {
    background-color: #ddd; /* Lighter shade on hover */
}

    </style>
</head>
<body>

<ul class="nav-tabs">
    <li><a href="#profile" class="tab-link">Profile</a></li>
    <li><a href="#New_Cases" class="tab-link">New Cases</a></li>
    <li><a href="#Ongoing_Cases" class="tab-link">Ongoing Cases</a></li>
    <li><a href="#Case_history" class="tab-link">Case History</a></li>
    <li><a href="#promotion" class="tab-link">Promotion</a></li>
    <li><a href="#new_officer" class="tab-link">New Officer</a></li>

    <li><a href="#quit" class="tab-link">Quit</a></li>
</ul>

<!-- Content for each tab -->
<div id="profile" class="tab-content active-content">
<div class="profile-card">
        <center><h1>OFFICER PROFILE</h1></center>
        <table class="profile-table">
            <tr>
                <td><strong>Officer ID</strong></td>
                <td><?php echo $officerId?></td>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td><?php echo $name?></td>
            </tr>
            <tr>
                <td><strong>Batch Number</strong></td>
                <td><?php echo $batchNumber?></td>
            </tr>
            <tr>
                <td><strong>Cases Handled</strong></td>
                <td><?php echo $casesHandled?></td>
            </tr>
            <tr>
                <td><strong>Posting Area</strong></td>
                <td><?php echo $postingArea?></td>
            </tr>
            <tr>
                <td><strong>Rank</strong></td>
                <td><?php echo $rank?></td>
            </tr>
            <tr>
                <td><strong>Phone Number</strong></td>
                <td><?php echo $phoneNumber?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $address?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $email?></td>
            </tr>
        </table>
    </div>
</div>

</div>

<div id="New_Cases" class="tab-content">
<center><h2>Case Table</h2></center>
    <div class="case-table">
        <table>
            <thead>
                <tr>
                    <th><center>Case Status</center></th>
                    <th><center>Case ID</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <!-- Example rows, you can add more dynamically -->
                <?php
                     $s='select * from record where officer_incharge_id IS NULL;';
                     $res=$conn->query($s);
                     $c='select * from login_junior ;';
                     $res2=$conn->query($c);
                     $id='';
                     while($row=$res2->fetch_assoc())                 
                    {
                        $id=$id . "|".$row['officer_id'];
                    }
                     while($row=$res->fetch_assoc())                 
                    {
                        $s = "Record ID: " . $row['rec_id'] . "&" .
                            "Status: " . $row['status'] . "&" .
                            "Case Open Date: " . $row['case_open_date'] . "&" .
                            "Case Description: " . $row['case_desc'] . "&" .
                            "Case Title: " . $row['case_title'] . "&" .
                            "Location ID: " . $row['location_id'];
                            $k = '<tr>
                            <td><center><span style="color:green;">OPEN</span></center></td>
                            <td><center>' . $row['rec_id'] . '</center></td>
                            <td><center>
                                <a href="#" class="btn btn-details" onclick="openModal(`' . $s . '`)">Details</a>
                                <a href="#" class="btn btn-update" onclick="openModal1(`' . $id . '`,`' . $row['rec_id'] . '`)">Appoint</a></center>
                            </td>
                        </tr>';
                        echo $k;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>




<div id="new_officer" class="tab-content">
<div class="form-container">
<center><h1>APPOINT NEW OFFICER</h1></center>
        <form action="#" method="post">
              <div class="form-group">
                <label for="officer_name">Officer Name:</label>
                <input type="text" id="officer_name" name="officer_name" required>
            </div>
            <div class="form-group">
                <label for="officer_batch_no">Batch Number:</label>
                <input type="text" id="officer_batch_no" name="officer_batch_no" required>
            </div>
            <div class="form-group">
                <label for="officer_case_handled">Cases Handled:</label>
                <input type="text" id="officer_case_handled" name="officer_case_handled" required>
            </div>
            <div class="form-group">
                <label for="officer_posting_area">Posting Area:</label>
                <input type="text" id="officer_posting_area" name="officer_posting_area" required>
            </div>
            <div class="form-group">
                <label for="officer_rank">Rank:</label>
                <select id="officer_rank" name="officer_rank" required>
                    <option value="captain">Captain</option>
                    <option value="sergeant">Sergeant</option>
                    <option value="inspector">Inspector</option>
                    <option value="lieutenant">Lieutenant</option>
                </select>
            </div>
            <div class="form-group">
                <label for="officer_phone_no">Phone Number:</label>
                <input type="text" id="officer_phone_no" name="officer_phone_no" required>
            </div>
            <div class="form-group">
                <label for="officer_address">Address:</label>
                <input type="text" id="officer_address" name="officer_address" required>
            </div>
            <div class="form-group">
                <label for="officer_mail">Email:</label>
                <input type="text" id="officer_mail" name="officer_mail" required>
            </div>

            <center><button type="submit" name='submit' value='s1'>Appoint Officer</button></center>
        </form>
    </div>

</div>

<div id="quit" class="tab-content">
    <!-- Content for Quit tab goes here -->
    <h2>Quit</h2>
    <p>Quit information...</p>
</div>

<div id="Ongoing_Cases" class="tab-content">
<div class="case-table">
        <table>
            <thead>
                <tr>
                    <th><center>Case Status</center></th>
                    <th><center>Case ID</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <!-- Example rows, you can add more dynamically -->
                <?php
                     $s='select * from record where case_close_date IS  NULL AND officer_incharge_id IS NOT NULL';
                     $res=$conn->query($s);
                     $c='select * from login_junior ;';
                     $res2=$conn->query($c);
                     $id='';
                     while($row=$res2->fetch_assoc())                 
                    {
                        $id=$id . "|".$row['officer_id'];
                    }
                     while($row=$res->fetch_assoc())                 
                    {
                        $s = "Record ID: " . $row['rec_id'] . "&" .
                            "Status: " . $row['status'] . "&" .
                            "Case Open Date: " . $row['case_open_date'] . "&" .
                            "Case Description: " . $row['case_desc'] . "&" .
                            "Case Title: " . $row['case_title'] . "&" .
                            "Location ID: " . $row['location_id'];
                            $s1='select * from witness where rec_id='.$row['rec_id'];
                            $s2='select * from suspect where rec_id='.$row['rec_id'];
                            $s3='select * from evidence where rec_id='.$row['rec_id'];
                            $s4='select * from Victim where rec_id='.$row['rec_id'];
                            $res1=$conn->query($s1);
                            $res2=$conn->query($s2);
                            $res3=$conn->query($s3);
                            $res4=$conn->query($s4);
                            $row1=$res1->fetch_assoc();
                            $row2=$res2->fetch_assoc();
                            $row3=$res3->fetch_assoc();
                            $row4=$res4->fetch_assoc();
                            $s11='';
                            $s12='';
                            $s13='';
                            $s14='';
                            
                            if($row1){
                            $s11 = "Witness ID: " . $row1['witness_id'] . "&" .
                            "Witness First Name: " . $row1['witness_fname'] . "&" .
                            "Witness Last Name: " . $row1['witness_lname'] . "&" .
                            "Witness Age: " . $row1['witness_age'] . "&" .
                            "Witness DOB: " . $row1['witness_dob'] . "&" .
                            "Witness Phone Number: " . $row1['witness_phone_no'] . "&" .
                            "Witness Address: " . $row1['witness_address'] . "&" .
                            "Witness Crime History: " . $row1['witness_crime_history'] . "&" .
                            "Witness Purpose of Presence: " . $row1['witness_purpose_of_presence'] ;}
                            // Assuming $row contains the fetched data from the 'victim' table
                            if($row4){
                            $s12 = "Victim ID: " . $row4['victim_id'] . "&" .
                            "Victim First Name: " . $row4['victim_fname'] . "&" .
                            "Victim Last Name: " . $row4['victim_lname'] . "&" .
                            "Victim Age: " . $row4['victim_age'] . "&" .
                            "Victim DOB: " . $row4['victim_dob'] . "&" .
                            "Victim Gender: " . $row4['victim_gender'] . "&" .
                            "Victim Phone Number: " . $row4['victim_phone_no'] . "&" .
                            "Victim Address: " . $row4['victim_address']  ;
                        }
                            if($row2){
                            $s13 = "Suspect ID: " . $row2['suspect_id'] . "&" .
                            "Suspect First Name: " . $row2['suspect_fname'] . "&" .
                            "Suspect Last Name: " . $row2['suspect_lname'] . "&" .
                            "Suspect Father's Name: " . $row2['suspect_father_name'] . "&" .
                            "Suspect Mother's Name: " . $row2['suspect_mother_name'] . "&" .
                            "Suspect DOB: " . $row2['suspect_dob'] . "&" .
                            "Suspect Crime History: " . $row2['suspect_crime_history'] . "&" .
                            "Suspect Gender: " . $row2['suspect_gender'] . "&" .
                            "Suspect Address: " . $row2['suspect_address'] . "&" .
                            "Suspect Phone Number: " . $row2['suspect_phone_no'] . "&" .
                            "Suspect Married Status: " . $row2['suspect_married_status'] . "&" .
                            "Suspect Wife's Name: " . $row2['suspect_wife_name'] . "&" .
                            "Suspect Child's Name: " . $row2['suspect_child_name'];}
                            if($row3){
                            $s14 = "Evidence ID: " . $row3['evidence_id'] . "&" .
                            "Evidence Type: " . $row3['evidence_type'] . "&" .
                            "Evidence Description: " . $row3['evidence_desc'] . "&" .
                            "Evidence Date Collected: " . $row3['evidence_date_collected'] . "&" .
                            "Evidence Location ID: " . $row3['evidence_location_id'];
                            }
                            $k = '<tr>
                            <td><center><span style="color:GREEN;">PROCESSING</span></center></td>
                            <td><center>' . $row['rec_id'] . '</center></td>
                            <td><center>
                                <a href="#" class="btn btn-details" onclick="openModal2(`' . $s . '`,`' . $s11 . '`,`' . $s12 . '`,`' . $s13 . '`,`' . $s14 . '`)">Details</a></center>
                            </td>
                        </tr>';
                        echo $k;
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>
<div id="Case_history" class="tab-content">
<center><h2>CASE TABLE</h2></center>
    <div class="case-table">
        <table>
            <thead>
                <tr>
                    <th><center>Case Status</center></th>
                    <th><center>Case ID</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <!-- Example rows, you can add more dynamically -->
                <?php
                     $s='select * from record where case_close_date IS NOT NULL ';
                     $res=$conn->query($s);
                     $c='select * from login_junior ;';
                     $res2=$conn->query($c);
                     $id='';
                     while($row=$res2->fetch_assoc())                 
                    {
                        $id=$id . "|".$row['officer_id'];
                    }
                     while($row=$res->fetch_assoc())                 
                    {
                        $s = "Record ID: " . $row['rec_id'] . "&" .
                            "Status: " . $row['status'] . "&" .
                            "Case Open Date: " . $row['case_open_date'] . "&" .
                            "Case Description: " . $row['case_desc'] . "&" .
                            "Case Title: " . $row['case_title'] . "&" .
                            "Location ID: " . $row['location_id'];
                            $s1='select * from witness where rec_id='.$row['rec_id'];
                            $s2='select * from suspect where rec_id='.$row['rec_id'];
                            $s3='select * from evidence where rec_id='.$row['rec_id'];
                            $s4='select * from Victim where rec_id='.$row['rec_id'];
                            $res1=$conn->query($s1);
                            $res2=$conn->query($s2);
                            $res3=$conn->query($s3);
                            $res4=$conn->query($s4);
                            $row1=$res1->fetch_assoc();
                            $row2=$res2->fetch_assoc();
                            $row3=$res3->fetch_assoc();
                            $row4=$res4->fetch_assoc();
                            $s11='';
                            $s12='';
                            $s13='';
                            $s14='';
                            
                            if($row1){
                            $s11 = "Witness ID: " . $row1['witness_id'] . "&" .
                            "Witness First Name: " . $row1['witness_fname'] . "&" .
                            "Witness Last Name: " . $row1['witness_lname'] . "&" .
                            "Witness Age: " . $row1['witness_age'] . "&" .
                            "Witness DOB: " . $row1['witness_dob'] . "&" .
                            "Witness Phone Number: " . $row1['witness_phone_no'] . "&" .
                            "Witness Address: " . $row1['witness_address'] . "&" .
                            "Witness Crime History: " . $row1['witness_crime_history'] . "&" .
                            "Witness Purpose of Presence: " . $row1['witness_purpose_of_presence'] ;}
                            // Assuming $row contains the fetched data from the 'victim' table
                            if($row4){
                            $s12 = "Victim ID: " . $row4['victim_id'] . "&" .
                            "Victim First Name: " . $row4['victim_fname'] . "&" .
                            "Victim Last Name: " . $row4['victim_lname'] . "&" .
                            "Victim Age: " . $row4['victim_age'] . "&" .
                            "Victim DOB: " . $row4['victim_dob'] . "&" .
                            "Victim Gender: " . $row4['victim_gender'] . "&" .
                            "Victim Phone Number: " . $row4['victim_phone_no'] . "&" .
                            "Victim Address: " . $row4['victim_address']  ;
                        }
                            if($row2){
                            $s13 = "Suspect ID: " . $row2['suspect_id'] . "&" .
                            "Suspect First Name: " . $row2['suspect_fname'] . "&" .
                            "Suspect Last Name: " . $row2['suspect_lname'] . "&" .
                            "Suspect Father's Name: " . $row2['suspect_father_name'] . "&" .
                            "Suspect Mother's Name: " . $row2['suspect_mother_name'] . "&" .
                            "Suspect DOB: " . $row2['suspect_dob'] . "&" .
                            "Suspect Crime History: " . $row2['suspect_crime_history'] . "&" .
                            "Suspect Gender: " . $row2['suspect_gender'] . "&" .
                            "Suspect Address: " . $row2['suspect_address'] . "&" .
                            "Suspect Phone Number: " . $row2['suspect_phone_no'] . "&" .
                            "Suspect Married Status: " . $row2['suspect_married_status'] . "&" .
                            "Suspect Wife's Name: " . $row2['suspect_wife_name'] . "&" .
                            "Suspect Child's Name: " . $row2['suspect_child_name'];}
                            if($row3){
                            $s14 = "Evidence ID: " . $row3['evidence_id'] . "&" .
                            "Evidence Type: " . $row3['evidence_type'] . "&" .
                            "Evidence Description: " . $row3['evidence_desc'] . "&" .
                            "Evidence Date Collected: " . $row3['evidence_date_collected'] . "&" .
                            "Evidence Location ID: " . $row3['evidence_location_id'];
                            }
                            $k = '<tr>
                            <td><center><span style="color:red;">CLOSED</span></center></td>
                            <td><center>' . $row['rec_id'] . '</center></td>
                            <td><center>
                                <a href="#" class="btn btn-details" onclick="openModal2(`' . $s . '`,`' . $s11 . '`,`' . $s12 . '`,`' . $s13 . '`,`' . $s14 . '`)">Details</a></center>
                            </td>
                        </tr>';
                        echo $k;
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>
<!-- Hidden modal container -->
<div id="modal-container" class="modal-container">
    <div class="modal-content">
        <p id="modal-message"></p>
        <button onclick="closeModal()">OK</button>
    </div>
</div>
<div id="modal-container1" class="modal-container">
    <div class="modal-content">
        <ul class="nav-tabs">
            <li><a href="#Record" class="tab-link1">Record</a></li>
            <li><a href="#Witness" class="tab-link1">Witness</a></li>
            <li><a href="#Suspect" class="tab-link1">Suspect</a></li>
            <li><a href="#Evidence" class="tab-link1">Evidence</a></li>
            <li><a href="#Victim" class="tab-link1">Victim</a></li>
        </ul>
        <div id="Record" class="tab-content">

        </div>
        <div id="Witness" class="tab-content">
            <!-- Content for Witness tab -->
            <h3>Witness Information</h3>
            <p>Content related to witnesses goes here...</p>
        </div>
        <div id="Suspect" class="tab-content">
            <!-- Content for Suspect tab -->
            <h3>Suspect Information</h3>
            <p>Content related to suspects goes here...</p>
        </div>
        <div id="Evidence" class="tab-content">
            <!-- Content for Evidence tab -->
            <h3>Evidence Information</h3>
            <p>Content related to evidence goes here...</p>
        </div>
        <div id="Victim" class="tab-content">
            <!-- Content for Victim tab -->
            <h3>Victim Information</h3>
            <p>Content related to victims goes here...</p>
        </div>
        <button onclick="closeModal1()">OK</button>
    </div>
</div>
<div id="promotion" class="tab-content">
    <!-- Content for Case Status tab goes here -->
    <center><h2>PROMOTION</h2></center>
    <form method="POST">
        <div class="promo">
            <table>
                <tr>
                    <th><center>Officer Name</center></th>
                    <th><center>Rank</center></th>
                    <th><center>Action</center></th>
                </tr>
                <?php
                $s = 'SELECT * FROM officer WHERE officer_rank="Inspector" OR officer_rank="Lieutenant"';
                $res = $conn->query($s);

                while ($row = $res->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><center>' . $row['officer_name'] . '</center></td>';
                    echo '<td><center>' . $row['officer_rank'] . '</center></td>';
                    echo '<td><center><form method="post"><input type="hidden" name="j3" value="' . $row['officer_id'] . '">';
                    echo '<button type="submit" name="submit" value="j3">PROMOTE</button></center></td></form>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </form>
</div>

<script>
    // JavaScript to handle tab switching
    document.addEventListener("DOMContentLoaded", function() {
    var modalTabLinks = document.querySelectorAll('#modal-container1 .tab-link1');
    for (var i = 0; i < modalTabLinks.length; i++) {
        modalTabLinks[i].addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            var tabId = this.getAttribute('href').substring(1); // Get the ID of the target tab
            showModalTab(tabId); // Call function to display the clicked tab inside the modal
        });
    }
});

function showModalTab(tabId) {
    var modalTabContents = document.querySelectorAll('#modal-container1 .tab-content');
    for (var i = 0; i < modalTabContents.length; i++) {
        modalTabContents[i].style.display = 'none'; // Hide all tab content inside the modal
    }
    var selectedModalTab = document.getElementById(tabId);
    if (selectedModalTab) {
        selectedModalTab.style.display = 'block'; // Display the selected tab content inside the modal
    }
}

    document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab-link');
    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetContent = document.getElementById(targetId);
            const allContents = document.querySelectorAll('.tab-content');

            allContents.forEach(content => {
                content.classList.remove('active-content');
            });

            if (targetId === 'quit') {
                // Redirect to the index page if "Quit" tab is clicked
                window.location.href = '../../crime.php';
            } else {
                targetContent.classList.add('active-content');
            }
        });
    });
});

</script>

</body>
</html>
