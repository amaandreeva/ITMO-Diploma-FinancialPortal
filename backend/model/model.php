<?php

class Model {
        
    //index.tpl
    //Получаем таблицу Ключевых показателей эффективности (KPI)
    public function getDisclosure() {
        
        $link = new mysqli("localhost", "root", "", "finClimb");
        
        /* изменение набора символов на utf8 */
        if (!$link->set_charset("utf8")) {
            printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
            exit();
        } 

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
        $kpi = "SELECT `KPI` AS `Финансовый показатель`, 
        
                    SUM(IF(idYear=2, Summ, NULL)) AS `2017`,
                    SUM(IF(idYear=1, Summ, NULL)) AS `2016`,
                    SUM(IF(idYear=10, Summ, NULL)) AS `2015`,
                    SUM(IF(idYear=9, Summ, NULL)) AS `2014`,
                    SUM(IF(idYear=8 , Summ, NULL)) AS `2013`

                    FROM `KPIDynamics` AS `KPID` 

                    INNER JOIN `KPI` ON KPI.idKPI=KPID.idKPI
                    
                    GROUP BY `KPI`
                    
                    ORDER BY KPI.idKPI
                                                 
                        ";
        
         if($result = mysqli_query ($link, $kpi)){
             
            while ($row = mysqli_fetch_assoc($result)){

                $th = '<tr>';
                $td .= '<tr>';

                foreach ($row as $key => $value){
                    $th .= '<th>'.$key.'</th>';
                    $td .= '<td>'.$value.'</td>';
                }

                $th .= '</tr>';
                $td .= '</tr>';   
            }

            mysqli_free_result($result);
        }

        mysqli_close($link);
        
        $table = "<table>".$th.$td."</table>";
        
        return json_encode($table, JSON_UNESCAPED_UNICODE);        
 
    }
    
    
    //indexFinPortal.tpl
    public function getOverView() {
        
        $link = new mysqli("localhost", "root", "", "finClimb");
        
        /* изменение набора символов на utf8 */
        if (!$link->set_charset("utf8")) {
            printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
            exit();
        } 

        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        } 
    
        $currWeek = date('W')-1;
        
        $prevWeek = $currWeek-1;
        
        $year=date ('Y');
        
        $f_dayCurrWeek = date('d.m.Y', $currWeek * 7 * 86400 + strtotime('1/1/' . $year) - date('w', strtotime('1/1/' . $year)) * 86400 + 86400);

        $f_dayPrevWeek = date('d.m.Y', $prevWeek * 7 * 86400 + strtotime('1/1/' . $year) - date('w', strtotime('1/1/' . $year)) * 86400 + 86400);
        
        //Чистый долг
        $query1 = "SELECT 
        
                    SUM(IF(idWeek='$currWeek', Summ, NULL)) AS `Curr`,
                    SUM(IF(idWeek='$prevWeek', Summ, NULL)) AS `Prev`
        
                    FROM `Balance`

                        ";
        
         if($result = mysqli_query($link, $query1)) {

            while ($row = mysqli_fetch_assoc($result)){

                foreach ($row as $key => $value){
                    $netDebtCurr = $row['Curr'];
                    $netDebtPrev = $row['Prev'];
                } 
            }
            mysqli_free_result($result);
        }       
        
        //выводим таблицу Balance 
        $query2 = "SELECT `Indicator` AS `Показатель, тыс. руб.`,
        
                    SUM(IF(idWeek='$prevWeek', Summ, NULL)) AS `$f_dayCurrWeek`,
                    SUM(IF(idWeek='$currWeek', Summ, NULL)) AS `$f_dayPrevWeek`

                    FROM `Balance`
                    
                    INNER JOIN `Charts` ON Charts.idIndicator=Balance.idIndicator
                    
                    GROUP BY Charts.idIndicator

                        ";
        
        
         if($result = mysqli_query($link, $query2)) {

            while ($row = mysqli_fetch_assoc($result)){

                    $th3 = '<tr>';
                    $td3 .= '<tr>';

                    foreach ($row as $key => $value){
                        
                        $th3 .= '<th>'.$key.'</th>';
                        $td3 .= '<td>'.$value.'</td>';
                    }

                    $th3 .= '</tr>';
                    $td3 .= '</tr>';   
                }
            mysqli_free_result($result);
        }   
        
        $balance = '<table>'.$th3.$td3.'</table>';
      
        
        //Запрос на вывод Лимитов в работе
        $query7 = "SELECT `Indicator` AS `Лимиты в работе, тыс. руб.`,

                    SUM(IF(idWeek='$prevWeek', Summ, NULL)) AS `$f_dayPrevWeek`,
                    SUM(IF(idWeek='$currWeek', Summ, NULL)) AS `$f_dayCurrWeek`
        
                    FROM `LimitsInWork`
                    
                    INNER JOIN `Charts` ON Charts.idIndicator=LimitsInWork.idIndicator
                    
                    GROUP BY `Indicator`
                    
                    ORDER BY Charts.idIndicator

                        ";
        
         if($result = mysqli_query($link, $query7)) {

            while ($row = mysqli_fetch_assoc($result)){
                    $th = '<tr>';
                    $td .= '<tr>';

                    foreach ($row as $key => $value){
                        
                        $th .= '<th>'.$key.'</th>';
                        $td .= '<td>'.$value.'</td>';
                    }

                    $th .= '</tr>';
                    $td .= '</tr>';   
                }
            mysqli_free_result($result);
        }   
        
        $limitsInWork = '<table>'.$th.$td.'</table>';

        
        
        //Запрос на вывод текущего бизнес-плана
        $currMonth=date('n');
        
        $arrMonth=['','Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
        
        $nameMonth = $arrMonth[$currMonth];

        $query9 = "SELECT `Indicator` AS `План-факт по проектам, тыс. руб.`,
                    
                    SUM(IF(ActOrForecast='A', Summ, NULL)) AS `План за $nameMonth`,       
                    SUM(IF(ActOrForecast='F', Summ, NULL)) AS `Факт за $nameMonth`
        
                    FROM `BusinessPlan`
                    
                    INNER JOIN `Charts` ON Charts.idIndicator=BusinessPlan.idIndicator
                    
                    WHERE idMonth='$currMonth'
                    
                    GROUP BY `Indicator`
                    
                    ORDER BY Charts.idIndicator

                        ";
        
         if($result = mysqli_query($link, $query9)) {

            while ($row = mysqli_fetch_assoc($result)){
                    $th2 = '<tr>';
                    $td2 .= '<tr>';

                    foreach ($row as $key => $value){
                        
                        $th2 .= '<th>'.$key.'</th>';
                        $td2 .= '<td>'.$value.'</td>';
                    }

                    $th2 .= '</tr>';
                    $td2 .= '</tr>';   
                }
            mysqli_free_result($result);
        } 
        
        $businessPlan = '<table>'.$th2.$td2.'</table>';
                    
        
        $overView = [
                        "bp" => $businessPlan,
                        "liw" => $limitsInWork,
                        "blnc"=>$balance,
                        "netDebtCurr"=>$netDebtCurr,
                        "netDebtPrev"=>$netDebtPrev

                    ];
        
        mysqli_close($link);
        
        return json_encode($overView, JSON_UNESCAPED_UNICODE);        
 
    }
    
    
    //indexFinPortal.tpl
    public function getGraph(){
            
            $link = new mysqli("localhost", "root", "", "finClimb");

            /* изменение набора символов на utf8 */
            if (!$link->set_charset("utf8")) {
                printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
                exit();
            } 

            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            } 

            $data = array(); // в этот массив запишем то, что выберем из базы

            //Чистый долг
            $queryGraph = "SELECT `nameWeek` AS `Arr_x`,

                        SUM(Summ) AS `Arr_y`

                        FROM `Balance`

                        INNER JOIN `Week` ON Week.idWeek=Balance.idWeek

                        GROUP BY Week.idWeek

                            ";

            $result = mysqli_query($link, $queryGraph);

            while($row = mysqli_fetch_row($result)){
                $data[] = $row;
            }
            
            mysqli_free_result($result);   
            
            return json_encode($data, JSON_UNESCAPED_UNICODE);    

        }
    
    public function getBar(){
            
            $link = new mysqli("localhost", "root", "", "finClimb");

            /* изменение набора символов на utf8 */
            if (!$link->set_charset("utf8")) {
                printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
                exit();
            } 

            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            } 

            $data = array(); // в этот массив запишем то, что выберем из базы

            $queryBar = "SELECT `nameWeek` AS `Arr_x`,

                        SUM(Summ) AS `Arr_y`

                        FROM `Balance`

                        INNER JOIN `Week` ON Week.idWeek=Balance.idWeek
                        WHERE `idIndicator`='7'
                        GROUP BY Week.idWeek
                        

                            ";

            $result = mysqli_query($link, $queryBar);

            while($row = mysqli_fetch_row($result)){
                $data2[] = $row;
            }
            
            mysqli_free_result($result);   
            
            return json_encode($data2, JSON_UNESCAPED_UNICODE);    

        }
    
    
    //indexFinPortal.tpl    
    public function getBankPosition(){
            
            $link = new mysqli("localhost", "root", "", "finClimb");

            /* изменение набора символов на utf8 */
            if (!$link->set_charset("utf8")) {
            printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
            exit();
            } 

            if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            } 
            
            $currWeek = date('W')-1;
        
            $queryDepPortfolio = "SELECT `Bank` AS `Банк`, `Date` AS `Дата договора`, 
                                    `Description` AS `Вид договора` ,`Summ` AS `Сумма`, 
                                    `Interest` AS `%`, `Term,m` AS `Срок, мес`, 
                                    DATE_ADD(`Date`, INTERVAL `Term,m` Month) AS `Дата погашения`

                FROM `Balance`

                INNER JOIN `Contract` ON Contract.idContract=Balance.idContract
                INNER JOIN `Bank` ON Contract.idBank=Bank.idBank


                WHERE `idIndicator`='5' AND `idWeek`='$currWeek'

                ORDER BY Bank.idBank

            ";

            if($result = mysqli_query ($link, $queryDepPortfolio)){

                while ($row = mysqli_fetch_assoc($result)){

                    $th = '<tr>';
                    $td .= '<tr>';

                    foreach ($row as $key => $value){
                        $th .= '<th class="tdCashPos">'.$key.'</th>';
                        $td .= '<td class="tdCashPos">'.$value.'</td>';
                    }

                    $th .= '</tr>';
                    $td .= '</tr>';   
                }

                mysqli_free_result($result);
            }

            $tableDep = "<table>".$th.$td."</table>";   
        
            $queryCrPortfolio = "SELECT `Bank` AS `Кредитная организация`, `Date` AS `Дата договора`, 
                                    `Description` AS `Вид договора` ,`Summ`*(-1) AS `Сумма`, 
                                    `Interest` AS `%`, `Term,m` AS `Срок, мес`, 
                                    DATE_ADD(`Date`, INTERVAL `Term,m` Month) AS `Дата погашения`

                FROM `Balance`

                INNER JOIN `Contract` ON Contract.idContract=Balance.idContract
                INNER JOIN `Bank` ON Contract.idBank=Bank.idBank


                WHERE `idIndicator`='7' AND `idWeek`='$currWeek'

                ORDER BY Bank.idBank

            ";

            if($result = mysqli_query ($link, $queryCrPortfolio)){

                while ($row = mysqli_fetch_assoc($result)){

                    $th = '<tr>';
                    $td .= '<tr>';

                    foreach ($row as $key => $value){
                        $th .= '<th>'.$key.'</th>';
                        $td .= '<td>'.$value.'</td>';
                    }

                    $th .= '</tr>';
                    $td .= '</tr>';   
                }

                mysqli_free_result($result);
            }

            $bankPortfolio = "<table>".$th.$td."</table>";        

        
            mysqli_close($link);
        
            return json_encode($bankPortfolio, JSON_UNESCAPED_UNICODE); 

        }
  
};

?>