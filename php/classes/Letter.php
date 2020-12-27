<?

class Letter {
    private $_letterId, $_letterAuthorId, $_letterStatus, $_letterContent, $_letterName, $_letterContactId, $_letterGroup, $_letterDateOfCreation, $_letterLastEditDate;

    public function letterId(){
        return $this-> _letterId;
    }
    public function letterAuthorId(){
        return $this-> _letteAuthorId;
    }
    public function letterStatus(){
        return $this-> _letterStatus;
    }
    public function letterContent(){
        return $this-> _letterContent;
    }
    public function letterName(){
        return $this-> _letterName;
    }
    public function letterContactId(){
        return $this-> _letterContactId;
    }
    public function letterGroup(){
        return $this-> _letterGroup;
    }
    public function letterDateOfCreation(){
        return $this-> _letterDateOfCreation;
    }
    public function letterLastEditDate(){
        return $this-> _letterLastEditDate;
    }

    public function setLetterName($name){
        if(isset($name) && htmlspecialchars($name).strlen>0 &&htmlspecialchars($name).strlen<25){
            $this-> _letterName = $name;
        }
    }
    public function setLetterId(){
            $this-> _letterId = $letterId;
    }
    public function setLetterAuthorId(){
            $this-> _letterAuthorId = $letterAuthorId;
    }
    public function setLetterStatus(){
        $this-> _letterStatus = $letterStatus;
    }
    public function setLetterContent(){
        $this-> _letterContent = $letterContent;
    }
    public function setLetterContactId(){
        $this-> _letterContactId = $letterContactId;
    }
    public function setLetterGroup(){
        $this-> _letterGroup = $letterGroup;
    }
    public function setLletterDateOfCreation(){
         $this-> _letterDateOfCreation = letterDateOfCreation;
    }
    public function setLetterLastEditDate(){
        $this-> _letterLastEditDate = letterLastEditDate;
    }
}

?>