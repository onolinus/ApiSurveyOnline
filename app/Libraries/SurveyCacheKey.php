<?php

namespace app\Libraries;

class SurveyCacheKey
{
    private $build_number;

    /**
     * @var self
     */
    private static $instance;

    CONST KEY_BUILDNUMBER = 'buildNumber';

    CONST OLD_BUILD_NUMBER_KEEPED = 10;

    private function __construct(){
        $this->initialize();
    }

    /**
     * get instance of OnewebCache
     *
     * @return self
     */
    public static function getInstance()
    {
        if(is_null(self::$instance)) {
            self::$instance = new SurveyCacheKey();
        }

        return self::$instance;
    }

    /**
     * initialize method called from constructor
     *
     */
    public function initialize(){
        $this->setBuildNumber();
    }


    /**
     * set the current build number
     *
     */
    public function setBuildNumber($reset = false){
        if($reset === false){
            $this->build_number = \Survey\helper\BuildNumber\get_build_number();
            return $this->build_number;
        }

        return $this->writeBuildNumberToFile();
    }

    private function writeBuildNumberToFile(){
        $this->build_number = json_decode(file_get_contents(config('app.build_number_path')), true)['number'];
        $path = implode(DIRECTORY_SEPARATOR, [dirname(__FILE__), '..', 'helper', 'build.php']);
        file_put_contents( $path, "<?php \nnamespace Survey\helper\BuildNumber;\n\nfunction get_build_number(){\n\treturn " . var_export( $this->build_number, true ) . ";\n}\n", LOCK_EX );

        return $this->build_number;
    }

    /**
     * get the current build number
     *
     */
    public function getBuildNumber(){
        return $this->build_number;
    }

    /**
     * generate cache key [append : buildnumber]
     *
     */
    public function generateCacheKey($cacheKey, $useBuildNumber = true){
        return $useBuildNumber === true ? sprintf('%s:%s', $this->build_number, $cacheKey) : sprintf('%s', $cacheKey);
    }

    public function generateOldCacheKey($cacheKey, $useBuildNumber = true){
        if($useBuildNumber === true){
            if(intval($this->build_number) - self::OLD_BUILD_NUMBER_KEEPED <= 0){
                return false;
            }

            return sprintf('%s:%s', intval($this->build_number) - self::OLD_BUILD_NUMBER_KEEPED, $cacheKey);
        }

        return sprintf('%s', $cacheKey);
    }

    /**
     * generate hashed cache key [append : buildnumber]
     *
     */
    public function generateHashedCacheKey($cacheKey, $useBuildNumber = true){
        $cacheKey = $this->hashCacheKey($cacheKey);
        return $useBuildNumber === true ? sprintf('%s:%s', $this->build_number, $cacheKey) : sprintf('%s', $cacheKey);
    }

    /**
     * @param $cacheKey
     * @return string
     */
    protected function hashCacheKey($cacheKey){
        return md5($cacheKey);
    }


    public function staticDataCacheTime(){
        // cache in minute, 30 days
        // in minutes
        return 60 * 24 * 30;
    }
}