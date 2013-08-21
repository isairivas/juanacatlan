<?php

/**
 * 
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 * 
 * description: framework sencillo para la creacion de sitios pequenos pero bien
 *               estructurados y con buenas practicas
 *  
 * 
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 * 
*/
class Lib_Util_Mail {
    
    private $configTest;
    private $configAdvancedTest;
    private $config;
    private $configAdvanced;
    private $mail;
    
    function __construct($arrConfig=-1,$arrConfigAdvanced=-1) {
        $this->configTest = array(
            'asunto'  => 'COTIZACION',
            'address'    => MAIL_ADMINISTRADOR,
            'from'    => MAIL_SERVER_USERNAME,
            'fromName' => PROYECT_NAME
        );
        $this->configAdvancedTest = array(
            'username' => MAIL_SERVER_USERNAME,
            'password' => MAIL_SERVER_PASSWORD,
            'host'     => MAIL_SERVER_HOST
        );
        if ( !is_array($arrConfig) ){
            $this->config = $this->configTest;
        } else {
            $this->config = $arrConfig;
        }
        if ( !is_array($arrConfigAdvanced) ){
            $this->configAdvanced = $this->configAdvancedTest;
        } else {
            $this->configAdvanced = $arrConfigAdvanced;
        }
        require 'mailer.php';
        $this->mail = new includes_mailer();
        $this->configure();
    }
    
    /**
     * enviar opciones generales los valores obligatorios son
     * - asunto
     * - address
     * - from
     * - fromName
     * @param array $options
     */
    public function setOptions($options){
    	$this->config = $options;
    	$this->configure();
    }
    
    public function setAdjunto($filepath,$name){
    	$this->mail->AddAttachment($filepath, $name);
    }
    
    public function getMailer(){
    	return $this->mail;
    }
    
    public function setFrom($email){
    	$this->mail->From = $email;
    }
    public function setTo($email){
    	$this->mail->AddAddress($email);
    }
    
    private function configure() {

        $this->mail->Mailer = "smtp";
        //Servidor SMTP EJ stmp.tec.com
        $this->mail->Host = $this->configAdvanced['host'];
        $this->mail->SMTPAuth = true;
        //cuenta de correo electronico de donde se emitiran los mails
        $this->mail->Username =  $this->configAdvanced['username'];
        //contase�a del mail anterior
        $this->mail->Password =  $this->configAdvanced['password'];
        //direcciondel correo que aparecera en el mail
        $this->mail->From = $this->config['from'];
        //titulo del mail
        $this->mail->FromName = $this->config['fromName'];
        $this->mail->Timeout = 130;
        //Direccion a donde se enviaran los mails
        $this->mail->AddAddress($this->config['address']);
        //Asunto del mail
        $this->mail->Subject = $this->config['asunto'];
    }
    
    function send($message) {
        $this->mail->Body = $message;
        $this->mail->AltBody = $message;
        try{
        $exito = $this->mail->Send();
        }catch(Exception $e){echo $e->getMessage();}
        return $exito;
//        $intentos = 1;
//        while ((!$exito) && ($intentos < 5)) {
//            sleep(5);
//            //echo $mail->ErrorInfo;
//            $exito = $this->mail->Send();
//            $intentos = $intentos + 1;
//        }
    }

}


