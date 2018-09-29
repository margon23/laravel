@extends("layouts.backend")
@section("content")
   <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @if(isset($page))
                    {{$page->name}}
                @else
                Yeni Sayfa
                @endif
                <small>Statik sayfalar</small>
            </h1>

        </section>
        <section class="content">
            <div class=row">
                <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Adı</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Adı" @if(isset($page)) value="{{$page->name}}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Başlık</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Başlık" @if(isset($page)) value="{{$page->title}}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" @if(isset($page)) value="{{$page->slug}}" @endif>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keywords" class="col-sm-2 control-label">Anahtar Kelimeler</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Anahtar Kelimeler" @if(isset($page)) value="{{$page->keywords}}" @endif>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Açıklamalar</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" id="description" placeholder="Açıklamalar" @if(isset($page)) value="{{$page->description}}" @endif>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-default">İptal</button>
                    <button type="button" class="btn btn-info pull-right" id="submitButton">Kaydet</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
            </div>
        </section>
   </div>
@endsection

@push("customCss")

@endpush

@push("customJs")

    <script>
        $("#submitButton").click(function(){
        @if(isset($page))
            var url = "{{route("backend.static.pageEdit", ["slug" => $page->slug])}}";

        @else
            var url =  "{{route("backend.static.newPageCreate")}}";
        @endif
            $.ajax({
                type : "post",
                url : url,
                data : {
                    _token  : "{{csrf_token()}}",
                    name     :  $("#name").val(),
                    slug   : $("#slug").val(),
                    title   : $("#title").val(),
                    keywords   : $("#keywords").val(),
                    description   : $("#description").val()

                },

                success: function(response){
                    console.log("veri kaydedildi");
                    console.log(response);
                },

                error: function(response){
                    console.log("kayıt başarılı değil");
                    console.log(reponse);
                }
            });
        });







    </script>

@endpush