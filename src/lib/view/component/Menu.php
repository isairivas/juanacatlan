<?php

/**
 * Component menu para el menu principal
 *
 * @author isairivas
 */
class Lib_View_Component_Menu {
    
    private $name;
    private $icon;
    private $link;
    private $parent;
    private $active;
    
    private $_childs;
    
    public function __construct($name=NULL,$link=NULL,$icon=NULL,$active=NULL) {
        $this->_childs = array();
        if(!is_null($name)){
            $this->name = $name;
        }
        if(!is_null($link)){
            $this->link = $link;
        }
        if(!is_null($icon)){
            $this->icon = $icon;
        }
        if(!is_null($active) && is_bool($active) ){
            $this->active = $active;
        } else {
        	$this->active = FALSE;
        }
    }
    
    public function addChild( Lib_View_Component_Menu $menuChild){
        $this->_childs[] = $menuChild;
    }
    
    public function getChilds(){
        return $this->_childs;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
    }
    public function setActive($active){
        $this->active = $active;
    }
    public function getActive(){
        return $this->active;
    }
    public function isActive(){
    	if($this->active == TRUE){
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }
}


