@extends('layouts.app')

@section('title'){{ 'Telefono numeriai pagal kodą' }}@endsection
@section('description'){{ 'Kas skambino? kieno numeris? telefono numeriai pagal kodą' }}@endsection
@section('keywords'){{ 'Telefono numeriai pagal kodą, kas skambino? kieno numeris?' }}@endsection

@section('content')
<style>
    .column1 div,.column2 div,.column3 div,.column4 div{
        font-size:12px;
        color:black;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){            
        $.ajaxSetup({
                headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            }); 
        var url = "{{URL('/searchkey')}}";     
        // let _token   = $('meta[name="csrf-token"]').attr('content');       
        $("#searchkey").keyup(function () {     
            var searchvalue = $("#searchkey").val();              
            // $.ajax({
            // url: url,
            // type:"POST",
            // data:{
            //     searchkey: searchvalue,
            // },
            // success:function(result){
            //     var rlt = $.parseJSON(result);
            //     var i=0;
            //     // // console.log(rlt[0].id);
            //     // console.log(result);
            //     var result_count=rlt.length;
            //     // var pagelimit_num=parseInt(result_count/4);
            //     var pagelimit_num=100;
            //     console.log(result_count,pagelimit_num); 

            //     $(".column1,.column2,.column3,.column4").html("");
            //     $(".column1").append(
            //         '<div class="col-md-4">'+'number'+'</div><div class="col-md-4">'+'view_last_ip'+'</div><div class="col-md-4 updated_at">'+'updated_at'+'</div>');
            //     $(".column2").append(
            //         '<div class="col-md-4">'+'number'+'</div><div class="col-md-4">'+'view_last_ip'+'</div><div class="col-md-4 updated_at">'+'updated_at'+'</div>');
            //     $(".column3").append(
            //         '<div class="col-md-4">'+'number'+'</div><div class="col-md-4">'+'view_last_ip'+'</div><div class="col-md-4 updated_at">'+'updated_at'+'</div>');
            //     $(".column4").append(
            //         '<div class="col-md-4">'+'number'+'</div><div class="col-md-4">'+'view_last_ip'+'</div><div class="col-md-4 updated_at">'+'updated_at'+'</div>');
            //         for(i=0;i<=pagelimit_num;i++){
            //         $(".column1").append(
            //         '<div class="col-md-4">'+rlt[i].number+'</div><div class="col-md-4">'+rlt[i].view_last_ip+'</div><div class="col-md-4 updated_at">'+rlt[i].updated_at+'</div>');
            //         }
            //         for(i=pagelimit_num+1;i<=2*pagelimit_num;i++){
            //         $(".column2").append(
            //         '<div class="col-md-4">'+rlt[i].number+'</div><div class="col-md-4">'+rlt[i].view_last_ip+'</div><div class="col-md-4 updated_at">'+rlt[i].updated_at+'</div>');
            //         }
            //         for(i=2*pagelimit_num+1;i<=3*pagelimit_num;i++){
            //         $(".column3").append(
            //         '<div class="col-md-4">'+rlt[i].number+'</div><div class="col-md-4">'+rlt[i].view_last_ip+'</div><div class="col-md-4 updated_at">'+rlt[i].updated_at+'</div>');
            //         }
            //         for(i=3*pagelimit_num;i<=4*pagelimit_num;i++){
            //         $(".column4").append(
            //         '<div class="col-md-4">'+rlt[i].number+'</div><div class="col-md-4">'+rlt[i].view_last_ip+'</div><div class="col-md-4 updated_at">'+rlt[i].updated_at+'</div>');
            //         }
            //     },
            // error: function(error) {
            //     console.log(error);
            // }
            // });
            });
    });

    
</script>   
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Telefono numeriai pagal kodą</h1>
            <div class="form-group">
                <label for="search">SearchKey:</label><br>
                <input type="text" class="form-control" id="searchkey" style="float:left;">
                <button type="button" class="btn btn-default" style="float:right;">Search</button>
            </div>
            {{-- <div class="container">
                <div class="row">
                    <div class="col-md-3 column1"></div>
                    <div class="col-md-3 column2"></div>
                    <div class="col-md-3 column3"></div>
                    <div class="col-md-3 column4"></div>
                </div>
            </div> --}}
            <table class="table table-striped table-hover">
                <tbody class="table_start">
                    @foreach($codes as $code)
                        <tr>
                            <td>
                            <a href="{{ route('number.code.read', ['code' => $code->code]) }}">{{ $code->code }}</a>
                            </td>
                            <td>
                            {{ $code->provider }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



    
	

@endsection