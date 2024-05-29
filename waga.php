<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Twój wskaźnik BMI</title>
<link rel="stylesheet" href="styl4.css"> 
</head>
<body>
<div id="baner"><h2>Oblicz wzkaźnik BMI</h2></div>
<div id="logo"><img src="wzor.png" alt="liczymy BMI"></div>
<div id="lewy"><img src="rys1.png" alt="zrzuć kalorie!"></div>
<div id="prawy">
<h1>Podaj dane</h1>
<form  action="waga.php" method="post" name="waga" id="waga">
      
      Waga<input type="number" id="wag" name="wag">
      Wzrost[cm]<input type="number" id="wzrost" name="wzrost">
      <button type="submit">Licz BMI i zapisz wynik</button>
      <br>
       
<?php
         if(isset($_POST['wag']) && isset($_POST['wzrost'])) {
                    $wag = $_POST['wag'];
                    $wzrost = $_POST['wzrost'];
                    $bmi = $wag / ($wzrost * $wzrost);
                    $bmi *= 10000;
                    echo "Twoja waga: $wag; Twój wzrost: $wzrost <br> BMI wynosi: $bmi";
                    $bmi_id = 0;
                    if($bmi <= 18) $bmi_id = 1;
                    if($bmi > 19 && $bmi <= 25) $bmi_id = 2;
                    if($bmi > 26 && $bmi <= 30) $bmi_id = 3;
                    if($bmi > 31 && $bmi <= 100) $bmi_id = 4;               
         }
      
?>
       
</form>
   
   </div>
   <div id="glowny">
       <table>
        <tr><th>Ip</th><th>Interpretacja</th><th>zaczyna się od...</th></tr>   
           <?php
           
     $baza=mysqli_connect('localhost','root','','bmi2');
     if(mysqli_connect_errno())
     {echo"wystapil blad polaczenia z baza";}
      $wynik=mysqli_query($baza, 'SELECT `id`,`informacja`,`wart_min` FROM `bmi`');
      while($r=mysqli_fetch_array($wynik))
      {
     echo "<tr>";
     echo "<td>";
     echo  $r["id"]  ;
     echo "</td>"; 
          
     echo "<td>";
     echo $r["informacja"];
     echo "</td>";   
             
     echo "<td>";
     echo $r["wart_min"];
     echo "</td>";  
     echo "</tr>"; 

      }  
       mysqli_close($baza);
           
           ?>
           
       </table>
       
   </div>
    
   <div id="stopka">
       Autor : 00000000<a href="kwerendy.txt">Wynik działania kwerendy 2</a>
   </div>      
    
</body>
</html>
