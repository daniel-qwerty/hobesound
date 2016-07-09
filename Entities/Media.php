<?php

class Entities_Media extends Com_Database_Entity_Language {

    public $tableName = "Media";
    public $keyField = "MedId";
    public $lanField="MedLanId";

    public $MedId;
    public $MedLanId;
    public $MedProId;
    public $MedImage;
    public $MedFooter;
    public $MedYoutube;
    public $MedStatus;

}
