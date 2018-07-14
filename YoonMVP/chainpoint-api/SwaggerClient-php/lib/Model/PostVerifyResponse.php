<?php
/**
 * PostVerifyResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Chainpoint Node
 *
 * Documentation for the Chainpoint Node API
 *
 * OpenAPI spec version: 1.0.0
 * Contact: team@chainpoint.org
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 1.0.14
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * PostVerifyResponse Class Doc Comment
 *
 * @category Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PostVerifyResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PostVerifyResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'proof_index' => 'int',
        'hash' => 'string',
        'hash_id_node' => 'string',
        'hash_submitted_node_at' => '\DateTime',
        'hash_id_core' => 'string',
        'hash_submitted_core_at' => '\DateTime',
        'anchors' => '\Swagger\Client\Model\PostVerifyResponseAnchors[]',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'proof_index' => null,
        'hash' => null,
        'hash_id_node' => null,
        'hash_submitted_node_at' => 'date-time',
        'hash_id_core' => null,
        'hash_submitted_core_at' => 'date-time',
        'anchors' => null,
        'status' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'proof_index' => 'proof_index',
        'hash' => 'hash',
        'hash_id_node' => 'hash_id_node',
        'hash_submitted_node_at' => 'hash_submitted_node_at',
        'hash_id_core' => 'hash_id_core',
        'hash_submitted_core_at' => 'hash_submitted_core_at',
        'anchors' => 'anchors',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'proof_index' => 'setProofIndex',
        'hash' => 'setHash',
        'hash_id_node' => 'setHashIdNode',
        'hash_submitted_node_at' => 'setHashSubmittedNodeAt',
        'hash_id_core' => 'setHashIdCore',
        'hash_submitted_core_at' => 'setHashSubmittedCoreAt',
        'anchors' => 'setAnchors',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'proof_index' => 'getProofIndex',
        'hash' => 'getHash',
        'hash_id_node' => 'getHashIdNode',
        'hash_submitted_node_at' => 'getHashSubmittedNodeAt',
        'hash_id_core' => 'getHashIdCore',
        'hash_submitted_core_at' => 'getHashSubmittedCoreAt',
        'anchors' => 'getAnchors',
        'status' => 'getStatus'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['proof_index'] = isset($data['proof_index']) ? $data['proof_index'] : null;
        $this->container['hash'] = isset($data['hash']) ? $data['hash'] : null;
        $this->container['hash_id_node'] = isset($data['hash_id_node']) ? $data['hash_id_node'] : null;
        $this->container['hash_submitted_node_at'] = isset($data['hash_submitted_node_at']) ? $data['hash_submitted_node_at'] : null;
        $this->container['hash_id_core'] = isset($data['hash_id_core']) ? $data['hash_id_core'] : null;
        $this->container['hash_submitted_core_at'] = isset($data['hash_submitted_core_at']) ? $data['hash_submitted_core_at'] : null;
        $this->container['anchors'] = isset($data['anchors']) ? $data['anchors'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets proof_index
     *
     * @return int
     */
    public function getProofIndex()
    {
        return $this->container['proof_index'];
    }

    /**
     * Sets proof_index
     *
     * @param int $proof_index proof_index
     *
     * @return $this
     */
    public function setProofIndex($proof_index)
    {
        $this->container['proof_index'] = $proof_index;

        return $this;
    }

    /**
     * Gets hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->container['hash'];
    }

    /**
     * Sets hash
     *
     * @param string $hash hash
     *
     * @return $this
     */
    public function setHash($hash)
    {
        $this->container['hash'] = $hash;

        return $this;
    }

    /**
     * Gets hash_id_node
     *
     * @return string
     */
    public function getHashIdNode()
    {
        return $this->container['hash_id_node'];
    }

    /**
     * Sets hash_id_node
     *
     * @param string $hash_id_node hash_id_node
     *
     * @return $this
     */
    public function setHashIdNode($hash_id_node)
    {
        $this->container['hash_id_node'] = $hash_id_node;

        return $this;
    }

    /**
     * Gets hash_submitted_node_at
     *
     * @return \DateTime
     */
    public function getHashSubmittedNodeAt()
    {
        return $this->container['hash_submitted_node_at'];
    }

    /**
     * Sets hash_submitted_node_at
     *
     * @param \DateTime $hash_submitted_node_at hash_submitted_node_at
     *
     * @return $this
     */
    public function setHashSubmittedNodeAt($hash_submitted_node_at)
    {
        $this->container['hash_submitted_node_at'] = $hash_submitted_node_at;

        return $this;
    }

    /**
     * Gets hash_id_core
     *
     * @return string
     */
    public function getHashIdCore()
    {
        return $this->container['hash_id_core'];
    }

    /**
     * Sets hash_id_core
     *
     * @param string $hash_id_core hash_id_core
     *
     * @return $this
     */
    public function setHashIdCore($hash_id_core)
    {
        $this->container['hash_id_core'] = $hash_id_core;

        return $this;
    }

    /**
     * Gets hash_submitted_core_at
     *
     * @return \DateTime
     */
    public function getHashSubmittedCoreAt()
    {
        return $this->container['hash_submitted_core_at'];
    }

    /**
     * Sets hash_submitted_core_at
     *
     * @param \DateTime $hash_submitted_core_at hash_submitted_core_at
     *
     * @return $this
     */
    public function setHashSubmittedCoreAt($hash_submitted_core_at)
    {
        $this->container['hash_submitted_core_at'] = $hash_submitted_core_at;

        return $this;
    }

    /**
     * Gets anchors
     *
     * @return \Swagger\Client\Model\PostVerifyResponseAnchors[]
     */
    public function getAnchors()
    {
        return $this->container['anchors'];
    }

    /**
     * Sets anchors
     *
     * @param \Swagger\Client\Model\PostVerifyResponseAnchors[] $anchors anchors
     *
     * @return $this
     */
    public function setAnchors($anchors)
    {
        $this->container['anchors'] = $anchors;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param  integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param  integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param  integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}