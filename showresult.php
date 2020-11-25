<?php 
if($_SERVER["REQUEST_METHOD"] == "POST" ) {
    
     
     if(strlen($_POST["bodytopic"]) < 6 || strlen($_POST["bodytopic"]) > 2000 ) {
          echo "the content of the topic should be in length of 6 to 2000 alphabets";
     }else{
          
          $body = $_POST["bodytopic"];
     }
}
function checkname(String $name) {
     //name of the topic validation
     if(strlen($name) > 140 || strlen($name) < 4  ){
          return  "the name of your topic should be 4 to 140 alphabets";
     }elseif($name == "HTML" || $name == "html" ){
          return  "the name of the topic should not be \"html\" or \"HTML\"";
     }else{
          return $name = $_POST["nametopic"];
     }//4-140 alphabets
}
?>

<h1> <?php echo $name ?>  </h1>
<h6> <?php echo $body ?> </h6>

<button><a href="index_intern.html">create new topic</button>