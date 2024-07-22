<?php
  ob_start(); // Start output buffering

  include 'connec.php';
  if(isset($_POST['submit']))  
  {
     if($_POST['submit']=='s1')
      {
        $s='SELECT MAX(public_id) AS max_public_id FROM login_public;';
        $k=$conn->query($s);
        $row=$k->fetch_assoc();
        $pid=$row['max_public_id']+1;

        $s='insert into login_public(name,email,password,phone,public_id) values("'.$_POST['name1'].'","'.$_POST['email1'].'","'.$_POST['pass1'].'","'.$_POST['phone1'].'",'.$pid.')';
        $conn->query($s);
     }
     else if($_POST['submit']=='s2')
     {
        $s='select * from login_public where email="'.$_POST['email2'].'"';
        $res=$conn->query($s);
        if($res->num_rows!=0)
        {
            $row=$res->fetch_assoc();
            if($_POST['pass2']==$row['password'])
            {
              $_SESSION['public1']=$_POST['email2'];
              echo '<script>window.location = "assets/php/public.php";</script>';
              exit;
            }
            else
            {
              echo '<script>alert("Incorrect password ");</script>';
            }
        }
        else
        {
          echo '<script>alert("NOT REGISTERED");</script>';
        }
     }
     else if($_POST['submit']=='s3')
     {
      $s='select * from login_junior where officer_id="'.$_POST['ofij'].'"';
      $res=$conn->query($s);
      if($res->num_rows!=0)
      {
          $row=$res->fetch_assoc();
          if($_POST['pass3']==$row['password'])
          {
            echo 'successfull';
            $_SESSION['ofj1']=$_POST['ofij'];
            echo '<script>window.location = "assets/php/junior.php";</script>';
            exit;
          }
          else
          {
            echo '<script>alert("Incorrect password ");</script>';
          }
      }
      else
      {
        echo '<script>alert("Incorrect ID ");</script>';
      }
     }
     else if($_POST['submit']=='s4')
     {
      $s='select * from login_senior where officer_id="'.$_POST['ofis'].'"';
      $res=$conn->query($s);
      if($res->num_rows!=0)
      {
          $row=$res->fetch_assoc();
          if($_POST['pass4']==$row['password'])
          {
            echo 'successfull';
            $_SESSION['ofs1']=$_POST['ofis'];
            
            echo '<script>window.location = "assets/php/senior.php";</script>';

            exit;
          }
          else
          {
            echo '<script>alert("Incorrect password ");</script>';
          }
      }
      else
      {
        echo '<script>alert("Incorrect ID ");</script>';
      }
    }  
    else if($_POST['submit']=='s5')
    {
      $_SESSION['email5']=$_POST['email5'];
       $s='select * from login_public where email="'.$_POST['email5'].'"';
       $res=$conn->query($s);
       if($res->num_rows!=0)
       {
           $row=$res->fetch_assoc();
           echo 'verified';
           echo '<script> let s=document.getElementById("rotp");s.style.display="block";</script>';
           echo '<script> let k=document.getElementById("email5");k.style.display="none";</script>';
           echo '<script> let k1=document.getElementById("login1");k1.style.display="none";</script>';
           echo '<script> let k2=document.getElementById("rpass");k2.style.display="none";</script>';
           
       }
       else
       {
        
        echo '<script>alert("Not registered");</script>';
       }
    }
    else if($_POST['submit']=='s6')
    {
           echo '<script> s=document.getElementById("rotp");s.style.display="none";</script>';
           echo '<script> k1=document.getElementById("login1");k1.style.display="none";</script>';
           echo '<script>  k2=document.getElementById("rpass");k2.style.display="block";</script>';
    }
    else if($_POST['submit']=='s7')
    {
      $s='update login_public set password="'.$_POST['pass7'].'" where email="'.$_SESSION['email5'].'"';
      $conn->query($s);
    }
    else if($_POST['submit']=='s10')
    {
      $s='select * from login_junior where officer_id="'.$_POST['ofij1'].'"';
      $res=$conn->query($s);
      if($res->num_rows!=0)
      {
          echo 'successfull';
          $_SESSION['ofj1']=$_POST['ofij1'];
          echo "<script>
          let k3=document.getElementById('j2');
          k3.style.display='none';
           k3=document.getElementById('j1');
          k3.style.display='none';
          let s4=document.getElementById('j3');
          s4.style.display='block';</script>";
          
      }
      else
      {
        echo 'invalid id';
      }
    }
    else if($_POST['submit']=='s11')
    {
      echo "<script>
      let k4=document.getElementById('j3');
      k4.style.display='none';
      k4=document.getElementById('j1');
     k4.style.display='none';
     k4=document.getElementById('j2');
    k4.style.display='none';
       let s5=document.getElementById('j4');
      s5.style.display='block';</script>";
    }
    else if($_POST['submit']=='s12')
    {
      $s='update login_junior set password="'.$_POST['pass12'].'" where officer_id="'.$_SESSION['ofj1'].'"';
      $conn->query($s);
    }
    else if($_POST['submit']=='s13')
    {
      $s='select * from login_senior where officer_id="'.$_POST['ofis1'].'"';
      $res=$conn->query($s);
      if($res->num_rows!=0)
      {
          echo 'successfull';
          $_SESSION['ofs1']=$_POST['ofis1'];
          echo "<script>
          let k3=document.getElementById('s2');
          k3.style.display='none';
           k3=document.getElementById('s1');
          k3.style.display='none';
          let s4=document.getElementById('s3');
          s4.style.display='block';</script>";
          
      }
      else
      {
        echo 'invalid id';
      }
    }
    else if($_POST['submit']=='s14')
    {
      echo "<script>
      let k4=document.getElementById('s3');
      k4.style.display='none';
      k4=document.getElementById('s1');
     k4.style.display='none';
     k4=document.getElementById('s2');
    k4.style.display='none';
       let s5=document.getElementById('s4');
      s5.style.display='block';</script>";
    }
    else if($_POST['submit']=='s15')
    {
      $s='update login_senior set password="'.$_POST['pass14'].'" where officer_id="'.$_SESSION['ofs1'].'"';
      echo $s;
      $conn->query($s);
    }
  }
?>