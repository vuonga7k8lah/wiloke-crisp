<?php

namespace WilokeCrisp\Controllers;

use Crisp\CrispClient;

class TestController
{
    const websiteID='69e05390-d632-43ab-9ee9-e5e0c7716692';
    const identifier = '222f7313-d239-48f8-9b13-e5ff102f3a2e';
    const key        = 'd738594ff84ba546ae329d00e922949b2140b7089b568fdb15c15824618796fb';
    public static ?TestController $_self    = null;
    public static ?CrispClient    $oConnect = null;

    public static function connect(): ?TestController
    {
        if (self::$_self == null) {
            self::$_self = new self();
        }
        $CrispClient = new CrispClient;

        $CrispClient->authenticate(self::identifier, self::key);
        self::$oConnect = $CrispClient;
        return self::$_self;
    }

    public function getProfile()
    {
        $x = self::$oConnect->userProfile->get();
        var_dump($x);
        die();
    }

    public function getConversations()
    {
        $x=self::$oConnect->websiteConversations->getList(self::websiteID);
        var_dump($x);die();
    }
}