<?php
/**
 * Handles authentication of site administrators.
 */
class Auth {
    private $users;

    /**
     * Configures the authentication with list of users.
     * @param array $users
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Checks if username and password match with entries in user database.
     * @param string $username
     * @param string $password
     * @return boolean True when logic credentials match.
     */
    public function login($username, $password)
    {
        $userRecord = $this->getUserRecord($username);

        if (!$userRecord) {
            return false;
        }

        if ($this->checkPass($userRecord["hash"], $userRecord["salt"], $password)) {
            return true;
        }

        return false;
    }

    private function getUserRecord($username)
    {
        foreach ($this->users as $r) {
            if ($r["name"] == $username) {
                return $r;
            }
        }
        return false;
    }

    /**
     * Checks the password using the hash() function with Whirpool
     * algorithm as suggested on PHP Password Hashing FAQ:
     * http://ee1.php.net/manual/en/faq.passwords.php#faq.passwords.fasthash
     * And on this page:
     * https://crackstation.net/hashing-security.htm
     */
    private function checkPass($hash, $salt, $password)
    {
        return hash("whirlpool", $salt . $password) === $hash;
    }

}
