
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if (empty($_POST['ORN']))
   {
   $ORN_Error = "Please Enter Order Number";
   }
   else
   {
     $ORN=$_POST['ORN'];




$conn=odbc_connect('rmBill','sa','SC@rf61EALp@435');
if (!$conn)
  {exit("Connection Failed: " . $conn);}
$sql="SELECT Billing_Master.Transaction_DateTime, Billing_Master.RC_NO, Tbl_Users.Emp_Name, Terminals.Terminal_Name, Terminals.Terminal_IPAddress
FROM (Billing_Master INNER JOIN Terminals ON Billing_Master.Terminal_ID = Terminals.Terminal_ID) INNER JOIN Tbl_Users ON Billing_Master.Billed_By = Tbl_Users.Emp_ID
 where RC_NO='".$ORN."' ";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
  

echo " <table border ='1' width='100%' height='30%' align='center'><tr> " ;
echo "<th>Date</th>";
echo "<th>Bill Number</th>";
echo "<th>Employee Name</th>";
echo "<th>Terminal Name</th>";
echo "<th>Terminal IP</th>";

while (odbc_fetch_row($rs))
{
  $ordate=odbc_result($rs,"Transaction_DateTime");
  $ORDNUM=odbc_result($rs,"RC_NO");
    $CUST=odbc_result($rs,"Emp_Name");
     $ITEM=odbc_result($rs,"Terminal_Name");
      $PCS=odbc_result($rs,"Terminal_IPAddress");

  echo "<tr><td>$ordate</td>";
  echo "<td>$ORDNUM</td>";
  echo "<td>$CUST</td>";
  echo "<td>$ITEM</td>";
  echo "<td>$PCS</td>";

}
odbc_close($conn);
echo "</table>";

  include 'orddetails.php';
       exit();
   
   
   }
}

?>


<html>
<title> RAJAMAHAL FANCY JEWELLERS </title>
<body style="background-color:powderblue;" zoom=60%>
  <h1> Welcome to Bill data ... </h1>   <br>
   <h2>This Service available on server timings </h2>
   <br>
  
<form action="" method="post">
<h1>Enter Bill Number: <input type="text" style=" height:50px; width:200px; font-size:24: font-weight:30" name="ORN" required></h1><br>
<span><?php if(isset($ORN_Error)) echo $ORN_Error;?></span>
<input type="submit" value="Check Status" style=" height:50px; width:200px; font-size:24; font-weight:30">  <br>
</form>
 Sponsered by<br>
 <img src="logo.jpg" height="20%" width="80%">
</body>
<h3> Developed By RMK Tech Services, 7813-99-88-33, Ballari-ka</h3>
</html>
