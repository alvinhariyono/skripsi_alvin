<p>Welcome to transaksi</p>


<a href="../index.php?logout=true">Logout</a>
<?php
session_start();

echo "session " . $_SESSION['user_login'];
echo "<br>";
echo "Variable outside the function: " . $_SESSION['user_login'];


?>