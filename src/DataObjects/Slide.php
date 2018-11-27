<?php

namespace DorsetDigital\Elements\Slider\DataObjects;

use DorsetDigital\Elements\Slider\Models\Slider;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;

class Slide extends DataObject
{

    private static $singular_name = 'Slide';
    private static $plural_name = 'Slides';
    private static $table_name = 'DorsetDigital_Elements_Slide';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Sort' => 'Int',
        'TextColour' => 'Varchar(10)',
        'PositionVertical' => 'Varchar(10)',
        'PositionHorizontal' => 'Varchar(10)'
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

    private static $default_sort = 'Sort DESC';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Sort');
        $fields->addFieldToTab('Root.Main',
            DropdownField::create('TextColour')
                ->setTitle(_t(__CLASS__ . '.TextColour', 'Text Colour'))
            ->setSource([
                'light' => _t(__CLASS__ . '.LightText', 'Include in footer menu'),
                'dark' => 'Dark Text'
            ]));
        $fields->addFieldToTab('Root.Main',
            UploadField::create('SlideImage')
                ->setAllowedFileCategories('image/supported')
                ->setFolderName('sliders'));
        $fields->addFieldToTab('Root.Main', DropdownField::create('HorizontalPosition')
            ->setSource(['left' => 'Left', 'Centre' => 'Centre', 'right' => 'Right']));
        $fields->addFieldToTab('Root.Main', DropdownField::create('VerticalPosition')
            ->setSource(['top' => 'Top', 'middle' => 'Middle', 'Bottom' => 'bottom']));

        return $fields;
    }

}
