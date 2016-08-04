<?php

namespace App;

use EllipseSynergie\ApiResponse\Contracts\Response;

trait TraitFractalResponse
{
    /**
     * @var Response
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->initialize();
    }

    protected function initialize(){
        // TODO : this method overrided in TraitSessionToken
    }
}
