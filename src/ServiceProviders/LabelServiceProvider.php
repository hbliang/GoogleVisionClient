<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/5/2
 * Time: 下午12:35
 */

namespace Ben\GoogleVisionClient\ServiceProviders;


use Ben\GoogleVisionClient\Detectors\Label;
use Pimple\Container;

class LabelServiceProvider extends BasicServiceProvider
{
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
        $pimple['label'] = function($pimple) {
            return new Label($this->visionClient);
        };
    }
}