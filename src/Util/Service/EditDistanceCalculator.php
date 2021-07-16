<?php
namespace Engine\Util\Service;
/**
 * Calculates the edit distance between two strings, per the Levenshtein metric, by way of the Wagner-Fischer algorithm.
 * 
 * @TODO Technically only needs four cells of the matrix at a time unless we're doing Damerau-Levenshtein
 *       which changes memory size from n^2 to constant. If this ever becomes a problems (are we gonna be comparing
 *       strings that big?), we can make that happen.
 */
class EditDistanceCalculator
{
	private string $targetString;
	private string $subjectString;
	private bool $caseSensitive = false;
	private float $distance;
	
	use \Engine\Traits\Creatable;

	private function assertValid()
	{
		if(null === $this->targetString)
			throw new \LogicException("No target string given");
		if(null === $this->subjectString)
			throw new \LogicException("No subject string given");
	}
	/**
	 * Calculates the edit distance between two strings, per the Levenshtein metric.
	 * 
	 * If the edit distance of string A and B is larger than that A and C, then A and B are less similar than A and C.
	 */
	public function run() : self
	{
		// Not much per-line docs in this, because it's pretty crunchy. If you want to understand it, look up the WF algorithm.
		// NB: For ease of convention, the iterator for the target string is always i, and the subject string is always j
		$this->assertValid();

		if($this->caseSensitive === false)
		{
			$this->targetString = strtolower($this->targetString);
			$this->subjectString = strtolower($this->subjectString);
		}

		$target_length  = strlen($this->targetString);
		$subject_length = strlen($this->subjectString);
		$matrix         = $this->constructBlankMatrix();

		for($i = 1; $i <= $target_length; $i++)
		{
			for($j = 1; $j <= $subject_length; $j++)
			{
				// Adjust for the blank character offset so we're comparing the right things.
				$target_char = $this->targetString[$i - 1];
				$subject_char = $this->subjectString[$j - 1];
				if($target_char === $subject_char)
					$sub_cost = 0;
				else $sub_cost = 1;
				$matrix[$i][$j] = \min
				(
					$matrix[$i - 1][$j] + 1,             // Deletion
					$matrix[$i][$j - 1] + 1,             // Insertion
					$matrix[$i - 1][$j - 1] + $sub_cost, // Substitution
				);
			}
		}
		$this->distance = $matrix[$target_length][$subject_length];
		return $this;
	}
	/**
	 * Returns a blank matrix with appropriate starting values
	 * Looks a bit weird because PHP doesn't have fixed array lengths
	 * 
	 * [
	 *   [0, 1, 2, 3, 4 ... n]
	 *   [1]
	 *   [2]
	 *   [3]
	 *   [4]
	 *   ...
	 *   [m]
	 * ]
	 */
	private function constructBlankMatrix() : array
	{
		$matrix = [];
		for($i = 0; $i <= strlen($this->targetString); $i++)
		{
			$matrix[] = [$i];
		}
		for($j = 0; $j <= strlen($this->subjectString); $j++)
		{
			$matrix[0][$j] = $j;
		}
		return $matrix;
	}

	public function getDistance() : float
	{
		return $this->distance;
	}

	public function setSubjectString(string $subject_string) : self
	{
		$this->subjectString = $subject_string;
		return $this;
	}

	public function setTargetString(string $target_string) : self
	{
		$this->targetString = $target_string;
		return $this;
	}

	public function setCaseSensitive(bool $case_sensitive = true) : self
	{
		$this->caseSensitive = $case_sensitive;
		return $this;
	}
}