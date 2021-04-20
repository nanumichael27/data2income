@extends('user.layout.layout')


@section('title', 'User profile')

@section('content')
<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Bank Details</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Bank Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                    </li> -->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                        <div class="box-body box-profile text-center">
                            <label style="cursor: pointer;">
                                <img class="profile-user-img img-responsive img-circle" id="dp" src="{{ Storage::exists('profilepicture/'.Auth::user()->user_id.'.png') ? asset('profilepicture/'.Auth::user()->user_id.'.png?'.rand())  : asset('dist/img/user.svg') }}" alt="User profile picture" style='width: 165px;'>
                                <input type="file" id="profile-picture" style="display: none; ">
                            </label>
                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-muted text-center">{{ Auth::user()->user_id }}</p>

                        </div><!-- /.box-body -->
                        <form class="form-horizontal" id="personalinformation" method="POST" action="updateuserprofile.php">

                            <div class="form-group">
                                <label for="fullname" class="col-sm-2 control-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sex</label>
                                <div class="col-sm-10">
                                    <div class="radio" style="display: inline-block;">
                                        <label>
                                            <input type="radio" name="sex" id="male" value="male" {{ Auth::user()->sex == 'male'? 'checked': '' }}> Male
                                        </label>
                                    </div>
                                    <div class="radio" style="display: inline-block;">
                                        <label>
                                            <input type="radio" name="sex" id="female" value="female" {{ Auth::user()->sex == 'female'? 'checked': '' }}> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="dateofbirth" class="col-sm-2 control-label">Date of birth</label>
                                <div class="col-sm-10">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ Auth::user()->dateofbirth }}" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" id="address" placeholder="Address">{{ Auth::user()->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <input type="text" name="state" class="form-control" id="state" placeholder="State" value="{{ Auth::user()->state }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <form class="form-horizontal" id="bankdetails">
                            <div class="form-group">

                                <label for="bank" class="col-sm-2 control-label">Name of Bank</label>
                                <div class="col-sm-10">

                                    <select type="text" name="bankname" class="form-control " id="bank">
                                        <option selected="">{{ Auth::user()->bankname }}</option>
                                        <option value="Access Bank">Access Bank</option>
                                        <option value="Citibank">Citibank</option>
                                        <option value="Diamond Bank">Diamond Bank</option>
                                        <option value="Ecobank">Ecobank</option>
                                        <option value="Fidelity Bank">Fidelity Bank</option>
                                        <option value="First City Monument Bank (FCMB)">First City Monument Bank (FCMB)</option>
                                        <option value="FSDH Merchant Bank">FSDH Merchant Bank</option>
                                        <option value="Guarantee Trust Bank (GTB)">Guarantee Trust Bank (GTB)</option>
                                        <option value="Heritage Bank">Heritage Bank</option>
                                        <option value="Keystone Bank">Keystone Bank</option>
                                        <option value="Kuda Microfinance Bank">Kuda Microfinance Bank</option>
                                        <option value="Rand Merchant Bank">Rand Merchant Bank</option>
                                        <option value="Skye Bank">Skye Bank</option>
                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                        <option value="Sterling Bank">Sterling Bank</option>
                                        <option value="Suntrust Bank">Suntrust Bank</option>
                                        <option value="Union Bank">Union Bank</option>
                                        <option value="United Bank for Africa (UBA)">United Bank for Africa (UBA)</option>
                                        <option value="Unity Bank">Unity Bank</option>
                                        <option value="Wema Bank">Wema Bank</option>
                                        <option value="Zenith Bank">Zenith Bank</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="accountname" class="col-sm-2 control-label">Account Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="accountname" class="form-control" id="accountname" placeholder="Account Name" value="{{ Auth::user()->accountname }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="accountnumber" class="col-sm-2 control-label">Account Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="accountnumber" class="form-control" id="accountnumber" placeholder="Account Number e.g 0xxxxxxxxx" value="{{ Auth::user()->accountnumber }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sortcode" class="col-sm-2 control-label">Sort Code</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sortcode" class="form-control" id="sortcode" placeholder="Sort Code" value="{{ Auth::user()->sortcode }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div> -->
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal" id="profile-picture-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background: #367fa9;">
                <h4 class="modal-title">Profile Picture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 32px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="padding: 0">
                <div id="upload-demo"></div>
            </div>
            <div class="modal-footer" style="padding: 7px 53px;">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <span style="border: 1px solid;
                                padding: 8px;border-radius: 33px;
                                cursor: pointer;" data-dismiss="modal" class="pull-left"><i class="fa fa-remove" style="color: red;"></i>Cancel</span>
                <span style="border: 1px solid;
                                padding: 8px;border-radius: 33px;
                                cursor: pointer;
                                color: green;" class="pull-right" id="upload-profile-picture"><i class="fa fa-check"></i>Upload</span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<script>
    //Date range picker
    // $('#reservationdate').datetimepicker({
    //     format: 'L'
    // });
</script>
<script>

         function displayModal(modal){
          $(modal).modal().show();
          return true;
      }

      var resize = $('#upload-demo').croppie({
          enableExif: false,
          enableOrientation: false,    
          viewport: { // Default { width: 100, height: 100, type: 'square' } 
              width: 200,
              height: 200,
              type: 'circle' //square
          },
          boundary: {
              width: 210,
              height: 210
          }
      });

      $('#profile-picture').on('input', function () { 
        displayModal('#profile-picture-modal');
      var reader = new FileReader();
        reader.onload = function (e) {
          resize.croppie('bind',{
            url: e.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#upload-profile-picture').on('click', function (ev) {
      resize.croppie('result', {
        type: 'canvas',
        size: 'viewport',
        circle: false,
      }).then(function (img) {
        let previousDp = $('#dp').attr('src');

        $.ajax({
          url: "{{ route('updateprofile') }}",
          type: "POST",
          data: {"image":img},
          beforeSend:function(){
            $('#profile-picture-modal').modal('hide');
            toastr.info('Uploading profile picture');
            $("#dp").attr('src', 'dist/img/loading_dp.gif');
            $('.user-image').attr('src', 'dist/img/loading_dp.gif');
            $('.img-circle').attr('src', 'dist/img/loading_dp.gif');

          },
          success: function (data) {
            if(data.trim() == 'success'){
              $("#dp").attr('src', img);
              $('.user-image').attr('src', img);
              $('.img-circle').attr('src', img); 
              toastr.clear();
              toastr.success('Profile picture updated', "SUCCESSFUL!");
            }

          },
          error: function(){
            toastr.clear();
            $("#dp").attr('src', previousDp);
            $('.user-image').attr('src', previousDp);
            $('.img-circle').attr('src', previousDp); 
            swal('Unsuccessful!', 'Please check your network connection', 'error')

          }
        });
      });
    });






    $(function(){
        $('#personalinformation').submit(function(event){
          event.preventDefault();
          let datatopost = $(this).serializeArray();
          datatopost.push({name: 'personalinformation', value: 1});
          console.log(datatopost);

          $.ajax({
                url: "{{ route('updateprofile') }}",
                type: 'POST',
                data: datatopost,
                beforeSend:function(){
                  toastr.info('Updating Personal Information');
                },
                success: function(data){
                    if(data.trim() == 'success'){
                        toastr.clear();
                        $('.fullname').text($('#fullname').val());
                        swal('Success', "Your personal information has been updated successully", "success");
                    }else{
                        toastr.clear();
                        swal('Unsuccessful!' ,data, 'warning');
                    }
                },
                error: function(){
                    swal('Network error','Please check your network connection', 'error');
                }
            });
        });

        $('#bankdetails').submit(function(event){
          event.preventDefault();
          let datatopost = $(this).serializeArray();
          datatopost.push({name: 'bankdetails', value: 1});
          console.log(datatopost);

          $.ajax({
                url: "{{ route('updateprofile') }}",
                type: 'POST',
                data: datatopost,
                beforeSend:function(){
                  toastr.info('Updating Bank Details');
                },
                success: function(data){
                    if(data.trim() == 'success'){
                        toastr.clear();
                        swal('Success', "Your bank details has been updated successully", "success");
                    }else{
                        toastr.clear();
                        swal('Unsuccessful!' ,data, 'warning');
                    }
                },
                error: function(){
                    swal('Network error','Please check your network connection', 'error');
                }
            });
        });
      });
</script>
@endsection