<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Vault\Business;

interface VaultFacadeInterface
{
    /**
     * Specification:
     * - Generates initial vector for encryption.
     * - Generates cipher text using AES-XXX.
     * - Stores cipher text and initial vector in Persistence.
     * - If byte string is used as the initialization vector, it will be encoded to hex string before persisting.
     * - Throws exception if encryption key is not pre-configured.
     *
     * Example:
     * store('product-abstract-secret', 'SKU-001', 'actual product secret')
     *
     * @api
     *
     * @param string $dataType
     * @param string $dataKey
     * @param string $data
     *
     * @return bool
     */
    public function store(string $dataType, string $dataKey, string $data): bool;

    /**
     * Specification:
     * - Retrieves decrypted data, returns null if nothing found.
     * - If byte string is used as the initialization vector, it will be decoded from hex to byte string after querying from the database.
     * - Throws exception if encryption key is not pre-configured.
     *
     * Example:
     * retrieve('product-abstract-secret', 'SKU-001'): 'actual product secret'
     *
     * @api
     *
     * @param string $dataType
     * @param string $dataKey
     *
     * @return string|null
     */
    public function retrieve(string $dataType, string $dataKey): ?string;
}
