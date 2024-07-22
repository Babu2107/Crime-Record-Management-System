<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crime Record Management System</title>
    <link rel="icon" type="image/png" href="assets/Images/icon/logo.jpg">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="./assets/js/main.js"></script>
    <style>
      body {
    margin: 0;
    padding: 0;
    background-image: url('assets/Images/bg1.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh; /* Set the height to full viewport height */
}
* {
    color: white;
}
/* Targeting the legend element directly */
legend {
    /* Your styling properties */
    font-weight: bold;
    color: #800000;

    /* Add more styles as needed */
}
h1
{
    /* Title styles */
    color: #FFFFFF; /* White title color */
}
input
{
    color:black;
}

        </style>
    <script>
        function otpver()
        {
            let s=document.getElementById('rotp');
            s.style.display='block';
            let k=document.getElementById('forgot1');
            k.style.display='none';
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <center><h1 style='color:color: #800000;'>CRIME RECORD MANAGEMENT & ENQUIRY</h1></center><br><br><br><br><br><br><br><br><br><br>
            <div class="flex-container">
                <div class="flex-item">
                    
                        <center><legend>PUBLIC</legend></center>
                            <div class="container"id="login1">
                                <form method='post'>
                                    
                                        <h4>LOGIN</h4>
                                        <table>
                                            <tr><td><label for='email2'>Email</label></td><td><input type="text" name='email2' id='email2' required/></td></tr>
                                            <tr><td><label for='pass2'>Password</label></td><td><input type="password" name='pass2' id='pass2' required/></td></tr>
                                            <tr><td><a href="#" onclick='forgot1()'>forgot password</a></td><td><center><button type="submit" name='submit' value='s2'>LOGIN</button></center></td></tr>
                                            <tr><td colspan="2">If you not have an account<a href="#" onclick="signup()"> click here</a> to sign up</td></tr>     
                                        </table>
                                    
                                </form>
                            </div>
                            <div class="container"id="signup1" style="display:none;">
                                <form method="post" >
                                    
                                <h4>SIGN UP</h4>
                                        <table>
                                            <tr><td><label for="name1">Name</label></td><td><input type="text" name='name1' id="name1" required/></td></tr>
                                            <tr><td><label for="email1">Email</label></td><td><input type="text" name="email1" id="email1" required/></td></tr>
                                            <tr><td><label for="pass1">Password</label></td><td><input type="password"name='pass1' id="pass1" required/></td></tr>
                                            <tr><td><label for="phone1">Phone</label></td><td><input type="text"name='phone1' id="phone1" required/></td></tr>
                                            <tr><td></td><td><center><button type="submit" name='submit' value="s1">SIGNUP</button></center></td></tr>
                                            <tr><td></td><td></td></tr>
                                                <tr><td colspan="2">If you have an account<a href="#" onclick="login()">click here</a> to sign up</td></tr>     
                                        </table>
                                    
                                </form>
                            </div>
                                        <div class="email5" id='email5' style='display:none;' >
                                                    
                                                        <h4>FORGET PASSWORD</h4>
                                                        <form method='post'>
                                                            <table>
                                                                <tr>
                                                                    <td><label for="email5">Email</label></td>
                                                                    <td><input type="text" name="email5" id="email5" required/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><center><button type="submit" name="submit" value="s5" id='s5'>SEND OTP</button></center></td>

                                                                </tr>
                                                            </table>
                                                        </form>
                                            
                                        </div>
                                        <div class='rotp' id='rotp' style="display:none;">
                                        
                                        <h4>FORGET PASSWORD</h4>
                                                <form method='post'>
                                                <table>
                                                    <tr><td><label for="otp1">Enter OTP</label></td><td><input type="text"name='otp1' id="otp1" required/></td></tr>
                                                    <tr><td></td><td><center><button type="submit" name='submit' value="s6">VERIFY</button></center></td></tr></table>
                                                </form>
                                        
                                        </div>
                                        <div class='rpass' id='rpass' style="display:none;">
                                          
                                        <h4>FORGET PASSWORD</h4>
                                            <form method='post'>
                                            <table>
                                                <tr><td><label for="pass7" >Enter New Password</label></td><td><input type="password"name='pass7' id="pass7" required/></td></tr>
                                                <tr><td></td><td><center><button type="submit" name='submit' value="s7">MODIFY</button></center></td></tr>
                                                
                                            </table>
                                            </form >
                                        
                                        </div> 
                                        
                    
                </div>
                <div class="flex-item">
                    
                        <center><legend>JUNIOR OFFICER</legend></center>
                        <div id='j1'>
                            <form method='post'>
                                
                            <h4>LOGIN</h4>
                                    <table>
                                        <tr><td><label for='ofij'>Officer_id</label></td><td><input type="number" id='ofij' name='ofij'required/></td></tr>
                                        <tr><td><label for='pass3'>Password</label></td><td><input type="password"id='pass3' name='pass3' required/></td></tr>
                                        <tr><td><a href="#" onclick='junior1()'>forgot password</a></td><td><center><button type="submit" name='submit' value='s3'>LOGIN</button></center></td></tr>
                                    </table>       
                                
                            </form>
                        </div>
                        <div id='j2' style='display:none;'>
                            <form method='post'>
                                
                            <h4>FORGET PASSWORD</h4>
                                    <table>
                                        <tr><td><label for='ofij1'>Officer_id</label></td><td><input type="number" id='ofij1' name='ofij1'required/></td></tr>
                                        <tr><td></td><td><center><button type="submit" name='submit' value='s10'>SEND OTP</button></center></td></tr>
                                    </table>       
                                
                            </form>
                        </div>
                        <div id='j3' style='display:none;'>
                            <form method='post'>
                                
                                    <h4>FORGET PASSWORD</h4>
                                    <table>
                                        <tr><td><label for='otp1'>OTP</label></td><td><input type="number" id='otp1' name='otp1'required/></td></tr>
                                        <tr><td></td><td><center><button type="submit" name='submit' value='s11'>VERIFY</button></center></td></tr>
                                    </table>       
                                
                            </form>
                        </div>
                        <div id='j4' style='display:none;'>
                            <form method='post'>
                               
                                    <h4>FORGET PASSWORD</h4>
                                    <table>
                                        <tr><td><label for='pass12'>ENTER NEW PASSWORD</label></td><td><input type="password" id='pass12' name='pass12'required/></td></tr>
                                        <tr><td></td><td><center><button type="submit" name='submit' value='s12'>MODIFY</button></center></td></tr>
                                    </table>       
                               
                            </form>
                        </div>

                    
                </div>
                <div class="flex-item">
                    

                <center><legend>SENIOR OFFICER</legend></center>
                        <div id='s1'>
                            <form method='post'>
                                
                            <h4>LOGIN</h4>
                                    <table>
                                        <tr><td><label for='ofis'>Officer_id</label></td><td><input type="number"id='ofis' name='ofis' required/></td></tr>
                                        <tr><td><label for='pass4'>Password</label></td><td><input type="password" id='pass4' name='pass4'required/></td></tr>
                                        <tr><td><a href="#" onclick='senior1()'>forgot password</a></td><td><center><button type="submit" name='submit' value='s4'>LOGIN</button></center></td></tr>
                                    </table>
                                        
                                
                            </form>
                        </div>
                        <div id='s2' style='display:none;'>
                            <form method='post'>
                                
                                    <h4>FORGET PASSWORD</h4>
                                    <table>
                                        <tr><td><label for='ofis1'>Officer_id</label></td><td><input type="number" id='ofis1' name='ofis1'required/></td></tr>
                                        <tr><td></td><td><center><button type="submit" name='submit' value='s13'>SEND OTP</button></center></td></tr>
                                    </table>       
                                
                            </form>
                        </div>
                        <div id='s3'style='display:none;' >
                            <form method='post'>
                                
                                    <h4>FORGET PASSWORD</h4>
                                    <table>
                                        <tr><td><label for='otp2'>OTP</label></td><td><input type="number" id='otp2' name='otp2'required/></td></tr>
                                        <tr><td></td><td><center><button type="submit" name='submit' value='s14'>VERIFY</button></center></td></tr>
                                    </table>       
                                
                            </form>
                        </div>
                        <div id='s4' style='display:none;'>
                            <form method='post'>
                                    <h4>FORGET PASSWORD</h4>
                                    <table>
                                        <tr><td><label for='pass14'>ENTER NEW PASSWORD</label></td><td><input type="password" id='pass14' name='pass14'required/></td></tr>
                                        <tr><td></td><td><center><button type="submit" name='submit' value='s15'>MODIFY</button></center></td></tr>
                                    </table>       
                                
                            </form>
                        </div>
                    
                </div>

            </div>
        </div>
    </div>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  include 'assets/php/main.php'; 
?>

