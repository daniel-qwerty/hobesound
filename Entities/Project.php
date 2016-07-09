<?php

class Entities_Project extends Com_Database_Entity_Language{

    public $tableName = "Project";
    public $keyField = "ProId";
    public $lanField = "ProLanId";
    
    public $ProId;
    public $ProLanId;
    public $ProCusId;
    public $ProTitle;
    public $ProServices;
    public $ProPeriod;
    public $ProParticipation;
    public $ProResume;
    public $ProDescription;
    public $ProDateStart;
    public $ProDateEnd;
    public $ProImage;
    public $ProStatus;
    public $ProMarker;
    public $ProX;
    public $ProY;

}
