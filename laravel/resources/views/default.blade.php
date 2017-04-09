<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		 {{Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
     {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
     {{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}
        <!-- Custom styles for this template -->
	 {{ Html::style('web_page/cover.css') }}	
   {{ Html::style('web_page/jquery.datetimepicker.css') }}   <!-- Pour le calendrier-->
   <!--agenda-->
   {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
   {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js') }}
   {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js') }}
   {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css') }}
  
    <title>e-connexion</title>

	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
    
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Interface e-connexion</h3>
              <nav>
                @yield('button')
                <!--button type="button" class="btn btn-primary">Connexion</button-->
              </nav>
            </div>
            <br>
          
          @yield('content')
          </div>
          
            @yield('connexion')
        
         
          <!--div class="mastfoot">
            <div class="inner">

             
            </div>
          </div-->
        </div>
        @yield('valider')
      </div>
      
    </div>

     </body>
</html>