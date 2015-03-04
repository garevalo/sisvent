
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		@section('css')

		    {{ HTML::style('css/bootstrap.min.css') }}
                    {{ HTML::style('css/font-awesome.min.css')}}
                    {{ HTML::style('css/weather-icons.min.css') }}
                    {{ HTML::style('css/beyond.min.css') }}
                    {{ HTML::style('css/demo.min.css') }}
                    {{ HTML::style('css/typicons.min.css') }}
                    {{ HTML::style('css/animate.min.css')}}
                    {{  HTML::script('js/skins.min.js')  }}
                    
          	
		@show
                
                @section('js')

                    {{  HTML::script('js/jquery-2.0.3.min.js')  }}
                    {{  HTML::script('js/jquery.ui/jquery-ui.js')  }}
                    {{  HTML::script('js/bootstrap.min.js') }}
                    {{  HTML::script('js/slimscroll/jquery.slimscroll.min.js')  }}
                    {{  HTML::script('js/beyond.min.js')  }}
                    {{  HTML::script('js/bootbox/bootbox.js')  }}
                    
                    
			
		@show
		<title>
			@section('title')
				Master Blade
			@show

		</title>	

	</head>
	
   <body>
    
    
       
    <div class="loading-container loading-active">
        <div class="loader"></div>
    </div>

    
                @include('layouts/alerts')
   	       	@include('layouts/head')
            
            
                
                
                
   	       	<div class="main-container container-fluid">

                  <div class="page-container">
                    
                     
                     <div class="page-content" style="margin-left:0px;">
                        @if(isset(Auth::user()->usuario))
                        <div class="page-breadcrumbs">
                          <ul class="breadcrumb">
                              <li>
                                  <i class="fa fa-home"></i>
                                  <a href="{{url("dashboard")}}">Inicio</a>
                              </li>
                              <li>
                                  <a href="#">@if(isset($subtitulo)) {{$subtitulo}} @endif</a>
                              </li>
                              <!--<li class="active">Modals and Wells</li>-->
                          </ul>
                        </div>
                     
                        <div class="page-header position-relative">
                             <div class="header-title">
                                 <h1>
                                     @if(isset($subtitulo)) {{$subtitulo}} @endif
<!--                                     <small>
                                         <i class="fa fa-angle-right"></i>
                                         modals and wells
                                     </small>-->
                                 </h1>
                             </div>
                             
                         </div>
                        @endif
                         <div class="page-body">
                            <div class="row">
                               
                              <div class="col-lg-12 col-sm-12 col-xs-12">
                                 @yield('content')
                              </div>

                            </div>

                         </div>
        
                     </div>
                     
                  </div>
   	       	 	
   	       	</div>
            

   	       @include('layouts/footer')
 
		
   </body>
		
</html>

	
