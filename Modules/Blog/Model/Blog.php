<?php

class Blog_Model_Blog extends Com_Module_Model {

    /**
     *
     * @return Blog_Model_Blog 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $header, $banner) {

        $db = new Entities_Blog();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->BloId = $id;
            $db->BloLanId = $language->LanId;
            $db->BloTitle = $obj->Title;
            $db->BloUrl = generateUrl($obj->Title);
            $db->BloDescription = $obj->Description;
            $db->BloDate = $obj->Date;
            $db->BloHeader = $header;
            $db->BloBanner = $banner;
            $db->BloStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $header, $banner) {
        $db = new Entities_Blog();
        $db->BloId = $intId;
        $db->BloLanId = $obj->Language;
        $db->BloTitle = $obj->Title;
        $db->BloUrl = generateUrl($obj->Title);
        $db->BloDescription = $obj->Description;
        $db->BloDate = $obj->Date;
        $db->BloStatus = $obj->Status;
        if ($header != "") {
            $db->BloHeader = $header;
        }
        if ($banner != "") {
            $db->BloBanner = $banner;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Blog();
        $db->BloId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Blog();
        $db->BloId = $intId;
        $db->BloLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Blog();
        return $text->getAll($text->getList());
    }

}
