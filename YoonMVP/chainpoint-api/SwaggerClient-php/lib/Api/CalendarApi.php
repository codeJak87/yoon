<?php
/**
 * CalendarApi
 * PHP version 5
 *
 * @category Class
 * @package  Chainpoint\Client
 * @author   Chainpoint Codegen team
 * @link     https://github.com/Chainpoint-api/Chainpoint-codegen
 */

/**
 * Chainpoint Node
 *
 * Documentation for the Chainpoint Node API
 *
 * OpenAPI spec version: 1.0.0
 * Contact: team@chainpoint.org
 * Generated by: https://github.com/Chainpoint-api/Chainpoint-codegen.git
 * Chainpoint Codegen version: 1.0.14
 */

/**
 * NOTE: This class is auto generated by the Chainpoint code generator program.
 * https://github.com/Chainpoint-api/Chainpoint-codegen
 * Do not edit the class manually.
 */

namespace Chainpoint\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Chainpoint\Client\ApiException;
use Chainpoint\Client\Configuration;
use Chainpoint\Client\HeaderSelector;
use Chainpoint\Client\ObjectSerializer;

/**
 * CalendarApi Class Doc Comment
 *
 * @category Class
 * @package  Chainpoint\Client
 * @author   Chainpoint Codegen team
 * @link     https://github.com/Chainpoint-api/Chainpoint-codegen
 */
class CalendarApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation calendarHeightDataGet
     *
     * Retrieves the calendar block data_val at the given height
     *
     * @param  int $height The height of the block data_val to retrieve (required)
     *
     * @throws \Chainpoint\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Chainpoint\Client\Model\GetCalendarBlockDataResponse
     */
    public function calendarHeightDataGet($height)
    {
        list($response) = $this->calendarHeightDataGetWithHttpInfo($height);
        return $response;
    }

    /**
     * Operation calendarHeightDataGetWithHttpInfo
     *
     * Retrieves the calendar block data_val at the given height
     *
     * @param  int $height The height of the block data_val to retrieve (required)
     *
     * @throws \Chainpoint\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Chainpoint\Client\Model\GetCalendarBlockDataResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function calendarHeightDataGetWithHttpInfo($height)
    {
        $returnType = '\Chainpoint\Client\Model\GetCalendarBlockDataResponse';
        $request = $this->calendarHeightDataGetRequest($height);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Chainpoint\Client\Model\GetCalendarBlockDataResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Chainpoint\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation calendarHeightDataGetAsync
     *
     * Retrieves the calendar block data_val at the given height
     *
     * @param  int $height The height of the block data_val to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calendarHeightDataGetAsync($height)
    {
        return $this->calendarHeightDataGetAsyncWithHttpInfo($height)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calendarHeightDataGetAsyncWithHttpInfo
     *
     * Retrieves the calendar block data_val at the given height
     *
     * @param  int $height The height of the block data_val to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calendarHeightDataGetAsyncWithHttpInfo($height)
    {
        $returnType = '\Chainpoint\Client\Model\GetCalendarBlockDataResponse';
        $request = $this->calendarHeightDataGetRequest($height);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'calendarHeightDataGet'
     *
     * @param  int $height The height of the block data_val to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function calendarHeightDataGetRequest($height)
    {
        // verify the required parameter 'height' is set
        if ($height === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $height when calling calendarHeightDataGet'
            );
        }

        $resourcePath = '/calendar/{height}/data';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($height !== null) {
            $resourcePath = str_replace(
                '{' . 'height' . '}',
                ObjectSerializer::toPathValue($height),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['text/plain']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['text/plain'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation calendarHeightGet
     *
     * Retrieves the calendar block at the given height
     *
     * @param  int $height The height of the block to retrieve (required)
     *
     * @throws \Chainpoint\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Chainpoint\Client\Model\GetCalendarBlockResponse
     */
    public function calendarHeightGet($height)
    {
        list($response) = $this->calendarHeightGetWithHttpInfo($height);
        return $response;
    }

    /**
     * Operation calendarHeightGetWithHttpInfo
     *
     * Retrieves the calendar block at the given height
     *
     * @param  int $height The height of the block to retrieve (required)
     *
     * @throws \Chainpoint\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Chainpoint\Client\Model\GetCalendarBlockResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function calendarHeightGetWithHttpInfo($height)
    {
        $returnType = '\Chainpoint\Client\Model\GetCalendarBlockResponse';
        $request = $this->calendarHeightGetRequest($height);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Chainpoint\Client\Model\GetCalendarBlockResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Chainpoint\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation calendarHeightGetAsync
     *
     * Retrieves the calendar block at the given height
     *
     * @param  int $height The height of the block to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calendarHeightGetAsync($height)
    {
        return $this->calendarHeightGetAsyncWithHttpInfo($height)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calendarHeightGetAsyncWithHttpInfo
     *
     * Retrieves the calendar block at the given height
     *
     * @param  int $height The height of the block to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calendarHeightGetAsyncWithHttpInfo($height)
    {
        $returnType = '\Chainpoint\Client\Model\GetCalendarBlockResponse';
        $request = $this->calendarHeightGetRequest($height);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'calendarHeightGet'
     *
     * @param  int $height The height of the block to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function calendarHeightGetRequest($height)
    {
        // verify the required parameter 'height' is set
        if ($height === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $height when calling calendarHeightGet'
            );
        }

        $resourcePath = '/calendar/{height}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($height !== null) {
            $resourcePath = str_replace(
                '{' . 'height' . '}',
                ObjectSerializer::toPathValue($height),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation calendarHeightHashGet
     *
     * Retrieves the calendar block hash at the given height
     *
     * @param  int $height The height of the block hash to retrieve (required)
     *
     * @throws \Chainpoint\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Chainpoint\Client\Model\GetCalendarBlockHashResponse
     */
    public function calendarHeightHashGet($height)
    {
        list($response) = $this->calendarHeightHashGetWithHttpInfo($height);
        return $response;
    }

    /**
     * Operation calendarHeightHashGetWithHttpInfo
     *
     * Retrieves the calendar block hash at the given height
     *
     * @param  int $height The height of the block hash to retrieve (required)
     *
     * @throws \Chainpoint\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Chainpoint\Client\Model\GetCalendarBlockHashResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function calendarHeightHashGetWithHttpInfo($height)
    {
        $returnType = '\Chainpoint\Client\Model\GetCalendarBlockHashResponse';
        $request = $this->calendarHeightHashGetRequest($height);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Chainpoint\Client\Model\GetCalendarBlockHashResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Chainpoint\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation calendarHeightHashGetAsync
     *
     * Retrieves the calendar block hash at the given height
     *
     * @param  int $height The height of the block hash to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calendarHeightHashGetAsync($height)
    {
        return $this->calendarHeightHashGetAsyncWithHttpInfo($height)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calendarHeightHashGetAsyncWithHttpInfo
     *
     * Retrieves the calendar block hash at the given height
     *
     * @param  int $height The height of the block hash to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calendarHeightHashGetAsyncWithHttpInfo($height)
    {
        $returnType = '\Chainpoint\Client\Model\GetCalendarBlockHashResponse';
        $request = $this->calendarHeightHashGetRequest($height);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'calendarHeightHashGet'
     *
     * @param  int $height The height of the block hash to retrieve (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function calendarHeightHashGetRequest($height)
    {
        // verify the required parameter 'height' is set
        if ($height === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $height when calling calendarHeightHashGet'
            );
        }

        $resourcePath = '/calendar/{height}/hash';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($height !== null) {
            $resourcePath = str_replace(
                '{' . 'height' . '}',
                ObjectSerializer::toPathValue($height),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['text/plain']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['text/plain'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
