
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		@section('css')

			
            {{ HTML::style('css/bootstrap.min.css') }}
            {{ HTML::style('font-awesome/css/font-awesome.css')}}
            {{ HTML::style('css/animate.min.css')}}
            {{ HTML::style('css/beyond.min.css') }}

            {{ HTML::style('css/demo.min.css') }}
            {{ HTML::style('css/typicons.min.css') }}
            {{ HTML::style('css/weather-icons.min.css') }}
			
		@show
		<title>
			@section('title')
				Master Blade
			@show

		</title>	

	</head>
	
   <body class="pace-done">


   	<div id="wrapper">
   	    
   	    @include('layouts/nav')

   	    <div id="page-wrapper" class="gray-bg">
   	       	
   	       	@include('layouts/head')

   	       	<div class="wrapper wrapper-content">
   	       	 	@yield('content')
   	       	</div>


   	       @include('layouts/footer')
      
		</div>
	</div>		


		@section('js')

			{{  HTML::script('js/jquery-2.0.3.min.js')  }}
            {{  HTML::script('js/bootstrap.min.js') }}

            {{  HTML::script('js/analytics.js')  }}
            {{  HTML::script('js/beyond.min.js')  }}

            {{  HTML::script('js/skins.min.js')  }}
            {{  HTML::script('js/bootbox/bootbox.js')  }}

         <!--   {{  HTML::script('js/plugins/jquery-ui/jquery-ui.min.js')  }} -->

			
			
		@show
   </body>
		
</html>

	
