<?= \Helpers\UsrFlash::render_all(); ?>
<div class="content">
    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-2">
                <?= $title_page ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Actividad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data)) {
                                for ($i = 0; $i < count($data); $i++) { ?>
                                    <tr>
                                        <td><?= $data[$i]['id']; ?></td>
                                        <td><?= $data[$i]['actividad_economica'] ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm me-2 mb-2" role="group">
                                                <button type="button" value="<?= $data[$i]['id'] ?>" class="btn rounded-pill btn-danger btn-eliminar">
                                                    <i class="si si-trash"></i>
                                                </button>
                                                <button type="button" value="<?= $data[$i]['id'] ?>" class="btn rounded-pill btn-success mx-sm-1 btn-editar">
                                                    <i class="si si-pencil"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <form method="post" action="<?= APP_URI ?>usuario/create_or_update">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="id" name="id" placeholder="Identificador" readonly>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="actividad_economica">Actividad Econ&oacute;mica</label>
                            <input type="text" class="form-control" id="actividad_economica" name="actividad_economica" placeholder="Actividad Economica">
                        </div>
                        <div class="mb-2 text-center">
                            <button type="submit" class="btn btn-alt-primary btn-block">
                                <i class="si si-share"></i>
                                Procesar
                            </button>
                            <button type="reset" class="btn btn-alt-secondary btn-block">
                                <i class="si si-refresh"></i>
                                Limpiar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>