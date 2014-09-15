<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <?=$alerta?>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="panel-body bg-success">
                    <div class="monthly-stats pink">
                        <div class="clearfix">
                            <h4 class="pull-left">¿Cómo funciona?</h4>
                        </div>
                    </div>
                    <div class="timeline">
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <h1 class="red">Paso 1</h1>
                                        <p>Te registras</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <h1 class="red">Paso 2</h1>
                                        <p>Ingresas con tu usuario</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <h1 class="red">Paso 3</h1>
                                        <p>Agrega tus cuentas de Twitter</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                        <h1 class="red">Paso 4</h1>
                                        <p>Programa tus tweets</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-retweet"></i>
                                        </span>
                                        <h1 class="red">Paso 5</h1>
                                        <p>Retwittea con todas tus cuentas</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <h1 class="red">Paso 6</h1>
                                        <p>Marca favoritos con todas tus cuentas</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="panel-body">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon green">
                                            <i class="fa fa-smile-o"></i>
                                        </span>
                                        <h1 class="red">Paso 7</h1>
                                        <p>Disfruta de la aplicación</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-5">
                <div class="panel-body bg-success">
                    <div class="monthly-stats pink">
                        <div class="clearfix">
                            <h4 class="pull-left">Ingresa</h4>
                        </div>
                    </div>
                    <div class="position-center">
                        <form method="post" role="form">
                            <input type="hidden" value="login" name="tipo">
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="usuario" maxlength="100" class="form-control" placeholder="Usuario" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" maxlength="100" class="form-control" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-group-justified btn-primary" value="Ingresar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="panel-body bg-success">
                    <div class="monthly-stats pink">
                       <div class="clearfix">
                           <h4 class="pull-left">Regístrate</h4>
                       </div>
                    </div>
                    <div class="position-center">
                        <form method="post" role="form">
                            <input type="hidden" value="registrar" name="tipo">
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="usuario" maxlength="100" class="form-control" placeholder="Usuario" value="<?=set_value('usuario')?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password1" maxlength="100" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password2" maxlength="100" class="form-control" placeholder="Reingrese Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        @
                                    </span>
                                    <input type="email" name="email1" maxlength="100" class="form-control" placeholder="Email" value="<?=set_value('email1')?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon btn-white">
                                        @
                                    </span>
                                    <input type="email" name="email2" maxlength="100" class="form-control" placeholder="Reingrese Email" value="<?=set_value('email2')?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-group-justified btn-primary" value="Registrarse">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</section>