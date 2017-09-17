<?php

namespace app\widgets;

use app\libraries\App;
use Tamtamchik\SimpleFlash\Flash;
use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

/**
 * Class Alert
 *
 * @package app\widgets
 */
class Alert
{
    const FLASHES_KEY = 'flashes';

    /**
     * Alert types
     */
    const TYPE_INFO = 'info';
    const TYPE_DANGER = 'danger';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPES = [
        self::TYPE_INFO,
        self::TYPE_DANGER,
        self::TYPE_SUCCESS,
        self::TYPE_WARNING
    ];

    /**
     * Shows alerts
     *
     * @param array $config
     *
     * @return string
     */
    public static function widget($config = [])
    {
        $alerts    = "";
        $closeLink = "<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>";

        $flashes = App::getSession()->get(self::FLASHES_KEY);
        if ($flashes && count($flashes)) {
            foreach ($flashes as $flash) {
                $type    = $flash['type'] ?? '';
                $message = $flash['message'] ?? '';
                if (is_array($message)) {
                    foreach ($message as $value) {
                        $alerts .= "<div class='alert alert-$type'>$value $closeLink</div>";
                    }
                } else {
                    $alerts .= "<div class='alert alert-$type'>$message $closeLink</div>";
                }
            }
            App::getSession()->remove(self::FLASHES_KEY);
        }

        return $alerts;
    }

    /**
     * Adds new Alert
     *
     * @param $type
     * @param $message
     */
    public static function add($type, $message)
    {
        if (!in_array($type, self::TYPES)) {
            return;
        }

        $flashes   = App::getSession()->get(self::FLASHES_KEY, []);
        $flashes[] = [
            'type'    => $type,
            'message' => $message,
        ];

        App::getSession()->set(self::FLASHES_KEY, $flashes);
    }
}
