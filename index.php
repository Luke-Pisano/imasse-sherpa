<!--Welcome to the code for the website, anything in green are comments. These will help explain what's going on-->
<!--This piece of code makes the entire code doc in HTML format-->
<!DOCTYPE html>
<!--Signifies start of HTML code-->
<html>
<!--This is the meta data for the website. It explains the scale and the ratios of the website-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--This is the "tab" name of the website. It will display in all of your tabs of your browser-->
<head>
  <title>Sherpa - Pathway Home</title>
</head>

<!--This defines the body element, which includes every single element on the web page-->
<body style="display: none">

<!--This is the start of the CSS for designing the website first page HTML uses CSS to understand how to "decorate" things with colors and sizes-->
<style>
    * {
  box-sizing: border-box;
}
/*CSS for whole website page*/
body {
  font: 16px Arial;  
  background-color: #6e6b6a;
}
/*This is the CSS for the live search box of the website*/
/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
      width: 80%;
}
/*This is the CSS for the search box, it adjusts how big it is and the kind of text being inputted*/
input {
  border: 1px solid transparent;
  padding: 10px;
  font-size: 16px;
}

/* This is also CSS for the search box. It adjusts color and size of it*/
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

/*This is the CSS for the search button of the webpage*/
input[type=submit] {
  background-color: dodgerblue;
  color: #fff;
  cursor: pointer;
  width: 19%;
}

/*This is the CSS for classes that are populated below when you type in certain letters or numbers*/
.autocomplete-items {
   position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

/* These are additional properties for the populating classes below search bar as you type them in*/
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item: This will give the color it changes to from white*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys: This will change the color of the highlighted portion*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
#hidden {
    display: none;
}
/*adjusts position for search bar, populated search results, logo. Also adjusts logo size */
.autocomplete {
    position: relative;
  display: inline-block;
}
.container {
        margin: auto;
    max-width: 500px;
    width: 100%;
}
.logo {
    text-align: center;
}
.logo img {
    width: 300px;
}
</style>
<!--This is the end of the CSS portion of the Code -->

<!--This piece of the code is all about making everything show up on the website. This is typical HTML-->
<!--Title Header-->
<?php
//array grabber adapted from: https://www.ravelrumba.com/blog/json-google-spreadsheets/
$feed = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQrEPM2Hf88Xzq9_0NM-Oh0nU1raNVuAPfftDKNd5f2KNAwgSmOxl_20c9VsNINp1niQfzWdyNrRVlL/pub?output=csv';
$keys = array();
$newArray = array();

function csvToArray($file, $delimiter){
  if (($handle = fopen($file, 'r')) !== FALSE){
    $i = 0;
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) {
      for ($j = 0; $j < count($lineArray); $j++){
        $arr[$i][$j] = $lineArray[$j];
      }
      $i++;
    }
    fclose($handle);
  }
  return $arr;
}

// Do it
$data = csvToArray($feed, ',');
 
// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;
 
//Use first row for names  
$labels = array_shift($data);  
 
foreach ($labels as $label) {
  $keys[] = $label;
}
 
// Add Ids, just in case we want them later
$keys[] = 'id';
 
for ($i = 0; $i < $count; $i++) {
  $data[$i][] = $i;
}
 
// Bring it all together
for ($j = 0; $j < $count; $j++) {
  $d = array_combine($keys, $data[$j]);
  
  $newArray[$j] = $d;
}
 
// Print it out as JSON
//echo json_encode($newArray);

// writeJson adapted from: https://stackoverflow.com/questions/57731341/how-to-push-a-new-object-into-a-json-file-using-php
$writeJson = file_put_contents("json/A1-P1.json", json_encode($newArray));



//new array grabber to grab all possible classes.
//array grabber adapted from: https://www.ravelrumba.com/blog/json-google-spreadsheets/
$feed = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQowsFTPvKhT-1F2bg8yHsGZLWMW924YhMZbFrWOP-AdpEiXsx9ywsGYj6aDJhM57xDO8caEeflDzat/pub?output=csv';
$keys = array();
$newArray = array();

function csvToArray2($file, $delimiter){
  if (($handle = fopen($file, 'r')) !== FALSE){
    $i = 0;
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) {
      for ($j = 0; $j < count($lineArray); $j++){
        $arr[$i][$j] = $lineArray[$j];
      }
      $i++;
    }
    fclose($handle);
  }
  return $arr;
}

// Do it
$data = csvToArray2($feed, ',');
 
// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;
 
//Use first row for names  
$labels = array_shift($data);  
 
foreach ($labels as $label) {
  $keys[] = $label;
}
 
// Add Ids, just in case we want them later
/*$keys[] = 'id';
 
for ($i = 0; $i < $count; $i++) {
  $data[$i][] = $i;
}*/
 
// Bring it all together
for ($j = 0; $j < $count; $j++) {
  $d = array_combine($keys, $data[$j]);
  
  $newArray[$j] = $d;
}
 
// Print it out as JSON
//echo json_encode($newArray);

// writeJson adapted from: https://stackoverflow.com/questions/57731341/how-to-push-a-new-object-into-a-json-file-using-php
$writeJson = file_put_contents("json/allClasses.json", json_encode($newArray));

?>
<h1>
<p style="text-align:center"> WELCOME TO SHERPA!</p>
</h1>

<!--This piece of the code places all of the elements on the website, based on their CSS location, size, and color-->
<div class="container">
    <div class='logo'>
<img src="img/sherpa-logo.svg">
</div>
<!--This code is what is run when the search button is pressed. The search bar is turned off, and it sends you to the next webpage, search.php-->
<form autocomplete="off" id="form" action="/search.php" method="post">
    <div class="autocomplete">
  <!--This code is used to define what's inside the search bar-->
  <input id="input" type="text" placeholder="Start Typing Class Name" name="input">
  </div>
  <input type="submit" value="Search" name="submit">
</form>
<!--This code determines where the title "Classes entered" is located below the search bar-->
<p style="background-color:#fff;text-align:center">Classes Entered</p>
<ul id="classes"></ul>
</div>

<!--This is the JavaScript portion of the code. This is how the populating search bar works and and how selected classes are printed below-->
<script>
//grabs the php array from above and uses it here for the possible classes search bar
//echo part of code adapted from https://www.geeksforgeeks.org/how-to-pass-a-php-array-to-a-javascript-function/#
var data2 = <?php echo json_encode($newArray);?>;
console.log(data2);



var counter = 0;
let classesEntered = [];
function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
  var btn = document.getElementById('btn');
  var form = document.getElementById('form');
  var addInput = function() {
    counter++;
    var input = document.createElement("input");
    input.id = 'hidden';
    input.type = 'text';
    input.name = counter;
    input.value = document.getElementById("input").value;
    form.appendChild(input);
  };
  var updateList = function(){
      let list = document.getElementById("classes");
      let li = document.createElement("li");
      li.innerText = classesEntered[classesEntered.length -1];
      list.appendChild(li);
  };
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i]['name'].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i]['name'].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i]['name'].substr(val.length);
          b.innerHTML += "<input type='hidden' alt='"+ arr[i]['name'] +"' value='" + arr[i]['id'] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              addInput();
              closeAllLists();
              document.getElementById("input").value = null;
            inp.name = this.getElementsByTagName("input")[0].alt;
              classesEntered.push(inp.name);
              updateList();
          });
          a.appendChild(b);
        }
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) { //up
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

//grabbing classes from allClasses.json and sending them into the search bar here
autocomplete(document.getElementById("input"), data2);
    document.getElementsByTagName('body')[0].style = 'display: block';
</script>

</body>
</html>
