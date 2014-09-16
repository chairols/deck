<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a<?=($segment=='cuentas')?" class='active'":""?> href="/cuentas/">
                        <i class="fa fa-users"></i> Cuentas
                    </a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-tasks"></i>
                        <span>Acciones Individuales</span>
                    </a>
                    <ul class="sub">
                        <li<?=($segment=='twitter')?" class='active'":""?>>
                            <a class="active" href="/twitter/">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </div>
    </div>
</aside>