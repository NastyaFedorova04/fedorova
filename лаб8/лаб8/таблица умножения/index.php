 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewort" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title> 
</head>
<body>
<table border="1px" style="margin: 50px 500px; padding: 20px;">
<tr>
<?php for ($i=1; $i<=5; $i++):?>
    <td  style="padding: 20px;">
    <?php for($j=1; $j<=10; $j++){
    echo $i.'x'.$j.'='.$i*$j.'<br>';    
    }?>
    </td>
   <?php endfor;?>
</tr>
<tr>
<?php for ($i=6; $i<=9; $i++):?>
    <td  style="padding: 20px;">
    <?php for($j=1; $j<=10; $j++){
        echo $i.'x'.$j.'='.$i*$j.'<br>';
    }?>
    </td>
<?php endfor;?>
</tr>
</table>
</body>
</html>

