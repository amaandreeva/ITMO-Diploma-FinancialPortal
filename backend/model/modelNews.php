<?php

class ModelNews {
    
        public function getNews(){
            
            include "./assets/tpl/news_header.tpl";
        
            $link = new mysqli("localhost", "root", "", "finClimb");

            /* изменение набора символов на utf8 */
            if (!$link->set_charset("utf8")) {
                printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
                exit();
            } 

            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            $query = "SELECT * 

                        FROM `News`

                        ORDER BY idNews DESC
                        ";

             if($result = mysqli_query ($link, $query)){

                while ($row = mysqli_fetch_assoc($result)){

                    $data[] = [
                            "id" => $row['idNews'],
                            "data" => $row['Date'],
                            "title" => $row['Title'],
                            "text" => $row['Text']
                    ];
                }

                mysqli_free_result($result);
            }

            mysqli_close($link); 

            //Пагинатор:
            $cycle = $_GET['cycle']; //кол-во новостей на 1й странице
            $numbPagesStart = $_GET['start'];
            $numbPagesEnd = $_GET['end'];

            if($cycle == null){
                $cycle = 3;
            };

            if($numbPagesStart == null){
                $numbPagesStart = 0;
                $numbPagesEnd = $cycle - 1;
            };

            for($j = 0; $j < count($data); $j++){
                if($j >= $numbPagesStart and $j <= $numbPagesEnd){
                      echo "<article class='container'><header><h2>".$data[$j]['title']."</h2><p>".$data[$j]['data']."</p></header><p>".$data[$j]['text']."</p></article>";
                }
            };

            //Номера страниц пагинатора
            echo "<div class='container'><p> Страницы: ";

                $start = -$cycle;
                $end = -1;

                for($j = 1; $j <= ceil(count($data)/$cycle); $j++){
                    $start += $cycle;
                    $end += $cycle;
                    echo "<span> | </span><a href='index.php?controller=ControllerNews&action=news&start=".$start."&end=".$end."&cycle=".$cycle."'>".$j."</a><span> | </span>";
                };

            echo "</p></div>";
            
            include "./assets/tpl/news_footer.tpl";
        }
};

?>