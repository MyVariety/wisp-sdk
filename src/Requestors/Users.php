<?php
namespace MyVariety\WispSDK\Requestors;

class Users extends \MyVariety\WispSDK\Requestor
{
    /**
     * Fetches a list of users from Wisp
     *
     * @return WispResponse
     */
    public function getAll()
    {
        return $this->apiRequest('application/users');
    }

    /**
     * Fetches a user from Wisp
     *
     * @param int $userId The ID of the user to fetch
     * @return WispResponse
     */
    public function get($userId)
    {
        return $this->apiRequest('application/users/' . $userId);
    }

    /**
     * Fetches a user from Wisp by external ID
     *
     * @param int $externalId The external ID of the user to fetch
     * @return WispResponse
     */
    public function getByExternalID($externalId)
    {
        return $this->apiRequest('application/users/external/' . $externalId);
    }

    /**
     * Adds a user in Wisp
     *
     * @param array $params A list of request parameters including:
     *
     *  - username The username for the accoount
     *  - email The email address for the account
     *  - first_name The user's first name
     *  - last_name The user's last name
     *  - password A plain text input of the desired password
     * @return WispResponse
     */
    public function add(array $params)
    {
        return $this->apiRequest('application/users', $params, 'POST');
    }

    /**
     * Edits a user in Wisp
     *
     * @param int $userId The ID of the user to edit
     * @param array $params A list of request parameters including:
     *
     *  - username The username for the accoount
     *  - email The email address for the account
     *  - first_name The user's first name
     *  - last_name The user's last name
     *  - password A plain text input of the desired password
     * @return WispResponse
     */
    public function edit($userId, array $params)
    {
        return $this->apiRequest('application/users/' . $userId, $params, 'PATCH');
    }

    /**
     * Deletes a user in Wisp
     *
     * @param int $userId The ID of the user to delete
     * @return WispResponse
     */
    public function delete($userId)
    {
        return $this->apiRequest('application/users/' . $userId, [], 'DELETE');
    }
}