<?php

namespace App;

use Symfony\Component\Serializer\Encoder\XmlEncoder;


class ExceptionFileLogger
{
    public function logException(\Exception $e): string
    {
        $exceptionDate = new \DateTime();
        $data = [
            'exception' => [
                'date' => $exceptionDate->format('Y-m-d H:i:s'),
                'type' => get_class($e),
                'code' => ['@severity' => 'DEBUG', '#' => $e->getCode()],
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ],
        ];

        $xmlEncoder = new XmlEncoder(['xml_format_output' => true, 'xml_root_node_name' => 'logs']);

        return $xmlEncoder->encode($data, 'xml');
    }
}