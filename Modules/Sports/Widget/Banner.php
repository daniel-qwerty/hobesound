<?php

class Sports_Widget_Banner extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Sports_Widget_Banner
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


        if ($this->limit == 'POLO') {
            ?>
            <section id="season" class="container content-section">

                <div class="container">
                    <h2 class="text-red text-center color-2"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'titleSeasonPolo')->TxtDescription; ?></h2>
                    <div class="col-md-6 p-content text-center">
                        <h3>PRACTICES:</h3>
                        MONTH: $1.500/ PLAYER </br>    
                        3 PRACTICE/WEEK </br> 

                    </div>
                    <div class="col-md-6 p-content text-center">
                        <h3>TOURNAMENTS:</h3>
                        4 – 6  GOAL   $ 2,000/ TEAM </br> 
                        8 GOAL    $ 3.500/ TEAM </br> 

                    </div>


                    <h3 class="text-red text-center color-2 hidden"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'subTitleSeason')->TxtDescription; ?></h3>

                    <div class="row bg-white">
                        <div class="col-md-4 p-content bg-color-5 text-center">
                            <a href="http://aapolo.com/"><img
                                    src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/aapolo.jpg"></a>
                        </div>
                        <div class="col-md-4 p-content bg-color-5 text-center">
                            <a href="http://uspolo.org/"><img
                                    src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/uspolo.jpg"></a>
                        </div>
                        <div class="col-md-4 p-content bg-color-5 text-center">
                            <a href="http://www.ipc.com/"><img
                                    src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/ipc.jpg"></a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12 p-content text-center">
                            <img class="img-responsive" style="
                                 max-width: 550px;
                                 margin: auto;
                                 "
                                 src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/schedule.jpg"></a>
                        </div>

                    </div>

                </div>

            </section>

            <?php
        }

        if ($this->limit == 'JUMPING') {
            ?>
            <section id="season" class="container content-section">

                <div class="container">
                    <h2 class="text-red text-center color-2"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'titleSeason')->TxtDescription; ?></h2>

                    <h3 class="text-red text-center color-2"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'subTitleSeason')->TxtDescription; ?></h3>

                    <div class="row bg-white">
                        <div class="col-md-4 p-content bg-color-5 text-center">
                            <a href="http://www.fedecuarg.com.ar/"><img
                                    src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/fea.jpg"></a>
                        </div>
                        <div class="col-md-4 p-content bg-color-5 text-center">
                            <a href="http://cbh.org.br/"><img
                                    src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/cbh.jpg"></a>
                        </div>
                        <div class="col-md-4 p-content bg-color-5 text-center">
                            <a href="http://fei.org/"><img
                                    src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/fei.jpg"></a>
                        </div>
                    </div>
                </div>

            </section>

            <?php
        }
        if ($this->limit == 'DRESSAGE') {
            ?>
            <section id="season" class="container content-section">

                <div class="container">
                    <h2 class="text-red text-center color-2"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'titleSeason')->TxtDescription; ?></h2>

                    <h3 class="text-red text-center color-2"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'subTitleSeason')->TxtDescription; ?></h3>

                    <div class="row bg-white">
                        <div class="col-lg-12 p-content bg-color-5 text-center">
                            <ul>
                                <li>
                                    <a href="https://www.usef.org/"><img
                                            src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/usef.jpg"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>

            <?php
        }
    }

}
