<?php $registro = isset($registro)?$registro:array('status'=>1); ?>

<div id="sidebar-separator"></div>
    <div id="main-content">

        <div class="row-fluid">
            <div class="span12 widget">
                <div class="widget-header">
                    <span class="title"><i class="icon-edit"></i> Ingresa los datos</span>
                </div>
                <div class="widget-content form-container">
                    <form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" >
                        <?php if(isset($registro['id'])): ?>
                        <input type="hidden" name="registro[id]" id="id" value="<?php echo $registro['id']; ?>" />
                        <?php endif; ?>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="titulo">Titulo</label>
                            <div class="controls">
                                <input  type="text"   class="span9" id="titulo" name="registro[titulo]" value="<?php echo isset($registro['titulo']) ? $registro['titulo'] : ''; ?>">
                                <p class="help-block">* El Titulo es obligatorio </p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fecha">Fecha</label>
                            <div class="controls">
                                <input type="text" class="span4 date-picker datepicker-basic" id="link" name="registro[fecha]" value="<?php echo isset($registro['fecha']) ? $registro['fecha'] : ''; ?>">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="contenido">Contenido </label>
                            <div class="controls">
                                <textarea id="input" name="registro[contenido]" style="width: 100%; height: 250px;"><?php echo isset($registro['contenido'])?$registro['contenido']:''; ?></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="imagen">Imagen</label>
                            <div class="controls">
                                <?php if(isset($registro['imagen']) && !empty($registro['imagen']) ): ?>
                                <div class="image-thumb-admin"> <img src="<?php echo HOME; ?>/uploads/noticias/<?php echo $registro['imagen']; ?>" /></div>
                                <?php endif; ?>
                                <input type="file" name="registro[imagen]" data-provide="fileinput" />
                                <p class="help-block"> Tama&ntilde;o Maximo: 2 Mg </p>
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="status">Status</label>
                            <div class="controls">
                                <select id="status" name="registro[status]" class="span4 select2-select-00">
                                    <option <?php  echo $registro['status'] == 'ACTIVO'?'selected="selected"':''; ?> value="ACTIVO">ACTIVO</option>
                                    <option <?php  echo $registro['status'] == 'INACTIVO'?'selected="selected"':''; ?> value="INACTIVO">INACTIVO</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-actions" style="float: right;">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
        jQuery(document).ready(function(){
            jQuery('.date-picker').datepicker();
        });
        </script>
       
        
   

