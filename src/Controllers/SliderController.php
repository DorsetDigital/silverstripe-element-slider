<?php

namespace DorsetDigital\Elements\Slider\Controllers;

use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\View\Requirements;

class SliderController extends ElementController
{
    public function init()
    {
        parent::init();
        Requirements::css('dorsetdigital/silverstripe-element-slider:client/dist/slider.css');

        if ($this->Slides()->count() > 1) {
            Requirements::javascript('dorsetdigital/silverstripe-element-slider:client/dist/tiny-slider/tiny-slider.js');

            Requirements::javascriptTemplate(
                'dorsetdigital/silverstripe-element-slider:client/dist/slider.min.js',
                [
                    'ID' => $this->ID,
                    'TransitionSpeed' => $this->TransitionSpeed,
                    'DelaySpeed' => $this->SlideDelay,
                    'SliderType' => ($this->SliderType == 'fade') ? 'gallery' : 'carousel'
                ]
            );

        }
    }
}