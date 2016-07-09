<?php

class Projects_Widget_ProjectList extends Com_Object {

    private $lan;
    private $limit;
    private $cliId;

    /**
     *
     * @return Projects_Widget_ProjectList
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

            <li>
                <a href="http://neblux.com">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-responsive"
                                 src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->ProImage; ?>"
                                 alt=""/>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Nombre de proyecto:</strong><?PHP echo $new->ProTitle; ?></p>
                            <p><strong>Servicios prestados:</strong><?PHP echo $new->ProServices; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><?PHP echo $new->ProResume; ?></p>
                        </div>
                    </div>
                </a>
            </li>
            <?php
        }
    }

}
