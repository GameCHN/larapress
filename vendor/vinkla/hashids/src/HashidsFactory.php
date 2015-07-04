<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Hashids;

use Hashids\Hashids;

/**
 * This is the Hashids factory class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class HashidsFactory
{
    /**
     * Make a new Hashids client.
     *
     * @param array $config
     *
     * @return \Hashids\Hashids
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        $keys = ['salt', 'length', 'alphabet'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new \InvalidArgumentException('The hashids client requires configuration.');
            }
        }

        return array_only($config, $keys);
    }

    /**
     * Get the hashids client.
     *
     * @param string[] $config
     *
     * @return \Hashids\Hashids
     */
    protected function getClient(array $config)
    {
        return new Hashids(
            $config['salt'],
            $config['length'],
            $config['alphabet']
        );
    }
}
