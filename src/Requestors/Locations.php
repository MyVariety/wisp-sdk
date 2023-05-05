<?php
namespace MyVariety\WispSDK\Requestors;

class Locations extends \MyVariety\WispSDK\Requestor
{
    /**
     * Fetches a list of locations from Wisp
     *
     * @return WispResponse
     */
    public function getAll()
    {
        return $this->apiRequest('application/locations');
    }

    /**
     * Fetches a location from Wisp
     *
     * @param int $locationId The ID of the location to fetch
     * @return WispResponse
     */
    public function get($locationId)
    {
        return $this->apiRequest('application/locations/' . $locationId);
    }

    /**
     * Adds a location in Wisp
     *
     * @param array $params A list of request parameters including:
     *
     *  - shortcode The shortcode of the location
     *  - description A description of the location
     * @return WispResponse
     */
    public function add(array $params)
    {
        return $this->apiRequest('application/locations', $params, 'POST');
    }

    /**
     * Edits a location in Wisp
     *
     * @param int $locationId The ID of the location to edit
     * @param array $params A list of request parameters including:
     *
     *  - shortcode The shortcode of the location
     *  - description A description of the location
     * @return WispResponse
     */
    public function edit($locationId, array $params)
    {
        return $this->apiRequest('application/locations/' . $locationId, $params, 'PATCH');
    }

    /**
     * Deletes a location in Wisp
     *
     * @param int $locationId The ID of the location to delete
     * @return WispResponse
     */
    public function delete($locationId)
    {
        return $this->apiRequest('application/locations/' . $locationId, [], 'DELETE');
    }
}