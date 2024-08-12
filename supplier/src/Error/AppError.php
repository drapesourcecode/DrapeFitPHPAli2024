<?php
// Custom Handler - goes in src/Error/AppError.php
namespace App\Error;
use Cake\Routing\Exception\MissingControllerException;
use Cake\Error\ErrorHandler;
class AppError extends ErrorHandler
{
    public function _displayException($exception)
    {
        if ($exception instanceof MissingControllerException) {
           
            // Here handle MissingControllerException by yourself
        } else {
            parent::_displayException($exception);
        }
    }
}