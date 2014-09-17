<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#twitter">
                                    <i class="fa fa-twitter"></i> twitter
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#facebook">
                                    <i class="fa fa-facebook"></i> facebook
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#google">
                                    <i class="fa fa-google-plus"></i> google+
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#linkedin">
                                    <i class="fa fa-linkedin"></i> linkedin
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#foursquare">
                                    <i class="fa fa-foursquare"></i> foursquare
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#instagram">
                                    <i class="fa fa-instagram"></i> instagram
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#pinterest">
                                    <i class="fa fa-pinterest"></i> pinterest
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tumblr">
                                    <i class="fa fa-tumblr"></i> tumblr
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#vimeo">
                                    <i class="fa fa-vimeo-square"></i> vimeo
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#youtube">
                                    <i class="fa fa-youtube"></i> youtube
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="twitter" class="tab-pane active">
                                
                                <a href="<?=$twitter_url?>">
                                    <button type="button" class="btn btn-success btn-block">Agregar cuenta</button>
                                </a>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <section id="unseen">
                                                    <table class="table table-responsive table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Imagen</th>
                                                                <th>Cuenta</th>
                                                                <th>Followers</th>
                                                                <th>Tweets</th>
                                                                <th>Acción</th>
                                                                <th>Fecha</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($twitters as $twitter) { ?>
                                                            <tr>
                                                                <td><img src="<?=$twitter['imagen']?>"></td>
                                                                <td><?=$twitter['twitter']?></td>
                                                                <td><?=$twitter['followers']?></td>
                                                                <td><?=$twitter['tweets']?></td>
                                                                <td><a href="/twitter/borrar/<?=$twitter['idtwitter']?>"><button type="submit" class="btn btn-danger">Borrar</button></a></td>
                                                                <td><?=$twitter['timestamp']?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </section>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                
                            </div>
                            <div id="facebook" class="tab-pane">
                                Facebook api, proximamente
                            </div>
                            <div id="google" class="tab-pane">
                                Google+ api, proximamente
                            </div>
                            <div id="linkedin" class="tab-pane">
                                LinkedIn api, proximamente
                            </div>
                            <div id="foursquare" class="tab-pane">
                                Foursquare api, proximamente
                            </div>
                            <div id="instagram" class="tab-pane">
                                
                                <a href="<?=$instagram_url?>">
                                    <button type="button" class="btn btn-success btn-block">Agregar cuenta</button>
                                </a>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <section id="unseen">
                                                    <table class="table table-responsive table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Imagen</th>
                                                                <th>Cuenta</th>
                                                                <th>Followers</th>
                                                                <th>Posts</th>
                                                                <th>Acción</th>
                                                                <th>Fecha</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($instagram as $insta) { ?>
                                                            <tr>
                                                                <td><img height="48px" width="48px" src="<?=$insta['imagen']?>"></td>
                                                                <td><?=$insta['usuario']?></td>
                                                                <td><?=$insta['followers']?></td>
                                                                <td><?=$insta['posts']?></td>
                                                                <td><a href="/instagram/borrar/<?=$insta['idinstagram']?>"><button type="submit" class="btn btn-danger">Borrar</button></a></td>
                                                                <td><?=$insta['timestamp']?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </section>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div id="pinterest" class="tab-pane">
                                Pinterest api, proximamente
                            </div>
                            <div id="tumblr" class="tab-pane">
                                Tumblr api, proximamente
                            </div>
                            <div id="vimeo" class="tab-pane">
                                Vimeo api, proximamente
                            </div>
                            <div id="youtube" class="tab-pane">
                                YouTube api, proximamente
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>