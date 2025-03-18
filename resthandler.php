<?php
class RestHandler{

    private $httpVersion = "HTTP/1.1";

    public function setHttpHeaders($statusCode)
    {
        $statusMessage = $this->getHttpMessage($statusCode);

        header($this-> httpVersion." ". $statusCode ." ". $statusMessage);
        header("Content-Type: Application/json; charset=utf-8");
    } 

    public function getHttpMessage($statusCode)
    {
        $httpStatus = array(
            200=> 'OK',
            400=> 'Bad Request',
            404=> 'Not Found');
        return ($httpStatus[$statusCode]);
    }
}
?>