            <div id="menu" class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li><a href="/"><i class="fa fa-home fa-fw"></i> {{ Lang::get('site.inicio') }}</a></li>
                        <li><a href="/ofertas"><i class="fa fa-share-alt fa-fw"></i> {{ Lang::get('site.ofertas') }}</a></li>
                        <li><a href="/demandas"><i class="fa fa-life-ring fa-fw"></i> {{ Lang::get('site.demandas') }}</a></li>
                        @if (Sentry::check())
                            <li><a href="/intercambios"><i class="fa fa-exchange fa-fw"></i> {{ Lang::get('site.intercambios') }}</a></li>
                        @endif
                        <li><a href="/tallers"><i class="fa fa-users fa-fw"></i> {{ Lang::get('site.talleres') }}</a></li>

                        @section('sidebarContent')
                        @show

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
