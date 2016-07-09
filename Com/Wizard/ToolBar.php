<?php

class Com_Wizard_ToolBar extends Com_Object {

    /**
     *
     * @access private
     * @var Array 
     */
    private $lstIcons = array();

    /**
     *
     * @access public
     * @param String $image
     * @param String $label
     * @param String $href
     * @param String $action 
     */
    public function add($image, $label, $href = "", $action = "") {
        $this->lstIcons[] = array(
            'image' => 'glyphicon glyphicon-'.$image
            , 'label' => $label
            , 'href' => $href
            , 'action' => $action
        );
    }

    /**
     * 
     * @access public
     */
    public function render() {
        if (count($this->lstIcons) > 0) {
            ?>
            <div class="nav navbar">
                <div class="btn-group btn-group-sm">
                    <?PHP
                    foreach ($this->lstIcons as $lstIcon) {
                        ?>
                        <a <?PHP
                        echo ($lstIcon['href'] != "" ? 'href="' . $lstIcon['href'] . '"' : "");
                        echo ($lstIcon['action'] != "" ? 'onclick="' . $lstIcon['action'] . '"' : "");
                        ?> class="btn btn-default">
                            <span class="<?PHP echo $lstIcon['image']; ?>"></span>
                            <span><?PHP echo $lstIcon['label']; ?></span>
                        </a>
                        <?PHP
                    }
                    ?>
                </div>
            </div>
            <?PHP
        }
    }

}
