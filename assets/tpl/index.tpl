<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" href="favicon.ico">

        <title>BalanceTarget </title>

        <!-- Bootstrap core CSS -->
        <link href="./assets/css/lib/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="./assets/css/lib/carousel.css" rel="stylesheet">
        <link href="./assets/css/style.css" rel="stylesheet">
        <link href="./assets/css/styleModal.css" rel="stylesheet">
    </head>
<!-- NAVBAR
================================================== -->
    <body>
        <div class="navbar-wrapper">
            <div class="container">

                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php?controller=Controller&action=index">BalanceTarget</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php?controller=Controller&action=index">На главную</a></li>
                                <li><a href="index.php?controller=Controller&action=finPortal">Финансовый портал</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">О компании <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" id="about">Общие сведения</a></li>
                                        <li><a href="#" id="terms">Терминология</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header"></li>
                                        <li><a href="#"><b>Админка</b></a></li>
                                    </ul>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </nav>

            </div>
        </div>
        
        <div id="modal-about"  class="modal">
            <div class="modal-message">
                <a href="" class="close">X</a>
                <h2>Компания BalanceTarget</h2>
                <p class="terms">— это вертикально-интегрированная структура, в которую входят предприятия, реализующие все стадии инвестиционно-строительного процесса. </p>
                <p class="terms">Вот уже 20 лет Компания успешно работает на строительном рынке РФ. Сегодня в Северной столице мы представляем жилую недвижимость классов «комфорт», «бизнес» и «элит». Мы строим в разных районах города, предлагаем квартиры с отделкой «под ключ» и с качественной подготовкой под отделку.</p>
            </div>
        </div>       
        <div id="modal-terms"  class="modal">
            <div class="modal-message">
                <a href="" class="close">X</a>
                <h2>Терминология <small>(согласно кредитной документации)</small></h2>
                <h3>EBITDA</h3><p class="terms">это сумма строк «Результат от операционной деятельности»/«Операционная прибыль», «Процентные расходы», которые были капитализированы в себестоимость строящейся недвижимости, «Финансовые доходы и расходы» и «Амортизация» минус строка «Налоги, кроме налога на прибыль» (с учетом знака в строке возврат налогов увеличивает показатель EBITDA).</p>
                <h3>NetDebt</h3><p class="terms">это сумма строк «Кредиты и займы» из долгосрочных и краткосрочных обязательств за вычетом суммы строк «Денежные средства и их эквиваленты», а также строк «Банковские депозиты» и «Банковские векселя» из примечаний к строкам «Долгосрочные финансовые вложения», «Краткосрочные инвестиции», а также суммы краткосрочных активов Группы, которые были образованы с целью размещения временно свободных денежных средств и получения финансового дохода.</p>
                <h3>DSCR</h3><p class="terms">рассчитывается как сумма ежеквартального дохода Заемщика/Группы (исключая НДС, операционные расходы, налог на прибыль, налог на имущество), деленная на сумму процентов и основного долга по  обязательствам Заемщика/Группы в соответствующем квартале. </p>
                <h3>Debt</h3><p  class="terms">рассчитывается, как сумма строк «Кредиты и займы» из долгосрочных и краткосрочных обязательств Консолидированного отчета о финансовом положении на конец отчетного периода.</p>
            </div>
        </div>
        
        <!-- Carousel
        ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <!--          <img class="first-slide" src="" alt="First slide">-->
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Рейтинговое агенство Standard & Poor’s присвоило компании BalanceTarget в 2018 году</h1>
                            <h3>Долгосрочный кредитный рейтинг B+<br/>
                            Краткосрочный кредитный рейтинг B<br/>
                            Прогноз Стабильный</h3><br/><br/>
                            <p><a class="btn btn-lg btn-default" href="index.php?controller=ControllerNews&action=news" role="button">Смотреть новости &raquo;</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Ключевые показатели</h1>
                            <h3>В данном разделе представлена динамика ключевых показателей эффективности (KPI), рассчитанных на основе финансовой отчетности компании.</h3><br/><br/><br/>
                            <p><a class="btn btn-lg btn-default" href="#" id="btn-kpi" role="button">Смотреть данные &raquo;</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Отчетность</h1>
                            <h3>Индивидуальная отчетность по РСБУ — финансовая отчетность, составленная в соответствии с Российскими стандартами бухгалтерского учета.</h3>
                            <h3>Консолидированная отчетность по МСФО — финансовая отчетность Группы компаний, составленная в соответствии с Международными стандартами.</h3><br/>
                            <p><a class="btn btn-lg btn-default" href="#" id="btn-statements" role="button">Смотреть отчетность &raquo;</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel -->
        
        <div class="container">
           
            <div id="render"></div>
            
        </div>
        <br/>
        <br/>
        <br/>

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

        <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-circle" src="./assets/images/personnel1.png" alt="Generic placeholder image" width="140" height="140">
                    <h4>Малюгин Николай Григориевич</h4>
                    <h4>Генеральный директор</h4>
                    <p>chan.ng@bt.com</p>
                    <p>Тел.: 8(812)9990000</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="./assets/images/personnel2.png" alt="Generic placeholder image" width="140" height="140">
                    <h4>Бугаев Данила Алексеевич</h4>
                    <h4>Финансовый директор</h4>
                    <p>bugaev.da@bt.com.</p>
                    <p>Тел.: 8(812)9990000</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="./assets/images/personnel3.png" alt="Generic placeholder image" width="140" height="140">
                    <h4>Есаулова Рада Михеевна</h4>
                    <h4>Начальник финансового отдела</h4>
                    <p>malyugin.im@bt</p>
                    <p>Тел.: 8(812)9990000</p>
                
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->

        
        <br/><br/><br/>
        <div class="container">
        <!-- FOOTER -->
            <footer>
                <p class="pull-right btn btn-lg btn-success"><a href="#">Наверх</a></p>
                <p>&copy; 2018 BalanceTarget, Inc. </p>
            </footer>
        </div><!-- /.container -->



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="./assets/js/lib/jquery.min.js"></script>
        <script src="./assets/js/lib/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="./assets/js/lib/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./assets/js/lib/ie10-viewport-bug-workaround.js"></script>
        
        <script src="./assets/js/script.js"></script>
        <script src="./assets/js/scriptModal.js"></script>
    
    </body>
</html>