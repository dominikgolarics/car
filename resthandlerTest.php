<?php
require_once 'resthandler.php';

function RestHandlerTest(){
    $sr = new RestHandler();
    $sr->setHttpHeaders(200);

    $responseData = array(
        'status' => 'OK',
        'message' => 'Sikeres válasz',
        'http_status_message' =>$sr->getHttpMessage(200)
        
    );
    echo json_encode($responseData);
}

RestHandlerTest();