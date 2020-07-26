<?php


namespace Domain\Enumeration;


class UserRole
{
    /**
     * Constants
     */
    const SUPER_ADMIN = 0;
    const ADMIN = 1;
    const CUSTOMER = 2;

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
            case (self::SUPER_ADMIN):
                $description = 'Full read/write/delete access to application.';
                break;
            case (self::ADMIN):
                $description = 'Read/write access to application.';
                break;
            case (self::CUSTOMER):
                $description = 'Access to verified middleware.';
                break;
            default:
                break;
        }

        return $description;
    }

}
