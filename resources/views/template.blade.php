<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titre')</title>
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
        {!! Html::style('css/style.css'); !!}
        {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'); !!}
    </head>
    <body>
        <div class="container text-center">
          <div class="row" id="login-container">
            <div class="">
               <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">@yield('titrehead')</h3>
                  </div>
                  <div class="panel-body text-center">
                    @yield('contenu') 
                    </br></br>
                    <div class="btn-group-vertical" role="group">
                        @yield('buttons')
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <p>Copyright - Olivier Lajoie - Système de gestion médical</p>
        </div>
    </body>
</html>