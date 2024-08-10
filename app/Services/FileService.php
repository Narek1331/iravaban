<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Storage;
use Psr\Http\Message\ResponseInterface;

class FileService
{
    /**
     * The HTTP client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new FileService instance.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Upload a file from a given URL to the specified storage path.
     *
     * @param string $url The URL of the file to upload.
     * @param string|null $path Optional path where the file should be stored.
     * @return string|null The path of the stored file, or null on failure.
     */
    public function uploadFileByUrl(string $url, ?string $path = null): ?string
    {
        try {
            $response = $this->fetchFile($url);

            if ($this->isValidResponse($response)) {
                $fileContents = $response->getBody()->getContents();
                $newPath = $this->generateFilePath($url, $path);

                Storage::put('public/' . $newPath, $fileContents);
                return $newPath;
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    /**
     * Fetch the file from the given URL.
     *
     * @param string $url
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function fetchFile(string $url): ResponseInterface
    {
        return $this->client->get($url);
    }

    /**
     * Determine if the response is valid for file download.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return bool
     */
    protected function isValidResponse(ResponseInterface $response): bool
    {
        return $response->getStatusCode() === 200;
    }

    /**
     * Generate a unique file path with the appropriate extension.
     *
     * @param string $url
     * @param string|null $path
     * @return string
     */
    protected function generateFilePath(string $url, ?string $path = null): string
    {
        $extension = pathinfo($url, PATHINFO_EXTENSION) ?: 'jpg';
        $fileName = uniqid() . '.' . $extension;

        return $path ? $path . '/' . $fileName : $fileName;
    }
}
