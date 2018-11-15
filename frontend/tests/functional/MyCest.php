<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class MyCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    /**
     * @dataProvider pageProvider
     */
    public function staticPages(FunctionalTester $I, \Codeception\Example $example)
    {
        $I->amOnPage($example['url']);
        $I->see($example['h1'], 'h1');
    }

    /**
     * @return array
     */
    protected function pageProvider()
    {
        return [
            ['url'=>"/", 'h1'=>"Congratulations!"],
            ['url'=>"/site/about", 'h1'=>"About"],
            ['url'=>"/site/contact", 'h1'=>"Contact"],
            ['url'=>"/site/signup", 'h1'=>"Signup"],
            ['url'=>"/site/login", 'h1'=>"Login"],
        ];
    }
}
