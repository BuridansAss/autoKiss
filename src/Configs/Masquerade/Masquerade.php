<?php


namespace Tool\Configs\Masquerade;


class Masquerade
{
    const VAR_CHARACTER = '~';

    private $vars = [
        '~number~',
        '~bool~',
    ];

    /**
     * @param array $customCharacters
     */
    public function initVars($customCharacters = [])
    {
        if (!empty($customCharacters)) {
            foreach ($customCharacters as &$customCharacter) {
                $customCharacter = self::VAR_CHARACTER . $customCharacter . self::VAR_CHARACTER;
            }
        }

        $this->vars = array_merge($this->vars, $customCharacters);
    }
}