<?php

namespace Stimulsoft;

class StiComponentOptions
{
    public $property;
    public $isHtmlRendered = false;

    protected $enums = [];
    protected $ignore = ['ignore', 'enums', 'property', 'localization'];

    protected function getLocalizationPath($localization)
    {
        if (is_null($localization) || strlen($localization) == 0)
            return null;

        if (strlen($localization) < 5 || substr($localization, -4) != '.xml')
            $localization .= '.xml';

        if (!preg_match('/[\/\\\]/', $localization))
            $localization = 'vendor/stimulsoft/reports-php/localization/' . $localization;

        return $localization;
    }

    private function getColorValue($value) {
        if ($value == null || strlen($value) == 0)
            return 'Stimulsoft.System.Drawing.Color.transparent';

        if ($value[0] == '#') {
            list($r, $g, $b) = sscanf($value, '#%02x%02x%02x');
            return "Stimulsoft.System.Drawing.Color.fromArgb(255, $r, $g, $b)";
        }

        return "Stimulsoft.System.Drawing.Color.$value";
    }

    /** Get the HTML representation of the component. */
    public function getHtml()
    {
        $result = '';
        $className = get_class($this);
        $vars = get_class_vars($className);
        foreach ($vars as $name => $defaultValue) {
            if (!in_array($name, $this->ignore)) {
                if (is_object($this->{$name}))
                    $result .= $this->{$name}->getHtml();
                else {
                    $currentValue = $this->{$name};
                    if ($currentValue != $defaultValue) {
                        $stringValue = in_array($name, $this->enums) ? $currentValue : var_export($currentValue, true);
                        if (substr_compare($name, 'Color', -5) === 0) $stringValue = $this->getColorValue($currentValue);
                        if ($stringValue == 'NULL') $stringValue = 'null';
                        $result .= "$this->property.$name = $stringValue;\n";
                    }
                }
            }
        }

        $this->isHtmlRendered = true;
        return $result;
    }

    /** Output of the HTML representation of the component. */
    public function renderHtml()
    {
        echo $this->getHtml();
    }

    public function __construct($property = '')
    {
        $this->property = $property;
    }
}