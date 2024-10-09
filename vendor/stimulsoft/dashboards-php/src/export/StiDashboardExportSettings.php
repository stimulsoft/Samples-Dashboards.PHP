<?php

namespace Stimulsoft\Export;

class StiDashboardExportSettings extends StiExportSettings
{

### Properties

    /** @var bool Enables or disables rendering of the defined element borders. */
    public $renderBorders = true;

    /** @var bool Enables or disables exporting a single dashboard element to the entire page. */
    public $renderSingleElement = false;

    /** @var bool Enables or disables exporting only the first page if elements require multiple pages to be rendered. */
    public $renderSinglePage = false;

    /** @var bool Applies default filters to dashboard elements. */
    public $applyDefaultFilters = false;
}