<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#retweets">
                                    <i class="fa fa-retweet"></i> Retweets
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#favs">
                                    <i class="fa fa-star"></i> Favoritos
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="retweets" class="tab-pane active">
                                retweets
                            </div>
                            <div id="favs" class="tab-pane">
                                <form method="post">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <label>ID Tweet</label>
                                                <input type="text" name="id" class="form-control"><br>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-star"></i> Marca como favorito</button>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Cuentas</th>
                                                    <th>Followers</th>
                                                    <th>Tweets</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($twitters as $twitter) { ?>
                                                <tr>
                                                    <td><img src="<?=$twitter['imagen']?>"></td>
                                                    <td><?=$twitter['twitter']?></td>
                                                    <td><?=$twitter['followers']?></td>
                                                    <td><?=$twitter['tweets']?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>