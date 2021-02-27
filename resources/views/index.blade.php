<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bs-pagination.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
<div class="row mb-3">
    <div class="col-md-11">
        <input type="text" name="" class="form-control" id="searchKey" aria-rowspan="#button">
    </div>
    <div class="col-md-1">
        <button class="btn btn-primary" id="button">Search</button>
    </div>
</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                </tr>
            </thead>
            <tbody class="result">

            </tbody>
        </table>

        {{-- {{$blogs->links()}} --}}

        <nav aria-label="...">
            <ul class="pagination justify-content-center paginationLinks">

            </ul>
          </nav>
    </div>



      <script>


        var key=null;
        var pageNumber=1;
//           $(document).ready(function(){
//             getData(pageNumber,key);

//           });

// $('#button').click(function(){
//     key=$('#searchKey').val();
//     getData(pageNumber,key);


// });






//           function getData(pageNumber,key){



//                 $.ajax({
//                 type:'GET',
//                 url:"{{route('getMore')}}"+"?page="+pageNumber,
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 data:{key:key},
//                success:function(data) {
//                    console.log(data);

//                    var jsonData=data.data;

//                    var html="";
//                    for (let i = 0; i < jsonData.length; i++) {
//                        const element = jsonData[i];
//                        html+='<tr>';
//                        html+='<td>'+element.id+'</td>';
//                        html+='<td>'+element.title+'</td>';
//                        html+='<td>'+element.desc+'</td>';
//                        html+='</tr>';

//                    }
//                    $('.result').html(html);

//                 var html2="";
//                 for (let p = 1; p <= data.last_page; p++) {
//                     html2+='<li class="page-item"><a class="page-link" onclick="test('+p+');">'+p+'</a></li>';
//                 }


//                    $('.paginationLinks').html(html2);

//                },error:function(error){
//                    console.log(error);
//                }
//                 });
//           }

//     //       $('a').click(function(event){
//     //             event.preventDefault();
//     //             key=$('#searchKey').val();
//     //             var url=this.toString();
//     //             pageNumber=url.split("?page=")[1];
//     //             getData(pageNumber,key);


//     // });



// function test(p){
//     event.preventDefault();
//     key=$('#searchKey').val();
//     // var url=this.toString();
//     // console.log(this);

//     // pageNumber=url.split("?page=")[1];
//     getData(p,key);
// }



$(document).ready(function(){
    getData();

});


$('#button').click(function(){
    getData();
});




function getData(){
    $('.paginationLinks').pagination({
            // total: 100,
            current: 2,
            length: 20,
            size: 2,
            prev: 'Previous',
            next: 'Next',

            ajax: function(options, refresh, $target) {
                var key=$('#searchKey').val();

                $.ajax({
                url:"{{route('getMore')}}"+"?page="+options.current,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    length:options.length,
                    key:key
                },
                dataType: 'json'
                }).done(function(res) {

                    var jsonData=res.data;

                   var html="";
                   for (let i = 0; i < jsonData.length; i++) {
                       const element = jsonData[i];
                       html+='<tr>';
                       html+='<td>'+element.id+'</td>';
                       html+='<td>'+element.title+'</td>';
                       html+='<td>'+element.desc+'</td>';
                       html+='</tr>';

                   }
                   $('.result').html(html);
                    refresh({
                        total: res.total,
                        length: res.length
                    });
                }).fail(function(error) {

                });
            }
        });
}

      </script>


</body>
</html>
