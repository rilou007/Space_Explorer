<?php


require_once('class.translation.php');
session_start();
//if(isset($_GET['lang']))
  //  $_SESSION['lang'] = $_GET['lang'];
//if(isset($_GET['lang']))
if(isset($_SESSION['lang']))
{
    //echo "DEbug";
	//$translate = new Translator($_GET['lang']);
	$t = new Translator($_SESSION['lang']);
}
else
	$t = new Translator('en');
?>

<form>
    <p>
    
    <?php echo $t->__("Last name"); ?><input type="text" name="lastname"> </input>
    </p>
    <p>
    <?php echo $t->__("First name"); ?><input type="text" name="firtname"> </input>
    </p>
    <p>
    <?php echo $t->__("Gender") ?>
    <select>
        <option value=1>
            <?php echo $t->__("Male");  ?>
        </option>
        
        <option value=2>
            <?php echo $t->__("Female");  ?>
        </option>
        
    </select>
    </p>
    <p>
        <button>
            
        </button>
    </p>
</form>

