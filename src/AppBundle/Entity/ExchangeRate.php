<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExchangeRate
 *
 * @ORM\Table(name="exchange_rate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExchangeRateRepository")
 */
class ExchangeRate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="exchange_rate_key", type="string", length=255)
     */
    private $exchangeRateKey;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=5)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $updateDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set exchangeRateKey
     *
     * @param string $exchangeRateKey
     *
     * @return ExchangeRate
     */
    public function setExchangeRateKey($exchangeRateKey)
    {
        $this->exchangeRateKey = $exchangeRateKey;

        return $this;
    }

    /**
     * Get exchangeRateKey
     *
     * @return string
     */
    public function getExchangeRateKey()
    {
        return $this->exchangeRateKey;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ExchangeRate
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return ExchangeRate
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return ExchangeRate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
}

