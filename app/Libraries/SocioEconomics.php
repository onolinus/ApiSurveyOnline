<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Cache;

class SocioEconomics{

    CONST CACHE_PREFIKS = 'socioeconomics';

    private static $instance;

    private $rows;

    private function __construct()
    {
        $key = SurveyCacheKey::getInstance()->generateCacheKey(self::CACHE_PREFIKS);
        $this->rows = Cache::get($key);
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getAll(){
        return $this->rows;
    }

    public function getByCode($code){
        return $this->isExistCode($code) ? $this->getAll()[$code] : null;
    }

    public function isExistCode($code){
        return isset($this->getAll()[$code]);
    }
}