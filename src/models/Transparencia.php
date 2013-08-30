<?php

/**
 * Modelo para la trasparencia
 *
 * @author isai rivas
 */
class Model_Transparencia extends Lib_Mvc_Model {
    public function __construct() {
        parent::__construct('transparencia', 'id');
        
    }
    
    public function getAll(){
        $sql = ' SELECT t.*, c.nombre AS categoria '
             . ' FROM transparencia t '
             . '    LEFT JOIN categorias_transparencia c ON t.categoria_transparencia_id = c.id '
             .' ORDER BY t.id ; ';
        
        $db = parent::getDB();
        $result = $db->query($sql);
        return parent::toArray($result);
        
    }
    
    public function getByCategoria($categoriaId){
        
        if(!filter_var($categoriaId,FILTER_VALIDATE_INT) ){
            return array();
        }
        
        $sql = ' SELECT t.*, c.nombre AS categoria '
             . ' FROM transparencia t '
             . '    LEFT JOIN categorias_transparencia c ON t.categoria_transparencia_id = c.id '
             . " WHERE t.categoria_transparencia_id = {$categoriaId} "
             .' ORDER BY t.id  ; ';
        
        $db = parent::getDB();
        $result = $db->query($sql);
        return parent::toArray($result);
    }
}

