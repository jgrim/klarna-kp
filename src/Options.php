<?php namespace KlarnaKp;

class Options implements Contracts\Model
{
    use Traits\Arrayable;

    protected $colorButton;
    protected $colorButtonText;
    protected $colorCheckbox;
    protected $colorCheckboxCheckmark;
    protected $colorHeader;
    protected $colorLink;
    protected $colorBorder;
    protected $colorBorderSelected;
    protected $colorText;
    protected $colorDetails;
    protected $colorTextSecondary;
    protected $radiusBorder;

    /**
     * @return mixed
     */
    public function getColorButton()
    {
        return $this->colorButton;
    }

    /**
     * @param mixed $colorButton
     *
     * @return Options
     */
    public function setColorButton($colorButton)
    {
        $this->colorButton = $colorButton;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorButtonText()
    {
        return $this->colorButtonText;
    }

    /**
     * @param mixed $colorButtonText
     *
     * @return Options
     */
    public function setColorButtonText($colorButtonText)
    {
        $this->colorButtonText = $colorButtonText;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorCheckbox()
    {
        return $this->colorCheckbox;
    }

    /**
     * @param mixed $colorCheckbox
     *
     * @return Options
     */
    public function setColorCheckbox($colorCheckbox)
    {
        $this->colorCheckbox = $colorCheckbox;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorCheckboxCheckmark()
    {
        return $this->colorCheckboxCheckmark;
    }

    /**
     * @param mixed $colorCheckboxCheckmark
     *
     * @return Options
     */
    public function setColorCheckboxCheckmark($colorCheckboxCheckmark)
    {
        $this->colorCheckboxCheckmark = $colorCheckboxCheckmark;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorHeader()
    {
        return $this->colorHeader;
    }

    /**
     * @param mixed $colorHeader
     *
     * @return Options
     */
    public function setColorHeader($colorHeader)
    {
        $this->colorHeader = $colorHeader;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorLink()
    {
        return $this->colorLink;
    }

    /**
     * @param mixed $colorLink
     *
     * @return Options
     */
    public function setColorLink($colorLink)
    {
        $this->colorLink = $colorLink;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorBorder()
    {
        return $this->colorBorder;
    }

    /**
     * @param mixed $colorBorder
     *
     * @return Options
     */
    public function setColorBorder($colorBorder)
    {
        $this->colorBorder = $colorBorder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorBorderSelected()
    {
        return $this->colorBorderSelected;
    }

    /**
     * @param mixed $colorBorderSelected
     *
     * @return Options
     */
    public function setColorBorderSelected($colorBorderSelected)
    {
        $this->colorBorderSelected = $colorBorderSelected;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorText()
    {
        return $this->colorText;
    }

    /**
     * @param mixed $colorText
     *
     * @return Options
     */
    public function setColorText($colorText)
    {
        $this->colorText = $colorText;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorDetails()
    {
        return $this->colorDetails;
    }

    /**
     * @param mixed $colorDetails
     *
     * @return Options
     */
    public function setColorDetails($colorDetails)
    {
        $this->colorDetails = $colorDetails;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorTextSecondary()
    {
        return $this->colorTextSecondary;
    }

    /**
     * @param mixed $colorTextSecondary
     *
     * @return Options
     */
    public function setColorTextSecondary($colorTextSecondary)
    {
        $this->colorTextSecondary = $colorTextSecondary;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRadiusBorder()
    {
        return $this->radiusBorder;
    }

    /**
     * @param mixed $radiusBorder
     *
     * @return Options
     */
    public function setRadiusBorder($radiusBorder)
    {
        $this->radiusBorder = $radiusBorder;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_filter([
            'color_button'             => $this->getColorButton(),
            'color_button_text'        => $this->getColorButtonText(),
            'color_checkbox'           => $this->getColorCheckbox(),
            'color_checkbox_checkmark' => $this->getColorCheckboxCheckmark(),
            'color_header'             => $this->getColorHeader(),
            'color_link'               => $this->getColorLink(),
            'color_border'             => $this->getColorBorder(),
            'color_border_selected'    => $this->getColorBorderSelected(),
            'color_text'               => $this->getColorText(),
            'color_details'            => $this->getColorDetails(),
            'color_text_secondary'     => $this->getColorTextSecondary(),
            'radius_border'            => $this->getRadiusBorder(),
        ]);
    }
}
