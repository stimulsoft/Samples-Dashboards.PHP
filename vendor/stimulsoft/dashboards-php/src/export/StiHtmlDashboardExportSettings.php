<?php

namespace Stimulsoft\Export;

use Stimulsoft\Export\Enums\StiDashboardExportFormat;
use Stimulsoft\Export\Enums\StiDashboardScaleMode;

class StiHtmlDashboardExportSettings extends StiDashboardExportSettings
{

### Properties

    /** @var StiDashboardScaleMode|int [enum] Specifies the scaling mode of the dashboard content. */
    public $scaleMode = StiDashboardScaleMode::ViewSize;

    /** @var int The image quality of images which will be exported to a result file. */
    public $imageQuality = 200;

    /** @var int The scale of an exported document. */
    public $scale = 100;

    /** @var bool Enables or disables animation of dashboard elements in the exported HTML file. */
    public $enableAnimation = true;


### Helpers

    public function getExportFormat(): int
    {
        return StiDashboardExportFormat::Html;
    }
}