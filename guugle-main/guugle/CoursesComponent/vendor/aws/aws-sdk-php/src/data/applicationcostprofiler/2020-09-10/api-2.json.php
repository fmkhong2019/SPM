<?php
// This file was auto-generated from sdk-root/src/data/applicationcostprofiler/2020-09-10/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2020-09-10', 'endpointPrefix' => 'application-cost-profiler', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS Application Cost Profiler', 'serviceId' => 'ApplicationCostProfiler', 'signatureVersion' => 'v4', 'signingName' => 'application-cost-profiler', 'uid' => 'AWSApplicationCostProfiler-2020-09-10', ], 'operations' => [ 'DeleteReportDefinition' => [ 'name' => 'DeleteReportDefinition', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/reportDefinition/{reportId}', ], 'input' => [ 'shape' => 'DeleteReportDefinitionRequest', ], 'output' => [ 'shape' => 'DeleteReportDefinitionResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'GetReportDefinition' => [ 'name' => 'GetReportDefinition', 'http' => [ 'method' => 'GET', 'requestUri' => '/reportDefinition/{reportId}', ], 'input' => [ 'shape' => 'GetReportDefinitionRequest', ], 'output' => [ 'shape' => 'GetReportDefinitionResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'ImportApplicationUsage' => [ 'name' => 'ImportApplicationUsage', 'http' => [ 'method' => 'POST', 'requestUri' => '/importApplicationUsage', ], 'input' => [ 'shape' => 'ImportApplicationUsageRequest', ], 'output' => [ 'shape' => 'ImportApplicationUsageResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'ListReportDefinitions' => [ 'name' => 'ListReportDefinitions', 'http' => [ 'method' => 'GET', 'requestUri' => '/reportDefinition', ], 'input' => [ 'shape' => 'ListReportDefinitionsRequest', ], 'output' => [ 'shape' => 'ListReportDefinitionsResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'PutReportDefinition' => [ 'name' => 'PutReportDefinition', 'http' => [ 'method' => 'POST', 'requestUri' => '/reportDefinition', ], 'input' => [ 'shape' => 'PutReportDefinitionRequest', ], 'output' => [ 'shape' => 'PutReportDefinitionResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'UpdateReportDefinition' => [ 'name' => 'UpdateReportDefinition', 'http' => [ 'method' => 'PUT', 'requestUri' => '/reportDefinition/{reportId}', ], 'input' => [ 'shape' => 'UpdateReportDefinitionRequest', ], 'output' => [ 'shape' => 'UpdateReportDefinitionResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, ], 'DeleteReportDefinitionRequest' => [ 'type' => 'structure', 'required' => [ 'reportId', ], 'members' => [ 'reportId' => [ 'shape' => 'ReportId', 'location' => 'uri', 'locationName' => 'reportId', ], ], ], 'DeleteReportDefinitionResult' => [ 'type' => 'structure', 'members' => [ 'reportId' => [ 'shape' => 'ReportId', ], ], ], 'ErrorMessage' => [ 'type' => 'string', ], 'Format' => [ 'type' => 'string', 'enum' => [ 'CSV', 'PARQUET', ], ], 'GetReportDefinitionRequest' => [ 'type' => 'structure', 'required' => [ 'reportId', ], 'members' => [ 'reportId' => [ 'shape' => 'ReportId', 'location' => 'uri', 'locationName' => 'reportId', ], ], ], 'GetReportDefinitionResult' => [ 'type' => 'structure', 'required' => [ 'reportId', 'reportDescription', 'reportFrequency', 'format', 'destinationS3Location', 'createdAt', 'lastUpdated', ], 'members' => [ 'reportId' => [ 'shape' => 'ReportId', ], 'reportDescription' => [ 'shape' => 'ReportDescription', ], 'reportFrequency' => [ 'shape' => 'ReportFrequency', ], 'format' => [ 'shape' => 'Format', ], 'destinationS3Location' => [ 'shape' => 'S3Location', ], 'createdAt' => [ 'shape' => 'Timestamp', ], 'lastUpdated' => [ 'shape' => 'Timestamp', ], ], ], 'ImportApplicationUsageRequest' => [ 'type' => 'structure', 'required' => [ 'sourceS3Location', ], 'members' => [ 'sourceS3Location' => [ 'shape' => 'SourceS3Location', ], ], ], 'ImportApplicationUsageResult' => [ 'type' => 'structure', 'required' => [ 'importId', ], 'members' => [ 'importId' => [ 'shape' => 'ImportId', ], ], ], 'ImportId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '[0-9A-Za-z\\.\\-_]*', ], 'Integer' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'ListReportDefinitionsRequest' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'Token', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'Integer', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListReportDefinitionsResult' => [ 'type' => 'structure', 'members' => [ 'reportDefinitions' => [ 'shape' => 'ReportDefinitionList', ], 'nextToken' => [ 'shape' => 'Token', ], ], ], 'PutReportDefinitionRequest' => [ 'type' => 'structure', 'required' => [ 'reportId', 'reportDescription', 'reportFrequency', 'format', 'destinationS3Location', ], 'members' => [ 'reportId' => [ 'shape' => 'ReportId', ], 'reportDescription' => [ 'shape' => 'ReportDescription', ], 'reportFrequency' => [ 'shape' => 'ReportFrequency', ], 'format' => [ 'shape' => 'Format', ], 'destinationS3Location' => [ 'shape' => 'S3Location', ], ], ], 'PutReportDefinitionResult' => [ 'type' => 'structure', 'members' => [ 'reportId' => [ 'shape' => 'ReportId', ], ], ], 'ReportDefinition' => [ 'type' => 'structure', 'members' => [ 'reportId' => [ 'shape' => 'ReportId', ], 'reportDescription' => [ 'shape' => 'ReportDescription', ], 'reportFrequency' => [ 'shape' => 'ReportFrequency', ], 'format' => [ 'shape' => 'Format', ], 'destinationS3Location' => [ 'shape' => 'S3Location', ], 'createdAt' => [ 'shape' => 'Timestamp', ], 'lastUpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'ReportDefinitionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ReportDefinition', ], ], 'ReportDescription' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '.*\\S.*', ], 'ReportFrequency' => [ 'type' => 'string', 'enum' => [ 'MONTHLY', 'DAILY', 'ALL', ], ], 'ReportId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[0-9A-Za-z\\.\\-_]+$', ], 'S3Bucket' => [ 'type' => 'string', 'max' => 63, 'min' => 3, 'pattern' => '(?=^.{3,63}$)(?!^(\\d+\\.)+\\d+$)(^(([a-z0-9]|[a-z0-9][a-z0-9\\-]*[a-z0-9])\\.)*([a-z0-9]|[a-z0-9][a-z0-9\\-]*[a-z0-9])$)', ], 'S3BucketRegion' => [ 'type' => 'string', 'enum' => [ 'ap-east-1', 'me-south-1', 'eu-south-1', 'af-south-1', ], ], 'S3Key' => [ 'type' => 'string', 'max' => 512, 'min' => 1, 'pattern' => '.*\\S.*', ], 'S3Location' => [ 'type' => 'structure', 'required' => [ 'bucket', 'prefix', ], 'members' => [ 'bucket' => [ 'shape' => 'S3Bucket', ], 'prefix' => [ 'shape' => 'S3Prefix', ], ], ], 'S3Prefix' => [ 'type' => 'string', 'max' => 512, 'min' => 1, 'pattern' => '.*\\S.*', ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 402, ], 'exception' => true, ], 'SourceS3Location' => [ 'type' => 'structure', 'required' => [ 'bucket', 'key', ], 'members' => [ 'bucket' => [ 'shape' => 'S3Bucket', ], 'key' => [ 'shape' => 'S3Key', ], 'region' => [ 'shape' => 'S3BucketRegion', ], ], ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'Token' => [ 'type' => 'string', 'max' => 102400, 'min' => 1, 'pattern' => '^(?:[A-Za-z0-9+/]{4})*(?:[A-Za-z0-9+/]{2}==|[A-Za-z0-9+/]{3}=)?$', ], 'UpdateReportDefinitionRequest' => [ 'type' => 'structure', 'required' => [ 'reportId', 'reportDescription', 'reportFrequency', 'format', 'destinationS3Location', ], 'members' => [ 'reportId' => [ 'shape' => 'ReportId', 'location' => 'uri', 'locationName' => 'reportId', ], 'reportDescription' => [ 'shape' => 'ReportDescription', ], 'reportFrequency' => [ 'shape' => 'ReportFrequency', ], 'format' => [ 'shape' => 'Format', ], 'destinationS3Location' => [ 'shape' => 'S3Location', ], ], ], 'UpdateReportDefinitionResult' => [ 'type' => 'structure', 'members' => [ 'reportId' => [ 'shape' => 'ReportId', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], ],];
