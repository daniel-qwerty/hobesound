<?php

class Services_Widget_Services extends Com_Object
{

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Services_Widget_Services
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setParent($id)
    {
        $this->parent = $id;
        return $this;
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render()
    {

        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);

        foreach ($list as $item) {


            ?>
            <div>
                <div class="col-lg-6 p-content">
                    <div class="servicio-header">
                        <img class="icono"
                             src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->SerLogo; ?>"
                             alt="f"/>

                        <h2><?php echo $item->SerTitle; ?></h2>
                    </div>
                    <p><?php echo $item->SerDescription; ?></p>


                </div>
                <div class="col-lg-6 p-content visible-lg hidden-xs"
                     style="background: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->SerImage; ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                </div>
            </div>

        <?PHP
        }

    }

    public function renderPag()
    {

        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        foreach ($list as $item) {
            $count++;
            ?>
            <div class="col-xs-2 col-md-2"><a href="javascript:void(0)"
                                              onclick="slideServiceTo(<?= $count - 1; ?>);"><img
                        class="servicio00 servicio0<?php echo $count; ?> img-responsive <?= ($count == 1) ? "" : "black" ?>"
                        alt=""/></a></div>
        <?PHP

        }
    }

    public function getJs()
    {
        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);

        foreach ($list as $index => $item) {
//            echo sprintf('#servicios .servicio0%s{content:url(%s)}', $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogo);
//            echo sprintf('#servicios .servicio0%s.black{content:url(%s)}', $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogoGray);

            echo sprintf("
            if(x==%s)
            {
                $('.servicio0%s').attr('src','%s');
            }
            else
            {
                $('.servicio0%s').attr('src','%s');
            }", $index + 1, $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogo, $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogoGray);


        }
    }

}

?>
