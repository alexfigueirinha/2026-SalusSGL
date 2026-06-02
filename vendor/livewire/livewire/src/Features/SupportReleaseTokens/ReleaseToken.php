<?php

namespace Livewire\Features\SupportReleaseTokens;

<<<<<<< HEAD
use Livewire\Exceptions\ComponentNotFoundException;
=======
>>>>>>> e18a56413ba2e257a9d1ebb7dce529a2213c5f25
use Livewire\Exceptions\LivewireReleaseTokenMismatchException;
use Livewire\Mechanisms\ComponentRegistry;

class ReleaseToken {
    // This token is stored client-side and sent along with each request to check
    // a users session to see if a new release has invalidated it. If there is
    // a mismatch it will throw an error and prompt for a browser refresh.
    public static $LIVEWIRE_RELEASE_TOKEN = 'a';

    static function verify($snapshot): void
    {
<<<<<<< HEAD
        try {
            $componentClass = app(ComponentRegistry::class)->getClass($snapshot['memo']['name']);
        } catch (ComponentNotFoundException) {
            throw new LivewireReleaseTokenMismatchException;
        }
=======
        $componentClass = app(ComponentRegistry::class)->getClass($snapshot['memo']['name']);
>>>>>>> e18a56413ba2e257a9d1ebb7dce529a2213c5f25

        if (!isset($snapshot['memo']['release']) || $snapshot['memo']['release'] !== static::generate($componentClass)) {
            throw new LivewireReleaseTokenMismatchException;
        }
    }

    static function generate($componentOrComponentClass): string
    {
        $livewireReleaseToken = static::$LIVEWIRE_RELEASE_TOKEN;
        $appReleaseToken = app('config')->get('livewire.release_token', '');
        $componentReleaseToken = method_exists($componentOrComponentClass, 'releaseToken') ? $componentOrComponentClass::releaseToken() : '';

        return $livewireReleaseToken . '-' . $appReleaseToken . '-' . $componentReleaseToken;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> e18a56413ba2e257a9d1ebb7dce529a2213c5f25
