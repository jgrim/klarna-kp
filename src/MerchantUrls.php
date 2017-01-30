<?php namespace KlarnaKp;

/**
 * Class MerchantUrls
 *
 * @package KlarnaKp
 */
class MerchantUrls extends Model
{
    protected $baseUri;
    protected $confirmation;
    protected $notification;
    protected $push;

    /**
     * @param string $baseUri
     *
     * @return MerchantUrls
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = \GuzzleHttp\Psr7\uri_for($baseUri);

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @return string
     */
    public function getConfirmation()
    {
        return $this->buildUri($this->confirmation);
    }

    /**
     * @param string $confirmation
     *
     * @return MerchantUrls
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = \GuzzleHttp\Psr7\uri_for($confirmation);

        return $this;
    }

    /**
     * @return string
     */
    public function getNotification()
    {
        return $this->buildUri($this->notification);
    }

    /**
     * @param string $notification
     *
     * @return MerchantUrls
     */
    public function setNotification($notification)
    {
        $this->notification = \GuzzleHttp\Psr7\uri_for($notification);

        return $this;
    }

    /**
     * @return string
     */
    public function getPush()
    {
        return $this->buildUri($this->push);
    }

    /**
     * @param string $push
     *
     * @return MerchantUrls
     */
    public function setPush($push)
    {
        $this->push = \GuzzleHttp\Psr7\uri_for($push);

        return $this;
    }

    public function toArray()
    {
        return array_filter([
            'confirmation' => (string)$this->getConfirmation(),
            'notification' => (string)$this->getNotification(),
            'push'         => (string)$this->getPush(),
        ]);
    }

    /**
     * @param string $uri
     *
     * @return \Psr\Http\Message\UriInterface|static
     */
    protected function buildUri($uri)
    {
        // for BC we accept null which would otherwise fail in uri_for
        $uri = \GuzzleHttp\Psr7\uri_for($uri === null ? '' : $uri);

        if ($this->getBaseUri()) {
            $uri = \GuzzleHttp\Psr7\Uri::resolve(\GuzzleHttp\Psr7\uri_for($this->getBaseUri()), $uri);
        }

        return $uri->getScheme() === '' && $uri->getHost() !== '' ? $uri->withScheme('http') : $uri;
    }
}
