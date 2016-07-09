<?PHP

class BlogItem_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Articulos";
        Com_Helper_BreadCrumbs::getInstance()->add("Articulos", "/Admin/Blog");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/BlogItem/Add");
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
            

            $id = BlogItem_Model_BlogItem::getInstance()->doInsert($this->getPostObject(), $languages, $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/BlogItem/Edit/id/' . $id);
        }
        
        $this->assign('BloId',get('idBlog'));
        $this->assign('Title');
        $this->assign('SubTitle');
        $this->assign('Author');
        $this->assign('Image');
        $this->assign('Video');
        $this->assign('LargeDescription');
        $this->assign('SmallDescription');
        $this->assign('Date');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
        $this->assign('Blog', Blog_Model_Blog::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
        $this->assign('Author', Users_Model_User::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/BlogItem/Add");
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

            BlogItem_Model_BlogItem::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/BlogItem/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = BlogItem_Model_BlogItem::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->BitemId);
        $this->assign("Language", $entity->BitemLanId);
        $this->assign('BloId', $entity->BitemBlogId);
        $this->assign('Title', $entity->BitemTitle);
        $this->assign('SubTitle', $entity->BitemSubTitle);
        $this->assign('Author', $entity->BitemAuthor);
        $this->assign('Image', $entity->BitemImage);
        $this->assign('Video', $entity->BitemVideo);
        $this->assign('LargeDescription', $entity->BitemLargeText);
        $this->assign('SmallDescription', $entity->BitemSmallText);
        $this->assign('Date', $entity->BitemDate);
        $this->assign('Status', $entity->BitemStatus);

        $this->assign("languages", $languages);
        
        $this->assign('Blog', Blog_Model_Blog::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
        $this->assign('Author', Users_Model_User::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
    }

    public function Delete() {
        BlogItem_Model_BlogItem::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/BlogItem');
    }

}

?>