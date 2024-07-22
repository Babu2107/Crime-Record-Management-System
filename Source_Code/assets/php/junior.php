<?php
    session_start();
    include 'connec.php';
    $s='select * from officer where officer_id="'.$_SESSION['ofj1'].'"';
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
    $s='select * from record where officer_incharge_id='.$officerId;
    $res=$conn->query($s);
    $row=$res->fetch_assoc();
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crime Record Management System</title>
    <style>
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

        </style>
    <link rel="icon" type="image/png" href="../Images/icon/logo.jpg">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/junior.css">
    <script src="../js/main.js"></script>
    <script src="../js/junior.js"></script>
    <style>
        /* Basic CSS for navigation tabs */
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
        .profile-card {
  background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (last parameter) to control transparency */
  /* Other styles for the profile card */
  padding: 20px;
  border-radius: 10px;
  /* Add more styles as needed */
}

    </style>
    <script>
        function openModal3(message,m2,m3,m4,m5) {
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
    if(m2[0]=='<')
    {
        modalMessage = document.getElementById('Witness');
    modalMessage.innerHTML = m2;
     
    }
    else
    {m2 = m2.replace(/&/g, '\n');
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
    }
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
    if(m4[0]=='<')
    {
        modalMessage = document.getElementById('Suspect');
    modalMessage.innerHTML = m4;
     
    }
    else
    {
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
        modalMessage = document.getElementById('Suspect');
    modalMessage.innerHTML = tableHTML;
     
    }   

    // Display the formatted table within the modal
    if(m5[0]=='<')
    {
        modalMessage = document.getElementById('Evidence');
    modalMessage.innerHTML = m5;
     
    }
    else
    {
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
    }var modalContainer = document.getElementById('modal-container1');
    modalContainer.style.display = 'flex';
}

        </script>
</head>
<body>

<ul class="nav-tabs">
    <li><a href="#profile" class="tab-link">Profile</a></li>
    <li><a href="#cases" class="tab-link">Cases</a></li>
    <li><a href="#case_history" class="tab-link">Case History</a></li>
    <li><a href="#quit" class="tab-link">Quit</a></li>
</ul>

<!-- Content for each tab -->
<div id="profile" class="tab-content active-content">
<div class="profile-card">
        <h1 >OFFICER PROFILE</h1>
        <table class="profile-table" style='border:none;'>
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
<div id="cases" class="tab-content">
<center><h2>CASE TABLE</h2></CENTER>
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
                
                <?php
                     $s='select * from record where case_close_date IS  NULL AND  officer_incharge_id='.$officerId;
                     $res=$conn->query($s);
                     while($row=$res->fetch_assoc())                 
                    {
                        $s = "Record ID: " . $row['rec_id'] . "&" .
                            "Status: " . $row['status'] . "&" .
                            "Case Open Date: " . $row['case_open_date'] . "&" .
                            "Case Close Date: " . $row['case_close_date'] . "&" .
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
                            $s12='';$s13='';$s14='';
                            $s21='';
                            $s22='';$s23='';$s24='';
                            if($row1){
                            $s11 = "Witness ID: " . $row1['witness_id'] . "&" .
                            "Witness First Name: " . $row1['witness_fname'] . "&" .
                            "Witness Last Name: " . $row1['witness_lname'] . "&" .
                            "Witness Age: " . $row1['witness_age'] . "&" .
                            "Witness DOB: " . $row1['witness_dob'] . "&" .
                            "Witness Phone Number: " . $row1['witness_phone_no'] . "&" .
                            "Witness Address: " . $row1['witness_address'] . "&" .
                            "Witness Crime History: " . $row1['witness_crime_history'] . "&" .
                            "Witness Purpose of Presence: " . $row1['witness_purpose_of_presence'] ;
                            $s21=$s11;
                            }
                            else
                            {
                                $s21='<div class="upd">
                                <form method="POST" >
                                <input type="text" style="display:none;" name="recid"value="'.$row['rec_id'].'">
                                
                                    <label for="witness_fname">Witness First Name:</label>
                                    <input type="text" id="witness_fname" name="witness_fname" required><br>
                            
                                    <label for="witness_lname">Witness Last Name:</label>
                                    <input type="text" id="witness_lname" name="witness_lname" required><br>
                            
                                    <label for="witness_age">Witness Age:</label>
                                    <input type="number" id="witness_age" name="witness_age" required><br>
                            
                                    <label for="witness_dob">Witness Date of Birth:</label>
                                    <input type="date" id="witness_dob" name="witness_dob" required><br>
                            
                                    <label for="witness_phone_no">Witness Phone Number:</label>
                                    <input type="text" id="witness_phone_no" name="witness_phone_no" required><br>
                            
                                    <label for="witness_address">Witness Address:</label>
                                    <textarea id="witness_address" name="witness_address" required></textarea><br>
                            
                                    <label for="witness_crime_history">Witness Crime History:</label>
                                    <textarea id="witness_crime_history" name="witness_crime_history" required></textarea><br>
                            
                                    <label for="witness_purpose_of_presence">Witness Purpose of Presence:</label>
                                    <input type="text" id="witness_purpose_of_presence" name="witness_purpose_of_presence" required><br>
                                    <button type="submit" name="submit" value="k1">UPDATE</button>
                                </form></div>';
                            }
                            // Assuming $row contains the fetched data from the 'victim' table
                            if($row4){
                            $s12 = "Victim ID: " . $row4['victim_id'] . "&" .
                            "Victim First Name: " . $row4['victim_fname'] . "&" .
                            "Victim Last Name: " . $row4['victim_lname'] . "&" .
                            "Victim Age: " . $row4['victim_age'] . "&" .
                            "Victim DOB: " . $row4['victim_dob'] . "&" .
                            "Victim Gender: " . $row4['victim_gender'] . "&" .
                            "Victim Phone Number: " . $row4['victim_phone_no'] . "&" .
                            "Victim Address: " . $row4['victim_address']  ;}
                            if($row2){
                            $s13 = "Suspect ID: " . $row2['suspect_id'] . "&" .
                            "Suspect First Name: " . $row2['suspect_fname'] . "&" .
                            "Suspect Last Name: " . $row2['suspect_lname'] . "&" .
                            "Suspect Fathers Name: " . $row2['suspect_father_name'] . "&" .
                            "Suspect Mothers Name: " . $row2['suspect_mother_name'] . "&" .
                            "Suspect DOB: " . $row2['suspect_dob'] . "&" .
                            "Suspect Crime History: " . $row2['suspect_crime_history'] . "&" .
                            "Suspect Gender: " . $row2['suspect_gender'] . "&" .
                            "Suspect Address: " . $row2['suspect_address'] . "&" .
                            "Suspect Phone Number: " . $row2['suspect_phone_no'] . "&" .
                            "Suspect Married Status: " . $row2['suspect_married_status'] . "&" .
                            "Suspect Wifes Name: " . $row2['suspect_wife_name'] . "&" .
                            "Suspect Childs Name: " . $row2['suspect_child_name'];
                                $s23=$s13;
                        }
                            else
                            {
                                $s23='<div class="upd">
                                <form method="POST" >
                                <input type="text" style="display:none;" name="recid"value="'.$row['rec_id'].'">
                                
                                    <label for="suspect_fname">first Name:</label>
                                    <input type="text" id="suspect_fname" name="suspect_fname" required><br>
                            
                                    <label for="suspect_lname">Last Name:</label>
                                    <input type="text" id="suspect_lname" name="suspect_lname" required><br>
                            
                                    <label for="suspect_dob">Date of Birth:</label>
                                    <input type="date" id="suspect_dob" name="suspect_dob" required><br>
                                    <label for="suspect_faname">father Name:</label>
                                    <input type="text" id="suspect_faname" name="suspect_faname" required><br>
                                    <label for="suspect_maname">Mother Name:</label>
                                    <input type="text" id="suspect_maname" name="suspect_maname" required><br>
                                    <label for="suspect_his">Crime History:</label>
                                    <textarea id="suspect_his" name="suspect_his" required></textarea><br>
                            
                                    <label for="suspect_gender">Gender:</label>
                                    <select id="suspect_gender" name="suspect_gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select><br>
                                    
                                    <label for="suspect_address">Address:</label>
                                    <textarea id="suspect_address" name="suspect_address" required></textarea><br>
                            
                                    <label for="suspect_phone_no">Phone Number:</label>
                                    <input type="text" id="suspect_phone_no" name="suspect_phone_no" required><br>
                            
                                    <label for="suspect_married_status">Marital Status:</label>
                                    <select id="suspect_married_status" name="suspect_married_status">
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select><br>
                            
                                    <label for="suspect_wife_name">Wifes Name:</label>
                                    <input type="text" id="suspect_wife_name" name="suspect_wife_name"><br>
                            
                                    <label for="suspect_child_name">Childs Name:</label>
                                    <input type="text" id="suspect_child_name" name="suspect_child_name"><br>
                            
                            
                                    <button type="submit" name="submit" value="k2">UPDATE</button>
                                </form></div>';
                            }    if($row3){
                                $s14 = "Evidence ID: " . $row3['evidence_id'] . "&" .
                                "Evidence Type: " . $row3['evidence_type'] . "&" .
                                "Evidence Description: " . $row3['evidence_desc'] . "&" .
                                "Evidence Date Collected: " . $row3['evidence_date_collected'] . "&" .
                                "Evidence Location ID: " . $row3['evidence_location_id'];
                                $s24=$s14;  
                                }
                                else
                                {
                                $s24='<div class="upd"><form method="POST" >
                                <input type="text" style="display:none;" name="recid"value="'.$row['rec_id'].'">
                                <label for="evidence_type">Evidence Type:</label>
                                <input type="text" id="evidence_type" name="evidence_type" required><br>
                        
                                <label for="evidence_desc">Evidence Description:</label>
                                <textarea id="evidence_desc" name="evidence_desc" required></textarea><br>
                        
                                <label for="evidence_date_collected">Evidence Date Collected:</label>
                                <input type="date" id="evidence_date_collected" name="evidence_date_collected" required><br>
                        
                                <label for="evidence_location_id">Evidence Location ID:</label>
                                <input type="text" id="evidence_location_id" name="evidence_location_id" required><br>
                        
                                <button type="submit" name="submit" value="k3">UPDATE</button>
                                 </form></div>';
                                }
                            $k = '<tr>
                            <td><center><span style="color:green;">Processing</td></center>
                            <td><center>' . $row['rec_id'] . '</td></center>
                            <td><center>
                                <a href="#" class="btn btn-details" onclick="openModal2(`' . $s . '`,`' . $s11 . '`,`' . $s12 . '`,`' . $s13 . '`,`' . $s14 . '`)">Details</a>
                                <a href="#" class="btn btn-update" onclick=\'openModal3(`' . $s . '`,`' . $s21 . '`,`' . $s12 . '`,`' . $s23 . '`,`' . $s24 . '`)\'>Update</a>
                                <form method="POST">
                                    <input type="text"  name="j2" value="'.$row['rec_id'].'" style="display:none"/>
                                    <button class="close-case-btn" name="submit" value="j1">Close</button>
                                </form>
                            </td></center>
                        </tr>';
                        echo $k;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    if(isset($_POST['submit']))
    {
        if($_POST['submit']=='j1')
        {
            $currentDate = date('Y-m-d'); // Retrieves the current date in 'YYYY-MM-DD' format
            $j2='update record SET case_close_date="'.$currentDate.'",status="close" where rec_id='.$_POST['j2'];
            $conn->query($j2);
        }
        else 
        if($_POST['submit']=='k3')
        {
            $evidenceType = $_POST['evidence_type'];
            $evidenceDescription = $_POST['evidence_desc'];
            $evidenceDateCollected = $_POST['evidence_date_collected'];
            $evidenceLocationID = $_POST['evidence_location_id'];
            $s='SELECT MAX(evidence_id) AS max_evidence_id FROM evidence;';
            $k=$conn->query($s);
            $row=$k->fetch_assoc();
            $eid=$row['max_evidence_id']+1;

            $s='insert into evidence values('.$eid.',"'.$evidenceType.'","'.$evidenceDescription.'","'.$evidenceDateCollected.'","'.$evidenceLocationID.'",'.$_POST['recid'].')';   
            $conn->query($s);
        }
        else 
        if($_POST['submit']=='k2')
        {
            $suspectfirstName = $_POST['suspect_fname'];
            
            $suspectLastName = $_POST['suspect_lname'];
            $suspectfaName = $_POST['suspect_faname'];
            $suspectmaName = $_POST['suspect_maname'];
            $suspectDOB = $_POST['suspect_dob'];
            $suspectGender = $_POST['suspect_gender'];
            $suspectAddress = $_POST['suspect_address'];
            $suspectPhoneNumber = $_POST['suspect_phone_no'];
            $suspectMaritalStatus = $_POST['suspect_married_status'];
            $suspectWifeName = $_POST['suspect_wife_name'];
            $suspectChildName = $_POST['suspect_child_name'];
            $suspecthis = $_POST['suspect_his'];
            
            $s='SELECT MAX(suspect_id) AS max_suspect_id FROM suspect;';
            $k=$conn->query($s);
            $row=$k->fetch_assoc();
            $sid=$row['max_suspect_id']+1;
            $suspectQuery = 'INSERT INTO suspect (`suspect_id`, `suspect_fname`, `suspect_lname`, `suspect_father_name`, `suspect_mother_name`, `suspect_dob`, `suspect_crime_history`, `suspect_gender`, `suspect_address`, `suspect_phone_no`, `suspect_married_status`, `suspect_wife_name`, `suspect_child_name`, `rec_id`) 
            VALUES ("'.$sid.'","'.$suspectfirstName.'","'.$suspectLastName.'","'.$suspectfaName.'","'.$suspectmaName.'","'.$suspectDOB.'","'.$suspecthis.'","'.$suspectGender.'","'.$suspectAddress.'","'.$suspectPhoneNumber.'","'.$suspectMaritalStatus.'","'.$suspectWifeName.'","'.$suspectChildName.'","'.$_POST['recid'].'")';
            $conn->query($suspectQuery);
        }
        else 
        if($_POST['submit']=='k1')
        {
            $s='SELECT MAX(witness_id) AS max_witness_id FROM witness;';
            $k=$conn->query($s);
            $row=$k->fetch_assoc();
            $wid=$row['max_witness_id']+1;
            
            $witnessFirstName = $_POST['witness_fname'];
            $witnessLastName = $_POST['witness_lname'];
            $witnessAge = $_POST['witness_age'];
            $witnessDOB = $_POST['witness_dob'];
            $witnessPhoneNumber = $_POST['witness_phone_no'];
            $witnessAddress = $_POST['witness_address'];
            $witnessCrimeHistory = $_POST['witness_crime_history'];
            $witnessPurposeOfPresence = $_POST['witness_purpose_of_presence'];
            $sql = "INSERT INTO `witness`(`witness_id`, `witness_fname`, `witness_lname`, `witness_age`, `witness_dob`, `witness_phone_no`, `witness_address`, `witness_crime_history`, `witness_purpose_of_presence`, `rec_id`) 
            VALUES ('$wid','$witnessFirstName','$witnessLastName','$witnessAge','$witnessDOB','$witnessPhoneNumber','$witnessAddress','$witnessCrimeHistory','$witnessPurposeOfPresence','" . $_POST['recid'] . "')";
            $conn->query($sql);
        }
        
    }
?>
<div id="case_history" class="tab-content">
<center><h2>CASE TABLE</h2></CENTER>
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
                <?php
                     $s='select * from record where case_close_date IS NOT NULL AND officer_incharge_id='.$officerId;
                     $res=$conn->query($s);
                     while($row=$res->fetch_assoc())                 
                    {
                        $s = "Record ID: " . $row['rec_id'] . "&" .
                            "Status: " . $row['status'] . "&" .
                            "Case Open Date: " . $row['case_open_date'] . "&" .
                            "Case Close Date: " . $row['case_close_date'] . "&" .
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
                            $s12='';$s13='';$s14='';
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
                            "Victim Address: " . $row4['victim_address']  ;}
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
                            <td>
                            <center><a href="#" class="btn btn-details" onclick="openModal2(`' . $s . '`,`' . $s11 . '`,`' . $s12 . '`,`' . $s13 . '`,`' . $s14 . '`)">Details</a></center>
                            </td>
                        </tr>';
                        echo $k;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div id="quit" class="tab-content">
    <!-- Content for Quit tab goes here -->
    <h2>Quit</h2>
    <p>Quit information...</p>
</div>

<!-- Hidden modal container -->
<div id="modal-container" class="modal-container" style='display:none;'>
    <div class="modal-content">
        <p id="modal-message"></p>
        <button onclick="closeModal()">OK</button>
    </div>
</div>
<!-- Modal with Tabs -->
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
