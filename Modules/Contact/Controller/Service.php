<?php

class Contact_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            Contact_Model_Contact::getInstance()->doInsert($obj, null);
            $this->sendEmail($obj->Email, $obj->Name, $obj->Message);
            echo json_encode(true);
        }
    }

    private function sendEmail($emailClient, $nameClient, $messageClient) {
        $email = new Com_Wizard_Mail();
        $strTitle = strtoupper("Nuevo Registro de Contacto");
        $strLogo = Com_Helper_Url::getInstance()->getImage() . "/Public/logo.jpg";
        $email->setSubject($strTitle);
        $email->setFrom(EMAIL_USERNAME, EMAIL_FROM);
        $strMessage = file_get_contents(Com_Helper_Url::getInstance()->physicalDirectory . "/Resources/Layouts/email/contact.phtml");
        $strMessage = str_replace("{Logo}", $strLogo, $strMessage);
        $strMessage = str_replace("{Title}", $strTitle, $strMessage);
        $strMessage = str_replace("{Contact.Date}", date("d/m/Y H:i:s"), $strMessage);
        $strMessage = str_replace("{Contact.Name}", $nameClient, $strMessage);
        $strMessage = str_replace("{Contact.Email}", $emailClient, $strMessage);
        $strMessage = str_replace("{Contact.Content}", $messageClient, $strMessage);
        $strMessage = str_replace("{Footer}", "", $strMessage);

        $list = Configurations_Helper_Configuration::getInstance()->getKey("EMAIL_CONTACT");
        $list = explode(",", $list);
        foreach ($list as $obj) {
            $email->addAddress($obj, $obj);
        }
        $email->setMessage($strMessage);
        $email->send();
    }

}
