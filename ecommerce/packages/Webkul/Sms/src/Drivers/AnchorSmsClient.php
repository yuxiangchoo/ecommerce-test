<?php

declare(strict_types=1);

namespace Webkul\Sms\Drivers;

use GuzzleHttp\Client;
use Webkul\Sms\Contracts\SmsClient;
use Webkul\Sms\Message;

/**
 * Anchor SMS driver
 *
 * Supports:
 *  - token mode      : get token, then send MT with Bearer token
 *  - no_token mode   : send MT with username/password in payload
 *
 * Constructor is flexible:
 *   - new AnchorSmsClient(['base' => '...', ...])                      // config only
 *   - new AnchorSmsClient(new Client([...]), ['base' => '...', ...])   // client + config
 *   - new AnchorSmsClient(new Client([...]))                           // client only
 */
class AnchorSmsClient implements SmsClient
{
    protected Client $http;

    /** @var array<string,mixed> */
    protected array $config;

    /**
     * Flexible constructor: supports (array $config), (Client $http, array $config), (Client $http)
     *
     * @param mixed $a Either array config or Client|null
     * @param mixed $b Either array config or null
     */
    public function __construct($a = null, $b = null)
    {
        // Normalize inputs
        $http   = null;
        $config = [];

        if ($a instanceof Client) {
            $http = $a;
            if (is_array($b)) {
                $config = $b;
            }
        } elseif (is_array($a)) {
            $config = $a;
            if ($b instanceof Client) {
                $http = $b;
            }
        } elseif ($a === null && $b instanceof Client) {
            $http = $b;
        }

        // Merge provided config with defaults/env
        $this->config = array_replace([
            'base'              => rtrim((string) config('sms.anchor.base', (string) env('ANCHOR_BASE', '')), '/'),
            'mode'              => strtolower((string) config('sms.anchor.mode', (string) env('ANCHOR_MODE', 'no_token'))), // token | no_token
            'user'              => (string) (config('sms.anchor.user', env('ANCHOR_USER')) ?? ''),
            'pass'              => (string) (config('sms.anchor.pass', env('ANCHOR_PASS')) ?? ''),
            'username'          => (string) (config('sms.anchor.username', env('ANCHOR_USERNAME')) ?? ''),
            'password'          => (string) (config('sms.anchor.password', env('ANCHOR_PASSWORD')) ?? ''),
            'token_path'        => (string) (config('sms.anchor.token_path', env('ANCHOR_TOKEN_PATH', '/auth/getToken')) ?? '/auth/getToken'),
            'mt_path'           => (string) (config('sms.anchor.mt_path', env('ANCHOR_MT_PATH', '/mt/sendMtSms')) ?? '/mt/sendMtSms'),
            'mt_no_token_path'  => (string) (config('sms.anchor.mt_no_token_path', env('ANCHOR_MT_NO_TOKEN_PATH', '/mt/sendMtSmsNoToken')) ?? '/mt/sendMtSmsNoToken'),
            'from'              => (string) (config('sms.from', env('SMS_FROM', '')) ?? ''),
            'timeout'           => (float)  (config('sms.timeout', 10)),
            'verify'            => (bool)   (config('sms.verify_ssl', true)),
        ], is_array($config) ? $config : []);

        if (empty($this->config['base'])) {
            throw new \RuntimeException('AnchorSmsClient: base URL is not configured (sms.anchor.base / ANCHOR_BASE).');
        }

        $this->http = $http ?: new Client([
            'base_uri' => $this->config['base'],
            'timeout'  => $this->config['timeout'],
            'verify'   => $this->config['verify'],
        ]);
    }

    /**
     * Match interface EXACTLY: accept Message|string.
     */
    public function send(string $to, Message|string $message, array $options = []): array
    {
        $text = $this->toText($message);
        $to   = $this->normalizeNumber($to);
        $from = $options['from'] ?? $this->config['from'] ?: null;

        $mode = $this->config['mode'] ?: 'no_token';

        if ($mode === 'no_token') {
            return $this->sendNoToken($to, $text, $from, $options);
        }

        // default: token mode
        $token = $this->getToken();
        return $this->sendWithToken($to, $text, $from, $token, $options);
    }

    /* ---------------------------- helpers ---------------------------- */

    protected function toText(Message|string $message): string
    {
        if ($message instanceof Message) {
            if (method_exists($message, 'getText')) {
                return (string) $message->getText();
            }
            return (string) $message; // if Message implements __toString()
        }
        return (string) $message;
    }

    protected function normalizeNumber(string $to): string
    {
        $digits = preg_replace('/\D+/', '', $to);
        if ($digits === '') {
            throw new \InvalidArgumentException('AnchorSmsClient: invalid destination number.');
        }
        // Keep leading + if present; otherwise add +
        return $digits;
    }

    protected function getToken(): string
    {
        $username = $this->config['username'] ?: $this->config['user'];
        $password = $this->config['password'] ?: $this->config['pass'];

        if (!$username || !$password) {
            throw new \RuntimeException('AnchorSmsClient: username/password not configured for token mode.');
        }

        try {
            $resp = $this->http->post($this->config['token_path'], [
                'headers' => [
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'username' => $username,
                    'password' => $password,
                ],
            ]);
        } catch (\Throwable $e) {
            throw new \RuntimeException('AnchorSmsClient: token request failed: ' . $e->getMessage(), 0, $e);
        }

        $code = $resp->getStatusCode();
        $body = (string) $resp->getBody();
        $data = json_decode($body, true);

        if ($code >= 400 || !is_array($data)) {
            throw new \RuntimeException("AnchorSmsClient: token HTTP $code body: $body");
        }

        $token = $data['accessToken'] ?? $data['data']['accessToken'] ?? null;
        if (!$token) {
            throw new \RuntimeException('AnchorSmsClient: accessToken not present in response.');
        }

        return (string) $token;
    }

    protected function sendWithToken(string $to, string $text, ?string $from, string $token, array $options): array
    {
        
        $username = $this->config['username'] ?: $this->config['user'];
        $password = $this->config['password'] ?: $this->config['pass'];

        $payload = [
            'ClientMsgId' => 'MT001',
            'MsgEncoded'=> $text,
            'SenderId' => '66886',
            'DestAddr' => $to,
            'username' => $username,
            'password' => $password,
            'DataCoding' => '0'
        ];



       /* if ($from) {
            $payload['from'] = $from;
        }*/

        try {
            $resp = $this->http->post($this->config['mt_path'], [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
                'json' => $payload,
            ]);
        } catch (\Throwable $e) {
            throw new \RuntimeException('AnchorSmsClient: send (token) failed: ' . $e->getMessage(), 0, $e);
        }

        $code = $resp->getStatusCode();
        $body = (string) $resp->getBody();
        $data = json_decode($body, true) ?: [];

        if ($code >= 400) {
            throw new \RuntimeException("AnchorSmsClient: send (token) HTTP $code body: $body");
        }

        return [
            'ok'     => true,
            'status' => $code,
            'mode'   => 'token',
            'id'     => $data['messageId'] ?? $data['id'] ?? null,
            'to'     => $to,
            'from'   => $from,
            'text'   => $text,
            'raw'    => $data ?: $body,
        ];
    }

    protected function sendNoToken(string $to, string $text, ?string $from, array $options): array
    {
        // Common payload (ClientMsgId, MsgEncoded, SenderId, DestAddr, DataCoding)
        $payload = $this->buildAnchorPayload($to, $text, $from, $options);

        $user = $this->config['user'] ?? $this->config['username'] ?? null;
        $pass = $this->config['pass'] ?? $this->config['password'] ?? null;

        if (!$user || !$pass) {
            throw new \RuntimeException('AnchorSmsClient: user/pass not configured for no_token mode.');
        }

        // Anchor no-token usually expects Username/Password in the same request
        $query = $payload + [
            'user' => (string) $user,
            'pass' => (string) $pass,
        ];
        $url = $this->makeUrl((string) ($this->config['mt_no_token_path'] ?? '/mt/sendMtSmsNoToken'));

        try {
            $resp = $this->http->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => $query,
            ]);
        } catch (\Throwable $e) {
            throw new \RuntimeException('AnchorSmsClient: send (no_token GET) failed: ' . $e->getMessage(), 0, $e);
        }

        $code = $resp->getStatusCode();
        $body = (string) $resp->getBody();

        // Many no-token endpoints return 200 instead of 201 — parser below accepts both.
        return $this->parseAnchorResponse($code, $body);
    }

    protected function parseAnchorResponse(int $httpStatus, string $body): array
    {
        $data = json_decode($body, true);

        // Normalize keys
        $status     = $data['Status'] ?? $data['status'] ?? null;
        $node       = $data['Data']   ?? $data['data']   ?? [];
        $statusCode = $node['StatusCode']        ?? $node['statusCode']        ?? null;
        $statusDesc = $node['StatusDescription'] ?? $node['statusDescription'] ?? null;
        $msgId      = $node['MessageId']         ?? $node['messageId']         ?? null;

        // Accept 200 (no_token) and 201 (token) as HTTP success.
        $statusInt  = is_numeric($status) ? (int) $status : $httpStatus;
        $httpOk     = in_array($httpStatus, [200, 201], true);
        $statusOk   = in_array($statusInt,  [200, 201], true);

        if (! $httpOk && ! $statusOk) {
            throw new \RuntimeException("Anchor send failed: HTTP {$httpStatus}; status={$status}; body={$body}");
        }

        return [
            'ok'       => true,
            'http'     => $httpStatus,
            'id'       => $msgId,
            'provider' => [
                'Status'      => $status,
                'StatusCode'  => $statusCode,
                'Description' => $statusDesc,
            ],
            'raw'      => is_array($data) ? $data : $body,
        ];
    }

    protected function decideDataCoding(string $text, array $options): string
    {
        // If the caller explicitly says Chinese culture, force unicode
        $culture = strtolower((string) ($options['culture'] ?? ''));
        if (in_array($culture, ['zh', 'zh_cn', 'zh-cn', 'zh-hans'], true)) {
            return '8';
        }

        // If text contains any non-ASCII character, use unicode
        if (preg_match('/[^\x00-\x7F]/', $text)) {
            return '8';
        }

        return '0';
    }

    /**
     * Build the Anchor request payload.
     * Matches your C# client:
     * - ClientMsgId, MsgEncoded (Base64 UTF-8), SenderId, DestAddr, DataCoding
     *
     * @param array<string,mixed> $options
     * @return array<string,mixed>
     */
    protected function buildAnchorPayload(string $to, string $text, ?string $from, array $options): array
    {
        // Prefer caller-provided values, then config fallback
        $senderId    = (string) ($options['sender_id'] ?? $from ?? (config('sms.from') ?? ''));

        return [
            'text'  => $text,  
            'from'    => $senderId,
            'to'    => $to, 
        ];
    }

    protected function makeUrl(string $path): string
    {
        // If already absolute, just return it.
        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        // Otherwise join with configured base.
        $base = rtrim((string) ($this->config['base'] ?? ''), '/');

        if ($base === '') {
            // No base configured, return the path as-is (Guzzle may use base_uri).
            return $path;
        }

        return $base . '/' . ltrim($path, '/');
    }
}
