<?php

class Sports_Controller_Index extends Public_Controller_Index {

    public function Index() {
        $this->setLayout("sports");
        $this->setView("sport");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];
       
        //print_r($url);
        //exit();
        
        $sport = Sports_Model_Sport::getInstance()->getByUrl($url, $this->lan->LanId);
        $this->assign("sport", $sport);
    }
    
    

    

}
