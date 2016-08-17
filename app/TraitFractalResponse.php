<?php

namespace App;

use EllipseSynergie\ApiResponse\Contracts\Response;

trait TraitFractalResponse
{
    /**
     * @var \EllipseSynergie\ApiResponse\Laravel
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->initialize();
    }
}
