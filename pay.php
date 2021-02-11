<!DOCTYPE html>
<html>
<body>

<h1>The onclick Event</h1>

<p>The onclick event is used to trigger a function when an element is clicked on.</p>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>

<?php $hi = "hhh";$h = ""; ?>

<button onclick="myFunction()">Click me</button>

<p id="demo">hhhhhhhh</p>



<script>
function myFunction() {
     var idd = '<?php echo '$hi' ?>'
  document.getElementById("demo").innerHTML =  idd
  $h = idd

}
</script>

<?php echo $h ;?>


</body>
</html>
