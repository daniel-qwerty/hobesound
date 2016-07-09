<?php

class Entities_Client extends Com_Database_Entity{

    public $tableName = "Client";
    public $keyField = "CliId";
    
    public $CliId;
    public $CliName;
    public $CliEmail;
    public $CliGender;
    public $CliBirthday;
    public $CliCountry;
    public $CliPassword;
    public $CliUrl;
    public $CliImage;
    public $CliResume;
    public $CliStatus;
}
