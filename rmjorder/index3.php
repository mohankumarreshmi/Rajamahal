<?php


$conn=odbc_connect('RMK','','');
if (!$conn)
  {exit("Connection Failed: " . $conn);}
$sql="SELECT * FROM Qry_Online where ORD_NUM='".$ORN."' ";
$rs=odbc_exec($conn,$sql);
if (!$rs)
  {exit("Error in SQL");}
echo "<table border="3" style="width: 100%; height: 100%" ><tr>"  ;
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
          $STTS=odbc_result($rs,"STATUS");
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

?>


