<?php
namespace MyVariety\WispSDK\Requestors;

class Servers extends \MyVariety\WispSDK\Requestor
{
    /**
     * Initializes the requestor with connection parameters
     *
     * @param string $apiKey The API key
     * @param string $apiUrl The API URL
     * @param bool $useSsl Whether to connect using ssl (optional)
     */
    public function __construct($apiKey, $apiUrl, $useSsl = true)
    {
        $this->setQueryParameters(['include' => 'allocations']);
        parent::__construct($apiKey, $apiUrl, $useSsl);
    }

    /**
     * Fetches a list of servers from Wisp
     *
     * @return WispResponse
     */
    public function getAll()
    {
        return $this->apiRequest('application/servers');
    }

    /**
     * Fetches a server from Wisp
     *
     * @param int $serverId The ID of the server to fetch
     * @return WispResponse
     */
    public function get($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId);
    }

    /**
     * Fetches a server from Wisp by external ID
     *
     * @param int $externalId The external ID of the server to fetch
     * @return WispResponse
     */
    public function getByExternalID($externalId)
    {
        return $this->apiRequest('application/servers/external/' . $externalId);
    }

    /**
     * Adds a server in Wisp
     *
     * @param array $params A list of request parameters including:
     *
     *  Please note that every environment variable from the egg must be set.
     * @return WispResponse
     */
    public function add(array $params)
    {
        return $this->apiRequest('application/servers', $params, 'POST');
    }

    /**
     * Edits the details for a server in Wisp
     *
     * @param int $serverId The ID of the server to edit
     * @param array $params A list of request parameters including:
     * @return WispResponse
     */
    public function editDetails($serverId, array $params)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/details', $params, 'PATCH');
    }

    /**
     * Edits the build for a server in Wisp
     *
     * @param int $serverId The ID of the server to edit
     * @param array $params A list of request parameters including:
     * @return WispResponse
     */
    public function editBuild($serverId, array $params)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/build', $params, 'PATCH');
    }

    /**
     * Edits the startup parameters for a server in Wisp
     *
     * @param int $serverId The ID of the server to edit
     * @param array $params A list of request parameters including:
     * @return WispResponse
     */
    public function editStartup($serverId, array $params)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/startup', $params, 'PATCH');
    }

    /**
     * Suspends a server in Wisp
     *
     * @param int $serverId The ID of the server to suspend
     * @return WispResponse
     */
    public function suspend($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/suspend', [], 'POST');
    }

    /**
     * Unsuspends a server in Wisp
     *
     * @param int $serverId The ID of the server to unsuspend
     * @return WispResponse
     */
    public function unsuspend($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/unsuspend', [], 'POST');
    }

    /**
     * Reinstall a server in Wisp
     *
     * @param int $serverId The ID of the server to reinstall
     * @return WispResponse
     */
    public function reinstall($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/reinstall', [], 'POST');
    }

    /**
     * Deletes a server in Wisp
     *
     * @param int $serverId The ID of the server to delete
     * @return WispResponse
     */
    public function delete($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId, [], 'DELETE');
    }

    /**
     * Forcefully deletes a server in Wisp
     *
     * @param int $serverId The ID of the server to delete
     * @return WispResponse
     */
    public function forceDelete($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/force', [], 'DELETE');
    }

    /**
     * Fetches all databases from the given server in Wisp
     *
     * @param int $serverId The ID of the server from which to fetch databases
     * @return WispResponse
     */
    public function databasesGetAll($serverId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/databases', [], 'GET');
    }

    /**
     * Fetches a database from the given server in Wisp
     *
     * @param int $serverId The ID of the server from which to fetch the database
     * @param int $databaseId The ID of the database to fetch
     * @return WispResponse
     */
    public function databasesGet($serverId, $databaseId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/databases/' . $databaseId, [], 'GET');
    }

    /**
     * Adds database for the given server in Wisp
     *
     * @param int $serverId The ID of the server for which to create the database
     * @param array $params A list of request parameters including:
     *
     *  - shortcode The shortcode of the server
     *  - description A description of the server
     * @return WispResponse
     */
    public function databasesAdd($serverId, array $params)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/databases', $params, 'POST');
    }

    /**
     * Resets the password for a database in Wisp
     *
     * @param int $serverId The ID of the server the database is on
     * @param int $databaseId The ID of the database for which to reset the password
     * @return WispResponse
     */
    public function databasesResetPassword($serverId, $databaseId)
    {
        return $this->apiRequest(
            'application/servers/' . $serverId . '/databases/' . $databaseId . 'reset-password',
            [],
            'POST'
        );
    }

    /**
     * Deletes a database in Wisp
     *
     * @param int $serverId The ID of the server the database is on
     * @param int $databaseId The ID of the database to delete
     * @return WispResponse
     */
    public function databasesDelete($serverId, $databaseId)
    {
        return $this->apiRequest('application/servers/' . $serverId . '/databases/' . $databaseId, [], 'DELETE');
    }
}