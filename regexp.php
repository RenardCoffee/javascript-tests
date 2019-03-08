<!DOCTYPE html>
<html>
<body>

<p>Click the button to diferenciate from a Variable and a Number!!</p>
  <?php
$filename = 'regexp.txt';
$eachlines = file($filename, FILE_IGNORE_NEW_LINES);//create an array
echo '<select name="value" id="value">';
foreach($eachlines as $lines){
    echo "<option>{$lines}</option>";
}
echo '</select>';
  ?>
<button onclick="isVariable()">What iam?</button>

<p id="res"></p>
<script>
document.getElementById('file').onchange = function(){
  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function(progressEvent){
    // Entire file
    //document.getElementById("myTextarea").value = this.result;
    //console.log(this.result);
    // By lines
    var lines = this.result.split('\n');
    for(var line = 0; line < lines.length; line++){
      console.log(lines[line]);

    }
  };
  reader.readAsText(file);
};

function isVariable() {
  var str = document.getElementById("value").value;
  //var strUser = e.options[e.selectedIndex].value;
  //var str = document.getElementById("myTextarea").value;
  var patt1 = /^[0-9]+$/;
  var patt2 = /^[a-zA-Z]+([a-zA-Z]+|[0-9]+)*$/;
  var patt3 = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var patt4 = /^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
  if (str.match(patt2))
  {
  	var result = "Im a Variable!";
  }else if (str.match(patt1))
  {
  	var result = "Im a Number!";
  }else if (str.match(patt3))
  {
  	var result = "Im a email!";
  }else if (str.match(patt4))
  {
  	var result = "Im a URL!";
  }else
  {
  	var result = "Not valid";
  }
  document.getElementById("res").innerHTML = result;
  console.log(result);
}
</script>

</body>
</html>
