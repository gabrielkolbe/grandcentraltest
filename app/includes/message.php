<?php 

if( isset($_SESSION['error']) ) { ?>
<style>
.error {
    color: white;
    font-size: 24px;
    border: 1px solid red;
    background-color: red;
    font-weight: bold;
    padding-top:5px;
    padding-left:10px;
}

#errodiv {
    position: relative;
}

</style>

  <section class="error" id="errodiv" onclick="hideMessage()"><?php echo $_SESSION['error']; unset($_SESSION["error"]);  ?><span style="float:right; padding-right:5px; padding-bottom:5px;">X</span></section>

<?php } else {

if( isset($_SESSION['message']) ) { ?>
<style>
.message {
    color: white;
    font-size: 24px;
    border: 1px solid green;
    background-color: green;
    font-weight: bold;
    padding-top:5px;
    padding-left:10px;
}

#messagediv {
    position: relative;
}

</style>

<section class="message" id="messagediv" onclick="hideMessage()"><?php  echo $_SESSION['message']; unset($_SESSION["message"]);  ?><span style="float:right; padding-right:5px; padding-bottom:5px;">X</span></section>

<?php } 
} 


if (defined('MESSAGE')) {?>
<style>
.message {
    color: white;
    font-size: 24px;
    border: 1px solid green;
    background-color: green;
    font-weight: bold;
    padding-top:5px;
    padding-left:10px;
}

#messagediv {
    position: relative;
}

</style>

<section class="message" id="messagediv" onclick="hideMessage()"><?php  echo MESSAGE; ?><span style="float:right; padding-right:5px; padding-bottom:5px;">X</span></section>

<?php } ?>



<script>
function hideMessage() {
  var x = document.getElementById("messagediv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>  