<?php namespace KlarnaKp;

class Transaction
{
    /**
     * @var string
     */
    protected $purchaseCountry;

    /**
     * @var string
     */
    protected $purchaseCurrency;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var string|integer|float
     */
    protected $merchantReference1;

    /**
     * @var string|integer|float
     */
    protected $merchantReference2;

    /**
     * @var Address
     */
    protected $billingAddress;

    /**
     * @var Address
     */
    protected $shippingAddress;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var MerchantUrls
     */
    protected $merchantUrls;

    /**
     * @var Options
     */
    protected $options;

    /**
     * @var ItemCollection
     */
    protected $items;

    /**
     * @var float
     */
    protected $orderAmount;

    /**
     * @var float
     */
    protected $orderTaxAmount;

    /**
     * Transaction constructor.
     */
    public function __construct()
    {
        $this->items = new ItemCollection();
    }

    /**
     * @return string
     */
    public function getPurchaseCountry()
    {
        return $this->purchaseCountry;
    }

    /**
     * @param string $purchaseCountry
     *
     * @return Transaction
     */
    public function setPurchaseCountry($purchaseCountry)
    {
        $this->purchaseCountry = $purchaseCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseCurrency()
    {
        return $this->purchaseCurrency;
    }

    /**
     * @param string $purchaseCurrency
     *
     * @return Transaction
     */
    public function setPurchaseCurrency($purchaseCurrency)
    {
        $this->purchaseCurrency = $purchaseCurrency;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return Transaction
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return float|int|string
     */
    public function getMerchantReference1()
    {
        return $this->merchantReference1;
    }

    /**
     * @param float|int|string $merchantReference1
     *
     * @return Transaction
     */
    public function setMerchantReference1($merchantReference1)
    {
        $this->merchantReference1 = $merchantReference1;

        return $this;
    }

    /**
     * @return float|int|string
     */
    public function getMerchantReference2()
    {
        return $this->merchantReference2;
    }

    /**
     * @param float|int|string $merchantReference2
     *
     * @return Transaction
     */
    public function setMerchantReference2($merchantReference2)
    {
        $this->merchantReference2 = $merchantReference2;

        return $this;
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     *
     * @return Transaction
     */
    public function setBillingAddress(Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     *
     * @return Transaction
     */
    public function setShippingAddress(Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Transaction
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return MerchantUrls
     */
    public function getMerchantUrls()
    {
        return $this->merchantUrls;
    }

    /**
     * @param MerchantUrls $merchantUrls
     *
     * @return Transaction
     */
    public function setMerchantUrls(MerchantUrls $merchantUrls)
    {
        $this->merchantUrls = $merchantUrls;

        return $this;
    }

    /**
     * @return Options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Options $options
     *
     * @return Transaction
     */
    public function setOptions(Options $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param $item
     *
     * @return $this
     */
    public function addItem(Item $item)
    {
        $this->orderAmount += $item->getTotalAmount();
        $this->orderTaxAmount += $item->getTotalTaxAmount();

        $this->items->addItem($item);

        return $this;
    }

    /**
     * Remove item
     *
     * @param mixed $reference
     *
     * @return $this
     */
    public function removeItem($reference)
    {
        if (isset($this->items[$reference])) {
            $this->orderAmount -= $this->items[$reference]->getTotalAmount();
            $this->orderTaxAmount -= $this->items[$reference]->getTotalTaxAmount();
            unset($this->items[$reference]);
        }

        return $this;
    }

    /**
     * @return ItemCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_filter([
            'purchase_country'    => $this->getPurchaseCountry(),
            'purchase_currency'   => $this->getPurchaseCurrency(),
            'locale'              => $this->getLocale(),
            'billing_address'     => $this->getBillingAddress()->toArray(),
            'shipping_address'    => $this->getShippingAddress()->toArray(),
            'customer'            => $this->getCustomer()->toArray(),
            'order_amount'        => $this->orderAmount,
            'order_tax_amount'    => $this->orderTaxAmount,
            'order_lines'         => $this->getItems()->toArray(),
            'merchant_urls'       => $this->getMerchantUrls()->toArray(),
            'merchant_reference1' => $this->getMerchantReference1(),
            'merchant_reference2' => $this->getMerchantReference2(),
            'options'             => $this->getOptions()->toArray(),
        ]);
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return \GuzzleHttp\json_encode((array)$this->toArray());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
