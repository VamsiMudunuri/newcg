@extends('layouts.error')
@section('title', Translator::transSmart('app.Forbidden - 403', 'Forbidden - 403'))
@section('content')

    <div class="error-page">
        <h1 class="code">
            {{403}}
        </h1>
        <p class="description">
            {{Translator::transSmart('exception.forbidden', 'You do not have permission.')}}
        </p>
        <p class="link">
            {{Html::link('javascript:void(0);',  Translator::transSmart('app.Go to previous page', 'Go to previous page'), array('title' =>  Translator::transSmart('app.Go to previous page', 'Go to previous page'), 'onclick' => "window.history.back(); return false;"))}}
            <span class="separator">·</span>
            {{Html::linkRoute('page::index',  Translator::transSmart('app.Go to home page', 'Go homepage'), [], array('title' =>  Translator::transSmart('app.Go to home page', 'Go to homepage')))}}
            <span class="separator">·</span>
            {{Html::link(URL::current(),  Translator::transSmart('app.Try again', 'Try again'), array('title' =>  Translator::transSmart('app.Try again', 'Try again')))}}
        </p>
    </div>

@endsection