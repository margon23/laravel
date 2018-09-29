@extends("layouts.backend")
@section("content")
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @if(isset($module))
                    {{$module->name}}

                    <small>Modül Düzenleme</small>
                @else
                    Yeni Modül
                    <small>Yeni Modül Ekleme</small>
                @endif

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
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Adı" @if(isset($module)) value="{{$module->name}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="page" class="col-sm-2 control-label">Select</label>
                                <div class="col-sm-10">
                                    <select name="page_id" id="page_id" class="form-control">
                                        <option value="" selected>Sayfa Seçiniz</option>
                                        @foreach($pages as $page)
                                        <option value="{{$page->id}}">{{$page->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Başlık</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Başlık" @if(isset($module)) value="{{$module->title}}" @endif>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Açıklamalar</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Açıklamalar" @if(isset($module)) value="{{$module->description}}" @endif>
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
                    @if(isset($modul))
            var url = "{{route("backend.static.moduleEdit", ["id" => $modul->id])}}";

                    @else
            var url =  "{{route("backend.static.module.newModuleCreate")}}";
            @endif
            $.ajax({
                type : "post",
                url : url,
                data : {
                    _token  : "{{csrf_token()}}",
                    name     :  $("#name").val(),
                    page_id   : $("#page_id").val(),
                    title   : $("#title").val(),
                    description   : $("#description").val()

                },

                success: function(response){
                    console.log("modül kaydedildi");
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