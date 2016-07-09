<?php

class Personas_Model_Personas extends Com_Module_Model {

    /**
     *
     * @return Personas_Model_Personas 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert( $obj) {

        $db = new Entities_Personas();
        $db->PerNombre = $obj['Nombre']; 
        $db->PerApellido = $obj['Apellido'];
        $db->PerSexo = $obj['Sexo']; 
        $db->PerEstadoCivil = $obj['EstadoCivil']; 
        $db->PerNacimiento = $obj['Nacimiento']; 
        $db->PerPais = $obj['Pais']; 
        $db->PerCiudad = $obj['Ciudad']; 
        $db->PerDireccion = $obj['Direccion']; 
        $db->PerTelefono = $obj['Telefono']; 
        $db->PerCelular = $obj['Celular']; 
        $db->PerEmail = $obj['Email']; 
        $db->PerDocumento = $obj['Documento']; 
        $db->PerNumero = $obj['Numero']; 
        $db->PerSib = $obj['Sib']; 
        $db->PerStatus = 0;
        $db->action = ACTION_INSERT;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");
        return $db->PerId;
    }

    

    public function doUpdate($intId,  $obj) {
        $db = new Entities_Personas();
        $db->PerId = $intId;
        $db->PerNombre = $obj['Nombre']; 
        $db->PerApellido = $obj['Apellido'];
        $db->PerSexo = $obj['Sexo']; 
        $db->PerEstadoCivil = $obj['EstadoCivil']; 
        $db->PerNacimiento = $obj['Nacimiento']; 
        $db->PerPais = $obj['Pais']; 
        $db->PerCiudad = $obj['Ciudad']; 
        $db->PerDireccion = $obj['Direccion']; 
        $db->PerTelefono = $obj['Telefono']; 
        $db->PerCelular = $obj['Celular']; 
        $db->PerEmail = $obj['Email']; 
        $db->PerDocumento = $obj['Documento']; 
        $db->PerNumero = $obj['Numero']; 
        $db->PerSib = $obj['Sib']; 
        $db->PerStatus = $obj['Status'];
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Persona();
        $db->PerId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId) {
        $db = new Entities_Personas();
        $db->PerId = $intId;
        $db->get();
        return $db;
    }

    public function getByName($strName) {
        $db = new Entities_Personas();
        $db->LinName = $strName;
        $db->get();
        return $db;
    }

    public function getList() {
        $contact = new Entities_Personas();
        return $contact->getAll($contact->getList());
    }

}
