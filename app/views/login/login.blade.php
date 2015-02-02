<html >

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
                Iniciar Sesión
            @show

        </title>    

    </head>

   <body>
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">Iniciar Sesión</div>
            <div class="loginbox-social">
                <div class="social-title ">Para acceder debe inicar sesión</div>
               <div class="social-buttons">
                 <!--    <a href="" class="button-facebook">
                        <i class="social-icon fa fa-facebook"></i>
                    </a>
                    <a href="" class="button-twitter">
                        <i class="social-icon fa fa-twitter"></i>
                    </a>
                    <a href="" class="button-google">
                        <i class="social-icon fa fa-google-plus"></i>
                    </a>-->
                    <div class="">
                        <h1><strong class="text-primary">NCH</strong> <span style="font-size:24px;color:gray;"><strong> PERÚ</strong> </span></h1>   
                    </div>
                    
                </div>
            </div>
            <br>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or"></div>
            </div>
            {{ Form::open(array('url' => 'login','class'=>"m-t","role"=>"form"))}}
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="Usuario" required="" name="usuario" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" placeholder="Contraseña" required="" name="contrasena" />
            </div>
            <!--<div class="loginbox-forgot">
                <a href="">Forgot Password?</a>
            </div>-->
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="Login">
            </div>
            {{Form::open()}}
            <!--<div class="loginbox-signup">
                <a href="register.html">Sign Up With Email</a>
            </div>-->
        </div>
        <div class="logobox">
            @if (Session::has('mensaje_login'))
                <span class="label label-warning col-md-12">{{ Session::get('mensaje_login') }}</span>
            @endif

            @if (Session::has('mensaje_registro'))
                <span>{{ Session::get('mensaje_registro') }}</span>
            @endif
        </div>
    </div>


        @section('js')

            {{  HTML::script('js/jquery-2.0.3.min.js')  }}
            {{  HTML::script('js/bootstrap.min.js') }}
            {{  HTML::script('js/slimscroll/jquery.slimscroll.min.js') }}
            {{  HTML::script('js/analytics.js')  }}
            {{  HTML::script('js/beyond.min.js')  }}

            {{  HTML::script('js/skins.min.js')  }}
            {{  HTML::script('js/bootbox/bootbox.js')  }}
       
        @show

    </body>
</html>