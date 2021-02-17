
<html>
<style>
.button {
  border: 2px solid black;
  background-color: white;
  color: black;
  
  font-size: 16px;
  cursor: pointer;
}

  .button4{border-color: #f44336;
  color: red;}
  .button4:hover {
  background: #f44336;
  color: white;
}


  </style>
  
<form action="" method="POST">
  
   <input placeholder = "Enter student's name" type="text" name="names" id="names">
   <input class="button button4" type="Submit" value="Submit" name="submit_btn">

</form>

</html>

<?php
//connection establish

$servername = "localhost";
$dBUsername = "root";
$dBPassword ="";
$dBname = "krishworks";

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBname);
if(!$conn){
	die("sorry, connection failed!  ".mysqli_connect_error());
}
$search_id = $_POST['names'];

if (isset($_REQUEST['submit_btn'])) {
$result = mysqli_query($conn,"SELECT student_name, phone_number, subject1_marks, subject2_marks, subject3_marks, subject4_marks, subject5_marks, total,email FROM student where student_name= '$search_id'");


if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td>Student Name</td>
    <td>Phone Number</td>
    
    <td>Subject 1 Marks</td>
    <td>Subject 2 Marks</td>
    <td>Subject 3 Marks</td>
    <td>Subject 4 Marks</td>
    <td>Subject 5 Marks</td>
    <td>Total</td>
    <td>Email</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["student_name"]; ?></td>
    <td><?php echo $row["phone_number"]; ?></td>
    
    <td><?php echo $row["subject1_marks"]; ?></td>
    <td><?php echo $row["subject2_marks"]; ?></td>
    <td><?php echo $row["subject3_marks"]; ?></td>
    <td><?php echo $row["subject4_marks"]; ?></td>
    <td><?php echo $row["subject5_marks"]; ?></td>
    <td><?php echo $row["total"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
}
?>

