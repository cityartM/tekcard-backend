<?php

namespace Modules\Plan\Support;

use Cache;
use Config;
use Modules\Feature\Models\Feature;

trait PlanTrait
{

    /**
     * Get cached features for this plan.
     * @return mixed
     */
    public function cachedFeatures()
    {
        return Cache::remember($this->getCacheKey(), Config::get('cache.ttl'), function () {
            return $this->features()->get();
        });
    }

    /**
     * Override "save" plan method to clear plan cache.
     * @param array $options
     */
    public function save(array $options = [])
    {
        $this->flushCache();
        parent::save($options);
    }

    /**
     * Override "delete" plan method to clear plan cache.
     * @param array $options
     */
    public function delete(array $options = [])
    {
        $this->flushCache();
        parent::delete($options);
    }

    /**
     * Override "restore" plan method to clear plan cache.
     */
    public function restore()
    {
        $this->flushCache();
        parent::restore();
    }

    /**
     * Many-to-Many relations with the feature model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_plan', 'plan_id');
    }

    /**
     * Checks if the plan has a feature by its name.
     *
     * @param string $name feature name.
     * @return bool
     */
    public function hasFeature($name)
    {
        $perms = $this->cachedFeatures()->pluck('name')->toArray();

        return in_array($name, $perms, true);
    }

    /**
     * Save the inputted features.
     *
     * @param mixed $inputFeatures
     *
     * @return void
     */
    public function saveFeatures($inputFeatures)
    {
        if (! empty($inputFeatures)) {
            $this->features()->sync($inputFeatures);
        } else {
            $this->features()->detach();
        }

        $this->flushCache();
    }

    /**
     * Attach feature to current plan.
     *
     * @param object|array $feature
     *
     * @return void
     */
    public function attachFeature($feature)
    {
        if (is_object($feature)) {
            $feature = $feature->getKey();
        }

        if (is_array($feature)) {
            $feature = $feature['id'];
        }

        $this->features()->attach($feature);

        $this->flushCache();
    }

    /**
     * Detach feature from current plan.
     *
     * @param object|array $feature
     *
     * @return void
     */
    public function detachFeature($feature)
    {
        if (is_object($feature)) {
            $feature = $feature->getKey();
        }

        if (is_array($feature)) {
            $feature = $feature['id'];
        }

        $this->features()->detach($feature);

        $this->flushCache();
    }

    /**
     * Attach multiple features to current plan.
     *
     * @param mixed $features
     *
     * @return void
     */
    public function attachFeatures($features)
    {
        foreach ($features as $feature) {
            $this->attachFeature($feature);
        }
    }

    /**
     * Detach multiple features from current plan
     *
     * @param mixed $features
     *
     * @return void
     */
    public function detachFeatures($features)
    {
        foreach ($features as $feature) {
            $this->detachFeature($features);
        }
    }

    /**
     * Sync plan features.
     * @param $features array feature IDs.
     */
    public function syncFeatures(array $features)
    {
        $this->features()->sync($features);

        $this->flushCache();
    }

    /**
     * Get features cache key.
     * @return string
     */
    private function getCacheKey()
    {
        return 'entrust_features_for_plan_'.$this->{$this->primaryKey};
    }

    /**
     * Flush cached features for this plan.
     */
    private function flushCache()
    {
        Cache::forget($this->getCacheKey());
    }
}
