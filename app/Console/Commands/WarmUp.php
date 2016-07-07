<?php

namespace App\Console\Commands;

use App\ResearchFields;
use App\SocioEconomic;
use App\SocioEconomics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use app\Libraries\SurveyCacheKey;

class WarmUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'survey:warmup {cachename=all} {--reset=0} {--keepoldcache=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warmup the survey, 1st build the cache data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $build_number = SurveyCacheKey::getInstance()->setBuildNumber(true);
        $reset_option = boolval($this->option('reset'));
        $keepoldcache_option = boolval($this->option('keepoldcache'));

        $cacheGenerated = [];


        if($this->argument('cachename') === 'all' || $this->argument('cachename') === 'researchfields'){
            $this->getResearchFields($reset_option, $keepoldcache_option);
            $cacheGenerated[] = 'researchfields';
        }

        if($this->argument('cachename') === 'all' || $this->argument('cachename') === 'socioeconomics') {
            $this->getSocioEconomics($reset_option, $keepoldcache_option);
            $cacheGenerated[] = 'socioeconomics';
        }


        if(empty($cacheGenerated)){
            throw new \Exception("Invalid argument parameter, must be : [all]|researchfields|socioeconomics [--reset=0|1] [--keepoldcache=1|0]");
        }

        $this->info(sprintf('Generate Cache build-number:%d for "%s"', $build_number, implode(', ', $cacheGenerated)));
    }

    protected function getResearchFields($reset = false, $keepoldcache_option = true)
    {
        $key = SurveyCacheKey::getInstance()->generateCacheKey('researchfields');
        $oldkey = SurveyCacheKey::getInstance()->generateOldCacheKey('researchfields');

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
        $key = SurveyCacheKey::getInstance()->generateCacheKey('socioeconomics');
        $oldkey = SurveyCacheKey::getInstance()->generateOldCacheKey('socioeconomics');

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
        $socio_economics = SocioEconomics::all();
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
        $research_fields = ResearchFields::all();
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
