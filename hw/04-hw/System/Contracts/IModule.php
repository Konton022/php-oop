<?php

namespace System\Contracts;

interface IModule {
    public function registerRoutes($router) : void;

}