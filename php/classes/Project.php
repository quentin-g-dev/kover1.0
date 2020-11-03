<?

class Project {
    private $_projName, $_projId, $_userId, $_projVersions;
    
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

    public function projVersions(){
        return $this->_projVersions;
    }

    // SETTERS

    public function setProjName($name){
        $this->_projName = $name;
        return;
    }

    public function setProjId($id){
        $this->_projId = $id;
        return;
    }

    public function setUserId($id){
        $this->_userId = $id;
        return;
    }

    public function setProjVersions($versions){
        $this->_projVersions = $versions;
        return;
    }
}