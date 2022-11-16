<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Config Email')}}</h3>
        <p class="form-group-desc">{{__('Change your config email site')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__('Email Driver')}}</label>
                        <div class="form-controls">
                            <select name="email_driver" class="form-control">
                                @foreach(\Modules\Email\SettingClass::EMAIL_DRIVER as $item=>$value)
                                    <option value="{{$value}}" {{($settings['email_driver'] ?? '') == $value ? 'selected' : ''  }}>{{__(strtoupper($value))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                @else
                    <p>{{__('You can edit on main lang.')}}</p>
                @endif
            </div>
        </div>
    </div>
</div>

@if(is_default_lang())
    <div class="row " data-operator="or" data-condition="email_driver:is(smtp),email_driver:is(sendmail),email_driver:is(mailgun),email_driver:is(postmark),email_driver:is(ses),email_driver:is(sparkpost)">
        <div class="col-12">
            <hr>
        </div>
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Config Email Service')}}</h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div data-operator="or" data-condition="email_driver:is(smtp),email_driver:is(sendmail)">
                        <div class="form-group">
                            <label>{{__('Email Host')}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="email_host" value="{{!empty($settings['email_host'])?$settings['email_host']:"smtp.mailgun.org" }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Email Port')}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="email_port" value="{{!empty($settings['email_port'])?$settings['email_port']:"587" }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Email Encryption')}}</label>
                            <div class="form-controls">
                                <select name="email_encryption" class="form-control">
                                    <option value="tls" {{($settings['email_encryption'] ?? '') == 'tls' ? 'selected' : ''  }}>TLS</option>
                                    <option value="ssl" {{($settings['email_encryption'] ?? '') == 'ssl' ? 'selected' : ''  }}>SSL</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Email Username')}}</label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="email_username" value="{{@$settings['email_username'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Email Password')}}</label>
                            <div class="form-controls">
                                <input type="password" class="form-control" name="email_password" value="{{@$settings['email_password'] }}">
                            </div>
                        </div>
                    </div>
                    <div data-condition="email_driver:is(mailgun)">
                        <div class="form-group">
                            <label class="">{{__("Mailgun Domain")}}</label>
                            <div class="form-controls">
                                <input autocomplete="no" type="text" class="form-control" name="email_mailgun_domain" value="{{@$settings['email_mailgun_domain'] }}">
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="">{{__("Mailgun Secret")}}</label>
                            <div class="form-controls">
                                <input autocomplete="no" type="text" class="form-control" name="email_mailgun_secret" value="{{@$settings['email_mailgun_secret'] }}">
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="">{{__("Mailgun Endpoint")}}</label>
                            <div class="form-controls">
                                <input autocomplete="no" type="text" class="form-control" name="email_mailgun_endpoint" value="{{!empty($settings['email_mailgun_endpoint'])?$settings['email_mailgun_endpoint']:"api.mailgun.net" }}">
                            </div>
                        </div>
                    </div>
                    <div data-condition="email_driver:is(postmark)">
                        <div class="form-group">
                            <label class="">{{__("Postmark Token")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_postmark_token" value="{{@$settings['email_postmark_token'] }}">
                            </div>
                        </div>
                    </div>
                    <div data-condition="email_driver:is(ses)">
                        <div class="form-group">
                            <label class="">{{__("Ses Key")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_key" value="{{@$settings['email_ses_key'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Ses Secret")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_secret" value="{{@$settings['email_ses_secret'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Ses Region")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_region" value="{{!empty($settings['email_ses_region'])?$settings['email_ses_region']:"us-east-1" }}">
                            </div>
                        </div>

                    </div>
                    <div data-condition="email_driver:is(mandrill)">
                        <div class="form-group">
                            <label class="">{{__("Ses Key")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_key" value="{{@$settings['email_ses_key'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Ses Secret")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_secret" value="{{@$settings['email_ses_secret'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Ses Region")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_ses_region" value="{{!empty($settings['email_ses_region'])?$settings['email_ses_region']:"us-east-1" }}">
                            </div>
                        </div>

                    </div>
                    <div data-condition="email_driver:is(sparkpost)">
                        <div class="form-group">
                            <label class="">{{__("Sparkpost Secret")}}</label>
                            <div class="form-controls">
                                <input type="text" autocomplete="no" class="form-control" name="email_sparkpost_secret" value="{{@$settings['email_sparkpost_secret'] }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Email Testing')}}</h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label class="">{{__("Email")}}</label>
                        <input type="email" class="form-control" id="to-email-testing" name="to_email_test"/>
                    </div>
                    <div class="form-controls">
                        <br>
                        <div id="email-testing" style="cursor: pointer;" class="btn btn-primary">{{__('Send Email Test')}}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-controls">
                        <div id="email-testing-alert" class="" role="alert">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(is_default_lang())
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Contact Information')}}</h3>
        <p class="form-group-desc">{{__('How your customer can contact to you')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label>{{__("Admin Email")}}</label>
                    <div class="form-controls">
                        <input type="email" class="form-control" name="admin_email" value="{{$settings['admin_email'] ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Email From Name")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="email_from_name" value="{{$settings['email_from_name'] ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Email From Address")}}</label>
                    <div class="form-controls">
                        <input type="email" class="form-control" name="email_from_address" value="{{$settings['email_from_address'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Email Header & Footer')}}</h3>
        <p class="form-group-desc">{{__('Change booking email header and footer')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label >{{__("Header")}}</label>
                    <div class="form-controls">
                        <textarea name="email_header" class="d-none has-ckeditor" data-fullurl="true" cols="30" rows="10">{{setting_item_with_lang('email_header',request()->query('lang')) }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label >{{__("Footer")}}</label>
                    <div class="form-controls">
                        <textarea name="email_footer" class="d-none has-ckeditor" data-fullurl="true" cols="30" rows="10">{{setting_item_with_lang('email_footer',request()->query('lang')) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Content Email Candidate Apply Job Submit')}}</h3>
        <div class="form-group-desc">
            @foreach(\Modules\Job\Listeners\SendMailApplyJobSubmitListener::CODE as $item=>$value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="content_email_apply_job_submit" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('content_email_apply_job_submit',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Content Email Employer Change Applicants Status')}}</h3>
        <div class="form-group-desc">
            @foreach(\Modules\Job\Listeners\SendMailChangeApplicantsStatusListen::CODE as $item => $value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="content_email_change_applicants_status" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('content_email_change_applicants_status',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">Order Confirmation Email</h3>
        <div class="form-group-desc">
            @foreach(\Modules\Order\Listeners\OrderUpdatedNotification::CODE as $item => $value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="order_confirmation_content" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('order_confirmation_content',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">User Unsubscription Email</h3>
        <div class="form-group-desc">
            @foreach(\Modules\User\Listeners\UserUnsubscribeListeners::CODE as $item => $value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="user_unsubscribe_content" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('user_unsubscribe_content',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">New Job Post Email</h3>
        <div class="form-group-desc">
            @foreach(\Modules\Job\Listeners\SendMailEmployerJobPostListener::CODE as $item => $value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="content_email_job_post" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('content_email_job_post',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">Change Job Status</h3>
        <div class="form-group-desc">
            @foreach(\Modules\Job\Listeners\SendMailChangeJobStatusListener::CODE as $item => $value)
                <div><code>{{$value}}</code></div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group">
                    <label>{{__("Content")}}</label>
                    <div class="form-controls">
                        <textarea name="content_email_change_job_status" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('content_email_change_job_status',request()->query('lang')) ?? '' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@section('script.body')
    <script>
        $(document).ready(function () {
            var cant_test = 1;
            $(document).on('click', '#email-testing', function (e) {
                event.preventDefault();
                var to = $('#to-email-testing').val();
                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if (testEmail.test(to)) {
                    if (cant_test == 1) {
                        cant_test = 0;
                        $.ajax({
                            url: '{{url('admin/module/email/testEmail')}}',
                            type: 'get',
                            data: {to: to},
                            beforeSend: function () {
                                $('#email-testing').append(' <i class="fa  fa-spinner fa-spin"></i>').addClass('disabled');
                            },
                            success: function (res) {
                                if (res.error !== false) {
                                    $('#email-testing-alert').removeClass().addClass('alert alert-warning').html(res.messages);
                                } else {
                                    $('#email-testing-alert').removeClass().addClass('alert alert-success').html('<strong>Email Test Success!</strong>');
                                }
                                cant_test = 1;
                            },
                            complete: function () {
                                $('#email-testing').removeClass('disabled').find('i').remove();
                                cant_test = 1;

                            },
                            error: function (request, status, error) {
                                err = JSON.parse(request.responseText);
                                html = '<p><strong>' + request.statusText + '</strong></p><p>' + err.message + '</p>';
                                $('#email-testing-alert').removeClass().addClass('alert alert-warning').html(html);
                                cant_test = 1;
                            }
                        })
                    }
                } else {
                    $('#email-testing-alert').removeClass().addClass('alert alert-warning').html('Please enter valid email');
                }
                setTimeout(function () {
                    $('#email-testing-alert').html('').removeClass();
                }, 2000)
            })

        })
    </script>
@endsection
