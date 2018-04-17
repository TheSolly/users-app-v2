<?php 


function _header($pageName)
{ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="templates/css/bootstrap.min.css">
    <title><?php echo $pageName ?></title>
</head>
<body>
  <div class="container">

<?php 
}
function _footer()
{
?>

</div>

</body>

</html>
<?php
}