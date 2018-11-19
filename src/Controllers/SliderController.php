<?php
namespace DorsetDigital\Elements\Slider\Controllers;

use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\View\Requirements;

class SliderController extends ElementController
{
    public function init() {
        parent::init();
        Requirements::javascript('dorsetdigital/silverstripe-element-slider:client/dist/tiny-slider/tiny-slider.js');
        Requirements::javascript('dorsetdigital/silverstripe-element-slider:client/dist/slider.min.js');
        Requirements::css('dorsetdigital/silverstripe-element-slider:client/dist/slider.css');
    }
}