
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




$conn=odbc_connect('RMK','','');
if (!$conn)
  {exit("Connection Failed: " . $conn);}
$sql="SELECT * FROM Qry_Online where ORD_NUM='".$ORN."' ";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
  

echo " <table border ='1' width='100%' height='30%' align='center'><tr> " ;
echo "<th>Order Date</th>";
echo "<th>Order Number</th>";
echo "<th>Customer Name</th>";
echo "<th>Item Name</th>";
echo "<th>Pieces</th>";
echo "<th>Weight</th>";
echo "<th>Size</th>";
echo "<th>Purity</th>";
echo "<th>Status</th></tr> ";
while (odbc_fetch_row($rs))
{
  $ordate=odbc_result($rs,"ORD_DATE");
  $ORDNUM=odbc_result($rs,"ORD_NUM");
    $CUST=odbc_result($rs,"CUSTOMER");
     $ITEM=odbc_result($rs,"ITEM");
      $PCS=odbc_result($rs,"PCS");
       $WT=odbc_result($rs,"WEIGHT");
        $SZ=odbc_result($rs,"SIZE");
         $PUR=odbc_result($rs,"PURITY");
          $STTS=odbc_result($rs,"STATUS1");
  echo "<tr><td>$ordate</td>";
  echo "<td>$ORDNUM</td>";
  echo "<td>$CUST</td>";
  echo "<td>$ITEM</td>";
  echo "<td>$PCS</td>";
  echo "<td>$WT</td>";
  echo "<td>$SZ</td>";
  echo "<td>$PUR</td>";
  echo "<td>$STTS</td></tr>";
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
  <h1> Welcome to Online Status Of Orders Given </h1>   <br>
   <h2>This Service available from 11:00AM to 7:30PM </h2>
   <br>
  
<form action="" method="post">
<h1>Enter Order Number: <input type="text" style=" height:50px; width:200px; font-size:24: font-weight:30" name="ORN" required></h1><br>
<span><?php if(isset($ORN_Error)) echo $ORN_Error;?></span>
<input type="submit" value="Check Status" style=" height:50px; width:200px; font-size:24; font-weight:30">  <br>
</form>
 Sponsered by<br>
 <img src="logo.jpg" height="20%" width="80%">
</body>
<h3> Developed By RMK Tech Services, 7813-99-88-33, Ballari-ka</h3>
</html>
