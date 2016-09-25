<?php
namespace App\Http\Controllers\Guest\Report;


use App\Http\Controllers\Controller;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Support\Facades\Cache;
use PluginCommonSurvey\Libraries\SurveyCacheKey;

abstract class ReportController extends Controller
{

    const CACHE_TIME = 60;

    protected $data;

    public function index(Response $response){
        $result = $this->getReportFromCache();
        if($this->returnType() === 'collection'){
            return $response->withCollection(collect($result), $this->getTransformer(), null, null, $this->getMeta());
        }

        return $response->withItem(collect($result), $this->getTransformer(), null, $this->getMeta());
    }

    private function getDataCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey($this->getCacheName(), false);
    }


    protected function getMeta(){
        return [
            'title' => $this->getTitle()
        ];
    }

    protected function getReportFromCache(){
        if($this->data = Cache::get($this->getDataCacheKey())){
            return $this->data;
        }

        $this->data = $this->getFromDb();
        Cache::put($this->getDataCacheKey(), $this->data, self::CACHE_TIME);
        return $this->data;
    }

    abstract protected function getFromDb();

    abstract protected function getCacheName();

    abstract protected function getTitle();

    abstract protected function getTransformer();

    abstract protected function returnType();
}
