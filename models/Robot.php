<?php namespace Mohsin\Txt\Models;

use Model;
use Event;
use Mohsin\Txt\Models\Agent;

/**
 * Robot Model
 */
class Robot extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'mohsin_txt_robots';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'agent' => 'required'
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'directives' => [
            \Mohsin\Txt\Models\Directive::class,
            'order' => 'position asc'
        ],
        'directives_count' => [
            \Mohsin\Txt\Models\Directive::class,
            'count' => true
        ]
    ];

    /**
     * Returns associative array of available agents.
     *
     * @return array
     */
    public function getAgentOptions($fieldName = null, $keyValue = null)
    {
        $isUpdateContext = Event::fire('robot.agent.getContext');
        $removedValues   = array_values($this->lists('agent', 'id'));
        if ($isUpdateContext) { // Let the agent key of the update context exist.
            $keyToExclude  = current($isUpdateContext)->agent;
            $removedValues = array_filter($removedValues, function ($value) use ($keyToExclude) {
                return $keyToExclude !== $value;
            });
        }
        return Agent::whereNotIn('name', $removedValues)->lists('comment', 'name');
    }

    /**
     * Returns generated text from the Robot model.
     *
     * @return string
     */
    public function generateTxt()
    {
        $robots = "";
        foreach (Robot::all() as $robot) {
            $robots .= 'User-agent: ' . $robot->agent . PHP_EOL;
            foreach ($robot->directives as $directive) {
                $robots .= $directive->type . ': ' .$directive->data . PHP_EOL;
                $robots .= $directive->new_line ? PHP_EOL : '';
            }
            $robots .= PHP_EOL;
        }

        /*
         * Compatability with RainLab.Sitemap
         */
        if (class_exists('\RainLab\Sitemap\Classes\DefinitionItem')) {
            $url = URL::to('/sitemap.xml');
            $robots .= 'Sitemap: ' . $url;
        }

        return $robots;
    }
}
