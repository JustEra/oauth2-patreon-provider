<?php
namespace JustEra\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class PatreonResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;

    /**
     * Raw response
     *
     * @var array
     */
    protected $response;

    /**
     * Creates new resource owner.
     *
     * @param array  $response
     */
    public function __construct(array $response = array())
    {
        $this->response = $response['data'];
    }

    /**
     * Get resource owner ID
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->getValueByKey($this->response, 'id');
    }

    /**
     * Get resource owner username
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->getValueByKey($this->response['attributes'], 'vanity');
    }

    
    /**
     * Get resource owner verified flag
     *
     * @return bool
     */
    public function getVerified()
    {
        return $this->getValueByKey($this->response['attributes'], 'is_email_verified', false);
    }

    /**
     * Get resource owner email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getValueByKey($this->response['attributes'], 'email');
    }

    /**
     * Returns the raw resource owner response.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }
}
