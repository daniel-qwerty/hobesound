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
                        <h2 class="text-red text-center color-2">para polo Season open om january 2017</h2>

                        <h3 class="text-red text-center color-2">For more information contact us</h3>

                        <div class="row bg-white">
                            <div class="col-lg-12 p-content bg-color-5 text-center">
                                <ul>
                                    <li>
                                        <a href="http://aapolo.com/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/aapolo.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="http://uspolo.org/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/uspolo.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="http://www.ipc.com/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/ipc.jpg"></a>
                                    </li>

                                </ul>
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
                        <h2 class="text-red text-center color-2">para jumping Season open om january 2017</h2>

                        <h3 class="text-red text-center color-2">For more information contact us</h3>

                        <div class="row bg-white">
                            <div class="col-lg-12 p-content bg-color-5 text-center">
                                <ul>
                                    <li>
                                        <a href="http://www.fedecuarg.com.ar/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/fea.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="http://cbh.org.br/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/cbh.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="http://fei.org/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/fei.jpg"></a>
                                    </li>

                                </ul>
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
                        <h2 class="text-red text-center color-2">para dressage Season open om january 2017</h2>

                        <h3 class="text-red text-center color-2">For more information contact us</h3>

                        <div class="row bg-white">
                            <div class="col-lg-12 p-content bg-color-5 text-center">
                                <ul>
                                    <li>
                                        <a href="https://www.usef.org/"><img src="<?= Com_Helper_Url::getInstance()->getImage(); ?>/Public/usef.jpg"></a>
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


