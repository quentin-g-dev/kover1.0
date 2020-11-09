<?

class Project {
    private $_projName, $_projId, $_userId;
    
    // GETTERS

    public function projName(){
        return $this->_projName;
    }

    public function projId(){
        return $this->_projId;
    }

    public function userId(){
        return $this->_userId;
    }

    // SETTERS

    public function setProjName($name){
        $this->_projName = $name;
        return;
    }

}