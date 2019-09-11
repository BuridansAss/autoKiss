<?php


namespace Tool\Configs\ShopConfig;


use Tool\Configs\AbstractConfig;

class ShopConfigHandler extends AbstractConfig
{
    const TEMPLATE_NAME = TEMPLATES . 'gift_collections.config.php.template';

    private $element = [
        'label' => '@lastGiftId',
        'maxCount' => '@number',
        'enable' => '@bool',
        'blocked' => '@bool',
        'gifts' => [
            ['gift_id' => '@giftId', 'count' => '@number'],
            ['gift_id' => '@giftId', 'count' => '@number'],
            ['gift_id' => '@giftId', 'count' => '@number'],
            ['gift_id' => '@giftId', 'count' => '@number'],
            ['gift_id' => '@giftId', 'count' => '@number'],
        ],
    ];

    protected function comment()
    {
        // TODO: Implement comment() method.
    }
}