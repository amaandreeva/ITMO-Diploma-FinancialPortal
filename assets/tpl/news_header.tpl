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
    </head>
<!-- NAVBAR
================================================== -->
    <body style="background-color: azure">
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
        </div><br/><br/><br/><br/>

        <div class="container">
            <h1>Портал новостей</h1>
            <p> Показывать новостей на странице:
                <a href='index.php?controller=ControllerNews&action=news&cycle=3'> по 3</a>
                <span> | </span>
                <a href='index.php?controller=ControllerNews&action=news&cycle=5'>по 5 </a>
            </p>
        </div>