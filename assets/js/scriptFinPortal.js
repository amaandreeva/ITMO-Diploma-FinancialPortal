;
$(function() {
    $('#btn-fp-1-1').click(function() {
    
        console.log("клик!"); //проверка
        
        var action1 = "overView";
        getAjax(action1);
    });



function getAjax(action1) {

    var request = $.ajax({
        url: "index.php",
        method: "GET",
        data: {controller : "Controller", action : action1 },
        dataType: "json"
    });

    request.done(function( serverData ){
        console.log(serverData); //проверка
        
        var element = serverData;
        console.log(element);

        var table = element['bp']+element['liw']+element['blnc']; 
        
        $( "#renderOverView" ).html(table);
    });

    request.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

};

});

$(function() {
    $('#btn-fp-1-1').click(function() {

        var action = "graph";
        getAjax(action);        
    });

function getAjax(actionName){

    var request = $.ajax({
        url: "index.php",
        method: "GET",
        data: {controller : "Controller", action : actionName },
        dataType: "json"
    });

    request.done(function( serverData ){      

        var element = serverData;    

        function processData() {

          var x = [], y = [], standard_deviation = [];

          for (var i=0; i<element.length; i++) {
                row = element[i];
                x.push( row[0] );
                y.push( row[1] );
          }
          makePlotly( x, y, standard_deviation );
        };

        function makePlotly( x, y, standard_deviation ){
            
            var plotDiv = document.getElementById("plot");
            var traces = [{
                x: x,
                y: y
            }];

            Plotly.newPlot('plotOverView', traces, {title: 'NetDebt'});
        };

        processData();    
    });
  
    request.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

};

});

$(function() {
    $('#btn-fp-2-2').click(function() {
    
        console.log("клик!"); //проверка
        
        var action2 = "bankPosition";
        getAjax(action2);
    });



function getAjax(action2) {

    var request = $.ajax({
        url: "index.php",
        method: "GET",
        data: {controller : "Controller", action : action2 },
        dataType: "json"
    });

    request.done(function( serverData ){
        console.log(serverData); //проверка
        
        var element = serverData;
        
        console.log(element);
        
        $( "#renderCashPos" ).html(element);
    });

    request.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

};

});

$(function() {
    $('#btn-fp-2-2').click(function() {
        
        console.log("клик!");
        
        var action = "bar";
        getAjax(action);        
    });


function getAjax(actionName){

    var request = $.ajax({
        url: "index.php",
        method: "GET",
        data: {controller : "Controller", action : actionName },
        dataType: "json"
    });

    request.done(function( serverData ){      

        var element = serverData;
        console.log(element); 
        
        

        function processData() {

          var x = [], y = [], standard_deviation = [];

          for (var i=0; i<element.length; i++) {

            row = element[i];
            x.push( row[0] );
            y.push( row[1] );
          }

          console.log( 'X',x, 'Y',y, 'SD',standard_deviation );
            
          makePlotly( x, y, standard_deviation );
        };

        function makePlotly( x, y, standard_deviation ){
            
//            var plotDiv = document.getElementById("plot");
            var traces = [{
                x: x,
                y: y
            }];

            Plotly.newPlot('plotCashPos', traces, {title: 'Debt'});
        };

        processData();    
    });

    request.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

};

});