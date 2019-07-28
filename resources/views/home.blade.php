@extends('template')
@section('main')
@include('navbar')

<div class="box-home">
    <div class="container">
        <div class="row wrep">
            <div class="col-md-8">
                <h2 class="title-question">PERTANYAAN TERBARU</h2>
                @foreach ($question as $ques)
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header">
                            {{$ques->title}}
                            <div class="lihat">
                                <i class="far fa-eye" data-toggle="collapse" data-target="#collapse{{$ques->id}}"
                                    aria-expanded="true" aria-controls="collapse{{$ques->id}}"></i>
                                <form action="{{ route('question.destroy',['id'=>$ques->id])}}" method="post" class="form-hapus">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="" type="button"
                                        onclick="if (confirm('Anda yakin ?')) this.form.submit();">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                            <div id="collapse{{$ques->id}}" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$ques->body}}
                                </div>
                                <div>
                                <span class="text-muted">On {{$ques->created_at->diffForHumans()}}</span>
                                    <div class="tags">
                                        @foreach($ques->tag as $t)
                                            <span class="tag">{{$t->tag_name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <hr />
                                <h5>Answer</h5>
                                @foreach($ques->answers as $ans)
                                <div class="answer-box"><span style="font-weight: bold;"><i class="fas fa-user-alt"></i> {{$ans->user->username}}</span>: <p>{{$ans->body}}</p> <span class="text-muted">On {{$ans->created_at->diffForHumans()}}</span></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <h2 class="title-question">TAGS</h2>
                <div class="card">
                    <div class="card-body">
                        @foreach($tags as $t)
                            <span class="tag">{{$t->tag_name}} 
                            <form action="{{ route('tag.destroy',['id'=>$t->id])}}" method="post" class="form-hapus">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="" type="button" style="background-color: #3b72ec; color:white; height: 24px;"
                                        onclick="if (confirm('Anda yakin ?')) this.form.submit();">
                                        <i class="fas fa-plus hapus-tag"></i>
                                    </button>
                                </form>    
                        </span>
                        @endforeach
                    </div>
                </div>
                <div class="card" style="margin-top:30px;">
                    <div class="card-body">
                        <form method="post" action="{{route('tag.store')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-8">
                             <input type="text" class="form-control" id="tag_name" placeholder="add tags" name="tag_name">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection