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
                         @if( Auth::user()->idtipo==1 )
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
                                <li>
                                    <a href="{{url('distrito/nuevo', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-wrench"></i>
                                    Registrar Distritos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if( Auth::user()->idtipo==1 || Auth::user()->idtipo==2)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-clipboard"></i> Orden Compra <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-purple" role="menu">
                                
                                <li><a href="{{url('cotizacion', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-list"></i>
                                    Ver Cotizaciones
                                </a></li>
                                <li><a href="{{url('ordencompra', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-list"></i>
                                    Ver Ordenes de Compra
                                </a></li>
                            </ul>
                        </li>
                        @endif
                         @if( Auth::user()->idtipo==1 || Auth::user()->idtipo==2)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-file-text "></i> Reportes <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-purple" role="menu">
                                
                                <li><a href="{{url('reportes/reporte', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa  fa-bar-chart-o blue"></i>
                                    Reporte de Ordenes Despachadas vs No Despachadas
                                </a></li>
                                <li><a href="{{url('reportes/reporteocxdia', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-file-text-o blue"></i>
                                    Reportes de Ordenes de Compra por dia
                                </a></li>

                                <li><a href="{{url('reportes/reportendxdia', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-file-text-o blue"></i>
                                    Reportes de Ordenes de Compra No Despachadas por dia
                                </a></li>

                                <li><a href="{{url('reportes/reportezonasmes', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-bar-chart-o blue"></i>
                                    Reportes de Zonas Despachas Por Mes
                                </a></li>
                            </ul>
                        </li>
                        @endif
                        
                        @if( Auth::user()->idtipo==4 || Auth::user()->idtipo==1 )
                        <li class="">
                            <a href="{{url('acreditacion/lista', $parameters = array(), $secure = null);}}"  role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-paperclip"></i> Acreditación </a>
                            
                        </li>
                        @endif
                        
                        @if( Auth::user()->idtipo==1 || Auth::user()->idtipo==3)
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-folder-open"></i> Almacén<span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-purple" role="menu">
                                
                                <li>
                                    <a href="{{url('almacen/pedido', $parameters = array(), $secure = null);}}" tabindex="-1">
                                        <i class="dropdown-icon fa fa-list"></i> Lista Pedidos de productos
                                    </a>
                                </li>
                                <?php /* <li>
                                    <a href="{{url('almacen/ingreso', $parameters = array(), $secure = null);}}" tabindex="-1">
                                        <i class="dropdown-icon fa fa-list"></i> Registrar Ingresos de productos
                                    </a>
                                </li> */ ?>
                            </ul>
                        </li>
                        @endif
                         @if( Auth::user()->idtipo==1 || Auth::user()->idtipo==5)
                        <li class="">
                            <a href="{{url('despacho', $parameters = array(), $secure = null);}}"  role="button" aria-expanded="false"  style="font-size:15px; color:white; "><i class="fa fa-truck"></i> Despacho </a>
                            
                        </li>
                        @endif
                    </ul>
                </div>
                 

                <!-- Account Area and Settings -->
                
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                           
                            
                            <?php /*
                            <li>
                                <a class="wave in dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                    <i class="icon fa fa-envelope"></i>
                                    <span class="badge">3</span>
                                </a>
                                <!--Messages Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/avatars/divyia.jpg" class="message-avatar" alt="Divyia Austin">
                                            <div class="message">
                                                <span class="message-sender">
                                                    Divyia Austin
                                                </span>
                                                <span class="message-time">
                                                    2 minutes ago
                                                </span>
                                                <span class="message-subject">
                                                    Here's the recipe for apple pie
                                                </span>
                                                <span class="message-body">
                                                    to identify the sending application when the senders image is shown for the main icon
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/avatars/bing.png" class="message-avatar" alt="Microsoft Bing">
                                            <div class="message">
                                                <span class="message-sender">
                                                    Bing.com
                                                </span>
                                                <span class="message-time">
                                                    Yesterday
                                                </span>
                                                <span class="message-subject">
                                                    Bing Newsletter: The January Issue‏
                                                </span>
                                                <span class="message-body">
                                                    Discover new music just in time for the Grammy® Awards.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/avatars/adam-jansen.jpg" class="message-avatar" alt="Divyia Austin">
                                            <div class="message">
                                                <span class="message-sender">
                                                    Nicolas
                                                </span>
                                                <span class="message-time">
                                                    Friday, September 22
                                                </span>
                                                <span class="message-subject">
                                                    New 4K Cameras
                                                </span>
                                                <span class="message-body">
                                                    The 4K revolution has come over the horizon and is reaching the general populous
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul> 
                                <!--/Messages Dropdown-->
                            </li>
                            */ ?>
                            


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
                                   <?php /* <li class="email"><a>David.Stevenson@live.com</a></li>*/ ?>
                                    <?php /* 
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Perfil</a>
                                        <a href="#" class="pull-right">Configuración</a>
                                    </li>
                                    */ ?>
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