<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Localidades</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Paises</label>
                    <select
                        id="pais"
                        name="pais_codigo"
                        class="custom-select d-block w-100"
                        required
                    >
                        <option value="">Seleccione un País</option>
                        <?php foreach ($context['paises'] as $pais): ?>
                            <option value="<?php echo $pais->pais_codigo; ?>">
                                <?php echo $pais->pais_descripcion; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Departamentos</label>
                    <select
                        id="departamento"
                        name="departamento_codigo"
                        class="custom-select d-block w-100"
                        required
                    >
                        <option value="">Seleccione un Departamento</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ciudades</label>
                    <select
                        id="ciudad"
                        name="ciudad_codigo"
                        class="custom-select d-block w-100"
                        required
                    >
                        <option value="">Seleccione una Ciudad</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Barrios</label>
                    <select
                        id="barrio"
                        name="barrio_codigo"
                        class="custom-select d-block w-100"
                        required
                    >
                        <option value="">Seleccione un Barrio</option>
                    </select>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#departamento').attr('disabled', true);
        $('#ciudad').attr('disabled', true);
        $('#barrio').attr('disabled', true);
        // cargar departamentos al cambiar país
        $('#pais').change(function () {
            cargar_departamentos();
        });
        // cargar ciudades al cambiar departamento
        $('#departamento').change(function () {
            cargar_ciudades();
        });
        // cargar barrios al cambiar ciudad
        $('#ciudad').change(function () {
            cargar_barrios();
        });
    });

    function cargar_departamentos() {
        var pais_codigo = $('#pais').val();
        if(pais_codigo !== null) {
            $.get(`/sistemaua/departamentos/departamentosPorPais/${pais_codigo}`,
                function (departamentos) {
                    $.each(JSON.parse(departamentos), function () {
                        $('#departamento').append(
                            $("<option>")
                                .val(this.departamento_codigo)
                                .text(this.departamento_descripcion)
                        );
                    });
                }
            );
            $('#departamento').attr('disabled', false);
        }
    }

    function cargar_ciudades() {
        var departamento_codigo = $('#departamento').val();
        if(departamento_codigo !== null) {
            $.get(`/sistemaua/ciudades/ciudadesPorDepartamento/${departamento_codigo}`,
                function (ciudades) {
                    $.each(JSON.parse(ciudades), function () {
                        $('#ciudad').append(
                            $("<option>")
                                .val(this.ciudad_codigo)
                                .text(this.ciudad_descripcion)
                        );
                    });
                }
            );
            $('#ciudad').attr('disabled', false);
        }
    }

    function cargar_barrios() {
        var ciudad_codigo = $('#ciudad').val();
        if(ciudad_codigo !== null) {
            $.get(`/sistemaua/barrios/barriosPorCiudad/${ciudad_codigo}`,
                function (barrios) {
                    $.each(JSON.parse(barrios), function () {
                        $('#barrio').append(
                            $("<option>")
                                .val(this.barrio_codigo)
                                .text(this.barrio_descripcion)
                        );
                    });
                }
            );
            $('#barrio').attr('disabled', false);
        }
    }
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>