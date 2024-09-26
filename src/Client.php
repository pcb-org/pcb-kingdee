<?php

namespace PcbKingdee;

use PcbKernel\Support\Arr;
use PcbKernel\Support\Str;
use PcbKingdee\Concerns\InteractsWithCache;
use PcbKingdee\Concerns\InteractsWithHttp;
use PcbKingdee\Exceptions\InvalidArgumentException;
use PcbKingdee\Exceptions\RuntimeException;
use PcbKingdee\Exceptions\AuthenticationException;

class Client
{
    use InteractsWithCache, InteractsWithHttp;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $appId;

    /**
     * @var string
     */
    protected $appSecret;

    /**
     * @var string
     */
    protected $dbId;

    /**
     * @var int
     */
    protected $localeId;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var int
     */
    protected $sessionTTL;

    /**
     * @var string
     */
    protected $cookie;

    /**
     * @var \Psr\SimpleCache\CacheInterface
     */
    protected $cache;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $http;

    /**
     * @var string
     */
    protected $loginUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.AuthService.LoginByAppSecret.common.kdsvc';

    protected $queryUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.ExecuteBillQuery.common.kdsvc';

    protected $viewUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.View.common.kdsvc';

    protected $draftUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.Draft.common.kdsvc';

    protected $saveUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.Save.common.kdsvc';

    protected $submitUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.Submit.common.kdsvc';

    protected $auditUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.Audit.common.kdsvc';

    protected $unauditUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.UnAudit.common.kdsvc';

    protected $pushUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.Push.common.kdsvc';

    protected $deleteUrl = '/K3Cloud/Kingdee.BOS.WebApi.ServicesStub.DynamicFormService.Delete.common.kdsvc';

    /**
     * @param array $config
     * @param \Psr\SimpleCache\CacheInterface $cache
     * @param \GuzzleHttp\ClientInterface $http
     */
    public function __construct($config, $cache, $http)
    {
        $this->baseUri = $config['base_uri'];

        $this->appId = $config['app_id'];

        $this->appSecret = $config['app_secret'];

        $this->dbId = $config['db_id'];

        $this->localeId = $config['locale_id'] ?? 2052;

        $this->version = $config['version'] ?? '1.0';

        $this->sessionTTL = ($config['session_ttl'] ?? 3600) - 100;

        $this->cache = $cache;

        $this->http = $http;
    }

    /**
     * @param string $username
     * @return bool
     * @throws \PcbKingdee\Exceptions\InvalidArgumentException
     * @throws \PcbKingdee\Exceptions\RuntimeException
     */
    public function startSession($username)
    {
        if (!is_string($username) || !$username) {
            throw new InvalidArgumentException('金蝶开启会话使用了无效的用户名');
        }

        $cacheKey = $this->buildCacheKey([
            'app_id' => $this->appId,
            'username' => $username,
        ], 'kingdee.sessionid.');

        $sessionId = $this->cache->get($cacheKey);

        if (!$sessionId) {
            $body = $this->httpPost($this->loginUrl, [
                'base_uri' => $this->baseUri,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'format' => 1,
                    'useragent' => 'ApiClient',
                    'rid' => Str::random(),
                    'parameters' => [
                        $this->dbId,
                        $username,
                        $this->appId,
                        $this->appSecret,
                        $this->localeId,
                    ],
                    'timestamp' => date('Y-m-d H:i:s'),
                    'v' => $this->version,
                ],
            ]);

            if (Arr::get($body, 'LoginResultType') !== 1) {
                throw new RuntimeException(Arr::get($body, 'Message', '金蝶认证失败'));
            }

            $sessionId = Arr::get($body, 'KDSVCSessionId');

            $this->cache->set($cacheKey, $sessionId, $this->sessionTTL);
        }

        $this->cookie = "kdservice-sessionid={$sessionId}";

        return true;
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     form_id: string,
     *     field_keys: array,
     *     filter_string: array,
     *     order_string: string,
     *     top_row_count: int,
     *     start_row: int,
     *     limit: int,
     *     sub_system_id: string,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function query($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->queryUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'FormId' => Arr::get($data, 'form_id'),
                    'FieldKeys' => implode(',', Arr::get($data, 'field_keys', [])),
                    'FilterString' => Arr::get($data, 'filter_string', []),
                    'OrderString' => Arr::get($data, 'order_string', ''),
                    'TopRowCount' => Arr::get($data, 'top_row_count', 0),
                    'StartRow' => Arr::get($data, 'start_row', 0),
                    'Limit' => Arr::get($data, 'limit', 0),
                    'SubSystemId' => Arr::get($data, 'sub_system_id', ''),
                ]
            ],
        ]);

        if (Arr::get($body, '0.0.Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, '0.0.Result.ResponseStatus.Errors.0.Message', '查询错误'));
        }

        return $body;
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     form_id: string,
     *     field_keys: array,
     *     filter_string: array,
     *     order_string: string,
     *     top_row_count: int,
     *     start_row: int,
     *     limit: int,
     *     sub_system_id: string,
     * }
     * @return int
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function count($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->queryUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'FormId' => Arr::get($data, 'form_id'),
                    'FieldKeys' => 'COUNT(1)',
                    'FilterString' => Arr::get($data, 'filter_string', []),
                    'OrderString' => '',
                    'TopRowCount' => 0,
                    'StartRow' => 0,
                    'Limit' => 0,
                    'SubSystemId' => Arr::get($data, 'sub_system_id', ''),
                ]
            ],
        ]);

        if (Arr::get($body, '0.0.Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, '0.0.Result.ResponseStatus.Errors.0.Message', '共计查询错误'));
        }

        return (int) Arr::get($body, '0.0');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     create_org_id: int,
     *     id: int,
     *     number: string,
     *     is_sort_by_seq: bool,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function view($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->viewUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'CreateOrgId' => Arr::get($data, 'create_org_id', 0),
                    'Id' => Arr::get($data, 'id', 0),
                    'Number' => Arr::get($data, 'number', ''),
                    'IsSortBySeq' => Arr::get($data, 'is_sort_by_seq', false),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, '0.0.Result.ResponseStatus.Errors.0.Message', '查看错误'));
        }

        return Arr::get($body, 'Result.Result');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     need_update_fields: array,
     *     need_return_fields: array,
     *     is_delete_entry: bool,
     *     sub_system_id: string,
     *     is_verify_base_data_field: bool,
     *     is_entry_batch_fill: bool,
     *     validate_flag: bool,
     *     number_search: bool,
     *     is_auto_adjust_field: bool,
     *     interation_flags: array,
     *     ignore_interation_flag: bool,
     *     is_control_precision: bool,
     *     validate_repeat_json: bool,
     *     model: array,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function draft($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->draftUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'NeedUpDateFields' => Arr::get($data, 'need_update_fields', []),
                    'NeedReturnFields' => Arr::get($data, 'need_return_fields', []),
                    'IsDeleteEntry' => Arr::get($data, 'is_delete_entry', true),
                    'SubSystemId' => Arr::get($data, 'sub_system_id', ''),
                    'IsVerifyBaseDataField' => Arr::get($data, 'is_verify_base_data_field', false),
                    'IsEntryBatchFill' => Arr::get($data, 'is_entry_batch_fill', true),
                    'ValidateFlag' => Arr::get($data, 'validate_flag', true),
                    'NumberSearch' => Arr::get($data, 'number_search', true),
                    'IsAutoAdjustField' => Arr::get($data, 'is_auto_adjust_field', false),
                    'InterationFlags' => implode(',', Arr::get($data, 'interation_flags', [])),
                    'IgnoreInterationFlag' => Arr::get($data, 'ignore_interation_flag', true),
                    'IsControlPrecision' => Arr::get($data, 'is_control_precision', false),
                    'ValidateRepeatJson' => Arr::get($data, 'validate_repeat_json', false),
                    'Model' => Arr::get($data, 'model', []),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '暂存错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     need_update_fields: array,
     *     need_return_fields: array,
     *     is_delete_entry: bool,
     *     sub_system_id: string,
     *     is_verify_base_data_field: bool,
     *     is_entry_batch_fill: bool,
     *     validate_flag: bool,
     *     number_search: bool,
     *     is_auto_adjust_field: bool,
     *     interation_flags: array,
     *     ignore_interation_flag: bool,
     *     is_control_precision: bool,
     *     validate_repeat_json: bool,
     *     model: array,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function save($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->saveUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'NeedUpDateFields' => Arr::get($data, 'need_update_fields', []),
                    'NeedReturnFields' => Arr::get($data, 'need_return_fields', []),
                    'IsDeleteEntry' => Arr::get($data, 'is_delete_entry', true),
                    'SubSystemId' => Arr::get($data, 'sub_system_id', ''),
                    'IsVerifyBaseDataField' => Arr::get($data, 'is_verify_base_data_field', false),
                    'IsEntryBatchFill' => Arr::get($data, 'is_entry_batch_fill', true),
                    'ValidateFlag' => Arr::get($data, 'validate_flag', true),
                    'NumberSearch' => Arr::get($data, 'number_search', true),
                    'IsAutoAdjustField' => Arr::get($data, 'is_auto_adjust_field', false),
                    'InterationFlags' => implode(',', Arr::get($data, 'interation_flags', [])),
                    'IgnoreInterationFlag' => Arr::get($data, 'ignore_interation_flag', true),
                    'IsControlPrecision' => Arr::get($data, 'is_control_precision', false),
                    'ValidateRepeatJson' => Arr::get($data, 'validate_repeat_json', false),
                    'Model' => Arr::get($data, 'model', []),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '保存错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     create_org_id: int,
     *     numbers: array,
     *     ids: array,
     *     selected_post_id: int,
     *     use_org_id: int,
     *     network_ctrl: bool,
     *     ignore_interation_flag: bool,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function submit($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->submitUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'CreateOrgId' => Arr::get($data, 'create_org_id', 0),
                    'Numbers' => Arr::get($data, 'numbers', []),
                    'Ids' => implode(',', Arr::get($data, 'ids', [])),
                    'SelectedPostId' => Arr::get($data, 'selected_post_id', 0),
                    'UseOrgId' => Arr::get($data, 'use_org_id', 0),
                    'NetworkCtrl' => Arr::get($data, 'network_ctrl', false),
                    'IgnoreInterationFlag' => Arr::get($data, 'ignore_interation_flag', true),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '提交错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     create_org_id: int,
     *     numbers: array,
     *     ids: array,
     *     interation_flags: array,
     *     use_org_id: int,
     *     network_ctrl: bool,
     *     is_verify_proc_inst: bool,
     *     ignore_interation_flag: bool,
     *     use_bat_control_times: bool,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function audit($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->auditUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'CreateOrgId' => Arr::get($data, 'create_org_id', 0),
                    'Numbers' => Arr::get($data, 'numbers', []),
                    'Ids' => implode(',', Arr::get($data, 'ids', [])),
                    'InterationFlags' => implode(',', Arr::get($data, 'interation_flags', [])),
                    'UseOrgId' => Arr::get($data, 'use_org_id', 0),
                    'NetworkCtrl' => Arr::get($data, 'network_ctrl', false),
                    'IsVerifyProcInst' => Arr::get($data, 'is_verify_proc_inst', true),
                    'IgnoreInterationFlag' => Arr::get($data, 'ignore_interation_flag', true),
                    'UseBatControlTimes' => Arr::get($data, 'use_bat_control_times', false),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '审核错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     create_org_id: int,
     *     numbers: array,
     *     ids: array,
     *     interation_flags: array,
     *     ignore_interation_flag: bool,
     *     use_org_id: int,
     *     network_ctrl: bool,
     *     is_verify_proc_inst: bool,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function unaudit($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->unauditUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'CreateOrgId' => Arr::get($data, 'create_org_id', 0),
                    'Numbers' => Arr::get($data, 'numbers', []),
                    'Ids' => implode(',', Arr::get($data, 'ids', [])),
                    'InterationFlags' => implode(',', Arr::get($data, 'interation_flags', [])),
                    'IgnoreInterationFlag' => Arr::get($data, 'ignore_interation_flag', true),
                    'UseOrgId' => Arr::get($data, 'use_org_id', 0),
                    'NetworkCtrl' => Arr::get($data, 'network_ctrl', false),
                    'IsVerifyProcInst' => Arr::get($data, 'is_verify_proc_inst', true),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '反审核错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     create_org_id: int,
     *     numbers: array,
     *     ids: array,
     *     network_ctrl: bool,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function delete($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->deleteUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'CreateOrgId' => Arr::get($data, 'create_org_id', 0),
                    'Ids' => implode(',', Arr::get($data, 'ids', [])),
                    'Numbers' => Arr::get($data, 'numbers', []),
                    'NetworkCtrl' => Arr::get($data, 'network_ctrl', false),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '删除错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }

    /**
     * @param string $formId
     * @param array  $data {
     *     ids: array,
     *     numbers: array,
     *     entry_ids: array,
     *     rule_id: string,
     *     target_bill_type_id: string,
     *     target_org_id: int,
     *     target_form_id: string,
     *     is_enable_default_rule: bool,
     *     is_draft_when_save_fail: bool,
     *     custom_params: array,
     * }
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     * @throws \PcbKingdee\Exceptions\AuthenticationException
     */
    public function push($formId, $data)
    {
        if (!$this->cookie) {
            throw new AuthenticationException('金蝶会话未开启');
        }

        $body = $this->httpPost($this->pushUrl, [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Cookie' => $this->cookie,
            ],
            'json' => [
                'formid' => $formId,
                'data' => [
                    'Ids' => implode(',', Arr::get($data, 'ids', [])),
                    'Numbers' => Arr::get($data, 'numbers', []),
                    'EntryIds' => implode(',', Arr::get($data, 'entry_ids', [])),
                    'RuleId' => Arr::get($data, 'rule_id', ''),
                    'TargetBillTypeId' => Arr::get($data, 'target_bill_type_id', ''),
                    'TargetOrgId' => Arr::get($data, 'target_org_id', 0),
                    'TargetFormId' => Arr::get($data, 'target_form_id', ''),
                    'IsEnableDefaultRule' => Arr::get($data, 'is_enable_default_rule', false),
                    'IsDraftWhenSaveFail' => Arr::get($data, 'is_draft_when_save_fail', true),
                    'CustomParams' => Arr::get($data, 'custom_params', []),
                ]
            ],
        ]);

        if (Arr::get($body, 'Result.ResponseStatus.IsSuccess') === false) {
            throw new RuntimeException(Arr::get($body, 'Result.ResponseStatus.Errors.0.Message', '下推错误'));
        }

        return Arr::get($body, 'Result.ResponseStatus.SuccessEntitys');
    }
}
