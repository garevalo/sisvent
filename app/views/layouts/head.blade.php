<div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="{{url("dashboard")}}" class="navbar-brand">
                        <small>
                           
                            <h5 class="row-title before-orange" style="margin-top: 2px; width: 120px;"><div class="" style=""><span style="font-size: 25px" class="text-primary"><strong>NCH</strong></span> Perú</div></h5>
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
               
                @if(isset(Auth::user()->usuario))
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" >
                        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
                        <li><a href="#"></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-cog fa-fw"></i> Mantenimiento <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-purple" role="menu">
                                <!--<li><i class='fa fa-edit'></i> {{ link_to('productos/nuevo', "Registrar Productos", $atributos = array('title'=>'registrar producto','tabindex'=>'-1'), $seguro = null);}}</li>-->
                                <li>
                                    <a href="{{url('productos/nuevo', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-list"></i>
                                    Registrar Productos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('usuarios/nuevo', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-user"></i>
                                    Registrar Usuarios
                                    </a>
                                </li>
                                <!--<li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-book"></i> Orden Compra <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-purple" role="menu">
                                
                                <li><a href="{{url('cotizacion', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-list"></i>
                                    Ver Cotizaciones
                                </a></li>
                                <li><a href="{{url('cotizacion', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-list"></i>
                                    Ver Ordenes de Compra
                                </a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-list"></i> Reportes <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-purple" role="menu">
                                
                                <li><a href="" tabindex="-1">
                                    <i class="dropdown-icon fa fa-list"></i>
                                    Ordenes Despachadas
                                </a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#"  role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-list"></i> Acreditación </a>
                            
                        </li>
                        <li class="">
                            <a href="#"  role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-list"></i> Almacén </a>
                            
                        </li>
                    </ul>
                </div>
                 

                <!-- Account Area and Settings --->

                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                           
                           
                            
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="{{ asset('img/user.png');}}">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>Bienvenido {{Auth::user()->usuario}}</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>{{Auth::user()->usuario}}</a></li>
                                    <!--<li class="email"><a>David.Stevenson@live.com</a></li>-->
                                    
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Perfil</a>
                                        <a href="#" class="pull-right">Configuración</a>
                                    </li>
                                    <!--Theme Selector Area-->
                                    
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <?php echo link_to('/logout', "Cerrar Sesión", $atributos = array('title'=>'cerra sesion'), $seguro = null); ?>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            
                            
                        </ul>
                        
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
                @endif
            </div>
        </div>
    </div>