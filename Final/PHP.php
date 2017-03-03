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
   DELETE TABLE techForm7(
      DROP TABLE techForm7;
   );
AHH;
   $ret=pg_query($deleter);
   */
   
  $creator = <<<CREATE
   CREATE TABLE IF NOT EXISTS techForm7( fname varchar(255), lname varchar(255), email varchar(255), grade varchar(255), officer varchar(255), clubname varchar(255), subject varchar(255), APchemistry varchar(255), APbiology varchar(255), APphysics varchar(255), APCS varchar(255), shift1 varchar(255), shift2 varchar(255), shift3 varchar(255));
CREATE;
   $ret=pg_query($creator);

   $a=$_POST[fname].'';
   $b=$_POST[lname].'';
   $c=$_POST[email].'';
   $d=$_POST[grade].'';
   $e=$_POST[officer].'';
   $f=$_POST[clubname].'';
   $g=$_POST[subject].'';
   $h=$_POST[APchemistry].'';
   $i=$_POST[APbiology].'';
   $j=$_POST[APphysics].'';
   $k=$_POST[APCS].'';
   $l=$_POST[shift1].'';
   $m=$_POST[shift2].'';
   $n=$_POST[shift3].'';

//echo($a.$b.$c.$d.$e.$f.$g.$h.$i);
  $sql =<<<EOF
      INSERT INTO techForm7 (fname, lname, email, grade, officer, clubname, subject, APchemistry, APbiology, APphysics, APCS, shift1, shift2, shift3)
      VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n');
EOF;
   $ret = pg_query($db, $sql);


 $sql =<<<EOF
      SELECT * from techForm7;
EOF;

$ret = pg_query($db, $sql);
$total=0;
echo "<label style='font-size:50px; font-style:bold;text-align:center;'>All Volunteers</label>";
   echo "<table id='all' style='width:100%;border: solid black 1px;'>
      <tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Grade</th><th>Officer</th><th>Club Name</th><th>Subject</th><th>AP Chemistry</th><th>AP Biology</th><th>AP Physics</th><th>APCS</th><th>Shift 1</th><th>Shift 2</th><th>Shift 3</th></tr>";
   while($row = pg_fetch_row($ret)){
      //echo($row);
      echo "<tr><td> ". $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4]. "</td><td>" . $row[5]. "</td><td>" . $row[6]. "</td><td>" . $row[7]. "</td><td>" . $row[8]. "</td><td>" . $row[9]. "</td><td>" . $row[10]. "</td><td>" . $row[11]. "</td><td>" . $row[12]. "</td><td>" . $row[13] . "</td> </tr>";
      $total=$total+1;
   }
   echo"</table>";
   echo"<label>Total: </label><label id='total'>".$total."</label>";

   pg_close($db); ?>

   <br><br><br>
   <label class="shiftname">Shift 1</label>
   <table id="shift1" style="width:100%;border: solid black 1px;"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Grade</th><th>Officer</th><th>Club Name</th><th>Subject</th><th>AP Chemistry</th><th>AP Biology</th><th>AP Physics</th><th>APCS</th><th>Shift 1</th><th>Shift 2</th><th>Shift 3</th></tr></table>
   <label>Total: </label> <label id="shift1total">0</label>
   <br><br><label class="shiftname">Shift 2</label>
   <table id="shift2"style="width:100%;border: solid black 1px;"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Grade</th><th>Officer</th><th>Club Name</th><th>Subject</th><th>AP Chemistry</th><th>AP Biology</th><th>AP Physics</th><th>APCS</th><th>Shift 1</th><th>Shift 2</th><th>Shift 3</th></tr></table>
   <label>Total: </label> <label id="shift2total">0</label>
   <br><br><label class="shiftname">Shift 3</label>
   <table id="shift3"style="width:100%;border: solid black 1px;"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Grade</th><th>Officer</th><th>Club Name</th><th>Subject</th><th>AP Chemistry</th><th>AP Biology</th><th>AP Physics</th><th>APCS</th><th>Shift 1</th><th>Shift 2</th><th>Shift 3</th></tr></table>
   <label>Total: </label> <label id="shift3total">0</label>
   
   <script type="text/javascript">
 var t=document.getElementById("total").innerHTML;
 var to=parseInt(t,10);

   for(var r=1;r<=to; r++){
      var onelength=parseInt(document.getElementById("shift1total").innerHTML);
      var twolength=parseInt(document.getElementById("shift2total").innerHTML);
      var threelength=parseInt(document.getElementById("shift3total").innerHTML);

      if(document.getElementById("all").rows[r].cells[11].innerHTML=="yes"){shiftonesort(r);}
      if(document.getElementById("all").rows[r].cells[12].innerHTML=="yes"){shifttwosort(r);}
      if(document.getElementById("all").rows[r].cells[13].innerHTML=="yes"){shiftthreesort(r);}
   }




    function shiftonesort(r){
      var table = document.getElementById("shift1");
          var row; var a=0;
          if(document.getElementById("all").rows[r].cells[4].innerHTML=="yes"){
            row=table.insertRow(1);}
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="10"){
            a=sophomore("shift1");
            row=table.insertRow(a);
         }
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="11"){
            a=junior("shift1");
            row=table.insertRow(a);
         }
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="12"){
            a=senior("shift1");
            row=table.insertRow(a);
         }
          else{
            row = table.insertRow(onelength+1);}
          insert(r, row);
          document.getElementById("shift1total").innerHTML=onelength+1+"";
    }  
    function shifttwosort(r){
      var table = document.getElementById("shift2");
          var row; var a=0;
          if(document.getElementById("all").rows[r].cells[4].innerHTML=="yes"){
            row=table.insertRow(1);}
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="10"){
            a=sophomore("shift2");
            row=table.insertRow(a);
         }
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="11"){
            a=junior("shift2");
            row=table.insertRow(a);
         }
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="12"){
            a=senior("shift2");
            row=table.insertRow(a);
         }
          else{
            row = table.insertRow(twolength+1);}
          insert(r, row);

         document.getElementById("shift2total").innerHTML=twolength+1+"";
    }
   function shiftthreesort(r){
      var table = document.getElementById("shift3");
          var row; var a=0;
          if(document.getElementById("all").rows[r].cells[4].innerHTML=="yes"){
            row=table.insertRow(1);}
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="10"){
            a=sophomore("shift3");
            row=table.insertRow(a);
         }
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="11"){
            a=junior("shift3");
            row=table.insertRow(a);
         }
         else if(document.getElementById("all").rows[r].cells[3].innerHTML=="12"){
            a=senior("shift3");
            row=table.insertRow(a);
         }
          else{
            row = table.insertRow(threelength+1);}
         insert(r, row);

         document.getElementById("shift3total").innerHTML=threelength+1+"";
   }

   function sophomore(id){
      var max=-1;
      if(id=="shift1") max=onelength;
      if(id=="shift2") max=twolength;
      if(id=="shift3") max=threelength;
      if(max==0){return 1;}
      else{
         for(var i=1; i<=max; i++){
            if(document.getElementById(id).rows[i].cells[4].innerHTML=="no"){
            if(document.getElementById(id).rows[i].cells[3].innerHTML=="9")
               return i;
         }
      }
         return max+1;
      }
   }

   function junior(id){
      var max=-1;
      if(id=="shift1") max=onelength;
      if(id=="shift2") max=twolength;
      if(id=="shift3") max=threelength;
      if(max==0){return 1;}
      else{
         for(var i=1; i<=max; i++){
            if(document.getElementById(id).rows[i].cells[4].innerHTML=="no"){
            if(document.getElementById(id).rows[i].cells[3].innerHTML=="9"||document.getElementById(id).rows[i].cells[3].innerHTML=="10")
               return i;
         }
      }
         return max+1;
      }
   }

   function senior(id){
      var max=-1;
      if(id=="shift1") max=onelength;
      if(id=="shift2") max=twolength;
      if(id=="shift3") max=threelength;
      if(max==0){return 1;}
      else{
         for(var i=1; i<=max; i++){
            if(document.getElementById(id).rows[i].cells[4].innerHTML=="no"){
            if(document.getElementById(id).rows[i].cells[3].innerHTML=="9"||document.getElementById(id).rows[i].cells[3].innerHTML=="10"||document.getElementById(id).rows[i].cells[3].innerHTML=="11")
               return i;
         }
      }
         return max+1;
      }
   }

   function insert(r, row){
          var cell1 = row.insertCell(0); var cell2 = row.insertCell(1); var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3); var cell5 = row.insertCell(4); var cell6 = row.insertCell(5); 
          var cell7 = row.insertCell(6); var cell8 = row.insertCell(7); var cell9 = row.insertCell(8);
          var cell10 = row.insertCell(9); var cell11 = row.insertCell(10); var cell12 = row.insertCell(11); 
          var cell13 = row.insertCell(12); var cell14 = row.insertCell(13); 

          cell1.innerHTML = document.getElementById("all").rows[r].cells[0].innerHTML;
          cell2.innerHTML = document.getElementById("all").rows[r].cells[1].innerHTML;
          cell3.innerHTML = document.getElementById("all").rows[r].cells[2].innerHTML;
          cell4.innerHTML = document.getElementById("all").rows[r].cells[3].innerHTML;
          cell5.innerHTML = document.getElementById("all").rows[r].cells[4].innerHTML;
          cell6.innerHTML = document.getElementById("all").rows[r].cells[5].innerHTML;
          cell7.innerHTML = document.getElementById("all").rows[r].cells[6].innerHTML;
          cell8.innerHTML = document.getElementById("all").rows[r].cells[7].innerHTML;
          cell9.innerHTML = document.getElementById("all").rows[r].cells[8].innerHTML;
          cell10.innerHTML = document.getElementById("all").rows[r].cells[9].innerHTML;
          cell11.innerHTML = document.getElementById("all").rows[r].cells[10].innerHTML;
          cell12.innerHTML = document.getElementById("all").rows[r].cells[11].innerHTML;
          cell13.innerHTML = document.getElementById("all").rows[r].cells[12].innerHTML;
          cell14.innerHTML = document.getElementById("all").rows[r].cells[13].innerHTML;
   }
   </script>
   </body>
</html>




