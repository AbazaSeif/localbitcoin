<?php
defined('_JEXEC') or die('Restricted access');

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Resource\Address;

/**
 * Description of Coinbase
 *
 * @author NewEXE
 */
class Coinbase
{

    public $address;
    public $amount;
    private $account;
    private $apiObject;
    private $user_id;

    public function __construct($user_id = false, $apiKey = COINBASE_API_KEY, $apiSecret = COINBASE_API_SECRET)
    {
        $this->user_id = $user_id === false ? User::getUserIdFromSession() : $user_id;
        $this->apiObject = Client::create(Configuration::apiKey($apiKey, $apiSecret));
        if(($accountId = $this->getAccountIdFromDB()) !== false)
        {
            $this->account = $this->apiObject->getAccount($accountId);
            $this->address = $this->getAddressFromDB();
            $this->amount = $this->getAccountBTC();
            $this->updateWallet();
        }
        else
        {
            $this->createWallet();
            $this->insertWalletToDB();
            $this->amount = $this->getAccountBTC();
        }
        $this->apiObject->refreshAccount($this->account);
    }

    /*
      private function deleteAccount()
      {
      $this->apiObject->deleteAccount($this->account);
      } */

    private function getAccountBTC()
    {
        return $this->account->getBalance()->getAmount();
    }

    public function getAccountName()
    {
        return $this->account->getName();
    }

    public function getAccountId()
    {
        return $this->account->getId();
    }

    public function sendBTCto($addressTo, $amount, $ads_id = false)
    {
        if(!is_numeric($amount))
            return false;

        if($amount > $this->amount)
            return false;
        
        if (!Service::checkBTCaddress($addressTo))
            return false;
        
        
        $transaction = Transaction::send();
        $transaction->setToBitcoinAddress($addressTo);
        $transaction->setAmount(new Money($amount, CurrencyCode::BTC));
        $transaction->setDescription(User::getUsernameById($this->user_id));
        $amount < 0.0001 ? $transaction->setFee(0.0001) : '';
        if($this->apiObject->createAccountTransaction($this->account, $transaction))
        {
            //запись в таблицу транзакций, если ads_id не false, цифровой, и такое объявление есть
            return true;
        }
        else
            return false;
    }

    private function createWallet()
    {
        $this->account = new Account();
        $this->account->setName($this->user_id); //аккаунт юзера, доступны
        // ->getName(),->getId(), ->getBalance()->getAmount()

        $this->apiObject->createAccount($this->account);
        //$this->primaryAccount = $this->apiObject->getPrimaryAccount();
        $address = new Address();
        $this->apiObject->createAccountAddress($this->account, $address);
        $this->address = $address->getAddress();
    }

    public function checkBalanceNotNull()
    {
        return $this->amount > 0;
    }

    public function checkAmountForPlacebill($currency_id = false)
    {
        if($currency_id !== false)
        {
            if($currency_id == 1)
            {
                
            }
            elseif($currency_id == 2)
            {
                
            }
        }
        else
        {
            if($this->account < 0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    public function getAccountTransactions()
    {
        $this->apiObject->getAccountTransactions($this->account);
    }

    private function getAccountIdFromDB()
    {
        $sql = 'SELECT id_account FROM wallets WHERE user_id=:user_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $result->execute();
        if($row = $result->fetchColumn())
        {
            return $row;
        }
        else
            return false;
    }

    private function getAddressFromDB()
    {
        $sql = 'SELECT address FROM wallets WHERE user_id=:user_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $result->execute();
        if($row = $result->fetchColumn())
        {
            return $row;
        }
        else
            return false;
    }

    private function updateWallet()
    {
        $user_id = $this->user_id;
        $amount = $this->amount;

        $sql = 'UPDATE wallets SET amount=:amount WHERE user_id=:user_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':amount', $amount, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $result->execute();
    }

    private function insertWalletToDB()
    {
        if($this->account->getName() == $this->user_id)
        {
            $sql = 'INSERT INTO wallets (id_account, address, amount, user_id)'
                    .' VALUES (:id_account, :address, :amount, :user_id)';

            $id_account = $this->account->getId();
            $amount = $this->amount;
            $address = $this->address;

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':id_account', $id_account, PDO::PARAM_STR);
            $result->bindParam(':address', $address, PDO::PARAM_STR);
            $result->bindParam(':amount', $amount, PDO::PARAM_STR);
            $result->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
            if($result->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        return false;
    }

}
