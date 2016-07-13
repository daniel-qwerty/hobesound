<?php

class Projects_Widget_ProjectGallery extends Com_Object
{

    private $lan;
    private $limit;
    private $proId;

    /**
     *
     * @return Projects_Widget_ProjectGallery
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setProject($proId)
    {
        $this->proId = $proId;
        return $this;
    }

    public function render()
    {
        $list = Projects_Model_Media::getInstance()->getListByProject($this->proId, $this->lan->LanId);
        //print_r($list);
        foreach ($list as $item) {
            ?>

            <div class="col-xs-6 col-md-3">
                <a href="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->MedImage; ?>" data-lightbox="roadtrip" class="thumbnail">
                    <img class="gallery-item"
                        src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->MedImage; ?>"
                        alt="item">
                </a>
            </div>









        <?php
        }
    }

}
