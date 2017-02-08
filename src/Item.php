<?php namespace KlarnaKp;

class Item implements Contracts\Model
{
    use Traits\Arrayable;

    const TYPE_PHYSICAL     = 'physical';
    const TYPE_DISCOUNT     = 'discount';
    const TYPE_SHIPPING_FEE = 'shipping_fee';
    const TYPE_SALES_TAX    = 'sales_tax';
    const TYPE_DIGITAL      = 'digital';
    const TYPE_GIFT_CARD    = 'gift_card';
    const TYPE_STORE_CREDIT = 'store_credit';
    const TYPE_SURCHARGE    = 'surcharge';

    protected $type;
    protected $reference;
    protected $name;
    protected $quantity;
    protected $quantityUnit;
    protected $unitPrice;
    protected $taxRate;
    protected $totalAmount;
    protected $totalDiscountAmount;
    protected $totalTaxAmount;
    protected $merchantData;
    protected $productUrl;
    protected $imageUrl;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return Item
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     *
     * @return Item
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     *
     * @return Item
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantityUnit()
    {
        return $this->quantityUnit;
    }

    /**
     * @param int $quantityUnit
     *
     * @return Item
     */
    public function setQuantityUnit($quantityUnit)
    {
        $this->quantityUnit = $quantityUnit;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     *
     * @return Item
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @param mixed $taxRate
     *
     * @return Item
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param mixed $totalAmount
     *
     * @return Item
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalDiscountAmount()
    {
        return $this->totalDiscountAmount;
    }

    /**
     * @param mixed $totalDiscountAmount
     *
     * @return Item
     */
    public function setTotalDiscountAmount($totalDiscountAmount)
    {
        $this->totalDiscountAmount = $totalDiscountAmount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalTaxAmount()
    {
        return $this->totalTaxAmount;
    }

    /**
     * @param mixed $totalTaxAmount
     *
     * @return Item
     */
    public function setTotalTaxAmount($totalTaxAmount)
    {
        $this->totalTaxAmount = $totalTaxAmount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMerchantData()
    {
        return $this->merchantData;
    }

    /**
     * @param mixed $merchantData
     *
     * @return Item
     */
    public function setMerchantData($merchantData)
    {
        $this->merchantData = $merchantData;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductUrl()
    {
        return $this->productUrl;
    }

    /**
     * @param mixed $productUrl
     *
     * @return Item
     */
    public function setProductUrl($productUrl)
    {
        $this->productUrl = $productUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $imageUrl
     *
     * @return Item
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function toArray()
    {
        return array_filter([
            'type'                  => $this->getType(),
            'reference'             => $this->getReference(),
            'name'                  => $this->getName(),
            'quantity'              => $this->getQuantity(),
            'quantity_unit'         => $this->getQuantityUnit(),
            'unit_price'            => $this->getUnitPrice(),
            'tax_rate'              => $this->getTaxRate(),
            'total_amount'          => $this->getTotalAmount(),
            'total_discount_amount' => $this->getTotalDiscountAmount(),
            'total_tax_amount'      => $this->getTotalTaxAmount(),
            'merchant_data'         => $this->getMerchantData(),
            'product_url'           => $this->getProductUrl(),
            'image_url'             => $this->getImageUrl(),
        ]);
    }
}
