<div class="modal" id="modal_creditos">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title" style="color: white;">Acerca de Ceneco</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="w3-container">
                  <div class="w3-card-4" style="width:100%;">
                    <header class="w3-container w3-light-grey col-12">
                      <h3>Nelson Schleifstein</h3>
                    </header>
                    <img src="{{asset('img/nelson.png')}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 50px;height: 55px;">
                    <p>TSU en Informática. Teléfono:<strong>0424-7683789.</strong> Correo:<strong>nslnuptm&#64gmail.com</strong></p>
                    <header class="w3-container w3-light-grey col-12">
                      <h3>Janeth Ramirez</h3>
                    </header>
                    <img src="{{asset('img/janeth.png')}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 50px;height: 55px;">
                    <p>TSU en Informática. Teléfono:<strong>0426-7299744.</strong> Correo:<strong>yarave37&#64gmail.com</strong></p>
                    <header class="w3-container w3-light-grey col-12">
                      <h3>David Rodriguez</h3>
                    </header>
                    <img src="{{asset('img/david.png')}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 50px;height: 55px;">
                    <p>TSU en Informática. Teléfono:<strong>0424-7068110.</strong> Correo:<strong>davidr9511&#64gmail.com</strong></p>
                    <div class="w3-container">
                        <div class="modal fade manual" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <p><strong><h4 class="btn-danger" style="text-align: center;">Manuales de Usuario</h4></strong></p>
                                <p><a href="manuales/MANUALDEUSUARIO.pdf" target="blank">Manual de Usuario</a></p>
                                @role('super-admin')
                                <p><a href="manuales/MANUALDELSISTEMA.pdf" target="blank">Manual del Sistema</a></p>
                                @endrole
                            </div>
                          </div>
                        </div>
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <p><strong><h4 class="btn-danger" style="text-align: center;">Versiónes de Desarrollo</h4></strong></p>
                              <p>Versión de Apache/<strong>2.4.35</strong> OpenSSL/<strong>1.1.1d</strong></p>
                              <p>Versión del cliente del Servidor Web: <strong>libmysql - mysqlnd 5.0.12-dev</strong></p>
                              <p>Versión del Servidor de Base de Datos: <strong>5.7.24 - MySQL Community Server (GPL)</strong></p>
                              <p>Versión de Laravel: <strong>5.8</strong></p>
                              <p>Versión de PHP: <strong>7.3.10</strong></p>
                              <p>Versión de Bootstrap: <strong>4.3.1</strong></p>
                              <p>Versión de jQuery: <strong>3.4.1</strong></p>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".manual"  title="Manuales"><span class="glyphicon glyphicon-book">&nbsp;</span>Manuales</button>
                <button type="button" class="btn btn-warning btn-sm" title="Versiónes de Desarrollo" data-toggle="modal" data-target=".bd-example-modal-sm"><span class="glyphicon glyphicon-info-sign">&nbsp;</span>Versión de Desarrollo</button>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <p><?php $copyright="<p class='copy text-muted'>&copy; 2019 Aporte de la Universidad Politécnica Territorial Kléber Ramirez a la comunidad de CENECO.</p>"; echo $copyright;?></p><p class="text-muted" style="text-decoration: none;font-size: 10px;">ver. 3.0</p>
            </div>
        </div>
    </div>
</div>