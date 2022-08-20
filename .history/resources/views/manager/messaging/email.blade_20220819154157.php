<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Messaging</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Email Messaging</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Basic Information</h4>
                    <p class="card-title-desc">Fill all information below</p>

                    <form id="send-mail-form" role="form" method="post" action="{{route('messaging.sendMail')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <?php if(isset($_GET['mail'])) { ?>
                                    <x-form.input type="email" id="inputEmail" name="to[]" class="block w-full mt-1"
                                        value="<?php echo $_GET['mail']; ?> " />
                                    <?php echo '</div>'; }else{ ?>
                                    <select class="form-control selectpicker" id="num-selector" data-live-search="true"
                                        name="to[]" data-width="100%" data-actions-box="true" multiple required>
                                        <option>Select</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id() }}">{{ $user->name() }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <x-form.input id="emails" type="text"
                                            placeholder="Type in comma seperated emails and click add"
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
                            <?php }?>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <x-form.label>Subject</x-form.label>
                                <x-form.input type="text" id="inputSubject" name="subject" class="block w-full mt-1"
                                    required />
                            </div>

                        </div>

                        <textarea class="form-control" id="productdesc" rows="5" name="description"></textarea>

                        <div class="d-flex justify-content-center flex-wrap mt-5">
                            <button type="submit" class="btn btn-primary block waves-effect waves-light pull-right">Send
                                Mail</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    @section
    @section('scripts')
    <script>
        $('#send-mail-form').on('submit', function (e) {
      
              // if (!shouldSubmit) e.preventDefault();
              // if (shouldSubmit) return;
      
              // let message = $('.note-editable').html();
              // console.log(message);
      
              // $('#message-text-area').val(message);
      
              // shouldSubmit = true;
      
              // $('#send-mail-form').trigger('reset');
      
          })
      
      
          // for email manual number input
      
          $(document).ready(function () {
              $('#add-num').click(function () {
                  if (!$('#emails').val()) {
                      return;
                  }
                  var items = $('#emails').val().split(',');
                  $('#emails').val('');
                  $.each(items, function (i, item) {
                      //$("#list").append('<li class="list-group-item d-flex justify-content-between align-items-center">'+ item +'  <span class="badge badge-danger badge-pill"><i onClick="rm_num(this);" class="btn fa fa-trash"></i></span></li>');
                      $('#num-selector').append($('<option>', {
                          value: item,
                          text: item,
                          selected: 'selected'
                      }, '</option>'));
                  });
                  var val = $('#num-selector').text().split(',');
                  $('#num-selector').selectpicker('refresh');
                  alert('Added ' + items);
                  $.each(val, function (i, item) {});
              });
      
              //add group function
              $('#add-group').click(function () {
                  //remove attribute on click
                  $('#groups-selector').find(":selected").removeAttr("selected");
                  var items = $('#groups-selector').find(":selected").map(function () {
                      return this.text;
                  }).get();
                  //do nothing if empty
                  if (items.length == 0) {
                      return;
                  }
                  //transfer the groups
                  var values = {
                      'group': items,
                      '_token': '{{ csrf_token() }}'
                  };
                  //get list of members in each group
                  $.ajax({
                          type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                          url: "{{route('group.members')}}", // the url where we want to POST
                          data: values, // our data object
                          dataType: 'json', // what type of data do we expect back from the server
                          encode: true
                      }) //<optgroup label="filter2">
                      // using the done promise callback
                      .done(function (data) {
                          if (data.status) {
                              let itemss = data.groupMember;
                              //append list to the emails
                              $.each(itemss, function (i, items) {
                                  $('#num-selector').append($('<optgroup label="' + i +
                                      '"></optgroup>'));
                                  $.each(items, function (ii, item) {
                                      //check if already in list
                                      let options = $("#num-selector option[value='" +
                                          item.email +
                                          "'], #num-selector optgroup[value='" + item
                                          .email + "']");
                                      if (options.length > 0) {
                                          $.each(options, function () {
                                              //delete email options
                                              $(this).remove();
                                          });
                                      }
                                      $('#num-selector optgroup[label="' + i + '"]')
                                          .append($('<option>', {
                                              value: item.email,
                                              text: item.firstname + ' ' + item
                                                  .lastname,
                                              selected: 'selected'
                                          }, '</option>'));
                                  });
                              });
                          } else {
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
          });
          //selected="selected" value="' + item +'" >'+ item +'</option>'
          function rm_num(d) {
              var text = $(d).parent().parent().text();
              var input = $("#num-selector option[value='" + text + "']").remove();
              var ll = $('#list ' + d).remove();
          }
    </script>
    @endsection

</x-app-layout>