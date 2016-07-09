<?php

class Com_Helper_Menu extends Com_Object {

    /**
     *
     * @access private
     * @var array
     */
    private $_lstItems = array();

    /**
     * @static
     * @access public
     * @return Com_Helper_Menu
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    /**
     *
     * @access public
     * @param String $module
     * @param String $url
     * @param String $text
     * @param String $icon
     * @param String $parentModule
     * @param String $toolTip 
     */
    public function add($module, $url, $text, $icon = "product.png", $parentModule = "", $toolTip = "") {
        $this->_lstItems[] = array(
            'Url' => $url
            , 'Text' => $text
            , 'Icon' => $icon
            , 'Module' => $module
            , 'ParentModule' => $parentModule
            , 'ToolTip' => $toolTip
        );
    }

    /**
     * @access private
     * @return String 
     */
    private function get() {
        $result = "";
        $urlBase = Com_Helper_Url::getInstance()->urlBase;
        foreach ($this->_lstItems as $lstItem) {
            if ($lstItem["ParentModule"] == "") {
                $hasChilds=$this->hasChilds($lstItem["Module"]);
                $result.='<li>
                            <a href="' . ($lstItem["Url"] != "" ? $urlBase . $lstItem["Url"] : "#") . '" '.($hasChilds?'class="dropdown-toggle" data-toggle="dropdown"':'').'>' . $lstItem["Text"]. ($hasChilds?'<span class="caret"></span>':'').'</a>
                            ' . $this->getChilds($lstItem["Module"]) . '
                         </li>';
            }
        }
        return (strlen($result) > 0 ? ($result) : "");
    }

    private function hasChilds($module) {
        foreach ($this->_lstItems as $lstItem) {
            if ($module == $lstItem["ParentModule"] && $module != "") {
                return true;
            }
        }
        return false;
    }

    /**
     *
     * @access private
     * @param String $module
     * @return String 
     */
    private function getChilds($module) {
        $result = "";
        $urlBase = Com_Helper_Url::getInstance()->urlBase;
        foreach ($this->_lstItems as $lstItem) {
            if ($module == $lstItem["ParentModule"] && $module != "") {
                $result.='<li>
                            <a href="' . $urlBase . $lstItem["Url"] . '">'. $lstItem["Text"] . '</a>
                         </li>';
            }
        }
        return (strlen($result) > 0 ? ('<ul class="dropdown-menu" role="menu">' . $result . '</ul>') : "");
    }

    public function __toString() {
        return $this->get();
    }

}
