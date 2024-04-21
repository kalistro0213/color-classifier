<?php

use Fieg\Bayes\Classifier;
use Fieg\Bayes\Tokenizer\WhitespaceAndPunctuationTokenizer;

class colorClassifier {
    private $tokenizer;
    private $classifier;

    public function __construct() {
        include './vendor/autoload.php';

        $this->tokenizer = new WhitespaceAndPunctuationTokenizer();
        $this->classifier = new Classifier($this->tokenizer);

        // Training data...
        $this->trainData();
    }

    private function trainData() {
        $this->classifier->train('primary color', 'red');
        $this->classifier->train('primary color', 'green');
        $this->classifier->train('primary color', 'blue');
        $this->classifier->train('secondary color', 'cyan');
        $this->classifier->train('secondary color', 'magenta');
        $this->classifier->train('secondary color', 'yellow'); 
        $this->classifier->train('tertiary color', 'orange');
        $this->classifier->train('tertiary color', 'yellow-green');
        $this->classifier->train('tertiary color', 'spring green');
        $this->classifier->train('tertiary color', 'azure');
        $this->classifier->train('tertiary color', 'violet');
        $this->classifier->train('tertiary color', 'rose');
        $this->classifier->train('neutral color', 'black');
        $this->classifier->train('neutral color', 'white');
        $this->classifier->train('neutral color', 'gray');

    }

    public function classifyColor($colorQuery) {
        $result = $this->classifier->classify($colorQuery);

        // Find the category with the highest score
        $highestCategory = '';
        $highestScore = -INF; // Initialize with negative infinity

        foreach ($result as $category => $score) {
            if ($score > $highestScore) {
                $highestScore = $score;
                $highestCategory = $category;
            }
        }

        // Return the highest category with its score
        return [
            'color_query' => $colorQuery,
            'highest_category' => $highestCategory,
            'highest_score' => $highestScore
        ];
    }
}
