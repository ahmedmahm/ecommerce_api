<?php


namespace Domain\Enumeration;


class AddressType
{
    /**
     * Constants
     */
    const PRIMARY = 0;
    const SECONDARY = 1;

    /**
     * Get the description for an enum value
     *
     * @param mixed $value Enum Value
     * @throws \ReflectionException
     * @return string
     */
    public static function getDescription($value)
    {
        $description = '';

        switch ($value) {
            case (self::PRIMARY):
                $description = 'Delivery Address .';
                break;
            case (self::SECONDARY):
                $description = 'Optional Address.';
                break;
            default:
                break;
        }

        return $description;
    }}
