<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/5/2
 * Time: 下午12:33
 */

namespace Ben\GoogleVisionClient;


use Ben\GoogleVisionClient\ServiceProviders\LabelServiceProvider;
use Pimple\Container;

class Detector extends Container
{
    protected $providers = [
        LabelServiceProvider::class,
    ];

    public function __construct(array $values)
    {
        parent::__construct($values);

        $this->registerProviders();
    }

    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider([
                'projectId' => $this->offsetGet('projectId'),
            ]));
        }
    }

    public function __get($id)
    {
        return $this->offsetGet($id);
    }

}