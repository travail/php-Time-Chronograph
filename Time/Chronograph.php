<?php

namespace Time;

class Chronograph
{
    const DEFAULT_DECIMAL_PLACE = 3;
    const MARK_START            = '_start';
    const MARK_STOP             = '_stop';

    protected $mark = array();

    public function mark($mark)
    {
        if (!$mark) return null;
        $this->mark[$mark] = gettimeofday(true);

        return $this->mark[$mark];
    }

    public function start()
    {
        $this->clear();
        $this->mark(self::MARK_START);
    }

    public function stop()
    {
        $this->mark(self::MARK_STOP);
    }

    public function total($digit = self::DEFAULT_DECIMAL_PLACE)
    {
        if (!$this->mark[self::MARK_STOP]);
        return $this->diff(self::MARK_START, self::MARK_STOP, $digit);
    }

    public function diff($start, $stop, $digit = self::DEFAULT_DECIMAL_PLACE)
    {
        if (!$start || !$stop) return null;
        $t0     = $this->mark[$start];
        $t1     = $this->mark[$stop];
        $format = sprintf('%%.%df', $digit);

        return floatval(sprintf($format, $t1 - $t0));
    }

    public function clear()
    {
        $this->mark = array();
    }
}
