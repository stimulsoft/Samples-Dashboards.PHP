<?php

namespace Stimulsoft\Export;

use Stimulsoft\Export\Enums\StiDashboardExportFormat;
use Stimulsoft\Export\Enums\StiDashboardScaleMode;
use Stimulsoft\Export\Enums\StiImageType;

class StiImageDashboardExportSettings extends StiDashboardExportSettings
{

### Properties

    /** @var StiDashboardScaleMode|int [enum] Specifies the scaling mode of the dashboard content. */
    public $scaleMode = StiDashboardScaleMode::ViewSize;

    /** @var StiImageType|int [enum] Specifies the type of exported images. */
    public $imageType = StiImageType::Svg;

    /** @var int The scale of an exported document. */
    public $scale = 100;

    /** @var bool Export only the first page if elements require multiple pages to be rendered. */
    public $renderSinglePage = true;


### Helpers

    public function getExportFormat(): int
    {
        return StiDashboardExportFormat::Image;
    }
}