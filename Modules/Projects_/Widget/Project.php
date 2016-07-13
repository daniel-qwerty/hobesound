<?php

class Projects_Widget_Project extends Com_Object {

    private $lan;
    private $limit;
    private $cliId;

    /**
     *
     * @return Projects_Widget_Project
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
        $list = Projects_Model_Project::getInstance()->getProyect($this->lan->LanId, 1, $this->cliId);
        foreach ($list as $new) {
            $count++;
            $cli = Customers_Model_Customer::getInstance()->get($new->ProCusId, $this->lan->LanId);
            ?>
            <div class="row">
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
            <p><?PHP echo $new->ProDescription; ?></p>
            <p class="text-center">
                <img src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?PHP echo $new->ProImage; ?>" alt=""/>
            </p>

            <div class="row">
                <?php
                Projects_Widget_ProjectGallery::getInstance()->setLan($this->lan)->setProject($new->ProId)->render();
                ?></div>
                <?php
            }
        }

    }
    