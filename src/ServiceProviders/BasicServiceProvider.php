<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/5/2
 * Time: 下午12:52
 */

namespace Ben\GoogleVisionClient\ServiceProviders;


use Google\Cloud\Vision\VisionClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BasicServiceProvider implements ServiceProviderInterface
{
    /**
     * @var VisionClient
     */
    protected $visionClient;

    public function __construct($values)
    {
        $this->visionClient = new VisionClient($values);
    }

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
    }
}