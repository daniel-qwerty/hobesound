<?php

class Projects_Model_Project extends Com_Module_Model {

    /**
     *
     * @return Projects_Model_Project 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj,$languages, $image, $marker) {

        $db = new Entities_Project();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->ProId = $id;
            $db->ProLanId = $language->LanId;
            $db->ProTitle = $obj->Title;
            $db->ProServices = $obj->Services;
            $db->ProCusId = $obj->Client;
            $db->ProPeriod = $obj->Period;
            $db->ProParticipation = $obj->Participation;
            $db->ProResume = $obj->Resume;
            $db->ProDescription = $obj->Description;
            $db->ProDateStart = $obj->DateStart;
            $db->ProDateEnd = $obj->DateEnd;
            $db->ProImage = $image;
            $db->ProMarker = $marker;
            $db->ProX = $obj->X;
            $db->ProY = $obj->Y;
            $db->ProStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image, $marker) {
        $db = new Entities_Project();
        $db->ProId = $intId;
        $db->ProLanId = $obj->Language;
        $db->ProTitle = $obj->Title;
        $db->ProServices = $obj->Services;
        $db->ProCusId = $obj->Client;
        $db->ProPeriod = $obj->Period;
        $db->ProParticipation = $obj->Participation;
        $db->ProResume = $obj->Resume;
        $db->ProDescription = $obj->Description;
        $db->ProDateStart = $obj->DateStart;
        $db->ProDateEnd = $obj->DateEnd;
        $db->ProStatus = $obj->Status;
        if ($image != "") {
            $db->ProImage = $image;
        }
        if ($marker != "") {
            $db->ProMarker = $marker;
        }
        $db->ProX = $obj->X;
        $db->ProY = $obj->Y;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Project();
        $db->ProId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Project();
        $db->ProId = $intId;
        $db->ProLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByUrl($url, $lanId) {
        $db = new Entities_Project();
        $db->ProUrl = $url;
        $db->ProLanId = $lanId;
        $db->get();
        return $db;
    }
    
    public function getByClient($cli, $lanId) {
        $text = new Entities_Project();
        return $text->getAll($text->getList()->where("ProLanId={$lanId} and ProCusId={$cli}"));
    }

    public function getList($lanId) {
        $text = new Entities_Project();
        return $text->getAll($text->getList()->where("ProLanId={$lanId} ")->andWhere("ProStatus=1"));
    }
    
    public function getProyectsMap($lanId, $limit) {
        $text = new Entities_Project();
        return $text->getAll($text->getList()->where("ProLanId={$lanId} and ProStatus = 1")->limit(0, $limit));
    }
    
    public function getProyect($lanId, $limit, $cliId) {
        $text = new Entities_Project();
        return $text->getAll($text->getList()->where("ProLanId={$lanId} and ProCusId={$cliId} and ProStatus = 1")->limit(0, $limit));
    }

}
