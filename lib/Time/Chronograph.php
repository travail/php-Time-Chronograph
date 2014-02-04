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
        // Return null if not started
        if (!isset($this->mark[self::MARK_START])) return null;
        // Stop if not stopped yet
        if (!isset($this->mark[self::MARK_STOP])) $this->stop();
        return $this->diff(self::MARK_START, self::MARK_STOP, $digit);
    }

    public function diff($s, $e, $digit = self::DEFAULT_DECIMAL_PLACE)
    {
        if (!$s || !$e) return null;
        if (!isset($this->mark[$s]) || !isset($this->mark[$e])) return null;

        $t0     = $this->mark[$s];
        $t1     = $this->mark[$e];
        $format = sprintf('%%.%df', $digit);

        return floatval(sprintf($format, $t1 - $t0));
    }

    public function clear()
    {
        $this->mark = array();
    }
}
