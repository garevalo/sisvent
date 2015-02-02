<div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <!--<img src="{{ asset('img/logo.png');}}" alt="">-->
                            <span style="" class="text-primary"><strong>NCH</strong></span> Perú
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                
                <!-- Account Area and Settings --->

                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                           
                           
                             @if(isset(Auth::user()->usuario))
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="assets/img/avatars/adam-jansen.jpg">
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
                            @endif
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                        
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>