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
        $this->response = $response;
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
        return $this->getValueByKey($this->response, 'username');
    }

    /**
     * Get resource owner discriminator
     *
     * @return string|null
     */
    public function getDiscriminator()
    {
        return $this->getValueByKey($this->response, 'discriminator');
    }

    /**
     * Get resource owner avatar hash
     *
     * @return string|null
     */
    public function getAvatarHash()
    {
        return $this->getValueByKey($this->response, 'avatar');
    }

    /**
     * Get resource owner verified flag
     *
     * @return bool
     */
    public function getVerified()
    {
        return $this->getValueByKey($this->response, 'verified', false);
    }

    /**
     * Get resource owner email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getValueByKey($this->response, 'email');
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
