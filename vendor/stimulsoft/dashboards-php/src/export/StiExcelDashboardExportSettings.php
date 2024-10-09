<?php

namespace Stimulsoft\Export;

use Stimulsoft\Export\Enums\StiDashboardExportFormat;
use Stimulsoft\Export\Enums\StiDashboardScaleMode;

class StiExcelDashboardExportSettings extends StiDashboardExportSettings
{

### Properties

    /** @var StiDashboardScaleMode|int [enum] Specifies the scaling mode of the dashboard content. */
    public $scaleMode = StiDashboardScaleMode::ViewSize;

    /** @var int The image quality of images which will be exported to a result file. */
    public $imageQuality = 200;

    /** @var bool Specifies that only data will be exported. */
    public $exportDataOnly = false;


### Helpers

    public function getExportFormat(): int
    {
        return StiDashboardExportFormat::Excel;
    }
}