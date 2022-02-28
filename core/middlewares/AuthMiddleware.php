<?php

namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author Anthony HUYNH <anthonyhuynh1204@gmail.com>
 * @package app\core\middlewares
 */

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     *  AuthMiddleware constructor
     * 
     * @param array $actions
     */

    public function __construct(array $actions = [])
    {
        $this->action = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)){
                throw new ForbiddenException();
            }
        }
    }
}