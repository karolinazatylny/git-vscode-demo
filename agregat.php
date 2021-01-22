<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/style.css">
</head>
<body>

  <h1>K a r o l i n a      Z a t y l n y</h1>
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
    <h5>Funkcje agregujące</h5>
 <?php


    require("../connect.php");
    $sql='SELECT sum(zarobki) as sz FROM pracownicy';
    echo("<h2>ZADANIE 1: $sql</h2>");
    $result = $conn->query($sql); 
        echo("<table border=1>");
        echo("<th>Suma_Zarobków</th>");
            while($row=$result->fetch_assoc()){ 
                echo("<tr>");
                    echo("<td>".$row["sz"]."</td>");
                echo("</tr>");
            }

        echo("</table>");

        echo("</table>");
        require("../connect.php");
        $sql='SELECT sum(zarobki) as sz FROM pracownicy WHERE imie like "%a"';
        echo("<h2>ZADANIE 2: $sql</h2>");
        $result = $conn->query($sql); 
            echo("<table border=1>");
            echo("<th>Suma_Zarobków</th>");
                while($row=$result->fetch_assoc()){ 
                    echo("<tr>");
                        echo("<td>".$row["sz"]."</td>");
                    echo("</tr>");
                }
    
            echo("</table>");

            echo("</table>");
        require("../connect.php");
        $sql='SELECT sum(zarobki) as sz FROM pracownicy WHERE (imie not like "a%") AND (dzial=2 OR dzial=3)';
        echo("<h2>ZADANIE 3: $sql</h2>");
        $result = $conn->query($sql); 
            echo("<table border=1>");
            echo("<th>Suma_zarobków</th>");
                while($row=$result->fetch_assoc()){ 
                    echo("<tr>");
                        echo("<td>".$row["sz"]."</td>");
                    echo("</tr>");
                }
    
            echo("</table>");

            echo("</table>");
        require("../connect.php");
        $sql='SELECT avg(zarobki) as az FROM pracownicy where imie not like "%a"';
        echo("<h2>ZADANIE 4: $sql</h2>");
        $result = $conn->query($sql); 
            echo("<table border=1>");
            echo("<th>Średnia_zarobków</th>");
                while($row=$result->fetch_assoc()){ 
                    echo("<tr>");
                        echo("<td>".$row["az"]."</td>");
                    echo("</tr>");
                }
    
            echo("</table>");

            echo("</table>");
        require("../connect.php");
        $sql='SELECT avg(zarobki) as az FROM pracownicy WHERE dzial=4';
        echo("<h2>ZADANIE 5: $sql</h2>");
        $result = $conn->query($sql); 
            echo("<table border=1>");
            echo("<th>Średnia_zarobków</th>");
                while($row=$result->fetch_assoc()){ 
                    echo("<tr>");
                        echo("<td>".$row["az"]."</td>");
                    echo("</tr>");
                }
    
            echo("</table>");

            echo("</table>");
            require("../connect.php");
            $sql='SELECT avg(zarobki) as az FROM pracownicy WHERE (imie not like "%a") AND (dzial=1 OR dzial=2)';
            echo("<h2>ZADANIE 6: $sql</h2>");
            $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Średnia_zarobków</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                            echo("<td>".$row["az"]."</td>");
                        echo("</tr>");
                    }
        
                echo("</table>");
                require("../connect.php");
                $sql='SELECT count(imie) as ip FROM pracownicy';
                echo("<h2>ZADANIE 7: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Ilość_pracowników</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                            echo("<td>".$row["ip"]."</td>");
                        echo("</tr>");
                    }

                echo("</table>");
                require("../connect.php");
                $sql='SELECT count(imie) as ip FROM pracownicy where (imie like "%a") AND (dzial=1 OR dzial=3)';
                echo("<h2>ZADANIE 8: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Ilość_pracowników</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                            echo("<td>".$row["ip"]."</td>");
                        echo("</tr>");
                    }

                echo("</table>");
                require("../connect.php");
                $sql='SELECT nazwa_dzial, sum(zarobki) as sz FROM pracownicy, organizacja WHERE dzial=id_org group by dzial';
                echo("<h2>ZADANIE 9: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Nazwa_działu</th>");
                echo("<th>Suma_zarobków</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["nazwa_dzial"]."</td><td>".$row["sz"]."</td>"); 
                        echo("</tr>");
                    }

                echo("</table>");    
                require("../connect.php");
                $sql='SELECT count(imie) as ip, nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org group by dzial';
                echo("<h2>ZADANIE 10: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Nazwa_działu</th>");
                echo("<th>Ilość_pracowników</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["nazwa_dzial"]."</td><td>".$row["ip"]."</td>"); 
                        echo("</tr>");
                    }

                echo("</table>");    
                require("../connect.php");
                $sql='SELECT avg(zarobki) as az, nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org group by dzial';
                echo("<h2>ZADANIE 11: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Nazwa_działu</th>");
                echo("<th>Średnia_zarobków</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["nazwa_dzial"]."</td><td>".$row["az"]."</td>"); 
                        echo("</tr>");
                    }

                echo("</table>");    
                require("../connect.php");
                $sql='SELECT sum(zarobki) as sum, if(imie like "%a", "Kobiety", "Mężczyźni") as plec FROM pracownicy group by plec';
                echo("<h2>ZADANIE 12: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Suma_zarobków</th>");
                echo("<th>Płeć</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["sum"]."</td><td>".$row["plec"]."</td>"); 
                        echo("</tr>");
                    }

                echo("</table>");   
                require("../connect.php");
                $sql='SELECT avg(zarobki) as az, if(imie like "%a", "Kobiety", "Mężczyźni") as plec FROM pracownicy group by plec';
                echo("<h2>ZADANIE 13: $sql</h2>");
                $result = $conn->query($sql); 
                echo("<table border=1>");
                echo("<th>Średnia_zarobków</th>");
                echo("<th>Płeć</th>");
                    while($row=$result->fetch_assoc()){ 
                        echo("<tr>");
                        echo("<td>".$row["az"]."</td><td>".$row["plec"]."</td>"); 
                        echo("</tr>");
                    }

                echo("</table>");   
                require("../connect.php");
                $sql='SELECT sum(zarobki) as sum, nazwa_dzial FROM pracownicy, organizacja WHERE dzial=id_org group by dzial HAVING sum(zarobki)<28';
                echo("<h2>ZADANIE 14: $sql</h2>");
                $result = $conn->query($sql);
                echo("<table border=1>");
                echo("<th>Nazwa_działu</th>");
                echo("<th>Suma_zarobków</th>");
                    while($row=$result->fetch_assoc()){
                        echo("<tr>");
                        echo("<td>".$row["nazwa_dzial"]."</td><td>".$row["sum"]."</td>");
                    }

                echo("</table>");
                require("../connect.php");
                $sql='SELECT avg(zarobki) as az, nazwa_dzial FROM pracownicy, organizacja WHERE (dzial=id_org) AND (imie not like "%a") group by dzial having avg(zarobki)>30';
                echo("<h2>ZADANIE 15: $sql</h2>");
                $result = $conn->query($sql);
                echo("<table border=1>");
                echo("<th>Nazwa_działu</th>");
                echo("<th>Średnia_zarobków</th>");
                    while($row=$result->fetch_assoc()){
                        echo("<tr>");
                        echo("<td>".$row["nazwa_dzial"]."</td><td>".$row["az"]."</td>");
                    }

                echo("</table>");
                require("../connect.php");
                $sql='SELECT count(imie) as i, nazwa_dzial FROM pracownicy, organizacja WHERE (dzial=id_org) group by dzial having count(imie)>2';
                echo("<h2>ZADANIE 16: $sql</h2>");
                $result = $conn->query($sql);
                echo("<table border=1>");
                echo("<th>Ilość</th>");
                echo("<th>Nazwa_działu</th>");
                    while($row=$result->fetch_assoc()){
                        echo("<tr>");
                        echo("<td>".$row["i"]."</td><td>".$row["nazwa_dzial"]."</td>");
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
            </div>   
            
                </body>
                </html>