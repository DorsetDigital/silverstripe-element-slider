<?php

namespace DorsetDigital\Elements\Slider\Models;

use DNADesign\Elemental\Models\BaseElement;
use DorsetDigital\Elements\Slider\Controllers\SliderController;
use DorsetDigital\Elements\Slider\DataObjects\Slide;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\TextField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class Slider extends BaseElement
{
    private static $singular_name = 'Image Slider';
    private static $plural_name = 'Image Sliders';
    private static $description = 'Image slider block';
    private static $table_name = 'DorsetDigital_Elements_Slider';
    private static $controller_class = SliderController::class;
    private static $inline_editable = false;

    private static $db = [
        'SlideDelay' => 'Int',
        'TransitionSpeed' => 'Int',
        'SliderType' => 'Varchar(10)'
    ];

    private static $many_many = [
        'Slides' => Slide::class
    ];

    private static $owns = [
        'Slides'
    ];

    private static $defaults = [
        'SlideDelay' => 3500,
        'TransitionSpeed' => 750,
        'SliderType' => 'fade'
    ];

    public function getType()
    {
        return 'Image Slider Block';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $grid = GridField::create('Slides', 'Slides', $this->Slides(),
            GridFieldConfig_RelationEditor::create()
                ->addComponent(GridFieldOrderableRows::create()));

        $typeSelect = DropdownField::create('SliderType')
            ->setTitle(_t(__CLASS__ . '.SliderType', 'Slider Type'))
            ->setSource([
                'fade' => _t(__CLASS__ . '.Fader', 'Fader'),
                'slide' => _t(__CLASS__ . '.Slider', 'Slider')
            ]);

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('SlideDelay')
                ->setTitle(_t(__CLASS__ . '.SlideDelay', 'Slide Delay'))
                ->setDescription(_t(__CLASS__ . '.SlideDelayDesc', 'Delay between slide changes (ms) - defaults to 3500')),
            TextField::create('TransitionSpeed')
                ->setTitle(_t(__CLASS__ . '.TransitionSpeed', 'Transition Speed'))
                ->setDescription(_t(__CLASS__ . '.TransitionSpeedDesc', 'Transition speed of slides (ms)')),
            $typeSelect,
            $grid
        ]);
        return $fields;
    }

}