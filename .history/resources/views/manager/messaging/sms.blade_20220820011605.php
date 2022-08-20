<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Messaging</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">SMS Messaging</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(!$smsapi)
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="background-color: rgb(255, 0, 0); padding: 15px; border-radius: 20px">
                                    <div>
                                        <h4 class="card-title text-white">Ooops! SMS API Not Set.</h4>
                                        <p class="card-title-desc text-white">Please <button type="button"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                                                aria-controls="offcanvasWithBothOptions" class="btn btn-primary">
                                                Set
                                                The SMS API </button> to be able to send
                                            sms.</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <form id="send-sms-form" method="POST" action="{{route('messaging.sendSMS')}}">
                                @csrf
                                <input name="author_id" value="3" type="text" hidden="hidden" />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <?php if(isset($_GET['mail'])) { ?>
                                            <x-form.input type="email" id="num-selector" name="to[]"
                                                class="block w-full mt-1" value="<?php echo $_GET['mail']; ?> " />
                                            <?php echo '</div>'; }else{ ?>
                                            <select class="form-control block w-full mt-1 select2-multiple" name="to[]"
                                                multiple="multiple" data-placeholder="Choose Receipient..."
                                                id="num-selector" name="to[]">
                                                <optgroup label="Select Receipient">
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->phone }}">{{ $user->name() }}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Select Supplier">
                                                    <option value="AL">Alabama</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <x-form.input id="emails" type="text"
                                                    placeholder="Type in comma seperated Numbers and click add"
                                                    class="form-control" aria-label="Recipient's email"
                                                    aria-describedby="basic-addon2" />
                                            </div>
                                            <div class="col-sm-3">
                                                <button id="add-num" type="button"
                                                    class="btn btn-primary block waves-effect waves-light pull-right">
                                                    Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Create Branch Account</h4>

                            <form id="sub-account" method="post">
                                <div class="row mb-4">
                                    <label for="commission_account_name" class="col-sm-3 col-form-label">Account
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="commission_account_name"
                                            name="commission_account_name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="commission_account_number" class="col-sm-3 col-form-label">Account
                                        Number</label>
                                    <div class="col-sm-9">
                                        <input id="commission_account_number" class="form-control" type="number"
                                            name="commission_account_number">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="bank_select" class="col-sm-3 col-form-label">Bank
                                        Name</label>
                                    <div class="col-sm-9">
                                        <select id="bank_select" class="form-control" name="commission_account_bank">
                                        </select>
                                    </div>
                                </div>

                                <input type="text" hidden name="name" value="sub_account">
                                <input type="text" hidden name="percentage_charge" value="0">
                                @csrf

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-title">
                            <div class="d-flex justify-content-center">
                                <button id="demo-editable-enable" class="btn btn-purple"><i
                                        class="fa fa-edit"></i>Edit</button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="demo-editable-table" class="table table-striped table-nowrap mb-0">
                                    <tbody>
                                    <tbody>
                                        <tr>
                                            <td width="35%">Sms Api</td>
                                            <td width="65%"><a href="#" id="smsapi"></a></td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Sms Balance Api</td>
                                            <td width="65%"><a href="#" id="smsbalanceapi"></a></td>
                                        </tr>
                                        @admin
                                        <tr>
                                            <td>Collection Commission</td>
                                            <td><a href="#" id="collection_commission" data-type="number" data-pk="1"
                                                    data-placement="right" data-placeholder="e.g, 20"
                                                    data-title="Collection's commission percentage"></a>
                                            </td>
                                        </tr>
                                        @endadmin
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @section('scripts')
    <!-- for email manual number input -->
    <script>
        var dt = {}
        $.ajax({url: "{{route('option.branch.get')}}"})
        .done((res) => {
            if (res.status) {
                console.log(res.status)
                json = res.text
                json.forEach((index) => {
                    dt[index.name] = index.value
                })
                console.log(dt);
                const opt = "setValue"

                $("#smsapi").editable(opt, dt.smsapi)
                $("#smsbalanceapi").editable(opt, dt.smsbalanceapi)
                $("#collection_commission").editable(opt, dt.collection_commission)
                $("#bank_select").append(`<option selected value="${dt.commission_account_bank}">${dt.commission_account_bank}</option>`)
                $("#commission_account_name").val(dt.commission_account_name)
                $("#commission_account_number").val(dt.commission_account_number)
                // $("#collection_commission").editable(opt, dt.collection_commission)
            }
        })
        .fail((e) => {
            console.log(e);
        })

        $(document).ready( () => {

            // on submit sub account
            $('#sub-account').submit((e) => {
                e.preventDefault();
                const data = $('#sub-account').serializeArray()

                $.post({url: "{{route('option.branch.post')}}", data})
                .done((res) => {
                alert(res.text)
                }).fail((e) => alert('Error invalid details'))
            })

            // fetch banks for select drop down
            $.get("{{route('banks')}}").done((res) => {
                res.map((v) => {
                $('#bank_select').append(`<option value="${v.value}">${v.text}</option>`)
                })
            })

            // defaults
                $.fn.editable.defaults.url = "{{route('option.branch.post')}}";
                $.fn.editable.defaults.send = 'always';
            // default params e.g token
                
                $.fn.editable.defaults.params = function (params) {
                    params._token = "{{csrf_token()}}";
                    return params;
                };

            $("#demo-editable-enable").click(function() {
                $("#demo-editable-table .editable").editable("toggleDisabled");
            });

            //smsapi
            $("#smsapi").editable({
                type: "text", 
                pk: 1, 
                name: "smsapi", 
                mode: "inline",
                params: function(d){
                    d._token = "{{csrf_token()}}";
                    d.value =  encodeURI(d.value)
                    return d
                },
                    title: "Enter Your SMS Api Url Exluding message parameter",
                validate: function(value) {
                    if($.trim(value) == "") return "This field is required";
                }
            });

            //smsbalanceapi
            $("#smsbalanceapi").editable({
                type: "text",
                pk: 1,
                name: "smsbalanceapi",
                mode: "inline",
                params: function(d){
                    d._token = "{{csrf_token()}}";
                    d.value =  encodeURI(d.value)
                    return d
                },
                title: "Enter Your SMS Balance Api Url For Getting SMS Unit Balance",
                validate: function(value) {
                    if($.trim(value) == "") return "This field is required";
                    }
                });

            });

             // collection commission
            $("#collection_commission").editable({
                validate: function(value) {
                if($.trim(value) == "") return "This field is required";
                }
            });

            var responseText = (obj) => {
                text = ''
                text += `${obj.pass.count} Sent ${obj.fail.count} Failed. Out Of ${obj.total} \n`
                text += (obj.fail.count > 0) ? `Failed Number(s): ${$.each(obj.fail.numbers,(v) => (`${v} `))} \n
                Failed Status: ${$.each(obj.fail.status,(v) => (`${v} `))}` : ''
                return text
            }

            const saveClick = () => {
                $('#mod').hide();
                $('#def').show();
                $('#save-ho').hide();
                $('#cancel-ho').hide();
                $('#edit-ho').show();
                $('#img-logo').show();
                $('#img-logo-input').hide();
            }

            const editClick = () => {
                $('#img-logo').hide();
                $('#mod').show();
                $('#img-logo-input').show();
                $('#cancel-ho').show();
                $('#def').hide();
                $('#edit-ho').hide();
                $('#save-ho').show();
            }

            const cancelClick = () => {
                $('#mod').hide();
                $('#cancel-ho').hide();
                $('#img-logo').show();
                $('#def').show();
                $('#img-logo-input').hide();
                $('#edit-ho').show();
                $('#save-ho').hide();
            }

        // var dummyRes = {status: true, text: { pass: {status: [], count: 1}, fail: {status: [], count: 0, numbers: []}, total: 1}}
        $(document).ready(function(){
            $('#send-sms-form').submit((e) => {
                toggleAble($('#send-btn'), true, 'sending...')
                e.preventDefault();
                data = $('#send-sms-form').serializeArray()
                url = ""
                poster({data, url, alert: 'false'}, (res) => {
                // res = dummyRes
                if (res.status === true) {
                    text = responseText(res.text)
                    swal("Success", text, "success");
                } else if (res.status === false) {
                    swal("Oops", res.text, "error");
                }
                    toggleAble($('#send-btn'), false)
                    setBalance()
                    console.log(res);
                })
            })

            $('#add-num').click(function(){
                if(!$('#nums').val()){return;}
                    var items = $('#nums').val().split(',');
                    $.each(items, function (i, item) {
                        $('#nums').val('');
                        //$("#list").append('<li class="list-group-item d-flex justify-content-between align-items-center">'+ item +'  <span class="badge badge-danger badge-pill"><i onClick="rm_num(this);" class="btn fa fa-trash"></i></span></li>');
                            $('#num-selector').append($('<option>'
                            , {
                                    value: item,
                                    text : item,
                                    selected: 'selected'
                            }, '</option>'
                            ));
                    });
                    var val = $('#num-selector').text().split(',');
                    alert('Added ' + items);
                $('#num-selector').selectpicker('refresh');
                    $.each(val, function(i,item){
                    });
            });

            //add group function
            $('#add-group').click(function(){
                //remove attribute on click
                $('#groups-selector').find(":selected").removeAttr("selected");
                var items = $('#groups-selector').find(":selected").map(function() {
                    return this.text;
                }).get();
                //do nothing if empty
                if(items.length == 0){return;}
                //transfer the groups
                var values = {'group': items, '_token': '{{ csrf_token() }}' };
                //get list of members in each group
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : "", // the url where we want to POST
                    data        : values, // our data object
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode      : true
                })//<optgroup label="filter2">
                // using the done promise callback
                .done(function(data) {
                if(data.status){
                    let itemss = data.groupMember;
                    //append list to the emails
                    $.each(itemss, function (i, items) {
                    $('#num-selector').append($('<optgroup label="'+i+'"></optgroup>'));
                    $.each( items, function (ii, item) {
                        //check if already in list
                        let options = $("#num-selector option[value='"+item.phone+"'], #num-selector optgroup[value='"+item.phone+"']");
                        if(options.length > 0){
                        $.each(options, function(){
                            //delete email options
                            $(this).remove();
                        });
                        }
                        $('#num-selector optgroup[label="'+i+'"]').append($('<option>',
                        {
                        value: item.phone,
                        text : item.firstname  + ' ' + item.lastname + ' - ' + item.phone,
                        selected: 'selected'
                        }, '</option>'
                        ));
                    });
                    });
                }
                else{
                    alert('Error occured Please try again');
                }
                //clear the selectpicker
                $('#groups-selector').find(":selected").removeAttr("selected");
                $('#groups-selector').selectpicker('deselectAll');
                $('#groups-selector').selectpicker('refresh');
                $('#num-selector').selectpicker('refresh');
                alert('Group Members Added');
                });
            });

            // set the balance
            setBalance()

        });
        //selected="selected" value="' + item +'" >'+ item +'</option>'
        function rm_num(d){
            var text = $(d).parent().parent().text();
            var input = $("#num-selector option[value='"+ text +"']").remove();
            var ll = $('#list ' + d).remove();
        }

        var setBalance = async () => {
        // tell the user about to fetch sms balance
        $('#sms_balance_container').html('<h3>Fetching sms Balance...</h3>')
        // fetch the sms balance api
        balanceUrl = await getSmsBalanceApi( async (url) => {
            if(url){
            // fetch the sms balance units
            balance = await getBalance(url, (res) => {
                if (!res) {
                // tell the user
                smsBalanceMessage(res)
                return ;
                }
                // display result to user
                console.log(res);
                smsBalanceMessage(res + 'Units')
                $('#sms_balance_container').html(`<h3>${res} Units</h3>`)
            })
            } else {

            }

        })
        // if not set
        // if (!balanceUrl) {
            // tell the user
            $('#sms_balance_container').html('<h3>Api Not Set</h3>')
            // alert('Sms Balance Api Not Set')
            // return
        // }

        // // fetch the sms balance units
        // balance = await getBalance(balanceUrl)
        // if error fetching balance
        // if (!balance) {
        //   // tell the user
        //   $('#sms_balance_container').html(`<h3>${balance}</h3>`)
        //   return
        // }

        // // display result to user
        // $('#sms_balance_container').html(`<h3>${balance}</h3>`)
        }

        var getSmsBalanceApi = async (fn) => {
        let value = false
        $.get("")
        .done((res) => {
            if (res.status) {
            res.text.forEach((v) => {
                if (v.name === 'smsbalanceapi') {
                fn(v.value)
                }
            })
            } else {
            fn(false)
            }
        })
        .fail((err) => {fn(false); console.log(err);} )
        }

        var getBalance = (url, fn) => {
        value = false
        $.ajax({url})
        .done((res) => {
            if (res === '-2905') {
            value = "Invalid username/password combination"
            smsBalanceMessage("Invalid username/password combination")
            fn(value)
            } else {
            value = res
            fn(value)
            }
        })
        .fail((err) => smsBalanceMessage())
        return value
        }

        const smsBalanceMessage = (msg = 'cannot fetch sms unit balance') => {
        $('#sms_balance_container').html(`<h3>${msg}</h3>`)
        }
    </script>
    @endsection
</x-app-layout>