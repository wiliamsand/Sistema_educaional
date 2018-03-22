@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Turmas</h3>
            {!! Button::primary('Nova turma')-> asLinkTo(route('admin.class_informations.create'))!!}
        </div>
        <div class="row">
            {!!
            Table::withContents($class_informations->items())
            ->striped()
            ->callback('Ações', function ($field,$model){
                $linkEdit = route('admin.class_informations.edit',['class_informations' => $model->id]);
                $linkShow = route('admin.class_informations.show',['class_informations' => $model->id]);
                $linkStudents = route('admin.class_informations.students.index',['class_informations' => $model->id]);
                return Button::link(Icon::pencil().' Editar')->asLinkTo($linkEdit).'|'.
                       Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow).'|'.
                       Button::link(Icon::create('home').'&nbsp;Alunos')->asLinkTo($linkStudents);
            })
            !!}
            {!! $class_informations->links() !!}
        </div>
    </div>
@endsection