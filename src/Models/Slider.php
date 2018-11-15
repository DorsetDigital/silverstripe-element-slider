<?php

namespace DorsetDigital\Elements\Slider\Models;

use DNADesign\Elemental\Models\BaseElement;
use DorsetDigital\Elements\Slider\Controllers\SliderController;
use DorsetDigital\Elements\Slider\DataObjects\Slide;

class Slider extends BaseElement
{
    private static $singular_name = 'Image Slider';
    private static $plural_name = 'Image Sliders';
    private static $description = 'Image slider block';
    private static $table_name = 'DorsetDigital_Elements_Slider';
    private static $controller_class = SliderController::class;

    private static $many_many = [
        'Slides' => Slide::class
    ];

    private static $owns = [
        'Slides'
    ];

    public function getType()
    {
        return 'Image Slider Block';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

    }

}