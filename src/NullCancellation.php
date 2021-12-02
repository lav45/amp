<?php

namespace Amp;

/**
 * A NullCancellationToken can be used to avoid conditionals to check whether a token has been provided.
 *
 * Instead of writing
 *
 * ```php
 * if ($token) {
 *     $token->throwIfRequested();
 * }
 * ```
 *
 * potentially multiple times, it allows writing
 *
 * ```php
 * $token = $token ?? new NullCancellationToken;
 *
 * // ...
 *
 * $token->throwIfRequested();
 * ```
 *
 * instead.
 */
final class NullCancellation implements Cancellation
{
    public function subscribe(\Closure $callback): string
    {
        return "null-token";
    }

    /** @inheritdoc */
    public function unsubscribe(string $id): void
    {
        // nothing to do
    }

    /** @inheritdoc */
    public function isRequested(): bool
    {
        return false;
    }

    /** @inheritdoc */
    public function throwIfRequested(): void
    {
        // nothing to do
    }
}