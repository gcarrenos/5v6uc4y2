<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Input Zipcodes</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <style type="text/css">

        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        
        </style>
        
    <body>
        <div class="container">
        <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" id="helloVoiq" style="background:#f5f5f5; margin-top:50px;border-radius:10px; border-color:#333; box-shadow:1px 3px 3px #999; padding: 10px 20px;">
        <fieldset>

        <!-- Form Name -->
        <legend>voiq test</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="agent1">Agent 1</label>  
          <div class="col-md-4">
          <input id="agent1" name="agent1" type="number" min="5" placeholder="Zip code" value="85383" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="agent2">Agent 2</label>  
          <div class="col-md-4">
          <input id="agent2" name="agent2" type="number" min="5" placeholder="Zip code" value="31410" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="match"></label>
          <div class="col-md-4">
            <button id="match" name="match" class="btn btn-primary">Match</button>
          </div>
        </div>

        </fieldset>
        </form>

        </div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
  <h2>Match Results</h2>
  <p>Each Zipcode # was added and subscrated by 9000, results below are the zipcodes that matched. </p>
  <table class="table table-striped" style="display:none">
    <thead>
      <tr>
        <th>AgentId</th>
        <th>Contact Name</th>
        <th>Contact Zip Code</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>
</div>

</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


         <script type="text/javascript">
        $( document ).ready(function() {

            $( "#helloVoiq" ).submit(function( event ) {
              event.preventDefault();
              $.ajax({
                  url:"/crossData",
                  type:"POST",
                  data: JSON.stringify({ zip1: $("#agent1").val(), zip2: $("#agent2").val() }),
                  contentType:"application/json; charset=utf-8",
                  dataType:"json",
                  success: function(data){

                    $.each( data, function( key, value ) {
                        var llavero = key+1
                        $.each( data[key], function( llave, value ) {
                          $("table.table tbody").append("<tr> <td>"+llavero+"</td> <td>"+value.name+"</td> <td>"+value.zipcode+"</td> </tr>")
                        })
                    })

                    $("table.table").fadeIn();


                  }
                })
            });

        });
        </script>


    </body>
</html>
