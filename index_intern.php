<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
.topicname {color: green;}
.content {color: greenyellow;}
.result {
     display: flex;
     align-items: center;
     flex-direction: column;
     border-style: solid ;
     margin: 15%;
}
body {
     position: relative;
}
.kratooh { 
     display: flex;
     justify-content: center;
     align-items: center;
     
}

</style>
<header>
  <h1 id="newtopic"> New Thread </header>
<body>
<?php 
     $result = "";
     $bodytopic = "";
     $errmsghead= $errmsgbody = "";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
     //name of the topic validation
          if(strlen($_POST["nametopic"]) > 140 || strlen($_POST["nametopic"]) < 4  ){
               $errmsghead = "the name of your topic should be 4 to 140 alphabets";
          }else{
               if(checkhtml($_POST["nametopic"]) == True |
                    (strcmp($_POST["nametopic"], "HTML") == 0 ||
                    strcmp($_POST["nametopic"], "html") == 0 ) ){
                    $errmsghead = "the name of the topic should not be html or HTML";
               }else{
                    $result =  $_POST["nametopic"]; 
               }
          }
     //4-140 alphabets
    
          if(strlen($_POST["bodytopic"]) < 6 || strlen($_POST["bodytopic"]) > 2000 ){
               $errmsgbody = "the content of the topic should be in length of 6 to 2000 alphabets";
          }else{
               $bodytopic = $_POST["bodytopic"];
          } 
     }
function checkhtml($name) {
     for($i = 0; $i < strlen($name); $i++){
          if($name[$i] == "H" & $i+3 < strlen($name) ) {
               if($name[$i+1] == "T" & $name[$i+2] == "M" & $name[$i+3] == "L"  ) return False;
               return True;
          }
     }
}

?>
<div class="kratooh">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
    <h2 class="topicname"> Topic: </h2> <br>
     <input type="text" name="nametopic" />
    <span class="error">* <?php echo $errmsghead;?></span>
    <br>
    <h2 class="content"> Content: </h2> <br>
    <input type="text" name="bodytopic"/>
    <span class="error">* <?php echo $errmsgbody;?></span><br><br>
    <botton><input type="submit" name="submit"></botton>
  </form>
</div>
<?php 
echo "<div class=\"result\" ><h2 class=\"topicname\">";
echo $result;
echo "</h2><p class=\"content\">";
echo $bodytopic;
echo "</p></div>"
?>
</body>

</html>
