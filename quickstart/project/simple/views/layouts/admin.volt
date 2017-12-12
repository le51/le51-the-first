<body class="hold-transition skin-blue sidebar-mini  fixed">
    <div class="wrapper">
        <header class="main-header">
            {{ link_to('dashboard','<span class="logo-mini"><strong>AP</strong></span>
                <span class="logo-lg"><strong>Admin Panel</strong></span>','class':'logo hidden-xs')}}
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>{{ link_to('about','About')}}</li>
                        {% if session.auth %}
                            <li>{{ link_to('auth','Log Out','class':'')}}</li>
                         {% endif %}
                    </ul>
                </div>
            </nav>
        </header>



        <aside class="main-sidebar">
                                <section class="sidebar">
                                    <ul class="sidebar-menu">
                                        <li class="header">Generate</li>
                                                 <li class="">
                                                    {#{ link_to("#", '<i class="fa fa-plus"></i> <span>Generate</span>', 'class':'generate') }#}
                                                    <a><i class="fa fa-plus"></i> <span class="model">Model</span></a>
                                                </li>
                                                <li class="">
                                                    {#{ link_to("#", '<i class="fa fa-plus"></i> <span>Generate</span>', 'class':'generate') }#}
                                                    <a class="scaffold"><i class="fa fa-plus"></i> <span>Scaffold</span></a>
                                                </li>
                                        <li class="header">CONTROLLERS</li>
                                                    {% for controller in controllers|sort %}
                                                        <li {% if this.router.getControllerName() == controller %} class="active"{% endif %}>
                                                            {{ link_to(controller[1],'<i class="fa fa-cog"></i> ' ~ controller[0]) }}
                                                        </li>
                                                    {% endfor %}
                                        <li class="header">Links</li>
                                                <li class=""><a href="https://github.com/phalcon/phalcon-devtools" target="_blank"><i class="fa fa-book"></i> <span>Phalcon DevTools</span></a></li>
                                                <li class=""><a href="https://github.com/phalcon/incubator" target="_blank"><i class="fa fa-book"></i> <span>Phalcon Incubator</span></a></li>
                                                <li class=""><a href="https://docs.phalconphp.com/" target="_blank"><i class="fa fa-book"></i> <span>Phalcon Docs</span></a></li>
                                                <li class=""><a href="https://zephir-lang.com/" target="_blank"><i class="fa fa-book"></i> <span>Zephir</span></a></li>
                                                <li class=""><a href="https://github.com/phalcon/awesome-phalcon" target="_blank"><i class="fa fa-book"></i> <span>Awesome Phalcon</span></a></li>
                                    </ul>
                                </section>
        </aside>


        <div class="content-wrapper" style="min-height: 560px;">


            <section class="content">
                <section class="invoice sm-content">
                    <div class="row">
                        <div class="col-xs-12">
                            {{content()}}
                        </div>
                    </div>
                </section>
            </section>
        </div>


        <footer class="main-footer">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center hidden-xs">
                    <strong>Phalcon WebTools</strong>.
                    Copyright © 2011-2017 <a href="https://www.phalconphp.com">Phalcon Team</a>. All rights reserved.<br>
                    <strong>AdminLTE</strong>.
                    Copyright © 2014-2017 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>. All rights reserved.
                </div>
            </div>
        </div>
    </footer>


            <div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>
        </div>
    {{ assets.outputJs() }}

</body>
