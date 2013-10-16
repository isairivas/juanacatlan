<div id="sidebar-separator"></div>
    <div id="main-content">

        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title"><i class="icon-resize-horizontal"></i> Ingresa los datos</span>
                </div>
                <div class="widget-content form-container">
                    <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" >
                        <?php if(isset($registro['id'])): ?>
                        <input type="hidden" name="registro[id]" id="id" value="<?php echo $registro['id']; ?>" />
                        <?php endif; ?>
                        
                        <div class="control-group">
                            <label class="control-label" for="nombre">Nombre del Evento</label>
                            <div class="controls">
                                <input type="text"  class="span4" id="nombre" name="registro[nombre]" value="<?php echo isset($registro['nombre']) ? $registro['nombre'] : ''; ?>">
                                <p class="help-block">* El Nombre es obligatorio </p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fecha">Fecha del Evento</label>
                            <div class="controls">
                                <input type="text" class="span4 date-picker datepicker-basic" id="link" name="registro[fecha]" value="<?php echo isset($registro['fecha']) ? $registro['fecha'] : ''; ?>">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="descripcion">Descripción del Evento </label>
                            <div class="controls">
                                <textarea  name="registro[descripcion]" class="span9" id="registro[descripcion]" rows="2"><?php echo isset($registro['descripcion']) ? $registro['descripcion'] : ''; ?></textarea>
                            </div>
                        </div>

                        <div class="form-actions" style="float: right;">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button class="btn" onclick="return cancel();">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
        function cancel(){
            window.history.back();
            return false;
        }
        </script>