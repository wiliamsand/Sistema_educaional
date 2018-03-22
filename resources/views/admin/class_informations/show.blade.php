@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Ver Turma</h3>
            @php
                $linkEdit = route('admin.class_informations.edit',['class_informations' => $class_information->id]);
                $linkDelete = route('admin.class_informations.destroy',['class_informations' => $class_information->id]);
            @endphp
            {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
            {!!
                Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick'=>"event.preventDefault();document.getElementById(\"form-delete\").submit();"
                ])
            !!}
            @php
                $formDelete = FormBuilder::plain([
                    'id'     => 'form-delete',
                    'url'    =>  $linkDelete,
                    'method' => 'DELETE',
                    'style'  =>  'display:none'
                ])
            @endphp
            {!! form($formDelete) !!}<br/><br/>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$class_information->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data Início</th>
                        <td>{{$class_information->date_start->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data Fim</th>
                        <td>{{$class_information->date_start->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ciclo/Ano</th>
                        <td>{{$class_information->cycle}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Subdivisão</th>
                        <td>{{$class_information->subdivision}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection