<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/4/30
 * Time: 上午1:10
 */

namespace Ben\GoogleVisionClient;

use Ben\GoogleVisionClient\Detector\LabelDetector;
use Ben\GoogleVisionClient\Exception\BaseException;
use Google\Cloud\Vision\VisionClient;

class Client
{
    protected $detectors = [
        'label' => LabelDetector::class,
    ];

    protected $containers = [];
    
    protected $options = [];

    public function __construct(array $options = [])
    {
        $visionClientOptions = $options['visionClientConfig'] ?? [];
        $this->options['visionClient'] = new VisionClient($visionClientOptions);

        if (isset($options['filename'])) {
            $this->setFilename($options['filename']);
        }
    }

    public function registerDetector($detectorName, $params)
    {
        $params = array_merge($this->options, $params);

        $detector = new $this->detectors[$detectorName]($params);
        $this->containers[$detectorName] = $detector;

        return $detector;
    }

    public function setFilename($filename)
    {
        if (!file_exists($filename)) {
            throw new BaseException('File can\'t not be empty!');
        }

        $this->options['filename'] = $filename;

        return $this;
    }

    public function __call($name, $arguments)
    {
        $sub = substr($name, 0, 6);
        if ($sub === 'detect') {
            $detectorName = strtolower(substr($name, 6));

            if (isset($this->containers[$detectorName])) {
                return $this->containers[$detectorName];
            } else {
                return $this->registerDetector($detectorName, $arguments);
            }
        }
    }
}