<?PHP

class Personas_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Links";
        Com_Helper_BreadCrumbs::getInstance()->add("Links", "/Admin/Personas");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Personas/Add");
        if ($this->isPost()) {
            Personas_Model_Personas::getInstance()->doInsert($this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Personas');
        }
       
        $this->assign('Nombre'); 
        $this->assign('Apellido');
        $this->assign('Sexo'); 
        $this->assign('EstadoCivil'); 
        $this->assign('Nacimiento'); 
        $this->assign('Pais'); 
        $this->assign('Direccion'); 
        $this->assign('Telefono'); 
        $this->assign('Celular'); 
        $this->assign('Email'); 
        $this->assign('Documento'); 
        $this->assign('Numero'); 
        $this->assign('Sib'); 
        $this->assign('Status');
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Personas/Add");
        $this->setView("add");
        if ($this->isPost()) {
            Personas_Model_Personas::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Personas');
        }
        $entity = Personas_Model_Personas::getInstance()->get(get('id'));
        
        $this->assign('Nombre', $entity->PerNombre ); 
        $this->assign('Apellido', $entity->PerApellido);
        $this->assign('Sexo', $entity->PerSexo); 
        $this->assign('EstadoCivil', $entity->PerEstadoCivil ); 
        $this->assign('Nacimiento', $entity->PerNacimiento ); 
        $this->assign('Pais', $entity->PerPais ); 
        $this->assign('Direccion', $entity->PerDireccion); 
        $this->assign('Telefono', $entity->PerTelefono); 
        $this->assign('Celular', $entity->PerCelular); 
        $this->assign('Email', $entity->PerEmail); 
        $this->assign('Documento', $entity->PerDocumento); 
        $this->assign('Numero', $entity->PerNumero); 
        $this->assign('Sib', $entity->PerSib); 
        $this->assign('Status', $entity->PerStatus);
        
    }

    public function Delete() {
        Personas_Model_Personas::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Personas');
    }

}

?>