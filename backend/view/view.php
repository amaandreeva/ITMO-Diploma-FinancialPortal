<?php
//define('TEMPLATE_PATH' , './asset/tpl/');

class View {
    
    public function renderMainPage() {
        include "./assets/tpl/index.tpl";
    }
    
      public function renderFinPortal() {
        include "./assets/tpl/finPortal.tpl";
    }
    
    public function renderStatements() {

    $result='

        <h4>Индивидуальная отчетность по РСБУ BalanceTarget</h4>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2013" height="40"><a href="./assets/pdf/rsbu_2013.pdf" height="40">Финансовая отчетность BalanceTarget за 2013 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2014" height="40"><a href="./assets/pdf/rsbu_2014.pdf">Финансовая отчетность BalanceTarget за 2014 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2015" height="40"><a href="./assets/pdf/rsbu_2015.pdf">Финансовая отчетность BalanceTarget за 2015 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2016" height="40"><a href="./assets/pdf/rsbu_2016.pdf">Финансовая отчетность BalanceTarget за 2016 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2017" height="40"><a href="./assets/pdf/rsbu_2017.pdf">Финансовая отчетность BalanceTarget за 2017 год</a><br/><br/><br/>

        <h4>Консолидированная отчетность по МСФО Группы компаний BalanceTarget</h4>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2013" height="40"><a href="./assets/pdf/rsbu_2013.pdf" height="40">Отчетность по МСФО BalanceTarget за 2013 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2014" height="40"><a href="./assets/pdf/rsbu_2014.pdf">Отчетность по МСФО BalanceTarget за 2014 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2015" height="40"><a href="./assets/pdf/rsbu_2015.pdf">Отчетность по МСФО BalanceTarget за 2015 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2016" height="40"><a href="./assets/pdf/rsbu_2016.pdf">Отчетность по МСФО BalanceTarget за 2016 год</a><br/>
            <img src="./assets/images/pdf-icon.png" alt="rsbu_2017" height="40"><a href="./assets/pdf/rsbu_2017.pdf">Отчетность по МСФО BalanceTarget за 2017 год</a><br/>
    ';
        
        return json_encode($result, JSON_UNESCAPED_UNICODE); 
        
    }
    
    public function renderDisclosure($result) {
        include "./assets/tpl/disclosure.tpl";
    }
    
    public function renderTest($result) {
        include "./assets/tpl/test.tpl";
    }  
    
        
};
?>