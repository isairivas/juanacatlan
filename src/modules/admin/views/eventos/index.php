
<div style="margin-left: 10px;">
    <a href="/admin/eventos/nuevo"><div class="btn btn-success icon-plus-sign">&nbsp; &nbsp; Nuevo</div></a>
    <br/><br/>
</div>

<div class="widget">
    <div class="widget-content table-container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($registros as $registro): ?>
            <tr >
                <td>
                    <?php echo $registro['nombre']; ?>
                </td>
                <td>
                    <?php echo $registro['fecha']; ?>
                </td>
                  <td class="action-col" style="background-color: <?php echo $registro['color']; ?>;">
                    <span class="btn-group">
                        <a href="/admin/eventos/nuevo?id=<?php echo $registro['id']; ?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a onclick="return _appLib.alerts.confirm({url:'/admin/eventos/delete?id=<?php echo $registro['id']; ?>'});" href="#" class="btn btn-small"><i class="icon-trash"></i></a>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>