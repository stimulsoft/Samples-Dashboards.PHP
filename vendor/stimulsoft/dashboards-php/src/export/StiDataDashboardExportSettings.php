<?php

namespace Stimulsoft\Export;

use Stimulsoft\Export\Enums\StiDashboardExportFormat;
use Stimulsoft\Export\Enums\StiDataType;

class StiDataDashboardExportSettings extends StiDashboardExportSettings
{

### Properties

    /** @var StiDataType|int [enum] Specifies the type of the data. */
    public $dataType = StiDataType::Csv;


### Helpers

    public function getExportFormat(): int
    {
        return StiDashboardExportFormat::Data;
    }
}