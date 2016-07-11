<?php

class Projects_Widget_Content extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Projects_Widget_Content
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
        $count = 0;
        $list = Projects_Model_Project::getInstance()->getProyectsMap($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            $count++;
            $cli = Customers_Model_Customer::getInstance()->get($new->ProCusId, $this->lan->LanId);
                ?>

                <div class="col-lg-6 p-datasheet bg-white <?= ($count==1)?'active':'' ?>" rel="<?PHP echo $new->ProId; ?>">
                    <div class="row" style="padding: 0">

                        <div class="col-md-9">
                            <h2>Ficha tecnica</h2>

                            <p><strong>Nombre de proyecto:</strong><?PHP echo $new->ProTitle; ?></p>

                            <p><strong>Cliente:</strong><?PHP echo $cli->CusName; ?></p>

                            <p><strong>Servicios prestados:</strong><?PHP echo $new->ProServices; ?></p>

                            <p><strong>Periodo:</strong><?PHP echo $new->ProPeriod; ?></p>

                        </div>
                        <div class="col-md-3">
                            <img style="width: 100%; height: auto" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $cli->CusLogo; ?>" alt=""/>
                        </div>

                    </div>

                    <img class="visible-lg hidden-xs" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->ProImage; ?>" alt=""/>
                    <p><a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "projects/list/" .$cli->CusId); ?>">Ver mas</a></p>
                </div>

            <?php 
               
            
        }
    }

}
