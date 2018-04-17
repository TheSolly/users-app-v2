<?php 


function _header_admin($pageName)
{ 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_ADMIN_URL; ?>bootstrap.min.css">
    <title><?php echo $pageName ?> | Admin</title>
</head>
<body>
  <div class="container">

<?php 
}
function _footer_admin()
{
 ?>

</div>

</body>

</html>
<?php
}