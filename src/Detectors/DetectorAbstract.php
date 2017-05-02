<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/5/2
 * Time: 下午12:54
 */

namespace Ben\GoogleVisionClient\Detectors;


use Google\Cloud\Vision\VisionClient;

abstract class DetectorAbstract
{
    /**
     * @var VisionClient
     */
    protected $visionClient;

    public function __construct(VisionClient $visionClient)
    {
        $this->visionClient = $visionClient;
    }

    abstract public function analyze($filename);
}