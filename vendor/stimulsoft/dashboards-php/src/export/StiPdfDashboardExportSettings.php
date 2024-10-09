<?php

namespace Stimulsoft\Export;

use Stimulsoft\Enums\PaperKind;
use Stimulsoft\Export\Enums\StiDashboardExportFormat;
use Stimulsoft\Export\Enums\StiDashboardScaleMode;
use Stimulsoft\Report\Enums\StiPageOrientation;

class StiPdfDashboardExportSettings extends StiDashboardExportSettings
{

### Properties

    /** @var StiDashboardScaleMode|int [enum] Specifies the scaling mode of the dashboard content. */
    public $scaleMode = StiDashboardScaleMode::ViewSize;

    /** @var bool Indicates that an exported document will start printing after opening. */
    public $autoPrint = false;

    /** @var int The image quality of images which will be exported to a result file. */
    public $imageQuality = 200;

    /** @var PaperKind|int [enum] The page size of a resulting document. */
    public $paperSize = PaperKind::A4;

    /** @var StiPageOrientation|int [enum] The page orientation of a resulting document. */
    public $orientation = StiPageOrientation::Landscape;


### Helpers

    public function getExportFormat(): int
    {
        return StiDashboardExportFormat::Pdf;
    }
}