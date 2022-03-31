<?php

include 'includes/config.php';
include 'includes/header.php';

?>

<div class="container">
<table>
  <tr>
    <th>User's Email</th>
    <th>Search History</th>
    <th>Timestamp</th>
  </tr>

<?php


// init if user logged in
if($_SESSION['user_id']) {
  $namapengguna = $_SESSION['username'];
  $user_id = $_SESSION['user_id'];
  $email = $_SESSION['email'];

  // if admin, query all
  if ($_SESSION['is_admin']) {
    $sql = "SELECT history_query, history_time, user_email FROM user_history";    
  } else {
    $sql = "SELECT history_query, history_time FROM user_history where user_id = ".$user_id;
  }

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if ($_SESSION['is_admin']) {
        echo "<tr>";
        echo "<td>";
        echo $row["user_email"];
        echo "</td>";
        echo "<td>";
        echo $row["history_query"];
        echo "</td>";
        echo "<td>";
        echo $row["history_time"];
        echo "</td>";
        echo "</tr>";
      } else { 
        
        echo "<tr>";
        echo "<td>";
        echo $row["history_query"];
        echo "</td>"; 
        echo "<td>"; 
        echo $row["history_time"];
        echo "</td>"; 
        echo "</tr>"; 
        // echo "</table>";
      }
    }
  } else {
    echo "<tr>";
    echo "<td>";
    echo "0 results";
    echo "</tr>";
    echo "</td>";
  }
  $conn->close();
} else {
  echo "You must login";
}
?> 
</div>
</table>

</body>
</html>