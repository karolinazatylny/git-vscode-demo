<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

  <h1>K a r o l i n a   ★   Z a t y l n y</h1>
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
    <h6>
    <li><a class="link" href="https://github.com/SK-2019/php-sql-wprowadzenie-karolinazatylny"><b>GITHUB</b></a></li>
      <li><a class="link" href="/index.php"><b>STRONA GŁÓWNA</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/zadania.php"><b>ZADANIA</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/agregat.php"><b>FUNKCJE AGREGUJĄCE</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/orgpracownicy.php"><b>ORGANIZACJA I PRACOWNICY</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/pracownicy.php"><b>PRACOWNICY</b></a></li>
      <li><a class="link" href="/pracownicy-organizacja/dataiczas.php"><b>DATA I CZAS</b></a></li>
      <li><a class="link" href="/dane-do-bazy/formularz.html"><b>FORMULARZ</b></a></li>
      <li><a class="link" href="/dane-do-bazy/danedobazy.php"><b>DANE DO BAZY</b></a></li>
      <li><a class="link" href="/biblioteka/ksiazki.php"><b>KSIĄŻKI</b></a></li>
    </h6>
    </ul>
  </div>

  <div class="col-6 col-s-9">
    <h5>Data i czas</h5>
 <?php
       require("../connect.php");
       $sql='SELECT *, YEAR(curdate())-YEAR(data_urodzenia) as wiek FROM pracownicy, organizacja WHERE dzial=id_org';
       echo("<h2>ZADANIE 1: $sql</h2>");
       $result = $conn->query($sql);
           echo("<table border=1>");
           echo("<th>Id</th>");
           echo("<th>Imie</th>");
           echo("<th>Dział</th>");
           echo("<th>Nazwa_Działu</th>");
           echo("<th>Zarobki</th>");
           echo("<th>Data_urodzenia</th>");
           echo("<th>Wiek</th>");
               while($row=$result->fetch_assoc()){ 
                   echo("<tr>");
                   echo("<td>".$row["id_pracownicy"]."</td><td>".$row["imie"]."</td><td>".$row["dzial"]."</td><td>".$row["nazwa_dzial"]."</td><td>".$row["zarobki"]."</td><td>".$row["data_urodzenia"]."</td><td>".$row["wiek"]."</td>");                    echo("</tr>");
               }
   
           echo("</table>");
           require("../connect.php");
           $sql='SELECT *, YEAR(curdate())-YEAR(data_urodzenia) as wiek FROM pracownicy, organizacja WHERE dzial=id_org AND nazwa_dzial="serwis"';
           echo("<h2>ZADANIE 2: $sql</h2>");
           $result = $conn->query($sql);
               echo("<table border=1>");
               echo("<th>Id</th>");
               echo("<th>Imie</th>");
               echo("<th>Dział</th>");
               echo("<th>Nazwa_Działu</th>");
               echo("<th>Zarobki</th>");
               echo("<th>Data_urodzenia</th>");
               echo("<th>Wiek</th>");
                   while($row=$result->fetch_assoc()){ 
                       echo("<tr>");
                       echo("<td>".$row["id_pracownicy"]."</td><td>".$row["imie"]."</td><td>".$row["dzial"]."</td><td>".$row["nazwa_dzial"]."</td><td>".$row["zarobki"]."</td><td>".$row["data_urodzenia"]."</td><td>".$row["wiek"]."</td>"); 
                       echo("</tr>");
                   }
       
            echo("</table>");
            require("../connect.php");
            $sql='SELECT sum(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek FROM pracownicy, organizacja WHERE dzial=id_org';
            echo("<h2>ZADANIE 3: $sql</h2>");
            $result = $conn->query($sql);
                echo("<table border>");
                echo("<th>Wiek_wszystkich_pracowników</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["wiek"]."</td>");                    
                        echo("</tr>");
                   }
           echo("</table>");
           require("../connect.php");
           $sql='SELECT sum(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek FROM pracownicy, organizacja WHERE dzial=id_org AND nazwa_dzial="handel"';
           echo("<h2>ZADANIE 4: $sql</h2>");
           $result = $conn->query($sql);
               echo("<table border>");
               echo("<th>Wiek_pracowników_handel</th>");
                   while($row=$result->fetch_assoc()){ 
                       echo("<tr>");
                       echo("<td>".$row["wiek"]."</td>");                    
                       echo("</tr>");
                  }
          echo("</table>");
          require("../connect.php");
          $sql='SELECT sum(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek FROM pracownicy WHERE imie like "%a"';
          echo("<h2>ZADANIE 5: $sql</h2>");
          $result = $conn->query($sql);
              echo("<table border>");
              echo("<th>Wiek_kobiet</th>");
                  while($row=$result->fetch_assoc()){ 
                      echo("<tr>");
                      echo("<td>".$row["wiek"]."</td>");                    
                      echo("</tr>");
                 }
         echo("</table>");

          require("../connect.php");
          $sql='SELECT sum(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek FROM pracownicy WHERE imie not like "%a"';
          echo("<h2>ZADANIE 6: $sql</h2>");
          $result = $conn->query($sql);
              echo("<table border>");
              echo("<th>Wiek_mężczyzn</th>");
                  while($row=$result->fetch_assoc()){ 
                      echo("<tr>");
                      echo("<td>".$row["wiek"]."</td>");                    
                      echo("</tr>");
                 }
         echo("</table>");

        require("../connect.php");
        $sql='SELECT dzial, avg(YEAR(CURDATE()) - YEAR(data_urodzenia)) as a, nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org group by dzial';
          echo("<h2>ZADANIE 7: $sql</h2>");
          $result = $conn->query($sql);
              echo("<table border>");
              echo("<th>Wiek_mężczyzn</th>");
              echo("<th>Średnia_wiek</th>");
              echo("<th>Nazwa_działu</th>");
                  while($row=$result->fetch_assoc()){ 
                      echo("<tr>");
                      echo("<td>".$row["dzial"]."</td><td>".$row["a"]."</td><td>".$row["nazwa_dzial"]."</td>");                    
                      echo("</tr>");
                 }
         echo("</table>");

         require("../connect.php");
         $sql='SELECT dzial, sum(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma, nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org group by dzial';
           echo("<h2>ZADANIE 8: $sql</h2>");
           $result = $conn->query($sql);
               echo("<table border>");
               echo("<th>Dział</th>");
               echo("<th>Suma_wiek</th>");
               echo("<th>Nazwa_działu</th>");
                   while($row=$result->fetch_assoc()){ 
                       echo("<tr>");
                       echo("<td>".$row["dzial"]."</td><td>".$row["suma"]."</td><td>".$row["nazwa_dzial"]."</td>");                    
                       echo("</tr>");
                  }
          echo("</table>");

          require("../connect.php");
         $sql='SELECT dzial, max(YEAR(CURDATE()) - YEAR(data_urodzenia)) as max, nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org group by dzial';
           echo("<h2>ZADANIE 9: $sql</h2>");
           $result = $conn->query($sql);
               echo("<table border>");
               echo("<th>Dział</th>");
               echo("<th>Wiek_najstarsi</th>");
               echo("<th>Nazwa_działu</th>");
                   while($row=$result->fetch_assoc()){ 
                       echo("<tr>");
                       echo("<td>".$row["dzial"]."</td><td>".$row["max"]."</td><td>".$row["nazwa_dzial"]."</td>");                    
                       echo("</tr>");
                  }
          echo("</table>");

          require("../connect.php");
          $sql = ("SELECT MIN(YEAR(CURDATE()) - YEAR(data_urodzenia)) as min, nazwa_dzial from pracownicy, organizacja WHERE id_org=dzial and (nazwa_dzial='handel' OR nazwa_dzial='serwis') GROUP BY dzial");
          echo("<h2>ZADANIE 10: $sql</h2>");
          $result=$conn->query($sql);
          include("connect.php");
                  echo("<table border=1>");
                  echo("<th>Min</th>");
                  echo("<th>Nazwa_dział</th>");
                  while($row=$result->fetch_assoc()) {
                          echo("<tr>");
                              echo("<td>".$row["min"]."</td><td>".$row["nazwa_dzial"]."</td>");
                          echo("</tr>");
                      }
                  echo("</table>");

          require("../connect.php");
          $sql='SELECT imie, DATEDIFF(CURDATE(),data_urodzenia) as dni_zycia FROM pracownicy';
            echo("<h2>ZADANIE 12: $sql</h2>");
            $result = $conn->query($sql);
                echo("<table border>");
                echo("<th>Imie</th>");
                echo("<th>Dni_życia</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["imie"]."</td><td>".$row["dni_zycia"]."</td>");                    
                        echo("</tr>");
                   }
           echo("</table>");

            require("../connect.php");
            $sql='SELECT * FROM pracownicy, organizacja WHERE (id_org=dzial) and (imie not like "%a") order by data_urodzenia ASC LIMIT 1';
              echo("<h2>ZADANIE 13: $sql</h2>");
              $result = $conn->query($sql);
                  echo("<table border>");
                  echo("<th>Id_pracownicy</th>");
                  echo("<th>Imie</th>");
                  echo("<th>Dział</th>");
                  echo("<th>Zarobki</th>");
                  echo("<th>Data_urodzenia</th>");
                  echo("<th>Nazwa_działu</th>");
                      while($row=$result->fetch_assoc()){ 
                          echo("<tr>");
                          echo("<td>".$row["id_pracownicy"]."</td><td>".$row["imie"]."</td><td>".$row["dzial"]."</td><td>".$row["zarobki"]."</td><td>".$row["data_urodzenia"]."</td><td>".$row["nazwa_dzial"]."</td>");
                         echo("</tr>");
                     }
             echo("</table>");
        







             echo("<h1>Formatowanie dat </h1>");


             require("../connect.php");
             $sql = ("SELECT *, DATE_FORMAT(data_urodzenia,'%W-%m-%Y') as format from pracownicy");
             echo("<h2>ZADANIE 1: $sql</h2>");
             $result=$conn->query($sql);
             include("connect.php");
                     echo("<table border>");
                     echo("<th>Id_pracownicy</th>");
                     echo("<th>Imie</th>");
                     echo("<th>Dział</th>");
                     echo("<th>Zarobki</th>");
                     echo("<th>Data_urodzenia</th>");
                     echo("<th>Nazwa_działu</th>");
                     while($row=$result->fetch_assoc()) {
                             echo("<tr>");
                                 echo("<td>".$row["id_pracownicy"]."</td><td>".$row["imie"]."</td><td>".$row["dzial"]."</td><td>".$row["zarobki"]."</td><td>".$row["data_urodzenia"]."</td><td>".$row["format"]."</td>");
                             echo("</tr>");
                         }
                     echo("</table>");


             require("../connect.php");
             $sql1 = ("SET lc_time_names = 'pl_PL'");
             $sql2 = ("SELECT DATE_FORMAT(CURDATE(), '%W')as data");
             echo("<h2>ZADANIE 2: $sql2</h2>");
             $result=$conn->query($sql1);
             $result=$conn->query($sql2);

             include("connect.php");
                     echo("<table border>");
                     echo("<th>Data</th>");
                     while($row=$result->fetch_assoc()) {
                             echo("<tr>");
                                 echo("<td>".$row["data"]."</td>");
                             echo("</tr>");
                         }
                     echo("</table>");


             require("../connect.php");
             $sql1 = ("SET lc_time_names = 'pl_PL'");
             $sql2 = ("SELECT *, DATE_FORMAT(data_urodzenia,'%M-%W-%Y') as format from pracownicy");
             echo("<h2>ZADANIE 3: $sql2</h2>");
             $result=$conn->query($sql);
             include("connect.php");
                     echo("<table border>");
                     echo("<th>Id_pracownicy</th>");
                     echo("<th>Imie</th>");
                     echo("<th>Dział</th>");
                     echo("<th>Zarobki</th>");
                     echo("<th>Data_urodzenia</th>");
                     echo("<th>Format</th>");
                     while($row=$result->fetch_assoc()) {
                             echo("<tr>");
                                 echo("<td>".$row["id_pracownicy"]."</td><td>".$row["imie"]."</td><td>".$row["dzial"]."</td><td>".$row["zarobki"]."</td><td>".$row["data_urodzenia"]."</td><td>".$row["format"]."</td>");
                             echo("</tr>");
                         }
                     echo("</table>");


            require("../connect.php");
            $sql2 = ("SELECT curtime(4)");
            echo("<h2>ZADANIE 4: $sql2</h2>");
            $result=$conn->query($sql2);
            include("connect.php");
                      echo("<table border>");
                     echo("<th>Curtime(4)</th>");
                     while($row=$result->fetch_assoc()) {
                            echo("<tr>");
                                  echo("<td>".$row["curtime(4)"]."</td>");
                            echo("</tr>");
                            }
                         echo("</table>");

                         
            require("../connect.php");
            $sql1 = ("SET lc_time_names = 'pl_PL'");
            $sql2 = ("SELECT *, DATE_FORMAT(data_urodzenia,'%Y-%M-%W') as format from pracownicy");
            echo("<h2>ZADANIE 5: $sql2</h2>");
            $result=$conn->query($sql1);
            $result=$conn->query($sql2);                
            include("../connect.php");
                    echo("<table border>");
                    echo("<th>Id_pracownicy</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Zarobki</th>");
                    echo("<th>Data_urodzenia</th>");
                    echo("<th>Format</th>");
                        while($row=$result->fetch_assoc()) {
                                echo("<tr>");
                                    echo("<td>".$row["id_pracownicy"]."</td><td>".$row["imie"]."</td><td>".$row["dzial"]."</td><td>".$row["zarobki"]."</td><td>".$row["data_urodzenia"]."</td><td>".$row["format"]."</td>");
                                echo("</tr>");
                            }
                        echo("</table>");

            require("../connect.php");            
             $sql1 = ("SET lc_time_names = 'pl_PL'");
            $sql2 = ("SELECT imie,  DATEDIFF(CURDATE(),data_urodzenia) as dni, DATEDIFF(CURDATE(),data_urodzenia)*24 as godziny, DATEDIFF(CURDATE(),data_urodzenia)*24*60 as minuty FROM pracownicy");
           echo("<h2>ZADANIE 6: $sql2</h2>");
             $result=$conn->query($sql1);
             $result=$conn->query($sql2);
               include("../connect.php");
               echo("<table border>");
                echo("<th>Imie</th>");
              echo("<th>Dni</th>");
              echo("<th>Godziny</th>");
              echo("<th>Minuty</th>");
                while($row=$result->fetch_assoc()) {
                     echo("<tr>");
                         echo("<td>".$row["imie"]."</td><td>".$row["dni"]."</td><td>".$row["godziny"]."</td><td>".$row["minuty"]."</td>");
                     echo("</tr>");
                  }
                 echo("</table>");


                 require("../connect.php");   
                 $sql2 = ('SELECT DATE_FORMAT("2003-01-26", "%j") as dzienroku');
                 echo("<h2>ZADANIE 7: $sql2</h2>");
                 $result=$conn->query($sql2);
                 include("../connect.php");
                         echo("<table border>");
                         echo("<th>Dzień_roku</th>");
                         while($row=$result->fetch_assoc()) {
                                 echo("<tr>");
                                     echo("<td>".$row["dzienroku"]."</td>");
                                 echo("</tr>");
                             }
                         echo("</table>");


          require("../connect.php"); 
          $sql1 = ("SET lc_time_names = 'pl_PL'");
          $sql2 = ("SELECT DATE_FORMAT(data_urodzenia,'%W') as dzien, imie, data_urodzenia FROM pracownicy ORDER BY CASE
                    WHEN dzien = 'Poniedziałek' THEN 1
                    WHEN dzien = 'Wtorek' THEN 2
                    WHEN dzien = 'Środa' THEN 3
                    WHEN dzien= 'Czwartek' THEN 4
                    WHEN dzien = 'Piątek' THEN 5
                    WHEN dzien = 'Sobota' THEN 6
                    WHEN dzien = 'Niedziela' THEN 7
                    END ASC");
        echo("<h2>ZADANIE 8: $sql2</h2>");
        $result=$conn->query($sql1);
        $result=$conn->query($sql2);
        include("../connect.php");
            echo("<table border>");
            echo("<th>Dzień</th>");
            echo("<th>Imie</th>");
            echo("<th>Data_urodzenia</th>");
          while($row=$result->fetch_assoc()) {
              echo("<tr>");
                  echo("<td>".$row["dzien"]."</td><td>".$row["imie"]."</td><td>".$row["data_urodzenia"]."</td>");
              echo("</tr>");
          }
             echo("</table>");


        require("../connect.php"); 
        $sql1 = ("SET lc_time_names = 'pl_PL'");
        $sql2 = ("SELECT Count(DATE_FORMAT(data_urodzenia,'%W')) as urodzeniwpon FROM pracownicy where DATE_FORMAT(data_urodzenia, '%W')='Poniedziałek'");
        echo("<h2>ZADANIE 9: $sql2</h2>");
        $result=$conn->query($sql1);
        $result=$conn->query($sql2);
        include("../connect.php");
             echo("<table border>");
             echo("<th>Urodzeni_w_poniedziałek</th>");
                     while($row=$result->fetch_assoc()) {
                        echo("<tr>");
                             echo("<td>".$row["urodzeniwpon"]."</td>");
                        echo("</tr>");
                        }
                         echo("</table>");

            require("../connect.php");
            $sql1 = ("SET lc_time_names = 'pl_PL'");
            $sql2=("SELECT Count(DATE_FORMAT(data_urodzenia,'%W')) as ilosc, DATE_FORMAT(data_urodzenia,'%W') as dzien FROM pracownicy group by dzien ORDER BY CASE WHEN dzien = 'Poniedziałek' THEN 1 WHEN dzien = 'Wtorek' THEN 2 WHEN dzien = 'Środa' THEN 3 WHEN dzien= 'Czwartek' THEN 4 WHEN dzien = 'Piątek' THEN 5 WHEN dzien = 'Sobota' THEN 6 WHEN dzien = 'Niedziela' THEN 7 END ASC");
            echo("<h2>ZADANIE 10: $sql2</h2>");
            $result=$conn->query($sql1);
            $result=$conn->query($sql2);
            echo("<table border>");
            echo("<th>Dzień</th>");
            echo("<th>Ilość</th>");
                while($row=$result->fetch_assoc()){
                    echo("<tr>");
                    echo("<td>".$row["dzien"]."</td><td>".$row["ilosc"]."</td>");
                    echo("</tr>");
                }

            echo("</table>");
            ?>
              </div>
            
              <div class="col-3 col-s-12">
              <h2><iframe src="https://open.spotify.com/embed/album/75eP8LZolyNBpqIRyB5pvB" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></h2>
              <img src="https://i.pinimg.com/originals/4c/75/20/4c75209a730e0786f6410483e0d45cd7.jpg">
              <img src="https://i.pinimg.com/originals/7e/d7/4a/7ed74aa645dbd75baefc98908de46deb.jpg">
              <img src="https://i.pinimg.com/originals/06/ba/87/06ba87eab12886b624e7a96c370a669a.jpg">
              <img src="https://i.pinimg.com/originals/ec/1b/2e/ec1b2e76bca565b4948c60aa105657ae.jpg">
              <img src="https://i.pinimg.com/originals/4c/75/20/4c75209a730e0786f6410483e0d45cd7.jpg">
              <img src="https://i.pinimg.com/originals/7e/d7/4a/7ed74aa645dbd75baefc98908de46deb.jpg">
              <img src="https://i.pinimg.com/originals/06/ba/87/06ba87eab12886b624e7a96c370a669a.jpg">
              <img src="https://i.pinimg.com/originals/ec/1b/2e/ec1b2e76bca565b4948c60aa105657ae.jpg">
            </div>
            
            </body>
            </html>