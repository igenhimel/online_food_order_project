<?php

require_once('userpanel.php');
require_once('database.php');

?>

<?php


?>


<?php

       if(isset($_SESSION['order'])){
           echo "<div class='marks'>";
           echo "<img src='image/background/success.png' width='150px'>";
           echo "<p style='text-align:center;color:green; margin-left:20px; font-size:30px'>";
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
            echo "</p>";
           echo "</div>";


                }

                else{
                    "";
                }


?>
