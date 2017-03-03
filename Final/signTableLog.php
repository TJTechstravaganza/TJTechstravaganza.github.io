<html>
	<body>
   <link rel="stylesheet" type="text/css" href="tablestyle.css">
	<?php 
	//instantiate our DB object
	$host="host=ec2-174-129-223-35.compute-1.amazonaws.com";
	$dbname="dbname=dbc4des0qg20b0";
	$user="user=zvtiytfbharlwe";
	$port="port=5432";
	$password="password=a3drTamUBh5-W9FdFAJ0TVVFm-";
	$db=pg_connect($host." ".$dbname." ".$user." ".$port." ".$password);
 
 /*  $deleter = <<<AHH
   DELETE TABLE signLog4(
      DROP TABLE signLog4;
   );
AHH;
   $ret=pg_query($deleter);
   */
   
  $creator = <<<CREATE
   CREATE TABLE IF NOT EXISTS signLog4(fname varchar(255), lname varchar(255), grade varchar(255), sign varchar(255), volunteer varchar(255), time varchar(255));
CREATE;
   $ret=pg_query($creator);

   $a=$_POST[fname].'';
   $b=$_POST[lname].'';
   $c=$_POST[grade].'';
   $d=$_POST[sign].'';
   $e=$_POST[volunteer].'';
   $f=$_POST[time].'';

//echo($a.$b.$c.$d.$e.$f);
  $sql =<<<EOF
      INSERT INTO signLog4 (fname, lname, grade, sign, volunteer, time)
      VALUES ('$a', '$b', '$c', '$d', '$e', '$f');
EOF;
   $ret = pg_query($db, $sql);


 $sql =<<<EOF
      SELECT * from signLog4;
EOF;

$ret = pg_query($db, $sql);
$total=0;
echo "<label style='font-size:30px; font-style:bold;text-align:center;'>All Volunteers</label>";
   echo "<table id='all' style='width:100%;border: solid black 1px;'>
      <tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In or Out</th><th>Reason</th><th>Time</th></tr>";
   while($row = pg_fetch_row($ret)){
      //echo($row);
      echo "<tr><td> ". $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4]. "</td><td>" . $row[5]."</td> </tr>";
      $total=$total+1;
   }
   echo"</table>";
   echo"<label>Total: </label><label id='total'>".$total."</label>";

   pg_close($db); ?>

   <br><br><br>
   <label style="font-size:30px; font-style:bold;text-align:center;">All Calculated Times</label>
   <table id="calculated" style="width:100%;border: solid black 1px;">
   	<tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In Time</th><th>Out Time</th><th>Time(Hours)</th><th>Reason</th></tr></table>
   	<label>Total:</label><label id="calcTotal">0</label>

       <br><br><br>
   <label style="font-size:30px; font-style:bold;text-align:center;">Taylor Honors Chemistry Extra Credit</label>
   <table id="hchem" style="width:100%;border: solid black 1px;">
    <tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In Time</th><th>Out Time</th><th>Time(Hours)</th><th>Reason</th></tr></table>
    <label>Total:</label><label id="hchemTotal">0</label>

       <br><br><br>
   <label style="font-size:30px; font-style:bold;text-align:center;">Taylor AP Chemistry Extra Credit</label>
   <table id="apchem" style="width:100%;border: solid black 1px;">
    <tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In Time</th><th>Out Time</th><th>Time(Hours)</th><th>Reason</th></tr></table>
    <label>Total:</label><label id="apchemTotal">0</label>

       <br><br><br>
   <label style="font-size:30px; font-style:bold;text-align:center;">NHS Hours</label>
   <table id="nhs" style="width:100%;border: solid black 1px;">
    <tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In Time</th><th>Out Time</th><th>Time(Hours)</th><th>Reason</th></tr></table>
    <label>Total:</label><label id="nhsTotal">0</label>

       <br><br><br>
   <label style="font-size:30px; font-style:bold;text-align:center;">General Community Service</label>
   <table id="comm" style="width:100%;border: solid black 1px;">
    <tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In Time</th><th>Out Time</th><th>Time(Hours)</th><th>Reason</th></tr></table>
    <label>Total:</label><label id="commTotal">0</label>

       <br><br><br>
   <label style="font-size:30px; font-style:bold;text-align:center;">Nice People</label>
   <table id="nice" style="width:100%;border: solid black 1px;">
    <tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>In Time</th><th>Out Time</th><th>Time(Hours)</th><th>Reason</th></tr></table>
    <label>Total:</label><label id="niceTotal">0</label>

   <script type="text/javascript">
 var t=document.getElementById("total").innerHTML;
 var to=parseInt(t,10);
 var c=document.getElementById("calcTotal").innerHTML;
 var calc=parseInt(c, 10);

 for(var r=1; r<=to; r++){ //scan through all rows in the all table
      if(document.getElementById("all").rows[r].cells[3].innerHTML=="out"){
      	var a=find(r);
        if(a>0){
          insert(a, r);
          calc++;
        }
      }
    }
    document.getElementById("calcTotal").innerHTML=(calc+"");

  for(var r=1; r<=calc; r++){
    var str=document.getElementById("calculated").rows[r].cells[6].innerHTML;
    if(str=="none"){insertion(r, "nice");}
    else if(str=="hchemistry"){insertion(r,"hchem");}
    else if(str=="apchemistry"){insertion(r,"apchem");}
    else if(str=="NHS"){insertion(r,"nhs");}
    else if(str=="genhours"){insertion(r,"comm");}
  }
function insertion(r, str){
var table=document.getElementById(str+"");
var index=parseInt(document.getElementById(str+"Total").innerHTML,10)+1;
console.log(index+"");
document.getElementById(str+"Total").innerHTML=index;
var row=table.insertRow(index);

var cell1 = row.insertCell(0); var cell2 = row.insertCell(1); var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3); var cell5 = row.insertCell(4); var cell6 = row.insertCell(5); var cell7 = row.insertCell(6); 

             cell1.innerHTML = document.getElementById("calculated").rows[r].cells[0].innerHTML;
          cell2.innerHTML = document.getElementById("calculated").rows[r].cells[1].innerHTML;
          cell3.innerHTML = document.getElementById("calculated").rows[r].cells[2].innerHTML;
          cell4.innerHTML = document.getElementById("calculated").rows[r].cells[3].innerHTML;
          cell5.innerHTML = document.getElementById("calculated").rows[r].cells[4].innerHTML;
          cell6.innerHTML = document.getElementById("calculated").rows[r].cells[5].innerHTML;
          cell7.innerHTML = document.getElementById("calculated").rows[r].cells[6].innerHTML;
}












 function find(r){
 	var fname=document.getElementById("all").rows[r].cells[0].innerHTML;
 	var lname=document.getElementById("all").rows[r].cells[1].innerHTML;
 	var grade=document.getElementById("all").rows[r].cells[2].innerHTML;

 	for(var i=1; i<r; i++){
 		if(document.getElementById("all").rows[i].cells[3].innerHTML=="in"&&document.getElementById("all").rows[i].cells[0].innerHTML==fname&&document.getElementById("all").rows[i].cells[1].innerHTML==lname&&document.getElementById("all").rows[i].cells[2].innerHTML==grade){// check if they are signing in
 		   document.getElementById("calcTotal").innerHTML=calc+1;
       return i;
    }
 	}
  return -1;
 }

function insert(start, stop){
   var table = document.getElementById("calculated");
   var row=table.insertRow(calc+1);
   var cell1 = row.insertCell(0); var cell2 = row.insertCell(1); var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3); var cell5 = row.insertCell(4); var cell6 = row.insertCell(5); var cell7 = row.insertCell(6); 

   var startTime=document.getElementById("all").rows[start].cells[5].innerHTML+"";
   var stopTime=document.getElementById("all").rows[stop].cells[5].innerHTML+"";
   var totalTime=calcTime(startTime, stopTime)+"";
   totalTime=totalTime.slice(0, totalTime.indexOf(".")+3);

   cell1.innerHTML = document.getElementById("all").rows[start].cells[0].innerHTML; //first name
   cell2.innerHTML = document.getElementById("all").rows[start].cells[1].innerHTML; //last name
   cell3.innerHTML = document.getElementById("all").rows[start].cells[2].innerHTML; //grade
   cell4.innerHTML = startTime+""; //sign in time
   cell5.innerHTML = stopTime+""; //sign out time
   cell6.innerHTML = totalTime+"";
   cell7.innerHTML = document.getElementById("all").rows[start].cells[4].innerHTML; //reason
   }

   function calcTime(start, end){
    var shour=start.slice(0,2);
    var smin=start.slice(3,5);

    var ehour=end.slice(0,2);
    var emin=end.slice(3,5);

    //console.log(shour+":"+smin);
    //console.log(ehour+":"+emin);

    var hours=ehour-shour;
    var mins=(emin-smin)/60;
    //console.log("hours: "+hours);
    //console.log("minutes: "+mins);
    var total=hours+mins;
    if(total<=0)
      return -1;
    return total;
   }
   </script>
   </body>
</html>




