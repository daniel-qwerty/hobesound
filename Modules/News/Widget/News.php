<?php

class News_Widget_News extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return News_Widget_News 
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

        $list = News_Model_New::getInstance()->getList($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            ?>


            <div class="col-sm-3 bg-white">
                <img src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->NewImage; ?>" alt=""/>

                <h2><?PHP echo substr($new->NewTitle, 0, 90) ?></h2>
                <span><?PHP echo $new->NewDate; ?></span>

                <p class="p-content"><?PHP echo $new->NewDescription; ?></p>
                <p><a class="mas page-scroll" href="#noticias" rel="<?PHP echo $new->NewId; ?>">Leer mas</a></p>
            </div>
        <?php
        }
    }

}
