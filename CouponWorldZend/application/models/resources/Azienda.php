<?php

class Application_Resource_Azienda extends Zend_Db_Table_Abstract
{
    protected $_name    = 'azienda';
    protected $_primary  = 'idazienda';
    protected $_rowClass = 'Application_Resource_Azienda_Item';
    
	public function init()
    {
    }
    /*estrae le aziende in base all'id*/
    public function getAziendaById($id){
     
        return $this->find($id);
    }
    /*estrae le aziende in base la partita iva*/
    public function getAziendaBypartitaiva($partitaiva){
        $select=$this->select('')->where( 'partitaiva='.$partitaiva);
        return $this->fetchAll($select);
        
    }
    /*estrae le aziende in base al nome*/
    public function getAziendaByNome($nome){
        $select=$this->select('azienda.*')->where( 'nome = ?',$nome);
        return $this->fetchAll($select);
        
    }
    /* prende lid dell'azienda dal nome */
    public function getIdAziendaByNome($nome){
        
        return $this->fetchAll($this->select('azienda.idazienda')->where( 'nome =?',$nome));
        
    }
    /*resctituisce id dellazienda con quel nome */
    public function getIdAzienda($nome){
        
        return $this->fetchAll($this->select('idazienda')->where( 'nome'.$nome));
 
    }
    public function getAzienda() {
        $select= $this->select();
        return $this->fetchAll($select);

    }
    
    /*inserisci azienda*/
    public function insertAzienda($info){
        $this->insert($info);
        
    }
    
    /*modifica aziende */
    public function updateAzienda($info,$id){
        $this->update($info, $id);
    }
    /*elimina azienda */
    public function deleteAzienda($id){
        $this->delete($id);
    }
    
    
    
    
    
}