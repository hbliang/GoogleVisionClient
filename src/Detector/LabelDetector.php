<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/4/30
 * Time: 下午4:25
 */

namespace Ben\GoogleVisionClient\Detector;


class LabelDetector extends DetectorAbstract
{
    public function analyze()
    {
        $image = $this->visionClient->image(fopen($this->filename, 'r'), [
            'LABEL_DETECTION'
        ]);

        $labels = $this->visionClient->annotate($image)->labels();

        return $labels;
    }
}