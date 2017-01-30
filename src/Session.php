<?php namespace KlarnaKp;

/**
 * Klarna Payment Session
 *
 * @package KlarnaKp
 */
class Session extends \KlarnaCore\Resource
{
    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#payments-api-read-an-existing-session
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        return $this->client->get(sprintf('credit/v1/orders/%s', $id));
    }

    /**
     * @param array $data
     *
     * @see https://developers.klarna.com/api/#payments-api-create-a-new-session
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(array $data)
    {
        return $this->client->post('credit/v1/orders', [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#payments-api-update-an-existing-session
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($id, array $data)
    {
        return $this->client->post(sprintf('credit/v1/orders/%s', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#payments-api-create-a-new-order
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function authorize($id, array $data)
    {
        return $this->client->post(sprintf('/credit/v1/authorizations/%s/order', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#payments-api-cancel-an-existing-authorization
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function cancelAuthorization($id)
    {
        return $this->client->delete(sprintf('/credit/v1/authorizations/%s', $id));
    }
}
