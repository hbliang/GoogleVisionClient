<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/5/2
 * Time: 下午12:37
 */

namespace Ben\GoogleVisionClient\Detectors;


class Label extends DetectorAbstract
{

    public function analyze($filename)
    {
        $image = $this->visionClient->image(fopen($filename, 'r'), [
            'LABEL_DETECTION'
        ]);

        $labels = $this->visionClient->annotate($image)->labels();

        return $labels;
    }
}