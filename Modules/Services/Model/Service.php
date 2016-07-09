<?php

class Services_Model_Service extends Com_Module_Model {

    /**
     *
     * @return Services_Model_Service  
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $logo, $logogray, $image) {

        $db = new Entities_Services();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->SerId = $id;
            $db->SerLanId = $language->LanId;
            $db->SerTitle = $obj->Title;
            $db->SerUrl = generateUrl($obj->Title);
            $db->SerDescription = $obj->Description;
            $db->SerLogo = $logo;
            $db->SerLogoGray = $logogray;
            $db->SerImage = $image;
            $db->SerStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $logo, $logogray, $image) {
        $db = new Entities_Services();
        $db->SerId = $intId;
        $db->SerLanId = $obj->Language;
        $db->SerUrl = generateUrl($obj->Title);
        $db->SerDescription = $obj->Description;
        
        $db->SerStatus = $obj->Status;
        if ($logo != "") {
            $db->SerLogo = $logo;
        }
        if ($logogray != "") {
            $db->SerLogoGray = $logogray;
        }
        if ($image != "") {
            $db->SerImage = $image;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Services();
        $db->SerId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Services();
        $db->SerId = $intId;
        $db->SerLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Services();
        return $text->getAll($text->getList());
    }
    
    public function getListService($lanId) {
        $db = new Entities_Services();
        return $db->getAll($db->getList()->where("SerLanId={$lanId}"));
    }

}
