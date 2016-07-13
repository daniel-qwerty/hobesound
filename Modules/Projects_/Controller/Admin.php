<?PHP

class Projects_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Proyectos";
        Com_Helper_BreadCrumbs::getInstance()->add("Proyectos", "/Admin/Projects");
        
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Projects/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {
  
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $marker = "";
            if (Com_File_Handler::getInstance()->setFile(get("Marker"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $marker = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = Projects_Model_Project::getInstance()->doInsert($this->getPostObject(), $languages, $image, $marker);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects/Edit/id/' . $id);
        }
        $this->assign('Title');
        $this->assign('Services');
        $this->assign('Client');
        $this->assign('Period');
        $this->assign('Participation');
        $this->assign('Resume');
        $this->assign('Description');
        $this->assign('DateStart');
        $this->assign('DateEnd');
        $this->assign('Image');
        $this->assign('Marker');
        $this->assign('X');
        $this->assign('Y');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
        $this->assign('Clients', Customers_Model_Customer::getInstance()->getList());
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Projects/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $marker = "";
            if (Com_File_Handler::getInstance()->setFile(get("Marker"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $marker = Com_File_Handler::getInstance()->getFileName();
                }
            }

            Projects_Model_Project::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image, $marker);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Projects_Model_Project::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->ProId);
        $this->assign("Language", $entity->ProLanId);

        $this->assign('Title', $entity->ProTitle);
        $this->assign('Services', $entity->ProServices);
        $this->assign('Client', $entity->ProCusId);
        $this->assign('Period', $entity->ProPeriod);
        $this->assign('Participation', $entity->ProParticipation);
        $this->assign('Resume', $entity->ProResume);
        $this->assign('Description', $entity->ProDescription);
        $this->assign('DateStart', $entity->ProDateStart);
        $this->assign('DateEnd', $entity->ProDateEnd);
        $this->assign('Image', $entity->ProImage);
        $this->assign('Marker', $entity->ProMarker);
        $this->assign('X', $entity->ProX);
        $this->assign('Y', $entity->ProY);
        $this->assign('Status', $entity->ProStatus);
        $this->assign("languages", $languages);
        
        $this->assign('Clients', Customers_Model_Customer::getInstance()->getList());
    }

    public function Delete() {
        Projects_Model_Project::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects');
    }

    public function Images() {
        Com_Helper_BreadCrumbs::getInstance()->add("Media", "/Admin/Projects/Images");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $fileName = "";
            if (!(Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors())) {
                $fileName = (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image") ? Com_File_Handler::getInstance()->getFileName() : "");
            }

            if (($fileName != "") || (get("Youtube") != "")) {
                Projects_Model_Media::getInstance()->doInsert($this->getPostObject(), $fileName, get('lan'));
                $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects/Images/lan/' . $language . '/id/' . get('id'));
            }

            Projects_Model_Media::getInstance()->doUpdate(get('id'), $this->getPostObject());
        }

        $this->assign('Id', get('id'));
        $this->assign('Image');
        $this->assign('Footer');
        $this->assign('Youtube');
        $this->assign('Images', Projects_Model_Media::getInstance()->getListByProject(get('id'), get('lan')));
        $this->assign("languages", $languages);
        $this->assign("Language", $language);
    }

    public function DeleteMedia() {
        Projects_Model_Media::getInstance()->doDelete(get('media'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects/Images/lan/' . get('lan') . '/id/' . get('id'));
    }

}

?>