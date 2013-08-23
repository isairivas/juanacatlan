
<div style="margin-left: 10px;">
    <a href="/admin/transparencia/nuevo"><div class="btn btn-success icon-plus-sign">&nbsp; &nbsp; Nuevo</div></a>
    <br/><br/>
</div>

<div class="widget">
    <div class="widget-content table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Status</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($registros as $registro): ?>
            <tr>
                <td><?php echo $registro['nombre']; ?></td>
                <td><?php echo $registro['categoria'] ?></td>
                <td><?php echo $registro['status']; ?></td>
                <td class="action-col">
                    <span class="btn-group">
                        <a href="/admin/transparencia/edit?id=<?php echo $registro['id']; ?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a onclick="return _appLib.alerts.confirm({url:'/admin/transparencia/delete?id=<?php echo $registro['id']; ?>'});" href="#" class="btn btn-small"><i class="icon-trash"></i></a>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

