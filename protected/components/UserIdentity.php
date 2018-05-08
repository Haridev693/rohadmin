<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var integer id of logged user
     */
    private $_id;

    /**
     * Authenticates username and password
     * @return boolean CUserIdentity::ERROR_NONE if successful authentication
     */
    public function authenticate()
    {
        /* @var User $model */
        $model = Login::model()->findByAttributes(array('nameOperator' => $this->username));
        if ($model == null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($this->password != $model->passOperator){
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }

        else {
            /* With this system, it's always administrator is an unique user! */
            $this->_id = $model->id;
            $this->setState('username', $model->nameOperator);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }


    /**
     *
     * @return integer id of the logged user, null if not set
     */
    public function getId()
    {
        return $this->_id;
    }
}