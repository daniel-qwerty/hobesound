<?php

class Life_Widget_Icons extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Certifications_Widget_Certification
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setParent($id) {
        $this->parent = $id;
        return $this;
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render() {

        $list = Life_Model_Life::getInstance()->getListCert($this->lan->LanId);

        foreach ($list as $item) {
            ?>
            <li><img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->CerImage; ?>"></li>


            <?PHP
        }
    }

    public function renderPag() {

        $list = Certifications_Model_Certifications::getInstance()->getListCert($this->lan->LanId);
        $count = 0;
        foreach ($list as $item) {
            $count++;
            ?>
            <div class="col-md-2"><a href="javascript:void(0)" onclick="slideServiceTo(<?php echo $count; ?>);"><img class="servicio00 servicio01 img-responsive" alt=""/></a></div>
            
            <?PHP
        }
    }

}
?>
