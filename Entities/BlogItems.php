<?php

class Entities_BlogItems extends Com_Database_Entity_Language{

    public $tableName = "BlogItems";
    public $keyField = "BitemId";
    public $lanField = "BitemLanId";
    
    public $BitemId;
    public $BitemLanId;
    public $BitemBlogId;
    public $BitemTitle;
    public $BitemSubTitle;
    public $BitemAuthor;
    public $BitemImage;
    public $BitemVideo;
    public $BitemLargeText;
    public $BitemSmallText;
    public $BitemDate;
    public $BitemUrl;
    public $BitemStatus;

}
