<?php 

class BaseService{

    protected $dao;

    public function get_by_id($id){
        return $this->dao->get_by_id($id);
    }
    public function add($data){
        return $this->dao->add($data);
    }
    public function update($id, $data){
        $this->dao->update($id, $data);
        return $this->dao->get_by_id($id);  
    }
    public function get_all(){
        return $this->dao->get_all();
    }
   

}

?>