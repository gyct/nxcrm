<?php

namespace Dcat\Admin\Widgets\Sparkline;

use Dcat\Admin\Admin;
use Dcat\Admin\Support\Helper;

/**
 * @see https://omnipotent.net/jquery.sparkline
 *
 * @method $this normalRangeMin(int $val)
 * @method $this drawNormalOnTop(string $val)
 * @method $this xvalues($val)
 * @method $this chartRangeClip($val)
 * @method $this chartRangeMinX($val)
 * @method $this highlightSpotColor(string $color)
 * @method $this highlightLineColor(string $color)
 * @method $this minSpotColor(string $color)
 * @method $this maxSpotColor(string $color)
 * @method $this spotColor(string $color)
 * @method $this spotRadius(int $val)
 * @method $this lineWidth(int $width)
 */
class Line extends Sparkline
{
    protected $type = 'line';

    public function fillDefaultColor()
    {
        $this->fillColors(Admin::color()->primary());
    }

    public function primary(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->primary(), $opaque);
    }

    public function green(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->green(), $opaque);
    }

    public function purple(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->purple(), $opaque);
    }

    public function red(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->red(), $opaque);
    }

    public function custom(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->custom(), $opaque);
    }

    public function pink(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->pink(), $opaque);
    }

    public function blue(bool $opaque = false)
    {
        return $this->fillColors(Admin::color()->blue1(), $opaque);
    }

    protected function fillColors(string $color, bool $opaque = false)
    {
        $this->lineColor($color)
            ->fillColor($opaque ? $color : Helper::colorAlpha($color, 0.1))
            ->highlightSpotColor('#fff')
            ->highlightLineColor($color)
            ->minSpotColor($color)
            ->maxSpotColor($color)
            ->spotColor($color);

        if (! isset($this->options['lineWidth'])) {
            $this->lineWidth(2);
        }
        if (! isset($this->options['spotRadius'])) {
            $this->spotRadius(3);
        }

        return $this;
    }

    public function render()
    {
        if (! isset($this->options['lineColor'])) {
            $this->fillDefaultColor();
        }

        return parent::render(); // TODO: Change the autogenerated stub
    }
}
