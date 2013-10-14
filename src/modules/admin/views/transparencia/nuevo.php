<?php $registro = isset($registro)?$registro:array('opcion_link' =>1,'status'=>1,'categoria_transparencia_id' => ''); ?>

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
                            <label class="control-label" for="categoria">Categoria</label>
                            <div class="controls">
                                <select id="categoria" name="registro[categoria_transparencia_id]" class="span4 select2-select-00">
                                    <?php foreach($categorias as $categoria): ?>
                                    <option <?php echo $categoria['id'] == $registro['categoria_transparencia_id']?'selected="selected"':''; ?>  value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="nombre">Es Subcategoria</label>
                            <div class="controls">
                                <input type="checkbox" name="registro[is_subcategoria]" value="TRUE" <?php echo (isset($registro['is_subcategoria']) && $registro['is_subcategoria'] == 'TRUE' ) ?'checked="checked"':''; ?> />
                                
                                <p class="help-block"> </p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="nombre">Nombre</label>
                            <div class="controls">
                                <input type="text"  class="span4" id="nombre" name="registro[nombre]" value="<?php echo isset($registro['nombre']) ? $registro['nombre'] : ''; ?>">
                                <p class="help-block">* El Nombre es obligatorio </p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="contenido">Contenido </label>
                            <div class="controls">
                                <textarea  name="registro[contenido]" class="span12" id="contenido" rows="3"><?php echo isset($registro['contenido']) ? $registro['contenido'] : ''; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="link">Link</label>
                            <div class="controls">
                                <input type="text" class="span4" id="link" name="registro[link]" value="<?php echo isset($registro['link']) ? $registro['link'] : ''; ?>">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="imagen">Archivo</label>
                            <div class="controls">
                                <?php if(isset($registro['archivo'])): ?>
                                <div> <a href="<?php echo HOME; ?>/uploads/transparencia/<?php echo $registro['archivo']; ?>" >Descargar</a></div>
                                <?php endif; ?>
                                <input type="file" name="registro[archivo]" />
                                <p class="help-block"> Tama&ntilde;o Maximo: 2 Mg </p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="opcion">Opcion a mostrar</label>
                            <div class="controls">
                                <select id="opcion" name="registro[opcion_link]" class="span4 select2-select-00">
                                    <option <?php  echo $registro['opcion_link'] == 'LINK'?'selected="selected"':''; ?> value="LINK">Link</option>
                                    <option <?php  echo $registro['opcion_link'] == 'ARCHIVO'?'selected="selected"':''; ?> value="ARCHIVO">Archivo</option>
                                </select>
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
        </script>