<?php

namespace DorsetDigital\Elements\Slider\DataObjects;

use DorsetDigital\Elements\Slider\Models\Slider;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;
use TractorCow\Colorpicker\Forms\ColorField;

class Slide extends DataObject
{

    private static $singular_name = 'Slide';
    private static $plural_name = 'Slides';
    private static $table_name = 'DorsetDigital_Elements_Slide';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Sort' => 'Int',
        'TextColour' => 'Color',
        'PositionVertical' => 'Varchar(10)',
        'PositionHorizontal' => 'Varchar(10)',
        'TextDropShadow' => 'Boolean'
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
            ColorField::create('TextColour')
                ->setTitle(_t(__CLASS__ . '.TextColour', 'Text Colour')));

        $fields->addFieldToTab('Root.Main',
            CheckboxField::create('TextDropShadow')
            ->setTitle(_t(__CLASS__ . '.DropShadow', 'Add text drop shadow'))
        );

        $fields->addFieldToTab('Root.Main',
            UploadField::create('SlideImage')
                ->setAllowedFileCategories('image/supported')
                ->setFolderName('sliders'));

        $fields->addFieldToTab('Root.Main',
            DropdownField::create('PositionHorizontal')
                ->setTitle(_t(__CLASS__ . '.HorizontalPosition', 'Horizontal Position'))
                ->setSource([
                    'left' => _t(__CLASS__ . '.Left', 'Left'),
                    'centre' => _t(__CLASS__ . '.Center', 'Centre'),
                    'right' => _t(__CLASS__ . '.Right', 'Right')
                ]));

        $fields->addFieldToTab('Root.Main',
            DropdownField::create('PositionVertical')
                ->setTitle(_t(__CLASS__ . '.VerticalPosition', 'Vertical Position'))
                ->setSource([
                    'top' => _t(__CLASS__ . '.Top', 'Top'),
                    'middle' => _t(__CLASS__ . '.Middle', 'Middle'),
                    'bottom' => _t(__CLASS__ . '.Bottom', 'Bottom')
                ]));

        return $fields;
    }

}
