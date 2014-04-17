<?php
/**
 * ReportGenerator -- ImportAbstract.php
 * User: Simon Beattie
 * Date: 14/04/2014
 * Time: 10:18
 */

namespace Library;


class WebAbstract
{

    /**
     * @var PDO $pdo
     */
    protected $pdo;

    /**
     * @var array $config
     */
    protected $config;

    public function __construct($pdo, array $config)
    {
        $this->setPdo($pdo);
        $this->setConfig($config);
    }

    /**
     * setConfig sets the config property in object storage
     *
     * @param array $config
     * @throws InvalidArgumentException
     * @return StatusAbstract
     */
    public function setConfig($config)
    {
        if (empty($config)) {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty config');
        }
        $this->config = $config;
        return $this;
    }

    /**
     * getConfig returns the config from the object
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * setPdo sets the pdo property in object storage
     *
     * @param \PDO $pdo
     * @throws InvalidArgumentException
     * @return StatusAbstract
     */
    public function setPdo($pdo)
    {
        if (empty($pdo)) {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty pdo');
        }
        $this->pdo = $pdo;
        return $this;
    }

    /**
     * getPdo returns the pdo from the object
     *
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }


} 