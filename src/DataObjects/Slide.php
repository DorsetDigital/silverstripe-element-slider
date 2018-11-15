<?php
namespace DorsetDigital\Elements\Slider\DataObjects;

use DorsetDigital\Elements\Slider\Models\Slider;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class Slide extends DataObject
{

    private static $singular_name = 'Slide';
    private static $plural_name = 'Slides';
    private static $table_name = 'DorsetDigital_Elements_Slide';

    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    private static $belongs_many_many = [
        'Slider' => Slider::class
    ];

    private static $has_one = [
        'SlideImage' => Image::class
    ];

    private static $owns = [
        'SlideImage'
    ];

}