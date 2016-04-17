<?php
    require_once("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf8" />
		<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge" />
		<meta name="viewport" content="
			width=device-width,
			initial-scale=1,
			maximum-scale=1,
			user-scalable=no" />
		
		<title>Homepage</title>
		
		<link rel="stylesheet" href="template/css/bootstrap.css" />
		<script type="text/javascript" src="template/js/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="template/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="template/js/script.js"></script>
		
	</head>
	<body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Toggle del menu quando in mobile -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- TODO: aggiungere il logo -->
                    <a class="navbar-brand" href="#">
                        <img alt="Cardano Pavia" src="template/images/logo.png" />
                    </a>
                </div>
                
                <!-- Link di navigazione -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./">Pagina Principale</a></li>
                        <li><a href=""></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- TODO: Implementare login handler -->
                        <?php if(true) { ?>
                        <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#modal-login">Accedi</button>  
                        <?php } else { ?>
                        <p class="navbar-text">Eseguito accesso come <?php echo("Utente") ?></p>
                        <?php } ?>
                    </ul> <!-- /.navbar-right -->
                </div> <!-- /.collapse navbar-collapse -->
            </div> <!-- /.container-fluid -->
            
            <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-label-login">
                <form class="form-horizontal" id="modal-login-form">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-label-login">Accedi</h4>
                            </div> <!-- /.modal-header -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="inputUsername" class="col-sm-2 control-label">Nome Utente</label>
                                    <div class="col-sm-10">
                                        <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Username" />
                                        <p class="help-block">Inserisci il tuo nome utente</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" />
                                        <p class="help-block">Inserisci la tua password</p>
                                    </div>
                                </div>
                            </div> <!-- /.modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-primary" id="modal-login-submit" data-loading-text="Attendere..." autocomplete="off">Accedi</button>
                            </div> <!-- /.modal-footer -->
                        </div> <!-- /.modal-content -->
                    </div> <!-- /.modal-dialog -->
                </form> <!-- /form.form-horizontal -->
            </div> <!-- /.modal fade -->
        </nav> <!-- /.navbar -->