<script type="text/javascript">

$(function(){
    $(".slim").slimScroll({
        height:'300px'
    });

});

</script>

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
                                <li>
                                    <a href="{{url('categoria/nuevo', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-wrench"></i>
                                    Registrar Categorias
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
                                <li><a href="{{url('reportes/reportemotivonodespacho', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa  fa-bar-chart-o blue"></i>
                                    Reporte Motivo no Despacho
                                </a></li>
                                <li><a href="{{url('reportes/reporteingresosproductos', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <i class="dropdown-icon fa fa-file-text-o blue"></i>
                                    Reporte de Productos Ingresados en Almacén
                                </a></li>
                                <li class="divider"></li>
                                <li><a href="{{url('reportes/reporteniveleficacia', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <strong>
                                    <i class="dropdown-icon fa fa-file-text red"></i>
                                    Nivel de Eficacia Para Cierre de Ventas
                                    </strong>
                                </a></li>
                                <li><a href="{{url('reportes/reportenivelcumplimiento', $parameters = array(), $secure = null);}}" tabindex="-1">
                                    <strong>
                                    <i class="dropdown-icon fa fa-file-text red"></i>
                                    Nivel de Cumplimiento de Despacho
                                    </strong>
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
                           
                            
                            <!-- Notificaciones -->    
                            <script type="text/javascript">
                                $(function(){
                                    notificacion('{{ url("notificaciones"); }}',{{Auth::user()->idtipo}});

                                   var refreshId = setInterval(function() {
                                      notificacion('{{ url("notificaciones"); }}',{{Auth::user()->idtipo}});
                                   }, 9000);
                                   $.ajaxSetup({ cache: false });

                                });
                            </script>
                            <li id="notificaciones"></li>
                            <!-- Fin Notificaciones -->

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