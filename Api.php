<?php

/**
 * Класс для работы с API
 *
 * @author		User Name
 * @version		v.1.0 (dd/mm/yyyy)
 */
class Api
{
    private array $user;
    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function getUser(): array
    {
        return $this->user;
    }


    /**
     * Заполняет строковый шаблон template данными из объекта object
     *
     * @author		User Name
     * @version		v.1.0 (dd/mm/yyyy)
     * @param		string $template
     * @return		string
     */
    public function getApiPath(string $template) : string
    {
        foreach ($this->getUser() as $key => $value) {
            $template = str_replace("%$key%", rawurlencode($value), $template);
        }

        return $template;
    }
}