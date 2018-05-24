<?php

/**
 * @package     Qodehub\Slydepay
 * @link        https://github.com/qodehub/slydepay-php
 *
 * @author      Ariama O. Victor (ovac4u) <victorariama@qodehub.com>
 * @link        http://www.ovac4u.com
 *
 * @license     https://github.com/qodehub/slydepay-php/blob/master/LICENSE
 * @copyright   (c) 2018, QodeHub, Ltd
 */

namespace Qodehub\Slydepay\Api;

use Qodehub\Slydepay\Item;
use Qodehub\Slydepay\Utility\CanCleanParameters;
use Qodehub\Slydepay\Utility\MassAssignable;

/**
 * ListPayOptions Class
 */
class CreateInvoice extends CreateAndSendInvoice
{
    use MassAssignable;
    use CanCleanParameters;

    /**
     * {@inheritdoc}
     */
    protected $parametersRequired = [
        'amount',
        'orderCode',
    ];

    /**
     * {@inheritdoc}
     */
    protected $parametersOptional = [
        'description',
        'orderItems',
    ];

    /**
     * Mandatory Invoice amount, total order fee.
     *
     * @var float
     */
    protected $amount;
    /**
     * Mandatory Your merchnat order unique Id generated by/in your system.
     *
     * @var string
     */
    protected $orderCode;
    /**
     * Optional Description for the order or for the items of the order/invoice
     *
     * @var string
     */
    protected $description;
    /**
     * Optional List of Items that will be shown the to your customer on the payment page.
     *
     * @var Item
     */
    protected $orderItems;

    /**
     * Construct for creating a new instance of this class
     *
     * @param array|string $data An array with assignable Parameters or an
     *                           Address or an addressID
     */
    public function __construct($data = null)
    {
        $this->massAssign($data);
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->propertiesPassRequired();

        return $this->_post(
            'invoice/create',
            $this->propertiesToArray()
        );
    }
}