<?php

namespace Social;


final class Type
{
    const VK = 1;
    const MR = 2;
    const FB = 3;

    public static function getName($type)
    {
        switch ($type) {
            case self::VK:
                return 'Vkontakte';
            case self::MR:
                return 'Mailru';
            case self::FB:
                return 'Facebook';
        }

        return 'Unknown';
    }
}