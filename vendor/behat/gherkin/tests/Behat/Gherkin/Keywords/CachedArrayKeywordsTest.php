<?php

namespace Tests\Behat\Gherkin\Keywords;

use Behat\Gherkin\Keywords\CachedArrayKeywords;
use Behat\Gherkin\Node\StepNode;

require_once 'KeywordsTest.php';

class CachedArrayKeywordsTest extends KeywordsTest
{
    protected function getKeywords()
    {
        return new CachedArrayKeywords(__DIR__ . '/../../../../i18n.php');
    }

    protected function getKeywordsArray()
    {
        return include(__DIR__ . '/../../../../i18n.php');
    }

    protected function getSteps($keywords, $text, &$line)
    {
        $steps = array();
        foreach (explode('|', $keywords) as $keyword) {
            if (false !== mb_strpos($keyword, '<')) {
                $keyword = mb_substr($keyword, 0, -1);
            }

            $steps[] = new StepNode($keyword, $text, array(), $line++);
        }

        return $steps;
    }
}
