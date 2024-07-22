<?php
    session_start();
?>
<?php
    include 'connec.php';
    $s='select * from login_public where email="'.$_SESSION['public1'].'"';
    $res=$conn->query($s);
    $row=$res->fetch_assoc();
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $id1=$row['public_id'];
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crime Record Management System</title>
    <link rel="icon" type="image/png" href="../Images/icon/logo.jpg">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/public.css">
    <style>
        .profile-info p {
        margin-bottom: 10px;
    }

    .profile-info strong {
        font-weight: bold;
    }
    
    body {
    margin: 0;
    padding: 0;
    background-image: url('../Images/bg2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; /* Fixed background */
    height: 100vh; /* Set the height to full viewport height */
}

* {
    color: white;
}

        </style>
    
    <script src="../js/main.js"></script>
    <script src="../js/public.js"></script>
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
    </style>
</head>
<body>

<ul class="nav-tabs">
    <li><a href="#profile" class="tab-link">Profile</a></li>
    <li><a href="#file_case" class="tab-link">File Case</a></li>
    <li><a href="#case_status" class="tab-link">Case Status</a></li>
    <li><a href="#case_close" class="tab-link">Case History</a></li>
    <li><a href="#quit" class="tab-link">Quit</a></li>
</ul>

<!-- Content for each tab -->
<div id="profile" class="tab-content active-content">
<div class="profile-card">
<h1>User Profile</h1>
<table class="profile-table">
    <tr>
        <td><strong>ID:</strong></td>
        <td><?php echo $id1;?></td>
    </tr>
    <tr>
        <td><strong>Name:</strong></td>
        <td><?php echo $name;?></td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td><?php echo $email;?></td>
    </tr>
    <tr>
        <td><strong>Phone:</strong></td>
        <td><?php echo $phone;?></td>
    </tr>
</table>

  </div>
</div>

<div id="file_case" class="tab-content">
  <form method="POST">
  <h2>Victim Details</h2>
    
    <label for="victim_fname">First Name:</label>
    <input type="text" id="victim_fname" name="victim_fname" required><br><br>

    <label for="victim_lname">Last Name:</label>
    <input type="text" id="victim_lname" name="victim_lname" required><br><br>

    <label for="victim_age">Age:</label>
    <input type="number" id="victim_age" name="victim_age" required><br><br>

    <label for="victim_dob">Date of Birth:</label>
    <input type="date" id="victim_dob" name="victim_dob" required><br><br>

    <label for="victim_gender">Gender:</label>
    <select id="victim_gender" name="victim_gender" required>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select><br><br>

    <label for="victim_phone_no">Phone Number:</label>
    <input type="text" id="victim_phone_no" name="victim_phone_no" required><br><br>

    <label for="victim_address">Address:</label><br>
    <textarea id="victim_address" name="victim_address" required></textarea><br><br>
    <label for="case_desc">Case Description:</label><br>
    <textarea id="case_desc" name="case_desc" required></textarea><br><br>

    <label for="case_title">Case Title:</label>
    <input type="text" id="case_title" name="case_title" required><br><br>

    <h2>Location Details</h2>
    
    <label for="door_no">Door No:</label>
    <input type="text" id="door_no" name="door_no" required><br><br>

    <label for="street_name">Street Name:</label>
    <input type="text" id="street_name" name="street_name" required><br><br>

    <label for="area_name">Area Name:</label>
    <input type="text" id="area_name" name="area_name" required><br><br>
    <label for="state">State:</label>
    <input type="text" id="state" name="state" required><br><br>
    <label for="pincode">Pincode:</label>
    <input type="text" id="pincode" name="pincode" required><br><br>
    <button name='submit' value="s100" >submit</button>
  </form>

</div>
<?php
    if(isset($_POST['submit']))
    {
        if($_POST['submit']=='s100')
        {
            $s='SELECT MAX(location_id) AS max_location_id FROM location;';
            $k=$conn->query($s);
            $row=$k->fetch_assoc();
            $lid=$row['max_location_id']+1;

            $s='SELECT MAX(rec_id) AS max_record_id FROM record;';
            $k=$conn->query($s);
            $row=$k->fetch_assoc();
            $rid=$row['max_record_id']+1;
            
            $victim_fname = $_POST['victim_fname'];
            $victim_lname = $_POST['victim_lname'];
            $victim_age = $_POST['victim_age'];
            $victim_dob = $_POST['victim_dob'];
            $victim_gender = $_POST['victim_gender'];
            $victim_phone_no = $_POST['victim_phone_no'];
            $victim_address = $_POST['victim_address'];
            $currentDate = date("Y-m-d"); // Retrieves the current date in the format "YYYY-MM-DD"
            
            // Retrieving case details
            $case_open_day=$currentDate;
            $case_desc = $_POST['case_desc'];
            $case_title = $_POST['case_title'];
            $status = 'Open'; // Example value for status
            $case_close_date = null; // Example value for case_close_date (assuming it's NULL for now)
            $officer_incharge_id = null; // Example value for officer_incharge_id
           
            // Constructing the SQL INSERT command
            // Retrieving location details
            $door_no = $_POST['door_no'];
            $street_name = $_POST['street_name'];
            $area_name = $_POST['area_name'];
            $state = $_POST['state'];
            $pincode = $_POST['pincode'];
            $sqloc = "INSERT INTO `location`(`location_id`, `door_no`, `street_name`, `area_name`, `state`, `pincode`) 
                VALUES ('$lid', '$door_no', '$street_name', '$area_name', '$state', '$pincode')";
            $conn->query($sqloc);

            $sqlInsert = "INSERT INTO `record` (`rec_id`, `status`, `case_open_date`, `case_desc`, `case_title`, `location_id`) VALUES ('$rid', '$status', '$case_open_day', '$case_desc', '$case_title', '$lid')";
            $conn->query($sqlInsert);
            
            $sql = "INSERT INTO `victim`(`victim_id`,`victim_fname`, `victim_lname`, `victim_age`, `victim_dob`, `victim_gender`, `victim_phone_no`, `victim_address`, `rec_id`) VALUES ('$id1','$victim_fname', '$victim_lname', '$victim_age', '$victim_dob', '$victim_gender', '$victim_phone_no', '$victim_address', '$rid')";
            $conn->query($sql);
            
        }
    }
?>
<div id="case_status" class="tab-content">
<div class="case-table">
        <table>
            <thead>
                <tr>
                    <th>Case Status</th>
                    <th>Case ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example rows, you can add more dynamically -->
                <?php
                     $s='select * from record where case_close_date IS NULL AND rec_id in(select rec_id from victim where victim_id='.$id1.')';
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
                            "Victim Address: " . $row4['victim_address'] ;}
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
                            <td><span style="color:GREEN;">PROCESSING</span></td>
                            <td>' . $row['rec_id'] . '</td>
                            <td>
                                <a href="#" class="btn btn-details" onclick="openModal2(`' . $s . '`,`' . $s11 . '`,`' . $s12 . '`,`' . $s13 . '`,`' . $s14 . '`)">Details</a>
                            </td>
                        </tr>';
                        echo $k;
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>
<div id="case_close" class="tab-content">
<div class="case-table">
        <table>
            <thead>
                <tr>
                    <th>Case Status</th>
                    <th>Case ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example rows, you can add more dynamically -->
                <?php
                     $s='select * from record where case_close_date IS NOT NULL AND rec_id in(select rec_id from victim where victim_id='.$id1.')';
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
                            "Victim Address: " . $row4['victim_address'] ;}
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
                            <td><span style="color:RED;">CLOSED</span></td>
                            <td>' . $row['rec_id'] . '</td>
                            <td>
                                <a href="#" class="btn btn-details" onclick="openModal2(`' . $s . '`,`' . $s11 . '`,`' . $s12 . '`,`' . $s13 . '`,`' . $s14 . '`)">Details</a>
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
<div id="modal-container1" class="modal-container" style='display:none;'>
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
