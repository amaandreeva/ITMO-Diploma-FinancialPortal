//ajax для главной страницы
//передаем таблицу KPI
$(function() {
    $('#btn-kpi').click(function() {
        
        var action1 = "disclosure";
        getAjax(action1);
    });
});

//передаем верстку пдф-файлов 
$(function() {
    $('#btn-statements').click(function() {

        var action2 = "statements";
        getAjax(action2);

        
    });
});

function getAjax(actionName) {

    var request = $.ajax({
        url: "index.php",
        method: "GET",
        data: {controller : "Controller", action : actionName },
        dataType: "json"
    });

    request.done(function( serverData ){

        var element = serverData;
        $( "#render" ).html(element);
    });

    request.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

};