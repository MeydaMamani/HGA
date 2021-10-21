<?php
    include('./base.php');
?>
<div class="col-12 text-center mb-4">
    <div class="bd-example">
        <div class="row">
            <div class="col-lg-3 col-sm-2"></div>
            <div class="col-lg-6 col-sm-8 p-4"><br><br>
                <div class="card" style="border-color: #337ab7;">
                    <h5 class="card-header text-white" style="background: #337ab7;">Gestantes Usuarias Nuevas</h5>
                    <div class="card-body">
                        <form name="f1" action="resultados_gestante_usuarias_nuevas.php" method="post" class="_form_gestante">
                            <div class="row">
                                <div class="col-md">
                                    <p style="font-size: 13px;" class="text-start"><b>Ingrese Red: </b></p>
                                    <select class="select_gestante form-select js-example-basic-single" onchange="cambia_distrito()" name="red" id="red" aria-label="Default select example">
                                        <option value="-">Seleccione Red</option>
                                    <?php
                                        require('abrir.php');
                                        $resul_red = "SELECT DISTINCT(Provincia) FROM MAESTRO_HIS_ESTABLECIMIENTO WHERE disa='ayacucho'";
                                        $resul_red = sqlsrv_query($conn, $resul_red);
                                        while ($consulta = sqlsrv_fetch_array($resul_red)){
                                            $Provincia = $consulta['Provincia'];
                                    ?>
                                        <option value="<?php echo $Provincia ?>"><?php echo $Provincia?></option>
                                    <?php
                                        }
                                    ?>
                                        <option value="TODOS">TODOS</option>
                                    </select>
                                </div>
                                <div class="col-md text-mobile">
                                    <p style="font-size: 13px;" class="text-start"><b>Ingrese Distrito: </b></p>
                                    <select class="select_gestante form-select" name="distrito" id="distrito" aria-label="Default select example">
                                        <option value="-">Seleccione Distrito</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="font-size: 13px;" class="text-start"><b>Seleccione mes a evaluar: </b></p>
                                    <select class="select_gestante form-select" name="mes" id="mes" aria-label="Default select example">
                                        <option value="1">ENERO</option>
                                        <option value="2">FEBRERO</option>
                                        <option value="3">MARZO</option>
                                        <option value="4">ABRIL</option>
                                        <option value="5">MAYO</option>
                                        <option value="6">JUNIO</option>
                                        <option value="7">JULIO</option>
                                        <option value="8">AGOSTO</option>
                                        <option value="9">SETIEMBRE</option>
                                        <option value="10">OCTUBRE</option>
                                        <option value="11">NOVIEMBRE</option>
                                        <option value="12">DICIEMBRE</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="col-12 text-center">
                                <button name="Buscar" class="btn text-white" type="button" id="btn_buscar" placeholder="Buscar" style="background: #337ab7;"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>
<script>
    $("#btn_buscar").click(function(){
        var red = $("#red").val();
        var distrito = $("#distrito").val();
        var mes =$("#mes").val();

        if (red != '-' && distrito!='-' && mes!=''){
            document.getElementById("btn_buscar").type = "submit";
        }else if(red == '-'){
            toastr.error('Seleccione una Red', null, {"closeButton": true, "progressBar": true});
        }else if(distrito == '-'){
            toastr.error('Seleccione un Distrito', null, {"closeButton": true, "progressBar": true});
        }
    });
</script>
<script>
  function cambia_distrito(){     
    var $red = $("#red").val();
    $.ajax({
        url: 'distritos.php?id='+$red,
        method: 'GET',
        success: function(data) {
            var distritos = data;
            var expresionRegular = /\s*,\s*/;
            var listaDistritos = distritos.split(expresionRegular);
            var indice = listaDistritos.length-1;
            listaDistritos[indice] = 'TODOS';
            num_distritos = listaDistritos.length 
            document.f1.distrito.length = num_distritos
            for(i=0;i<num_distritos;i++){ 
                document.f1.distrito.options[i].value=listaDistritos[i] 
                document.f1.distrito.options[i].text=listaDistritos[i] 
            } 
        }
    })
  }
</script>
</body>
</html>