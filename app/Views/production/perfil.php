 <?php require_once 'menu.php'; ?>

 <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Perfil de usuario</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> <small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>

                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="" method="post" novalidate>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" readonly placeholder="<?php echo session('nombre'); ?>" />
                                            </div>
                                        </div>
										
										
										 <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido paterno<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" readonly placeholder="<?php echo session('apellido_pat'); ?>" />
                                            </div>
                                        </div>
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Apellido materno<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" readonly placeholder="<?php echo session('apellido_mat'); ?>" />
                                            </div>
                                        </div>
										
									
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo de usuario<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" readonly placeholder="<?php echo session('descripcion'); ?>" />
                                            </div>
                                        </div>
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='text' readonly placeholder="<?php echo session('email'); ?>" type="email" /></div>
                                        </div>
                                                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        <!-- /page content -->
<?php require_once 'footer.php'; ?>