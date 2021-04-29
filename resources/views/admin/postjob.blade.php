@extends('user.layout.layout')

@section('title', 'Job')

@section('content')
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Post A Job</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method='POST' action='' id='jobform'>
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input required type="text" name='title' class="form-control" id="title" placeholder="Job Title">
                  </div>
                  <div class="form-group">
                  <label>Type</label>
                  <select required name="category" id="category" class="form-control select2bs4" style="width: 100%;">
                    <option value="Instagram Followers" selected='selected' >Instagram Followers</option>
                                <option value="Instagram Likes Trial">Instagram Likes (Trial )
                                </option>
                                <option value="Instagram Likes">Instagram Likes</option>
                                <option value="Instagram Comments">Instagram Comments</option>
                                <option value="Instagram Reels Likes">Instagram Reels Likes</option>
                                <option value="Instagram Reels Comments">Instagram Reels Comments</option>
                                <option value="Instagram Views">Instagram Views</option>
                                <option value="Igtv views">Igtv views</option>
                                <option value="Instagram reel views">Instagram reel views</option>
                                <option value="Twitter views">Twitter views</option>
                                <option value="Twitter Likes">Twitter Likes</option>
                                <option value="Twitter Followers">Twitter Followers</option>
                                <option value="Twitter Retweets">Twitter Retweets</option>
                                <option value="Twitter Comments">Twitter Comments</option>
                                <option value="Tiktok Likes">Tiktok Likes</option>
                                <option value="Tiktok Comments">Tiktok Comments</option>
                                <option value="Tiktok Views">Tiktok Views</option>
                                <option value="Instagram Foreign Followers">Instagram Foreign Followers</option>
                                <option value="Instagram Foreign Likes">Instagram Foreign Likes</option>
                                <option value="YouTube Likes">YouTube Likes</option>
                                <option value="Youtube Views">Youtube Views</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>User level</label>
                  <select required name="level" id="level" class="form-control select2bs4" style="width: 100%;">
                    <!-- <option value="{{config('enums.levels.basic')}}">Basic</option> -->
                    @foreach(config('enums.levels') as $level => $value)
                    <option value="{{$value}}">{{$level}}</option>
                    @endforeach
                  </select>
                </div>
                <div id="for_followers">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword" >Social Media Username
                                    <small>the social media account you want followers
                                        on</small></label>
                                <input class="form-control" id="social_username" placeholder="Social Media Username" type="text" name="social_username" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Social Media Profile
                                    Link <small class="text-danger">for example :
                                        <b>https://instagram.com/your_username/ </b></small></label>
                                <input class="form-control " id="social_profile_link" placeholder="Social Media Profile Link" type="text" name="social_profile_link" />
                            </div>
                        </div>
                        <div id="for_others" style="display: none">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Post Link <small>enter
                                        link to content that needs promotion</small></label>
                                <input class="form-control" id="link" placeholder="Post Link" type="text" name="link" />
                                <span class="text-danger">Note: Do Not Order More Than Once Per
                                    Post/Link</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Quantity <small>(how many
                                    likes, comments or views)</small></label>
                            <input class="form-control " id="quantity" placeholder="Quantity" type="number" name="quantity" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Amount <small>(how much will be awarded to users for this job?)</small></label>
                            <input class="form-control " id="amount" placeholder="Amount" type="number" name="amount" />
                        </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



</div>

</div>
@endsection


@section('js')
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });


    $("#category").on('change',(function(e) {
                e.preventDefault();

                var t = $(this).children("option:selected").val();
                //
                if (t.toLowerCase().indexOf("follow") >= 0) {
                    $('#for_followers').show();
                    $('#for_others').hide();
                }
                else {
                    $('#for_followers').hide();
                    $('#for_others').show();
                    }
                })
            );

            $("#jobform").submit(function(event){
                event.preventDefault();
                let data = $(this).serializeArray();
                console.log(data);

                $.ajax({
                    url: "{{route('postjob')}}",
                    type: 'POST',
                    data: data,
                    success: function(data){
                        if(data == 'success'){
                            swal('successful!', 'Order was successful', "success").then(() => {
                                window.location = "{{route('dashboard')}}";
                            });
                        }else{
                            swal('warning!', data, 'warning');
                        }
                    },
                    error: function(){
                        swal("Oops! Something went wrong!", 'please check your network connection', 'error');
                    }
                });
            });
</script>
@endsection