<?php namespace KlarnaKp;

/**
 * Copyright 2017 Jason Grim
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package    KlarnaKp
 * @author     Jason Grim <me@jasongrim.com>
 */

use KlarnaCore\Resource;
use KlarnaCore\Transaction;

/**
 * Klarna Payment Session
 *
 * @package KlarnaKp
 */
class Session extends Resource
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
        return $this->client->get(sprintf('credit/v1/sessions/%s', $id));
    }

    /**
     * @param array|Transaction $data
     *
     * @see https://developers.klarna.com/api/#payments-api-create-a-new-session
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($data)
    {
        if ($data instanceof Transaction) {
            $data = $data->toArray();
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Data must be an array.');
        }

        return $this->client->post('credit/v1/sessions', [
            'json' => $data
        ]);
    }

    /**
     * @param string            $id
     * @param array|Transaction $data
     *
     * @see https://developers.klarna.com/api/#payments-api-update-an-existing-session
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($id, $data)
    {
        if ($data instanceof Transaction) {
            $data = $data->toArray();
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Data must be an array.');
        }

        return $this->client->post(sprintf('credit/v1/sessions/%s', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string            $id
     * @param array|Transaction $data
     *
     * @see https://developers.klarna.com/api/#payments-api-create-a-new-order
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function authorize($id, $data)
    {
        if ($data instanceof Transaction) {
            $data = $data->toArray();
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Data must be an array.');
        }

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
