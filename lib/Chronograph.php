<?php

namespace Time;

class Chronograph
{
    /**
     * @var int The default decimal place
     */
    const DEFAULT_DECIMAL_PLACE = 3;

    /**
     * @var string The mark that means the timer started
     */
    const MARK_START = '_start';

    /**
     * @var string The mark that means the timer stopped
     */
    const MARK_STOP = '_stop';

    /**
     * @var array Keys are marks and values are time at which they're marked
     */
    protected $mark = array();

    /**
     * Sets the name of the mark, returns the time in gettimeofday(2).
     *
     * @param string The name what you want mark
     * @return float The time at which it marked
     */
    public function mark($mark)
    {
        if (!$mark) return null;
        $this->mark[$mark] = gettimeofday(true);

        return $this->mark[$mark];
    }

    /**
     * Starts the timer. If you've already started the timer,
     * this method will clear the timer and start the timer agian.
     *
     * @return void
     */
    public function start()
    {
        $this->clear();
        $this->mark(self::MARK_START);
    }

    /**
     * Stops the timer.
     *
     * @return void
     */
    public function stop()
    {
        $this->mark(self::MARK_STOP);
    }

    /**
     * Returns the elapsed time between the start() and stop() called.
     * Returns null, if you've not started the timer. Call stop() automatically,
     * if you've not stopped the timer.
     *
     * @param string Decimal palce, 3 by default
     * @return float|null The elapsed time, null if the timer not started
     */
    public function total($digit = self::DEFAULT_DECIMAL_PLACE)
    {
        if (!isset($this->mark[self::MARK_START])) return null;
        if (!isset($this->mark[self::MARK_STOP])) $this->stop();

        return $this->diff(self::MARK_START, self::MARK_STOP, $digit);
    }

    /**
     * Returns the elapsed time between given marks
     *
     * @param string $s The mark points start
     * @param string $e The mark points end
     * @return float|null The elapsed time ,null if the given marks don't exist
     */
    public function diff($s, $e, $digit = self::DEFAULT_DECIMAL_PLACE)
    {
        if (!$s || !$e) return null;
        if (!isset($this->mark[$s]) || !isset($this->mark[$e])) return null;

        $t0     = $this->mark[$s];
        $t1     = $this->mark[$e];
        $format = sprintf('%%.%df', $digit);

        return floatval(sprintf($format, $t1 - $t0));
    }

    /**
     * Clear the timer
     *
     * @return void
     */
    public function clear()
    {
        $this->mark = array();
    }
}
