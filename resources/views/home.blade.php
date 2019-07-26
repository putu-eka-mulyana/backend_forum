@extends('template')
@section('main')
@include('navbar')
<div class="box-home">

    <div class="container">
        <div class="row wrep">
            <div class="col-md-9">
                <h2 class="title-question">PERTANYAAN TERBARU</h2>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header">
                            PERTANYAAN TERBARU
                            <div class="lihat">
                                <i class="far fa-eye" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne"></i>
                                <form action="" method="post" class="form-hapus">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="" type="button" onclick="if (confirm('Anda yakin ?')) this.form.submit();">
                                                <i class="fas fa-trash-alt"></i>
                                        </button>
                                        
                                </form>
                                                   </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

</div>
@endsection