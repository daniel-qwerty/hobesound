<?php

class Projects_Widget_Map extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Projects_Widget_Map
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

        $list = Projects_Model_Project::getInstance()->getProyectsMap($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            ?>
            <div class="point" style="top:<?PHP echo $new->ProX; ?>%;left:<?PHP echo $new->ProY; ?>%;" rel="<?PHP echo $new->ProId; ?>">
                <img height="80" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->ProMarker; ?>"
                     alt="<?PHP echo $new->ProTitle; ?>" title="<?PHP echo $new->ProTitle; ?>">
            </div>

        <?php } ?>

        <?PHP
    }

}
