<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Cache;

use App\ResearchFields as ModelResearchFields;
use App\SocioEconomics as ModelSocioEconomics;
use app\Libraries\ResearchFields as LibResearchFields;
use app\Libraries\SocioEconomics as LibSocioEconomics;

class WarmUp{

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var SurveyCacheKey
     */
    private $surveyCacheKey;

    public function __construct(SurveyCacheKey $surveyCacheKey = null)
    {
        $this->surveyCacheKey = is_null($surveyCacheKey) ? SurveyCacheKey::getInstance() : $surveyCacheKey;
    }

    public static function getInstance(SurveyCacheKey $surveyCacheKey = null){
        if(is_null(self::$instance)){
            self::$instance = new self($surveyCacheKey);
        }

        return self::$instance;
    }


    public function handle($arguments, $options)
    {
        $build_number = $this->surveyCacheKey->setBuildNumber(true);

        $cacheGenerated = [];


        if($arguments['cachename'] === 'all' || $arguments['cachename'] === LibResearchFields::CACHE_PREFIKS){
            $this->getResearchFields($options['reset'], $options['keepoldcache']);
            $cacheGenerated[] = LibResearchFields::CACHE_PREFIKS;
        }

        if($arguments['cachename'] === 'all' || $arguments['cachename'] === LibSocioEconomics::CACHE_PREFIKS) {
            $this->getSocioEconomics($options['reset'], $options['keepoldcache']);
            $cacheGenerated[] = LibSocioEconomics::CACHE_PREFIKS;
        }


        if(empty($cacheGenerated)){
            throw new \Exception("Invalid argument parameter, must be : [all]|researchfields|socioeconomics [--reset=0|1] [--keepoldcache=1|0]");
        }

        return sprintf('Generate Cache build-number:%d for "%s"', $build_number, implode(', ', $cacheGenerated));
    }

    protected function getResearchFields($reset = false, $keepoldcache_option = true)
    {
        $key = $this->surveyCacheKey->generateCacheKey(LibResearchFields::CACHE_PREFIKS);
        $oldkey = $this->surveyCacheKey->generateOldCacheKey(LibResearchFields::CACHE_PREFIKS);

        if($keepoldcache_option === false && $oldkey){
            Cache::pull($oldkey); // delete old cache key
        }

        if ($reset === false && $research_fields = Cache::get($key)) {
            return $research_fields;
        } else {
            $research_fields = $this->getCustomizeResearchFields();

            Cache::forever($key, $research_fields);

            return $research_fields;
        }
    }

    protected function getSocioEconomics($reset = false, $keepoldcache_option = true)
    {
        $key = $this->surveyCacheKey->generateCacheKey(LibSocioEconomics::CACHE_PREFIKS);
        $oldkey = $this->surveyCacheKey->generateOldCacheKey(LibSocioEconomics::CACHE_PREFIKS);

        if($keepoldcache_option === false && $oldkey){
            Cache::pull($oldkey); // delete old cache key
        }

        if ($reset === false && $socio_economics = Cache::get($key)) {

            return $socio_economics;
        } else {
            $socio_economics = $this->getCustomizeSocioEconomics();

            Cache::forever($key, $socio_economics);

            return $socio_economics;
        }
    }

    private function getCustomizeSocioEconomics(){
        $result = [];

        // get all data `socio_economics` from database
        $socio_economics = ModelSocioEconomics::all();
        foreach($socio_economics as $socio_economic){
            $result[$socio_economic->code] = [
                'code' => $socio_economic->code,
                'division' => $socio_economic->division,
                'division_number' => $socio_economic->division_number,
                'group' => $socio_economic->group,
            ];
        }

        return $result;
    }

    private function getCustomizeResearchFields(){
        $result = [];

        // get all data `research_fields` from database
        $research_fields = ModelResearchFields::all();
        foreach($research_fields as $research_field){
            $result[$research_field->code] = [
                'code' => $research_field->code,
                'subject' => $research_field->subject,
                'area' => $research_field->area,
                'sub_area' => $research_field->sub_area,
            ];
        }

        return $result;
    }

}