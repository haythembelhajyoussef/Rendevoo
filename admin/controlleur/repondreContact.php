<?php

require_once __DIR__ . '/../../app/bootstrap.php';
require_once __DIR__ . '/../../include/Mail.php';
$mail = new Mail();
$mail->$file_to_attach = 'PATH_OF_YOUR_FILE_HERE';
$msg = '<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Notification de rappel</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>		
        <div style="margin: 0;padding: 0;font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;box-sizing: border-box;">	
            <div style="display: block !important;max-width: 600px !important;margin: 0 auto !important;clear: both !important;">
                <table style="border: 1px solid #c2c2c2;width: 100%;float: left;margin: 30px 0px;-webkit-border-radius: 5px;-moz-border-radius: 5px;-o-border-radius: 5px;border-radius: 5px;">
                    <tbody>
                        <tr style="border-bottom: 1px solid #e6e6e6;float: left;width: 100%;display: block;">

                            <td style="width: 40%;vertical-align: top;float: left;">
                                <div style="vertical-align: top;float: left;padding:15px;width: 100%;box-sizing: border-box;-webkit-box-sizing: border-box;clear: left;">
                                    <div style="width: 130px;height: 100%;vertical-align: top;margin: 0px auto;">
                                        <img style="width: 100%;float: left;display: inline-block;height: 100%;" src="http://localhost/rdv/assets/img/logo-300-60.png" />
                                    </div>
                                </div>
                            </td>


                        </tr>
                        <tr>
                            <td>
                                <div style="padding: 25px 30px;background: #fff;float: left;width: 90%;display: block;">
                                    <div style="border-bottom: 1px solid #e6e6e6;float: left;width: 100%;display: block;">
                                        <h6 style="color: #606060;font-size: 15px;margin: 10px 0px 10px;font-weight: 600;">Bonjour Madame Noura Ben Salah,</h6>
                                        <p style="color: #606060;font-size: 15px;margin: 10px 0px 15px;">Nous voulions vous rappeler que votre rendez-vous avec <b>Dr Ben Ali Mohamed</b> est prévu dans <b>24 heures</b>.</p>							
                                    </div>

                                    <div style="padding: 15px 0px;float: left;width: 100%;border-bottom: 1px solid #e6e6e6;">
                                        <p style="color: #606060;font-size: 15px;line-height: 22px;margin: 10px 0px 15px;float: left;"></p>
                                        <b>Vous voulez annuler ou reporter le rendevez vous ?</b><br>
                                        <button type="button" class="btn btn-primary">Changer Rendez-vous</button>
                                        <button type="button" class="btn btn-danger">Annulet Rendez-vous</button>
                                    </div>
                                    <div style="padding: 10px 0px;float: left;width: 100%;display: block;text-align: center;">
                                        <h5 style="color: #606060;font-size: 13px;margin: 0px 0px 5px;">Merci</h5>
                                    </div>
                                </div>
                            </td>					
                        </tr>				
                    </tbody>
                </table>	
            </div>
        </div>	
    </body>
</html>';
$mail->Send('heythembhy@gmail.com','sujet',$msg);
//$mail->send('siwar1995missaoui@gmail.com','test',$msg);