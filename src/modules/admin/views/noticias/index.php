
<div style="margin-left: 10px;">
    <a href="/admin/noticias/nuevo"><div class="btn btn-success icon-plus-sign">&nbsp; &nbsp; Nuevo</div></a>
    <br/><br/>
</div>

<div class="widget">
    <div class="widget-content table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Status</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($registros as $registro): ?>
            <tr>
                <td><?php echo $registro['titulo']; ?></td>
                <td><?php echo $registro['fecha'] ?></td>
                <td><?php echo $registro['status']; ?></td>
                <td class="action-col">
                    <span class="btn-group">
                        <a href="/admin/noticias/edit?id=<?php echo $registro['id']; ?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a onclick="return _appLib.alerts.confirm({url:'/admin/noticias/delete?id=<?php echo $registro['id']; ?>'});" href="#" class="btn btn-small"><i class="icon-trash"></i></a>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>


