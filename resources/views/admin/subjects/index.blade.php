@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de disciplinas</h3>
            {!! Button::primary('Nova Disciplina')-> asLinkTo(route('admin.subjects.create'))!!}
        </div>
        <div class="row">
            {!!
            Table::withContents($subjects->items())
            ->striped()
            ->callback('Ações', function ($field,$model){
                $linkEdit = route('admin.subjects.edit',['subject' => $model->id]);
                $linkShow = route('admin.subjects.show',['subject' => $model->id]);
                return Button::link(Icon::pencil().' Editar')->asLinkTo($linkEdit).'|'.
                       Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
            })
            !!}
            {!! $subjects->links() !!}
        </div>
    </div>
@endsection