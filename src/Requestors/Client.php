<?php
namespace MyVariety\WispSDK\Requestors;

class Client extends \MyVariety\WispSDK\Requestor
{
    /**
     * Fetches a list of servers from Wisp
     *
     * @return WispResponse
     */
    public function getServers()
    {
        return $this->apiRequest('client');
    }

    /**
     * Fetches a server from Wisp
     *
     * @param int $serverId The ID of the server to fetch
     * @return WispResponse
     */
    public function getServer($serverId)
    {
        return $this->apiRequest('client/servers/' . $serverId);
    }

    /**
     * Fetches utilization stats for a server from Wisp
     *
     * @param int $serverId The ID of the server for which to fetch stats
     * @return WispResponse
     */
    public function getServerUtilization($serverId)
    {
        return $this->apiRequest('client/servers/' . $serverId . '/utilization');
    }

    /**
     * Sends a console command to the given server from Wisp
     *
     * @param int $serverId The ID of the server to which a command is being sent
     * @param string $command The command being sent
     * @return WispResponse
     */
    public function serverConsoleCommand($serverId, $command)
    {
        return $this->apiRequest('client/servers/' . $serverId . '/command', ['command' => $command], 'POST');
    }

    /**
     * Sends a power signal to the given server from Wisp
     *
     * @param int $serverId The ID of the server to which a power signal is being sent
     * @param string $signal The power signal to send ('start', 'stop', 'restart', or 'kill')
     * @return WispResponse
     */
    public function serverPowerSignal($serverId, $signal)
    {
        return $this->apiRequest('client/servers/' . $serverId . '/power', ['signal' => $signal], 'POST');
    }
}