<?php

class Projects_Widget_ProjectMap extends Com_Object {

    private $lan;
    private $limit;
    private $cliId;

    /**
     *
     * @return Projects_Widget_ProjectMap
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

    public function setClient($cliId) {
        $this->cliId = $cliId;
        return $this;
    }

    public function render() {
        $count = 0;
        $list = Projects_Model_Project::getInstance()->getProyect($this->lan->LanId, $this->limit, $this->cliId);
        foreach ($list as $new) {
            $count++;
            $cli = Customers_Model_Customer::getInstance()->get($new->ProCusId, $this->lan->LanId);
            ?>
            <div class="point" style="top:<?PHP echo $new->ProX; ?>%;left:<?PHP echo $new->ProY; ?>%;" rel="<?PHP echo $new->ProId; ?>">
                <img height="80" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/5772dc00ae80c.png"
                     alt="<?PHP echo $new->ProTitle; ?>" title="<?PHP echo $new->ProTitle; ?>">
            </div>

            <?php
        }
    }

}
