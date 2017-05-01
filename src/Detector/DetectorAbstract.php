<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/4/30
 * Time: 下午4:37
 */

namespace Ben\GoogleVisionClient\Detector;


use Ben\GoogleVisionClient\Exception\BaseException;
use Google\Cloud\Vision\VisionClient;

abstract class DetectorAbstract
{

    /**
     * @var VisionClient
     */
    protected $visionClient;
    
    protected $filename;

    
    public function __construct($options)
    {
        if (isset($options['visionClient'])) {
            $this->visionClient = $options['visionClient'];
        } else {
            throw new BaseException('Not Found GoogleVisionClient');
        }

        if (isset($options['filename'])) {
            $this->setFilename($options['filename']);
        } else {
            throw new BaseException('Not Found Filename');
        }
    }

    /**
     * @param $filename
     * @return mixed
     */
    public function setFilename($filename)
    {
        if (!file_exists($filename)) {
            throw new BaseException('File can\'t not be empty!');
        }

        $this->filename = $filename;

        return $this;
    }

    abstract public function analyze();
}