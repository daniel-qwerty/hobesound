<?php

class Sports_Widget_Gallery extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Sports_Widget_Gallery
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function render() {
        
        $list = Sports_Model_Sport::getInstance()->getList($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
                ?>

                

                <li><a href=""><img class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->SpoImage; ?>"></a></li>

            <?php 
               
            
        }
    }

}
